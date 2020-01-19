
@extends('layout')
@section('css')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo:400,400i,700,700i&display=swap" rel="stylesheet">
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
            <h1 id="mood"> What are you in the mood for? </h1>
            <div>
                <a href="#mood">
                    <i class="gg-push-chevron-down-o" style="margin: auto"></i>
                </a>
            </div>
            <div class="row justify-content-around mt-5 mb-5">
                <div class="col-sm-12 col-md-3 type">
                    <img src="/img/breakfast2.svg" style="height: 64px;"><br/>
                    Some <br> Breakfast
                </div>
                <div class="col-sm-12 col-md-3 type">
                    <img src="/img/lunch2.svg" style="height: 72px;"><br/>
                    Some <br> Lunch
                </div>
                <div class="col-sm-12 col-md-3 type">
                    <img src="/img/snakc.svg" style="height: 64px;"><br/>
                    Some <br> Snacks
                </div>
            </div>
            <h2> Or maybe- </h2>
            <div class="row justify-content-around mt-5 mb-5">
                <div class="col-sm-12 col-md-5 type">
                    Something <span> salty </span>
                </div>
                <div class="col-sm-12 col-md-5 type">
                    Something <span> sweet </span>
                </div>
            </div>
        </div>
        <div style="height: 700px; background-color: mintcream">

        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('a[href^="#"]').click(function(e) {
                e.preventDefault();
                anchorScroll( $(this), $($(this).attr("href")), 300);
            });
        });

        function anchorScroll(this_obj, that_obj, base_speed) {
            var this_offset = this_obj.offset();
            var that_offset = that_obj.offset();
            var offset_diff = Math.abs(that_offset.top - this_offset.top);

            var speed = (offset_diff * base_speed) / 1000;

            $("html,body").animate({
                scrollTop: that_offset.top - 95
            }, speed);
        }
    </script>
@endsection