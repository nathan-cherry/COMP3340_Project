<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Cart;

class CartController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // redirect to home page
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createOrder($id)
    {
        $product = Product::find($id);
        return view('cart.create')->with('product', $product);
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
            'quantity' => 'required',
        ]);
        // Create Product
        $order = new Cart;
        $order->user_id = auth()->user()->id;
        $order->product_id = $request->input('prod_id');
        $order->quantity = $request->input('quantity');
        $order->save();
        $location = sprintf('/cart/%d', auth()->user()->id);
        return redirect($location)->with('success', 'Product Ordered');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart = Cart::where('user_id', $id)->get();
        $data = array(
            'cart' => $cart,
            'id' => $id,
        );

        if(auth()->user()->isAdmin or auth()->user()->id == $id){
            return view('cart.show')->with($data);
        } else {
            return redirect('/products')->with('error', 'Unauthorized request');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Cart::find($id);
        if(auth()->user()->isAdmin or auth()->user()->id == $order->user->id){
            return view('cart.edit')->with('order', $order);
        } else {
            return redirect('/products')->with('error', 'Unauthorized request');
        }
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
            'quantity' => 'required',
        ]);
        // Update Record
        $order = Cart::find($id);
        $order->quantity = $request->input('quantity');
        $order->save();

        $location = sprintf('/cart/%d', auth()->user()->id);
        return redirect($location)->with('success', 'Order Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Cart::find($id);
        $order->delete();
        $location = sprintf('/cart/%d', auth()->user()->id);
        return redirect($location)->with('success', 'Deleted Order');
    }
}
