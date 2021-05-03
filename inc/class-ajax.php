<?php
namespace Saeyha;
use WP_Error;

class Ajax {

	public function __construct() {
		add_action( 'wp_ajax_nopriv_contact_submit', [ $this, 'contact_form' ] );
		add_action( 'wp_ajax_contact_submit', [ $this, 'contact_form' ] );
	}
	
	public function contact_form() {
		global $wpdb;
		$post_data   = wp_unslash( $_POST );
		$username    = $post_data['username'];
		$message     = $post_data['message'];
		$email       = $post_data['email'];
		$admin_email = get_option( 'admin_email' );

		if( !empty( $username ) && !empty( $email ) && !empty( $message ) ){
			$subject = 'Contact From '.$username;
			$body    = "Name: $username \n\nEmail: $email \n\nMessage: $message";
			$headers = 'From: '.$username.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;

			wp_mail( $admin_email, $subject, $body, $headers);

			$args = [
				'name'    => $post_data['username'],
				'message' => $post_data['message'],
				'email'   => $post_data['email'],
				// 'created_at'  => current_time( 'mysql' )
			];


			$insert = $wpdb->insert( "{$wpdb->prefix}investcontact", $args );


        	if ( is_wp_error( $insert ) || !$insert ) {
            	return new WP_Error( 'could-not-create', __( 'Could not create an entry', '' ) );
        	}
			
			wp_send_json_success( [
				'message' => __( 'Message Sent successfully!', 'invertment' )
			] );
		} else {
			wp_send_json_error( [
				'error' => __( 'Message Sent Fail', 'invertment')
			]);
		}
	}
}

new Ajax();