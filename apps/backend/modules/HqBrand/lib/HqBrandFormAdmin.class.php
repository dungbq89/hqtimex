<?php

/**
 * HqBrand form.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class HqBrandFormAdmin extends BaseHqBrandForm
{
    public function configure()
    {
        parent::setup();
        $i18n = sfContext::getInstance()->getI18N();
        $this->setWidgets(array(
            'name' => new sfWidgetFormInputText(),
            'lang' => new sfWidgetFormInputHidden(array(), array('value' => sfContext::getInstance()->getUser()->getCulture())),
            'image' => new sfWidgetFormInputFileEditable(array(
                'label' => ' ',
                'file_src' => VtHelper::getUrlImagePathThumb(sfConfig::get('app_advertise_images'), $this->getObject()->getImage()),
                'is_image' => true,
                'edit_mode' => !$this->isNew(),
                'template' => '<div>%file%<br />%input%</div>',
            )),
            'is_active' => new sfWidgetFormInputCheckbox(),
        ));

        $this->setValidators(array(
            'name' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'lang' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'image' => new sfValidatorFileViettel(
                array(
                    'max_size' => sfConfig::get('app_image_maxsize', 999999),
                    'mime_types' => array('image/jpeg', 'image/jpg', 'image/png', 'image/gif'),
                    'path' => sfConfig::get("sf_upload_dir") . '/' . sfConfig::get('app_advertise_images'),
                    'required' => false
                ),
                array(
                    'mime_types' => $i18n->__('Bạn phải tải lên file hình ảnh.'),
                    'max_size' => $i18n->__('Tối đa 5MB')
                )),
            'is_active' => new sfValidatorBoolean(array('required' => false)),
        ));

        $this->widgetSchema->setNameFormat('hq_brand[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    }
}
