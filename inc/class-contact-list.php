<?php

	add_action( 'init', 'table_shorthand' );

	function table_shorthand() {
        global $wpdb;
        $wpdb->investcontact   = $wpdb->prefix . 'investcontact';
    }


    add_action( 'admin_menu', 'admin_menu' );

    function admin_menu() {
    	$capability = 'manage_options';
        $slug       = 'contact_list';

        $hook = add_menu_page( __( 'Contact List', 'textdomain' ), __( 'Contact List', 'textdomain' ), $capability, $slug, 'contact_list_page' , 'dashicons-text' );
    }

    function contact_list_page() { ?>

    	<div class="wrap">
    <?php
        $EntriesListTable = new Entries_List_Table();
    ?>
    <form method="post">
        <?php
            $EntriesListTable->prepare_items();
            $EntriesListTable->display();
        ?>
    </form>
</div>

    <?php }


	function contact_get_form_entries( $args = [] ) {
	    global $wpdb;

	    $defaults = [
	        'number'  => 10,
	        'offset'  => 0,
	        'orderby' => 'created_at',
	        'status'  => 'publish',
	        'order'   => 'DESC',
	    ];

	    $r = wp_parse_args( $args, $defaults );

	    $query = 'SELECT *
	            FROM ' . $wpdb->investcontact . ' ORDER BY ' . $r['orderby'] . ' ' . $r['order'];

	    if ( !empty( $r['offset'] ) && !empty( $r['number'] ) ) {
	        $query .= ' LIMIT ' . $r['offset'] . ', ' . $r['number'];
	    }

	    $results = $wpdb->get_results( $query );

	    return $results;
	}

if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Entries_List_Table extends \WP_List_Table {

    function __construct() {
        global $status, $page;

        parent::__construct(
            array(
                'singular'  => 'entry',
                'plural'    => 'entries',
                'ajax'      => true
            )
        );
    }

    public function no_items() {
        esc_html_e('You do not have any form entries yet', 'invertment' );
    }

    public function get_columns() {

        $columns = [
			'cb'         => '<input type="checkbox" />',
			'name'       => __( 'Name', 'invertment' ),
			'email'      => __( 'Email', 'invertment' ),
			'message'    => __( 'Message', 'invertment' ),
			'created_at' => __( 'Created Date', 'invertment' )
        ];

		return $columns;
    }

    public function prepare_items() {
        $columns               = $this->get_columns();
        $hidden                = array();
        $sortable              = $this->get_sortable_columns();
        $this->_column_headers = array($columns, $hidden, $sortable);

        $per_page     = 10;
        $current_page = $this->get_pagenum();

        // Query args.
        $args = array(
            'status'  => 'publish',
            'limit'   => $per_page,
            'offset'  => $per_page * ( $current_page - 1 ),
        );

        $entries = contact_get_form_entries( $args );
        $this->items = $entries;

        $this->set_pagination_args(
            array(
                'total_items' => count( $entries ),
                'per_page'    => $per_page,
                'total_pages' => ceil( count( $entries ) / $per_page ),
            )
        );

        // $this->process_bulk_action();
    }

    public function  column_default( $item, $column_name ) {
        switch ( $column_name) {
            default:
                return $item->$column_name;
                break;
        }
    }

    public function column_cb( $item ) {
        return sprintf( '<input type="checkbox" name="id[]" value="%d" />', $item->id );
    }

    // public function column_actions( $item ) {
    //     if ( isset( $_GET['status'] ) && 'trash' === $_GET['status'] ) {
    //         $actions = array(
    //                 'restore' => '<a class="submitdelete" aria-label="' . esc_attr__( 'Restore form entry', 'contact' ) . '" href="' . esc_url(
    //                     wp_nonce_url(
    //                         add_query_arg(
    //                             array(
    //                                 'action'  => 'restore',
    //                                 'id'      => $item->id,
    //                                 'form_id' => $this->form_id,
    //                             ),
    //                             admin_url( 'admin.php?page=contact-entries' )
    //                         ),
    //                         'restore-entry'
    //                     )
    //                 ) . '">' . esc_html__( 'Restore', 'contact' ) . '</a>',
    //                 'delete' => '<a class="submitdelete" aria-label="' . esc_attr__( 'Delete form entry', 'contact' ) . '" href="' . esc_url(
    //                     wp_nonce_url(
    //                         add_query_arg(
    //                             array(
    //                                 'action'  => 'delete',
    //                                 'id'      => $item->id,
    //                                 'form_id' => $this->form_id,
    //                             ),
    //                             admin_url( 'admin.php?page=contact-entries' )
    //                         ),
    //                         'delete-entry'
    //                     )
    //                 ) . '">' . esc_html__( 'Delete Permanently', 'contact' ) . '</a>',
    //         );
    //     } else{
    //         $actions = array(
    //             'view'  => '<a href="' . esc_url(
    //                 admin_url( 'admin.php?page=contact-entries&amp;form_id=' . $item->form_id .'&amp;action=view&amp;id=' . $item->id ) ) . '">' . esc_html__( 'View', 'contact' ) . '</a>',
    //                 /* translators: %s: entry name */
    //                 'trash' => '<a class="submitdelete" aria-label="' . esc_attr__( 'Trash form entry', 'contact' ) . '" href="' . esc_url(
    //                     wp_nonce_url(
    //                         add_query_arg(
    //                             array(
    //                                 'action'  => 'trash',
    //                                 'id'      => $item->id,
    //                                 'form_id' => $this->form_id,
    //                             ),
    //                             admin_url( 'admin.php?page=contact-entries' )
    //                         ),
    //                         'trash-entry'
    //                     )
    //                 ) . '">' . esc_html__( 'Trash', 'contact' ) . '</a>',
    //         );
    //     }
    //     return implode( ' <span class="sep">|</span> ', $actions );
    // }

    public function process_bulk_action() {
        $action            = $this->current_action();
        $entry_ids         = isset( $_REQUEST['id'] ) ? wp_parse_id_list( wp_unslash( $_REQUEST['id'] ) ) : array();
        $count             = 0;
        $remove_query_args = ['_wp_http_referer', '_wpnonce', 'action', 'id', 'post', 'action2','form_id' ];

        if ( $action ) {
            switch ( $action) {
                case 'restore':
                    foreach ( $entry_ids as $entry_id ) {
                        EntryManager::change_entry_status( $entry_id, 'publish' );
                        $count++;
                    }
                    break;
                case 'delete':
                    foreach ( $entry_ids as $entry_id ) {
                        EntryManager::delete_entry( $entry_id );
                        $count++;
                    }
                    break;
                case 'trash':
                    foreach ( $entry_ids as $entry_id ) {
                        EntryManager::change_entry_status($entry_id, 'trash');
                        $count++;
                    }
                    break;
            }

            $request_uri = isset( $_SERVER['REQUEST_URI'] )  ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';
            $redirect    = remove_query_arg( $remove_query_args, $request_uri );

            // wp_redirect(esc_url( $redirect ) );
            // exit();
        }
    }

    public function get_sortable_columns() {
        $sortable_columns = array();

        return $sortable_columns;
    }

    public function get_bulk_actions() {
    	$actions = [];
        // if ( isset( $_GET['status'] ) && 'trash' === $_GET['status'] ) {
        //     $actions['restore'] = __( 'Restore', 'contact' );
        //     $actions['delete']  = __( 'Delete Permanently', 'contact' );
        // } else {
        //     $actions['trash']   = __( 'Move to Trash', 'contact' );
        // }

        return $actions;
    }
}
