<?php

/**
 * pageNewsDetails actions.
 *
 * @package    Vt_Portals
 * @subpackage pageNewsDetails
 * @author     ngoctv1
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pageIntroductionActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $lang = sfContext::getInstance()->getUser()->getCulture();
        if($lang == 'en'){
            $html = AdHtmlTable::getHtmlById(61);
        }else{
            $html = AdHtmlTable::getHtmlById(62);
        }
        if($html){
            $this->html = $html;
        }
        else{
            return $this->redirect404();
        }
    }

    public function executeContact(sfWebRequest $request)
    {

    }

}
