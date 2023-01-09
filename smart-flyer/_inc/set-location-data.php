<?php
foreach($locations as $term)
{
	$lat = get_term_meta($term->term_id, 'term_lat', true);
	if($lat == '')
	{
		$url = 'https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($term->name).'&sensor=false&key=AIzaSyCSV2qScKwDCmwTlxAk74KKQwhVqCq6EcA';
		$locdata = getLocData($url);
		$locdata = json_decode($locdata);
		if(count($locdata->results) > 0)
		{
			$locdata = $locdata->results[0]->geometry->location;
			update_term_meta($term->term_id, 'term_lat', $locdata->lat);
			update_term_meta($term->term_id, 'term_lng', $locdata->lng);
		}
		sleep(0.01);
	}
}


$user_lat = getenv('HTTP_GEOIP_LATITUDE');
$user_lng = getenv('HTTP_GEOIP_LONGITUDE');
$region = getenv('HTTP_GEOIP_REGION');
$city = getenv('HTTP_GEOIP_CITY');

//echo '<span id="user_latlng" style="display:none;">'.$user_lat.','.$user_lng.','.$region.','.$city.'</span>';
if(isset($_GET['latitude']))
	$user_lat = $_GET['latitude'];
if(isset($_GET['longitude']))
	$user_lng = $_GET['longitude'];
	
	
if($user_lat == '37.75100' && $user_lng == '-97.82200')
	$middle_states = true;
	
$sorted_terms = array();
foreach($locations as $term)
{
	$lat = get_term_meta($term->term_id, 'term_lat', true);
	$lng = get_term_meta($term->term_id, 'term_lng', true);
	if($lat && $lng)
	{
		$distance = distance($user_lat,$user_lng,$lat,$lng,"K");
		$term->distance = $distance;
		$sorted_terms[]	= $term;
	}
}
usort($sorted_terms, "sort_objects_by_distance");



function sort_objects_by_distance($a, $b) {
	if($a->distance == $b->distance){ return 0 ; }
	return ($a->distance < $b->distance) ? -1 : 1;
}

function getLocData($url)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 20);
	$result = curl_exec($ch);
	curl_close($ch); 
	return $result;
}



function distance($lat1, $lon1, $lat2, $lon2, $unit)
{

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}


?>