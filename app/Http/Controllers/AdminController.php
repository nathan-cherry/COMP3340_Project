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
        // Test if authenticated user is an admin
        if (!auth()->user()->isAdmin) {
            // Not authorized redirect to home page with error message
            return redirect('/')->with('error', 'Unauthorized User');
        } else {
            // Get the first 5 records or all records and the most recent theme
            $data = array(
                'orders' => Cart::orderBy('created_at', 'asc')->take(5)->get(),
                'products' => Product::orderBy('id', 'asc')->take(5)->get(),
                'users' => User::orderBy('id', 'asc')->take(5)->get(),
                'theme' => Theme::orderBy('created_at', 'desc')->first(),
            );
            // Return Admin Panel View
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
        // Test if authenticated user is an admin
        if (!auth()->user()->isAdmin) {
            // Not authorized redirect to home page with error message
            return redirect('/')->with('error', 'Unauthorized User');
        } else {
            // Get theme and all orders ordered in ascending order based on created date, paginating at a limit of 10
            // per page
            $data = array(
                'orders' => Cart::orderBy('created_at', 'asc')->paginate(10),
                'theme' => Theme::orderBy('created_at', 'desc')->first(),
            );
            // Return Admin Orders Page
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
        // Test if authenticated user is an admin
        if (!auth()->user()->isAdmin) {
            // Not authorized redirect to home page with error message
            return redirect('/')->with('error', 'Unauthorized User');
        } else {
            // Get theme and all products ordered in ascending order based on id, paginating at a limit of 10
            // per page
            $data = array(
                'products' => Product::orderBy('id', 'asc')->paginate(10),
                'theme' => Theme::orderBy('created_at', 'desc')->first(),
            );
            // Return Admin Products Page
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
        // Test if authenticated user is an admin
        if (!auth()->user()->isAdmin) {
            // Not authorized redirect to home page with error message
            return redirect('/')->with('error', 'Unauthorized User');
        } else {
            // Get theme and all users ordered in ascending order based on id, paginating at a limit of 10
            // per page
            $data = array(
                'users' => User::orderBy('id', 'asc')->paginate(10),
                'theme' => Theme::orderBy('created_at', 'desc')->first(),
            );
            // Return Admin Users Page
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
        // Test if authenticated user is an admin
        if (!auth()->user()->isAdmin) {
            // Not authorized redirect to home page with error message
            return redirect('/')->with('error', 'Unauthorized User');
        } else {
            // Get user to edit
            $user = User::find($id);
            // Pass user object and theme
            $data = array(
                'user' => $user,
                'theme' => Theme::orderBy('created_at', 'desc')->first(),
            );
            // Return Admin Edit User Page
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
        // Test if authenticated user is an admin
        if (!auth()->user()->isAdmin) {
            // Not authorized redirect to home page with error message
            return redirect('/')->with('error', 'Unauthorized User');
        } else {
            // Validate Form Data
            $this->validate($request, [
                'name' => 'required|min:4|string|max:255',
                'email' => 'required|email|string|max:255'
            ]);
            // Get User Object
            $user = User::find($id);
            // Update User with new data
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->isAdmin = $request->input('isAdmin');
            // Save User
            $user->save();
            // Redirect to the users page with a success message
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
        // Test if authenticated user is an admin
        if (!auth()->user()->isAdmin) {
            // Not authorized redirect to home page with error message
            return redirect('/')->with('error', 'Unauthorized User');
        } else {
            // Get user object to delete
            $user = User::find($id);
            // Delete User
            $user->delete();
            // Redirect to users page with success message
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
        // Test if authenticated user is an admin
        if (!auth()->user()->isAdmin) {
            // Not authorized redirect to home page with error message
            return redirect('/')->with('error', 'Unauthorized User');
        } else {
            // Get theme
            $data = array(
                'theme' => Theme::orderBy('created_at', 'desc')->first(),
            );
            // Return the admin theme page
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
        // Test if authenticated user is an admin
        if (!auth()->user()->isAdmin) {
            // Not authorized redirect to home page with error message
            return redirect('/')->with('error', 'Unauthorized User');
        } else {
            // Validate the form
            $this->validate($request, [
                'type' => 'required',
            ]);

            // Create theme
            $theme = new Theme;
            // Set theme type
            $theme->type = $request->input('type');
            // Save the new theme
            $theme->save(); // Generates and executes the sql create statement
            // Redirect to the admin page with a success message
            return redirect('/admin')->with('success', 'Theme Changed');
        }
    }
}
