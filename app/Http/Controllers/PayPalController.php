<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPalController extends Controller
{
    /**
     * Responds with a welcome message with instructions
     *
     * @param ExpressCheckout $provider
     * @return RedirectResponse|Redirector
     * @throws Exception
     */
    public function payment(ExpressCheckout $provider)
    {
        $orderData = [];
        $orderData['items'] = [
            [
                'name' => 'ItSolutionStuff.com',
                'price' => 100,
                'desc' => 'Description for ItSolutionStuff.com',
                'qty' => 1
            ],
            [
                'name' => 'ItSolutionStuff.com',
                'price' => 10,
                'desc' => 'Description for asdfgh.com',
                'qty' => 2
            ]
        ];

        $orderData['invoice_id'] = 2;
        $orderData['invoice_description'] = "Order #{$orderData['invoice_id']} Invoice";
        $orderData['return_url'] = route('payment.success');
        $orderData['cancel_url'] = route('payment.cancel');
        $orderData['total'] = 120;

        $response = $provider->setExpressCheckout($orderData);

        return redirect($response['paypal_link']);
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return Response
     */
    public function cancel()
    {
        dd('Your payment is canceled. You can create cancel page here.');
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @param Request $request
     * @param ExpressCheckout $provider
     * @return void
     * @throws Exception
     */
    public function success(Request $request, ExpressCheckout $provider)
    {
        $response = $provider->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            return view('welcome');
            dd('Your payment was successful. You can create success page here.');
        }

        dd('Something is wrong.');
    }
}