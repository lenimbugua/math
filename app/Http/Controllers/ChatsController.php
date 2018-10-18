<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;


class ChatsController extends Controller
{
    public function __construct()
	{
	  $this->middleware('auth');
	}

	/**
	 * Show chats
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index($orderId)
	{
	  return view('chat')->with('orderId', $orderId);
	}

	/**
	 * Fetch all messages
	 *
	 * @return Message
	 */
	public function fetchMessages($id)
	{
		$user = Auth::user();
	  return Message::orderBy('created_at', 'desc')->where('order_id',$id)->get();
	}

	/**
	 * Persist message to database
	 *
	 * @param  Request $request
	 * @return Response
	 */
	public function sendMessage(Request $request)
	{
	  // $this -> validate($request,[
	  //           'message'=>'required'
	            
	            
	  //       ]);
	        
	        // $id = $request->orderid;
	        // $usertype = $request->userType;
	        //make order
		    $user = Auth::user();
	        $message = new Message;

	        $message->message=$request->input('message');
	        $message->user_type=$request->input('userType');
	        $message->order_id=7;
	        $message->read=0;
	        
	        $message->save();	        

	       broadcast(new MessageSent( $message))->toOthers();

	  return ['status' => 'Message Sent!'];
	}
}


