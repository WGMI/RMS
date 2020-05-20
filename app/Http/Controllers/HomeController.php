<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	//$products = Product::inRandomOrder()->take(3);
    	$products = Product::all()->random(3);
    	//dd($products);
    	return view('index')->with('products',$products);
    }
}
