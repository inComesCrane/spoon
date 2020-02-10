
@extends('layout')
@section('css')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/products.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo:400,400i,700,700i&display=swap" rel="stylesheet">
@endsection

@section('content')
    <main>
        <div class="hero mb-5">
            {{ isset($category) ? $category->name : 'ALL PRODUCTS' }}
        </div>
        <div class="container" style="min-height: 419px;">
            @if ($products->count() > 0)
                <div class="card-deck">
                    @foreach($products as $product)
                        <div class="col-sm-12 col-md-6 product">
                            <a href="/products/{{ $product->slug }}/" style="text-decoration: none;">
                                <div class="inner">
                                    <div class="img" style="background-position: center center; background-repeat: no-repeat; background-size: 155%; background-image: url('/img/{{ $product->image }}')">
                                    </div>
                                    <div style="padding: 10px 20px;">
                                        <span style="font-size: 2rem;"> {{ $product->name }} </span>
                                        <div class="mt-2">
                                            <i> {{ $product->description }} </i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center mt-5">
                    <span style="font-size: 2rem;"> There are no <strong>{{ strtolower($category->name) }}</strong> products currently available. </span>
                </div>
            @endif
        </div>
    </main>
@endsection