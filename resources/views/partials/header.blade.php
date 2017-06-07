<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('pageTitle') - {{ config('app.name') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,600" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="{{ asset('/img/favicon.png') }}" />
    <link href="{{ asset('/css/app.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" type="text/css" rel="stylesheet">
    @yield('extra_styles')

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>