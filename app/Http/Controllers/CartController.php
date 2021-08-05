<?php

namespace App\Http\Controllers;

use App\Product;
use App\Theme;
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
        // redirect to home page (do not want an index page visible for carts)
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Redirect to home page (do not want a default create link)
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createOrder($id)
    {
        // Get the product associated to the order
        $product = Product::find($id);
        // Pass theme and product
        $data = array(
            'product' => $product,
            'theme' => Theme::orderBy('created_at', 'desc')->first(),
        );
        // Return the create order view
        return view('cart.create')->with($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate form
        $this->validate($request, [
            'quantity' => 'required',
        ]);
        // Create Order
        $order = new Cart;
        // Get auth user to add to cart
        $order->user_id = auth()->user()->id;
        // set product and quantity
        $order->product_id = $request->input('prod_id');
        $order->quantity = $request->input('quantity');
        // Save order to db
        $order->save();
        // Create path for auth user's shopping cart
        $location = sprintf('/cart/%d', auth()->user()->id);
        // Redirect to user's shopping cart
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
        // Get shopping cart for user's id
        $cart = Cart::where('user_id', $id)->get();
        // Pass cart, id, and theme
        $data = array(
            'cart' => $cart,
            'id' => $id,
            'theme' => Theme::orderBy('created_at', 'desc')->first(),
        );

        // If the user is an admin or it is their shopping cart
        if(auth()->user()->isAdmin or auth()->user()->id == $id){
            // Return shopping cart view
            return view('cart.show')->with($data);
        } else {
            // Return to products page with error message
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
        // Get order
        $order = Cart::find($id);
        // Pass order and theme
        $data = array(
            'order' => $order,
            'theme' => Theme::orderBy('created_at', 'desc')->first(),
        );
        // If the user is an admin or it is their shopping cart
        if(auth()->user()->isAdmin or auth()->user()->id == $order->user->id){
            // Return order edit page
            return view('cart.edit')->with($data);
        } else {
            // Return to products page with error message
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
        // Validate form
        $this->validate($request, [
            'quantity' => 'required',
        ]);
        // Get order
        $order = Cart::find($id);
        // Set quantity
        $order->quantity = $request->input('quantity');
        // Save Order
        $order->save();

        // Redirect to Cart
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
        // Get order
        $order = Cart::find($id);
        // Delete order
        $order->delete();
        // Redirect to the cart
        $location = sprintf('/cart/%d', auth()->user()->id);
        return redirect($location)->with('success', 'Deleted Order');
    }
}
