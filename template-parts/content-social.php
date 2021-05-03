<?php
    
   $facebook  = get_theme_mod( 'fb_section' );
   $twitter   = get_theme_mod( 'twitter_section' );
   $linkedin  = get_theme_mod( 'linkedin_section' );
   $pinterest = get_theme_mod( 'pinterest_section' );
?>

  <div class="banner-social">
      <span> <?php esc_html_e( 'OUR SOCIAL', 'saeyha' ); ?> </span>
      <ul>
          <li><a href="<?php echo esc_url( $pinterest ); ?>"><i class="fa fa-pinterest"></i></a></li>
          <li><a href="<?php echo esc_url( $linkedin ); ?>"><i class="fa fa-linkedin"></i></a></li>
          <li><a href="<?php echo esc_url( $facebook ); ?>"><i class="fa fa-facebook"></i></a></li>
          <li><a href="<?php echo esc_url( $twitter ); ?>"><i class="fa fa-twitter"></i></a></li>
      </ul>
  </div>
