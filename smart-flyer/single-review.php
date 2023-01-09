<?php get_header(); ?>
<!-- ===================== -->
<?php
$args = array(
	'post_type' => 'partner',
	'meta_query' => array(
		array(
			"key" => '_partner_reviews',
			"value" => '"'.$post->ID.'"',
			"compare" => 'LIKE'
		)
	)
);

$partners = get_posts($args);

$partner_title = '';
$partner_link = '';

if ( count($partners) > 0 ) {
    $partner_title = $partners[0]->post_title;
	$partner_link = get_permalink($partners[0]->ID);
}

wp_reset_query();

?>
<section class="review-banner-section background" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID,'full'); ?>);">
	<div class="container">
		<div class="review-banner">
			<div class="inner">
				<div class="tag-line">
					<?php if ($partner_link) { ?>
						<a href="<?php echo $partner_link ?>" style="color: white;">
							<?php echo $partner_title; ?>
						</a>
					<?php } ?>
				</div>
				<h1><?php echo $post->post_title; ?></h1>
				<h3 style="font-size: 20px;"><?php echo get_post_meta($post->ID, '_review_place', true); ?></h3>
				<div class="content" style="font-size: 14px;line-height: 20px;color: #FFFFFF;">
					<?php echo get_post_meta($post->ID, '_review_quote', true); ?>
				</div>
				<?php 
                if (!empty(get_post_meta($post->ID, '_review_agent', true))) {
                	$agent_id_list = get_post_meta($post->ID, '_review_agent', true);
                ?>
				<?php } ?>
				
			</div>
		</div>
	</div>
	<div class="recently-checkedin-agent-wrapper">
		<div class="recently-checkedin-agent-header">
		</div>
		<div class="recently-checkedin-agent-container">
			<img class="recently-to-below-img" src="<?php echo get_stylesheet_directory_uri() ?>/images/to-below--vector.png">
			<h1 class="recently-checkedin-agent-title">
				Who recently checked in
			</h1>
			<?php 
				foreach ($agent_id_list as $key => $agent_id) : 
				if ($key < 3) {
				$agent = get_post($agent_id);
				$featured = exsite_image_resize(get_post_thumbnail_id($agent->ID), '50x50');
				$agnet_name = $agent->post_title;
				$locations = wp_get_post_terms($agent->ID, 'agent_location');
				if ($featured)
					$image = $featured;
				else
					$image = get_template_directory_uri() . '/img/raster/compressed/avatar.png';
			?>
				<div class="recently-checkedin-agent-content">
					<div class="review_agent_image_left">
						<div class="review_agent_image_content">
							<img src="<?php echo $image; ?>" />
						</div>
						<div class="review_agent_text_content">
							<h1 class="review_agent_name">
								<?php echo $agnet_name; ?>
							</h1>
							<h1 class="review_agent_location">
								<?php if ($locations) : ?>
									<?php $location = $locations[0]; ?>
									<?php echo $location->name; ?>
								<?php endif; ?>
							</h1>
							<a class="review_agent_link" target="_blank" href="<?php echo get_permalink($agent->ID);?>">
								VIEW AGENT PAGE
							</a>
						</div>
					</div>
					<a target="_blank" href="<?php echo get_permalink($agent->ID);?>">
						<img class="recently-to-right-img" src="<?php echo get_stylesheet_directory_uri() ?>/images/to-right.png">
					</a>
				</div>
			<?php } endforeach; ?>
			<div class="recently-all-agent-wrapper">
				<a target="_blank" href="<?php echo get_site_url() . '/agents'; ?>">
					<h5 class="recently-checkin-label">OR, VIEW ALL OUR AGENTS</h5>
				</a>
				<a target="_blank" href="<?php echo get_site_url() . '/agents'; ?>">
					<img class="recently-to-all-agent" src="<?php echo get_stylesheet_directory_uri() ?>/images/to-right.png">
				</a>
			</div>
		</div>
	</div>
</section>

<section class="custom-scroll-section review-custom-scroll">
	<div class="">
		<div class="custom-scroll">
			<!-- <?php $review_items = get_post_meta($post->ID, 'review_item', true); ?>
			<ul>
				<?php foreach ($review_items as $key => $review_item) : ?>
					<li class='review-row'>
						<a href="#tab-<?php echo $key ?>" class='review-label'><?php echo $review_item['label']; ?></a>
					</li>
				<?php endforeach; ?>
			</div> -->
			<ul>
				<li class="active"><a href="#overview ">OVERVIEW</a></li>
				<?php if (!empty(get_post_meta($post->ID, '_review_info_room_title', true)) && !empty(get_post_meta($post->ID, '_review_info_room_description', true))) { ?><li><a href="#rooms"><?php echo get_post_meta($post->ID, '_review_info_room_title', true); ?></a></li><?php } ?>
				<?php if (!empty(get_post_meta($post->ID, '_review_info_pool_title', true)) && !empty(get_post_meta($post->ID, '_review_info_pool_description', true))) { ?><li><a href="#pool"><?php echo get_post_meta($post->ID, '_review_info_pool_title', true); ?></a></li><?php } ?>
				<?php if (!empty(get_post_meta($post->ID, '_review_info_spa_title', true)) && !empty(get_post_meta($post->ID, '_review_info_spa_description', true))) { ?><li><a href="#spa"><?php echo get_post_meta($post->ID, '_review_info_spa_title', true); ?></a></li><?php } ?>
				<?php if (!empty(get_post_meta($post->ID, '_review_info_restaurant_title', true)) && !empty(get_post_meta($post->ID, '_review_info_restaurant_description', true))) { ?><li><a href="#restaurants "><?php echo get_post_meta($post->ID, '_review_info_restaurant_title', true); ?></a></li><?php } ?>
				<li><a href="#more">MORE</a></li>
			</ul>
			<div class="recently-checkin-wrapper">
				<?php
				  if (count($agent_id_list) > 0) {
				?>
				<h5 class="recently-checkin-label">Recently checked in</h5>
				<?php }  ?>
				<div class="recently-checkedin-image-wrapper">
					<?php 
						foreach ($agent_id_list as $key => $agent_id) : 
						if ($key < 3) {
						$agent = get_post($agent_id);
						$featured = exsite_image_resize(get_post_thumbnail_id($agent->ID), '50x50');
						if ($featured)
							$image = $featured;
						else
							$image = get_template_directory_uri() . '/img/raster/compressed/avatar.png';
					?>
						<div class="reivew_agent_image">
							<img src="<?php echo $image; ?>" />
						</div>
					<?php } endforeach; ?>
				</div>
			</div>
		</div>
</section>
<?php $review_items =  get_post_meta($post->ID, 'review_item', true); ?>
<section>
	<div class="container">
		<div class="property-overview" id="overview">
			<div class="property-overview-inner">
				<div class="property-overview-left">
					<div class="title">
						<h2>Property Overview</h2>
					</div>
					<div class="content">
					<?php 
					if(!empty(get_post_meta($post->ID, '_review_info_review_description_main', true))){ 
						echo nl2br(get_post_meta($post->ID, '_review_info_review_description_main', true)); 
					}else{
						echo nl2br($review_items[0]['text']); 
					} ?>
					</div>
					<div class="review-view-more-btn-div">
						<div class='view-more-left-wrapper'>
                            <img class="view-more-left-img" src="<?php echo get_stylesheet_directory_uri() ?>/images/Vector-down.png">
							<h3 class="view-more-left-text">VIEW MORE</h3>
                        </div>
					</div>
				</div>
				<div class="property-overview-right property-review-right">
					<div class='review-sidebar'>
						<?php $tip_items = get_post_meta($post->ID, 'tips_blue', true); ?>
						<?php if (count($tip_items)) : ?>
							<div class='title'>
								<h2>SmartFlyer Exclusives</h2>
							</div>
							<div class="content ">
								<ul>
									<?php foreach ($tip_items as $tip_item) : ?>
										<li><?php echo $tip_item['tip']; ?></li>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endif; ?>
					</div>
					<div class="review-view-more-btn-div">
						<div class='view-more-right-wrapper'>
                            <img class="view-more-right-img" src="<?php echo get_stylesheet_directory_uri() ?>/images/Vector-down.png">
							<h3 class="view-more-right-text">VIEW MORE</h3>
                        </div>
					</div>
				</div>
			</div>
		</div>
		<div class="agent-tips-container">
			<?php $tip_items = get_post_meta($post->ID, 'tips_grey', true); ?>
			<?php if (count($tip_items)) : ?>
			<div class='title'>
				<h2>Agent Tips</h2>
			</div>
			<div class="content ">
				<ul>
					<?php foreach ($tip_items as $tip_item) : ?>
					<li>
						<?php echo $tip_item['tip']; ?>
						<?php 
						if (!empty($tip_item['block_agent'])) {
							$agent_id_tip_item = $tip_item['block_agent'];
							$agent_tip_item = get_post($agent_id_tip_item);
							$featured_tip_item = exsite_image_resize(get_post_thumbnail_id($agent_tip_item->ID), '50x50');
							$agent_name_tip_item = $agent_tip_item->post_title;
							if ($featured_tip_item)
								$image_tip_item = $featured_tip_item;
							else
								$image_tip_item = get_template_directory_uri() . '/img/raster/compressed/avatar.png';
						?>
							<div class="block_agent_container">
								<a target="_blank" href="<?php echo get_permalink($agent_tip_item->ID);?>">
									<div class="block_agent_image">
										<img src="<?php echo $image_tip_item; ?>" />
									</div>
								</a>
								<a target="_blank" href="<?php echo get_permalink($agent_tip_item->ID);?>">
									<h1 class="block_agent_name">
										<?php echo $agent_name_tip_item; ?>
									</h1>
								</a>
							</div>
						<?php
							}
						?>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>	
		</div>
	</div>
</section>

<!-- <section class="map-image-wrap">
	<div class="map-image">
		<img src="<?php echo get_stylesheet_directory_uri() ?>/images/map-img.png">
	</div>
</section> -->
<?php if (!empty(get_post_meta($post->ID, '_review_info_room_title', true)) && !empty(get_post_meta($post->ID, '_review_info_room_description', true))) { ?>

	<section class="the-rooms-section blue-background the-rooms-section-new" id="rooms">
		<div class="container">
			<div class="the-rooms-wrap">
				<div class="content">
					<span><?php echo get_post_meta($post->ID, '_review_info_room_title', true); ?></span>
					<h2><?php echo get_post_meta($post->ID, '_review_info_room_subhead', true); ?></h2>
					<?php echo nl2br(get_post_meta($post->ID, '_review_info_room_description', true)); ?>
					<?php 
						if (!empty(get_post_meta($post->ID, '_review_info_block_agent', true))) {
							$agent_id_block = get_post_meta($post->ID, '_review_info_block_agent', true);
							$agent_block = get_post($agent_id_block);
							$featured_block = exsite_image_resize(get_post_thumbnail_id($agent_block->ID), '50x50');
							$agent_name_block = $agent_block->post_title;
							if ($featured_block)
								$image_block = $featured_block;
							else
								$image_block = get_template_directory_uri() . '/img/raster/compressed/avatar.png';
					?>
						<div class="block_agent_container">
							<a target="_blank" href="<?php echo get_permalink($agent_block->ID);?>">
								<div class="block_agent_image">
									<img src="<?php echo $image_block; ?>" />
								</div>
							</a>
							<a target="_blank" href="<?php echo get_permalink($agent_block->ID);?>">
								<h1 class="block_agent_name_white">
									<?php echo $agent_name_block; ?>
								</h1>
							</a>
						</div>
					<?php
						}
					?>
				</div>
				<div class="featured-room">
					<div class="featured-img featured-img-new">
						<img src="<?php echo get_post_meta($post->ID, '_review_info_room_image', true); ?>">
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } ?>
<?php if (!empty(get_post_meta($post->ID, '_review_info_pool_title', true)) && !empty(get_post_meta($post->ID, '_review_info_pool_description', true))) { ?>
	<section class="the-rooms-section pool-gym-sec" id="pool">
		<div class="container">
			<div class="the-rooms-wrap">
				<div class="content">
					<span><?php echo get_post_meta($post->ID, '_review_info_pool_title', true); ?></span>
					<div class="review-content-body">
						<h2 class="black review-content-sub-title"><?php echo get_post_meta($post->ID, '_review_info_pool_subhead', true); ?></h2>
						<div class="review-content-copy">
							<?php echo nl2br(get_post_meta($post->ID, '_review_info_pool_description', true)); ?>
							<?php 
								if (!empty(get_post_meta($post->ID, '_review_info_pool_agent', true))) {
									$agent_id_pool = get_post_meta($post->ID, '_review_info_pool_agent', true);
									$agent_pool = get_post($agent_id_pool);
									$featured_pool = exsite_image_resize(get_post_thumbnail_id($agent_pool->ID), '50x50');
									$agent_name_pool = $agent_pool->post_title;
									if ($featured_pool)
										$image_pool = $featured_pool;
									else
										$image_pool = get_template_directory_uri() . '/img/raster/compressed/avatar.png';
							?>
								<div class="block_agent_container">
									<a target="_blank" href="<?php echo get_permalink($agent_pool->ID);?>">
										<div class="block_agent_image">
											<img src="<?php echo $image_pool; ?>" />
										</div>
									</a>
									<a target="_blank" href="<?php echo get_permalink($agent_pool->ID);?>">
										<h1 class="block_agent_name">
											<?php echo $agent_name_pool; ?>
										</h1>
									</a>
								</div>
							<?php
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="pool-img image-hover ">
			<img src="<?php echo get_post_meta($post->ID, '_review_info_pool_image', true); ?>">
		</div>
	</section>
<?php } ?>
<?php if (!empty(get_post_meta($post->ID, '_review_info_spa_title', true)) && !empty(get_post_meta($post->ID, '_review_info_spa_description', true))) { ?>
	<section class="the-rooms-section pool-gym-sec padding-top-div" id="spa">
		<div class="container">
			<div class="the-rooms-wrap">
				<div class="content">
					<span><?php echo get_post_meta($post->ID, '_review_info_spa_title', true); ?></span>
					<div class="review-content-body">
						<h2 class="black review-content-sub-title"><?php echo get_post_meta($post->ID, '_review_info_spa_subhead', true); ?></h2>
						<div class="review-content-copy">
							<?php echo nl2br(get_post_meta($post->ID, '_review_info_spa_description', true)); ?>
							<?php 
								if (!empty(get_post_meta($post->ID, '_review_info_spa_agent', true))) {
									$agent_id_spa = get_post_meta($post->ID, '_review_info_spa_agent', true);
									$agent_spa = get_post($agent_id_spa);
									$featured_spa = exsite_image_resize(get_post_thumbnail_id($agent_spa->ID), '50x50');
									$agent_name_spa = $agent_spa->post_title;
									if ($featured_spa)
										$image_spa = $featured_spa;
									else
										$image_spa = get_template_directory_uri() . '/img/raster/compressed/avatar.png';
							?>
								<div class="block_agent_container">
									<a target="_blank" href="<?php echo get_permalink($agent_spa->ID);?>">
										<div class="block_agent_image">
											<img src="<?php echo $image_spa; ?>" />
										</div>
									</a>
									<a target="_blank" href="<?php echo get_permalink($agent_spa->ID);?>">
										<h1 class="block_agent_name">
											<?php echo $agent_name_spa; ?>
										</h1>
									</a>
								</div>
							<?php
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="pool-img image-hover ">
			<img src="<?php echo get_post_meta($post->ID, '_review_info_spa_image', true); ?>">
		</div>
	</section>
<?php } ?>
<?php if (!empty(get_post_meta($post->ID, '_review_info_restaurant_title', true)) && !empty(get_post_meta($post->ID, '_review_info_restaurant_description', true))) { ?>
	<section class="the-rooms-section pool-gym-sec padding-top-div" id="restaurants">
		<div class="container">
			<div class="the-rooms-wrap">
				<div class="content">
					<span><?php echo get_post_meta($post->ID, '_review_info_restaurant_title', true); ?></span>
					<div class="review-content-body">
						<h2 class="black review-content-sub-title"><?php echo get_post_meta($post->ID, '_review_info_restaurant_subhead', true); ?></h2>
						<div class="review-content-copy">
							<?php echo nl2br(get_post_meta($post->ID, '_review_info_restaurant_description', true)); ?>
							<?php 
								if (!empty(get_post_meta($post->ID, '_review_info_restaurant_agent', true))) {
									$agent_id_restaurant = get_post_meta($post->ID, '_review_info_restaurant_agent', true);
									$agent_restaurant = get_post($agent_id_restaurant);
									$featured_restaurant = exsite_image_resize(get_post_thumbnail_id($agent_restaurant->ID), '50x50');
									$agent_name_restaurant = $agent_restaurant->post_title;
									if ($featured_restaurant)
										$image_restaurant = $featured_restaurant;
									else
										$image_restaurant = get_template_directory_uri() . '/img/raster/compressed/avatar.png';
							?>
								<div class="block_agent_container">
									<a target="_blank" href="<?php echo get_permalink($agent_restaurant->ID);?>">
										<div class="block_agent_image">
											<img src="<?php echo $image_restaurant; ?>" />
										</div>
									</a>
									<a target="_blank" href="<?php echo get_permalink($agent_restaurant->ID);?>">
										<h1 class="block_agent_name">
											<?php echo $agent_name_restaurant; ?>
										</h1>
									</a>
								</div>
							<?php
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="pool-img image-hover ">
			<img src="<?php echo get_post_meta($post->ID, '_review_info_restaurant_image', true); ?>">
		</div>
	</section>
<?php } ?>

<section class="the-rooms-section pool-gym-sec padding-top-div <?php if(empty(get_post_meta($post->ID, '_review_info_pool_subhead', true)) && empty(get_post_meta($post->ID, '_review_info_spa_subhead', true)) && empty(get_post_meta($post->ID, '_review_info_spa_title', true)) && empty(get_post_meta($post->ID, '_review_info_pool_title', true)) && empty(get_post_meta($post->ID, '_review_info_restaurant_title', true))){ echo 'image_padding'; } ?>" id="more">
	<div class="container">
		<div class="restaurant-new-section">
			<!-- <div class="the-rooms-wrap">
				<div class="content">
					<span>Restaurant</span>
					<h2 class="black">Hotel das Cataratas, A Belmond Hotel’s restaurants offer a range of cuisines.</h2>
					<p>From tender barbecue to delicate fusion dishes. At Itaipu, guests can feast on signature Brazilian platters like Amazonian freshwater fish and racks of lamb. For all-day dining, Ipê offers delights from international buffets to Gaucho barbecues.</p>
				</div>
			</div> -->
			
			<div class="restaurant-new-wrap">
				<ul>
					<?php foreach ($review_items as $key => $review_item) { ?>

						<li>
							<div class="tag-line"><?php echo $review_item['label'];?></div>
							<div class="content">
								<?php echo nl2br($review_item['text']);?>
								<?php 
								if (!empty($review_item['agent'])) {
									$agent_id_review_item = $review_item['agent'];
									$agent_review_item = get_post($agent_id_review_item);
									$featured_review_item = exsite_image_resize(get_post_thumbnail_id($agent_review_item->ID), '50x50');
									$agent_name_review_item = $agent_review_item->post_title;
									if ($featured_review_item)
										$image_review_item = $featured_review_item;
									else
										$image_review_item = get_template_directory_uri() . '/img/raster/compressed/avatar.png';
								?>
									<div class="block_agent_container">
										<a target="_blank" href="<?php echo get_permalink($agent_review_item->ID);?>">
											<div class="block_agent_image">
												<img src="<?php echo $image_review_item; ?>" />
											</div>
										</a>
										<a target="_blank" href="<?php echo get_permalink($agent_review_item->ID);?>">
											<h1 class="block_agent_name">
												<?php echo $agent_name_review_item; ?>
											</h1>
										</a>
									</div>
								<?php
									}
								?>
							</div>
						</li>
						 
					<?php } ?>
					<?php if (!empty(get_post_meta($post->ID, '_review_location_text', true))){ ?>
					<li>
						<div class="tag-line">Location</div>
						<div class="content">
							<?php echo get_post_meta($post->ID, '_review_location_text', true); ?>
							<?php 
								if (!empty(get_post_meta($post->ID, '_review_location_agent', true))) {
									$agent_id_location = get_post_meta($post->ID, '_review_location_agent', true);
									$agent_location = get_post($agent_id_location);
									$featured_location = exsite_image_resize(get_post_thumbnail_id($agent_location->ID), '50x50');
									$agent_name_location = $agent_location->post_title;
									if ($featured_location)
										$image_location = $featured_location;
									else
										$image_location = get_template_directory_uri() . '/img/raster/compressed/avatar.png';
								?>
									<div class="block_agent_container">
										<a target="_blank" href="<?php echo get_permalink($agent_location->ID);?>">
											<div class="block_agent_image">
												<img src="<?php echo $image_location; ?>" />
											</div>
										</a>
										<a target="_blank" href="<?php echo get_permalink($agent_location->ID);?>">
											<h1 class="block_agent_name">
												<?php echo $agent_name_location; ?>
											</h1>
										</a>
									</div>
								<?php
									}
								?>
							</div>
						</div>
					</li>
					<?php } ?>
					
				</ul>
			</div>
			
		</div>
		
	</div>
</section>

<!-- Featured in -->
<?php
$featured_blog_ids = get_post_meta($post->ID, '_review_featured_in', true);
// var_dump($featured_blogs);
if ($featured_blog_ids && count($featured_blog_ids) > 0) {
$blog_args = array(
	'posts_per_page'    =>  -1,
	'post__in' 			=>	$featured_blog_ids
);
$featured_blogs = get_posts( $blog_args );
?>

<!-- slider-image-section -->
<section class="home-slider-main-section">
	<div class="container">
		<div class="title">
			<h2 class="featured-title">Featured in</h2>
		</div>
	</div>
	<div class="home-slider-main">
		<div class="container">
			<div class="slider-img-list slider-img-list-slider">
				<?php foreach($featured_blogs as $index => $post): ?>
				<div class="slider-content">
					<div class="slider-image image-shape-<?php echo ($index) % 3 + 1; ?>" data-aos="fade-up" data-aos-delay="500">
						<a target="_blank" href="<?php echo get_permalink($post->ID);?>">
							<?php $featured = exsite_image_resize(get_post_thumbnail_id($post->ID), '700x430'); ?>
							<img src="<?php echo $featured; ?>">
						</a>
					</div>
					<a target="_blank" href="<?php echo get_permalink($post->ID);?>">
						<div class="travel-by" data-aos="fade-up" data-aos-delay="600" style="text-transform: uppercase;">
							<span><?php echo get_the_category($post->ID)[0]->name; ?></span>
						</div>
					</a>
					<a target="_blank" href="<?php echo get_permalink($post->ID);?>">
						<div class="slider-Heding" data-aos="fade-up" data-aos-delay="700">
							<h3><?php echo $post->post_title; ?></h3>
						</div>
					</a>
					<div class="slider-desc" data-aos="fade-up" data-aos-delay="800">
						
						<?php 
								$trimmed_content = wp_trim_words( $post->post_content, 30, '...' ); ?>
								<p><?php echo $trimmed_content; ?></p>
						
					</div>
					<div class="contribute-by" data-aos="fade-up" data-aos-delay="900">
						<p>CONTRIBUTED BY <span><?php echo get_the_author_meta( 'display_name' , $post->post_author ); ?></span></p>
					</div>
				</div>
				<?php endforeach ?>
			</div>

		</div>
	</div>
</section>

<?php
wp_reset_query();
}
?>

<?php
	$images = get_post_meta($post->ID, '_review_images', true);
?>
<?php if (!empty($images)) { ?>
	<section class="review-swipe-new">
		<div class="container">
			<div class='review-featured-section'>
				<?php foreach ($images as $image_id => $image) : ?>
				<div class="review-featured-image-container">
					<div class="review-featured-image">
						<?php $image = wp_get_attachment_image_src($image_id, ''); ?>
						<img src='<?php echo $image[0]; ?>'>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php } ?>
<section class="book-now-section text-center">
	<div class="container">
		<h3>Connect with a SmartFlyer agent to plan your next trip.</h3>
		<div class="button-1">
			<a href="<?php echo get_site_url(); ?>/agents">Find an advisor</a>
		</div>
	</div>
</section>

<?php get_footer(); ?>