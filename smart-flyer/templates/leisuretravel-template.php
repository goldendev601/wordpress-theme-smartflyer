<?php
/*
Template Name: Leisuretravel Template
*/

get_header(); ?>

<div class="wp-container">
    <!-- Main section -->
    <section class="leisure-Travel-main-wrap">
        <div class="leisure-Travel-banner text-align-center">
            <div class="container">
                <span>WHAT WE DO</span>
                <h1>Leisure Travel</h1>
                <div class="banner-image">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/jesse-schoff-c0k4bkcAuMI-unsplash-7.png">
                </div>
            </div>
        </div>  

        <div class="leisure-Travel-content">
            <div class="container">
                <div class="leisure-Travel-content-wrap text-align-center">
                    <div class="icon-wrap">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/Leisure-travel.png">
                    </div>
                    <h4>Creating unforgettable, one-of-a-kind travel experiences that are tailored to each client.</h4><br>
                    <div class="content">
                        <p>Few moments are as meaningful as the ones spent on vacation, so we make sure that you get to spend them the way you deserve: fully present. With a dedicated SmartFlyer travel advisor on your side, we get to know your preferences to a tee over the course of our long-term relationship. Our team designs customized itineraries with you in mind, ensuring that every aspect of your holiday is fully arranged and perfect for you.</p><br>
                        <p>The SmartFlyer team is a collaborative, creative, and solution-driven team who consistently thinks outside the box. Our relationship-centric model is predicated on developing a long-term understanding of your tastes and preferences so that we can tailor recommendations. Our expertise extends to include flights, hotels, villa rentals, private charters, touring, cruises, corporate travel, and beyond.</p>
                    </div>
                </div>
            </div>
        </div>  
    </section>
    
    <!-- Partners -->
    <?php $args = array(
        'post_type' => 'partner',
        'posts_per_page' => 6,
    );
    $partners_cpt = new WP_Query($args); ?>
    <div class="leisure-travel-section">
        <div class="container">
            <div class="title">
               <h3> Featured Leisure Travel Partners</h3>
            </div>
            <div class="partners-filter">
            <?php
	            while ($partners_cpt->have_posts()) :
                    $partners_cpt->the_post();
                    get_template_part('_objects/partner', 'filter');
				endwhile;
				?>
            </div>
            <div class="button-1">
                <a href="javascript:void(0);" id="load-more-partners">EXPLORE MORE PARTNERS</a>
            </div>
        </div>
    </div>
    <!-- Main section -->

   <div class="get-packing">
        <div class="get-packing-wrap">
            <h3>Ready to get packing?</h3>
            <p> Begin planning with your SmartFlyer travel advisor.</p>
        </div>
        <div class="button-2">
            <a href="javascript:void(0);" class="plan-a-trip-btn">PLAN A TRIP</a>
        </div>
    </div>
</div>
<?php get_footer(); ?>