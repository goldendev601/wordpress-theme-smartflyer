<?php
/*
Template Name: Insurance Addon Information Template
*/

get_header();

if ( !is_user_logged_in() ) {
    wp_redirect( site_url('crm-login') );
    die();
}


if (!post_password_required()) {
  ?>

  <?php
  $region_label = 'Region';
  $style_label = 'Style';
  ?>

<div class="insurance-addon-info">
    <div class="wp-container">
        <?php include('_objects/reviews-filter.php'); ?>
        <?php $featured = exsite_image_resize(get_post_thumbnail_id(get_the_ID()), '1800x800', false); ?>
        <?php $featured = get_the_post_thumbnail_url(get_the_ID(), 'full');  ?>
        <?php $cover_image_url = get_post_meta(get_the_ID(), '_ov_header_image', true); ?>
        <?php $img = exsite_image_resize($id, '1200x0', false); ?>
        <section class="review-banner-section background review-hero-banner-new" style="background-image: url(https://smartflyercdn.s3.amazonaws.com/wp-content/uploads/20221017091431/image-2.jpg);">
          <div class="container">
             <div class="review-banner">
                <div class="inner">
                  <div class="tag-line">
                    <?php echo get_post_meta(get_the_ID(), '_ov_overline', true); ?>
                  </div>
                  <h1><?php echo get_post_meta(get_the_ID(), '_ov_property_name', true); ?></h1>
                  <ul>
                    <li><?php echo get_post_meta(get_the_ID(), '_ov_location', true); ?></li>
                  </ul>
                  <?php echo the_excerpt(); ?>
                </div>
             </div>
          </div>
        </section>
        <section class="custom-scroll-section custom-scroll-new-section" id="stickybox">
            <div class="banner-text-sticky" style="display: none;">
                <div class="">
                    <div class="inner">
                        <div class="tag-line">auberge resorts collection</div>
                        <h1>Grace Hotel Santorini</h1>
                        <div class="sub-title">the grace room</div>
                    </div>
                </div>
            </div>
            <div class="custom-scroll">
                <ul class="tabs">
                    <li rel="tab1" class="active"><span> OVERVIEW </span></li>
                    <li rel="tab2"><span> CONTACTS</span></li>
                    <li rel="tab3"><span>BOOKING PROCESS </span></li>
                    <li rel="tab4"><span>COMMISSIONS </span></li>
                    <li rel="tab5"><span> ASSETS+TRAININGS </span></li>
                    <li rel="tab6"><span> UPDATES </span></li>
                </ul>
            </div>
        </section>
    </div>
    <div class="tab_container">
        <div class="tab_content overview-tab" id="tab1">
            <div class="insurance-tab-container">
                <div class="tabbing-content">
                    <div class="tabbing-content-left">
                        <div class="title">
                            <h2>Overview</h2>
                        </div>
                        <ul>
                            <li>
                                <h3>Maximum Total Trip Coverage</h3>
                                <a href="#">$100,000</a>
                            </li>
                            <li>
                                <h3>Maximum Total Trip Coverage</h3>
                                <a href="#">$100,000</a>
                            </li>
                            <li>
                                <h3>Booking Restrictions:</h3> 
                            </li>
                        </ul>
                        <div class="in-addon-btn">
                            <ul>
                                <li>
                                    <h3>Booking portal</h3>
                                    <div class="booking-btn">
                                        <a href="#">GO TO BOOKING PORTAL</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tabbing-content-right">
                        <div class="travel-image">
                            <figure><img src="https://smartflyercdn.s3.amazonaws.com/wp-content/uploads/20221017095714/travelex.png"></figure>
                        </div>
                        <div class="tabbing-btns d-flex">
                            <div class="download-btn">
                                <a href="#">Book direct for  12% and 16% commission </a>
                            </div>
                            <div class="download-btn member">
                                <a href="#">Member since ----</a>
                            </div>
                        </div>  
                        <div class="primary-main">
                            <div class="tabbing-box">
                                <div class="main-title">
                                    <h2>Primary Contact</h2>
                                </div>
                                <div class="tabbing-box-content">
                                    <div class="inner d-flex">
                                        <div class="tabbing-box-image">
                                            <figure>
                                                <img src="https://smartflyercdn.s3.amazonaws.com/wp-content/uploads/20221018023702/Ellipse-12.png">
                                            </figure>
                                        </div>
                                        <div class="box-title">
                                            <h4>Rob Gilbert<span>Senior Vice President</span></h4>
                                            <a href="#">rob@flewber.com</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tabbing-box">
                                <div class="main-title">
                                    <h2>Sales Contact</h2>
                                </div>
                                <div class="tabbing-box-content">
                                    <div class="inner d-flex">
                                        <div class="tabbing-box-image">
                                            <figure><img src="https://smartflyercdn.s3.amazonaws.com/wp-content/uploads/20221018023702/Ellipse-12.png"></figure>
                                        </div>
                                        <div class="box-title">
                                            <h4>Thane Gevas <span>Senior Vice President</span></h4>
                                            <a href="#">thane@flewber.com</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tabbing-box">
                                <div class="main-title">
                                    <h2>Global Contact</h2>
                                </div>
                                <div class="tabbing-box-content">
                                    <div class="inner d-flex">
                                        <div class="tabbing-box-image">
                                            <figure><img src="https://smartflyercdn.s3.amazonaws.com/wp-content/uploads/20221018023702/Ellipse-12.png"></figure>
                                        </div>
                                        <div class="box-title">
                                            <h4>Rob Gilbert <span>Senior Vice President</span></h4>
                                            <a href="#">rob@flewber.com</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tabbing-box">
                                <div class="main-title">
                                    <h2>Commission Inquiry Contact</h2>
                                </div>
                                <div class="tabbing-box-content">
                                    <div class="inner d-flex">
                                        <div class="tabbing-box-image">
                                            <figure><img src="https://smartflyercdn.s3.amazonaws.com/wp-content/uploads/20221018023702/Ellipse-12.png"></figure>
                                        </div>
                                        <div class="box-title">
                                            <h4>Meaghan Kemeny<span>Senior Vice President</span></h4>
                                            <a href="#">meaghankemeny@ahoyclub.com</a>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
            <section class="the-rooms-section the-rooms-bottom blue-background" id="rooms">
                <div class="container">
                    <div class="the-rooms-wrap">
                        <div class="content in-addon-content">
                            <span>policies</span>
                            <h2>SmartFlyer Plan</h2>
                        </div>
                        <div class="featured-room">
                            <div class="content-room-bottom">
                                <p>Created with SmartFlyer customers in mind, this<br> comprehensive travel protection plan gives you and your<br> loved ones options when unexpected situations affect your<br> trip. Let us help you Dream. Explore. Travel On.</p>
                            </div>
                            <div class="featured-img image-hover soulful-image">
                                <img src="https://smartflyercdn.s3.amazonaws.com/wp-content/uploads/20221102052600/Soulful-2.png">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="insurance-tab-container">
                <div class="marketing-assets in-addon-marketing">
                    <div class="marketing-training-box" style="padding-top: 60px">
                        <div class="title">
                            <h3 style="font-size: 28px;">Marketing Assets</h3>
                        </div>
                        <div class="marketing-main">
                            <div class="marketing-box">
                                <div class="inner d-flex">
                                    <div class="box-title">
                                        <h4>Antigua vs St Lucia</h4>
                                        <a href="#">https://drive.google.com/file/d/15flqPEUSVH5ps7aURyNfSfOxixjyIOgT/view</a>
                                    </div>
                                </div>
                            </div>
                            <div class="marketing-box">
                                <div class="inner d-flex">
                                    <div class="box-title">
                                        <h4>Barbados vs The Bahamas</h4>
                                        <a href="#">https://static1.squarespace.com/static/55fa61eee4b0ff96fa20ac0e/t/629d544660486d1970c23369/1654477895822/Hyatt+Brand+Bar+with+Brand+Descriptions.pdf</a>
                                    </div>
                                </div>
                            </div>
                            <div class="marketing-box">
                                <div class="inner d-flex">
                                    <div class="box-title">
                                        <h4>Punta Mita vs Puerto Vallarta</h4>
                                        <a href="#">https://static1.squarespace.com/static/55fa61eee4b0ff96fa20ac0e/t/5f860cdd1ad6726ebbc86ca2/1602620641081/Work+From+Hyatt.pdf</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="marketing-training-box">
                        <div class="title">
                            <h3>Trainings</h3>
                        </div>
                        <div class="marketing-main">
                            <div class="marketing-box">
                                <div class="inner d-flex">
                                    <div class="box-title">
                                        <h4>Chelsea Penthouse, Las Vegas, US</h4>
                                        <a href="#">https://drive.google.com/file/d/15flqPEUSVH5ps7aURyNfSfOxixjyIOgT/view</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="info-bottom-image">
                <figure>
                    <img src="https://smartflyer.theglobalwebdev.com/new-website/wp-content/uploads/Rectangle-752.png">
                </figure>
            </div>
            <section class="might-also-like might-also-like-new">
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
        <div class="tab_content " id="tab2">
            <div class="insurance-tab-container">
                <div class="contacts-content">
                    <div class="title">
                        <h2>Contacts</h2>
                    </div>
                    <ul>
                        <li>
                            <div class="tabbing-box">
                                <div class="main-title">
                                    <h2>Primary Contact</h2>
                                </div>
                                <div class="tabbing-box-content">
                                    <div class="inner d-flex">
                                        <div class="tabbing-box-image">
                                            <figure><img src="https://smartflyercdn.s3.amazonaws.com/wp-content/uploads/20221018023702/Ellipse-12.png"></figure>
                                        </div>
                                        <div class="box-title">
                                            <h4>Meaghan Kemeny <span>Business Development Manager</span></h4>
                                            <a href="#">meaghankemeny@ahoyclub.com</a>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </li>
                        <li>
                            <div class="tabbing-box">
                                <div class="main-title">
                                    <h2>Sales/Account Manager</h2>
                                </div>
                                <div class="tabbing-box-content">
                                    <div class="inner d-flex">
                                        <div class="tabbing-box-image">
                                            <figure><img src="https://smartflyercdn.s3.amazonaws.com/wp-content/uploads/20221018023702/Ellipse-12.png"></figure>
                                        </div>
                                        <div class="box-title">
                                            <h4>Meaghan Kemeny <span>Business Development Manager</span></h4>
                                            <a href="#">meaghankemeny@ahoyclub.com</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="tabbing-box">
                                <div class="main-title">
                                    <h2>Global</h2>
                                </div>
                                <div class="tabbing-box-content">
                                    <div class="inner d-flex">
                                        <div class="tabbing-box-image">
                                            <figure><img src="https://smartflyercdn.s3.amazonaws.com/wp-content/uploads/20221018023702/Ellipse-12.png"></figure>
                                        </div>
                                        <div class="box-title">
                                            <h4>Meaghan Kemeny <span>Business Development Manager</span></h4>
                                            <a href="#">meaghankemeny@ahoyclub.com</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="tabbing-box">
                                <div class="main-title">
                                    <h2>Commssions</h2>
                                </div>
                                <div class="tabbing-box-content">
                                    <div class="inner d-flex">
                                        <div class="tabbing-box-image">
                                            <figure><img src="https://smartflyercdn.s3.amazonaws.com/wp-content/uploads/20221018023702/Ellipse-12.png"></figure>
                                        </div>
                                        <div class="box-title">
                                            <h4>Meaghan Kemeny <span>Business Development Manager</span></h4>
                                            <a href="#">meaghankemeny@ahoyclub.com</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="info-bottom-image">
                <figure>
                    <img src="https://smartflyer.theglobalwebdev.com/new-website/wp-content/uploads/Rectangle-752.png">
                </figure>
            </div>
        </div>
        <div class="tab_content" id="tab3">
            <div class="insurance-tab-container">                  
                <div class="booking-content">                     
                    <div class="tabbing-content-left">
                        <div class="title">
                            <h2>Booking Process</h2>
                        </div>
                        <ul>
                            <li>
                                <h3>Booking portal</h3>
                                <div class="booking-btn">
                                    <a href="#">GO TO BOOKING PORTAL</a>
                                </div>
                            </li>
                            <li>
                                <h3>Username</h3>
                                <a href="#">smartflyer</a>
                            </li>
                            <li>
                                <h3>Password</h3>
                                <a href="#">deepsmarts</a>
                            </li>
                            <li>
                                <h3>ID</h3>
                                <a href="#">32-0402</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tabbing-content-right">
                        <div class="booking-image on-sit-right">
                            <figure>
                                <img src="https://smartflyercdn.s3.amazonaws.com/wp-content/uploads/20221018061234/Booking-Process.png">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="info-bottom-image">
                <figure>
                    <img src="https://smartflyer.theglobalwebdev.com/new-website/wp-content/uploads/Rectangle-752.png">
                </figure>
            </div>
        </div>
        <div class="tab_content " id="tab4">
            <div class="insurance-tab-container">
                <div class="Commssions-content">
                    <div class="tabbing-content-left Commssions-left">
                        <div class="title">
                            <h2>Commssions</h2>
                        </div>
                        <div class="plan">
                            <h3>SmartFlyer Plan</h3>
                            <p>
                                Created with SmartFlyer customers in mind, this comprehensive travel<br> protection plan gives you and your loved ones options when unexpected<br> situations affect your trip. Let us help you Dream. Explore. Travel On.
                            </p>   
                        </div>
                        <div class="smarties">
                            <h3>Commission % offered to smarties</h3>
                            <p>725A-0122 -  30%</p>
                        </div>
                        <div class="details">
                            <h3>Commission Details:</h3>
                            <span>paid automatically, if paid at time when the policy is<br> created or when the client travels, requires an<br> invoice, commission invoices required after a<br> certain period, etc.</span>
                        </div>
                    </div>
                    <div class="tabbing-content-right">
                        <div class="tabbing-box">
                            <div class="main-title">
                                <h2>Global Contact</h2>
                            </div>
                            <div class="tabbing-box-content">
                                <div class="inner d-flex">
                                    <div class="tabbing-box-image">
                                        <figure><img src="https://smartflyercdn.s3.amazonaws.com/wp-content/uploads/20221018023702/Ellipse-12.png"></figure>
                                    </div>
                                    <div class="box-title">
                                        <h4>John Doe<span>Regional Sales Manager</span></h4>
                                        <a href="#">commissions@commssions.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tabbing-box">
                            <div class="main-title">
                                <h2>Commissions Contact</h2>
                            </div>
                            <div class="tabbing-box-content">
                                <div class="inner d-flex">
                                    <div class="tabbing-box-image">
                                        <figure><img src="https://smartflyercdn.s3.amazonaws.com/wp-content/uploads/20221018023702/Ellipse-12.png"></figure>
                                    </div>
                                    <div class="box-title">
                                        <h4>John Doe<span>Regional Sales Manager</span></h4>
                                        <a href="#">commissions@commssions.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="info-bottom-image">
                <figure>
                    <img src="https://smartflyer.theglobalwebdev.com/new-website/wp-content/uploads/Rectangle-752.png">
                </figure>
            </div>
        </div>
        <div class="tab_content offers-trainings" id="tab5">
            <div class="insurance-tab-container">
                <div class="marketing-assets">
                    <div class="title">
                        <h2>Assets+Trainings</h2>
                    </div>
                    <div class="marketing-contant marketing-training-box ">
                        <div class="title">
                            <h3>Marketing Assets</h3>
                        </div>
                        <div class="marketing-main">
                            <div class="marketing-box">
                                <div class="inner d-flex">
                                    <div class="box-title">
                                        <h4>Product Flyer</h4>
                                        <a href="#">https://drive.google.com/file/d/15flqPEUSVH5ps7aURyNfSfOxixjyIOgT/view</a>
                                    </div>
                                </div>
                            </div>
                            <div class="marketing-box">
                                <div class="inner d-flex">
                                    <div class="box-title">
                                        <h4>Why Buy Flyer</h4>
                                        <a href="#">https://static1.squarespace.com/static/55fa61eee4b0ff96fa20ac0e/t/629d544660486d1970c23369/1654477895822/Hyatt+Brand+Bar+with+Brand+Descriptions.pdf</a>
                                    </div>
                                </div>
                            </div>
                            <div class="marketing-box">
                                <div class="inner d-flex">
                                    <div class="box-title">
                                        <h4>FAQ on SmartFlyer Policy</h4>
                                        <a href="#">https://www.hyatt.com/prive/login?next=/prive</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="marketing-training-box">
                        <div class="title">
                            <h3>Trainings</h3>
                        </div>
                        <div class="marketing-box">
                            <div class="inner d-flex">
                                <div class="box-title">
                                    <h4>Travelex x SmartFlyer Training (Feb. 3rd, 2022)</h4>
                                    <a href="#">https://drive.google.com/file/d/15flqPEUSVH5ps7aURyNfSfOxixjyIOgT/view</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="info-bottom-image">
                <figure>
                    <img src="https://smartflyer.theglobalwebdev.com/new-website/wp-content/uploads/Rectangle-752.png">
                </figure>
            </div>
        </div>
        <div class="tab_content marketing" id="tab6">
            <div class="insurance-tab-container">
                <div class="marketing-assets">
                    <div class="title">
                        <h2>Updates</h2>
                    </div>
                </div>
            </div>
            <div class="info-bottom-image">
                <figure>
                    <img src="https://smartflyer.theglobalwebdev.com/new-website/wp-content/uploads/Rectangle-752.png">
                </figure>
            </div> 
        </div>
    </div>
</div>





    <!-- <div class="pass-form">
        <?php
        echo get_the_password_form();
        ?>
      </div> -->
      <?php

    }

    get_footer();
    ?>


