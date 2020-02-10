<?php
/**
 * Created by PhpStorm.
 * User: inComesCrane
 * Date: 2/10/2020
 * Time: 6:56 AM
 */

namespace App\Http\Controllers;


use App\Category;

class CategoryController extends Controller
{

    public function show($categorySlug)
    {
        $category = Category::with(['products'])
            ->where('slug', $categorySlug)
            ->first();

        return view('products')
            ->with('category', $category)
            ->with('products', $category->products);
    }
}