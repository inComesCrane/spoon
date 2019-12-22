
@extends('layout')
@section('css')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
    <main>
        <div class="biggy">
            <div class="gradient">&nbsp;</div>
            <div class="description">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eleifend quam nec lorem eleifend pellentesque.
                Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque
                tincidunt, diam eu lacinia efficitur, eros nunc pulvinar justo, sed placerat nibh nibh sit amet enim.
                Phasellus in metus nec tortor consequat lobortis. Integer blandit nulla non ante sollicitudin, id
                condimentum risus pulvinar.
            </div>
        </div>
        <div class="container">
            <h1> What are you in the mood for? </h1>
            <div>
                <i class="gg-push-chevron-down-o" style="margin: auto"></i>
            </div>
            <div class="row justify-content-around mt-5 mb-5">
                <div class="col-sm-12 col-md-5 type">
                    Something salty
                </div>
                <div class="col-sm-12 col-md-5 type">
                    Something sweet
                </div>
            </div>
        </div>
        <div style="height: 700px; background-color: mintcream">

        </div>
    </main>
@endsection