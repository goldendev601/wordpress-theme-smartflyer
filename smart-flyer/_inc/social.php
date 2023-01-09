<?php
	
/* ---------------------------------
	Instagram
--------------------------------- */

if(isset($_GET['insta']) && $_GET['insta'] == 'yes')
{
	$uri = 'https://api.instagram.com/oauth/access_token'; 
	$data = [
		'client_id' => 'adcf19e9f45241bf98eeaa357631ef90', 
		'client_secret' => '2904ac283d25416fbc28c866c713b861', 
		'grant_type' => 'authorization_code', 
		'redirect_uri' => 'http://www.smartflyer.com/?insta=yes', 
		'code' => $_GET['code']
	];
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $uri); // uri
	curl_setopt($ch, CURLOPT_POST, true); // POST
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // POST DATA
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // RETURN RESULT true
	curl_setopt($ch, CURLOPT_HEADER, 0); // RETURN HEADER false
	curl_setopt($ch, CURLOPT_NOBODY, 0); // NO RETURN BODY false / we need the body to return
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // VERIFY SSL HOST false
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // VERIFY SSL PEER false
	$result = json_decode(curl_exec($ch)); // execute curl
	
	
	if(isset($result->access_token))
	{
		update_option( 'instagram_token', $result->access_token );
		update_option( 'instagram_id', $result->user->id );
	}
	
	echo "Instagram access token updated. <a href='".home_url()."'>Click here to go to homepage.</a>";
	die;
	
}


function instagram_api_curl_connect( $api_url )
{
	$connection_c = curl_init(); // initializing
	curl_setopt( $connection_c, CURLOPT_URL, $api_url ); // API URL to connect
	curl_setopt( $connection_c, CURLOPT_RETURNTRANSFER, 1 ); // return the result, do not print
	curl_setopt( $connection_c, CURLOPT_TIMEOUT, 20 );
	$json_return = curl_exec( $connection_c ); // connect and get json data
	curl_close( $connection_c ); // close connection
	return json_decode( $json_return ); // decode and return
}

function smartflyer_instagram()
{
	
	if(isset($_GET['clearinsta']) && $_GET['clearinsta'] == 'yes')
		delete_transient( 'exsite_instagram' );
		
	
	$content = get_transient( 'exsite_instagram' );
	if (!$content)
	{
		$content =  array();
		$username = 'thesmartflyer';
		$instas_data = file_get_contents('https://madebyarticle.com/insta.php?username='.$username.'&time='.time());
		$instas_data = json_decode($instas_data);
		
		$counter = 1;
		foreach($instas_data as $insta)
		{
			$image_url = $insta->image;
			$link = $insta->link;
			$content[] = array('image'=>$image_url,'link'=>$link);	
			
			if($counter >= 7)
				break;
			$counter++;
		}		
		set_transient( 'exsite_instagram', $content, 60*10 );	
	}
	return $content;
}

/*

function smartflyer_instagram()
{
	$instas = get_transient( 'exsite_instagram' );
	if(!$instas)
		delete_transient( 'exsite_instagram' );
		
	if ( false === ( $instas = get_transient( 'exsite_instagram' ) ) )
	{
		$access_token = get_option('instagram_token');
		$insta_id = get_option('instagram_id');
		$return = instagram_api_curl_connect("https://api.instagram.com/v1/users/".$insta_id."/media/recent?access_token=" . $access_token);
		
		$instas_data = $return->data;
		
		$counter = 1;
		$instas =  array();
		foreach($instas_data as $insta)
		{
			$image_url = $insta->images->standard_resolution->url;
			$link = $insta->link;
			$instas[] = array('image'=>$image_url,'link'=>$link);	
			
			if($counter >= 7)
				break;
			$counter++;
		}

		set_transient( 'exsite_instagram', $instas, 60 * 60 * 1 );
	}else{
		$instas = get_transient( 'exsite_instagram' );
	}

	return $instas;
}

*/


function smartflyer_instagram_hashtag()
{

	delete_transient( 'smartflyer_instagram_hashtag' );
	if ( false === ( $value = get_transient( 'smartflyer_instagram_hashtag' ) ) )
	{
		$content =  array();
		
		
		
		$instaResult = file_get_contents('https://www.instagram.com/explore/tags/SeeSmartiesFly/?__a=1');
		$instas_data = json_decode($instaResult, true);
		
		foreach($instas_data['tag']['media']['nodes'] as $insta)
		{
			$image_url = $insta['thumbnail_src'];
			$link = 'https://www.instagram.com/p/'.$insta['code'];
			$content[] = array('image'=>$image_url,'link'=>$link);	
			
			if($counter >= 4)
				break;
			$counter++;
		}
		
		
		
		/*
		$tag_insta = true;
		$username = 'SeeSmartiesFly';
		include('insta.php');
		$counter = 1;
		if($insta_data)
		{
			foreach($insta_data as $instapic)
			{
				$image_url = str_replace('s150x150', 's640x640', $instapic->thumbnail_src);
				$link = 'https://www.instagram.com/p/'.$instapic->code.'/';
				$content[] = array('image'=>$image_url,'link'=>$link);	
				
				if($counter >= 4)
					break;
				$counter++;
			}	
		}
		*/
		
		set_transient( 'smartflyer_instagram_hashtag', $content, 60*10 );
		
	}else{
		$content = get_transient( 'smartflyer_instagram_hashtag' );
	}
	return $content;
}


/* ---------------------------------
	Twitter
--------------------------------- */

function smartflyer_twitter()
{
	//delete_transient( 'social_twitter' );
	if ( false === ( $tweets = get_transient( 'social_twitter' ) ) )
	{
		require_once ( 'social/TwitterAPIExchange.php' );
		
		$settings = array(
		    'oauth_access_token' => "62585407-asGYrFa4hJmlLRXRSsuLfvhFDj8a16Tx6RDzRwX5V",
		    'oauth_access_token_secret' => "HX8CEcQqRtfbmIxrTvfRR8VimpvjFmYVzfmK0vIv9BzDi",
		    'consumer_key' => "40tk8lOdQyc2IzRzYgwhqMWCq",
		    'consumer_secret' => "MYq3XJHisQxg60Tj2X9nfUgP7nvYLbptB0EUhjlCirf3A6uhgh"
		);
		
		$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
		$getfield = '?screen_name=theSmartFlyer';
		$requestMethod = 'GET';
		$twitter = new TwitterAPIExchange($settings);
		$data = $twitter->setGetfield($getfield)
		             ->buildOauth($url, $requestMethod)
		             ->performRequest();
		$tweets = json_decode($data);		
		set_transient( 'social_twitter', $tweets, 60*5 );		
	}else{
		$tweets = get_transient( 'social_twitter' );
	}
	
	return $tweets;
}


//Fetch Data
function fetchData($url)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 20);
	$result = curl_exec($ch);
	curl_close($ch); 
	return $result;
}



// use with twitter
function linkify_filtered($text) {
    $url_pattern = '/# Rev:20100913_0900 github.com\/jmrware\/LinkifyURL
    # Match http & ftp URL that is not already linkified.
      # Alternative 1: URL delimited by (parentheses).
      (\()                     # $1  "(" start delimiter.
      ((?:ht|f)tps?:\/\/[a-z0-9\-._~!$&\'()*+,;=:\/?#[\]@%]+)  # $2: URL.
      (\))                     # $3: ")" end delimiter.
    | # Alternative 2: URL delimited by [square brackets].
      (\[)                     # $4: "[" start delimiter.
      ((?:ht|f)tps?:\/\/[a-z0-9\-._~!$&\'()*+,;=:\/?#[\]@%]+)  # $5: URL.
      (\])                     # $6: "]" end delimiter.
    | # Alternative 3: URL delimited by {curly braces}.
      (\{)                     # $7: "{" start delimiter.
      ((?:ht|f)tps?:\/\/[a-z0-9\-._~!$&\'()*+,;=:\/?#[\]@%]+)  # $8: URL.
      (\})                     # $9: "}" end delimiter.
    | # Alternative 4: URL delimited by <angle brackets>.
      (<|&(?:lt|\#60|\#x3c);)  # $10: "<" start delimiter (or HTML entity).
      ((?:ht|f)tps?:\/\/[a-z0-9\-._~!$&\'()*+,;=:\/?#[\]@%]+)  # $11: URL.
      (>|&(?:gt|\#62|\#x3e);)  # $12: ">" end delimiter (or HTML entity).
    | # Alternative 5: URL not delimited by (), [], {} or <>.
      (                        # $13: Prefix proving URL not already linked.
        (?: ^                  # Can be a beginning of line or string, or
        | [^=\s\'"\]]          # a non-"=", non-quote, non-"]", followed by
        ) \s*[\'"]?            # optional whitespace and optional quote;
      | [^=\s]\s+              # or... a non-equals sign followed by whitespace.
      )                        # End $13. Non-prelinkified-proof prefix.
      ( \b                     # $14: Other non-delimited URL.
        (?:ht|f)tps?:\/\/      # Required literal http, https, ftp or ftps prefix.
        [a-z0-9\-._~!$\'()*+,;=:\/?#[\]@%]+ # All URI chars except "&" (normal*).
        (?:                    # Either on a "&" or at the end of URI.
          (?!                  # Allow a "&" char only if not start of an...
            &(?:gt|\#0*62|\#x0*3e);                  # HTML ">" entity, or
          | &(?:amp|apos|quot|\#0*3[49]|\#x0*2[27]); # a [&\'"] entity if
            [.!&\',:?;]?        # followed by optional punctuation then
            (?:[^a-z0-9\-._~!$&\'()*+,;=:\/?#[\]@%]|$)  # a non-URI char or EOS.
          ) &                  # If neg-assertion true, match "&" (special).
          [a-z0-9\-._~!$\'()*+,;=:\/?#[\]@%]* # More non-& URI chars (normal*).
        )*                     # Unroll-the-loop (special normal*)*.
        [a-z0-9\-_~$()*+=\/#[\]@%]  # Last char can\'t be [.!&\',;:?]
      )                        # End $14. Other non-delimited URL.
    /imx';
//    $url_replace = '$1$4$7$10$13<a href="$2$5$8$11$14">$2$5$8$11$14</a>$3$6$9$12';
//    return preg_replace($url_pattern, $url_replace, $text);
    $url_replace = '_linkify_filter_callback';
    return preg_replace_callback($url_pattern, $url_replace, $text);
}
function _linkify_filter_callback($m)
{ // Filter out youtube and vimeo domains.
    $pre  = $m[1].$m[4].$m[7].$m[10].$m[13];
    $url  = $m[2].$m[5].$m[8].$m[11].$m[14];
    $post = $m[3].$m[6].$m[9].$m[12];
    if (preg_match('/\b(?:youtube|vimeo)\.com\b/', $url)) {
        return $pre . $url . $post;
    } // else linkify...
    return $pre .'<a href="'. $url .'" target="_blank">' . $url .'</a>' .$post;
}