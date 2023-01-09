<?php get_header(); ?>
<?php smartflyer_post_view($post->ID); ?>

<article>
	<div class='article-share'>
		<ul>
			<li style="color: #111;">Share</li>
			<li style="color: #111;"><a href='http://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink($post->ID); ?>'><img class='article-share-img' style="width: 20px;" src="<?php echo get_stylesheet_directory_uri() ?>/images/Facebook-icon.png"></a></li>
			<li style="color: #111;"><a href="https://twitter.com/home?status=<?php echo urlencode($post->post_title); ?>%20%7C%20<?php echo urlencode(get_permalink($post->ID)); ?>%20%7C%20@theSmartFlyer"><img class='article-share-img' style="width: 20px;" src="<?php echo get_stylesheet_directory_uri() ?>/images/Linkedin-icon.png"></a></li>
			<li style="color: #111;"><a href="mailto:?subject=<?php echo $post->post_title; ?>&body=Check out this post: <?php echo get_permalink($post->ID); ?>"><img class='article-share-img' style="width: 20px;" src="<?php echo get_stylesheet_directory_uri() ?>/images/Email-icon.png"></a></li>
			<li style="color: #111;" class="pdf-download-btn-li"><img class='article-share-img pdf-download-btn' style="width: 20px;" src="<?php echo get_stylesheet_directory_uri() ?>/images/PDF-icon.png"></li>
		</ul>
	</div>

	<div class='article-intro'>
		<div class='article-meta'>
			<a class='article-category'>Industry News</a>
			<span class='meta-div'></span>
			<span class='meta-date'><?php echo date('m.d.Y', strtotime($post->post_date)); ?></span>
			<?php
				$author_content = '';
				$author_link = get_author_posts_url( $post->post_author );
				$author = get_user_meta($post->post_author, 'first_name', true).' '.get_user_meta($post->post_author, 'last_name', true);

				$issf = false;
				if($author == 'SmartFlyer ')
					$issf = true;

				if($agents = get_post_meta($post->ID, '_post_agent', true))
				{

					if(is_array($agents))
					{
						foreach($agents as $agent_id)
						{
							$agent = get_post($agent_id);
							if ($agent->post_status == 'publish')
							{
								$author_link = get_permalink($agent->ID);
								$author = $agent->post_title;
                                $featured = exsite_image_resize(get_post_thumbnail_id($agent->ID), '268x268');

								if($featured)
									$image = $featured;
								else
									$image = get_template_directory_uri().'/img/raster/compressed/avatar.png';
								$author_content.= '<a href="'.$author_link.'"><img src="'.$image.'">'.'<span>'.$author.'</span>'.'</a>';
							}
						}
					}
					else
					{
						$agent = get_post($agents);
						if ($agent->post_status == 'publish')
						{
							$author_link = get_permalink($agent->ID);
							$author = $agent->post_title;
                            $featured = exsite_image_resize(get_post_thumbnail_id($agent->ID), '268x268');
							if($featured)
								$image = $featured;
							else
								$image = get_template_directory_uri().'/img/raster/compressed/avatar.png';

							$author_content.= '<a href="'.$author_link.'"><img src="'.$image.'">'.'<span>'.$author.'</span>'.'</a>';
						}
					}

					$issf = false;
				}
				else
				{
					$image = get_template_directory_uri().'/img/raster/compressed/avatar.png';
					$author_content.= '<a href="'.$author_link.'"><img src="'.$image.'">'.'<span>'.$author.'</span>'.'</a>';
				}

                if($authors = get_post_meta($post->ID, '_post_author', true))
                    $issf = false;

			?>
		</div>
		<h1><?php echo $post->post_title; ?></h1>
	</div>

    <?php $featured_image = exsite_image_resize(get_post_thumbnail_id($post->ID), '1620x795'); ?>
	<?php if($featured_image): ?>
	<img class='featured-image' src='<?php echo $featured_image; ?>'>
	<?php endif; ?>

	<div class='article-content'>
		<div class='article-credit'>

            <?php if(!$issf): ?>
			<!-- <div class='authors'>
				<small>
					<?php if (get_post_meta($post->ID, '_post_author_syntax', true)): ?>
						Written By
					<?php else: ?>
						Contributed By
					<?php endif; ?>
				</small>
				<?php if($authors = get_post_meta($post->ID, '_post_author', true)): ?>

						<?php foreach($authors as $author): ?>

							<?php $user = get_user_by('ID', $author); ?>

							<?php if ($user->user_url != ''): ?>
								<a href='<?php echo $user->user_url; ?>' target="_blank">
							<?php else: ?>
								<div class='author'>
							<?php endif; ?>
									<img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>">
									<span><?php echo $user->display_name; ?></span>
							<?php if ($user->user_url != ''): ?>
								</a>
							<?php else: ?>
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
				<?php else: ?>
                    <?php echo $author_content; ?>
                <?php endif; ?>
			</div> -->
            <?php endif; ?>

			<?php if($other_credits = get_post_meta($post->ID, '_post_other_credits', true)): ?>
			<div class='line'></div>
			<div class='details'>
				<?php foreach($other_credits as $other_credit): ?>
				<div class='detail'>
					<small><?php echo $other_credit['title']; ?></small>
					<?php $link = $other_credit['link']; ?>
					<?php if($link != ''): ?>
					<a href='<?php echo $link; ?>' target="_blank">
					<?php endif; ?>
						<?php echo $other_credit['name']; ?>
					<?php if($link != ''): ?>
					</a>
					<?php endif; ?>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>
		<?php echo smartflyer_images_check(apply_filters('the_content', $post->post_content)); ?>

	</div>

</article>

<?php if(get_post_meta($post->ID, '_post_show_book_now', true) == 'on'): ?>
<div class='wrapper'>
	<div class='review-cta review-detail-cta plan-a-trip-btn'>
		<h2>Book Now</h2>
		<p><?php echo exsite_get_option('book_now'); ?></p>
	</div>
</div>
<?php endif; ?>



<?php
	$args = array(
	    'posts_per_page'    =>  3,
	    'exclude'			=> array($post->ID),
	    'category' 		=> $category->term_id
	);
	$posts = get_posts(  $args );


	if(count($posts)<3)
	{
		$need_posts = 3 - count($posts);
		$exclude = array();
		$exclude[] = $post->ID;
		foreach($posts as $post)
			$exclude[] = $post->ID;
		$filler_posts = get_posts(array('exclude'=>$exclude,'posts_per_page'=>$need_posts,'orderby' => 'rand'));
		$posts = array_merge($posts, $filler_posts);
	}

?>
<?php if($posts): ?>
<div class='article-ymal'>
	<div class='wrapper'>
		<h2 class='line'>You May Also Like</h2>
		<div class='just-wrap'>
			<?php foreach($posts as $post): ?>
			<?php include('_objects/3-col-post.php'); ?>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<?php endif; ?>


<?php get_footer(); ?>