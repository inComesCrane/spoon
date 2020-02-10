<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function allProducts()
    {
        $products = Product::all();

        return view('products')
            ->with('products', $products);
    }

    public function showProduct($productSlug)
    {
        $product = Product::with(['options'])
            ->where('slug', $productSlug)->first();

        if (!$product) {
            abort(404);
        }

        return view('product')
            ->with('product', $product);
    }
}