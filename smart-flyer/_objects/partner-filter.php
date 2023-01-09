<div class="partners-wrap">
	<div class="inner">
		<a href="<?php echo get_the_permalink(); ?>">
			<div class="partners-content background" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
				<div class="content">
					<h4><?php the_title(); ?></h4>
					<p><?php echo implode(',', get_post_meta(get_the_ID(), '_partner_region', true)); ?></p>
				</div>
			</div>
		</a>
	</div>
</div>