<?php

class Theme_Customizer {

  public function __construct() {
    add_action( 'customize_register', [ $this, 'customize_register' ] );
  }

  public function customize_register( $wp_customize ) {

  		$pages = get_pages( array ( 'parent'  => 0 ) );
		$pages = wp_list_pluck( $pages, 'post_title', 'ID' );


  		/*** Banner Section **/

		$wp_customize->add_section('banner_section',array(
			'title'    => __('Banner settings','foxhill'),
			'priority' => 10,
		));

		$wp_customize->add_setting('banner_upload', array(
			'default'   => '',
			'transport' =>'postMessage'
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'banner_upload', array(
			'label'    => __( 'Banner image' ),
			'section'  => 'banner_section',
			'settings' =>'banner_upload'
		)));

		$wp_customize->add_setting('banner_upload2', array(
			'default'   => '',
			'transport' =>'postMessage'
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'banner_upload2', array(
			'label'    => __( 'Banner Second image' ),
			'section'  => 'banner_section',
			'settings' =>'banner_upload2'
		)));


		$wp_customize->add_setting('banner_section_title', array(
		  'default' => __( '', 'robo' ),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'banner_section_title', array(
		  'label' => __( 'Title','robo' ),
		  'section' => 'banner_section',
		  'type'=>'text'
		) );

		$wp_customize->add_setting('banner_section_content', array(
		  'default' => __( '.', 'robo' ),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'banner_section_content', array(
		  'label' => __( 'Content','robo' ),
		  'section' => 'banner_section',
		  'type'=>'textarea'
		) );

		$wp_customize->add_setting('banner_link', array(
			'default'   => '',
			'transport' =>'postMessage'
		) );



		$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'banner_link', array(
			    'label'      => __( 'Read More Link', '' ),
			    'description' => __( '', '' ),
			    'settings'   => 'banner_link',
			    'priority'   => 10,
			    'section'    => 'What_section',
			    'type'    => 'select',
			    'choices' => $pages
			)
		) );


		/*** Banner Section **/


  		/*** Service Section **/

		$wp_customize->add_section('service_section',array(
			'title'    => __('Service settings','foxhill'),
			'priority' => 10,
		));

		$wp_customize->add_setting('service_upload', array(
			'default'   => '',
			'transport' =>'postMessage'
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'service_upload', array(
			'label'    => __( 'Service image' ),
			'section'  => 'service_section',
			'settings' =>'service_upload'
		)));

		$wp_customize->add_setting('service_upload2', array(
			'default'   => '',
			'transport' =>'postMessage'
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'service_upload2', array(
			'label'    => __( 'Service second image' ),
			'section'  => 'service_section',
			'settings' =>'service_upload2'
		)));

		$wp_customize->add_setting('service_section_title', array(
		  'default' => __( '', 'robo' ),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'service_section_title', array(
		  'label' => __( 'Title','robo' ),
		  'section' => 'service_section',
		  'type'=>'text'
		) );

		$wp_customize->add_setting('service_section_content', array(
		  'default' => __( '.', 'robo' ),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'service_section_content', array(
		  'label' => __( 'Content','robo' ),
		  'section' => 'service_section',
		  'type'=>'textarea'
		) );

		$wp_customize->add_setting('service_link', array(
			'default'   => '',
			'transport' =>'postMessage'
		) );



		$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'service_link', array(
			    'label'      => __( 'Read More Link', '' ),
			    'description' => __( '', '' ),
			    'settings'   => 'service_link',
			    'priority'   => 10,
			    'section'    => 'service_section',
			    'type'    => 'select',
			    'choices' => $pages
			)
		) );

		/*** Service Section **/


  		/*** Contact Section **/

		$wp_customize->add_section('contact_section',array(
			'title'    => __('Contact settings','foxhill'),
			'priority' => 10,
		));

		$wp_customize->add_setting('contact_upload', array(
			'default'   => '',
			'transport' =>'postMessage'
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'contact_upload', array(
			'label'    => __( 'Contact image' ),
			'section'  => 'contact_section',
			'settings' =>'contact_upload'
		)));

		$wp_customize->add_setting('contact_upload2', array(
			'default'   => '',
			'transport' =>'postMessage'
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'contact_upload2', array(
			'label'    => __( 'Contact Second image' ),
			'section'  => 'contact_section',
			'settings' =>'contact_upload2'
		)));

		$wp_customize->add_setting('contact_section_title', array(
		  'default' => __( '', 'robo' ),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'contact_section_title', array(
		  'label' => __( 'Title','robo' ),
		  'section' => 'contact_section',
		  'type'=>'text'
		) );


		/*** Contact Section **/


		/*** Testimonial Section **/

		$wp_customize->add_section('testimonial_section',array(
			'title'    => __('Testimonial settings','foxhill'),
			'priority' => 10,
		));

		$wp_customize->add_setting('testimonial_upload', array(
			'default'   => '',
			'transport' =>'postMessage'
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'testimonial_upload', array(
			'label'    => __( 'Testimonial image' ),
			'section'  => 'testimonial_section',
			'settings' =>'testimonial_upload'
		)));

		$wp_customize->add_setting('testimonial_upload2', array(
			'default'   => '',
			'transport' =>'postMessage'
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'testimonial_upload2', array(
			'label'    => __( 'Testimonial Second image' ),
			'section'  => 'testimonial_section',
			'settings' =>'testimonial_upload2'
		)));

		/*** end Testimonial Section **/


		/*** Social Media Section **/

		$wp_customize->add_section('social_section',array(
			'title'=> __('Social Settings','saeyha'),
			'priority'=>10,
		));

		$wp_customize->add_setting('fb_section', array(
		  'default' => __('https://www.facebook.com/','saeyha'),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'fb_section', array(
		  'label' => __( 'Facebook Link' ),
		  'section' => 'social_section',
		  'type'=>'text'
		) );

		$wp_customize->add_setting('twitter_section', array(
		  'default' => __ ( 'https://www.twitter.com/', 'saeyha' ),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'twitter_section', array(
		  'label' => __( 'Twitter Link', 'saeyha' ),
		  'section' => 'social_section',
		  'type'=>'text'
		) );
		


		$wp_customize->add_setting('linkedin_section', array(
		  'default' => __('https://linkedin.com/','saeyha'),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'linkedin_section', array(
		  'label' => __( 'Linkedin Link','saeyha' ),
		  'section' => 'social_section',
		  'type'=>'text'
		) );


		$wp_customize->add_setting('pinterest_section', array(
		  'default' => __( 'https://www.pinterest.com/', 'saeyha' ),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'pinterest_section', array(
		  'label' => __( 'Pinterest Link','saeyha'),
		  'section' => 'social_section',
		  'type'=>'text'
		) );


		/*** Social Media Section **/

		/*** CopyRight Section **/

		$wp_customize->add_section('footer_section',array(
			'title'=> __('Footer Settings','foxhill'),
			'priority'=>10,
		));

		$wp_customize->add_setting('footer_logo_upload', array(
			'default'   => '',
			'transport' =>'postMessage'
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'footer_logo_upload', array(
			'label'    => __( 'Footer Logo Upload' ),
			'section'  => 'footer_section',
			'settings' =>'footer_logo_upload'
		)));		


		$wp_customize->add_setting('copyright_section', array(
		  'default' => __( '', 'robo' ),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'copyright_section', array(
		  'label' => __( 'Copy Right Text','robo' ),
		  'section' => 'footer_section',
		  'type'=>'text'
		) );
  }
}

new Theme_Customizer();