<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Auth;

class PaymentController extends Controller
{
    public function charge(Request $request)
    {
    	// Set your secret key: remember to change this to your live secret key in production
		// See your keys here: https://dashboard.stripe.com/account/apikeys
		\Stripe\Stripe::setApiKey("sk_test_CHOuscExkXVbIU9IqQp0oKQg");

		// Token is created using Checkout or Elements!
		// Get the payment token ID submitted by the form:
		$token = $request->input('stripeToken');
		$id=$request->input('last_insert_id');
		$cost = (int)$request->input('cost');
		$amount= $cost*10000;
			
		
		try {
		 	$charge = \Stripe\Charge::create([
			    'amount' => $amount,
			    'currency' => 'usd',
			    'description' => 'Example charge',
			    'source' => $token,
			]);

		 $order = Order::find($id);
		 $order->amount_payed=$cost;
		 $order->save();

		 	$orders = Auth::user()->orders();

		 // 	Auth::user()->orders()->save($order);

			return redirect()->route('client.dashboard')->with(['success'=> 'You have successfully paid for the order','orders'=>$orders]);
		 } catch (Exception $e) {
		 	return redirect('payment')->with('error', $e->getMessage);
		 } 
    }
}
