
<!--slider area start-->
<section class="slider_section mb-50">
    <div class="container">
        <div class="row">
            <?php include_component('pageHome', 'department'); ?>
            <?php include_component('pageHome', 'slideShow'); ?>

        </div>
    </div>

</section>

<!--slider area end-->

<?php include_partial('pageHome/shipping'); ?>
<!--product area start-->

<?php include_component('pageHome','productCategoryHot'); ?>


<!--product area end-->
<?php include_component('pageHome','service'); ?>

<!--brand area start-->
<div class="brand_area mb-42">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="brand_container owl-carousel">
                    <div class="single_brand">
                        <a href="#"><img src="./assets/img/brand/brand2.png" alt="" style="height: 80px;"></a>
                    </div>
                    <div class="single_brand">
                        <a href="#"><img src="./assets/img/brand/brand3.png" alt="" style="height: 80px;"></a>
                    </div>
                    <div class="single_brand">
                        <a href="#"><img src="./assets/img/brand/brand4.png" alt="" style="height: 80px;"></a>
                    </div>
                    <div class="single_brand">
                        <a href="#"><img src="./assets/img/brand/brand1.png" alt="" style="height: 80px;"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--brand area end-->