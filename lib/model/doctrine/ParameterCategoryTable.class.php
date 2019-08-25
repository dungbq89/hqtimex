<?php

/**
 * ParameterCategoryTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ParameterCategoryTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ParameterCategoryTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ParameterCategory');
    }

    public function getListParamCat($cbx = true)
    {
        if ($cbx) {
            $list[0] = '-- Chọn danh mục --';
        } else {
            $list = [];
        }

        $query = $this->createQuery()
            ->andWhere('lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->fetchArray();
        if ($query) {
            foreach ($query as $val) {
                $list[$val['id']] = $val['name'];
            }
        }
        return $list;
    }

    public function getListParamFront($listParam)
    {
        $q = $this->createQuery()
            ->andWhere('lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->andWhereIn('id', $listParam)
            ->execute();
        if ($q) {
            return $q;
        }
        return false;
    }
}