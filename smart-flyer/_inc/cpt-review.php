<?php
	
function register_cpt_review()
{
	 $labels = array( 
        'name' => _x( 'Review', 'review' ),
        'singular_name' => _x( 'Review', 'review' ),
        'add_new' => _x( 'Add New', 'review' ),
        'add_new_item' => _x( 'Add New Review', 'review' ),
        'edit_item' => _x( 'Edit Review', 'review' ),
        'new_item' => _x( 'New Review', 'review' ),
        'view_item' => _x( 'View Review', 'review' ),
        'search_items' => _x( 'Search Review', 'review' ),
        'not_found' => _x( 'No Reviews found', 'review' ),
        'not_found_in_trash' => _x( 'No Review found in Trash', 'review' ),
        'parent_item_colon' => _x( 'Parent Review:', 'review' ),
        'menu_name' => _x( 'Reviews', 'edit' )
    );
	$args = array(
		'labels'        => $labels,
		'description'   => 'Review',
		'public'        => true,
		'supports'      => array( 'title','thumbnail'),
		'has_archive'   => false,
		'rewrite' 		=> array( 'with_front' => false ),
		'menu_icon' 	=> 'dashicons-media-spreadsheet',
	);
	register_post_type( 'review', $args ); 
}
add_action( 'init', 'register_cpt_review' );

add_action( 'cmb2_init', 'smartflyer_register_review_info' );
add_action( 'cmb2_init', 'smartflyer_register_review_metabox' );
function smartflyer_register_review_metabox() {

	$prefix = '_review_';

	$cmb = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Review Extras', 'cmb2' ),
		'object_types'  => array( 'review'), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
	) );
	
	$cmb->add_field( array(
		'name' => __( 'Place', 'cmb2' ),
		'id'   => $prefix . 'place',
		'type' => 'text',
	) );
	
	$cmb->add_field( array(
		'name' => __( 'Quote', 'cmb2' ),
		'id'   => $prefix . 'quote',
		'type' => 'text',
	) );
	
	
	$cmb->add_field( array(
		'name' => __( 'Images', 'cmb2' ),
		'id'   => $prefix . 'images',
		'type' => 'file_list',
	) );
	
	
	
	$args = array(
		'post_type' => 'agent',
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
		'name' => __( 'Reviewed by Agent', 'cmb2' ),
		'id'   => $prefix . 'agent',
		'type'    => 'pw_multiselect',
		'options' => $post_options,
		'show_option_none' => true,
	) );
	
	$cmb->add_field( array(
		'name' => __( 'Why', 'cmb2' ),
		'id'   => $prefix . 'why',
		'type' => 'text',
	) );
	
	
	$cmb->add_field( array(
		'name' => __( 'Who', 'cmb2' ),
		'id'   => $prefix . 'who',
		'type' => 'text',
	) );
	
	
	
	$cmb->add_field( array(
		'name' => __( 'Review Items', 'cmb2' ),
		'id'   => $prefix . 'review_items',
		'type' => 'title',
	) );
	
	
	$group_field_id = $cmb->add_field( array(
	    'id'          => 'review_item',
	    'type'        => 'group',
	    'options'     => array(
	        'group_title'   => __( 'Review Item {#}', 'cmb2' ),
	        'add_button'    => __( 'Add Another Review Item', 'cmb2' ),
	        'remove_button' => __( 'Remove Review Item', 'cmb2' ),
	        'sortable'      => false,
	        'closed'     => true,
	    ),
	) );
	
	$cmb->add_group_field( $group_field_id, array(
	    'name' => 'Label',
	    'id'   => 'label',
	    'type' => 'text',
	) );
	
	$cmb->add_group_field( $group_field_id, array(
	    'name' => 'Text',
	    'id'   => 'text',
	    'type' => 'textarea',
	) );
	
	
	$cmb->add_group_field( $group_field_id, array(
		'name' => __( 'Reviewed by Agent', 'cmb2' ),
		'id'   => 'agent',
		'type'    => 'pw_select',
		'options' => $post_options
	) );
	
	
	$cmb->add_field( array(
		'name' => __( 'Location', 'cmb2' ),
		'id'   => $prefix . 'location',
		'type' => 'title',
	) );
	
	
	$cmb->add_field( array(
		'name' => __( 'Location Text', 'cmb2' ),
		'id'   => $prefix . 'location_text',
		'type' => 'text',
	) );
	
	$cmb->add_field( array(
		'name' => __( 'Location Marker', 'cmb2' ),
		'desc' => 'Drag the marker to set the exact location',
		'id'   => $prefix . 'location_marker',
		'type' => 'pw_map',
	) );

	$cmb->add_field( array(
		'name' => __( 'Contributed By', 'cmb2' ),
		'id'   => $prefix . 'location_agent',
		'type'    => 'pw_select',
		'options' => $post_options
	) );
	
	
	$args = array(
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
		'name' => __( 'Featured In', 'cmb2' ),
		'id'   => $prefix . 'featured_in',
		'type'    => 'pw_multiselect',
		'options' => $post_options,
		'show_option_none' => true,
	) );
	
	
	$cmb->add_field( array(
		'name' => __( 'Agent Tips', 'cmb2' ),
		'id'   => $prefix . 'tips_grey',
		'type' => 'title',
	) );

	
	$group_field_id = $cmb->add_field( array(
	    'id'          => 'tips_grey',
	    'type'        => 'group',
	    'options'     => array(
	        'group_title'   => __( 'Tip {#}', 'cmb2' ),
	        'add_button'    => __( 'Add Another Tip', 'cmb2' ),
	        'remove_button' => __( 'Remove Tip', 'cmb2' ),
	        'sortable'      => false,
	        'closed'     => true,
	    ),
	) );
	
	$cmb->add_group_field( $group_field_id, array(
	    'name' => 'Tip',
	    'id'   => 'tip',
	    'type' => 'text',
	) );

	$args1 = array(
		'post_type' => 'agent',
		'numberposts' => -1,
		'orderby' => 'title',
		'order' => 'ASC',
	);

	$agent_options = array();
	$agent_options[] = 'Select Agent';
	$agents = get_posts( $args1 );
	if ( $agents ) {
		foreach ( $agents as $agent ) {
			$agent_options[ $agent->ID ] = $agent->post_title;
		}
	}

	$cmb->add_group_field( $group_field_id, array(
	    'name' => __( 'Contributed By', 'cmb2' ),
	    'id'   => 'block_agent',
	    'type'    => 'pw_select',
		'options' => $agent_options
	) );

	$cmb->add_field( array(
		'name' => __( 'SmartFlyer Exclusives', 'cmb2' ),
		'id'   => $prefix . 'tips_blue',
		'type' => 'title',
	) );
	
	$group_field_id = $cmb->add_field( array(
	    'id'          => 'tips_blue',
	    'type'        => 'group',
	    'options'     => array(
	        'group_title'   => __( 'Exclusive {#}', 'cmb2' ),
	        'add_button'    => __( 'Add Another Exclusive', 'cmb2' ),
	        'remove_button' => __( 'Remove Exclusive', 'cmb2' ),
	        'sortable'      => false,
	        'closed'     => true,
	    ),
	) );
	
	$cmb->add_group_field( $group_field_id, array(
	    'name' => 'Exclusive',
	    'id'   => 'tip',
	    'type' => 'text',
	) );
		

}

function smartflyer_register_review_info() {

	$prefix = '_review_info_';

	$args = array(
		'post_type' => 'agent',
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

	$cmb = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Review Information', 'cmb2' ),
		'object_types'  => array( 'review'), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
	) );

	$cmb->add_field( array(
		'name' => __( 'Page Summary', 'cmb2' ),
		'id'   => $prefix . 'review_description_main',
		'type' => 'textarea_small',
	) );

	$cmb->add_field( array(
		'name' => __( 'Block Title', 'cmb2' ),
		'id'   => $prefix . 'room_title',
		'type' => 'text',
	) );
	
	$cmb->add_field( array(
		'name' => __( 'Subhead', 'cmb2' ),
		'id'   => $prefix . 'room_subhead',
		'type' => 'text',
	) );

	$cmb->add_field( array(
		'name' => __( 'Description', 'cmb2' ),
		'id'   => $prefix . 'room_description',
		'type' => 'textarea_small',
	) );

	$cmb->add_field( array(
		'name' => __( 'Image', 'cmb2' ),
		'id'   => $prefix . 'room_image',
		'type' => 'file',
	) );
	
	$cmb->add_field( array(
		'name' => __( 'Contributed By', 'cmb2' ),
		'id'   => $prefix . 'block_agent',
		'type'    => 'pw_select',
		'options' => $post_options
	) );

	$cmb->add_field( array(
		'name' => __( 'Block Title', 'cmb2' ),
		'id'   => $prefix . 'pool_title',
		'type' => 'text',
	) );
	
	$cmb->add_field( array(
		'name' => __( 'Subhead', 'cmb2' ),
		'id'   => $prefix . 'pool_subhead',
		'type' => 'text',
	) );

	$cmb->add_field( array(
		'name' => __( 'Description', 'cmb2' ),
		'id'   => $prefix . 'pool_description',
		'type' => 'textarea_small',
	) );

	$cmb->add_field( array(
		'name' => __( 'Image', 'cmb2' ),
		'id'   => $prefix . 'pool_image',
		'type' => 'file',
	) );

	$cmb->add_field( array(
		'name' => __( 'Contributed By', 'cmb2' ),
		'id'   => $prefix . 'pool_agent',
		'type'    => 'pw_select',
		'options' => $post_options
	) );


	$cmb->add_field( array(
		'name' => __( 'Block Title', 'cmb2' ),
		'id'   => $prefix . 'spa_title',
		'type' => 'text',
	) );
	
	$cmb->add_field( array(
		'name' => __( 'Subhead', 'cmb2' ),
		'id'   => $prefix . 'spa_subhead',
		'type' => 'text',
	) );

	$cmb->add_field( array(
		'name' => __( 'Description', 'cmb2' ),
		'id'   => $prefix . 'spa_description',
		'type' => 'textarea_small',
	) );

	$cmb->add_field( array(
		'name' => __( 'Image', 'cmb2' ),
		'id'   => $prefix . 'spa_image',
		'type' => 'file',
	) );

	$cmb->add_field( array(
		'name' => __( 'Contributed By', 'cmb2' ),
		'id'   => $prefix . 'spa_agent',
		'type'    => 'pw_select',
		'options' => $post_options
	) );

	$cmb->add_field( array(
		'name' => __( 'Block Title', 'cmb2' ),
		'id'   => $prefix . 'restaurant_title',
		'type' => 'text',
	) );
	
	$cmb->add_field( array(
		'name' => __( 'Subhead', 'cmb2' ),
		'id'   => $prefix . 'restaurant_subhead',
		'type' => 'text',
	) );

	$cmb->add_field( array(
		'name' => __( 'Description', 'cmb2' ),
		'id'   => $prefix . 'restaurant_description',
		'type' => 'textarea_small',
	) );

	$cmb->add_field( array(
		'name' => __( 'Image', 'cmb2' ),
		'id'   => $prefix . 'restaurant_image',
		'type' => 'file',
	) );

	$cmb->add_field( array(
		'name' => __( 'Contributed By', 'cmb2' ),
		'id'   => $prefix . 'restaurant_agent',
		'type'    => 'pw_select',
		'options' => $post_options
	) );
}


//Review Regions
add_action( 'init', 'register_taxonomy_review_region' );
function register_taxonomy_review_region() {

    $labels = array( 
        'name' => _x( 'Review Regions', 'review_region' ),
        'singular_name' => _x( 'Review Region', 'review_region' ),
        'search_items' => _x( 'Search Review Regions', 'review_region' ),
        'popular_items' => _x( 'Popular Review Regions', 'review_region' ),
        'all_items' => _x( 'All Review Regions', 'review_region' ),
        'parent_item' => _x( 'Parent Review Region', 'review_region' ),
        'parent_item_colon' => _x( 'Parent Review Region:', 'review_region' ),
        'edit_item' => _x( 'Edit Review Region', 'review_region' ),
        'update_item' => _x( 'Update Review Region', 'review_region' ),
        'add_new_item' => _x( 'Add New Review Region', 'review_region' ),
        'new_item_name' => _x( 'New Review Region', 'review_region' ),
        'separate_items_with_commas' => _x( 'Separate Review Regions with commas', 'review_region' ),
        'add_or_remove_items' => _x( 'Add or remove Review Regions', 'review_region' ),
        'choose_from_most_used' => _x( 'Choose from the most used Review Regions', 'review_region' ),
        'menu_name' => _x( 'Review Regions', 'review_region' ),
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

    register_taxonomy( 'review_region', array('review'), $args );
}


//Review Style
add_action( 'init', 'register_taxonomy_review_style' );
function register_taxonomy_review_style() {

    $labels = array( 
        'name' => _x( 'Review Style', 'review_style' ),
        'singular_name' => _x( 'Review Style', 'review_style' ),
        'search_items' => _x( 'Search Review Style', 'review_style' ),
        'popular_items' => _x( 'Popular Review Style', 'review_style' ),
        'all_items' => _x( 'All Review Style', 'review_style' ),
        'parent_item' => _x( 'Parent Review Style', 'review_style' ),
        'parent_item_colon' => _x( 'Parent Review Style:', 'review_style' ),
        'edit_item' => _x( 'Edit Review Style', 'review_style' ),
        'update_item' => _x( 'Update Review Style', 'review_style' ),
        'add_new_item' => _x( 'Add New Review Style', 'review_style' ),
        'new_item_name' => _x( 'New Review Style', 'review_style' ),
        'separate_items_with_commas' => _x( 'Separate Review Style with commas', 'review_style' ),
        'add_or_remove_items' => _x( 'Add or remove Review Style', 'review_style' ),
        'choose_from_most_used' => _x( 'Choose from the most used Review Style', 'review_style' ),
        'menu_name' => _x( 'Review Style', 'review_style' ),
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

    register_taxonomy( 'review_style', array('review'), $args );
}