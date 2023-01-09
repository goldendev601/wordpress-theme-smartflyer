<div class='post-alt whole-click  post-whole-click-new '>
    <?php $featured = exsite_image_resize(get_post_thumbnail_id($post->ID), '700x430'); ?>
	<a href='<?php echo get_permalink($post->ID); ?>' class="link-me"><img src="<?php echo $featured; ?>"></a>
	<div class='post-content'>
		<div class='post-inner'>
			<?php if(isset($useterm)): ?>
			<?php $category = $term; ?>
			<?php else: ?>
			<?php $category = get_the_category($post->ID); $category = $category[0]; ?>
			<?php endif; ?>
			<span><a href="<?php echo get_term_link($category); ?>"><?php echo $category->name; ?></a></span>
			<h2><?php echo $post->post_title; ?></h2>
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
	</div>
</div>