<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Saeyha</title>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

      <?php
        $custom_logo_id = get_theme_mod( 'custom_logo' );
      ?>



    <!-- preloader area start -->
    <!-- <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <img src="assets/img/preloader.png" alt="preloader">
            </div>
        </div>
    </div> -->
    <!-- preloader area end -->
    <!-- <div class="body-overlay" id="body-overlay"></div> -->
    
    <!-- menu area start -->
    <div class="menu-inner">
        <div class="container">
            <div class="menu-inner-wrap">
                <span class="menu-close"><img src="<?php echo get_template_directory_uri() . '/assets/img/icon/1.svg'; ?>" alt="img"></span>
                <div class="row">
                    <div class="col-lg-5">
                        <h2 data-sal="slide-up" data-sal-delay="300" data-sal-duration="1200"><a href="about.html">Menu</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- menu area start -->

    <!-- navbar start -->
    <div class="navbar-area">
        <div class="navbar-inner">
            <div class="row m-0 p-0">
                <div class="col-6">
                    <a href="<?php echo home_url(); ?>" class="logo">
                        <?php 
                            if ( has_custom_logo() ) {
                                $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                                echo '<img src="'. $logo[0] .'" alt="logo">';
                            } else {
                                 $logo = get_template_directory_uri() . '/assets/img/logo.png';;
                                echo '<img src="<?php echo $logo; ?>" alt="logo">';
                            } 
                        ?>  
                    </a>
                </div>
                <div class="col-6 align-self-center">
                    <div class="navbar-right text-right">
                        <ul class="dropdown-menu-btn">
                            <li class="line"></li>
                            <li class="line"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- navbar end -->