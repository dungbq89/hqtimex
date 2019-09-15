<?php
$products = $pager->getResults();
?>
<!--slider area start-->
<section class="slider_section mb-50">
    <div class="container">
        <div class="row">
            <?php include_component('pageHome', 'department'); ?>

            <div class="col-lg-9 col-md-12">
                <!--shop wrapper start-->
                <!--shop toolbar start-->
                <div class="shop_title">
                    <h1><?php echo __('SEARCH RESULTS: ').htmlspecialchars($queryName); ?></h1>
                </div>
                <!--shop toolbar end-->
                <?php include_partial('pageProduct/listProduct', array('products' => $products)) ?>
            </div>
            <!--shop toolbar end-->
            <!--shop wrapper end-->
        </div>
    </div>
    </div>

</section>