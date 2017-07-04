<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TwitchController extends Controller
{

    private $client_id = "89o520tvqjj1rgeqcad2zhnzbnrxln";
    private $channel = "harvs_97";

    protected function getTwitch()
    {

        $twitch = file_get_contents("https://api.twitch.tv/kraken/channels/".$this->channel."?client_id=".$this->client_id);
        $twitch = json_decode($twitch, true);

//        $subscriber = (int)$subs['items'][0]['statistics']['subscriberCount'];

        $followerCount = $twitch['followers'];
        return $twitch;
    }

    public function getFollowers() {
        return $this->getTwitch()['followers'];
    }

    public function showLiveFollowers() {
        return view('twitch.live');
    }
}
