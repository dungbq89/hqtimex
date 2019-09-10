<?php
$listImage = $product->getListImage();
$imageFirst = [];
if (!empty($listImage)) {
    $imageFirst = $listImage[0];
    $pathImg = '/uploads/' . sfConfig::get('app_product_images') . $imageFirst['file_path'];
}
?>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li><a href="shop.html">shop</a></li>
                        <li><a href="shop.html">Clothing</a></li>
                        <li>product details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--product details start-->
<div class="product_details mt-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product-details-tab">

                    <div id="img-1" class="zoomWrapper single-zoom">
                        <a href="#">
                            <?php

                            ?>
                            <img id="zoom1"
                                 src="<?php echo VtHelper::getThumbUrl($pathImg, 538, 538) ?>"
                                 data-zoom-image="<?php echo $pathImg ?>" alt="big-1">
                        </a>
                    </div>

                    <div class="single-zoom-thumb">
                        <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">

                            <?php
                            if (!empty($listImage)) {
                                for ($i = 1; $i < count($listImage); $i++) {
                                    $image = $listImage[$i];
                                    $pathImg = '/uploads/' . sfConfig::get('app_product_images') . $image['file_path'];
                                    ?>
                                    <li>
                                        <a href="#" class="elevatezoom-gallery active" data-update=""
                                           data-image="<?php echo $pathImg ?>"
                                           data-zoom-image="<?php echo $pathImg ?>">
                                            <img src="<?php echo VtHelper::getThumbUrl($pathImg, 95, 95) ?>"
                                                 alt="zo-th-1"/>
                                        </a>

                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product_d_right">
                    <form action="#">

                        <h1><?php echo htmlentities($product->product_name) ?></h1>

                        <div class="product_nav">
                            <ul>
                                <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </div>
                        <div class=" product_ratting">
                            <ul>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="review"><a href="#"> (customer review ) </a></li>
                            </ul>

                        </div>
                        <div class="price_box">
                            <span class="current_price">$<?php echo VtHelper::formatPrice($product->price) ?></span>
                            <span
                                class="old_price"><?php echo $product->price_promotion ? '$' . VtHelper::formatPrice($product->price_promotion) : '' ?></span>

                        </div>
                        <div class="product_desc">
                            <p>
                                <?php echo nl2br(htmlspecialchars(($product->description))) ?>
                            </p>
                        </div>
                        <!--                        <div class="product_variant color">-->
                        <!--                            <h3>--><?php //echo __('Available Options') ?><!--</h3>-->
                        <!--                            <label>color</label>-->
                        <!--                            <ul>-->
                        <!--                                <li class="color1"><a href="#"></a></li>-->
                        <!--                                <li class="color2"><a href="#"></a></li>-->
                        <!--                                <li class="color3"><a href="#"></a></li>-->
                        <!--                                <li class="color4"><a href="#"></a></li>-->
                        <!--                            </ul>-->
                        <!--                        </div>-->
                        <div class="product_variant quantity">
                            <!--                            <label>quantity</label>-->
                            <!--                            <input min="0" max="100" value="1" type="number">-->
                            <button class="button" type="submit">add to cart</button>

                        </div>
                        <!--                        <div class=" product_d_action">-->
                        <!--                            <ul>-->
                        <!--                                <li><a href="#" title="Add to wishlist">+ Add to Wishlist</a></li>-->
                        <!--                                <li><a href="#" title="Add to wishlist">+ Compare</a></li>-->
                        <!--                            </ul>-->
                        <!--                        </div>-->
                        <!--                        <div class="product_meta">-->
                        <!--                            <span>Category: <a href="#">Clothing</a></span>-->
                        <!--                        </div>-->

                    </form>
                    <div class="priduct_social">
                        <ul>
                            <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i> Like</a>
                            </li>
                            <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>
                            <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i> save</a>
                            </li>
                            <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i> share</a>
                            </li>
                            <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i> linked</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--product details end-->

<!--product info start-->
<div class="product_d_info">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_d_inner">
                    <div class="product_info_button">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info"
                                   aria-selected="false"><?php echo __('Description') ?></a>
                            </li>
                            <!--                            <li>-->
                            <!--                                <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet"-->
                            <!--                                   aria-selected="false">Specification</a>-->
                            <!--                            </li>-->
                            <!--                            <li>-->
                            <!--                                <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"-->
                            <!--                                   aria-selected="false">Reviews (1)</a>-->
                            <!--                            </li>-->
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <div class="product_info_content">
                                <?php echo VtHelper::strip_html_tags_and_decode($product->content); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product info end-->

<?php include_component('pageProduct', 'productRelated', array('catId' => $product->category_id)) ?>
