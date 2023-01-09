<?php
	
function register_cpt_office()
{
	 $labels = array( 
        'name' => _x( 'Office', 'office' ),
        'singular_name' => _x( 'Office', 'office' ),
        'add_new' => _x( 'Add New', 'office' ),
        'add_new_item' => _x( 'Add New Office', 'office' ),
        'edit_item' => _x( 'Edit Office', 'office' ),
        'new_item' => _x( 'New Office', 'office' ),
        'view_item' => _x( 'View Office', 'office' ),
        'search_items' => _x( 'Search Office', 'office' ),
        'not_found' => _x( 'No Offices found', 'office' ),
        'not_found_in_trash' => _x( 'No Office found in Trash', 'office' ),
        'parent_item_colon' => _x( 'Parent Office:', 'office' ),
        'menu_name' => _x( 'Offices', 'edit' )
    );
	$args = array(
		'labels'        => $labels,
		'description'   => 'Office',
		'public'        => true,
		'supports'      => array( 'title'),
		'has_archive'   => false,
		'rewrite' 		=> array( 'with_front' => false ),
		'menu_icon' 	=> 'dashicons-admin-home',
	);
	register_post_type( 'office', $args ); 
}
add_action( 'init', 'register_cpt_office' );


add_action( 'cmb2_init', 'smartflyer_register_office_metabox' );
function smartflyer_register_office_metabox() {

	$prefix = '_office_';

	$cmb = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Office Extras', 'cmb2' ),
		'object_types'  => array( 'office'), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
	) );
	
	$cmb->add_field( array(
	    'name'             => 'Region',
	    'id'   			   => $prefix . 'region',
	    'type'             => 'select',
	    'options'          => array('NA'=>'North America','AUS'=>'Australia')
	) );
	
	$cmb->add_field( array(
		'name' => __( 'Address Line 1', 'cmb2' ),
		'id'   => $prefix . 'address_line_1',
		'type' => 'text',
	) );
	
	$cmb->add_field( array(
		'name' => __( 'Address Line 2', 'cmb2' ),
		'id'   => $prefix . 'address_line_2',
		'type' => 'text',
	) );
	
	$cmb->add_field( array(
		'name' => __( 'Telephone', 'cmb2' ),
		'id'   => $prefix . 'tel',
		'type' => 'text',
	) );

	$cmb->add_field( array(
		'name' => __( 'Directions Link', 'cmb2' ),
		'id'   => $prefix . 'directions',
		'type' => 'text',
	) );

}