<?php

/**
 * Created by PhpStorm.
 * User: conghuyvn8x
 * Date: 7/6/2017
 * Time: 3:25 PM
 */
class pageNewsComponents extends sfComponents
{
    public function executeHotNew(sfWebRequest $request)
    {
        $this->hotnew = false;
        $hotnew = AdArticleTable::getHotArticle();
        if ($hotnew) {
            $this->hotnew = $hotnew;
        }
    }
}
