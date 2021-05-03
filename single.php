<?php  get_header(); ?>

	<?php
	    if( have_posts() ):
	        while ( have_posts() ) : the_post();
	        	if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
	        endwhile;
	    else:
	    	get_template_part( 'template-parts/content', 'none' );
	    endif;
	?>
	
<?php get_footer(); ?>