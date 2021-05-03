<?php 

    $title  =  get_theme_mod('service_section_title');
    $content = get_theme_mod('service_section_content');
    $service_img = get_theme_mod('service_upload');
    $service_img2 = get_theme_mod('service_upload2');
    $service_link = get_theme_mod( 'service_link' );
    
    $service_args = array(
        'post_type' => array( 'services' ),
        'posts_per_page' => 6,
    );


    if( empty( $service_img ) ) {
      $service_img =  get_template_directory_uri() . '/assets/img/service/1.png';
    }

    if( empty( $service_img2 ) ) {
      $service_img2 =  get_template_directory_uri() . '/assets/img/service/3.png';
    }
?>

<div class="section" id="section2">
    <img class="service-shape-1" src="<?php echo $service_img; ?>" alt="img">
    <img class="service-shape-3" src="<?php echo $service_img2; ?>" alt="img">
    <!-- service-area start -->
    <div id="services" class="service-area">
        <div class="service-inner-wrap">
            <div class="row m-0 p-0">
                <div class="col-lg-4 m-0 p-0">
                    <div class="service-single-inner">
                        <h4> <?php echo $title; ?> </h4>
                        <p> <?php echo $content; ?> </p>
                        <a class="btn btn-white-border" href="#">Talk to us</a>
                    </div>
                </div>
                <div class="col-lg-8 saeyha-tab-wrap m-0 p-0" style="background-image:url(<?php echo get_template_directory_uri() .'/assets/img/service/2.png'; ?>)">
                    <ul class="nav nav-tabs saeyha-tab-inner" id="myTab" role="tablist">
                        <?php
                            $servicetitle_query = new WP_Query( $service_args );
                            $i = 1;

                            if( $servicetitle_query->have_posts() ) :
                                while( $servicetitle_query->have_posts() ) : $servicetitle_query->the_post();
                                    global $post;
                                    
                                    $activeClass = '';

                                    if( $i == 1 ) {
                                        $activeClass = 'show active';
                                    }
                        ?>
                        <li class="nav-item">
                            <a data-toggle="tab" class="nav-link <?php echo $activeClass; ?>" id="<?php echo $post->ID; ?>" data-toggle="tab" href="#<?php echo $post->ID; ?>" role="tab" aria-controls="one" aria-selected="true"> <?php echo $i; ?> </a>
                        </li>

                        <?php $i++; endwhile; endif; wp_reset_postdata(); ?>
                    </ul>

                    <div class="tab-content saeyha-tab-content" id="myTabContent">
                        <?php
                            $service_query = new WP_Query( $service_args );
                            $j = 1;
                            if( $service_query->have_posts() ) :
                                while( $service_query->have_posts() ) : $service_query->the_post();
                                    global $post;
                                   
                                    $contentClass = '';
                                   
                                    if( $j ==1 ) {
                                        $contentClass = 'show active';
                                    }
                        ?>
                        
                        <div class="tab-pane fade <?php echo $contentClass; ?>" id="<?php echo $post->ID; ?>" role="tabpanel" aria-labelledby="one-tab">
                            <h4> <?php the_title(); ?> </h4>
                            <p> <?php the_content(); ?> </p>
                        </div>
                        
                        <?php $j++; endwhile; endif; wp_reset_postdata(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service-area end -->
</div>