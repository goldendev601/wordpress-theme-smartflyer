<div class="agent whole-click">
	<?php $management = get_post_meta($post->ID, '_agent_management', true); ?>
	<?php if($management == 'on'): ?><svg class="star"><use xlink:href="#star"></use></svg><?php endif; ?>
	<?php
    $featured = exsite_image_resize(get_post_thumbnail_id($post->ID), '268x268');
    if($featured)
      $image = $featured;
    else
      $image = get_template_directory_uri().'/img/raster/compressed/avatar.png';
	?>
	<a href="<?php echo get_permalink($post->ID); ?>"><img class="" src="<?php echo $image; ?>"></a>
	<h2><?php echo $post->post_title; ?></h2>
	<?php $terms = wp_get_post_terms( $post->ID, 'agent_location' ); $term = $terms[0]; ?>
	<span><?php echo $term->name; ?></span>
</div>
