<?php 
    get_header(); 
    get_template_part( 'template-parts/content', 'social' ); 
?>
    <!-- fullpage slider start -->
    <div class="fha-fullpage-slider" id="fullpage">
        
        <?php 
            get_template_part( 'template-parts/content', 'banner' ); 
            get_template_part( 'template-parts/content', 'service' ); 
            get_template_part( 'template-parts/content', 'contact' ); 
            get_template_part( 'template-parts/content', 'testimonial' ); 
        ?>

<?php get_footer(); ?>