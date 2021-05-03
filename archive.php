<?php get_header(); ?>
	<?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();

			endwhile;
		else :
			
		endif;
	?>
<?php get_footer(); ?>