<?php
	
function register_cpt_press()
{
	 $labels = array( 
        'name' => _x( 'Press', 'press' ),
        'singular_name' => _x( 'Press', 'press' ),
        'add_new' => _x( 'Add New', 'press' ),
        'add_new_item' => _x( 'Add New Press', 'press' ),
        'edit_item' => _x( 'Edit Press', 'press' ),
        'new_item' => _x( 'New Press', 'press' ),
        'view_item' => _x( 'View Press', 'press' ),
        'search_items' => _x( 'Search Press', 'press' ),
        'not_found' => _x( 'No Press found', 'press' ),
        'not_found_in_trash' => _x( 'No Press found in Trash', 'press' ),
        'parent_item_colon' => _x( 'Parent Press:', 'press' ),
        'menu_name' => _x( 'Press', 'edit' )
    );
	$args = array(
		'labels'        => $labels,
		'description'   => 'Press',
		'public'        => true,
		'supports'      => array( 'title','thumbnail'),
		'has_archive'   => false,
		'rewrite' 		=> array( 'with_front' => false ),
		'menu_icon' 	=> 'dashicons-groups',
	);
	register_post_type( 'press', $args ); 
}
add_action( 'init', 'register_cpt_press' );


add_action( 'cmb2_init', 'smartflyer_register_press_metabox' );
function smartflyer_register_press_metabox() {

	$prefix = '_press_';

	$cmb = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Press Extras', 'cmb2' ),
		'object_types'  => array( 'press'), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
	) );
	
	$cmb->add_field( array(
		'name' => __( 'Company', 'cmb2' ),
		'id'   => $prefix . 'company',
		'type' => 'text',
	) );
	
	$cmb->add_field( array(
		'name' => __( 'Link', 'cmb2' ),
		'id'   => $prefix . 'link',
		'type' => 'text',
	) );
	
	
	$cmb->add_field( array(
		'name' => __( 'Image', 'cmb2' ),
		'id'   => $prefix . 'img_link',
		'type' => 'file',
	) );
	
	$cmb->add_field( array(
		'name' => __( 'Date', 'cmb2' ),
		'id'   => $prefix . 'date',
		'type' => 'text_date_timestamp',
	) );
	
	$cmb->add_field( array(
		'name' => __( 'Featured?', 'cmb2' ),
		'id'   => $prefix . 'featured',
		'type' => 'checkbox',
	) );
	
	
	$cmb->add_field( array(
		'name' => __( 'Logo white', 'cmb2' ),
		'id'   => $prefix . 'image_white',
		'type' => 'file',
	) );
	
	
	$args = array(
		'post_type' => array('agent','team'),
		'numberposts' => -1,
		'orderby' => 'title',
		'order' => 'ASC',
	);
	$post_options = array();
	$post_options[] = 'Select Agent';
	$posts = get_posts( $args );
	if ( $posts ) {
		foreach ( $posts as $post ) {
			$post_options[ $post->ID ] = $post->post_title;
		}
	}
	
	$cmb->add_field( array(
		'name' => __( 'Post by Agent', 'cmb2' ),
		'id'   => $prefix . 'agent',
		'type'    => 'pw_multiselect',
		'options' => $post_options
	) );
}