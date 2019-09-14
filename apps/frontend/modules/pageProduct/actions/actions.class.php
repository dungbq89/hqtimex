<?php

/**
 * pageHome actions.
 *
 * @package    VTP2.0
 * @subpackage pageHome
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pageProductActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $i18n = sfContext::getInstance()->getI18N();
        // lay danh sach san pham theo cat
        $slug = $request->getParameter('slug');
        $page = $request->getParameter('page', 1);
        $category = false;
        $pager = false;
        $limit = 9;
        if ($slug && $page) {
            $category = VtpProductsCategoryTable::getCategoryProductBySlugV3($slug);
            if ($category) {
                $pager = new sfDoctrinePager('VtpProducts', $limit);
                $pager->setQuery(VtpProductsTable::getAllProductByCategory($category->id));
                $pager->setPage($page);
                $pager->init();
            }
        }
        if ($category) {
            $this->pager = $pager;
            $this->category = $category;
            $this->page = $page;
        } else {
            $this->forward404($i18n->__('Page not found!'));
        }
    }
    public function executeBrand(sfWebRequest $request)
    {
        $i18n = sfContext::getInstance()->getI18N();
        // lay danh sach san pham theo cat
        $slug = $request->getParameter('slug');
        $page = $request->getParameter('page', 1);
        $category = false;
        $pager = false;
        $limit = 9;
        if ($slug && $page) {
            $category = HqBrandTable::getBrandBySlug($slug);
            if ($category) {
                $pager = new sfDoctrinePager('VtpProducts', $limit);
                $pager->setQuery(VtpProductsTable::getAllProductByBrand($category->id));
                $pager->setPage($page);
                $pager->init();
            }
        }
        if ($category) {
            $this->pager = $pager;
            $this->category = $category;
            $this->page = $page;
        } else {
            $this->forward404($i18n->__('Page not found!'));
        }
    }

    public function executeDetail(sfWebRequest $request)
    {
        $i18n = sfContext::getInstance()->getI18N();
        $slug = $request->getParameter('slug');
        $product = false;
        if ($slug) {
            // lay chi tiet san pham
            $product = VtpProductsTable::getProductbySlug($slug, 0);
            if ($product) {
                $this->product = $product;
            }
        }
        if (!$product) {
            $this->forward404($i18n->__('Page not found!'));
        }
    }

    //render meta tag
    public function returnHtmlSeoPage($seo_homepage)
    {
        $this->getResponse()->setTitle($seo_homepage['title']);
        $this->getResponse()->addMeta('description', $seo_homepage['description']);
        $this->getResponse()->addMeta('keywords', $seo_homepage['keywords']);
        $this->getResponse()->addMeta('og:url', $seo_homepage['og_url']);
        $this->getResponse()->addMeta('og:description', $seo_homepage['og_description']);
        $this->getResponse()->addMeta('og:image', $seo_homepage['og_image']);
        $this->getResponse()->addMeta('og:title', $seo_homepage['og_title']);
        $this->getResponse()->addMeta('og:site_name', $seo_homepage['og_site_name']);
        $this->getResponse()->addMeta('dc.title', $seo_homepage['dc_title']);
        $this->getResponse()->addMeta('dc.keywords', $seo_homepage['dc_keywords']);
        $this->getResponse()->addMeta('news_keywords', $seo_homepage['news_keywords']);
    }

    public function executeInquryNow(sfWebRequest $request)
    {

    }
}
