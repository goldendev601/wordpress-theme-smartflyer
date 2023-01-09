<div class='review whole-click'>
    <?php $featured = exsite_image_resize(get_post_thumbnail_id($post->ID), '488x272'); ?>
	<img src="<?php echo $featured; ?>">
	<div class='review-content'>
	  <a href='<?php echo get_permalink($post->ID); ?>'><h2><?php echo $post->post_title; ?></h2></a>
	  <a href='<?php echo get_permalink($post->ID); ?>' class="link-me"><span><?php echo get_post_meta($post->ID, '_review_place', true); ?></span></a>
	</div>
</div>
