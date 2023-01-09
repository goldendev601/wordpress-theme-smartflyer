<?php get_header(); ?>


<div class='contact'>

	<div class='inquires-modal'>
		<span class='inquires-modal-close'><svg class='lb-close'><use xlink:href="#lb-close"></use></svg></span>
		<div class='modal-inner'>
			<h2>Vendor Request For:</h2>
			<a href='mailto:stl@smartflyer.com' target="_blank">St. Louis</a>
			<a href='mailto:nj@smartflyer.com' target="_blank">New Jersey</a>
			<a href='mailto:atl@smartflyer.com' target="_blank">Atlanta</a>
			<a href='mailto:newport@smartflyer.com' target="_blank">Newport Beach</a>
			<a href='mailto:jax@smartflyer.com' target="_blank">Jacksonville</a>
			<a href='mailto:phl@smartflyer.com' target="_blank">Philadelphia</a>
		</div>
	</div>

	<div class='inquires'>
		<h2>Inquiries</h2>
		<span><a href='mailto:leisure@smartflyer.com' target="_blank">Leisure Travel <svg class='arrow-right'><use xlink:href="#arrow-right"></use></svg></a></span>
		<span><a href='mailto:corporate@smartflyer.com' target="_blank">Corporate Travel <svg class='arrow-right'><use xlink:href="#arrow-right"></use></svg></a></span>
		<span class='modal-trigger'>Vendor Requests <svg class='arrow-right'><use xlink:href="#arrow-right"></use></svg></span>
		<span><a href='<?php echo home_url('/work-with-us'); ?>'>Working with SF <svg class='arrow-right'><use xlink:href="#arrow-right"></use></svg></a></span>
	</div>

	<div class='offices'>
    	<h2>Our Offices</h2>
		<div class='offices-main'>
			<div class='offices-bar'>
				<span class='na-trigger active'>North America</span>
				<span class='au-trigger'>Australia</span>
      		</div>
	  		<div class='offices-maps'>
	  			<div class='au-map details'>
	  				<span class='mob-label'>North America</span>
  					<div class='na-details'>
		           		<div class='details-inner'>
				   			<div class='meta main'>
				   				<img src='<?php echo get_template_directory_uri(); ?>/img/raster/compressed/plane-blue.png'>
				   				<h2>Smart Flyer Headquarters</h2>
								<div class='main-left'>
									<span><?php echo exsite_get_option('address_line_1'); ?></span>
									<span><?php echo exsite_get_option('address_line_2'); ?></span>
									<?php 
										$add_1 = exsite_get_option('address_line_1');
										$add_2 = exsite_get_option('address_line_2');
										$address = $add_1 . ' ' . $add_2;
									?>
									<a href='https://maps.google.com?daddr=<?php echo urlencode($address); ?>' target="_blank">Directions</a>
								</div>
								<div class='main-right'>
									<span><strong>T</strong> +<?php echo exsite_get_option('tel'); ?></span>
									<span><strong>F</strong> +<?php echo exsite_get_option('fax'); ?></span>
									<span><strong>TF</strong> +<?php echo exsite_get_option('tollfree'); ?></span>
								</div>
        					</div>
        					<?php
								$args = array(
								    'posts_per_page'    => -1,
								    'post_type'			=> 'office',
								    'meta_key'         	=> '_office_region',
									'meta_value'       	=> 'NA',
								);
								$offices_na = get_posts(  $args );
								$offices = $offices_na;
								include('_inc/set-location-offices.php');
							?>
							<?php foreach($offices as $office): ?>
							<div class='meta'>
								<svg class='star'><use xlink:href="#star"></use></svg>
								<h2><?php echo $office->post_title; ?></h2>
								<span><?php echo get_post_meta($office->ID, '_office_address_line_1', true); ?></span>
								<span><?php echo get_post_meta($office->ID, '_office_address_line_2', true); ?></span>
								<?php if($tel = get_post_meta($office->ID, '_office_tel', true)):?>
								<span><strong>T</strong> +<?php echo $tel; ?></span>
								<?php endif; ?>
								<?php 
									$add_1 = get_post_meta($office->ID, '_office_address_line_1', true);
									$add_2 = get_post_meta($office->ID, '_office_address_line_2', true);
									$address = $add_1 . ' ' . $add_2;
								?>
								<a href='https://maps.google.com?daddr=<?php echo urlencode($address); ?>' target="_blank">Directions</a>
							</div>
							<?php endforeach; ?>
        				</div>
					</div>
					<div id="map-aus" class='map' style="height: 450px;"></div>
    			</div>
    			
				<div class='na-map details'>
					<span class='mob-label'>Australia</span>
					<div class='au-details'>
						<div class='details-inner'>
							<div class='meta main'>
								<img src='<?php echo get_template_directory_uri(); ?>/img/raster/compressed/plane-blue.png'>
								<h2>Smart Flyer Headquarters</h2>
								<div class='main-left'>
									<span><?php echo exsite_get_option('address_line_1'); ?></span>
									<span><?php echo exsite_get_option('address_line_2'); ?></span>
									<?php 
										$add_1 = exsite_get_option('address_line_1');
										$add_2 = exsite_get_option('address_line_2');
										$address = $add_1 . ' ' . $add_2;
									?>
									<a href='https://maps.google.com?daddr=<?php echo urlencode($address); ?>' target="_blank">Directions</a>
								</div>
								<div class='main-right'>
									<span><strong>T</strong> +<?php echo exsite_get_option('tel'); ?></span>
									<span><strong>F</strong> +<?php echo exsite_get_option('fax'); ?></span>
									<span><strong>TF</strong> +<?php echo exsite_get_option('tollfree'); ?></span>
								</div>
							</div>
							<?php
								$args = array(
								    'posts_per_page'    => -1,
								    'post_type'			=> 'office',
								    'meta_key'         	=> '_office_region',
									'meta_value'       	=> 'AUS',
								);
								$offices_aus = get_posts(  $args );
								$offices = $offices_aus;
								include('_inc/set-location-offices.php');
							?>
							<?php foreach($offices as $office): ?>
							<div class='meta'>
								<svg class='star'><use xlink:href="#star"></use></svg>
								<h2><?php echo $office->post_title; ?></h2>
								<span><?php echo get_post_meta($office->ID, '_office_address_line_1', true); ?></span>
								<span><?php echo get_post_meta($office->ID, '_office_address_line_2', true); ?></span>
								<?php if($tel = get_post_meta($office->ID, '_office_tel', true)):?>
								<span><strong>T</strong> +<?php echo $tel; ?></span>
								<?php endif; ?>
								<?php 
									$add_1 = get_post_meta($office->ID, '_office_address_line_1', true);
									$add_2 = get_post_meta($office->ID, '_office_address_line_2', true);
									$address = $add_1 . ' ' . $add_2;
								?>
								<a href='https://maps.google.com?daddr=<?php echo urlencode($address); ?>' target="_blank">Directions</a>
							</div>
							<?php endforeach; ?>
						</div>
          			</div>
		  			<div id="map-na" class='map' style="height: 450px;"></div>
		  		</div>
		  	</div>
		</div>
	</div>
</div>



<script>
function initMap()
{
	var styles = [{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"on"},{"saturation":-100},{"lightness":20}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"on"},{"saturation":-100},{"lightness":40}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"saturation":-10},{"lightness":30}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"visibility":"simplified"},{"saturation":-60},{"lightness":10}]},{"featureType":"landscape.natural","elementType":"all","stylers":[{"visibility":"simplified"},{"saturation":-60},{"lightness":60}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"},{"saturation":-100},{"lightness":60}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"},{"saturation":-100},{"lightness":60}]}];
	
	var myLatLngNA = {lat: 39.8282, lng: -98.5795};
	var locations_na = [
		['<div style="min-height:50px;line-height: 16px !important;"><b>Smart Flyer Headquarters</b><br/>347 west 36th Street, Suite 700<br/>New York, NY 10018</div>',  40.754468, -73.994389, 4],
		<?php foreach($offices_na as $office): ?>
		<?php $title = '<div style="min-height:50px;line-height: 16px !important;"><b>'.$office->post_title . '</b><br />' . get_post_meta($office->ID, '_office_address_line_1', true). '<br />' .get_post_meta($office->ID, '_office_address_line_2', true).'</div>'; ?>
	 	['<?php echo $title; ?>',  <?php echo get_term_meta($office->ID, '_office_lat', true); ?>, <?php echo get_term_meta($office->ID, '_office_lng', true); ?>, 4],
	 	<?php endforeach; ?>
    ];
	
	var map_na = new google.maps.Map(document.getElementById('map-na'), {
		zoom: 4,
		center: myLatLngNA,
		styles: styles
	});
	
	var infowindow = new google.maps.InfoWindow();

    var marker, i;
	var image_headq = '<?php echo get_template_directory_uri(); ?>/img/raster/compressed/map-plane-icon.png';
	var image_location = '<?php echo get_template_directory_uri(); ?>/img/raster/compressed/map-plane-icon.png';
	
    for (i = 0; i < locations_na.length; i++)
    {  
	    image = image_location;
	    if(i == 0)
	    	image = image_headq;
	    	
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(locations_na[i][1], locations_na[i][2]),
			map: map_na,
			icon: image
		});

		google.maps.event.addListener(marker, 'click', (function(marker, i) {
			return function() {
				infowindow.setContent(locations_na[i][0]);
				infowindow.open(map_na, marker);
			}
		})(marker, i));
    }
    
    
    
    
    var myLatLngAUS = {lat: -25.274398, lng: 128.775136};
	var locations_aus = [
		['<div style="min-height:50px;line-height: 16px !important;"><b>Smart Flyer Headquarters</b><br/>347 west 36th Street, Suite 700<br/>New York, NY 10018</div>',  40.754468, -73.994389, 4],
		<?php foreach($offices_aus as $office): ?>
		<?php $title = '<div style="min-height:50px;line-height: 16px !important;"><b>'.$office->post_title . '</b><br />' . get_post_meta($office->ID, '_office_address_line_1', true). '<br />' .get_post_meta($office->ID, '_office_address_line_2', true).'</div>'; ?>
	 	['<?php echo $title; ?>',  <?php echo get_term_meta($office->ID, '_office_lat', true); ?>, <?php echo get_term_meta($office->ID, '_office_lng', true); ?>, 4],
	 	<?php endforeach; ?>
    ];
	
	var map_aus = new google.maps.Map(document.getElementById('map-aus'), {
		zoom: 4,
		center: myLatLngAUS,
		styles: styles
	});
	
	var infowindow = new google.maps.InfoWindow();

    var marker, i;
	var image_headq = '<?php echo get_template_directory_uri(); ?>/img/raster/compressed/map-plane-icon.png';
	var image_location = '<?php echo get_template_directory_uri(); ?>/img/raster/compressed/map-plane-icon.png';
	
    for (i = 0; i < locations_aus.length; i++)
    {  
	    image = image_location;
	    if(i == 0)
	    	image = image_headq;
	    	
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(locations_aus[i][1], locations_aus[i][2]),
			map: map_aus,
			icon: image
		});

		google.maps.event.addListener(marker, 'click', (function(marker, i) {
			return function() {
				infowindow.setContent(locations_aus[i][0]);
				infowindow.open(map_aus, marker);
			}
		})(marker, i));
    }
}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSV2qScKwDCmwTlxAk74KKQwhVqCq6EcA&callback=initMap"></script>

<?php include('_objects/social-footer.php'); ?>

<?php get_footer(); ?>