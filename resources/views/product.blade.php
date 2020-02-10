
@extends('layout')
@section('css')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/product.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo:400,400i,700,700i&display=swap" rel="stylesheet">
@endsection

@section('content')
    <main>
        <div class="hero mb-5">
            {{ $product->name }}
        </div>
        <div class="container pb-5" style="max-width: 1200px;">
            <div class="row">
                <div class="col-4">
                    <div class="mt-4" style="width: 100%; height: 100%;">
                        <div class="img" style="height: 100%; width: 100%; background-position: center center; background-repeat: no-repeat; background-size: 155%; background-image: url('/img/{{ $product->image }}')">
                        </div>
                    </div>
                </div>
                <div class="col-8" style="padding-left: 30px;">
                    <div class="mt-4">
                        <span style="font-size: 3.8rem;"> {{ $product->name }} </span>
                        <br/> <span style="font-size: 3.4rem;"> ${{ $product->price - 0.01 }} </span>
                        <br/> <span> <i> {{ $product->description }} </i>  </span>
                    </div>
                    <div class="mt-5">
                        @if ($product->options->count() > 0)
                            <div>
                                <label for="options"> What type of {{ $product->name }} do you want? </label>
                                <select id="options">
                                    <option value=""> Select an option </option>
                                    @foreach($product->options as $option)
                                        <option value="{{ strtolower($option->name) }}"> {{ $option->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        <div class="number-spinner" style="width: 460px;">
                            <strong> Quantity </strong> <br/>
                            <input type="text" class="text-center" value="1" style="background-color: transparent; border-radius: 4px; border: 1px solid #312e2c; padding: 5px; width: 75%;">
                            <span class="btn btn-default" data-dir="dwn" style="margin-top: 4px;">
                                <i class="material-icons">remove_circle_outline</i>
                            </span>
                            <span class="btn btn-default" data-dir="up" style="margin-top: 4px;">
                                <i class="material-icons">add_circle_outline</i>
                            </span>
                        </div>
                        <div class="btn text-uppercase" id="toCart"
                             style="background-color: #312e2c; color: #f7f7f7; width: 460px; height: 60px; border-radius: 3px; font-family: 'Bebas Neue', cursive; font-size: 34px;">
                            Add to cart
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('footer')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        $('#toCart').on('click', function() {

            var options = [];
            if ($('#options').length) {
                if ($('#options').find(":selected").text() !== 'Select an option') {
                    options = $('#options').find(":selected").text();
                }
            }

            $.ajax({
                type: 'POST',
                url: '/add-to-cart',
                data: {
                    slug: "{{ $product->slug }}",
                    id: "{{ $product->id }}",
                    quantity: $('.number-spinner input').val(),
                    options: options
                },
                success:function(data) {
                    console.log(data);
                }
            });
        });
    </script>
    <script>
        $(document).on('click', '.number-spinner span', function () {
            var btn = $(this),
                oldValue = btn.closest('.number-spinner').find('input').val().trim(),
                newVal = 0;

            if (btn.attr('data-dir') == 'up') {
                newVal = parseInt(oldValue) + 1;
            } else {
                if (oldValue > 1) {
                    newVal = parseInt(oldValue) - 1;
                } else {
                    newVal = 1;
                }
            }
            btn.closest('.number-spinner').find('input').val(newVal);
        });
    </script>
@endsection