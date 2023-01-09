<?php 
	
/* Image Rewrites */
function smartflyer_images_check($content)
{
	$content = preg_replace_callback('#<img([^>]*) src="([^"/]*/?[^".]*\.[^"]*)"([^>]*)>#', "smartflyer_images_rewrite", $content);
    return $content;
}

function smartflyer_images_rewrite($match)
{     
	global $post;
	global $wpdb;
	$src = $match[2];
	$temp_src = $src;
	$classes = '';
	if($match[1])
		$classes = $match[1];
		
	$gal_image = false;
	if (strpos($match[1], 'exsite-gal-img') !== false)
		$gal_image = true;
	if (strpos($match[2], 'exsite-gal-img') !== false)
		$gal_image = true;
	if (strpos($match[3], 'exsite-gal-img') !== false)
		$gal_image = true;
	
	$check_src = str_replace('-scaled', '', $src);
	$id = smartflyer_get_attachment_id_by_url($check_src);
	if(empty($id)){
		$explod_src = explode('/',$temp_src);
		if(count($explod_src)){
			$explod_src = end($explod_src);
			if($explod_src){
				$result_exp = $wpdb->get_row("SELECT source_id FROM wp_as3cf_items WHERE extra_info LIKE '%".urldecode($explod_src)."%'", OBJECT);
				$id = $result_exp->source_id;
			}
		}
	}
    $image = exsite_image_resize($id, '1800x0', false);
	
	if($image)
		$src = $image;
	
	$image_details = get_post($id);

	$output = '';
	$class = '';
	
	if(!$gal_image)
		$output .= '</div>';
	
	if($image_details->post_excerpt != '')
		$output .= '<figure>';
		
	$output .= '<img src="'.$src.'" class="'.$class.'">';
	
	if($image_details->post_excerpt != '')
	{
    	$output .= '<figcaption>'.$image_details->post_excerpt.'</figcaption>';
		$output .= '</figure>';
	}
	
	if(!$gal_image)
		$output .= "<div class='article-content'>";

	return $output;
}


function smartflyer_get_attachment_id_by_url( $url ) {

	// Split the $url into two parts with the wp-content directory as the separator.
	$parse_url  = explode( parse_url( WP_CONTENT_URL, PHP_URL_PATH ), $url );

	// Get the host of the current site and the host of the $url, ignoring www.
	$this_host = str_ireplace( 'www.', '', parse_url( home_url(), PHP_URL_HOST ) );
	$file_host = str_ireplace( 'www.', '', parse_url( $url, PHP_URL_HOST ) );

	// Return nothing if there aren't any $url parts or if the current host and $url host do not match.
	if ( ! isset( $parse_url[1] ) || empty( $parse_url[1] ) ) {
		return;
	}
	
	$parse_url[1] = preg_replace( '/-[0-9]{1,4}x[0-9]{1,4}\.(jpg|jpeg|png|gif|bmp)$/i', '.$1', $parse_url[1] );
	global $wpdb;

	$parse_url[1] = '%'.$parse_url[1];
	$attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM {$wpdb->prefix}posts WHERE guid LIKE %s;", $parse_url[1] ) );
	// Returns null if no attachment is found.
	return $attachment[0];
}


function smartflyer_get_post_images($post)
{
	$x=0;
	$content = apply_filters('the_content', $post->post_content);
	
	//Images within post content
    preg_match_all('#<img([^>]*) src="([^"/]*/?[^".]*\.[^"]*)"([^>]*)>#', $content, $matches ); 
    $images = array();
	foreach($matches[2] as $src)
    {
		$image_id = smartflyer_get_attachment_id_by_url($src);	
		$img = wp_get_attachment_image_src($image_id, '1500_900f');
		$images[$x]['id'] = $image_id;
		$images[$x]['url'] = $img[0];
		$x++;
    }
    
    /*
    $gallery = get_post_gallery( $post->ID, false );
    
    if($gallery)
    {
	    $gallery_images = explode(",", $gallery['ids']);
	    foreach($gallery_images as $image_id)
	    {
			$img = wp_get_attachment_image_src($image_id, '1500_900f');
			$images[$image_id] = $img[0];
	    }
    }
    */
    
    return $images;

}