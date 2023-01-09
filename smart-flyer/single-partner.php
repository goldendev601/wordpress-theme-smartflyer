<?php get_header(); ?>


<?php
$region_label = 'Region';
$style_label = 'Style';
?>

<div class="wp-container">
    <?php include('_objects/reviews-filter.php'); ?>
    <?php $featured = exsite_image_resize(get_post_thumbnail_id($post->ID), '1800x800', false); ?>
    <?php $featured = get_the_post_thumbnail_url(get_the_ID(),'full');  ?>
    <?php $cover_image_url = get_post_meta($post->ID, '_partner_cover', true); ?>
    <?php $img = exsite_image_resize($id, '1200x0', false); ?>
    <section class="review-banner-section background" style="background-image: url(<?php echo esc_url($cover_image_url); ?>);">
        <div class="container">
            <div class="review-banner">
                <div class="inner">
                    <h1><?php echo $post->post_title; ?></h1>
                    <?php
                    if (get_post_meta($post->ID, '_review_place', true)) {
                    ?>
                    <ul>
                        <li><?php echo get_post_meta($post->ID, '_review_place', true); ?></li>
                    </ul>
                    <?php
                    }
                    ?>
                    <div class="content">
                        <!-- <?php //echo substr(smartflyer_images_check(apply_filters('the_content', $post->post_content)), 0, 100) . '...'; ?> -->
                        <?php echo the_excerpt(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="custom-scroll-section">
        <div class="container">
            <div class="custom-scroll">
                <ul>
                    <li class="active"><a href="#overview" class="activeClass">OVERVIEW</a></li>
                    <li><a href="#rooms" class="activeClass">ROOMS</a></li>
                    <li><a href="#amenties" class="activeClass">AMENITIES</a></li>
                    <li><a href="#restaurants" class="activeClass">RESTAURANTS</a></li>
                </ul>
            </div>
        </div>
    </section> -->

    <section class="exclusives-main-wrap" id="overview">
        <div class="container">
            <div class="exclusives-section">
                <div class="exclusives-wrap d-flex flex-wrap">
                    <?php
                        function filterArray($value) {
                            return count($value) > 0;
                        }
                        $exclusive = get_post_meta($post->ID, '_partner_smartFlyer_exclusives_text', true);
                        $tips_blue = get_post_meta($post->ID, 'tips_blue', true);
                        $filtered_tips_blue = array_filter($tips_blue, 'filterArray');
                        $right_class = "";
                        if ($exclusive || count($filtered_tips_blue) > 0) {
                    ?>
                    <div class="exclusives-left">
                        <h2>SmartFlyer Exclusives</h2>
                        <p><?php echo get_post_meta($post->ID, '_partner_smartFlyer_exclusives_text', true); ?></p>

                        <ul>
                            <?php
                            $exclusives  = get_post_meta($post->ID, 'tips_blue', true);
                            $count_excl = 0;
                            foreach ($exclusives as $exclusive) { ?>
                                <li <?php if($count_excl>10){ ?> style="display: none;" <?php } ?>><img src="<?php echo get_stylesheet_directory_uri() ?>/images/list_item_tag.svg"><span> <?php echo $exclusive['tip']; ?></span></li>
                            <?php $count_excl++; } ?>
                        </ul>
                    </div>
                    <?php } else {
                        $right_class = "no-left";
                    } ?>
                    <div class="exclusives-right <?php echo $right_class; ?>">
                        <div class="inner">
                            <div class="content">
                                <?php echo smartflyer_images_check(apply_filters('the_content', $post->post_content)); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-wrap image-wrap" style="margin-top:0;display: none;">
            <div class="image-left image-hover ">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/image-left.png">
            </div>
            <div class="image-right image-hover ">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/explore-1.png">
            </div>
        </div>
    </section>
    <section class="the-rooms-section blue-background" id="rooms" style="display:none;">
        <div class="container">
            <div class="the-rooms-wrap">
                <div class="content">
                    <span>THE ROOMS</span>
                    <h2>Cycladic luxury. Clifftop Exclusivity.</h2>
                    <p> In addition to the hotel’s exclusive private Villa, Grace Hotel offers a range of remarkable Luxury Suites, including the Grace, VIP, Superior, and Honeymoon Suites. There are also Junior Suites and Deluxe Rooms available, both with the option of a private plunge pool. All rooms and suites offer 180-degree unobstructed views of the Caldera and the famous Santorini sunset, all within clean, modern spaces.</p>
                </div>
                <div class="featured-room">
                    <div class="featured-content">
                        <span>Featured room</span>
                        <h4>THE GRAce ROOM</h4>
                        <p>ll rooms and suites offer 180-degree unobstructed views of the Caldera and the famous Santorini sunset, all within clean, modern spaces.</p>
                    </div>
                    <div class="featured-img image-hover">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/rooms-image.png">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="the-rooms-section pool-gym-sec" id="amenties"  style="display:none;">
        <div class="container">
            <div class="the-rooms-wrap">
                <div class="content">
                    <span>fun</span>
                    <h2 style="color: #000000;">Pool & Gym</h2>
                    <p>Grace Hotel boasts an outdoor infinity pool on the Caldera overlooking the island, as well as a fitness center with a separate yoga and pilates studio.</p>
                </div>
            </div>
        </div>
        <div class="pool-img image-hover ">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/all-knw-left.jpg">
        </div>
    </section>


    <section class="the-rooms-section pool-gym-sec restaurants-sec" id="restaurants"  style="display:none;">
        <div class="container">
            <div class="the-rooms-wrap">
                <div class="content">
                    <span>Restaurants</span>
                    <h2>A Michelin-awarded voyage of sensational taste, at the heart of Santorini’s stunning Imerovigli.</h2>
                    <p>Grace Hotel Santorini is an exclusive luxury boutique hotel perched high on Santorini’s Caldera. It has been designed to integrate perfectly with its unique geography.</p>
                </div>
            </div>
        </div>
        <div class="restaurants-img d-flex flex-wrap">
            <div class="restaurants-left ">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/restaurants-1.png">
            </div>
            <div class="restaurants-right ">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/restaurants-2.png">
            </div>
        </div>
        <div class="container">
            <!-- <div class="restaurants-menu">
                <ul>
                    <li><img src="<?php echo get_stylesheet_directory_uri() ?>/images/hotel_upgrade.svg"><span> Upgrade upon arrival, subject to availability</span></li>
                    <li><img src="<?php echo get_stylesheet_directory_uri() ?>/images/espresso_cup.svg"> <span> Daily full breakfast for two guests per bedroom</span></li>
                    <li><img src="<?php echo get_stylesheet_directory_uri() ?>/images/cheque.svg"><span> Complimentary one-way private transfers</span></li>
                    <li><img src="<?php echo get_stylesheet_directory_uri() ?>/images/room_service.svg"><span> Upgrade upon arrival, subject to availability</span></li>
                    <li><img src="<?php echo get_stylesheet_directory_uri() ?>/images/wi-fi_connected.svg"><span> Daily full breakfast for two guests per bedroom</span></li>
                    <li><img src="<?php echo get_stylesheet_directory_uri() ?>/images/room_service.svg"><span> Complimentary one-way private transfers</span></li>
                </ul>
            </div> -->
        </div>
    </section>

    <?php $main_post = $post; ?>
    <?php if ($reviews = get_post_meta($main_post->ID, '_partner_reviews', true)) : ?>
        <section class="might-also-like">
            <div class="container">
                <div class="title">
                    <h3>Partner Properties + Experiences</h3>
                    <div class="partners-filter">
                        <?php foreach ($reviews as $review_id) : ?>
                            <?php $post = get_post($review_id); ?>
                            <?php if ($post) : ?>
                                <div class="partners-wrap">
                                    <div class="inner">
                                        <?php $featured = exsite_image_resize(get_post_thumbnail_id($post->ID), '488x488'); ?>
                                        <div class="partners-content background" style="background-image: url(<?php echo $featured; ?>);">
                                            <a href="<?php echo get_post_permalink($post->ID);?>">
                                                <div class="content">
                                                    <h4><?php echo $post->post_title; ?></h4>
                                                    <p><?php echo get_post_meta($post->ID, '_review_place', true); ?></p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if ($updates = get_post_meta($main_post->ID, '_partner_updates', true)) : ?>
        <section class="might-also-like">
            <div class="container">
                <div class="title">
                    <h3>Update</h3>
                    <div><?php echo $updates; ?></div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Featured in -->
    <?php
    $featured_blog_ids = get_post_meta($main_post->ID, '_partner_featured_in', true);
    // var_dump($featured_blogs);
    if ($featured_blog_ids && count($featured_blog_ids) > 0) {
        $blog_args = array(
            'posts_per_page'    =>  -1,
            'post__in' 			=>	$featured_blog_ids
        );
        $featured_blogs = get_posts( $blog_args );
    ?>

    <!-- slider-image-section -->
    <section class="partner-slider-main-section">
        <div class="partner-slider-main">
            <div class="container">
                <div class="title">
                    <h2 class="partner-featured-title">Featured in</h2>
                </div>
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
                            <div class="travel-by"  style="text-transform: uppercase;">
                                <span><?php echo get_the_category($post->ID)[0]->name; ?></span>
                            </div>
                        </a>
                        <a target="_blank" href="<?php echo get_permalink($post->ID);?>">
                            <div class="slider-Heding" >
                                <h3><?php echo $post->post_title; ?></h3>
                            </div>
                        </a>
                        <div class="slider-desc">
                            
                            <?php 
                                    $trimmed_content = wp_trim_words( $post->post_content, 30, '...' ); ?>
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
    <?php
    }
    ?>

    <section class="book-now-section text-center" >
        <div class="container">
            <h3>Connect with a SmartFlyer agent to plan your next trip.</h3>
            <div class="button-1">
                <a href="<?php echo get_site_url(); ?>/agents">Find an advisor</a>
            </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>