<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;
use \Gloudemans\Shoppingcart\facades\Cart;

class CartController extends Controller
{
    public function index(){
    	return view('cart');
    }

    public function store(Request $request){
        $duplicates = Cart::search(function($item,$rowId) use ($request){
            return $item->id === $request->id;
        });

        if($duplicates->isNotEmpty()){
            return redirect('/cart')->with('success','Item already in cart');
        }

    	Cart::add($request->id,$request->name,1,$request->price)->associate('\App\Product');
    	return redirect('/menu')->with('success','Item added');
    }

    public function destroy($id){
    	Cart::remove($id);

    	return back()->with('success','Item removed');
    }

    public function update(Request $request,$id){
        Cart::update($id,$request->quantity);
        session()->flash('success','Quantity updated');
        return response()->json(['success' => 1]);
        /*$qty = request()->input('qty');//Cart::get($id)->qty + 1;
        Cart::update($id,$qty);
        return redirect()->back();*/
    }
}
