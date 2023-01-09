<?php

get_header(); ?>

<div class="wp-container">
    <!-- Destination hero banner -->
    <?php $hero_background_image_url = get_post_meta($post->ID, '_destination_hero_background', true); ?>
    <?php $hero_map_image_url = get_post_meta($post->ID, '_destination_hero_icon', true); ?>
    <section>
        <div class="destination-banner background" style="background-image: url(<?php echo esc_url($hero_background_image_url); ?>);">
            <div class="destination-slider text-center">
                <div class="destination-wrap ">
                    <div class="inner">
                        <div class="destination-image">
                            <img src="<?php echo esc_url($hero_map_image_url); ?>">
                        </div>
                        <h2><?php echo get_post_meta($post->ID, '_destination_hero_title', true); ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Destination hero banner -->

    <!-- Explore -->
    <section>
        <?php $section_image_1 = get_post_meta($post->ID, '_destination_section_image_1', true); ?>
        <?php $section_image_2 = get_post_meta($post->ID, '_destination_section_image_2', true); ?>
        <?php $section_image_3 = get_post_meta($post->ID, '_destination_section_image_3', true); ?>
        <div class="explore-section">
            <div class="container">
                <div class="explore-main-wrap">
                    <div class="explore-wrap">
                        <div class="inner">
                            <div class="left">
                                <div class="image ">
                                    <img src="<?php echo esc_url($section_image_1); ?>">
                                </div>
                                <div class="content">
                                    <ul>
                                    </ul>
                                </div>
                            </div>
                            <div class="right">
                                <span><?php echo get_post_meta($post->ID, '_destination_section_title', true); ?></span>
                                <p><?php echo get_post_meta($post->ID, '_destination_section_description', true); ?></p>
                                <div class="image destination-second-image">
                                    <img src="<?php echo esc_url($section_image_2); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="explore-wrap" style="z-index: 2; position: relative;">
                        <div class="inner">
                            <div class="left">
                                <div class="content">
                                    <ul>
                                    </ul>
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
                                    <img src="<?php echo esc_url($section_image_3); ?>">
                                </div>
                                <div class="content">
                                    <ul>
                                    </ul>
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
        $post_title = $post->post_title;
        if ($post_title == "Europe") {
            $blog_tag = ['europe'];
        } elseif ($post_title == "Caribbean + Mexico") {
            $blog_tag = ['caribbean'];
        } elseif ($post_title == "Asia") {
            $blog_tag = ['asia'];
        } elseif ($post_title == "Americas") {
            $blog_tag = ['americas'];
        } elseif ($post_title == "Africa") {
            $blog_tag = ['africa'];
        } else {
            $blog_tag = ['africa'];
        }
		$blog_args = array(
		    'posts_per_page'    =>  6,
			'order'            => 'DESC',
			'tag'              => $blog_tag
		);
		$featured_articles = query_posts(  $blog_args );
		 
	?>
    <!-- slider-image-section -->
    <section class="home-slider-main-section destination-getaway">
        <div class="padding-left">
            <div class="title">
                <h2>A little inspiration for your next getaway</h2>
                <h3><?php echo get_post_meta($post->ID, '_destination_middle_section_description', true); ?></h3>
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
        $post_title = $post->post_title;
        if ($post_title == "Europe") {
            $blog_tag = ['europe'];
            $default_region = 'europe';
        } elseif ($post_title == "Caribbean + Mexico") {
            $blog_tag = ['caribbean'];
            $default_region = 'caribbean';
        } elseif ($post_title == "Asia") {
            $blog_tag = ['asia'];
            $default_region = 'asia';
        } elseif ($post_title == "Americas") {
            $blog_tag = ['americas'];
            $default_region = 'americas';
        } elseif ($post_title == "Africa") {
            $blog_tag = ['africa'];
            $default_region = 'africa';
        } else {
            $blog_tag = ['africa'];
            $default_region = 'africa';
        }
        $args = array(
            'post_type'    =>  'review',
            'posts_per_page'    => 6,
            'tax_query' => array(
                array(
                    'taxonomy' => 'review_region',
                    'field' => 'slug',
                    'terms' => $blog_tag,
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
                                    <option value='<?php echo $region->slug; ?>' <?php echo $region->slug == $default_region ? 'selected' : '' ?>><?php echo $region->name; ?></option>
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
				<a href="javascript:void(0);" id="load-more-reviews">EXPLORE MORE <?php echo $post_title ?> </a>
			</div>
		</div>
	</section>
    <!-- Reviews -->

</div>
<?php get_footer(); ?>