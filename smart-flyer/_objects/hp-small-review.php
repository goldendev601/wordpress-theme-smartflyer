<div class='small-review'>
	<a href='<?php echo get_permalink($post->ID); ?>'>
        <?php $featured = exsite_image_resize(get_post_thumbnail_id($post->ID), '709x397'); ?>
		<img class='' src="<?php echo $featured; ?>">
	</a>
	<div class='content'>
		<h3><a href='<?php echo get_permalink($post->ID); ?>'><?php echo $post->post_title; ?></a></h3>
		<span><a href='<?php echo get_permalink($post->ID); ?>'><?php echo get_post_meta($post->ID, '_review_place', true); ?></a></span>
	</div>
</div>