<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Message;
use Auth;

class MessageController extends Controller
{

    public function index($id)
    {
         $messages = Message::where('order_id', $id)->get();
         $order = Order::where('id', $id)->get();
        
        return view('pages.clients.orders.show.messages')->with(['id'=>$id, 'messages'=> $messages,'order'=>$order]);
    }
    public function index1(Order $order)
    {
        return response()->json($order->messages()->with('user')->latest()->get());
    }
  
    public function store(Request $request, Order $order)
    {
        $message = $order->messages()->create([
            'message' => $request->message,
            'user_id' => Auth::id(),
            'read'=>0,
            'user_type'=>$request->userType,
        ]);

        $message = Message::where('id', $message->id)->with('user')->first();

        return $message->toJson();
    }
}