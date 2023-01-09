<?php get_header(); ?>

<?php
	$cover_id = get_post_meta($post->ID, '_agent_cover_id', true);
	$cover_show = false;
?>
<div class="wp-container">
	<?php if ($cover_id) { $cover_show = true; ?>
		<?php $cover = exsite_image_resize($cover_id, '1800x0', false); ?>
		<section class="agent-view-banner-section background" style="background-image: url(<?php echo $cover; ?>);">
			<div class="">
			</div>
		</section>
	<?php } else {
		$term_list = wp_get_post_terms($post->ID, 'agent_specialty', ['fields' => 'all']);
		$primary_term_id = get_post_meta($post->ID, '_yoast_wpseo_primary_agent_specialty',true);
		$term_item = '';
		if (!$primary_term_id && count($term_list) > 0) {
			$term_item = $term_list[0];
			
		} else {
			foreach($term_list as $term) {
				if( $primary_term_id == $term->term_id ) {
					$term_item = $term;
					break;
				}
			}
		}
		if ($term_item)  {
			$cover_show = true;
			$slug = $term_item->slug;
			$cover = get_stylesheet_directory_uri() . '/images/agent/cover/' . $slug . '.jpg';
			?>
			<section class="agent-view-banner-section background" style="background-image: url(<?php echo $cover; ?>);">
				<div class="">
				</div>
			</section>
			<?php
		}
	}
	?>
	<section>
		<div class="agent-view-content-section">
			<div class="container">
				<div class="agent-view-content-wrap" <?php if (!$cover_show) {
														echo 'remove-banner';
													} ?>>
					<div class="content-left">
						<div class="users-details">
							<div class="agent-img">
								<?php
								$featured = exsite_image_resize(get_post_thumbnail_id($post->ID), '268x268');
								if ($featured)
									$image = $featured;
								else
									$image = get_template_directory_uri() . '/img/raster/compressed/avatar.png';
								?>
								<img src='<?php echo $image; ?>'>
							</div>

							<div class="content-star">
								<h3><?php echo $post->post_title; ?></h3>
								<?php if ($year_started = get_post_meta($post->ID, '_agent_experience', true)) : ?>
									<?php if (date('Y') - $year_started > 1) : ?>
										<?php $locations = wp_get_post_terms($post->ID, 'agent_location'); ?>
										<?php if ($locations) : ?>
											<?php $location = $locations[0]; ?>
											<span><?php echo $location->name; ?></span>
										<?php endif; ?>
										<br/>
										<span><?php echo date('Y') - $year_started; ?></span>
										<span>
											<?php if (date('Y') - $year_started > 1) : ?> Years of experience
											<?php else : ?> Year
											<?php endif; ?>
										</span>
									<?php endif; ?>
								<?php endif; ?>
							</div>


							<?php $specialities = wp_get_post_terms($post->ID, 'agent_specialty'); ?>
							<?php if ($specialities) : ?>
								<div class="Specialty-content">
									<?php 
										if (count($specialities) > 1) : 
									?>
										<span>Specialties</span>
									<?php endif; ?>
									<?php 
										if (count($specialities) == 1) : 
									?>
										<span>Specialties</span>
									<?php endif; ?>
									<ul>
										<li><?php echo get_the_term_list($post->ID, 'agent_specialty', '', ', '); ?></li>
									</ul>
								</div>
							<?php endif; ?>
							
							<?php $agentTip = get_post_meta($post->ID, '_agent_tip', true); ?>
							<?php if (!empty($agentTip)) : ?>
								<div class="Specialty-content">
									<span>Agent TIp</span>
									<ul>
										<li><?php echo $agentTip; ?></li>
									</ul>
								</div>
							<?php endif; ?>
						</div>

						<div class="social-media">
							<ul>
								<?php if ($fb =  get_post_meta($post->ID, '_agent_facebook', true)) : ?>
									<li>
										<a href="<?php echo $fb; ?>" target="_blank">
											<i class="fa fa-facebook" aria-hidden="true"></i>
										</a>
									</li>
								<?php endif; ?>
								<?php if ($tw =  get_post_meta($post->ID, '_agent_twitter', true)) : ?>
									<li>
										<a href="<?php echo $tw; ?>" target="_blank">
											<i class="fa fa-twitter" aria-hidden="true"></i>
										</a>
									</li>
								<?php endif; ?>
								<?php if ($insta =  get_post_meta($post->ID, '_agent_instagram', true)) : ?>
									<li>
										<a href="<?php echo $insta; ?>" target="_blank">
											<i class="fa fa-instagram" aria-hidden="true"></i>
										</a>
									</li>
								<?php endif; ?>
								<?php if ($linkedin =  get_post_meta($post->ID, '_agent_linkedin', true)) : ?>
									<li>
										<a href="<?php echo $linkedin; ?>" target="_blank">
											<i class="fa fa-linkedin" aria-hidden="true"></i>
										</a>
									</li>
								<?php endif; ?>
								<?php if ($website =  get_post_meta($post->ID, '_agent_website', true)) : ?>
									<li>
										<a href="<?php echo $website; ?>" target="_blank">
											<img src="<?php echo get_stylesheet_directory_uri() ?>/images/link.png">
										</a>
									</li>
								<?php endif; ?>
							</ul>
						</div>
						<?php if ($email =  get_post_meta($post->ID, '_agent_email', true)) : ?>
							<?php $names = explode(" ", $post->post_title); ?>
							<div class="button-1 email-rachel">
								<a href="mailto:<?php echo $email; ?>" target="_blank">Email <?php echo $names[0]; ?> </a>
							</div>
						<?php endif; ?>

						
						<!-- Recognition -->
						<?php $recognitions = get_post_meta($post->ID, '_agent_recognition', true); ?>
						<?php if($recognitions) : ?>
							<div class="Recognition-content mt-3">
								<span>Recognition</span>
								<ul>
									<?php foreach(array_slice($recognitions, 0, 3) as $recognition): ?>
									<li>
										<a href="<?php echo $recognition['link'] ?>">
											<div class="d-flex">
												<div class="d-flex align-items-center justify-content-center">
													<img src="<?php echo $recognition['image']; ?>" />
												</div>
												<div class="Recognition-description">
													<span><?php echo $recognition['subtitle']; ?></span>
													<h4><?php echo $recognition['name']; ?></h4>
												</div>
											</div>
										</a>
									</li>
									<?php endforeach; ?>
									<?php foreach(array_slice($recognitions, 3) as $recognition): ?>
									<li class="hide-content">
										<a href="<?php echo $recognition['link'] ?>">
											<div class="d-flex">
												<div class="d-flex align-items-center justify-content-center">
													<img src="<?php echo $recognition['image']; ?>" />
												</div>
												<div class="Recognition-description">
													<span><?php echo $recognition['subtitle']; ?></span>
													<h4><?php echo $recognition['name']; ?></h4>
												</div>
											</div>
										</a>
									</li>
									<?php endforeach; ?>
								</ul>
								<?php
								if (count($recognitions) > 3) {
								?>
								<div class="button-1"><a href="javascript:void(0);" class="load-more-recognition">Load More</a></div>
								<?php
								}
								?>
							</div>
						<?php endif; ?>
						<!-- Recognition -->

						<!-- Press -->
						<input type="hidden" value="<?php echo $post->ID; ?>" id="post_id" />
						<div class="press-wrap-div">
							<?php
							$args = array(
								'post_type' => 'press',
								'post_status' => 'publish',
								'posts_per_page' => 4,
								'orderby' => 'date',
								'order' => 'DESC',
								'meta_query' => array(
									array(
										'key' => '_press_agent',
										'value' => '"' . $post->ID . '"',
										'compare' => 'LIKE'
									)
								)
							);

							$aID = get_the_ID();
							$query = new WP_Query($args);
							if ($query->have_posts()) {
							?>
								<span>PRESS</span>
								<div class="press-wrap">
									<ul>
										<?php while ($query->have_posts()) : $query->the_post();
										$press_link = get_post_meta(get_the_ID(), '_press_link', true);
										$parse = parse_url($press_link);
										$press_domain = $parse['host'];
										$url = "https://logo.clearbit.com/" . $press_domain;
										$file_headers = get_headers($url);
										if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
											$exists = false;
										}
										else {
											$exists = true;
										}
										?>
											<li>
												<?php
													if (get_post_meta(get_the_ID(), '_press_image_white', true)) {
												?>
													<div>
														<a href="<?php echo get_post_meta(get_the_ID(), '_press_link', true); ?>">
															<img src="<?php echo get_post_meta(get_the_ID(), '_press_image_white', true); ?>" />
														</a>
													</div>
												<?php
													} else {
												?>
													<div>
														<a href="<?php echo get_post_meta(get_the_ID(), '_press_link', true); ?>">
															<?php if($exists) { ?>
																<img src="https://logo.clearbit.com/<?php echo $press_domain; ?>" />
															<?php } else { ?>
																<img src="<?php echo get_stylesheet_directory_uri() ?>/images/press/press-default-icon.png" />
															<?php } ?>
														</a>
													</div>
												<?php
													}
												?>
												<h5><a href="<?php echo get_post_meta(get_the_ID(), '_press_link', true); ?>"><?php the_title(); ?></h5></a>
											</li>
										<?php
											endwhile;
											wp_reset_postdata();
										?>
									</ul>
								</div>
								<?php
								if ($query->found_posts > 4) {
								?>
								<div class="button-1"><a href="javascript:void(0);" class="load-more-press">Load More</a></div>
								<?php
								}
								?>
							<?php } ?>
						</div>
						<!-- Press -->

						<!-- Review Contributions -->
						<input type="hidden" value="<?php echo $post->ID; ?>" id="post_id" />
						<div class="review-contributions-content">
							<?php
							$args = array(
								'post_type' => 'review',
								'post_status' => 'publish',
								'posts_per_page' => 2,
								'orderby' => 'date',
								'order' => 'DESC',
								'meta_query' => array(
									array(
										'key' => '_review_agent',
										'value' => '"' . $post->ID . '"',
										'compare' => 'LIKE'
									)
								)
							);

							$aID = get_the_ID();
							$query = new WP_Query($args);
							
							if ($query->have_posts()) {
							?>
								<span>REVIEW CONTRIBUTIONS</span>
								
								
								<div class="review-contributions-info">
									<ul>
										<?php while ($query->have_posts()) : $query->the_post();
										?>
											<li>
												<a href="<?php echo get_permalink(); ?>">
													<div class="contribution-review-wrapper" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>);">
														<div class="contribution-review-wrapper-black">
															<div class="contribution-review-wrapper-inner">
																<h1 class="contribution-review-name"><?php echo get_the_title(); ?></h1>
																<h1 class="contribution-review-location"><?php echo get_post_meta(get_the_ID(), '_review_place', true); ?></h1>
															</div>
														</div>
													</div>
												</a>
											</li>
										<?php
											endwhile;
											wp_reset_postdata();
										?>
									</ul>
								</div>
								<?php
								if ($query->found_posts > 2) {
								?>
								<div class="button-1"><a href="javascript:void(0);" class="load-more-contributions">Load More</a></div>
								<?php
								}
								?>
							<?php } ?>
						</div>
						<!-- Review Contributions -->

					</div>
					<div class="content-right agent-main">
						<?php //if ($gallery = get_post_meta($post->ID, '_agent_gallery', true)) : ?>
							<!-- <div class="partners-filter ">
								<div class="partners-wrap">
									<div class="inner">
										<?php //$counter = 1; ?>
										<?php //foreach ($gallery as $id => $pic) : ?>
											<?php //$img = exsite_image_resize($id, '1200x0', false); ?>
											<?php //$cap = wp_get_attachment_caption($id); ?>
											<div class="partners-content background" style="background-image: url(<?php // echo $img; ?>);">
												<div class="content">
													<h4></h4> -->
													<!-- <p>Santorini, Greece</p> -->
												<!-- </div>
											</div>
											<?php //$counter++; ?>
										<?php //endforeach; ?>
									</div>
								</div>
							</div> -->
						<?php //endif; ?>

						<?php
						$main_post = $post;
						$args = array(
							'posts_per_page'   => 2,
							'meta_query' => array(
								array(
									'key' => '_post_agent',
									'compare' => 'LIKE',
									'value' => $main_post->ID,
								)
							),
						);
						$posts = get_posts($args);
						?>

						<?php echo apply_filters('the_content', $post->post_content); ?>

						<?php $travelTip = get_post_meta($post->ID, '_agent_travel_tip', true); ?>
						<?php if (!empty($travelTip)) : ?>
							<div class="travel-tip-wrapper">
								<h2>Travel Tip</h2>
								<ul>
									<li class="travel-tip-content"><?php echo $travelTip; ?></li>
								</ul>
							</div>
						<?php endif; ?>

						<?php 
							$agentFavSpot = get_post_meta($post->ID, '_agent_fav_spot', true); 
							$args = array(
								'post_type' => 'review',
								'p' => $agentFavSpot
							);
							$post_options = array();
							$posts = get_posts( $args );

							$review_title = '';
							$review_link = '';

							if ( count($posts) > 0 ) {
								$review_title = $posts[0]->post_title;
								$review_link = get_permalink($posts[0]->ID);
							}
							wp_reset_query();
						?>
						
						<!-- <?php if (!empty($agentFavSpot)) : ?>
							<div class="travel-tip-wrapper">
								<h2>Favorite Property</h2>
								<div class="favorite-review-wrapper" style="background-image: url(<?php echo get_the_post_thumbnail_url($posts[0]->ID,'full'); ?>);">
									<div class="favorite-review-wrapper-inner">
										<h1 class="favorite-review-name"><?php echo $review_title; ?></h1>
										<h1 class="favorite-review-location"><?php echo get_post_meta($posts[0]->ID, '_review_place', true); ?></h1>
									</div>
								</div>
							</div>
						<?php endif; ?> -->


						<!-- Testimonials -->
						<?php $testimonials = get_post_meta($post->ID, '_agent_testimonials', true); ?>
						<?php if($testimonials) : ?>
							<div class="testimonial-tip-wrapper">
								<h2>Testimonials</h2>
								<div class="testimonial-slider-main">
									<?php foreach($testimonials as $testimonial): ?>
										<div class="testimonial-wrapper-inner">
											<h1><?php echo $testimonial['quote']; ?></h1>
											<p>-<?php echo $testimonial['name']; ?></p>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endif; ?>
						<!-- Testimonials -->
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- slider-image-section -->
	<!-- <section class="home-slider-main-section destination-getaway partners-destination-slider">
		<div class="padding-left">
			<div class="title">
				<h2>Recommended by Rachel</h2>
			</div>
			<div class="home-slider-main">
				<div class="slider-img-list slider-img-list-slider">
					<div class="slider-content">
						<div class="slider-image top-curve">
							<img src="<?php echo get_stylesheet_directory_uri() ?>/images/all-knw-right.png">
						</div>
						<div class="travel-by">
							<span>TRAVEL CULTURE - 10.06.2021</span>
						</div>
						<div class="slider-Heding">
							<h3>Travel by the Stars: Where to Go Based on Your Sign</h3>
						</div>
						<div class="slider-desc">
							<p>The exact time of year you were born has everything to do with how you traverse the globe and what kinds of places are most suited to you. In response to the popularity of our last astrological roundup...</p>
						</div>
						<div class="contribute-by">
							<p>CONTRIBUTED BY <span>REBECCA GORDON</span></p>
						</div>
					</div>
					<div class="slider-content">
						<div class="slider-image full-square">
							<img src="<?php echo get_stylesheet_directory_uri() ?>/images/all-knw-right.png">
						</div>
						<div class="travel-by">
							<span>TRAVEL CULTURE - 10.06.2021</span>
						</div>
						<div class="slider-Heding">
							<h3>Travel by the Stars: Where to Go Based on Your Sign</h3>
						</div>
						<div class="slider-desc">
							<p>The exact time of year you were born has everything to do with how you traverse the globe and what kinds of places are most suited to you. In response to the popularity of our last astrological roundup...</p>
						</div>
						<div class="contribute-by">
							<p>CONTRIBUTED BY <span>REBECCA GORDON</span></p>
						</div>
					</div>
					<div class="slider-content">
						<div class="slider-image bottom-right-curve">
							<img src="<?php echo get_stylesheet_directory_uri() ?>/images/all-knw-right.png">
						</div>
						<div class="travel-by">
							<span>TRAVEL CULTURE - 10.06.2021</span>
						</div>
						<div class="slider-Heding">
							<h3>Travel by the Stars: Where to Go Based on Your Sign</h3>
						</div>
						<div class="slider-desc">
							<p>The exact time of year you were born has everything to do with how you traverse the globe and what kinds of places are most suited to you. In response to the popularity of our last astrological roundup...</p>
						</div>
						<div class="contribute-by">
							<p>CONTRIBUTED BY <span>REBECCA GORDON</span></p>
						</div>
					</div>
					<div class="slider-content">
						<div class="slider-image top-curve">
							<img src="<?php echo get_stylesheet_directory_uri() ?>/images/all-knw-right.png">
						</div>
						<div class="travel-by">
							<span>TRAVEL CULTURE - 10.06.2021</span>
						</div>
						<div class="slider-Heding">
							<h3>Travel by the Stars: Where to Go Based on Your Sign</h3>
						</div>
						<div class="slider-desc">
							<p>The exact time of year you were born has everything to do with how you traverse the globe and what kinds of places are most suited to you. In response to the popularity of our last astrological roundup...</p>
						</div>
						<div class="contribute-by">
							<p>CONTRIBUTED BY <span>REBECCA GORDON</span></p>
						</div>
					</div>
					<div class="slider-content">
						<div class="slider-image top-curve">
							<img src="<?php echo get_stylesheet_directory_uri() ?>/images/home-slider-1.png">
						</div>
						<div class="travel-by">
							<span>TRAVEL CULTURE - 10.06.2021</span>
						</div>
						<div class="slider-Heding">
							<h3>Travel by the Stars: Where to Go Based on Your Sign</h3>
						</div>
						<div class="slider-desc">
							<p>The exact time of year you were born has everything to do with how you traverse the globe and what kinds of places are most suited to you. In response to the popularity of our last astrological roundup...</p>
						</div>
						<div class="contribute-by">
							<p>CONTRIBUTED BY <span>REBECCA GORDON</span></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->
	<!-- slider-image-section -->
</div>
<?php get_footer(); ?>