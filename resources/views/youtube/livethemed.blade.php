<!DOCTYPE html>
<html lang="en">
<head>
    <!--Meta-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--Title-->
    <title>Live Subscriber Count</title>
    <!--CSS-->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" id="color-switcher">
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}" id="color-switcher">
    <!--Favicon-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Raleway|Righteous" rel="stylesheet">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<!--Hero-->
<div id="app">
    <div class="hero" id="particles-js">
        <div class="centered">
            <img class="img-responsive" src="{!! $banner !!}" alt="Live">
            <h2 class="heading">{{ $title }}</h2>
            <youtube-live-subscribers-theme channel="{!! $channel !!}"></youtube-live-subscribers-theme>
            <div class="buttons">
                <a id="subscribe-button" target="_blank" href="{{ url('http://www.youtube.com/channel/'.$channel) }}" class="button btn-round btn-ghost">View Channel</a>
            </div>
        </div>
        <div class="social-text">
            <a target="_blank" href="{{ url('http://www.twitter.com/Harvs_97') }}"><i class="fa fa-twitter"></i> Twitter</a>
            <a target="_blank" href="{{ url('http://www.youtube.com/user/KommunityKOD') }}"><i class="fa fa-youtube-play"></i> YouTube</a>
        </div>
    </div>
</div>
<!--Scripts-->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.mCustomScrollbar.min.js') }}"></script>
</body>
</html>