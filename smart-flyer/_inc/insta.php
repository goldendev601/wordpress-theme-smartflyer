<?php
############## ABOUT ########################
#	Phinstagram - Instagram scrape/API/proxy
#	Author: Johan Sandén
#	@sounden
#	www.sounden.com
#	Copycat 2016
#############################################

$phinstagram_json_object = null;

// check if we have a username set in the GET variable
if(isset($_GET['username'])) { $username = $_GET['username']; }

# define variable for local cache
define("TMP_DIR", "/tmp");
define("CACHE_FILE_NAME",$username.".json");

# define cache time 5 minutes default //
define("LOCAL_CACHE_IN_SECONDS", 300);

	/*if (file_exists(TMP_DIR."/".CACHE_FILE_NAME) && (filemtime(TMP_DIR."/".CACHE_FILE_NAME) > (time() - LOCAL_CACHE_IN_SECONDS )))
	{
			// fetch from disk //
			$phinstagram_json_object = json_decode(file_get_contents(TMP_DIR."/".CACHE_FILE_NAME));
	}
	else
	{
	*/
		// get a fresh download //
		$ch = curl_init();
		// set the url to appropriate user
		if(isset($tag_insta))
			curl_setopt($ch, CURLOPT_URL, "https://www.instagram.com/explore/tags/$username/");
		else
			curl_setopt($ch, CURLOPT_URL, "https://www.instagram.com/$username/");
		// return data
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// set a custom useragent
		curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36');
		$html = curl_exec($ch);
		curl_close($ch);

		// Create a new DOMDocument to parse the result in
		$doc = new DOMDocument();

		//supress the HTML5 tags warning //
		libxml_use_internal_errors(true);

		// Load content as DOMDocument //
		$doc->loadHTML($html);

		// Check every line in the textContent node //
		foreach(explode("\n", $doc->textContent) as $line) {
			// When string found, fix it and make a json object from it
			if (strpos($line, 'window._sharedData = ') !== false) {
				// do some cleanup before we can use it as json
				$json_string = str_replace("window._sharedData = ",'',$line);
				$json_string = substr_replace($json_string ,"",-1,1);
				// decode the string to an object //
				$phinstagram_json_object = json_decode($json_string);
			}
		}

		if($phinstagram_json_object == NULL)
		{
			// return last working json string if it exists //
			if (file_exists(TMP_DIR."/".CACHE_FILE_NAME)) {
				$phinstagram_json_object = json_decode(file_get_contents(TMP_DIR."/".CACHE_FILE_NAME));
			} else {
				//oh nooo .. we didnt have a stored old json string on disk.. nor parsing instagram.com site succeeded!!! FAIL, DIE!
				$phinstagram_json_object = array("error" => json_last_error());
				}
		}
		else
		{
			// save to local cache if the new one works //
			file_put_contents(TMP_DIR."/".CACHE_FILE_NAME, $json_string);
		}
	//} #end if statment time cache #

if(isset($tag_insta))
	$insta_data = $phinstagram_json_object->entry_data->TagPage[0]->tag->media->nodes;
else
	$insta_data = $phinstagram_json_object->entry_data->ProfilePage[0]->user->media->nodes;

