<!-- Subscribe Instagram Section -->
<section class="subscribe-instagram-section" data-aos="fade-up" data-aos-delay="300">
    <div class="container">
        <div class="subscribe-instagram-wrap d-flex flex-wrap ">
            <div class="subscribe-form padding-left">
                <div class="left d-flex flex-wrap">
                    <div class="content">
                        <strong>Subscribe to our newsletter</strong>
                        <h3 style="font-family: 'Canela'; font-style: normal; font-weight: 300; font-size: 30px; line-height: 31px; letter-spacing: 0.03em; color: #414141;">
                            Receive inspiration in your inbox
                        </h3>
                        <?php
                            echo do_shortcode ('[activecampaign form=1 css=1]');
                        ?>
                    </div>
                    <div class="image">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/Subscribe-img.png">
                    </div>
                </div>
            </div>
            <div class="instagram-sec">
                <div class="right d-flex flex-wrap">
                    <div class="content">
                        <h3 style="font-family: 'Canela'; font-style: normal; font-weight: 300; font-size: 30px; line-height: 31px; letter-spacing: 0.03em; color: #414141;">
                            Find us on instagram
                        </h3>
                        <a href="#" style="font-family: 'Canela'; font-style: normal; font-weight: 300; font-size: 30px; line-height: 31px; letter-spacing: 0.03em; color: #1D3C86;">
                            #smartflyer
                        </a>
                        <div style="width: 300px; margin-top: 5px;">
                            <p>Keep up with the places that deserve more than a bookmark, but a check-in.</p>
                        </div>
                        <div class="follow-us">
                            <a href="https://www.instagram.com/thesmartflyer/"><i class="fa fa-instagram" aria-hidden="true"></i>FOLLOW US</a>
                        </div>
                    </div>
                    
                    <div class="instagram-img">
                        <div class="top-img">
                            <?php echo do_shortcode('[instagram feed="31464"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Subscribe form -->

<!-- Footer -->
<footer>
    <div class="footer-section">
        <div class="container">
            <div class="d-flex flex-wrap">
                <div class="footer-left">
                    <div class="inner">
                        <div class="footer-logo">
                            <a href="#">
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/white-logo.png">
                            </a>
                        </div>
                        <div class="social-media">
                            <ul>
                                <li><a href="https://www.facebook.com/smartflyernyc"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.linkedin.com/authwall?"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.instagram.com/thesmartflyer/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                        <div class="copy-right">
                            <p>CST# 2103672<br>Copyright &copy; <?php echo date('Y'); ?> SmartFlyer</p>
                        </div>
                    </div>
                </div>
                <div class="footer-right">
                    <div class="footer-wrap">
                        <h4><a href='<?php echo home_url('reviews'); ?>'>Reviews</a></h4>
                        <?php 
                        $terms = get_terms(
                            array(
                                'taxonomy' => 'review_region',
                                'orderby' => 'name'
                            )
                        ); ?>
                        <ul>
                            <?php foreach ($terms as $term) : ?>
                                <li><a href='<?php echo home_url() . '/reviews/?region=' . $term->slug; ?>'><?php echo $term->name; ?></a></li>
                            <?php endforeach; ?>
                            <!-- <li><a href="javascript:void(0)">Americas</a></li>
                            <li><a href="javascript:void(0)">Caribbean/Mexico</a></li>
                            <li><a href="javascript:void(0)">Africa</a></li>
                            <li><a href="javascript:void(0)">Asia Pacific</a></li>
                            <li><a href="javascript:void(0)">Europe</a></li>
                            <li><a href="javascript:void(0)">Australia</a></li>
                            <li><a href="javascript:void(0)">UAE</a></li> -->
                        </ul>
                    </div>
                    <div class="footer-wrap">
                        <h4><a href='<?php echo home_url('blog'); ?>'>Stories</a></h4>
                        <?php $categories = get_categories(); ?>
                        <ul>
                            <?php foreach ($categories as $cat) : ?>
                                <li>
                                    <a href='<?php echo get_term_link($cat); ?>' <?php if ($term->term_id == $cat->term_id) : ?>class='active' <?php endif; ?>>
                                        <?php echo $cat->name; ?>    
                                    </a>
                                </li>
                            <?php endforeach; ?>
                            <!-- <li><a href="javascript:void(0)"> City Guides</a></li>
                            <li><a href="javascript:void(0)">Industry Intel</a></li>
                            <li><a href="javascript:void(0)">Take Me To</a></li>
                            <li><a href="javascript:void(0)">Travel Culture</a></li> -->
                        </ul>
                    </div>
                    <div class="footer-wrap">
                        <h4><a href='<?php echo home_url('about'); ?>'>About</a></h4>
                        <?php $items = wp_get_nav_menu_items('About Menu Footer'); ?>
                        <ul>
                            <?php foreach ($items as $item) : ?>
                                <li><a href='<?php echo $item->url; ?>'><?php echo $item->title; ?></a></li>
                            <?php endforeach; ?>
                            <!-- <li><a href="javascript:void(0)">Access</a></li>
                            <li><a href="javascript:void(0)">Services</a></li>
                            <li><a href="javascript:void(0)">SmartFlyerAU</a></li>
                            <li><a href="javascript:void(0)">Press</a></li> -->
                        </ul>
                    </div>
                    <div class="footer-wrap">
                        <h4><a href='<?php echo home_url('team'); ?>'>Team</a></h4>
                        <ul>
                            <li><a href="<?php echo home_url() . '/how-to-become-a-luxury-travel-advisor/' ?>">Join Our Team</a></li>
                            <li><a href="<?php echo home_url() . '/about-smartflyer-luxury-travel-agency/hq-team/' ?>">Brand Team</a></li>
                        </ul>
                    </div>
                    <div class="copy-right">
                        <p>© 2021 All rights reserved. <a href="javascript:void(0)">SmartFlyer, Inc.</a> | <a href="javascript:void(0)">Privacy Policy </a> This site is protected by reCAPTCHA and the Google Privacy Policy and Terms of Service apply.</p>
                    </div>
                </div>
            </div>
        </div>
</footer>
<!-- Footer -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    var initialSrc = "<?php echo get_stylesheet_directory_uri() ?>/images/white-logo.png";
    var scrollSrc = "<?php echo get_stylesheet_directory_uri() ?>/images/logo.svg";
    var initialSrcSearch = "<?php echo get_stylesheet_directory_uri() ?>/images/white-search.svg";
    var scrollSrcSearch = "<?php echo get_stylesheet_directory_uri() ?>/images/search.svg";
    var initialSrcUser = "<?php echo get_stylesheet_directory_uri() ?>/images/white-user.svg";
    var scrollSrcUser = "<?php echo get_stylesheet_directory_uri() ?>/images/user.svg";

    jQuery(window).scroll(function() {
        var scroll = jQuery(this).scrollTop();
        if (scroll > 100) {
            jQuery(".logo").attr("src", scrollSrc);
            jQuery(".searchImage").attr("src", scrollSrcSearch);
            jQuery(".userImage").attr("src", scrollSrcUser);
        } else {
            jQuery(".logo").attr("src", initialSrc);
            jQuery(".searchImage").attr("src", initialSrcSearch);
            jQuery(".userImage").attr("src", initialSrcUser);
        }
    });
</script>

<?php wp_footer(); ?>
</body>

</html>
