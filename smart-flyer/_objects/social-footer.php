<?php $instas = smartflyer_instagram(); ?>

<div class='wrapper'>
	<div class='new-social'>
		<div class='new-social-inner'>
			<h2><?php echo exsite_get_option('insta_title'); ?></h2>
			<p><?php echo exsite_get_option('insta_text'); ?></p>
			<a href='<?php echo exsite_get_option('instagram'); ?>' target="_blank"><svg class='ig'><use xlink:href="#ig"></use></svg>Follow<svg class='chev-right'><use xlink:href="#chev-right"></use></svg></a>
		</div>
		<div class='ig-grid'>
			<div class='top-half'>
				<?php $insta = $instas[0]; ?>
				<a href="<?php echo $insta['link']; ?>" target="_blank">
					<img src="<?php echo $insta['image']; ?>">
				</a>
				<?php $insta = $instas[1]; ?>
				<a href="<?php echo $insta['link']; ?>" target="_blank">
					<img src="<?php echo $insta['image']; ?>">
				</a>
			</div>
			<div class='bot-half'>
				<?php $insta = $instas[2]; ?>
				<a href="<?php echo $insta['link']; ?>" target="_blank">
					<img src="<?php echo $insta['image']; ?>">
				</a>
				<?php $insta = $instas[3]; ?>
				<a href="<?php echo $insta['link']; ?>" target="_blank">
					<img src="<?php echo $insta['image']; ?>">
				</a>
				<?php $insta = $instas[4]; ?>
				<a href="<?php echo $insta['link']; ?>" target="_blank">
					<img src="<?php echo $insta['image']; ?>">
				</a>
			</div>
		</div>
		<a href='<?php echo exsite_get_option('instagram'); ?>' target="_blank" class='mob-cta'>Follow <svg class='arrow-right'><use xlink:href="#arrow-right"></use></svg></a>
		<img class='' src="<?php echo get_template_directory_uri(); ?>/img/6-Footer.jpg">
	</div>
</div>




