<!-- Main Wrapper Start -->
<!--header area start-->
<header class="header_area">
    <!--header top start-->
    <div class="header_top">
        <div class="container">
            <div class="top_inner">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="follow_us">
                            <label><?php echo __('Follow Us'); ?>:</label>
                            <ul class="follow_link">
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                <li><a href="#"><i class="ion-social-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="top_right text-right">
                            <ul>
                                <li class="language"><a href="#"><img src="./assets/img/logo/language.png" alt="">en - vi<i class="ion-ios-arrow-down"></i></a>
                                    <ul class="dropdown_language">
                                        <li><a href="#"><img src="./assets/img/logo/language.png" alt=""> <?php echo __('English'); ?></a></li>
                                        <li><a href="#"><img src="./assets/img/logo/language2.png" alt=""> <?php echo __('Vietnamese'); ?></a></li>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header top start-->
    <!--header middel start-->
    <div class="header_middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6">
                    <div class="logo">
                        <a href="<?php echo url_for('homepage'); ?>"><img src="../images/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-6">
                    <div class="middel_right">
                        <div class="search-container">
                            <form action="#">
                                <div class="search_box">
                                    <input placeholder="<?php echo __('Search entire store here'); ?> ..." type="text">
                                    <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header middel end-->
    <!--header bottom satrt-->
    <div class="header_bottom sticky-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="main_menu header_position">
                        <nav>
                            <ul>

                                <li><a href="#"><?php echo __('Home'); ?></a></li>
                                <li><a href="#"><?php echo __('Products'); ?><i class="fa fa-angle-down"></i></a>
                                    <ul class="sub_menu pages">
                                        <li><a href="blog-details.html">blog details</a></li>
                                        <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                        <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                    </ul>
                                </li>

                                <li><a href="#"><?php echo __('Services'); ?></a></li>
                                <li><a href="#"><?php echo __('News'); ?></a></li>
                                <li><a href="#"><?php echo __('About Us'); ?></a></li>
                                <li><a href="#"><?php echo __('Contact Us'); ?></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--header bottom end-->

</header>
<!--header area end-->

<!--Offcanvas menu area start-->
<div class="Offcanvas_menu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="canvas_open">
                    <span>MENU</span>
                    <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                </div>
                <div class="Offcanvas_menu_wrapper">

                    <div class="canvas_close">
                        <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                    </div>
                    <div class="top_right text-right">
                        <ul>
                            <li class="language"><a href="#"><img src="./assets/img/logo/language.png" alt="">en - vi<i class="ion-ios-arrow-down"></i></a>
                                <ul class="dropdown_language">
                                    <li><a href="#"><img src="./assets/img/logo/language.png" alt=""><?php echo __('English'); ?></a></li>
                                    <li><a href="#"><img src="./assets/img/logo/language2.png" alt=""><?php echo __('Vietnamese'); ?></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="Offcanvas_follow">
                        <label>Follow Us:</label>
                        <ul class="follow_link">
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#"><i class="ion-social-youtube"></i></a></li>
                        </ul>
                    </div>

                    <div class="search-container">
                        <form action="#">
                            <div class="search_box">
                                <input placeholder="Search entire store here ..." type="text">
                                <button type="submit"><i class="ion-ios-search-strong"></i></button>
                            </div>
                        </form>
                    </div>
                    <div id="menu" class="text-left ">
                        <ul>

                            <li><a href="#"><?php echo __('Home'); ?></a></li>
                            <li><a href="#"><?php echo __('Products'); ?></a>
                                <ul>
                                    <li><a href="blog-details.html">blog details</a></li>
                                    <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                    <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                </ul>
                            </li>

                            <li><a href="#"><?php echo __('Services'); ?></a></li>
                            <li><a href="#"><?php echo __('News'); ?></a></li>
                            <li><a href="#"><?php echo __('About Us'); ?></a></li>
                            <li><a href="#"><?php echo __('Contact Us'); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!--Offcanvas menu area end-->
