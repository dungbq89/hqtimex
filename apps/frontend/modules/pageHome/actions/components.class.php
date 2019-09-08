<?php

/**
 * Created by PhpStorm.
 * User: conghuyvn8x
 * Date: 7/6/2017
 * Time: 3:25 PM
 */
class pageHomeComponents extends sfComponents
{
    public function executeSlide(sfWebRequest $request)
    {
        $this->slide = AdAdvertiseTable::getAdvertiseV2('homepage');
    }

    public function executeDepartment($request)
    {
        $department = HqBrandTable::getBrandByParentID(null, 10);
        $data = array();
        if($department && count($department)){
            foreach ($department as $depart){
                $departChild = HqBrandTable::getBrandByParentID($depart['id'], 10);
                $depart['childs'] = $departChild;
                $data[] = $depart;
            }
        }
        $this->data = $data;
    }

    public function executeSlideShow($request)
    {

    }
}
