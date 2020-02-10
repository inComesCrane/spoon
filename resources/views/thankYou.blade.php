
@extends('layout')
@section('css')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/product.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo:400,400i,700,700i&display=swap" rel="stylesheet">
@endsection

@section('content')
    <main>
        <div class="container py-5" style="min-height: 717px;">
            <div class="row">
                <div class="col-12 text-center">
                    <span class="text-uppercase" style="font-size: 8rem;"> Thank You </span>
                    <br/> <span class="text-uppercase" style="font-size: 3rem; font-weight: 300;"> for your order </span>
                </div>
                <div class="col-12 text-center mt-5">
                    <span style="font-size: 1rem; font-weight: 300;">
                        <i> A copy of the receipt has been sent to your email address </i>
                    </span>
                </div>
            </div>
        </div>
    </main>
@endsection