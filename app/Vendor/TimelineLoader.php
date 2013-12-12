<?php

/**
* Twitter timeline loader
*/
require_once('TwitterAPIExchange.php');

class TimelineLoader
{
	
	function __construct()
	{
		
	}

	public function getUserTimeline($twitter_username)
	{
		$settings = array(
    		'oauth_access_token' => "81435680-t8NeRFYfza70PDQezPHDTzDICJOjqaPLAdfx5tPuO",
    		'oauth_access_token_secret' => "RbQM2gFPm738TQ34RKtBhB4FIna0YRW0xrrb2lrlmJvgI",
    		'consumer_key' => "1NUdU5ceFJQQSeapuzZQ",
    		'consumer_secret' => "HvRe3QZt5QliSPUocv0Ja5QrJFNSfKKO42w7ituXDl4"
		);

		$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
		$getfield = '?screen_name=' . $twitter_username;
		$requestMethod = 'GET';

		$twitter = new TwitterAPIExchange($settings);
		return $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();
	}
}

