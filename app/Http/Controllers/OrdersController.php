<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\File;
use Illuminate\Support\Str;


class OrdersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $orders = Order::where('user_id', '==', $id)->orderBy('created_at', 'desc')->paginate(2);;
        // $orders = Order::all();
        // $orders = Order::orderBy('created_at', 'desc') ->paginate(2);
        //return $orders;
        return view('pages.admin.orders.index')->with('orders', $orders);
        
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
        $order->cost=$request->input('totalcost');
        $order->amount_payed='0';
        $order->progress='25';
        $order->number_of_questions=$request->input('noofquestions');
        $order->urgency=$request->input('urgency');
        $order->instructions=$request->input('instructions');
        $order->user_id=auth()->user()->id;
        $order->save();

        

        //store file
        if ($request->hasFile('files')) {            
           foreach ($request->file('files') as $file) {
                $filesize=$file->getClientSize();
                $filename=$file->getClientOriginalName();             
                
                $path = $file->store('public/clients');
                
                $file = new File;
                $file->path =$path;
                $file->size =$filesize;
                $file->original_name =$filename;
                $file->question_or_answer ='question';
                $file->order_id =$order->id;
                $file->save();
            }
            
        }

        
        //redirect
        $cost=$request->input('totalcost');
        return redirect('/payment')->with(['success'=>'Your order has been successfully created','cost'=>$cost,'last_insert_id' => $order->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $orders = Order::find($id);
        if (auth()->user()->id !== $orders->user_id) {
            return redirect('/dashboard')->with('error', 'Unauthorised page');
        }
        return view('pages.clients.orders.edit')->with('orders', $orders);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'yes';
        
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
        $orders = Order::find($id);
        $orders->category=$request->input('category');
        $orders->academic_level=$request->input('academicLevel');
        $orders->urgency=$request->input('urgency');
        $orders->instructions=$request->input('instructions');
        $orders->save();

        //store file
        if ($request->hasFile('files')) {            
           foreach ($request->file('files') as $file) {
                $filesize=$file->getClientSize();            
                $filename =$file->getClientOriginalName();
                $path = $file->store('public/clients');
                
                $file = new File;
                $file->path =$path;
                $file->size =$filesize;
                $file->original_name =$filename;
                $file->question_or_answer ='question';
                $file->order_id =$id;
                $file->save();
            }
            
        }

        
        $user_id = auth()->user()->id;
        $user=User::find($user_id);
        $files = File::where('order_id', '==', $id)->get();
        return view('dashboard')->with(['orders'=> $user->orders, 'files'=>$files]);
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
