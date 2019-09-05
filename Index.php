<?php
include "twitteroauth/search.php";

$user_keyword = "#tag"; // any keyword, #hashtag or @username

$search = str_replace("#", "%23", $user_keyword);


$tweets = search_hashtag($search);

foreach ($tweets->statuses as $key => $tweet) {
    if ($tweet->extended_entities->media['0']->video_info->variants['0']->url != null) {
        $img_url = null;
    } else {
        $img_url = $tweet->extended_entities->media['0']->media_url;
    }

    $twi[] = array(
        "profile_img" => $tweet->user->profile_image_url,
        "name" => $tweet->user->name,
        "username" => $tweet->user->screen_name,
        "datetime" => $tweet->created_at,
        "tweet_txt" => $tweet->full_text,
        "img_url" => $img_url,
        "vid_url" => $tweet->extended_entities->media['0']->video_info->variants['0']->url
    );
}

echo json_encode($twi);
