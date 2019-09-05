<?php

include "twitteroauth/twitteroauth.php";

$consumer_key = "Your_consumer_key";
$consumer_secret = "Your_consumer_secret";
$access_token = "Your_access_token";
$access_token_secret = "Your_access_token_secret";


$twitter = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);

function search_hashtag($search)
{
    global $twitter;
    return $tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q=' . $search . '&result_type=recent&tweet_mode=extended&count=100');
}
