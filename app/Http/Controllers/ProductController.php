<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $products = Products::all();

        return view('product.index', compact('products'))->with([
            'i', (request()->input('page', 1) - 1) * 10,
            'user' => Auth::user()
        ]);
    }

    public function create()
    {
        $user = Auth::user();

        return view('product.create')->with([
            'user' => Auth::user()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif,svg|max:2048'
        ]);

        // $input = $request->all();
        // if ($image = $request->file('image')) {
        //     $destinationPath = 'back-end/img/products/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $input['image'] = "profileImage";
        // }

        // Product::create($input);

        $image = $request->image;
        $slug = Str::slug($image->getClientOriginalExtension());
        $new_image = time() . '_' . $slug;
        $image->move('back-end/img/products/', $new_image);

        $produk = new Products();
        $produk->name = $request->name;
        $produk->detail = $request->detail;
        $produk->image = 'back-end/img/products/' . $new_image;
        $produk->save();


        // $imageName = time() . '.' . $request->image->extension();
        // $uploudedImage = $request->image->move(public_path('back-end/img/products/'), $imageName);
        // $imagePath = 'back-end/img/products/' . $imageName;
        // $params = $request->validate();
        // if ($product = Product::create($params)) {
        //     $product->image = $imagePath;
        //     $product->save();
        // }
        return redirect()->route('produk')->with('sucsess', 'Product has been adds!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Products $product)
    {
        // return view('product.show', compact($product));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        //
    }
}
