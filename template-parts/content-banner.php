<?php
   $title           = get_theme_mod('banner_section_title');
   $content         = get_theme_mod('banner_section_content');
   $banner_img      = get_theme_mod('banner_upload');
   $banner_img2     = get_theme_mod('banner_upload2');
   $banner_link     = get_theme_mod('banner_link');

    if( empty( $banner_img ) ) {
      $banner_img =  get_template_directory_uri() . '/assets/img/banner/1.png';
    }

    if( empty( $banner_img2 ) ) {
      $banner_img2 =  get_template_directory_uri() . '/assets/img/banner/2.png';
    }
?>

<div class="section" id="section1">
    <img class="banner-shape-1" src="<?php echo $banner_img; ?>" alt="img">
    <img class="banner-shape-2" src="<?php echo $banner_img2; ?>" alt="img">
    <!-- banner-area start -->
    <div class="banner-area">
        <div class="banner-inner-wrap">
            <div class="row">
                <div class="col-lg-5">
                    <h4> <?php echo $title; ?> </h4>
                    <p> <?php echo $content; ?> </p>
                    <a class="btn btn-white-border intro-select" href="#services">Explore our services</a>
                </div>
                <div class="col-lg-7">
                    <h2><span>MAKING YOUR</span> <br> START-UP DREAM COME TRUE</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-area end -->
</div>
