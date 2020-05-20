<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Order;
use \App\OrderProduct;
use \Gloudemans\Shoppingcart\facades\Cart;

class CheckoutController extends Controller
{
    public function index(){
        /*if(Cart::instance('default')->count()){
            return view('checkout');
        } else{
            return redirect('/menu')->with('success','Cannot checkout. Cart is empty');
        }*/
        return view('checkout');
    }

    public function store(){        
        $data = request()->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'city'=>'required',
            'address'=>'required',
            'estate'=>'required',
            'phone_number'=>'required',
            'email'=>'required | email',
            'amount'=>'required'
        ]);

        $order = Order::create($data);
        $order->user_id = auth()->user()->id;
        $order->error = null;
        $order->save();
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id'=>$order->id,
                'product_id'=>$item->model->id,
                'quantity'=>$item->qty
            ]);
        }
        /*$order = new Order();
        $order->first_name=request('first_name');
        $order->last_name=request('last_name');
        $order->city=request('city');
        $order->address=request('address');
        $order->estate=request('estate');
        $order->phone_number=request('phone_number');
        $order->amount=request('amount');*/
        Cart::destroy();
    	return redirect('payment')->with('reference',$order->id)->with('amount',$order->amount);
    }
}
