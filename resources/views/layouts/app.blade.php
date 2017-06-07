<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
@include('partials.header')
<body>
@include('partials.nav')
<div id="app">
    @yield('content')
</div>
@include('partials.footer')
@include('partials.scripts')
@yield('extra_scripts')
</body>
</html>
