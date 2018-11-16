<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Order;
use App\File;
use JavaScript;


class DashboardController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        

        $user_id = auth()->user()->id;
         $orders = Order::orderBy('created_at', 'desc')->where([['user_id',$user_id]])->paginate(15);

         JavaScript::put([        
            'orders' => $orders,                
        ]);

        $files = File::all();

        return view('pages.clients.orders.list_dashboard')->with(['files'=>$files,'orders'=>$orders]);
    }

    public function gridLayout()
    {
        $user_id = auth()->user()->id;
        $user=User::find($user_id);
        // $orders = $user->orders;
        $orders = Order::orderBy('created_at', 'desc')->where([['user_id',$user_id]])->paginate(3);

        JavaScript::put([        
            'orders' => $orders,                
        ]);

        $files = File::all();

        return view('dashboard')->with(['files'=>$files,'orders'=>$orders]);
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
        return view('pages.clients.orders.show')->with(['order'=> $order,'files'=>$files]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showFiles($id)
    {
        
        
        $order = Order::find($id);
        if ($order->approved) {
            $files = File::where([['order_id' , $id],['editable', true]])->get();
        }
        else{
             $files = File::where([['order_id' , $id],['editable', false]])->get();
        }
        return view('pages.clients.orders.show.files')->with(['id'=> $id,'files'=>$files, 'order'=>$order]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function settled()
    {
        $user_id = auth()->user()->id;
        // $user=User::find($user_id);

        $order = Order::orderBy('created_at', 'desc')->where([['progress', '100'],['user_id',$user_id]])->paginate(5);
        $files = File::all();

        
        return view('dashboard')->with(['files'=>$files,'orders'=>$order]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inprogress()
    {
        $user_id = auth()->user()->id;
        $order = Order::orderBy('created_at', 'desc')->where([['progress', '<','100'],['user_id',$user_id]])->paginate(5);
        
        $files = File::all();

        
        return view('dashboard')->with(['files'=>$files,'orders'=>$order]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paid()
    {
        $user_id = auth()->user()->id;
        $order = Order::orderBy('created_at', 'desc')->where([['amount_paid', '>','0'],['user_id',$user_id]])->paginate(5);
        
        $files = File::all();

        
        return view('dashboard')->with(['files'=>$files,'orders'=>$order]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function unpaid()
    {
        $user_id = auth()->user()->id;
        $order = Order::orderBy('created_at', 'desc')->where([['amount_paid','0'],['user_id',$user_id]])->paginate(5);
        
        $files = File::all();

        
        return view('dashboard')->with(['files'=>$files,'orders'=>$order]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchById(Request $request)
    {
        $orderId = $request->input('searchById');
        $user_id = auth()->user()->id;
        $orders = Order::orderBy('created_at', 'desc')->where([['id', $orderId],['user_id',$user_id]])->paginate(15);       

        $files = File::all();
        
        return view('dashboard')->with(['files'=>$files, 'orders'=>$orders]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function settledListLayout()
    {
        $user_id = auth()->user()->id;
        // $user=User::find($user_id);

        $orders = Order::orderBy('created_at', 'desc')->where([['progress', '100'],['user_id',$user_id]])->paginate(15); 

        JavaScript::put([        
            'orders' => $orders,                
        ]);
        
        return view('pages.clients.orders.list_dashboard')->with(['orders'=>$orders]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inprogressListLayout()
    {
        $user_id = auth()->user()->id;
        $orders = Order::orderBy('created_at', 'desc')->where([['progress', '<','100'],['user_id',$user_id]])->paginate(15);

        JavaScript::put([        
            'orders' => $orders,                
        ]);

        return view('pages.clients.orders.list_dashboard')->with(['orders'=>$orders]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paidListLayout()
    {
        $user_id = auth()->user()->id;
        $orders = Order::orderBy('created_at', 'desc')->where([['amount_paid', '>','0'],['user_id',$user_id]])->paginate(15);        
        
        JavaScript::put([        
            'orders' => $orders,                
        ]);
        
        return view('pages.clients.orders.list_dashboard')->with(['orders'=>$orders]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function unpaidListLayout()
    {
        $user_id = auth()->user()->id;
        $orders = Order::orderBy('created_at', 'desc')->where([['amount_paid','0'],['user_id',$user_id]])->paginate(15);       

        JavaScript::put([        
            'orders' => $orders,                
        ]);
        
        return view('pages.clients.orders.list_dashboard')->with(['orders'=>$orders]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchByIdListLayout(Request $request)
    {
        $orderId = $request->input('searchById');
        $user_id = auth()->user()->id;
        $orders = Order::orderBy('created_at', 'desc')->where([['id', $orderId],['user_id',$user_id]])->paginate(15);       

        JavaScript::put([        
            'orders' => $orders,                
        ]);
        
        return view('pages.clients.orders.list_dashboard')->with(['orders'=>$orders]);
    }
}
