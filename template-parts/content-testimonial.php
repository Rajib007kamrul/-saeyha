<?php 
   
    $testimonial_img = get_theme_mod('testimonial_upload');
    $testimonial_img2 = get_theme_mod('testimonial_upload2');
    
    $service_args = array(
        'post_type' => array( 'service' ),
        'posts_per_page' => 6,
    );


    if( empty( $testimonial_img ) ) {
      $testimonial_img =  get_template_directory_uri() . '/assets/img/slider/1.png';
    }

    if( empty( $testimonial_img2 ) ) {
      $testimonial_img2 =  get_template_directory_uri() . '/assets/img/slider/4.png';
    }
?>

<div class="section" id="section4">
    <img class="experience-shape-1" src="<?php echo $testimonial_img; ?>" alt="img">
    <img class="experience-shape-2" src="<?php echo $testimonial_img2; ?>" alt="img">
    <!-- contact-area start -->
    <div class="experience-area saeyha-slider-wrap" style="background-image:url(<?php echo get_template_directory_uri() .'/assets/img/slider/2.png'; ?>)">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="experience-slider owl-carousel">

                        <?php
                            $opp_args = array(
                                'post_type' => array( 'testimonial' ),
                                'posts_per_page' => -1,
                            );

                            $opp_query = new WP_Query( $opp_args );

                            if( $opp_query->have_posts() ) :
                                while( $opp_query->have_posts() ) :
                                    $opp_query->the_post();
                                    global $post;
                                    $testimonial_name = get_post_meta( $post->ID, 'testimonial_name', true );

                        ?>

                        <div class="item">
                            <div class="section-title text-center mb-0">
                                <h3> <?php the_title();  ?> </h3>
                                <?php 
                                    if( has_post_thumbnail() ) {
                                        the_post_thumbnail( 'testimonial_image' );
                                    }
                                ?>
                            </div>
                            <p> <?php echo the_content(); ?></p>
                            <p class="name"> <?php echo $testimonial_name; ?> </p>
                        </div>


                     <?php endwhile; endif; wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact-area start -->
</div>