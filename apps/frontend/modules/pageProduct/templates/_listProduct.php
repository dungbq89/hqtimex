<?php
/**
 * Created by PhpStorm.
 * User: conghuyvn8x
 * Date: 9/11/2019
 * Time: 9:59 PM
 */
?>
<div class="row shop_wrapper">
    <?php
    if (count($products) > 0) {
        foreach ($products as $product) {
            $pathImg = '/uploads/' . sfConfig::get('app_product_images') . $product->image_path;
            $link = url_for1('@hq_product_detail?slug=' . $product->slug);
            ?>
            <div class="col-lg-4 col-md-4 col-12 ">
                <div class="single_product">
                    <div class="product_name grid_name">
                        <h3><a href="<?php echo $link ?>"><?php echo $product->product_name ?></a></h3>

                        <p class="manufacture_product"><a href="#"><?php echo __('Accessories') ?></a>
                        </p>
                    </div>
                    <div class="product_thumb">
                        <a class="primary_img" href="<?php echo $link ?>"><img
                                src="<?php echo VtHelper::getThumbUrl($pathImg, 227, 227) ?>"
                                alt=""></a>
                        <a class="secondary_img" href="<?php echo $link ?>"><img
                                src="<?php echo VtHelper::getThumbUrl($pathImg, 227, 227) ?>"
                                alt=""></a>

                        <!--                                <div class="label_product">-->
                        <!--                                    <span class="label_sale">-47%</span>-->
                        <!--                                </div>-->
                        <!--                                <div class="action_links">-->
                        <!--                                    <ul>-->
                        <!--                                        <li class="quick_button"><a href="#" data-toggle="modal"-->
                        <!--                                                                    data-target="#modal_box" title="quick view"> <span-->
                        <!--                                                    class="lnr lnr-magnifier"></span></a></li>-->
                        <!--                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span-->
                        <!--                                                    class="lnr lnr-heart"></span></a></li>-->
                        <!--                                        <li class="compare"><a href="#" title="compare"><span-->
                        <!--                                                    class="lnr lnr-sync"></span></a></li>-->
                        <!--                                    </ul>-->
                        <!--                                </div>-->
                    </div>
                    <div class="product_content grid_content">
                        <div class="content_inner">
                            <div class="product_ratings">
                                <ul>
                                    <li><a href="#"><i class="ion-star"></i></a></li>
                                    <li><a href="#"><i class="ion-star"></i></a></li>
                                    <li><a href="#"><i class="ion-star"></i></a></li>
                                    <li><a href="#"><i class="ion-star"></i></a></li>
                                    <li><a href="#"><i class="ion-star"></i></a></li>
                                </ul>
                            </div>
                            <div class="product_footer d-flex align-items-center">
                                <div class="price_box">
                                            <span class="current_price">
                                                <?php echo (!empty($product->price_promotion)) ? sprintf('$%s', VtHelper::formatPrice($product->price_promotion)) : !empty($product->price) ? sprintf('$%s', VtHelper::formatPrice($product->price)) : '' ?>
                                            </span>
                                            <span class="old_price">
                                                <?php echo (!empty($product->price)) ? sprintf('$%s', VtHelper::formatPrice($product->price)) : '' ?>
                                            </span>
                                </div>
                                <div class="add_to_cart">
                                    <a href="cart.html" title="add to cart"><span
                                            class="lnr lnr-cart"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php
        }
    }
    ?>


</div>
