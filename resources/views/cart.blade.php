
@extends('layout')
@section('css')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cart.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo:400,400i,700,700i&display=swap" rel="stylesheet">
@endsection

@section('content')
    <main>
        <div class="hero mb-5" style="height: 180px; padding: 24px;">
            CART
        </div>
        <div class="container pb-5">
            <div class="row">
                <div class="col-5">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="ex. John">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" id="lastName" placeholder="ex. Cena">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="example@email.com">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address 2</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div>
                        </div>
                        <div id="paypal-button-container"></div>
                    </form>
                </div>
                <div class="col-7" style="border-left: 1px solid #312e2c50;">
                    <div style="margin-left: 40px;">
                        <strong style="font-size: 2rem;"> Items </strong>
                        <ul style="list-style-type: none;">
                            @foreach($cart as $item)
                                <li style="padding: 10px 20px; margin-bottom: 10px; border-bottom: 1px solid #312e2c20;">
                                    <a href="{{ url('products/' . $item->associatedModel->slug) }}" style="text-decoration: none;">
                                        {{ $item->name }} {{ (!empty($item->attributes->first()) ? ' - ' . $item->attributes->first() : '') }}
                                    </a> &#215; {{ $item->quantity }}
                                    <span style="float: right;"> ${{ number_format($item->getPriceSum(), 2) }} </span>
                                </li>
                            @endforeach
                            <li style="padding: 10px 20px; margin-bottom: 10px;">
                                <span style="float:right;">
                                    Subtotal: <strong> ${{ number_format(\Cart::getSubTotal(), 2) }} </strong>
                                </span>
                            </li>
                            <li style="padding: 10px 20px; margin-bottom: 10px;">
                                <span style="float:right;">
                                    Delivery (Flat Rate): <strong> $2.50 </strong>
                                </span>
                            </li>
                            <li style="padding: 10px 20px; margin-bottom: 10px;">
                                <span style="float:right;">
                                    Total: <strong> ${{ number_format(2.50 + \Cart::getSubTotal(), 2) }} </strong>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('footer')
    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD" data-sdk-integration-source="button-factory"></script>
    <script>
        var products = @php echo json_encode($cart); @endphp;
        function generateOrderKey(length) {
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        }

        paypal.Buttons({
            style: {
                shape: 'rect',
                color: 'blue',
                layout: 'horizontal',
                label: 'paypal'
            },
            createOrder: function(data, actions) {
                // Save sent data on our server

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/create-pending-order",
                    type: "post",
                    data: {
                        order_key: generateOrderKey(20),
                        firstName: document.getElementById('firstName').value,
                        lastName: document.getElementById('lastName').value,
                        email: document.getElementById('email').value,
                        address1: document.getElementById('address_1').value,
                        address2: document.getElementById('address_2').value,
                        city: document.getElementById('city').value,
                        zip: document.getElementById('zip').value,
                    },
                });
                // This function sets up the details of the transaction, including the amount and line item details.
                return actions.order.create({
                    application_context: {
                        "shipping_preference": "NO_SHIPPING"
                    },
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function (details) {

                    //redirect to report page
                    setTimeout(function () {
                        window.location.href = '/thank-you';
                    }, 3000);
                });
            }
        }).render('#paypal-button-container');
    </script>
@endsection