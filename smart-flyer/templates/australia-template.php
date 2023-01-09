<?php
/*
Template Name: Australia Template
*/

get_header(); ?>

<div class="wp-container">
    <!-- Destination hero banner -->
    <section>
        <div class="destination-banner background" style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/images/austrailia.jpg);">
            <div class="destination-slider text-center">
                <div class="destination-wrap ">
                    <div class="inner">
                        <div class="destination-image">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/australia-new.png">
                        </div>
                        <h2>Australia</h2>
                        <div class="button-1">
                            <a href="#">Explore</a>
                        </div>
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
                                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/explore-1.png">
                                </div>
                                <div class="content">
                                    <ul>
                                        <li>Santorini</li>
                                        <li>Greece</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="right">
                                <span>EXPLORE ASIA</span>
                                <p>With a wide range of experiences marking the expansive geography of Asia and the South Pacific, there's something for everyone. City dwellers will find their havens in the bustling cities of Japan and Vietnam whereas those seeking R&R can bliss out in the Maldives; let us guide you through it all.</p>
                            </div>
                        </div>
                    </div>
                    <div class="explore-wrap">
                        <div class="inner">
                            <div class="left">
                                <div class="image ">
                                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/explore-2.png">
                                </div>
                                <div class="content">
                                    <ul>
                                        <li>Florence</li>
                                        <li>Italy</li>
                                    </ul>
                                </div>
								<div class="stamp-image">
									<img src="<?php echo get_stylesheet_directory_uri() ?>/images/stamp.png">
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
			'tag'              => ['australia']
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
						<div class="slider-image top-curve">
							<a target="_blank" href="<?php echo get_permalink($post->ID);?>">
								<?php $featured = exsite_image_resize(get_post_thumbnail_id($post->ID), '700x430'); ?>
								<img src="<?php echo $featured; ?>">
							</a>
						</div>
						<div class="travel-by">
							<span><?php echo get_the_category($post->ID)[0]->name; ?></span>
						</div>
						<div class="slider-Heding">
							<h3><?php echo $post->post_title; ?></h3>
						</div>
						<div class="slider-desc">
							
							<?php $content = get_the_content($post->ID);
								  $trimmed_content = wp_trim_words( $content, 30, '...' ); ?>
								  <p><?php echo $trimmed_content; ?></p>
							
						</div>
						<div class="contribute-by">
							<p>CONTRIBUTED BY <span><?php echo get_the_author_meta( 'display_name' , $post->post_author ); ?></span></p>
						</div>
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

    <!-- Partners -->
    <section class="destination-partners-section">
        <div class="container">
            <div class="title">
                <h2>Partners</h2>
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
                            <option>All</option>
                            <option>France</option>
                            <option>France</option>
                            <option>Auchterarder</option>
                        </select>
                    </div>
                    <div class="custom-filter">
                        <strong>STYLE</strong>
                        <select class="form-select style">
                            <option>All</option>
                            <option>France</option>
                            <option>Auchterarder</option>
                            <option>Citroen</option>
                        </select>
                    </div>
                    <div class="custom-filter">
                        <strong>PARTNERS</strong>
                        <select class="form-select partners">
                            <option>All</option>
                            <option>France</option>
                            <option>Auchterarder</option>
                            <option>Auchterarder</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="partners-filter">
                <div class="partners-wrap">
                    <div class="inner">
                        <div class="partners-content background" style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/images/france.png);">
                            <a href="#">
                                <div class="content">
                                    <h4>LA RÉSERVE RAMATUELLE</h4>
                                    <p>Ramatuelle, France</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="partners-wrap">
                    <div class="inner">
                        <div class="partners-content background" style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/images/paris.png);">
                            <div class="content">
                                <h4>SAINT JAMES PARIS</h4>
                                <p>Paris, France</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="partners-wrap">
                    <div class="inner">
                        <div class="partners-content background" style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/images/Auchterarder.png);">
                            <div class="content">
                                <h4>THE GLENEAGLES HOTEL </h4>
                                <p>Auchterarder, Scotland</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="partners-wrap">
                    <div class="inner">
                        <div class="partners-content background" style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/images/Santorini.png);">
                            <div class="content">
                                <h4>GRACE HOTEL SANTORINI </h4>
                                <p>Santorini, Greece</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="partners-wrap">
                    <div class="inner">
                        <div class="partners-content background" style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/images/France2.png);">
                            <div class="content">
                                <h4>RELAIS CHRISTINE</h4>
                                <p>Paris, France</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="partners-wrap">
                    <div class="inner">
                        <div class="partners-content background" style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/images/Paris-1.png);">
                            <div class="content">
                                <h4>BVLGARI HOTEL PARIS</h4>
                                <p>Paris, France</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="button-1 text-center">
                <a href="#">EXPLORE MORE PARTNERS</a>
            </div>
        </div>
    </section>
    <!-- Partners -->

</div>
<?php get_footer(); ?>