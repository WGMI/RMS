<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;
use \App\Category;

class MenuController extends Controller
{
    public function index(){
    	if(request()->category){
    		$products = Product::with('categories')->whereHas('categories', function($query){
    			$query->where('slug',request()->category);	
    		})->get();
    		$categories = Category::all();
    		$categoryName = $categories->where('slug',request()->category)->first()->name;
    	} else{
    		$products = Product::all();
    		$categories = Category::all();	
    		$categoryName = '';
    	}

    	return view('menu')->with([
    		'products' => $products,
    		'categories' => $categories,
    		'categoryName' => $categoryName
    	]);
    }
}
