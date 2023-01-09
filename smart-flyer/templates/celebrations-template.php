<?php
/*
Template Name: Celebrations Template
*/

get_header(); ?>

<div class="wp-container">
    <!-- Main section -->
    <section class="leisure-Travel-main-wrap celebrations-section">
        <div class="leisure-Travel-banner text-align-center">
            <div class="container">
                <span>WHAT WE DO</span>
                <h1>Celebrations</h1>
                <div class="banner-image">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/jesse-schoff-c0k4bkcAuMI-unsplash-8.png">
                </div>
            </div>
        </div>  

        <div class="leisure-Travel-content">
            <div class="container">
                <div class="leisure-Travel-content-wrap text-align-center">
                    <div class="icon-wrap">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/Celebrations.png">
                    </div>
                    <!-- <h4>Cherish those moments with SmartFlyer</h4> -->
                    <h4>Because it's about more than just a champagne amenity</h4>
                    <div class="content">
                        <p>We've long said that we're in the relationship business. When it comes to a celebratory trip, SmartFlyer travel advisors thrive in flexing our creative skills to not just coordinate seamless logistics, but to sprinkle in thoughtful touches, too. We work collaboratively with our on-the-ground partners to relay and anticipate your needs; whether we are working on your destination wedding, multi-generational family vacation, or, fiftieth-anniversary celebration, every client is given the same level of care.</p>
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