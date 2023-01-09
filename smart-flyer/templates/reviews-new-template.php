<?php
/*
Template Name: Review Template
*/

get_header(); ?>

<div class="wp-container">
    <section class="review-banner-section background" style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/images/review-banner.png);">
        <div class="container">
            <div class="review-banner">
                <div class="inner">
                    <h1>Grace Hotel Santorini</h1>
                    <ul>
                        <li>Santorini</li>
                        <li>Greece</li>
                    </ul>
                    <p>Grace Hotel Santorini is an exclusive luxury boutique hotel perched high on Santorini’s Caldera. It has been designed to integrate perfectly with its unique geography. </p>
                </div>
            </div>
        </div>
    </section>

    <section class="custom-scroll-section">
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
    </section>

    <section class="exclusives-main-wrap" id="overview">
        <div class="container">
            <div class="exclusives-section">
                <div class="exclusives-wrap d-flex flex-wrap">
                    <div class="exclusives-left">
                        <h2>SmartFlyer Exclusives</h2>
                        <p>Guests that have been dreaming of the perfect Santorini sojourn should look no further than a stay at Grace Hotel. </p>
                        <ul>
                            <li><img src="<?php echo get_stylesheet_directory_uri() ?>/images/hotel_upgrade.svg"><span> Upgrade upon arrival, subject to availability</span></li>
                            <li><img src="<?php echo get_stylesheet_directory_uri() ?>/images/espresso_cup.svg"><span> Daily full breakfast for two guests per bedroom</span></li>
                            <li><img src="<?php echo get_stylesheet_directory_uri() ?>/images/cheque.svg"><span> Complimentary one-way private transfers</span></li>
                            <li><img src="<?php echo get_stylesheet_directory_uri() ?>/images/room_service.svg"><span> Early check-in/late check-out, subject to availability</span></li>
                            <li><img src="<?php echo get_stylesheet_directory_uri() ?>/images/wi-fi_connected.svg"><span> Complimentary Wi-Fi</span></li>
                        </ul>
                        <div class="details-wrap">
                            <div class="inner">
                                <div class="image">
                                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/agent-img.png">
                                </div>
                                <div class="details-content">
                                    <span>CHECKED IN LAST</span>
                                    <h3>Rachel Braylovsky</h3>
                                </div>
                            </div>
                            <p>“This was a great experience. Overall the service is amaznig and a perfect place to relax after a long day of activities at the sea.”</p>
                        </div>
                    </div>
                    <div class="exclusives-right">
                        <div class="inner">
                            <p>Grace Hotel Santorini is an exclusive luxury boutique hotel perched high on Santorini’s Caldera. It has been designed to integrate perfectly with its unique geography.</p>
                            <p>This graceful property, with its individually-styled suites and bedrooms, appeals to those seeking the ultimate romantic escape.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-wrap image-wrap">
            <div class="image-left image-hover ">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/image-left.png">
            </div>
            <div class="image-right image-hover ">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/explore-1.png">
            </div>
        </div>
    </section>


    <section class="the-rooms-section blue-background" id="rooms">
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


    <section class="the-rooms-section pool-gym-sec" id="amenties">
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


    <section class="the-rooms-section pool-gym-sec restaurants-sec" id="restaurants">
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
            <div class="restaurants-menu">
                <ul>
                    <li><img src="<?php echo get_stylesheet_directory_uri() ?>/images/hotel_upgrade.svg"><span> Upgrade upon arrival, subject to availability</span></li>
                    <li><img src="<?php echo get_stylesheet_directory_uri() ?>/images/espresso_cup.svg"> <span> Daily full breakfast for two guests per bedroom</span></li>
                    <li><img src="<?php echo get_stylesheet_directory_uri() ?>/images/cheque.svg"><span> Complimentary one-way private transfers</span></li>
                    <li><img src="<?php echo get_stylesheet_directory_uri() ?>/images/room_service.svg"><span> Upgrade upon arrival, subject to availability</span></li>
                    <li><img src="<?php echo get_stylesheet_directory_uri() ?>/images/wi-fi_connected.svg"><span> Daily full breakfast for two guests per bedroom</span></li>
                    <li><img src="<?php echo get_stylesheet_directory_uri() ?>/images/room_service.svg"><span> Complimentary one-way private transfers</span></li>
                </ul>
            </div>
        </div>
    </section>

    <section class="book-now-section text-center">
        <div class="container">
            <h3>connect with a SmartFlyer agent to plan your next trip.</h3>
            <div class="button-1">
                <a href="<?php echo get_site_url(); ?>/agents">Find an advisor</a>
            </div>
        </div>
    </section>

    <section class="might-also-like">
        <div class="container">
            <div class="title">
                <h3>You might also like...</h3>
                <div class="partners-filter">
                    <div class="partners-wrap">
                        <div class="inner">
                            <div class="partners-content background" style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/images/france.png);">
                                <a href="#">
                                    <div class="content">
                                        <h4>LA RÃ‰SERVE RAMATUELLE</h4>
                                        <p>Ramatuelle, France</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="partners-wrap">
                        <div class="inner">
                            <div class="partners-content background" style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/images/France2.png);">
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
                </div>
            </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>