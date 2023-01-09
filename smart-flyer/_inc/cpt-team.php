<?php
	
function register_cpt_team()
{
	 $labels = array( 
        'name' => _x( 'Team', 'team' ),
        'singular_name' => _x( 'Team', 'team' ),
        'add_new' => _x( 'Add New', 'team' ),
        'add_new_item' => _x( 'Add New Team', 'team' ),
        'edit_item' => _x( 'Edit Team', 'team' ),
        'new_item' => _x( 'New Team', 'team' ),
        'view_item' => _x( 'View Team', 'team' ),
        'search_items' => _x( 'Search Team', 'team' ),
        'not_found' => _x( 'No Teams found', 'team' ),
        'not_found_in_trash' => _x( 'No Team found in Trash', 'team' ),
        'parent_item_colon' => _x( 'Parent team:', 'team' ),
        'menu_name' => _x( 'Teams', 'edit' )
    );
	$args = array(
		'labels'        => $labels,
		'description'   => 'team',
		'public'        => true,
		'supports'      => array( 'title','editor','thumbnail','excerpt', 'page-attributes'),
		'has_archive'   => false,
		'rewrite' 		=> array( 'with_front' => false ),
		'menu_icon' 	=> 'dashicons-businessperson',
	);
	register_post_type( 'team', $args ); 
}
add_action( 'init', 'register_cpt_team' );


add_action( 'cmb2_init', 'smartflyer_register_team_metabox' );
function smartflyer_register_team_metabox() {

	$prefix = '_agent_';

	$cmb = new_cmb2_box( array(
		'id'            => '_team_metabox',
		'title'         => __( 'Team Extras', 'cmb2' ),
		'object_types'  => array( 'team'), // Post type
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
		'name' => __( 'Favourite Spot', 'cmb2' ),
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


//team Locations
add_action( 'init', 'register_taxonomy_team_location' );
function register_taxonomy_team_location() {

    $labels = array( 
        'name' => _x( 'team Locations', 'team_location' ),
        'singular_name' => _x( 'team Location', 'team_location' ),
        'search_items' => _x( 'Search team Locations', 'team_location' ),
        'popular_items' => _x( 'Popular team Locations', 'team_location' ),
        'all_items' => _x( 'All team Locations', 'team_location' ),
        'parent_item' => _x( 'Parent team Location', 'team_location' ),
        'parent_item_colon' => _x( 'Parent team Location:', 'team_location' ),
        'edit_item' => _x( 'Edit team Location', 'team_location' ),
        'update_item' => _x( 'Update team Location', 'team_location' ),
        'add_new_item' => _x( 'Add New team Location', 'team_location' ),
        'new_item_name' => _x( 'New team Location', 'team_location' ),
        'separate_items_with_commas' => _x( 'Separate team Locations with commas', 'team_location' ),
        'add_or_remove_items' => _x( 'Add or remove team Locations', 'team_location' ),
        'choose_from_most_used' => _x( 'Choose from the most used team Locations', 'team_location' ),
        'menu_name' => _x( 'team Locations', 'team_location' ),
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

    register_taxonomy( 'team_location', array('team'), $args );
}


//team Specialty
add_action( 'init', 'register_taxonomy_team_specialty' );
function register_taxonomy_team_specialty() {

    $labels = array( 
        'name' => _x( 'team Specialty', 'team_specialty' ),
        'singular_name' => _x( 'team Specialty', 'team_specialty' ),
        'search_items' => _x( 'Search team Specialty', 'team_specialty' ),
        'popular_items' => _x( 'Popular team Specialty', 'team_specialty' ),
        'all_items' => _x( 'All team Specialty', 'team_specialty' ),
        'parent_item' => _x( 'Parent team Specialty', 'team_specialty' ),
        'parent_item_colon' => _x( 'Parent team Specialty:', 'team_specialty' ),
        'edit_item' => _x( 'Edit team Specialty', 'team_specialty' ),
        'update_item' => _x( 'Update team Specialty', 'team_specialty' ),
        'add_new_item' => _x( 'Add New team Specialty', 'team_specialty' ),
        'new_item_name' => _x( 'New team Specialty', 'team_specialty' ),
        'separate_items_with_commas' => _x( 'Separate team Specialty with commas', 'team_specialty' ),
        'add_or_remove_items' => _x( 'Add or remove team Specialty', 'team_specialty' ),
        'choose_from_most_used' => _x( 'Choose from the most used team Specialty', 'team_specialty' ),
        'menu_name' => _x( 'team Specialty', 'team_specialty' ),
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

    register_taxonomy( 'team_specialty', array('team'), $args );
}