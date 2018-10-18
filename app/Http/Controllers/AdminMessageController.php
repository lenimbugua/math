<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class AdminMessageController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
         $messages = Message::where('order_id', $id)->get();
        
        return view('pages.admin.orders.show.messages')->with(['id'=>$id, 'messages'=> $messages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this -> validate($request,[
            'message'=>'required',
            'usertype'=>'required',
            'orderid'=>'required',
            
        ]);
        
        $id = $request->orderid;
        $usertype = $request->usertype;
        //make order
        $message = new Message;

        $message->message=$request->input('message');
        $message->user_type=$usertype;
        $message->order_id=$request->input('orderid');
        $message->read=0;
        
        $message->save();

        $messages = Message::where('order_id', $id)->get();
       
        return view('pages.admin.orders.show.messages')->with(['id'=>$id, 'messages'=> $messages]);   
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
