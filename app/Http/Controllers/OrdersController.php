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
        $orders = Order::where('user_id', '==', $id)->orderBy('created_at', 'desc')->paginate(2);
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
            'subject'=>'required',
            'academicLevel'=>'required',
            'deadline'=>'required',
            'instructions'=>'required',
            'title'=>'required'
        ]);
        
        
        //make order
        $order = new Order;
        $order->subject=$request->input('subject');
        $order->academic_level=$request->input('academicLevel');
        $order->title=$request->input('title');
        $order->paper_type=$request->input('papertype');
        $order->cost=$request->input('totalcost');
        $order->amount_paid='0';
        $order->progress='25';
        $order->number_of_pages=$request->input('numberofpages');
        $order->deadline=$request->input('deadline');
        $order->instructions=$request->input('instructions');
        $order->paper_format=$request->input('paperformat');
        $order->number_of_sources=$request->input('numberofsources');
        $order->approved=$request->input('approved');
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
                $file->revision_or_order ='order';
                $file->editable =1;
                $file->order_id =$order->id;
                $file->save();
            }
            
        }

        
        //redirect
        $cost=$request->input('totalcost');
        return redirect('/payment')->with(['success'=>'Your order has been successfully created','cost'=>$cost,'deficit'=>$cost,'last_insert_id' => $order->id]);
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
            'subject'=>'required',
            'academicLevel'=>'required',
            'deadline'=>'required',
            'instructions'=>'required',
            'title'=>'required'
        ]);

        //make order
        $orders = Order::find($id);

        $cost = $request->input('totalcost');
        $amountPaid = $orders->amount_paid;
        $deficit = $cost - $amountPaid;


        $orders->subject=$request->input('subject');
        $orders->academic_level=$request->input('academicLevel');
        $orders->title=$request->input('title');
        $orders->paper_type=$request->input('papertype');
        $orders->cost=$request->input('totalcost');        
        $orders->number_of_pages=$request->input('numberofpages');
        $orders->deadline=$request->input('deadline');
        $orders->instructions=$request->input('instructions');
        $orders->paper_format=$request->input('paperformat');
        $orders->number_of_sources=$request->input('numberofsources');        
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
        $orders = Order::where('user_id', $user_id)->orderBy('created_at', 'desc')->paginate(15);

        if ($amountPaid < $cost) {
            return redirect('/payment')->with(['success'=>'Your order has been successfully edited','deficit'=>$deficit, 'cost'=>$cost,'last_insert_id' => $orders->id]);
        }
        else{
           return view('dashboard')->with(['orders'=> $orders, 'files'=>$files]); 
        }
        
    }

    public function approve($id)
    {
        $order = Order::find($id);

        $order->approved=1;
        $order->save();
        $files = File::where('order_id' , $id)->get();
        
       
        if ($order->approved) {
            $files = File::where([['order_id' , $id],['editable', true]])->get();
        }
        else{
             $files = File::where([['order_id' , $id],['editable', false]])->get();
        }
        return view('pages.clients.orders.show.files')->with(['id'=> $id,'files'=>$files, 'order'=>$order]);
        
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
