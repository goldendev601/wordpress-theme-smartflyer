<?php
	
function register_cpt_biopost()
{
	 $labels = array( 
        'name' => _x( 'Bio Post', 'biopost' ),
        'singular_name' => _x( 'Bio Post', 'biopost' ),
        'add_new' => _x( 'Add New', 'biopost' ),
        'add_new_item' => _x( 'Add New Bio Post', 'biopost' ),
        'edit_item' => _x( 'Edit Bio Post', 'biopost' ),
        'new_item' => _x( 'New Bio Post', 'biopost' ),
        'view_item' => _x( 'View Bio Post', 'biopost' ),
        'search_items' => _x( 'Search Bio Post', 'biopost' ),
        'not_found' => _x( 'No Bio Posts found', 'biopost' ),
        'not_found_in_trash' => _x( 'No Bio Post found in Trash', 'biopost' ),
        'parent_item_colon' => _x( 'Parent Bio Post:', 'biopost' ),
        'menu_name' => _x( 'Bio Posts', 'edit' )
    );
	$args = array(
		'labels'        => $labels,
		'description'   => 'Bio Post',
		'public'        => true,
		'supports'      => array( 'title','thumbnail'),
		'has_archive'   => false,
		'rewrite' 		=> array( 'with_front' => false ),
		'menu_icon' 	=> 'dashicons-groups',
	);
	register_post_type( 'biopost', $args ); 
}
add_action( 'init', 'register_cpt_biopost' );


add_action( 'cmb2_init', 'smartflyer_register_biopost_metabox' );
function smartflyer_register_biopost_metabox() {

	$prefix = '_biopost_';

	$cmb = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Bio Post Extras', 'cmb2' ),
		'object_types'  => array( 'biopost'), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
	) );
	
	
	
	$cmb->add_field( array(
		'name' => __( 'Link', 'cmb2' ),
		'id'   => $prefix . 'link',
		'type' => 'text',
	) );
	
}