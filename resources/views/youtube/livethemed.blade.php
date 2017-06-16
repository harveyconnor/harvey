<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Oswald:500" rel="stylesheet">

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            background-color: #000;
        }
        h1 {
            font-size: 3em;
            color: white;
            text-align: center;
            text-shadow: 3px 2px black;
            font-weight: bold;
            margin-bottom: 2px;
        }
        p {
            color: white;
            text-align: center;
            text-shadow: 3px 2px black;
            font-weight: bold;
            margin-top: 2px;
        }
        #subscribers {
            width: 100%;
            text-align: center;
            float: left;
            height: auto;
            background: url("{!! $banner !!}");
            background-size: contain;
            background-repeat: no-repeat;
            padding: 20px;
        }
    </style>
</head>
<body>
<div id="app">
    <div id="subscribers">
        <h1>Live Subscriber Count</h1>
        <p>{!! $title !!}</p>
        <youtube-live-subscribers channel="{!! $channel !!}"></youtube-live-subscribers>
    </div>
</div>
</body>
<script src="{{ asset('/js/app.js') }}"></script>
</html>
