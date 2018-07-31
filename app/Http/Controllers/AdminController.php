<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $orders = Order::all();
        $orders = Order::orderBy('created_at', 'desc') ->paginate(2);
        //return $orders;
        return view('admin')->with('orders', $orders);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.clients.orders.create');
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
            'category'=>'required',
            'academicLevel'=>'required',
            'urgency'=>'required',
            'instructions'=>'required',
        ]);

        //make order
        $order = new Order;
        $order->category=$request->input('category');
        $order->academic_level=$request->input('academicLevel');
        $order->urgency=$request->input('urgency');
        $order->instructions=$request->input('instructions');
        $order->user_id=auth()->user()->id;
        $order->save();

        //redirect
        return redirect('/orders')->with('success', 'Order Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        return view('pages.clients.orders.show')->with('order', $order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);

        //check for correct user
        if(auth()->user()->id !== $order->user_id){
             return redirect('/dashboard')->with('error', 'Unauthorised Page');
        }

        return view('pages.clients.orders.edit')->with('order', $order);
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
        $this -> validate($request,[
            'category'=>'required',
            'academicLevel'=>'required',
            'urgency'=>'required',
            'instructions'=>'required',
        ]);

        //make order
        $order = Order::find($id);
        $order->category=$request->input('category');
        $order->academic_level=$request->input('academicLevel');
        $order->urgency=$request->input('urgency');
        $order->instructions=$request->input('instructions');
        $order->save();

        //redirect
        return redirect('/orders')->with('success', 'Order Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);

        //check for correct user
        if(auth()->user()->id !== $order->user_id){
             return redirect('/dashboard')->with('error', 'Unauthorised Page');
        }        

        $order->delete();
        return redirect('/orders')->with('success', 'Order Removed');
    }
}
