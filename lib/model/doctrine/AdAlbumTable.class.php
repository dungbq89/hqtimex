<?php

/**
 * AdAlbumTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AdAlbumTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object AdAlbumTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('AdAlbum');
    }

    public static function getALbumById($id)
    {
        $q = AdAlbumTable::getInstance()->createQuery()
            ->where('id=?', $id);
        return $q->fetchOne();
    }

    public static function checkSlug($slug, $id)
    {
        $query = AdAlbumTable::getInstance()->createQuery()
            ->select('slug')
            ->where('slug=?', $slug)
            ->andWhere('id<>?', $id);
        return $query;
    }

    //cap nhat gia tri defaul
    public static function updateDefault($id)
    {
        $query = AdAlbumTable::getInstance()->createQuery()
            ->update()
            ->set('is_default', '?', VtCommonEnum::NUMBER_ZERO)
            ->where('id<>?', $id);
        $query->execute();
    }

    public static function getALbumBySlug($slug)
    {
        $q = AdAlbumTable::getInstance()->createQuery()
            ->where('slug=?', $slug)
            ->andWhere('is_active=?', VtCommonEnum::NUMBER_ONE);
        return $q;
    }

    public static function getALbumDefault()
    {
        $q = AdAlbumTable::getInstance()->createQuery()
            ->where('is_active=?', VtCommonEnum::NUMBER_ONE)
            ->andWhere('is_default=?', VtCommonEnum::NUMBER_ONE);
        return $q;
    }

    public static function getListAlbum()
    {
        $q = AdAlbumTable::getInstance()->createQuery()
            ->where('is_active=?', VtCommonEnum::NUMBER_ONE)
            ->orderBy('event_date DESC');
        return $q;
    }

    public static function getAllAlbum()
    {
        $q = AdAlbumTable::getInstance()->createQuery()
            ->where('is_active=?', VtCommonEnum::NUMBER_ONE)
            ->andWhere('lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->orderBy('updated_at DESC');
        return $q;
    }

    public static function getAllAlbumPhoto()
    {
        $q = AdAlbumTable::getInstance()->createQuery()
            ->where('is_active=?', VtCommonEnum::NUMBER_ONE)
            ->andWhere('lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->orderBy('priority DESC')->fetchArray();
        if (!empty($q))
            return $q;
        return false;
    }


    public static function getALbumBySlugV2($slug)
    {
        $q = AdAlbumTable::getInstance()->createQuery()
            ->where('slug=?', $slug)
            ->andWhere('is_active=?', VtCommonEnum::NUMBER_ONE)
            ->andWhere('lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->fetchArray();
        if (!empty($q))
            return $q[0];
        return false;
    }
}