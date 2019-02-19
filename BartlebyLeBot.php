<?php

/*
----- VOUS AUREZ BESOIN DE CONFIGURER TWITTERAPIEXCHANGE (https://github.com/J7mbo/twitter-api-php)

require_once "TwitterAPIExchange.php";

$settings = array(
 'oauth_access_token' => "XXXXXXXXXXX",
 'oauth_access_token_secret' => "XXXXXXXXXXX",
 'consumer_key' => "XXXXXXXXXXX",
 'consumer_secret' => "XXXXXXXXXXX" );

$twitter = new TwitterAPIExchange($settings);

*/

$url = "https://api.twitter.com/1.1/trends/place.json";
$getfield = "?id=615702"; // ID de la localisation "Paris, France"
$table = json_decode($twitter->setGetfield($getfield)->buildOauth($url, "GET")->performRequest(),$assoc = TRUE);

$hashtag = null;

foreach ($table[0]['trends'] as $trendTopic)
{
 $nom = html_entity_decode($trendTopic['name']);
 if (substr($nom, 0, 1) != "#") continue;
 if (strtoupper($nom) == $nom) continue;
 $hashtag = $nom;
 break;
}

if ($hashtag === null) return;

$message = $hashtag." ? Je préférerais ne pas.";

$postfields = array('status' =>  $message);
$url = "https://api.twitter.com/1.1/statuses/update.json";
$requestMethod = "POST";
echo $twitter->resetFields()->buildOauth($url, "POST")->setPostfields($postfields)->performRequest();

?>