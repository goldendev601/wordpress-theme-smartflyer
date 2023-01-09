<?php
	
function register_cpt_partner()
{
	 $labels = array( 
        'name' => _x( 'Partner', 'partner' ),
        'singular_name' => _x( 'Partner', 'partner' ),
        'add_new' => _x( 'Add New', 'partner' ),
        'add_new_item' => _x( 'Add New Partner', 'partner' ),
        'edit_item' => _x( 'Edit Partner', 'partner' ),
        'new_item' => _x( 'New Partner', 'partner' ),
        'view_item' => _x( 'View Partner', 'partner' ),
        'search_items' => _x( 'Search Partner', 'partner' ),
        'not_found' => _x( 'No Partners found', 'partner' ),
        'not_found_in_trash' => _x( 'No Partner found in Trash', 'partner' ),
        'parent_item_colon' => _x( 'Parent Partner:', 'partner' ),
        'menu_name' => _x( 'Partners', 'edit' )
    );
	$args = array(
		'labels'        => $labels,
		'description'   => 'Partner',
		'public'        => true,
		'supports'      => array( 'title','thumbnail','editor','excerpt'),
		'has_archive'   => false,
		'rewrite' 		=> array( 'with_front' => false ),
		'menu_icon' 	=> 'dashicons-media-spreadsheet',
	);
	register_post_type( 'partner', $args ); 
}
add_action( 'init', 'register_cpt_partner' );


add_action( 'cmb2_init', 'smartflyer_register_partner_metabox' );
function smartflyer_register_partner_metabox() {

	$prefix = '_partner_';

	$cmb = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Partner Extras', 'cmb2' ),
		'object_types'  => array( 'partner'), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
	) );
	
	
	$cmb->add_field( array(
		'name' => __( 'Cover', 'cmb2' ),
		'id'   => $prefix . 'cover',
		'type' => 'file',
	) );

	$cmb->add_field( array(
		'name' => __( 'SmartFlyer Exclusives Text', 'cmb2' ),
		'id'   => $prefix . 'smartFlyer_exclusives_text',
		'type' => 'textarea_small',
	) );
		
	
	$cmb->add_field( array(
		'name' => __( 'Images', 'cmb2' ),
		'id'   => $prefix . 'images',
		'type' => 'file_list',
	) );
	
	
	$cmb->add_field( array(
		'name' => __( 'Updates', 'cmb2' ),
		'id'   => $prefix . 'updates',
		'type' => 'wysiwyg',
	) );

	
	$cmb->add_field( array(
		'name' => __( 'SmartFlyer Exclusives', 'cmb2' ),
		'id'   => $prefix . 'exclusives',
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
	
	$args = array(
		'post_type' => 'review',
		'numberposts' => -1,
		'orderby' => 'title',
		'order' => 'ASC',
		'post_status' => array('publish', 'pending', 'draft', 'future', 'private')
	);
	$post_options = array();
	$posts = get_posts( $args );
	if ( $posts ) {
		foreach ( $posts as $post ) {
			$post_options[ $post->ID ] = $post->post_title;
		}
	}
	
	$cmb->add_field( array(
		'name' => __( 'Review by us', 'cmb2' ),
		'id'   => $prefix . 'reviews',
		'type'    => 'pw_multiselect',
		'options' => $post_options,
		'show_option_none' => true,
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
		'name' => __( 'Destination', 'cmb2' ),
		'id'   => $prefix . 'destination',
		'type'    => 'pw_multiselect',
		'options' => array(
			'all_destination' 			=> 'All Destination',
			'americas'		=> 'Americas',
			'caribbean_mexico'		=> 'Caribbean/Mexico',
			'africa'		=> 'Africa',
			'asia_pacific'		=> 'Asia Pacific',
			'europe'		=> 'Europe',
		 ),
		 'show_option_none' => true,
	) );

    $region_options = array();
    $review_regions = get_terms('review_region');
    if ($review_regions) {
        foreach ($review_regions as $review_region) {
            $region_options[$review_region->slug] = $review_region->name;
        }
    }

	$cmb->add_field( array(
		'name' => __( 'Region', 'cmb2' ),
		'id'   => $prefix . 'region',
		'type'    => 'pw_multiselect',
		'options' => $region_options,
		'show_option_none' => true,
	) );

    $style_options = array();
    $review_styles = get_terms('review_style');
    if ($review_styles) {
        foreach ($review_styles as $review_style) {
            $style_options[$review_style->slug] = $review_style->name;
        }
    }

	$cmb->add_field( array(
		'name' => __( 'Style', 'cmb2' ),
		'id'   => $prefix . 'style',
		'type'    => 'pw_select',
		'options' => $style_options
	) );
}
