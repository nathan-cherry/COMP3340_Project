<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
//    public function index(){
//        $title = 'NIMSE';
////        return view('pages.splash', compact('title'));
//        return view('pages.splash')->with('title', $title);
//    }
//
//    public function mission(){
//        $data = array(
//            'title' => 'Mission',
//            'services' => ['web design', 'programming','SEO'],
//        );
//        return view('test')->with($data);
//    }
    public function index(){
        return view('pages.splash');
    }
    public function mission(){
        return view('pages.mission');
    }

    public function legal(){
        return view('pages.legal');
    }
    public function history(){
        return view('pages.history');
    }
    public function contact(){
        return view('pages.contact');
    }
}
