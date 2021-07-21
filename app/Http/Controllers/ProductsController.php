<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $products = Product::orderBy('name', 'asc')->get();
        $products = Product::orderBy('name', 'asc')->paginate(9);
//        $data = array(
//            'products' => $products,
//            'sub-heading' => "NIMSE makes it our mission to provide a variety of products so that there will always be something for everyone.",
//        );
        return view('products.index')->with('products', $products);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function men()
    {
        $products = Product::where('type', 'men')->paginate(12);
        return view('products.index')->with('products', $products);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function women()
    {
        $products = Product::where('type', 'women')->paginate(12);
        return view('products.index')->with('products', $products);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kids()
    {
        $products = Product::where('type', 'kids')->get();
        return view('products.index')->with('products', $products);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
            'price' => 'required',
            'state' => 'required',
            'stock' => 'required',
        ]);
        // Create Product
        $product = new Product;
        $product->name = $request->input('name');
        $product->type = $request->input('type');
        $product->price = $request->input('price');
        $product->state = $request->input('state');
        $product->stock = $request->input('stock');
        $product->save();
        return redirect('/products')->with('success', 'Product Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
            'price' => 'required',
            'state' => 'required',
            'stock' => 'required',
        ]);
        // Create Product
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->type = $request->input('type');
        $product->price = $request->input('price');
        $product->state = $request->input('state');
        $product->stock = $request->input('stock');
        $product->save();
        return redirect('/products')->with('success', 'Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/products')->with('success', 'Deleted Product');
    }
}
