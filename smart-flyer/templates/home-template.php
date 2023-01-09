<?php
/*
Template Name: Home Template
*/

get_header(); ?>

<div class="wp-container">

	<!-- Hero Banner -->
	<section class="hero-banner-section" data-aos="fade-up" data-aos-easing="linear" data-aos-delay="300">
		<div class="herobanner">
			<div class="banner-content padding-left">
				<div class="inner">
					<div class="sub-title" >
                        <?php the_field('header_sub_title'); ?>
					</div>
                    <h1><?php the_field('home_page_title'); ?></h1>
					<div>
						<p>
                            <?php the_field('hero_description'); ?>
						</p>
					</div>
					<div class="banner-btn">
						<div class="button-1"><a href="<?php echo get_site_url() . '/what-we-do'; ?>">WHAT WE DO</a></div>
						<div class="button-1">
							<a href="javascript:void(0)" class="plan-a-trip-btn">
								PLAN A TRIP
							</a>
						</div>
					</div>
				</div>
			</div>
			<a href="<?php the_field('featured_story_link'); ?>">
				<div class="herobanner-image" data-aos="fade-left">
					<img src="<?php the_field('features_story_image_link'); ?>">
					<div class="herobanner-right-content">
						<div class="herobanner-content">
							<h3>FEATURED STORY</h3>
							<a href="<?php the_field('featured_story_link'); ?>"><h2><?php the_field('featured_story_title'); ?></h2></a>
						</div>
					</div>
				</div>
			<a>
		</div>
	</section>
	<!-- Hero Banner -->

	<!-- Partners  -->
	<section  data-aos="fade-up" data-aos-delay="400" data-aos-easing="linear">
		<div class="partners-section">
			<div class="container">
				<div class="partners-logs d-flex align-items-center">
					<a href="https://smartflyer.com/press" class="preffered_partner_a" target="_blank" style="color: #000; font-size: 16px; white-space: nowrap; margin-right: 10px; font-family: 'Canela'; font-weight: 300;">As Seen In</a>
					<!-- <p style="font-size: 16px;">As Seen In</p> -->
					<ul class="d-flex align-items-center">
						<li><a href="https://smartflyer.com/press" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/harper-baazaar.svg" ></a></li>
						<li><a href="https://smartflyer.com/press" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/conde-nast.svg"></a></li>
						<li><a href="https://smartflyer.com/press" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/new-york-times.svg"></a></li>
						<li><a href="https://smartflyer.com/press" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/martha-stewart-weddings.svg"></a></li>
						<li><a href="https://smartflyer.com/press" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/vogue.svg"></a></li>
						<li><a href="https://smartflyer.com/press" target="_blank"><img src="https://smartflyer.com/wp-content/uploads/2022/06/the-wall-street-journal-logo-png-8.png"></a></li>
					</ul>
					<a class="view_more_preffered_a" href="https://smartflyer.com/partners-page/#preferred-partners" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/goToIcon.png" style="width: 20px; margin-left: 10px"></a>
				</div>
			</div>
		</div>
	</section>
	<!-- Partners  -->

	<!-- Form tack of -->
	<section class="take-off-section" data-aos="fade-up" data-aos-delay="400" data-aos-easing="linear">
		<div class="take-off-main-wrap d-flex flex-wrap ">
			<div class="take-off-wrap padding-left">
				<div class="take-off-wrap-inner">
					<div class="content white">
						<h2 data-aos="fade-right" style="font-family: 'Canela'; font-weight: 300; font-size: 40px; line-height: 64px;  letter-spacing: 0.03em;">
							<?php the_field('section_1_title'); ?>
						</h2>
						<div data-aos="fade-right">
							<p style="font-family: 'Canela'">
								<?php the_field('section_1_description'); ?>
							</p>
						</div>
						<div class="button-2">
							<a href="<?php echo get_site_url() . '/what-we-do'; ?>">WHAT WE DO</a>
						</div>
					</div>
					<div class="take-off-image">
						<ul>
							<li>
								<div class="tack-img"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/Vector.svg"></div><span>Hotels</span>
							</li>
							<li>
								<div class="tack-img"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/Frame-2.svg"></div><span>Custom itinerary</span>
							</li>
							<li>
								<div class="tack-img"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/private.svg"></div><span>Flights & private charter</span>
							</li>
							<li>
								<div class="tack-img"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/celebrations.svg"></div><span>Celebrations</span>
							</li>
							<li>
								<div class="tack-img"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/villas.svg"></div><span>Villas</span>
							</li>
							<li>
								<div class="tack-img"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/corporate.svg"></div><span>Corporate Travel</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="take-off-right">
				<div class="right-image">
					<!-- <img src="<?php echo get_stylesheet_directory_uri() ?>/images/homepage-image2-new.jpg"> -->
					<div class="video">
						<video autoplay="true" loop="false" muted>
							<source src="<?php echo get_stylesheet_directory_uri() ?>/images/homepage-video.mp4" type="video/mp4">
						</video>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Form tack of -->

	<!-- slider-image-section -->
	<?php 
		$featured_articles = get_field('featured_article');
	?>
	<!-- slider-image-section -->
	<section class="home-slider-main-section" data-aos="fade-up" data-aos-delay="500" data-aos-easing="linear">
		<div class="home-slider-main">
			<div class="padding-left">

				<div class="slider-img-list slider-img-list-slider">
					<?php foreach($featured_articles as $index => $post): ?>
					<div class="slider-content">
						<div class="slider-image image-shape-<?php echo ($index) % 3 + 1; ?>" >
							<a target="_blank" href="<?php echo get_permalink($post->ID);?>">
								<?php $featured = exsite_image_resize(get_post_thumbnail_id($post->ID), '700x430'); ?>
								<img src="<?php echo $featured; ?>">
							</a>
						</div>
						<a target="_blank" href="<?php echo get_permalink($post->ID);?>">
							<div class="travel-by"  style="text-transform: uppercase;">
								<span><?php echo get_the_category($post->ID)[0]->name; ?></span>
							</div>
						</a>
						<a target="_blank" href="<?php echo get_permalink($post->ID);?>">
							<div class="slider-Heding">
								<h3><?php echo $post->post_title; ?></h3>
							</div>
						</a>
						<div class="slider-desc" >
							
							<?php 
								  $trimmed_content = wp_trim_words( $post->post_content, 30, '...' ); ?>
								  <p><?php echo $trimmed_content; ?></p>
							
						</div>
						<div class="contribute-by" >
							<p>CONTRIBUTED BY <span><?php echo get_the_author_meta( 'display_name' , $post->post_author ); ?></span></p>
						</div>
					</div>
					<?php endforeach ?>
				</div>

			</div>
			<div class="button-1" >
				<a href="<?php echo get_site_url() . '/blog'; ?>">MORE ITINERARIES, IDEAS AND INSPIRATION</a>
			</div>
		</div>
	</section>
	<?php
		wp_reset_query();
	?>

	<!-- slider-image-section -->
	<!-- partners -->
	<section data-aos="fade-up" data-aos-delay="800" data-aos-easing="linear">
		<div class="partners-section" >
			<div class="container">
				<div class="d-flex align-items-center justify-content-center">
					<a href="https://smartflyer.com/partners-page/#preferred-partners" class="preffered_partner_a" target="_blank" style="color: #000; font-size: 18px; white-space: nowrap; margin-right: 60px; font-family: 'Canela'; font-weight: 300;">Preferred partner of</a>
					<ul class="d-flex align-items-center justify-content-between partner-logos">
						<li><a href="https://smartflyer.com/partners-page/#preferred-partners" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/four-seasons-logo.png"></a></li>
						<li><a href="https://smartflyer.com/partners-page/#preferred-partners" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/partners/logos/logo-2.svg"></a></li>
						<li><a href="https://smartflyer.com/partners-page/#preferred-partners" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/Belmond_Logo.png"></a></li>
						<li><a href="https://smartflyer.com/partners-page/#preferred-partners" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/partners/logos/logo-4.svg"></a></li>
						<li><a href="https://smartflyer.com/partners-page/#preferred-partners" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/partners/logos/logo-5.svg"></a></li>
						<li><a href="https://smartflyer.com/partners-page/#preferred-partners" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/last-logo-preffered.svg"></a></li>
						
					</ul>
					<a class="view_more_preffered_a" href="https://smartflyer.com/partners-page/#preferred-partners" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/goToIcon.png" style="width: 50px; margin-left: 10px"></a>
				</div>
			</div>
		</div>
	</section>
	<!-- partners -->
	<!-- slider-image-section -->

	<!-- all-aboout-know -->
	<section class="all-aboout-know-section" data-aos="fade-up" data-aos-delay="500" data-aos-easing="linear">
		<div class="all-about-know-main d-flex flex-wrap">
			<div class="all-about-know-content padding-left">
				<div class="about-know-desc">
					<div class="about-know-heading">
						<h2 style="font-family: 'Canela'; font-weight: 300; font-size: 40px; line-height: 64px;  letter-spacing: 0.03em;">
							<?php the_field('middle_section_title'); ?>
						</h2>
					</div>
					<div class="about-desc">
						<p style="font-family: 'Canela'">
							<?php the_field('middle_section_description'); ?>
						</p>
					</div>
					<div class="all-know-img">
						<div class="images" >
							<div class="img">
								<img src="<?php echo get_stylesheet_directory_uri() ?>/images/know-1.png">
							</div>
							<div class="content">
								<p class="all-know-img-icon-text">Upgrade upon arrival, subject to availability</p>
							</div>
						</div>
						<div class="images">
							<div class="img">
								<img src="<?php echo get_stylesheet_directory_uri() ?>/images/know-3.png">
							</div>
							<div class="content">
								<p class="all-know-img-icon-text">Daily full breakfast for two guests per bedroom</p>
							</div>
						</div>
						<div class="images">
							<div class="img">
								<img src="<?php echo get_stylesheet_directory_uri() ?>/images/know-2.png">
							</div>
							<div class="content">
								<p class="all-know-img-icon-text">Complimentary one-way private transfers</p>
							</div>
						</div>
						<div class="images">
							<div class="img">
								<img src="<?php echo get_stylesheet_directory_uri() ?>/images/know-4.png">
							</div>
							<div class="content">
								<p class="all-know-img-icon-text">Early check-in/late check-out, subject to availability</p>
							</div>
						</div>
					</div>
					<div class="upgrade-btn" style="display: flex;">
						<div class="button-2" style="width: 400px;">
							<a href="javascript:void(0)" class="plan-a-trip-btn">UPGRADE MY STAY</a>
						</div>
					</div>
				</div>
				<div class="full-img">
					<img src="<?php the_field('middle_section_image_1'); ?>">
				</div>
			</div>
			<div class="about-knw-right-content">
				<div class="stamp">
					<img src="<?php echo get_stylesheet_directory_uri() ?>/images/stamp.png">
				</div>
				<div class="right-full-img">
					<img src="<?php the_field('middle_section_image_2'); ?>">
				</div>
			</div>
		</div>
	</section>
	<!-- all-aboout-know -->

	<?php 
		$featured_partners = get_field('featured_partner');
	?>

	<!-- takemeto -->
	<section class="take-me-to-section" data-aos="fade-up" data-aos-delay="600" data-aos-easing="linear">
		<div class="container">
			<div class="take-me-heading">
				<h2>#smartflyertakemeto</h2>
			</div>
			<div class="take-me-desc">
				<p>Inspiration for your next getaway</p>
			</div>
			<div class="take-me-img d-flex flex-wrap">
				<?php foreach($featured_partners as $index_p => $partner): ?>
				<div class="take-me-content col-4">
					<a href="<?php echo get_permalink($partner->ID);?>">
						<?php $featured = exsite_image_resize(get_post_thumbnail_id($partner->ID), '700x378'); ?>
						<div class="img">
							<img src="<?php echo $featured; ?>">
						</div>
						<div class="take-desc">
							<p style="text-transform: uppercase"><?php echo $partner->post_title; ?></p>
							<span>HOTEL PARTNER</span>
						</div>
					</a>
				</div>
				<?php $partners_count++; ?>
				<?php if ($partners_count >= 3) {
					break;
				} ?>
				<?php endforeach ?>
			</div>
			<div class="plan-trip">
				<a href="javascript:void(0)" class="plan-a-trip-btn">
					<p>Plan your trip with us</p>
				</a>
			</div>
		</div>
	</section>
	<!-- takemeto -->
	<!-- travel-advisor -->
	<section class="travel-advisor-section" data-aos="fade-up" data-aos-delay="800" data-aos-easing="linear">
		<div class="container">
			<div class="travel-center-content">
				<div class="travel-advisor-heading" >
					<h2><?php the_field('travel_advisor_title'); ?></h2>
				</div>
				<div class="travel-advisor-desc">
					<p>
						<?php the_field('travel_advisor_description'); ?>
					</p>
				</div>
				<?php $specialties = get_terms(array('taxonomy' => 'agent_specialty'));
				function cmp_count($a, $b)
				{
					return $b->count - $a->count;
				}
				usort($specialties, "cmp_count");
				?>
				<div class="travel-advisor-selector d-flex flex-wrap">
					<p>Find Your Expert In...</p>
					<div class="select-dropdown">
						<select class="custom-selector agent-selection">
							<?php $specialties_count = 0; ?>
							<option value="" disabled selected>Select Agent</option>
							<?php foreach ($specialties as $term) : ?>
								<option class='spec selection' data-where="specialty" data-tax="<?php echo $term->taxonomy; ?>" data-filter="<?php echo $term->slug; ?>" value="<?php echo $term->slug; ?>"><?php echo $term->name; ?> (<?php echo $term->count; ?>)</option>
								<?php $specialties_count++; ?>
								<?php if ($specialties_count >= 12) {
									break;
								} ?>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="button">
						<a href="javascript:void(0)" class="agent-info"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/white-search.svg"></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- travel-advisor -->

	<section class="travel-advisor-image" data-aos="fade-up" data-aos-delay="900" data-aos-easing="linear">
	    <div class="container">
	        <div class="travel-advisor-wrap">
	            <div class="left">
	                <div class="image">
	                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/images-Travel.JPG">
	                </div>
	            </div>
	            <div class="center">
	                <div class="image">
	                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/leila-brewster-photography-184.jpg">
	                </div>
	                <div class="image">
	                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/Schertz.jpg">
	                </div>
	                <div class="image">
	                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/Jennifer-Terra-Halberg.jpg">
	                </div>
	            </div>
	            <div class="right">
	                <div class="image">
	                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/Marissa-Grad.jpg">
	                </div>
	            </div>
	        </div>
	    </div>
	</section>


	<!-- <section class="travel-advisor-image">
		<div class="container">
			<div class="travel-advisor-wrap">
				<?php
				$args = array(
					'post_type' => 'agent',
					'post_status' => 'publish',
					'posts_per_page' => 5,
					'orderby' => 'date',
					'order' => 'DESC',
				);

				$query = new WP_Query($args);
				$count = 1;
				while ($query->have_posts()) : $query->the_post();
				?>
					<?php if ($count == 1) { ?>
						<div class="left">
							<div class="image" data-aos="fade-up" data-aos-delay="300">
								<a href="<?php echo get_post_permalink(); ?>">
								<img src="<?php echo exsite_image_resize(get_post_thumbnail_id(get_the_ID()),'268x268'); ?>">
							</a>
							</div>
						</div>
						<div class="center">
						<?php } elseif ($count == 2 || $count == 3 || $count == 4) { ?>

							<?php if ($count == 2) { ?>
								<div class="image" data-aos="fade-up" data-aos-delay="400">
									<a href="<?php echo get_post_permalink(); ?>">
									<img src="<?php echo exsite_image_resize(get_post_thumbnail_id(get_the_ID()), '268x268'); ?>"></a>
								</div>
							<?php } ?>
							<?php if ($count == 3) { ?>
								<div class="image" data-aos="fade-up" data-aos-delay="500">
									<a href="<?php echo get_post_permalink(); ?>">
									<img src="<?php echo exsite_image_resize(get_post_thumbnail_id(get_the_ID()), '268x268'); ?>"></a>
								</div>
							<?php } ?>
							<?php if ($count == 4) { ?>
								<div class="image" data-aos="fade-up" data-aos-delay="600">
									<a href="<?php echo get_post_permalink(); ?>">
									<img src="<?php echo exsite_image_resize(get_post_thumbnail_id(get_the_ID()), '268x268'); ?>"></a>
								</div>
							<?php } ?>

						<?php } else { ?>
						</div>
						<div class="right">
							<div class="image" data-aos="fade-up" data-aos-delay="700">
								<a href="<?php echo get_post_permalink(); ?>"><img src="<?php echo exsite_image_resize(get_post_thumbnail_id(get_the_ID()), '268x268'); ?>"></a>
							</div>
						</div>
					<?php } ?>
				<?php $count++;
				endwhile; ?>
			</div>
		</div>
	</section> -->

	<?php
		wp_reset_query();
	?>

	<!-- Join a Team -->
	<section class="join-team text-center" data-aos="fade-up" data-aos-delay="300" data-aos-easing="linear">
		<div class="container">
			<div class="join-team-wrap">
				<h2 style="font-weight: 300"><?php the_field('title_for_join_team_section'); ?></h2>
				<div>
					<p><?php the_field('description_for_join_team_section'); ?></p>
				</div>
				<div class="button-1">
					<a href="<?php echo get_site_url(); ?>/how-to-become-a-luxury-travel-advisor">JOIN THE TEAM</a>
				</div>
			</div>
		</div>
	</section>
	<!-- Join a Team -->

</div>

<?php get_footer(); ?>