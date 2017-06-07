@extends('layouts.app')
@section('pageTitle','Graphics Design')
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
            width: 100%;
            height: auto;
            transition: 0.3s;
            cursor: pointer;
        }
        .card > img:hover {
            opacity: 0.7;
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
            <p>Graphics Design</p>
        </div>
    </div>
    <div class="album text-muted">
        <div class="container">
            <div class="row">
                <gallery-graphics></gallery-graphics>
            </div>

        </div>
    </div>
@endsection
@section('extra_scripts')

@endsection