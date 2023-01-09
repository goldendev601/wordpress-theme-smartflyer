<?php
	
add_action( 'cmb2_init', 'murphy_register_page_metabox' );
function murphy_register_page_metabox() {

	$prefix = '_page_';
	
	$cmb = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Page Extras', 'cmb2' ),
		'object_types'  => array( 'page'),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
	) );
	
	
	$cmb->add_field( array(
		'name' => __( 'Subtitle', 'cmb2' ),
		'id'   => $prefix . 'subtitle',
		'type' => 'text',
	) );

	
}
