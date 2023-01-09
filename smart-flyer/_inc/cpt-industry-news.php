<?php
	
function register_cpt_industrynews_new()
{
	 $labels = array( 
        'name' => _x( 'Industry News', 'industry-news' ),
        'singular_name' => _x( 'Industry News', 'industry-news' ),
        'add_new' => _x( 'Add New', 'industry-news' ),
        'add_new_item' => _x( 'Add New Industry News', 'industry-news' ),
        'edit_item' => _x( 'Edit Industry News', 'industry-news' ),
        'new_item' => _x( 'New Industry News', 'industry-news' ),
        'view_item' => _x( 'View Industry News', 'industry-news' ),
        'search_items' => _x( 'Search Industry News', 'industry-news' ),
        'not_found' => _x( 'No Industry News found', 'industry-news' ),
        'not_found_in_trash' => _x( 'No Industry News found in Trash', 'industry-news' ),
        'parent_item_colon' => _x( 'Parent Industry News:', 'industry-news' ),
        'menu_name' => _x( 'Industry News', 'edit' )
    );
	$args = array(
		'labels'        => $labels,
		'description'   => 'Industry News',
		'public'        => true,
		'supports'      => array( 'title','thumbnail', 'editor'),
		'has_archive'   => false,
		'rewrite' 		=> array( 'with_front' => false ),
		'menu_icon' 	=> 'dashicons-media-spreadsheet',
	);
	register_post_type( 'industry-news', $args ); 
}
add_action( 'init', 'register_cpt_industrynews_new' );


add_action( 'cmb2_init', 'smartflyer_register_industrynews_new_metabox' );
function smartflyer_register_industrynews_new_metabox() {

	$prefix = '_industrynewsnew_';
	
	$cmb = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Post Extras', 'cmb2' ),
		'object_types'  => array( 'industry-news'),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
	) );
	
	
	$cmb->add_field( array(
		'name' => __( 'Featured?', 'cmb2' ),
		'id'   => $prefix . 'featured',
		'type' => 'checkbox',
	) );

	$cmb->add_field( array(
		'name' => __( 'Change Contributed By to Written By', 'cmb2' ),
		'id'   => $prefix . 'author_syntax',
		'type' => 'checkbox',
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

	$args = array(
		'post_type' => 'team',
		'numberposts' => -1,
		'orderby' => 'title',
		'order' => 'ASC',
	);
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

	$author_options = array();
	$author_options[] = 'Select Author';
	$authors = get_users();
	if ( $authors ) {
		foreach ( $authors as $author ) {
			$author_options[ $author->ID ] = $author->display_name;
		}
	}
	
	$cmb->add_field( array(
		'name' => __( 'Post by Author', 'cmb2' ),
		'id'   => $prefix . 'author',
		'type'    => 'pw_multiselect',
		'options' => $author_options
	) );


	
	$cmb->add_field( array(
		'name' => __( 'Show book now button?', 'cmb2' ),
		'id'   => $prefix . 'show_book_now',
		'type' => 'checkbox',
	) );
	
	$cmb->add_field( array(
		'name' => __( 'Book text', 'cmb2' ),
		'id'   => $prefix . 'book_text',
		'type' => 'textarea',
	) );
	
	$group_field_id = $cmb->add_field( array(
		'id'            => $prefix . 'other_credits',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => __( 'Credit {#}', 'cmb2' ), 
			'add_button'    => __( 'Add Another Credit', 'cmb2' ),
			'remove_button' => __( 'Remove Credit', 'cmb2' ),
			'sortable'      => true,
		),
	) );
	
	$cmb->add_group_field( $group_field_id, array(
		'name' => 'Title',
		'id'   => 'title',
		'type' => 'text',
	) );
	
	$cmb->add_group_field( $group_field_id, array(
		'name' => 'Name',
		'id'   => 'name',
		'type' => 'text',
	) );
	
	$cmb->add_group_field( $group_field_id, array(
		'name' => 'Link',
		'id'   => 'link',
		'type' => 'text',
	) );
	
}

add_action( 'cmb2_init', 'smartflyer_register_industrynews_new_itinerary_metabox' );
function smartflyer_register_industrynews_new_itinerary_metabox() {

	$prefix = '_industrynewsnew_';
	
	$cmb = new_cmb2_box( array(
		'id'            => $prefix . 'itinerary_metabox',
		'title'         => __( 'Itinerary Extras', 'cmb2' ),
		'object_types'  => array( 'industry-news'),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
	) );
	
	
	$group_field_id = $cmb->add_field( array(
		'id'            => $prefix . 'details',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => __( 'Detail {#}', 'cmb2' ), 
			'add_button'    => __( 'Add Another Detail', 'cmb2' ),
			'remove_button' => __( 'Remove Detail', 'cmb2' ),
			'sortable'      => true,
		),
	) );
	
	$cmb->add_group_field( $group_field_id, array(
		'name' => 'Title',
		'id'   => 'title',
		'type' => 'text',
	) );
	
	$cmb->add_group_field( $group_field_id, array(
		'name' => 'Description',
		'id'   => 'description',
		'type' => 'textarea_small',
	) );
	
	
	$cmb->add_field( array(
		'name' => __( 'Stay Description', 'cmb2' ),
		'id'   => $prefix . 'stay_desc',
		'type' => 'text',
	) );
	
	$group_field_id = $cmb->add_field( array(
		'id'            => $prefix . 'stays',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => __( 'Stay {#}', 'cmb2' ), 
			'add_button'    => __( 'Add Another Stay', 'cmb2' ),
			'remove_button' => __( 'Remove Stay', 'cmb2' ),
			'sortable'      => true,
		),
	) );
	
	$cmb->add_group_field( $group_field_id, array(
		'name' => 'Images',
		'id'   => 'images',
		'type' => 'file_list',
	) );
	
	$cmb->add_group_field( $group_field_id, array(
		'name' => 'Title',
		'id'   => 'title',
		'type' => 'text',
	) );
	
	$cmb->add_group_field( $group_field_id, array(
		'name' => 'Description',
		'id'   => 'description',
		'type' => 'textarea_small',
	) );
	
	$cmb->add_group_field( $group_field_id, array(
		'name' => 'Link',
		'id'   => 'link',
		'type' => 'text',
	) );
	
	
	$cmb->add_field( array(
		'name' => __( 'Itinerary Image', 'cmb2' ),
		'id'   => $prefix . 'itinerary_img',
		'type' => 'file',
	) );
	
	
	
	$group_field_id = $cmb->add_field( array(
		'id'            => $prefix . 'itinerary',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => __( '{#}', 'cmb2' ), 
			'add_button'    => __( 'Add Another', 'cmb2' ),
			'remove_button' => __( 'Remove', 'cmb2' ),
			'sortable'      => true,
		),
	) );
	
	$cmb->add_group_field( $group_field_id, array(
		'name' => 'Day Number',
		'id'   => 'day',
		'type' => 'text',
	) );
	
	$cmb->add_group_field( $group_field_id, array(
		'name' => 'Title',
		'id'   => 'title',
		'type' => 'text',
	) );
	
	$cmb->add_group_field( $group_field_id, array(
		'name' => 'Location',
		'id'   => 'location',
		'type' => 'text',
	) );
	
	$cmb->add_group_field( $group_field_id, array(
		'name' => 'Highlight text',
		'id'   => 'highlight_text',
		'type' => 'text',
	) );
	
	$cmb->add_group_field( $group_field_id, array(
		'name' => 'Description',
		'id'   => 'description',
		'type' => 'wysiwyg',
	) );
		
}