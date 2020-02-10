<?php
/**
 * Created by PhpStorm.
 * User: inComesCrane
 * Date: 2/10/2020
 * Time: 4:10 AM
 */

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $product = Product::where('id', $request->input('id'))->first();
        $options = $request->input('options');

        if (!isset($options[1]) || $options[1] == 'none') {
            $options = [];
        }

        $userID = 1; // the user ID to bind the cart contents

        $cartData = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->input('quantity'),
            'attributes' => $options,
            'associatedModel' => $product
        ];

        \Cart::session($userID)->add($cartData);

        return $cartData;
    }

    public function show()
    {
        return view('cart')->with('cart', \Cart::session(1)->getContent());
    }
}