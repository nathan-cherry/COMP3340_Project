<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use App\Theme;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Must be authenticated to be on any admin page
        $this->middleware('auth', ['except' => []]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->isAdmin) {
            return redirect('/')->with('error', 'Unauthorized User');
        } else {
            $data = array(
                'orders' => Cart::orderBy('created_at', 'asc')->take(5)->get(),
                'products' => Product::orderBy('id', 'asc')->take(5)->get(),
                'users' => User::orderBy('id', 'asc')->take(5)->get(),
                'theme' => Theme::orderBy('created_at', 'desc')->first(),
            );
            return view('admin.index')->with($data);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showOrders()
    {
        if (!auth()->user()->isAdmin) {
            return redirect('/')->with('error', 'Unauthorized User');
        } else {
            $data = array(
                'orders' => Cart::orderBy('created_at', 'asc')->paginate(10),
                'theme' => Theme::orderBy('created_at', 'desc')->first(),
            );
            return view('admin.orders')->with($data);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProducts()
    {
        if (!auth()->user()->isAdmin) {
            return redirect('/')->with('error', 'Unauthorized User');
        } else {
            $data = array(
                'products' => Product::orderBy('id', 'asc')->paginate(10),
                'theme' => Theme::orderBy('created_at', 'desc')->first(),
            );
            return view('admin.products')->with($data);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUsers()
    {
        if (!auth()->user()->isAdmin) {
            return redirect('/')->with('error', 'Unauthorized User');
        } else {
            $data = array(
                'users' => User::orderBy('id', 'asc')->paginate(10),
                'theme' => Theme::orderBy('created_at', 'desc')->first(),
            );
            return view('admin.users')->with($data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function editUser($id)
    {
        if (!auth()->user()->isAdmin) {
            return redirect('/')->with('error', 'Unauthorized User');
        } else {
            $user = User::find($id);
            $data = array(
                'user' => $user,
                'theme' => Theme::orderBy('created_at', 'desc')->first(),
            );
            return view('admin.userEdit')->with($data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request, $id)
    {
        if (!auth()->user()->isAdmin) {
            return redirect('/')->with('error', 'Unauthorized User');
        } else {
            $this->validate($request, [
                'name' => 'required|min:4|string|max:255',
                'email' => 'required|email|string|max:255'
            ]);
            // Update User
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->isAdmin = $request->input('isAdmin');
            $user->save();
            return redirect('/admin/users')->with('success', 'User Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroyUser($id)
    {
        if (!auth()->user()->isAdmin) {
            return redirect('/')->with('error', 'Unauthorized User');
        } else {
            $user = User::find($id);
            $user->delete();
            return redirect('/admin/users')->with('success', 'User Deleted');
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeTheme()
    {
        if (!auth()->user()->isAdmin) {
            return redirect('/')->with('error', 'Unauthorized User');
        } else {
            $data = array(
                'theme' => Theme::orderBy('created_at', 'desc')->first(),
            );
            return view('admin.theme')->with($data);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTheme(Request $request)
    {
        if (!auth()->user()->isAdmin) {
            return redirect('/')->with('error', 'Unauthorized User');
        } else {
            $this->validate($request, [
                'type' => 'required',
            ]);

            // Create Product
            $theme = new Theme;
            $theme->type = $request->input('type');
            $theme->save();
            return redirect('/admin')->with('success', 'Theme Changed');
        }
    }
}
