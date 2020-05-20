<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){
    	$reference = session('reference');
    	$amount = session('amount');
    	$data = array();
    	$data['accountReference'] = $reference;
		$data['amount'] = $amount;
		$data['transactionDescription'] = 'Strathmore Cafeteria Meal Payment';
		$post_data = json_encode($data);            
		$url = 'https://merchant.ilabpay.com/gateway/merchantapi/processpayment';
		$ch = curl_init();            
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Accept: application/json',
			'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MjIsImtleSI6IjExOGI1NmMzLWI5N2UtNDZmNC1iMDNiLWFkM2UzNWE2MGJmNyJ9.5RfW4Lqbvpg1VllWfEo-Z2sLDbjF5iQeSJBnI20BLaw'));  
		$output=curl_exec($ch);            
		curl_close($ch);
		$info = json_decode($output);
		$iframeurl = $info->redirectUrl;
    	return view('payment',compact('iframeurl'));
    }
}
