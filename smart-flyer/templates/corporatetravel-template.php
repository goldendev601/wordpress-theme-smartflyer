<?php
/*
Template Name: Corporatetravel Template
*/

get_header(); ?>

<div class="wp-container">
     <!-- Header  -->
     <section class="leisure-Travel-main-wrap corporate-travel-section">
        <div class="leisure-Travel-banner text-align-center">
            <div class="container">
                <span>WHAT WE DO</span>
                <h1>Corporate  Travel</h1>
                <div class="banner-image">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/jesse-schoff-c0k4bkcAuMI-unsplash-10.png">
                </div>
            </div>
        </div>  

        <div class="leisure-Travel-content">
            <div class="container">
                <div class="leisure-Travel-content-wrap text-align-center">
                    <div class="icon-wrap">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/Corporate-travel-1.png">
                    </div>
                    <h4>Providing travel services to businesses that demand simple and value-minded solutions</h4>
                    <div class="content">
                        <p>From managing hectic itineraries for time-pressed C-suite executives to organizing incentive retreats for groups, SmartFlyer does it all. We act as an extension of your team to provide creative solutions that translate into tangible value. Allow us to alleviate stress as we take the travel planning off your hands, in turn, bolstering productivity.</p>
                        <p>To see how we can put our resources to work for you, please contact our Corporate team at corporate@smartflyer.com.</p>
                    </div>
                    <!-- <div class="safety-program">
                        <div class="button-1">
                            <a href="#">DOWNLOAD SMARTFLYER AIR DECK</a>
                        </div>
                    </div> -->
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
    <section class="corporate-partners-list">
        <div class="container">
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
    </section>
</div>
<?php get_footer(); ?>