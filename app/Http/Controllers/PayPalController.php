<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use App\User;
use App\UserInfo;
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
        $orderData['items'] = [];

        $cart = \Cart::session(1)->getContent();
        foreach ($cart as $item) {
            $orderData['items'][] = [
                'name' => $item->name,
                'price' => $item->price,
                'desc' => $item->associatedModel->description,
                'qty' => $item->quantity
            ];
        }

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

            // Create the Transport
            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
                ->setUsername(config('mail.swiftmailer.username'))
                ->setPassword(config('mail.swiftmailer.password'));

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);
            $body = view('mail')->render();

            // Create a message
            $message = (new Swift_Message('Slice Order Receipt - ' . date('M d Y, g:h')))
                ->setFrom(['sara.tanku@gmail.com' => 'Slice Inc.'])
                ->setTo(['sara.tanku@gmail.com'])
                ->setBody($body)
                ->setContentType('text/html');

            // Send the message
            $mailer->send($message);

            // Empty the cart
            \Cart::session(1)->clear();

            return view('thankYou');
        }

        dd('Something is wrong.');
    }

    public function createOrder(Request $request)
    {
        $user = new User();
        $user->fill([
            'name' => $request->input('firstName') . ' ' . $request->input('lastName'),
            'email' => $request->input('email')
        ])->save();

        $userInfo = new UserInfo();
        $userInfo->fill([
            'user_id' => $user->id,
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'city' => $request->input('city'),
            'zip' => $request->input('zip'),
            'address_1' => $request->input('address_1'),
            'address_2' => $request->input('address_2'),
        ])->save();

        $order = new Order;
        $order->fill([
            'user_id' => $user->id,
            'complete' => 'true'
        ])->save();

        $items = \Cart::session(1)->getContent();
        foreach ($items as $item) {
            $op = new OrderProduct();
            $op->fill([
                'order_id' => $order->id,
                'product_id' => $item->associatedModel->id,
                'amount' => $item->quantity
            ])->save();
        }
    }
}