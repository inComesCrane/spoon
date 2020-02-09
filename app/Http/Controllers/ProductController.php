<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);

        return view('products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required|min:10|max:200',
            'image' => 'required'
        ], [
            'name.required' => ' Emri nuk duhet te jete bosh',

            'description.required' => 'Pershkrimi nuk duhet te jete bosh',
            'image.required' => 'Duhet te ngarkoni nje imazh'
        ]);

        $file = $request->file('image');

        $name =$file->getClientOriginalName();

        $file->move(public_path('images', $name));
        Product::create($request->all());

        return Redirect::to('products')
            ->with('success', 'Produkti u shtua me sukses');
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {


            $this->validate($request, [
                'name' => 'required',
                'description' => 'required|min:10|max:200',
                'image' => 'required'
            ], array(
                'name.required' => ' Emri nuk duhet te jete bosh',

                'description.required' => 'Pershkrimi nuk duhet te jete bosh',
                'image.required' => 'Duhet te ngarkoni nje imazh',
            ));
        $image = $request->file('image');
        if($image !=' ') {
            $name = $image->getClientOriginalName();

            $image->move(public_path() . '/images/', $name);
        }
        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Produkti u modifikua');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Produkti u fshi ');
    }
}