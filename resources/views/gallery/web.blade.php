@extends('layouts.app')
@section('pageTitle','Web Development')
@section('extra_styles')
    <style>
        .album {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        .card {
            float: left;
            width: 33.333%;
            padding: .75rem;
            margin-bottom: 2rem;
            border: 0;
        }

        .card > img {
            margin-bottom: .75rem;
        }

        .card-text {
            font-size: 85%;
        }
    </style>
@endsection
@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Gallery</h1>
            <p>Web Development</p>
        </div>
    </div>
    <div class="album text-muted">
        <div class="container">
            <div class="row">
                <div class="card">
                    <img data-src="holder.js/100px280/thumb" alt="Card image cap">
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="card">
                    <img data-src="holder.js/100px280/thumb" alt="Card image cap">
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="card">
                    <img data-src="holder.js/100px280/thumb" alt="Card image cap">
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('extra_scripts')
    <script>
        $('.carousel').carousel({
            interval: 4000
        })
    </script>
@endsection