<?php

namespace App\Http\Controllers;

use App\Theme;
use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get User
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        // Pass user and theme
        $data = array(
            'user' => $user,
            'theme' => Theme::orderBy('created_at', 'desc')->first(),
        );
        // Go to home page
        return view('home')->with($data);
    }
}
