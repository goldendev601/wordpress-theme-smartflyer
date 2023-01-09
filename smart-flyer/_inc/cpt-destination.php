<?php
	
function register_cpt_destination()
{
	 $labels = array( 
        'name' => _x( 'Destination', 'destination' ),
        'singular_name' => _x( 'Destination', 'destination' ),
        'add_new' => _x( 'Add New', 'destination' ),
        'add_new_item' => _x( 'Add New Review', 'destination' ),
        'edit_item' => _x( 'Edit Destination', 'destination' ),
        'new_item' => _x( 'New Destination', 'destination' ),
        'view_item' => _x( 'View Destination', 'destination' ),
        'search_items' => _x( 'Search Destination', 'destination' ),
        'not_found' => _x( 'No Destinations found', 'destination' ),
        'not_found_in_trash' => _x( 'No Destination found in Trash', 'destination' ),
        'parent_item_colon' => _x( 'Parent Destination:', 'destination' ),
        'menu_name' => _x( 'Destinations', 'edit' )
    );
	$args = array(
		'labels'        => $labels,
		'description'   => 'Destination',
		'public'        => true,
		'supports'      => array( 'title','thumbnail'),
		'has_archive'   => false,
		'rewrite' 		=> array( 'with_front' => false ),
		'menu_icon' 	=> 'dashicons-media-spreadsheet',
	);
	register_post_type( 'destination', $args ); 
}
add_action( 'init', 'register_cpt_destination' );

add_action( 'cmb2_init', 'smartflyer_register_destination_metabox' );
function smartflyer_register_destination_metabox() {

	$prefix = '_destination_';

	$cmb = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Destination Extras', 'cmb2' ),
		'object_types'  => array( 'destination'), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
	) );

	$cmb->add_field( array(
		'name' => __( 'Hero Background', 'cmb2' ),
		'id'   => $prefix . 'hero_background',
		'type' => 'file',
	) );

	$cmb->add_field( array(
		'name' => __( 'Hero Title', 'cmb2' ),
		'id'   => $prefix . 'hero_title',
		'type' => 'text',
	) );

	$cmb->add_field( array(
		'name' => __( 'Hero Icon', 'cmb2' ),
		'id'   => $prefix . 'hero_icon',
		'type' => 'file',
	) );
	
	$cmb->add_field( array(
		'name' => __( 'Section Title', 'cmb2' ),
		'id'   => $prefix . 'section_title',
		'type' => 'text',
	) );

	$cmb->add_field( array(
		'name' => __( 'Section Description', 'cmb2' ),
		'id'   => $prefix . 'section_description',
		'type' => 'textarea_small',
	) );

	$cmb->add_field( array(
		'name' => __( 'Section Image 1', 'cmb2' ),
		'id'   => $prefix . 'section_image_1',
		'type' => 'file',
	) );

	$cmb->add_field( array(
		'name' => __( 'Section Image 2', 'cmb2' ),
		'id'   => $prefix . 'section_image_2',
		'type' => 'file',
	) );

	$cmb->add_field( array(
		'name' => __( 'Section Image 3', 'cmb2' ),
		'id'   => $prefix . 'section_image_3',
		'type' => 'file',
	) );

	$cmb->add_field( array(
		'name' => __( 'Middle Section Description', 'cmb2' ),
		'id'   => $prefix . 'middle_section_description',
		'type' => 'textarea_small',
	) );
	
}

