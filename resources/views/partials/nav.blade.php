<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ route('welcome') }}">{{ config('app.name') }}</a>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ setActive('/') }}">
                <a class="nav-link" href="{{ route('welcome') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ setActive('about') }}">
                <a class="nav-link" href="{{ route('about') }}">About</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Portfolio</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    {{--<a class="dropdown-item" href="{{ route('gallery.web') }}">Web Development</a>--}}
                    <a class="dropdown-item" href="{{ route('gallery.graphics') }}">Graphics Design</a>
                </div>
            </li>
        </ul>
    </div>
</nav>