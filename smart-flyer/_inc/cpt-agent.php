<?php
	
function register_cpt_agent()
{
	 $labels = array( 
        'name' => _x( 'Agent', 'agent' ),
        'singular_name' => _x( 'Agent', 'agent' ),
        'add_new' => _x( 'Add New', 'agent' ),
        'add_new_item' => _x( 'Add New Agent', 'agent' ),
        'edit_item' => _x( 'Edit Agent', 'agent' ),
        'new_item' => _x( 'New Agent', 'agent' ),
        'view_item' => _x( 'View Agent', 'agent' ),
        'search_items' => _x( 'Search Agent', 'agent' ),
        'not_found' => _x( 'No Agents found', 'agent' ),
        'not_found_in_trash' => _x( 'No Agent found in Trash', 'agent' ),
        'parent_item_colon' => _x( 'Parent Agent:', 'agent' ),
        'menu_name' => _x( 'Agents', 'edit' )
    );
	$args = array(
		'labels'        => $labels,
		'description'   => 'Agent',
		'public'        => true,
		'supports'      => array( 'title','editor','thumbnail','excerpt', 'page-attributes'),
		'has_archive'   => false,
		'rewrite' 		=> array( 'with_front' => false ),
		'menu_icon' 	=> 'dashicons-groups',
		'show_in_rest'  => true,
	);
	register_post_type( 'agent', $args ); 
}
add_action( 'init', 'register_cpt_agent' );


add_action( 'cmb2_init', 'smartflyer_register_agent_metabox' );
function smartflyer_register_agent_metabox() {

	$prefix = '_agent_';

	$cmb = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Agent Extras', 'cmb2' ),
		'object_types'  => array( 'agent'), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
	) );
	
	$cmb->add_field( array(
		'name' => __( 'Management?', 'cmb2' ),
		'id'   => $prefix . 'management',
		'type' => 'checkbox',
	) );
	
		
	$years = array();
	for($x=1950;$x<=date('Y');$x++)
		$years[$x]=$x;	
	
	$cmb->add_field( array(
	    'name'             => 'Year Started',
	    'desc'			   => 'For Experience',
	    'show_option_none' => true,
	    'id'   			   => $prefix . 'experience',
	    'type'             => 'select',
	    'options'          => $years
	) );
	
	$cmb->add_field( array(
		'name' => __( 'Title', 'cmb2' ),
		'id'   => $prefix . 'title',
		'type' => 'text',
	) );
	
	$cmb->add_field( array(
		'name' => __( 'Facebook', 'cmb2' ),
		'id'   => $prefix . 'facebook',
		'type' => 'text',
	) );
	
	$cmb->add_field( array(
		'name' => __( 'Twitter', 'cmb2' ),
		'id'   => $prefix . 'twitter',
		'type' => 'text',
	) );
	
	$cmb->add_field( array(
		'name' => __( 'Instagram', 'cmb2' ),
		'id'   => $prefix . 'instagram',
		'type' => 'text',
	) );

	$cmb->add_field( array(
		'name' => __( 'LinkedIn', 'cmb2' ),
		'id'   => $prefix . 'linkedin',
		'type' => 'text',
	) );

  $cmb->add_field( array(
    'name' => __( 'Website', 'cmb2' ),
    'id'   => $prefix . 'website',
    'type' => 'text',
  ) );

  $cmb->add_field( array(
    'name' => __( 'Agent Tip', 'cmb2' ),
    'id'   => $prefix . 'tip',
    'type' => 'textarea_small',
  ) );

	$cmb->add_field( array(
		'name' => __( 'Email', 'cmb2' ),
		'id'   => $prefix . 'email',
		'type' => 'text',
	) );
	
	
	$cmb->add_field( array(
		'name' => __( 'Favourite Travel Tip', 'cmb2' ),
		'id'   => $prefix . 'travel_tip',
		'type' => 'textarea_small',
	) );
	
	$cmb->add_field( array(
		'name' => __( 'Cover', 'cmb2' ),
		'id'   => $prefix . 'cover',
		'type' => 'file',
	) );
	
	
	$cmb->add_field( array(
		'name' => __( 'Gallery', 'cmb2' ),
		'id'   => $prefix . 'gallery',
		'type' => 'file_list',
	) );
	
	

	$args = array(
		'post_type' => 'review',
		'numberposts' => -1,
		'orderby' => 'title',
		'order' => 'ASC'
	);
	$post_options = array();
	$posts = get_posts( $args );
	if ( $posts ) {
		foreach ( $posts as $post ) {
			$post_options[ $post->ID ] = $post->post_title;
		}
	}
	
	$cmb->add_field( array(
		'name' => __( 'Favorite Property', 'cmb2' ),
		'id'   => $prefix . 'fav_spot',
		'type'    => 'pw_select',
		'options' => $post_options,
		'show_option_none' => true,
	) );
	
	
	
	$group_field_id = $cmb->add_field( array(
	    'id'   => $prefix . 'testimonials',
	    'type'        => 'group',
	    'options'     => array(
	        'group_title'   => __( 'Testimonial {#}', 'cmb2' ),
	        'add_button'    => __( 'Add Another Testimonial', 'cmb2' ),
	        'remove_button' => __( 'Remove Testimonial', 'cmb2' ),
	        'sortable'      => true,
	    ),
	) );
	
	
	$cmb->add_group_field( $group_field_id, array(
	    'name' => 'Quote',
	    'id'   => 'quote',
	    'type' => 'textarea',
	) );
	
	$cmb->add_group_field( $group_field_id, array(
	    'name' => 'Name',
	    'id'   => 'name',
	    'type' => 'text',
	) );
	
	
	$group_field_id = $cmb->add_field( array(
	    'name' => 'Recognitions',
	    'id'   => $prefix . 'recognition',
	    'type'        => 'group',
	    'options'     => array(
	        'group_title'   => __( 'Recognition {#}', 'cmb2' ),
	        'add_button'    => __( 'Add Another Recognition', 'cmb2' ),
	        'remove_button' => __( 'Remove Recognition', 'cmb2' ),
	        'sortable'      => true,
	    ),
	) );
	
	
	$cmb->add_group_field( $group_field_id, array(
	    'name' => 'Name',
	    'id'   => 'name',
	    'type' => 'text',
	) );
	
	$cmb->add_group_field( $group_field_id, array(
	    'name' => 'Sub Title',
	    'id'   => 'subtitle',
	    'type' => 'text',
	) );
	
	$cmb->add_group_field( $group_field_id, array(
	    'name' => 'Link',
	    'id'   => 'link',
	    'type' => 'text',
	) );
	
	$cmb->add_group_field( $group_field_id, array(
	    'name' => 'Image',
	    'id'   => 'image',
	    'type' => 'file',
	) );

}


//Agent Locations
add_action( 'init', 'register_taxonomy_agent_location' );
function register_taxonomy_agent_location() {

    $labels = array( 
        'name' => _x( 'Agent Locations', 'agent_location' ),
        'singular_name' => _x( 'Agent Location', 'agent_location' ),
        'search_items' => _x( 'Search Agent Locations', 'agent_location' ),
        'popular_items' => _x( 'Popular Agent Locations', 'agent_location' ),
        'all_items' => _x( 'All Agent Locations', 'agent_location' ),
        'parent_item' => _x( 'Parent Agent Location', 'agent_location' ),
        'parent_item_colon' => _x( 'Parent Agent Location:', 'agent_location' ),
        'edit_item' => _x( 'Edit Agent Location', 'agent_location' ),
        'update_item' => _x( 'Update Agent Location', 'agent_location' ),
        'add_new_item' => _x( 'Add New Agent Location', 'agent_location' ),
        'new_item_name' => _x( 'New Agent Location', 'agent_location' ),
        'separate_items_with_commas' => _x( 'Separate Agent Locations with commas', 'agent_location' ),
        'add_or_remove_items' => _x( 'Add or remove Agent Locations', 'agent_location' ),
        'choose_from_most_used' => _x( 'Choose from the most used Agent Locations', 'agent_location' ),
        'menu_name' => _x( 'Agent Locations', 'agent_location' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => false,
        'hierarchical' => true,
        'query_var' => true
    );

    register_taxonomy( 'agent_location', array('agent'), $args );
}


//Agent Specialty
add_action( 'init', 'register_taxonomy_agent_specialty' );
function register_taxonomy_agent_specialty() {

    $labels = array( 
        'name' => _x( 'Agent Specialty', 'agent_specialty' ),
        'singular_name' => _x( 'Agent Specialty', 'agent_specialty' ),
        'search_items' => _x( 'Search Agent Specialty', 'agent_specialty' ),
        'popular_items' => _x( 'Popular Agent Specialty', 'agent_specialty' ),
        'all_items' => _x( 'All Agent Specialty', 'agent_specialty' ),
        'parent_item' => _x( 'Parent Agent Specialty', 'agent_specialty' ),
        'parent_item_colon' => _x( 'Parent Agent Specialty:', 'agent_specialty' ),
        'edit_item' => _x( 'Edit Agent Specialty', 'agent_specialty' ),
        'update_item' => _x( 'Update Agent Specialty', 'agent_specialty' ),
        'add_new_item' => _x( 'Add New Agent Specialty', 'agent_specialty' ),
        'new_item_name' => _x( 'New Agent Specialty', 'agent_specialty' ),
        'separate_items_with_commas' => _x( 'Separate Agent Specialty with commas', 'agent_specialty' ),
        'add_or_remove_items' => _x( 'Add or remove Agent Specialty', 'agent_specialty' ),
        'choose_from_most_used' => _x( 'Choose from the most used Agent Specialty', 'agent_specialty' ),
        'menu_name' => _x( 'Agent Specialty', 'agent_specialty' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => false,
        'hierarchical' => true,
        'query_var' => true
    );

    register_taxonomy( 'agent_specialty', array('agent'), $args );
}