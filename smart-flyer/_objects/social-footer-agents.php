<?php $instas = smartflyer_instagram_hashtag(); ?>
<div class='hp-social'>
	<div class='left-side'>
		<div class='small-col'>
			<?php $tweets = smartflyer_twitter(); ?>
			<?php $insta = $instas[0]; ?>
			<a href="<?php echo $insta['link']; ?>" target="_blank">
				<img src="<?php echo $insta['image']; ?>">
			</a>
			<div class='social-tweet'>
				<?php /*
				<div class='social-tweet-inner'>
					<a href='<?php echo exsite_get_option('twitter'); ?>' target="_blank"><svg class='tw'><use xlink:href="#tw"></use></svg></a>
					<?php $tweet = $tweets[0]; ?>
					<p><?php echo linkify_filtered($tweet->text); ?></p>
				</div>
				<a href='<?php echo exsite_get_option('twitter'); ?>' target="_blank" class='twitter-handle'>@theSmartflyer</a>
				*/ ?>
			</div>
		</div>
		<div class="large-col">
			<?php for($x=1;$x<=4;$x++): ?>
			<?php $insta = $instas[$x]; ?>
			<a href="<?php echo $insta['link']; ?>" target="_blank">
				<img src="<?php echo $insta['image']; ?>">
			</a>
			<?php endfor; ?>
		</div>
	</div>
	<div class='right-side'>
		<div class='inner-center'>
			<h2>Get Social</h2>
			<p>We're 100% obsessed, head over heels in love with social media.</p>
			<a href='<?php echo exsite_get_option('facebook'); ?>' target="_blank"><svg class='fb'><use xlink:href="#fb"></use></svg></a>
			<a href='<?php echo exsite_get_option('twitter'); ?>' target="_blank"><svg class='tw'><use xlink:href="#tw"></use></svg></a>
			<a href='<?php echo exsite_get_option('instagram'); ?>' target="_blank"><svg class='ig'><use xlink:href="#ig"></use></svg></a>
			<a href='<?php echo exsite_get_option('snapchat'); ?>' target="_blank"><svg class='sc'><use xlink:href="#sc"></use></svg></a>
		</div>
	</div>
</div>