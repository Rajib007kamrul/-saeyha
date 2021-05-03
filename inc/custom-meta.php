<?php

add_action( 'admin_init', 'add_meta_boxes' );

function add_meta_boxes() {
    add_meta_box( 'testimonial_metabox', __( 'Testimonial Information', 'visgo' ), 'testimonial_post_meta', [ 'testimonial' ] );
}

function testimonial_post_meta() {
	global $post;

	$testimonial_name = get_post_meta( $post->ID, 'testimonial_name', true );
?>

	<table>
		<tbody>
			<tr class="form-field">
				<td>
					<label> Name </label>
					<input type="text" name="testimonial_name" value="<?php if( isset( $testimonial_name ) ) { echo $testimonial_name; } ?>">
				</td>
			</tr>
		</tbody>
	</table>
<?php
}

add_action( 'save_post', 'save_testimonial_field', 10, 2 );

function save_testimonial_field( $post_id, $post ) {

	if( 'testimonial' != $post->post_type )
		return ;


	if( isset( $_POST['testimonial_name'] ) ) {
		update_post_meta( $post_id, 'testimonial_name', $_POST['testimonial_name'] );
	}
}