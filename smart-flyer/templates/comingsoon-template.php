<?php
/*
Template Name: Coming Soon Template
*/
?>
<style>
    .wp-container {
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        background-image: url(https://smartflyer.com/wp-content/themes/smart-flyer/images/comingsoon-bg.png);
        background-size: cover;
        background-position: center;
        text-align: center;
    }
    .logo-wrapper {
        width: 100%;
        margin-top: 120px;
        text-align: center;
    }
    .coming-soon-title-wrapper {
        width: 100%;
        margin-top: 22vh;
        text-align: center;
    }
    .coming-soon-title {
        font-family: 'Canela';
        font-style: normal;
        font-weight: 300;
        font-size: 64px;
        line-height: 78px;
        text-align: center;
        letter-spacing: 0.03em;
        color: #FFFFFF;
    }
    .coming-soon-footer {
        margin-top: 48px;
        width: 100%;
        text-align: center;
    }
    .coming-soon-footer-text {
        font-family: 'Trade Gothic LT Pro';
        font-style: normal;
        font-weight: 700;
        font-size: 10px;
        line-height: 8px;
        text-align: center;
        color: #FFFFFF;
    }
    .social-icons-container {
        width: 100%;
        text-align: center;
        margin-top: 258px;
    }
    .social-icons-wrapper {
        display: flex;
        justify-content: space-between;
        width: 100px;
        margin: 0 auto;
    }
</style>

<div class="wp-container">
    <div class="logo-wrapper">
        <a href="<?php echo get_site_url(); ?>">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/white-logo.png" alt="SmartFlyer Logo" width="220" align="center">
        </a>
    </div>
    <div class="coming-soon-title-wrapper">
        <h1 class="coming-soon-title">Coming Soon</h1>
    </div>
    <div class="social-icons-container">
        <div class="social-icons-wrapper">
            <a href="https://www.facebook.com/smartflyernyc">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/Facebook.png" alt="facebook-icon" width="24" align="center">
            </a>
            <a href="https://www.instagram.com/thesmartflyer">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pinterest.png" alt="facebook-icon" width="24" align="center">
            </a>
            <a href="https://www.instagram.com/thesmartflyer/">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/instagram.png" alt="facebook-icon" width="24" align="center">
            </a>
        </div>
    </div>
    <div class="coming-soon-footer">
        <p class="coming-soon-footer-text">
            © 2021 All rights reserved. SmartFlyer, Inc. | Privacy Policy
        </p>
        <p class="coming-soon-footer-text">
            This site is protected by reCAPTCHA and the Google Privacy Policy and Terms of Service apply.
        </p>
    </div>
</div>
