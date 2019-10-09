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
        $this->inquiryNowForm = new InquiryNowFront();
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

    public function executeSearch(sfWebRequest $request)
    {
        $this->queryName = $queryName = $request->getParameter('keyword');
        if ($queryName) {
            $this->keyword = $queryName;
            $this->url_paging = 'page_search';
            $this->page = $this->getRequestParameter('page', 1);
            $pager = new sfDoctrinePager('VtpProducts', 21);
            $pager->setQuery(VtpProductsTable::getSearchProduct($queryName));
            $pager->setPage($this->page);
            $pager->init();
            $this->pager = $pager;
            $this->listProduct = $pager->getResults();
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

    public function executeInquiryNow(sfWebRequest $request)
    {
        $this->getResponse()->setHttpHeader('Content-type', 'application/json');
        $form = new InquiryNowFront();
        $values = $request->getParameter($form->getName());
        $form->bind(($values));
        $valid = 1;
        if ($form->isValid()) {
            $obj = new Booking();
            $obj->setFullName($values['full_name']);
            $obj->setPhone($values['phone']);
            $obj->setEmail($values['email']);
            $obj->setCountry($values['country']);
            $obj->setBody($values['body']);
//            $obj->setAddress($values['address']);
            $obj->setShippingTerm($values['shipping_term']);
//            $obj->setSubject($values['subject']);
            $obj->setRequirement($values['requirement']);
            $obj->setLang(sfContext::getInstance()->getUser()->getCulture());
            $obj->save();
            $valid = 0;
        }
        foreach ($form->getValidatorSchema() as $e) {
//            var_dump($e->getMessage());
        }
//        else {
        $html = $this->getPartial('pageProduct/inquiryNowForm', array('form' => $form, 'valid' => $valid));
//        }
        $arrReturn = [
            'errCode' => $valid,
            'html' => $html,
        ];
        return $this->renderText(json_encode($arrReturn));
    }

    public function executePageInquiryNow(sfWebRequest $request)
    {
        $i18n = sfContext::getInstance()->getI18N();
        $slug = $request->getParameter('slug');
        $form = new InquiryNowFront();
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
        $message = "";
        $valid = '';
        if ($request->isMethod('post')) {
            $values = $request->getParameter($form->getName());
            $form->bind(($values));
            if ($form->isValid()) {
                $obj = new Booking();
                $obj->setFullName($values['full_name']);
                $obj->setPhone($values['phone']);
                $obj->setEmail($values['email']);
                $obj->setCountry($values['country']);
                $obj->setBody($values['body']);
//                $obj->setAddress($values['address']);
                $obj->setShippingTerm($values['shipping_term']);
//                $obj->setSubject($values['subject']);
                $obj->setRequirement($values['requirement']);
                $obj->setLang(sfContext::getInstance()->getUser()->getCulture());
                $obj->save();
                $valid = 0;
            }else{
                $valid = 1;
            }
        }
        $this->form = $form;
        $this->valid = $valid;
    }

    public function executePopupInquiryNow(sfWebRequest $request)
    {
        $this->getResponse()->setHttpHeader('Content-type', 'application/json');
        $form = new InquiryNowFront();
        $slug = $request->getParameter('slug');
        $product = false;
        $listImage = false;
        if ($slug) {
            $product = VtpProductsTable::getProductbySlug($slug, 0);
            if ($product) {
                $listImage = $product->getListImage();
            }
        }
        $html = $this->getPartial('pageProduct/inquiryNow', array('form' => $form,
            'product' => $product, 'listImage' => $listImage));
        $arrReturn = [
            'html' => $html,
        ];
        return $this->renderText(json_encode($arrReturn));
    }

}
