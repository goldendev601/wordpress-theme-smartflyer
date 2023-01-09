<?php
/*
Template Name: Destination Main Template
*/

get_header(); ?>

<div class="wp-container">
    <!-- Destination hero banner -->
    <section class="destination-main">
        <div class="container">
            <div class="destination-main-section">
                <div class="destination-main-wrap align-items-center d-flex flex-wrap ">
                    <div class="destination-map">
                        <div class="image All">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/destinations/globe.svg">
                        </div>
                        <div class="image Africa">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/destinations/africa-map.svg">
                        </div>
                        <div class="image Asia">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/destinations/asia-map.svg">
                        </div>
                        <div class="image Australia">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/destinations/europe-map.svg">
                        </div>
                        <div class="image north-america">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/destinations/americas-map.svg">
                        </div>
                        <div class="image latin-america">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/destinations/caribbean-map.svg">
                        </div>
                    </div>
                    <div class="destination-name">
                        <ul>
                            <li class="Africa">
                                <a href="<?php echo get_site_url() . '/destination/africa'; ?>">Africa</a>
                                <a href="<?php echo get_site_url() . '/destination/africa'; ?>"><span>Explore <img src="<?php echo get_stylesheet_directory_uri() ?>/images/search-right-arrow-mobile.png"></span></a>
                            </li>
                            <li class="Asia">
                                <a href="<?php echo get_site_url() . '/destination/asia'; ?>">Asia Pacific</a>
                                <a href="<?php echo get_site_url() . '/destination/asia'; ?>"><span>Explore <img src="<?php echo get_stylesheet_directory_uri() ?>/images/search-right-arrow-mobile.png"></span></a>
                            </li>
                            <li class="Australia">
                                <a href="<?php echo get_site_url() . '/destination/europe'; ?>">Europe</a>
                                <a href="<?php echo get_site_url() . '/destination/europe'; ?>"><span>Explore <img src="<?php echo get_stylesheet_directory_uri() ?>/images/search-right-arrow-mobile.png"></span></a>
                            </li>
                            <li class="north-america">
                                <a href="<?php echo get_site_url() . '/destination/americas'; ?>">Americas</a>
                                <a href="<?php echo get_site_url() . '/destination/americas'; ?>"><span>Explore <img src="<?php echo get_stylesheet_directory_uri() ?>/images/search-right-arrow-mobile.png"></span></a>
                            </li>
                            <li class="latin-america">
                                <a href="<?php echo get_site_url() . '/destination/caribbean-mexicopage'; ?>">Caribbean + Mexico</a>
                                <a href="<?php echo get_site_url() . '/destination/caribbean-mexicopage'; ?>"><span>Explore <img src="<?php echo get_stylesheet_directory_uri() ?>/images/search-right-arrow-mobile.png"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
           
        </div>
    </section>
    <!-- Destination hero banner -->

    <?php
	wp_reset_query();
	?>

    <!-- Reviews -->
    <?php 
        $args = array(
            'post_type'    =>  'review',
            'posts_per_page'    => 6,
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

<style type="text/css">
    footer {  display: none;}
    .subscribe-instagram-section {display: none;}
</style>
<?php get_footer(); ?>
