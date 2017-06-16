<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YouTubeController extends Controller
{
    private $key = "AIzaSyCBiqdkjWPzxozLgnUw4HDQOX2EemzC3RU";

    public function getChannelData($channel)
    {

        $subCount = file_get_contents("https://www.googleapis.com/youtube/v3/channels?part=brandingSettings&id=".$channel."&fields=items/brandingSettings/channel/title,items/brandingSettings/image/bannerImageUrl&key=".$this->key);
        $subs = json_decode($subCount, true);

        return $subs;
    }

    public function subscriberCount($channel)
    {

        // KommunityKOD: UCE01eBjyan-46rUQ97bBddw
//        $channel = "UC-lHJZR3Gqxm24_Vd_AJ5Yw";

        $subCount = file_get_contents("https://www.googleapis.com/youtube/v3/channels?part=statistics&id=".$channel."&fields=items/statistics/subscriberCount&key=".$this->key);
        $subs = json_decode($subCount, true);

        $subscriber = (int)$subs['items'][0]['statistics']['subscriberCount'];

        return $subscriber;
    }

    public function index($channel)
    {
        return view('youtube.live',compact('channel'));
    }

    public function indexThemed($channel)
    {
        $channelData = $this->getChannelData($channel);
        $title = $channelData['items'][0]['brandingSettings']['channel']['title'];
        $banner = $channelData['items'][0]['brandingSettings']['image']['bannerImageUrl'];
        return view('youtube.livethemed',compact('channel','banner','title'));
    }
}
