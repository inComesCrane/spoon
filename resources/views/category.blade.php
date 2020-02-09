
@extends('layout')
@section('css')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/products.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo:400,400i,700,700i&display=swap" rel="stylesheet">
@endsection

@section('content')
    <main>
        <div class="hero mb-5">
            CATEGORY HERO
        </div>
        <div class="container">
            <div class="card-deck">
                <div class="col-sm-12 col-md-6 product">
                    <div class="inner">
                        <div class="img">
                            <img src="/img/bagels.jpg" style="max-width:100%; max-height: 100%;">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 product">
                    <div class="inner">
                        <div class="img">
                            <img src="/img/belgian_waffles2.jpg" style="max-width:100%; max-height: 100%;">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 product">
                    <div class="inner">
                        <div class="img">
                            <img src="/img/grilled_cheese.jpg" style="max-width:100%; max-height: 100%;">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 product">
                    <div class="inner">
                        <div class="img">
                            <img src="/img/waffles.jpg" style="max-width:100%; max-height: 100%;">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 product">
                    <div class="inner">
                        <div class="img">
                            <img src="/img/grilled_cheese.jpg" style="max-width:100%; max-height: 100%;">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 product">
                    <div class="inner">
                        <div class="img">
                            <img src="/img/waffles.jpg" style="max-width:100%; max-height: 100%;">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 product">
                    <div class="inner">
                        <div class="img">
                            <img src="/img/grilled_cheese.jpg" style="max-width:100%; max-height: 100%;">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 product">
                    <div class="inner">
                        <div class="img">
                            <img src="/img/waffles.jpg" style="max-width:100%; max-height: 100%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection