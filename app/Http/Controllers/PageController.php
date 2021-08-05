<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Controller function for Index page
    public function index(){
        // Return splash page
        return view('pages.splash');
    }

    // Controller function for Mission page
    public function mission(){
        // Return mission page
        return view('pages.mission');
    }

    // Controller function for Legal page
    public function legal(){
        // Return legal page
        return view('pages.legal');
    }

    // Controller function for History page
    public function history(){
        // Return history page
        return view('pages.history');
    }

    // Controller function for Contact page
    public function contact(){
        // Return contact page
        return view('pages.contact');
    }

    // Controller function for Marko profile page
    public function marko(){
        // Return profile
        return view('pages.marko');
    }

    // Controller function for Ian profile page
    public function ian(){
        // Return profile
        return view('pages.ian');
    }

    // Controller function for Nathan profile page
    public function nathan(){
        // Return profile
        return view('pages.nathan');
    }

    // Controller function for Ehu profile page
    public function ehu(){
        // Return profile
        return view('pages.ehu');
    }

    // Controller function for Sehaj profile page
    public function sehaj(){
        // Return profile
        return view('pages.sehaj');
    }

    // Controller function for Join page
    public function join(){
        // Return join page
        return view('pages.join');
    }
}
