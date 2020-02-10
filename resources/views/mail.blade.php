<html>
<body>
<main style="background-color: #d79033;">
    <div class="col-12 text-center">
        <h1>
            Your food is on its way!
        </h1>
        <span><i>Please find enclosed a copy of your receipt:</i> </span>
    </div>
    <div style="margin-top: 30px;">
        <strong style="font-size: 1.25rem;"> Items </strong>
        <ul style="list-style-type: none;">
            @php $cart = \Cart::session(1)->getContent(); @endphp
            @foreach($cart as $item)
                <li style="padding: 10px 20px; margin-bottom: 10px; border-bottom: 1px solid #312e2c20;">
                    {{ $item->name }} {{ (!empty($item->attributes->first()) ? ' - ' . $item->attributes->first() : '') }} &#215; {{ $item->quantity }}
                    <span style="float: right;"> ${{ $item->getPriceSum() }} </span>
                </li>
            @endforeach
            <li style="padding: 10px 20px;">
                <span style="float:right;">
                    Subtotal: <strong> ${{ \Cart::getSubTotal() }} </strong>
                </span>
            </li>
            <li style="padding: 10px 20px;">
                <span style="float:right;">
                    Delivery: <strong> $2.50 </strong>
                </span>
            </li>
            <li style="padding: 10px 20px;">
                <span style="float:right;">
                    Total: <strong> $ {{ 2.50 + \Cart::getSubTotal() }} </strong>
                </span>
            </li>
        </ul>
    </div>
</main>
</body>
</html>

