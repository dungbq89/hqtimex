<?php

/**
 * VtpProductsCategory form.
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class VtpProductsCategoryFormAdmin extends BaseVtpProductsCategoryForm
{
    public function configure()
    {
        $parameter_ids = ParameterCategoryTable::getInstance()->getListParamCat(false);

        $i18n = sfContext::getInstance()->getI18N();
        unset($this['created_by'], $this['updated_by'], $this['created_at'], $this['updated_at']);
        $this->setWidgets(array(
            'name' => new sfWidgetFormInputText(),
            'image_path' => new sfWidgetFormInputFileEditable(array(
                'label' => ' ',
                'file_src' => VtHelper::getUrlImagePathThumb(sfConfig::get('app_category_images'), $this->getObject()->getImagePath()),
                'is_image' => true,
                'edit_mode' => !$this->isNew(),
                'template' => '<div>%file%<br />%input%</div>',
            )),
            'link' => new sfWidgetFormInputText(),
            'priority' => new sfWidgetFormInputText(array('default' => 0), array('size' => 5, 'maxlength' => 5)),
            'is_home' => new sfWidgetFormInputCheckbox(),
            'is_active' => new sfWidgetFormInputCheckbox(),
            'lang' => new sfWidgetFormInputText(),
        ));

        $this->setValidators(array(
            'name' => new sfValidatorString(array('max_length' => 255, 'trim' => true, 'required' => true)),
            'image_path' => new sfValidatorFileViettel(
                array(
                    'validated_file_class' => 'sfResizeMediumThumbnailImage',
                    'max_size' => sfConfig::get('app_image_maxsize', 999999),
                    'mime_types' => array('image/jpeg', 'image/jpg', 'image/png', 'image/gif'),
                    'path' => sfConfig::get("sf_upload_dir") . '/' . sfConfig::get('app_category_images'),
                    'required' => false,
                ),
                array(
                    'mime_types' => $i18n->__('Dữ liệu không hợp lệ hoặc định dạng không đúng.'),
                    'max_size' => $i18n->__('Tập tin tải lên không vượt quá 5MB')
                )
            ),
            'link' => new sfValidatorString(array('max_length' => 255, 'trim' => true, 'required' => false)),
            'priority' => new sfValidatorInteger(array('required' => false, "min" => 0, 'trim' => true), array('min' => $i18n->__('Giá trị không phải là số âm'), 'invalid' => $i18n->__('Giá trị phải là kiểu số nguyên dương'))),
            'is_home' => new sfValidatorBoolean(array('required' => false)),
            'is_active' => new sfValidatorBoolean(array('required' => false)),
            'lang' => new sfValidatorPass(),
        ));
        $this->widgetSchema['portal_id'] = new sfWidgetFormInputText(array(), array('disabled' => 'false'));
        $this->validatorSchema['portal_id'] = new sfValidatorString(array('max_length' => 25, 'required' => false, 'trim' => true));

        $this->setDefault('priority', null);

        $this->widgetSchema['parent_id'] = new sfWidgetFormChoice(array(
            'choices' => $this->getParentByType($this->getObject()->get('id')),
            'multiple' => false,
            'expanded' => false
        ));
        $this->validatorSchema['parent_id'] = new sfValidatorChoice(array(
            'required' => false,
            'choices' => array_keys($this->getParentByType($this->getObject()->get('id'))),
        ));

        $this->widgetSchema->setNameFormat('vtp_products_category[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
    }

    protected function doBind(array $values)
    {
        $values['portal_id'] = sfContext::getInstance()->getUser()->getAttribute('portal', 0);
        $values['lang'] = sfContext::getInstance()->getUser()->getCulture();
        parent::doBind($values);
    }

    //Hàm đệ quy lấy các chuyên mục con
    public static function getCategoryByParent($category_id)
    {
        $strCat = $category_id;
        $lstCat = VtpProductsCategoryTable::getCategoryByParentID($category_id);
        if (count($lstCat) > 0) {
            foreach ($lstCat as $item) {
                $strCat .= ',' . self::getCategoryByParent($item->id);
            }
        }
        if (VtHelper::endsWith($strCat, ',')) {
            $strCat = substr($strCat, 0, strlen($strCat) - 1);
        }
        return $strCat;
    }

    protected function getParentByType($id)
    {
        $lstChild = '';
        if ($id != null) {
            $lstChild = self::getCategoryByParent($id);
        }
        $result = VtpProductsCategoryTable::getCategoryByType(VtCommonEnum::NewCategory, sfContext::getInstance()->getUser()->getAttribute('portal', 0), $lstChild);
        return $result;
    }

    protected function getAllCategory()
    {
        $array = array('' => '---Chọn chuyên mục---');
        $listCategory = VtpProductsCategoryTable::getListCategoryByPortal(sfContext::getInstance()->getUser()->getAttribute('portal', 0));
        if ($listCategory) {
            foreach ($listCategory as $category) {
                $array[$category->id] = $category->name;
            }
        }
        return $array;
    }


    public function updateDefaultsFromObject()
    {
        parent::updateDefaultsFromObject();
        $this->setDefault('parameter_ids', explode(',', $this->getObject()->getParameterIds()));

    }


    public function save($con = null)
    {

        if (!empty($this->values['parameter_ids']) && $this->values['parameter_ids'] != '') {
            $this->values['parameter_ids'] = implode(',', $this->values['parameter_ids']);
        }
        $article = parent::save($con);
        return $article;
    }
}
