<?php
	session_start();
	require_once("twitteroauth/twitteroauth.php"); //Path to twitteroauth library
	
	include 'twitter-username.php';
	$notweets = 5;
	$consumerkey = "VxPdojclGLS16T0dGlUQ";
	$consumersecret = "vH1bxmcRaC8gpmZgmggK8CSN3Qw7w9UcSwmu9sRngwI";
	$accesstoken = "327914330-otl8Dpkmn7FIc9waX0WeL4FPQoSjTo8nREp12kuj";
	$accesstokensecret = "wlMnJ3dM06j4QBnxp9upFmtUATduEpUZxExwP8tjKoQ";
	
	function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
		$connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
		return $connection;
	}
	
	$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
	
	$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
	
	echo json_encode($tweets);
?>	