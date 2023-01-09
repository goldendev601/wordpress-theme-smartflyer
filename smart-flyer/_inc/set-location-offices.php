<?php
foreach($offices as $office)
{
	$lat = get_term_meta($office->ID, '_office_lat', true);
	if($lat == '')
	{
		$add_1 = get_post_meta($office->ID, '_office_address_line_1', true);
		$add_2 = get_post_meta($office->ID, '_office_address_line_2', true);
		$address = $add_1 . ' ' . $add_2;
		$url = 'http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false';
		$locdata = getLocDataOffice($url);
		$locdata = json_decode($locdata);
		if(count($locdata->results) > 0)
		{
			$locdata = $locdata->results[0]->geometry->location;
			update_term_meta($office->ID, '_office_lat', $locdata->lat);
			update_term_meta($office->ID, '_office_lng', $locdata->lng);
		}
		sleep(5);
	}
}

?>