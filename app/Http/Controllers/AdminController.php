<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\File;
use JavaScript;

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
        $orders = Order::orderBy('created_at', 'desc') ->paginate(15);
        $files = File::all();
        JavaScript::put([
        
        'orders' => $orders,
        
    ]);

        //return $orders and files;
        return view('admin')->with(['orders'=>$orders, 'files'=>$files]);
        
    }

     /**
     * Show grid layout order dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function gridLayout()
    {
        
        // $orders = Order::all();
        $orders = Order::orderBy('created_at', 'desc')->paginate(10);
        $files = File::all();
       

        //return $orders and files;
        return view('pages.admin.orders.grid_dashboard')->with(['orders'=>$orders, 'files'=>$files]);
        
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
         $files = File::all();
        return view('pages.admin.orders.show.show')->with(['order'=> $order,'files'=>$files]);
    }
    /**
     * Display Files for the specified order.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showFiles($id)
    {
        
        
         $files = File::where('order_id','=',$id)->get();
        return view('pages.admin.orders.show.files')->with(['id'=> $id,'files'=>$files]);
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
        
        $order = Order::find($id);
        $orders = Order::orderBy('created_at', 'desc') ->paginate(4);
        //check if the user uploaded files
        if ($request->input('progress')==100 and !$request->hasFile('files')) {
            // return view('admin')->with(['orders'=>$orders, 'error'=>"please upload files"]);
            return 'no';
        }

        
        //store file

        if ($request->hasFile('files')) { 
           foreach ($request->file('files') as $file) {
            
                $filesize=$file->getClientSize();            
                $filename = $file->getClientOriginalName();
                $path = $file->store('public/fullfilled');                
                
                $file = new File;
                $file->path =$path;
                $file->size =$filesize;
                $file->original_name=$filename;
                $file->question_or_answer='answer';
                $file->revision_or_order='order';
                $file->editable=0;
                $file->order_id =$order->id;
                $file->save();
            }
            
        }

        
        $order->progress=$request->input('progress');
        $order->save();


        
        // $orders = Order::all();
        $orders = Order::orderBy('created_at', 'desc') ->paginate(4);
        $files = File::orderBy('created_at', 'desc');

        //return $orders and files;
        return view('pages.admin.orders.grid_dashboard')->with(['orders'=> $orders, 'files'=>$files]);
    
    }

    public function updateProgress(Request $request, $id)
    {
        
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
