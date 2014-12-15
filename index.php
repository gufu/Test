<?php
ini_set('display_errors', 1); 
require_once('TwitterAPIExchange.php');
 
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
'oauth_access_token' => "632725190-0wgMK6WOd2zqxc4Kkly2WDB9GvINPcVQpSnKY3k3",		//YOUR_OAUTH_ACCESS_TOKEN
'oauth_access_token_secret' => "AjzaIoNSwxueDJFebrc8dT9erXM2moaR1P19KeE43lsiG",	//YOUR_OAUTH_ACCESS_TOKEN_SECRET
'consumer_key' => "QCC9TLQUH1KL5RTswPLmGMbJW",																	//YOUR_CONSUMER_KEY
'consumer_secret' => "P5y5WBtNwKKzLRXd1NIilmQM3cLfbN9DAJ89R2LYDyZjQ3oqDj"				//YOUR_CONSUMER_SECRET
);

$hashtag = 'Interstellar';																											//HASHTAG WE'RE LOOKING FOR

$url = "https://api.twitter.com/1.1/search/tweets.json";
$requestMethod = "GET";
$getfield = '?q=%23'.$hashtag.'&lang=en&count=4';

$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);
if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}
echo "<pre>";
print_r($string);
echo "</pre>";

/*foreach($string as $items) {
	echo "Time and Date of Tweet: ".$items['created_at']."<br />";
	echo "Tweet: ". $items['text']."<br />";
	echo "Tweeted by: ". $items['user']['name']."<br />";
	echo "Screen name: ". $items['user']['screen_name']."<br />";
	echo "Followers: ". $items['user']['followers_count']."<br />";
	echo "Friends: ". $items['user']['friends_count']."<br />";
	echo "Listed: ". $items['user']['listed_count']."<br />";
}*/

?>