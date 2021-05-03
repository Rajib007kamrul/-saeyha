    <div class="section" id="section5" style="background-image:url(<?php echo get_template_directory_uri() .'/assets/img/slider/footer.png'; ?>)">
        <!-- footer-area start -->
        <div class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 about-widget-wrap">
                        <h5 class="widget-title pl-lg-5">SUPPORT</h5>
                        <div class="widget widget_nav_menu pl-lg-5">
                            <ul>
                                <li><a href="#">CONTACT</a></li>
                            </ul>
                        </div>

                        <div class="about-widget">
                            <?php
                                $footer_logo = get_theme_mod( 'footer_logo_upload' );
                                if ( empty( $footer_logo ) ) {
                                  $footer_logo = get_template_directory_uri() . '/assets/img/logo3.png';
                                }
                            ?>
                            <img class="mb-2" src="<?php echo $footer_logo; ?>" alt="img">
                            <p> <?php echo get_theme_mod( 'copyright_section' ); ?></p>
                        </div>
                    </div>
                    <div class="col-lg-3 widget_nav_menu_wrap">
                        <h5 class="widget-title">COMPANY</h5>
                        <div class="widget widget_nav_menu">
                            <ul>
                                <li><a href="#">OUR MISSION</a></li>
                                <li><a href="#">OUR VALUES</a></li>
                                <li><a href="#">OUR TEAM</a></li>
                                <li><a href="#">CAREER</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-area end -->
    </div>
</div>
<!-- fullpage slider end -->
    
    <?php wp_footer(); ?>
</body>
</html>