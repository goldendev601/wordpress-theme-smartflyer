<div class='post col-3 whole-click'>
    <?php $featured = exsite_image_resize(get_post_thumbnail_id($post->ID), '700x430'); ?>
	<img src="<?php echo $featured; ?>">
	<?php if(isset($useterm)): ?>
	<?php $category = $term; ?>
	<?php else: ?>
	<?php $category = get_the_category($post->ID); $category = $category[0]; ?>
	<?php endif; ?>
	<?php if(isset($category)): ?>
	<a href="<?php echo get_term_link($category); ?>"><span><?php echo $category->name; ?></span></a>
	<?php endif; ?>
	<a href='<?php echo get_permalink($post->ID); ?>' class="link-me"><h2><?php echo $post->post_title; ?></h2></a>
	<p><?php echo smartflyer_excerpt($post->post_content, 20, false); ?></p>
	
	<?php $author_data = get_author_data($post); ?>
	<?php if(!$author_data['issf']): ?>
	<div class='post-authors'>
		<div class='img-wrap'>
			<?php echo $author_data['author_image']; ?>
		</div>
		<span><?php echo $author_data['author']; ?></span>
	</div>
	<?php endif; ?>
</div>
