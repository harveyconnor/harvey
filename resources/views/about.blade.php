@extends('layouts.app')
@section('pageTitle','About')
@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">About Me</h1>
        </div>
    </div>
    <div class="text-muted">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        Add a fulfilling description about myself here..
                    </p>
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