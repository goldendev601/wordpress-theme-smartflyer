<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
	<link rel="dns-prefetch" href="//google-analytics.com">
	<link rel="dns-prefetch" href="//fonts.googleapis.com">
	<link rel="dns-prefetch" href="//platform.twitter.com">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php wp_title('|', true, 'right'); ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php include('favicon.php') ?>

	<?php wp_head(); ?>

</head>


<body <?php body_class(); ?>>

	<script>
		(function(i, s, o, g, r, a, m) {
			i['GoogleAnalyticsObject'] = r;
			i[r] = i[r] || function() {
				(i[r].q = i[r].q || []).push(arguments)
			}, i[r].l = 1 * new Date();
			a = s.createElement(o),
				m = s.getElementsByTagName(o)[0];
			a.async = 1;
			a.src = g;
			m.parentNode.insertBefore(a, m)
		})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

		ga('create', 'UA-49123502-1', 'auto');
		ga('send', 'pageview');
	</script>

	<?php
	$page_slug = is_page('destinations') || is_page('destination-main') || is_page('americas') || is_page('caribbean-mexicopage') || is_page('africa') || is_page('asia') || is_page('europe') || is_page('australia') || is_page('north-america') || is_page('latin-america') || is_page('crm-login');
	?>

<?php 
	$current_user = get_userdata( get_current_user_id() );
	$userName = $current_user->first_name .' '. $current_user->last_name;
	$userEmail = $current_user->user_email;
	$userAvtar = get_avatar_url( get_current_user_id() );
?>

	<header class="<?php if ($page_slug == 1) echo 'white-header' ?> <?php if (is_page('what-we-do') == 1) echo 'white-bg';  if ( is_front_page() || is_page('partners-page') || is_page('africa') || is_page('americas') || is_page('caribbean-mexicopage')  || is_page('asia') || is_page('australia') || is_page('north-america') || is_page('europe') || is_page('destinations') || is_page('latin-america') || is_page('destination-main')){ echo 'position-absolute'; } ?>">
		
<?php if(is_page('property-tabs')){ ?>
		<div class="property-header">
		    <div class="header-main header-section d-flex flex-wrap align-items-center ">
		        <div class="logo-wrap">
		            <div class="logo">
		                <a href="<?php echo get_site_url(); ?>">
		                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/logo.svg" alt="">
		                </a>
		            </div>
		        </div>
		        <div class="header-menu">
		        	<a class="property-menulinks"><i></i></a>
		           	<ul class="d-flex property-top-header">
		                <li>
		                    <div class="header-admin">
		                        <div class="inner">
		                            <div class="right">
		                                <div class="image">
		                                    <img src="https://smartflyer.com/wp-content/uploads/2022/08/agent-img.png">
		                                </div> 
		                            </div>
		                            <div class="left">
		                               <h3>Rachel Braylovsky</h3>
		                               <a href="mailto:rachelbr@smartflyer.com">rachelbr@smartflyer.com</a>
		                           </div>
		                        </div>
		                    </div>
		                </li>
		                <li><a href="#">view profile</a></li>
		                <li><a href="#">logout</a></li>
		            </ul>
		        </div>
		    </div>
		</div>
	<?php }else if(is_page('insurance-addon-information') || is_page('experiences-addons-information') || is_page('yacht-sea-transportation-information') || is_page('helicopter-air-transportation-information') || is_page('rental-car-information') || is_page('rental-car-tab') || is_page('on-site-information') || is_page('cruise-information')  || is_page('villas-information') || is_page('brands-aman-information') || is_page('hotel-mauna-lani-information') || is_page('private-aviation-aero-information')){ ?>

<div class="header-info">
	<div class=" header-main ">
		<div class="d-flex flex-wrap justify-content-space-between align-items-center">
			<div class="header-logo">
				<a href="<?php echo get_site_url() ?>">
					<img src="<?php echo get_stylesheet_directory_uri() ?>/images/logo.svg">
				</a>
			</div>
			<div class="nav-menu">
				<a class="menulinks"><i></i></a>
				<?php // wp_nav_menu(['menu' => 'Header', 'menu_class' => 'mainmenu text-uppercase']); ?>
				<ul class="mainmenu text-uppercase">
					<li id="menu-item-30371" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-30371">
						<a href="<?php echo get_site_url(). '/destination-main'; ?>">DESTINATIONS</a>
						<ul class="sub-menu">
							<li>
								<a href="<?php echo get_site_url(). '/destination-main'; ?>">ALL DESTINATIONS</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(). '/americas'; ?>">AMERICAS</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(). '/caribbean-mexicopage'; ?>">CARIBBEAN + MEXICO</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(). '/africa'; ?>">AFRICA</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(). '/asia'; ?>">ASIA PACIFIC</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(). '/europe'; ?>">EUROPE</a>
							</li>
						</ul>
					</li>
					<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children">
						<a href="<?php echo get_site_url(). '/leisure-travel'; ?>/partners-page/">HOTELS</a>
						<ul class="sub-menu">
							<li>
								<a href="<?php echo get_site_url(). '/leisure-travel'; ?>">Leisure Travel</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(). '/flights-private-charter'; ?>">Flights And Private Charter</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(). '/corporate-travel'; ?>">Corporate Travel</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(). '/celebrations'; ?>">Celebrations</a>
							</li>
						</ul>
					</li>
					<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children">
						<a href="<?php echo get_site_url(). '/blog'; ?>">ON-SITES</a>
						<ul class="sub-menu">
							<li>
								<a href="<?php echo get_site_url(). '/leisure-travel'; ?>">Leisure Travel</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(). '/flights-private-charter'; ?>">Flights And Private Charter</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(). '/corporate-travel'; ?>">Corporate Travel</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(). '/celebrations'; ?>">Celebrations</a>
							</li>
						</ul>
					</li>
					<li class="menu-item menu-item-type-post_type menu-item-object-page">
						<a href="<?php echo get_site_url(). '/about-smartflyer-luxury-travel-agency'; ?>">CRUISES</a>
					</li>
					<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children" >
						<a href="<?php echo get_site_url(). '/what-we-do'; ?>">VILLAS</a>
						<ul class="sub-menu">
							<li>
								<a href="<?php echo get_site_url(). '/leisure-travel'; ?>">Leisure Travel</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(). '/flights-private-charter'; ?>">Flights And Private Charter</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(). '/corporate-travel'; ?>">Corporate Travel</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(). '/celebrations'; ?>">Celebrations</a>
							</li>
						</ul>
					</li>
					<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children" >
						<a href="<?php echo get_site_url(). '/what-we-do'; ?>">REP COMPANIES</a>
						<ul class="sub-menu">
							<li>
								<a href="<?php echo get_site_url(). '/leisure-travel'; ?>">Leisure Travel</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(). '/flights-private-charter'; ?>">Flights And Private Charter</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(). '/corporate-travel'; ?>">Corporate Travel</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(). '/celebrations'; ?>">Celebrations</a>
							</li>
						</ul>
					</li>

					<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children ">
						<a href="<?php echo get_site_url(). '/leisure-travel'; ?>/what-we-do/">TRANSPORTATIONS</a>
						<ul class="sub-menu">
							<li>
								<a href="<?php echo get_site_url(). '/leisure-travel'; ?>">Leisure Travel</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(). '/flights-private-charter'; ?>">Flights And Private Charter</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(). '/corporate-travel'; ?>">Corporate Travel</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(). '/celebrations'; ?>">Celebrations</a>
							</li>
						</ul>
					</li>
					<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children ">
						<a href="<?php echo get_site_url(). '/what-we-do'; ?>">ADD-ONS</a>
						<ul class="sub-menu">
							<li>
								<a href="<?php echo get_site_url(). '/leisure-travel'; ?>">Leisure Travel</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(). '/flights-private-charter'; ?>">Flights And Private Charter</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(). '/corporate-travel'; ?>">Corporate Travel</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(). '/celebrations'; ?>">Celebrations</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="header-left">
				<ul>
					<li>
						<div class="header-search-box position-relative">
							<!-- fixed-nev_bar -->
							<?php if ($page_slug == 1) { ?>
								<div class="search-icon"><a href="#open" data-fancybox><img class="searchImage" src="<?php echo get_stylesheet_directory_uri() ?>/images/white-search.svg"></a></div>
							<?php } else { ?>

								<div class="search-icon"><a href="#open" data-fancybox><img src="<?php echo get_stylesheet_directory_uri() ?>/images/search.svg"></a></div>
							<?php } ?>
							<div class="search-box-wrap" id="open" style="display: none;">
								<div class="search-content">
									<h3>I am looking for...</h3>
									<div class="search-box">
									<form method="get" action="<?php echo get_site_url(); ?>">
										<div class='relative'>
											<input type='text'  name="s" placeholder='Enter Search Term' autocomplete="off">
											<button type='submit' style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/images/search-right-arrow.png);"><svg class='arrow-right-large'><use xlink:href="#arrow-right-large"></use></svg></button>
										</div>
										<button type="submit"></button>
									</form>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="header-admin">
							
							<div class="inner">
								<div class="right">
									<div class="image">
										<img src="<?php echo $userAvtar; ?>">
									</div> 
								</div>
								<div class="left">
									<h3><?php echo $userName; ?></h3>
									<p><?php echo $userEmail; ?></p>
								</div>
								<div class="down-arrow">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Vector-down.png">
								</div>
							</div>
							<div class="dropdown-login">
								<ul>
									<li><a href="#" id="my-profile">My Profile</a></li>
									<li><a href="#" id="profile-logout">Logout</a></li>
								</ul>
							</div>
						</div>
					</li>
				</ul>
			</div> 
		</div>
	</div>
</div>
<?php }else{ ?>
		<div class="header-main">
			<div class="header-section d-flex flex-wrap align-items-center ">
				<div class="logo-wrap">
					<div class="logo">
						<?php if ($page_slug == 1) { ?>
							<a href="<?php echo get_site_url(); ?>"><img class="logo" src="<?php echo get_stylesheet_directory_uri() ?>/images/white-logo.png" alt=""></a>
						<?php } else { ?>

							<a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/logo.svg" alt=""></a>
						<?php } ?>
					</div>
				</div>
				<div class=" header-menu ">
					<div class="nav-menu d-flex">
						<a class="menulinks"><i></i></a>
						
						<?php wp_nav_menu(['menu' => 'Header', 'menu_class' => 'mainmenu text-uppercase']); ?>
						<div class="header-search-box position-relative">
							<!-- fixed-nev_bar -->
							<?php if ($page_slug == 1) { ?>
								<div class="search-icon"><a href="#open" data-fancybox><img class="searchImage" src="<?php echo get_stylesheet_directory_uri() ?>/images/white-search.svg"></a></div>
							<?php } else { ?>

								<div class="search-icon"><a href="#open" data-fancybox><img src="<?php echo get_stylesheet_directory_uri() ?>/images/search.svg"></a></div>
							<?php } ?>
							<div class="search-box-wrap" id="open" style="display: none;">
								<div class="search-content">
									<h3>I am looking for...</h3>
									<div class="search-box">
									<form method="get" action="<?php echo get_site_url(); ?>">
										<div class='relative'>
											<input type='text'  name="s" placeholder='Enter Search Term' autocomplete="off">
											<button type='submit' style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/images/search-right-arrow.png);"><svg class='arrow-right-large'><use xlink:href="#arrow-right-large"></use></svg></button>
										</div>
										<button type="submit"></button>
									</form>
									</div>
								</div>
							</div>
						</div>
						<div class="user-icon">
							<?php if ($page_slug == 1) { ?>
								<a href="<?php echo get_site_url('', 'coming-soon'); ?>">
									<img class="userImage" src="<?php echo get_stylesheet_directory_uri() ?>/images/white-user.png">
								</a>
							<?php } else { ?>
								<a href="<?php echo get_site_url('', 'coming-soon'); ?>">
									<img src="<?php echo get_stylesheet_directory_uri() ?>/images/user.svg">
								</a>
							<?php } ?>
						</div>
						<div class="header-btn">
							<a class="text-uppercase plan-a-trip-btn">PLAN A TRIP</a>
							<div class="plan-trip-form" style="display: none;">
									<div class="close-btn">
										<img src="<?php echo get_stylesheet_directory_uri() ?>/images/form-close.png"></div>
									<div class="content-title">

										<h2>Plan a Trip</h2>
										<p>Plan a trip with us! Just fill out the form below so we can get to know you and your trip a little bit better.  Once we receive your request form, we will be in touch to schedule a call to get to know you and learn about your goals and vision for your trip. Planning fee starts at $500.</p>
									</div>
								<div class="form-section">
									<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]')?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	</header>