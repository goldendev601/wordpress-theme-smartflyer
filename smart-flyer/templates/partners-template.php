<?php
/*
Template Name: Partners Template
*/

get_header(); ?>

<div class="wp-container">

    <!-- Partners hero banner -->
    <section class="hero-banner-section partners-banner">
        <div class="herobanner partners-banner-wrap ">
            <div class="banner-content padding-left left-content">
                <div class="inner">
                   <div class="sub-title" data-aos="fade-up" data-aos-easing="linear">
                        BRANDS & Partnerships       
                    </div>
                    <h1 data-aos="fade-up" data-aos-easing="linear" data-aos-delay="300">
                        Partners
                    </h1>
                    <div data-aos="fade-up" data-aos-easing="linear" data-aos-delay="350">
                        <p>
                            Each of our partners recognize SmartFlyer as a top producer and puts our clients at the top of every upgrade and VIP list. With some of the most iconic hotels around the world,  delights guests with its fine European hospitality from France to Brazil and beyond.
                        </p>
                    </div>
                </div>
            </div>
            <div class="right-image">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/partners-banner-bg.png">
            </div>
        </div>
    </section>

    <!-- Partners hero banner -->
    <div class="leisure-travel_main_wrap partners-leisure-travel">
        <div class="line-travel container ">
            <div class="line-travel-wrap">LEARN MORE</div>
        </div>
        <div class="leisure-travel-wrap d-flex flex-wrap">
            <div class="leisure-travel-left">
                <div class="d-flex flex-wrap">
                    <h3>SmartFlyer Partners</h3>
                </div>
                <div class="content">
                    <p>SmartFlyer is a member of the Virtuoso network, an elite, invitation-only consortium of the top 1% of travel providers in the world.  Virtuoso is a powerful network that books billions of dollars of travel per year collectively. </p>
                </div>
                <div class="button-1">
                    <a href="#" class="left">SMARTFLYER ACCESS</a>
                    <a href="<?php echo get_site_url() . '/destination-main'; ?>" class="right">EXPLORE ALL DESTINATIONS</a>
                </div>
            </div>
            <div class="leisure-travel-right">
                <div class="images">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/jesse-schoff-3.png">
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="preferred-partners" id="preferred-partners">
            <div class="container">
                <div class="title text-align-center">
                    <h2>Preferred Partners</h2>
                    <p>As an agency, SmartFlyer is a recognized preferred partner of the most notable and highly regarded hotel brands in the world. These “By Invitation Only” elite programs were created to recognize and differentiate top-tier travel producers. They are a demonstration of relationships created as a result of massive buying power.</p>
                </div>
                    <div class="preferred-partners-wrap-logos">
                        <ul class="d-flex flex-wrap preferred-partners-logos">
                            <?php
                                $designated_partners_1 = get_field('designated_partners_1');
                                if( $designated_partners_1 ): ?>
                                <li>                                
                                    <div class="d-flex">
                                        <a class="designed-partner-logo-a" href="<?php echo esc_url( $designated_partners_1['redirect_link_1'] ); ?>" target="_blank">
                                            <img src="<?php echo esc_url( $designated_partners_1['image_url_1'] ); ?>">
                                        </a>
                                    </div>
                                </li>
                            <?php endif; ?>
                            <?php
                                $designated_partners_2 = get_field('designated_partners_2');
                                if( $designated_partners_2 ): ?>
                                <li>                                
                                    <div class="d-flex">
                                        <a class="designed-partner-logo-a" href="<?php echo esc_url( $designated_partners_2['redirect_link_2'] ); ?>" target="_blank">
                                            <img src="<?php echo esc_url( $designated_partners_2['image_url_2'] ); ?>">
                                        </a>
                                    </div>
                                </li>
                            <?php endif; ?>
                            <?php
                                $designated_partners_3 = get_field('designated_partners_3');
                                if( $designated_partners_3 ): ?>
                                <li>                                
                                    <div class="d-flex">
                                        <a class="designed-partner-logo-a" href="<?php echo esc_url( $designated_partners_3['redirect_link_3'] ); ?>" target="_blank">
                                            <img src="<?php echo esc_url( $designated_partners_3['image_url_3'] ); ?>">
                                        </a>
                                    </div>
                                </li>
                            <?php endif; ?>
                            <?php
                                $designated_partners_4 = get_field('designated_partners_4');
                                if( $designated_partners_4 ): ?>
                                <li>                                
                                    <div class="d-flex">
                                        <a class="designed-partner-logo-a" href="<?php echo esc_url( $designated_partners_4['redirect_link_4'] ); ?>" target="_blank">
                                            <img src="<?php echo esc_url( $designated_partners_4['image_url_4'] ); ?>">
                                        </a>
                                    </div>
                                </li>
                            <?php endif; ?>
                            <?php
                                $designated_partners_5 = get_field('designated_partners_5');
                                if( $designated_partners_5 ): ?>
                                <li>                                
                                    <div class="d-flex">
                                        <a class="designed-partner-logo-a" href="<?php echo esc_url( $designated_partners_5['redirect_link_5'] ); ?>" target="_blank">
                                            <img src="<?php echo esc_url( $designated_partners_5['image_url_5'] ); ?>">
                                        </a>
                                    </div>
                                </li>
                            <?php endif; ?>
                            <?php
                                $designated_partners_6 = get_field('designated_partners_6');
                                if( $designated_partners_6 ): ?>
                                <li>                                
                                    <div class="d-flex">
                                        <a class="designed-partner-logo-a" href="<?php echo esc_url( $designated_partners_6['redirect_link_6'] ); ?>" target="_blank">
                                            <img src="<?php echo esc_url( $designated_partners_6['image_url_6'] ); ?>">
                                        </a>
                                    </div>
                                </li>
                            <?php endif; ?>
                            <?php
                                $designated_partners_7 = get_field('designated_partners_7');
                                if( $designated_partners_7 ): ?>
                                <li>                                
                                    <div class="d-flex">
                                        <a class="designed-partner-logo-a" href="<?php echo esc_url( $designated_partners_7['redirect_link_7'] ); ?>" target="_blank">
                                            <img src="<?php echo esc_url( $designated_partners_7['image_url_7'] ); ?>">
                                        </a>
                                    </div>
                                </li>
                            <?php endif; ?>
                            <?php
                                $designated_partners_8 = get_field('designated_partners_8');
                                if( $designated_partners_8 ): ?>
                                <li>                                
                                    <div class="d-flex">
                                        <a class="designed-partner-logo-a" href="<?php echo esc_url( $designated_partners_8['redirect_link_8'] ); ?>" target="_blank">
                                            <img src="<?php echo esc_url( $designated_partners_8['image_url_8'] ); ?>">
                                        </a>
                                    </div>
                                </li>
                            <?php endif; ?>
                            <?php
                                $designated_partners_9 = get_field('designated_partners_9');
                                if( $designated_partners_9 ): ?>
                                <li>                                
                                    <div class="d-flex">
                                        <a class="designed-partner-logo-a" href="<?php echo esc_url( $designated_partners_9['redirect_link_9'] ); ?>" target="_blank">
                                            <img src="<?php echo esc_url( $designated_partners_9['image_url_9'] ); ?>">
                                        </a>
                                    </div>
                                </li>
                            <?php endif; ?>
                            <?php
                                $designated_partners_10 = get_field('designated_partners_10');
                                if( $designated_partners_10 ): ?>
                                <li>                                
                                    <div class="d-flex">
                                        <a class="designed-partner-logo-a" href="<?php echo esc_url( $designated_partners_10['redirect_link_10'] ); ?>" target="_blank">
                                            <img src="<?php echo esc_url( $designated_partners_10['image_url_10'] ); ?>">
                                        </a>
                                    </div>
                                </li>
                            <?php endif; ?>
                            <?php
                                $designated_partners_11 = get_field('designated_partners_11');
                                if( $designated_partners_11 ): ?>
                                <li>                                
                                    <div class="d-flex">
                                        <a class="designed-partner-logo-a" href="<?php echo esc_url( $designated_partners_11['redirect_link_11'] ); ?>" target="_blank">
                                            <img src="<?php echo esc_url( $designated_partners_11['image_url_11'] ); ?>">
                                        </a>
                                    </div>
                                </li>
                            <?php endif; ?>
                            <?php
                                $designated_partners_12 = get_field('designated_partners_12');
                                if( $designated_partners_12 ): ?>
                                <li>                                
                                    <div class="d-flex">
                                        <a class="designed-partner-logo-a" href="<?php echo esc_url( $designated_partners_12['redirect_link_12'] ); ?>" target="_blank">
                                            <img src="<?php echo esc_url( $designated_partners_12['image_url_12'] ); ?>">
                                        </a>
                                    </div>
                                </li>
                            <?php endif; ?>
                            <?php
                                $designated_partners_13 = get_field('designated_partners_13');
                                if( $designated_partners_13 ): ?>
                                <li>                                
                                    <div class="d-flex">
                                        <a class="designed-partner-logo-a" href="<?php echo esc_url( $designated_partners_13['redirect_link_13'] ); ?>" target="_blank">
                                            <img src="<?php echo esc_url( $designated_partners_13['image_url_13'] ); ?>">
                                        </a>
                                    </div>
                                </li>
                            <?php endif; ?>
                            <?php
                                $designated_partners_14 = get_field('designated_partners_14');
                                if( $designated_partners_14 ): ?>
                                <li>                                
                                    <div class="d-flex">
                                        <a class="designed-partner-logo-a" href="<?php echo esc_url( $designated_partners_14['redirect_link_14'] ); ?>" target="_blank">
                                            <img src="<?php echo esc_url( $designated_partners_14['image_url_14'] ); ?>">
                                        </a>
                                    </div>
                                </li>
                            <?php endif; ?>
                            <?php
                                $designated_partners_15 = get_field('designated_partners_15');
                                if( $designated_partners_15 ): ?>
                                <li>                                
                                    <div class="d-flex">
                                        <a class="designed-partner-logo-a" href="<?php echo esc_url( $designated_partners_15['redirect_link_15'] ); ?>" target="_blank">
                                            <img src="<?php echo esc_url( $designated_partners_15['image_url_15'] ); ?>">
                                        </a>
                                    </div>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <a href="" class="load-more load-more-partners"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/down-arrow-Partner.png"></a>
                    </div> 
                </div>
            </div>
        </div>
    </section>


    <!-- Partners -->
    <section class="destination-partners-section destination-partners-page">

        <div class="container">
            <div class="destination-title text-align-center">
                <h2>Brand Partners</h2>
            </div>
            <div class="mobile-partners-filter">
                <div class="filter-btn"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/filters.svg">filters</div>
            </div>
            <div class="partners-main-filter-wrap">
                <div class="custom-filter">
                    <strong>REGION</strong>
                    <select class="form-select region">
                        <option value=''>All Destination</option>
                        <?php
                            $regions = get_terms(array(
                                'taxonomy' => 'review_region',
                                'orderby'=>'name',
                                'order' => 'ASC'
                            ));
                            function cmp($a, $b) {
                                return strcmp($a->name, $b->name);
                            }
                            usort($regions, cmp);
                            if ($regions) {
                                foreach ($regions as $region):
                                ?>
                                <option value='<?php echo $region->slug; ?>' data_region-id="<?php echo $region->term_id; ?>"><?php echo $region->name; ?></option>
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
                            $styles = get_terms(array(
                                'taxonomy' => 'review_style',
                                'orderby'=>'name',
                                'order' => 'ASC'
                            ));
                            function cmp1($a, $b) {
                                return strcmp($a->name, $b->name);
                            }
                            usort($styles, cmp1);
                            if ($styles) {
                                foreach ($styles as $style):
                                    $term_ids = get_field('review_region', $style);
                                ?>
                                <option value='<?php echo $style->slug; ?>' data_term-ids="<?php echo implode(',', $term_ids); ?>"><?php echo $style->name; ?></option>
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
                                'post_status' => 'publish',
                                'orderby' => 'title',
		                        'order' => 'ASC',
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
                    <a href="#!" id="filter-partners">FILTER</a>
                </div>
            </div>
            <div class="partners-filter" id="ajax_post">
                <?php
                $args = array(
                    'post_type' => 'partner',
                    'posts_per_page' => 6,
                    'post_status' => 'publish'
                );
                $partners_cpt = new WP_Query($args);

                if ($partners_cpt->have_posts()) :
                    while ($partners_cpt->have_posts()) :
                        $partners_cpt->the_post();
                        get_template_part('_objects/partner', 'filter');
                    endwhile;
                endif;
                ?>
                <!-- <div class="partners-wrap">
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
                </div> -->
            </div>
            <div class="custom-filter more_post_btn button-1 text-center">
                <a href="javascript:void(0)" id="more_posts">Explore more partners</a>
            </div>
            <div class="custom-filter less_post_btn button-1 text-center">
                <a href="javascript:void(0)" id="less_posts">See less</a>
            </div>
        </div>
    </section>
    <!-- Partners -->


</div>
<?php get_footer(); ?>