<?php
/*
Template Name: Caribbean mexico Template
*/

get_header(); ?>

<div class="wp-container">
    <!-- Destination hero banner -->
    <section>
        <div class="destination-banner background" style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/images/destinations/caribbean-hero.jpg);">
            <div class="destination-slider text-center">
                <div class="destination-wrap ">
                    <div class="inner">
                        <div class="destination-image">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/destinations/caribbean-map.svg">
                        </div>
                        <h2>Caribbean + Mexico</h2>
                        <!-- <div class="button-1">
                            <a href="#">Explore</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Destination hero banner -->

    <!-- Explore -->
    <section>
        <div class="explore-section">
            <div class="container">
                <div class="explore-main-wrap">
                    <div class="explore-wrap">
                        <div class="inner">
                            <div class="left">
                                <div class="image ">
                                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/destinations/mexico-cabo.jpg">
                                </div>
                                <div class="content">
                                </div>
                            </div>
                            <div class="right">
                                <span>Explore the Caribbean + Mexico</span>
                                <p>An escape south holds the appeal of warmer weather paired with everything from the buzzy streets of Mexico City to the golden sand beaches of Grand Cayman. Working with a SmartFlyer travel advisor on your Caribbean or Mexico escape ensures that you're nailing the details from seasonality to the ultimate on and off resort activities to immerse yourself in the destination.</p>
                            </div>
                        </div>
                    </div>
                    <div class="explore-wrap" style="z-index: 2; position: relative;">
                        <div class="inner">
                            <div class="left">
                                <div class="image ">
                                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/destinations/caribbean-belize.jpg">
                                </div>
                                <div class="content">
                                </div>
                            </div>
                            <div class="right">
                            </div>
                        </div>
                    </div>
					<div class="explore-wrap">
                        <div class="inner">
                            <div class="left" style="display: flex; justify-content:flex-end; width: 50%;">
                                <div class="image">
                                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/destinations/caribbean-3.jpg">
                                </div>
                                <div class="content">
                                </div>
								<div class="stamp-image">
									<img src="<?php echo get_stylesheet_directory_uri() ?>/images/destinations/stamp.png">
								</div>
                            </div>
                            <div class="right">
                            </div>
							
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Explore -->

    <?php 
		$blog_args = array(
		    'posts_per_page'    =>  6,
			'order'            => 'DESC',
			'tag'              => ['caribbean-mexico']
		);
		$featured_articles = query_posts(  $blog_args );
		 
	?>
    <!-- slider-image-section -->
    <section class="home-slider-main-section destination-getaway">
        <div class="padding-left">
            <div class="title">
                <h2>A little inspiration for your next getaway</h2>
            </div>
            <div class="home-slider-main" data-aos="fade-up" data-aos-easing="linear">
                <div class="slider-img-list slider-img-list-slider">
					<?php foreach($featured_articles as $post): ?>
					<div class="slider-content">
						<a target="_blank" href="<?php echo get_permalink($post->ID);?>">
						<div class="slider-image top-curve">
							
								<?php $featured = exsite_image_resize(get_post_thumbnail_id($post->ID), '700x430'); ?>
								<img src="<?php echo $featured; ?>">
							
						</div>
						<div class="travel-by">
							<span><?php echo get_the_category($post->ID)[0]->name; ?></span>
						</div>
						<div class="slider-Heding">
							<h3><?php echo $post->post_title; ?></h3>
						</div>
						<div class="slider-desc">
							
							<?php 
								  $trimmed_content = wp_trim_words( $post->post_content, 30, '...' ); ?>
								  <p><?php echo $trimmed_content; ?></p>
							
						</div>
						<div class="contribute-by">
							<p>CONTRIBUTED BY <span><?php echo get_the_author_meta( 'display_name' , $post->post_author ); ?></span></p>
						</div>
						</a>
					</div>
					<?php endforeach ?>
				</div>
            </div>
        </div>
    </section>
    <!-- slider-image-section -->
	<?php
	wp_reset_query();
	?>

    <!-- Reviews -->
    <?php 
    $args = array(
        'post_type'    =>  'review',
        'posts_per_page'    => 6,
        'tax_query' => array(
            array(
                'taxonomy' => 'review_region',
                'field' => 'slug',
                'terms' => ['caribbean'],
            )
        )
    );
    $reviews_cpt = new WP_Query($args);
    ?>
	<section class="destination-partners-section">
		<div class="container">
			<div class="title">
				<h2>Reviews</h2>
			</div>
			<div class="mobile-partners-filter">
				<div class="filter-btn"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/filters.svg">filters</div>
			</div>

			<div class="partners-main-filter">
				<div class="close-filter"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/close-btn.png"></div>
				<div class="partners-main-filter-wrap">
					<div class="custom-filter">
						<strong>REGION</strong>
						<select class="form-select region">
							<option value=''>All Destination</option>
							<?php
                                $regions = get_terms('review_region');
                                if ($regions) {
                                    foreach ($regions as $region):
                                    ?>
                                    <option value='<?php echo $region->slug; ?>' <?php echo $region->slug == 'caribbean' ? 'selected' : '' ?>><?php echo $region->name; ?></option>
                                    <?php
                                    endforeach;
                                }
                            ?>
						</select>
					</div>
					<div class="custom-filter">
						<strong>STYLE</strong>
						<select class="form-select style">
							<option value=''>All</option>
                            <?php
                                $styles = get_terms('review_style');
                                if ($styles) {
                                    foreach ($styles as $style):
                                    ?>
                                    <option value='<?php echo $style->slug; ?>'><?php echo $style->name; ?></option>
                                    <?php
                                    endforeach;
                                }
                            ?>
						</select>
					</div>
					<div class="custom-filter">
						<strong>PARTNERS</strong>
						<select class="form-select partners">
							<option value=''>All</option>
							<?php $args = array(
                                    'post_type' => 'partner',
                                    'numberposts' => -1,
                                );
                                $partners = get_posts($args);
                                if ($partners) {
                                    foreach ($partners as $partner):
                                    ?>
                                    <option value='<?php echo $partner->ID; ?>'><?php echo $partner->post_title; ?></option>
                                    <?php
                                    endforeach;
                                }
                            ?>
						</select>
					</div>
                    <div class="custom-filter button-1 text-center">
                        <a href="javascript:void(0);" id="filter-reviews">FILTER</a>
                    </div>
				</div>
			</div>
			<div class="partners-filter">
				<?php
	            while ($reviews_cpt->have_posts()) :
                    $reviews_cpt->the_post();
                    get_template_part('_objects/destination', 'review');
				endwhile;
				?>
			</div>
			<div class="button-1 text-center">
				<a href="javascript:void(0);" id="load-more-reviews">EXPLORE MORE CARIBBEAN + MEXICO</a>
			</div>
		</div>
	</section>
    <!-- Reviews -->

</div>
<?php get_footer(); ?>