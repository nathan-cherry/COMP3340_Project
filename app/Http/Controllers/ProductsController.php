<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
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
            'image' => 'image|nullable|max:1999'
        ]);

        // Handle File Upload
        if($request->hasFile('image')){
            // Get just filename
            $filenameWithExtension = $request->file('image')->getClientOriginalName();
            // Just filename
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('image')->getClientOriginalExtension();

            // To store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload
            $path = $request->file('image')->storeAs('public/product_images', $fileNameToStore);
        }else {
            $fileNameToStore = 'noimage.jpg';
        }
        // Create Product
        $product = new Product;
        $product->name = $request->input('name');
        $product->type = $request->input('type');
        $product->price = $request->input('price');
        $product->state = $request->input('state');
        $product->stock = $request->input('stock');
        $product->image_path = $fileNameToStore;
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
            'image' => 'image|nullable|max:1999'
        ]);

        // Handle File Upload
        if($request->hasFile('image')){
            // Get just filename
            $filenameWithExtension = $request->file('image')->getClientOriginalName();
            // Just filename
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('image')->getClientOriginalExtension();

            // To store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload
            $path = $request->file('image')->storeAs('public/product_images', $fileNameToStore);
        }

        // Create Product
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->type = $request->input('type');
        $product->price = $request->input('price');
        $product->state = $request->input('state');
        $product->stock = $request->input('stock');
        if($request->hasFile('image')){
            $product->image_path = $fileNameToStore;
        }
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
        if(!auth()->user()->isAdmin){
            return redirect('/products')->with('error', 'Unauthorized Request');
        }
        $product = Product::find($id);
        if($product->image_path != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/product_images/'.$product->image_path);
        }
        $product->delete();
        return redirect('/products')->with('success', 'Deleted Product');
    }
}
