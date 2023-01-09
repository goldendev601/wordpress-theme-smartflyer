<div class="partners-wrap">
	<div class="inner">
		<a href="<?php echo get_the_permalink(); ?>">
			<div class="partners-content background" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
				<div class="content">
					<h4><?php the_title(); ?></h4>
					<p><?php echo get_post_meta('_review_place', true); ?></p>
				</div>
			</div>
		</a>
	</div>
</div>