<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\File;
use JavaScript;

class AdminFilterOrdersController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        
        // $orders = Order::all();
        $orders = Order::orderBy('created_at', 'desc') ->paginate(15);
       
        JavaScript::put([        
	        'orders' => $orders,	        
	    ]);

        //return $orders and files;
        return view('admin')->with(['orders'=>$orders]);
        
    }
    
    public function settled()
    {
       

        $orders = Order::orderBy('created_at', 'desc')->where([['progress', '100']])->paginate(15);        

        JavaScript::put([        
            'orders' => $orders,                
        ]);
        
        return view('admin')->with(['orders'=>$orders]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inprogress()
    {
       
        $orders = Order::orderBy('created_at', 'desc')->where([['progress', '<','100']])->paginate(15);        
       
        JavaScript::put([        
            'orders' => $orders,                
        ]);
        
        return view('admin')->with(['orders'=>$orders]);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paid()
    {
        
        $orders = Order::orderBy('created_at', 'desc')->where([['amount_paid', '>','0']])->paginate(15);       

        JavaScript::put([        
            'orders' => $orders,                
        ]);
        
        return view('admin')->with(['orders'=>$orders]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function unpaid()
    {
        
        $orders = Order::orderBy('created_at', 'desc')->where([['amount_paid','0']])->paginate(15);      

        JavaScript::put([        
            'orders' => $orders,                
        ]);
        
        return view('admin')->with(['orders'=>$orders]);
    }

    public function allGridLayout()
    {
        
        // $orders = Order::all();
        $orders = Order::orderBy('created_at', 'desc') ->paginate(15);
        $files = File::all();        

        //return $orders and files;
        return view('pages.admin.orders.grid_dashboard')->with(['orders'=>$orders, 'files'=>$files]);
        
    }
    
    public function settledGridLayout()
    {
       

        $orders = Order::orderBy('created_at', 'desc')->where([['progress', '100']])->paginate(15);
        $files = File::all();       
        
        return view('pages.admin.orders.grid_dashboard')->with(['files'=>$files,'orders'=>$orders]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inprogressGridLayout()
    {
       
        $orders = Order::orderBy('created_at', 'desc')->where([['progress', '<','100']])->paginate(15);
        
        $files = File::all();       
        
        return view('pages.admin.orders.grid_dashboard')->with(['files'=>$files,'orders'=>$orders]);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paidGridLayout()
    {
        
        $orders = Order::orderBy('created_at', 'desc')->where([['amount_paid', '>','0']])->paginate(15);
        
        $files = File::all();        
        
        return view('pages.admin.orders.grid_dashboard')->with(['files'=>$files,'orders'=>$orders]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function unpaidGridLayout()
    {
        
        $orders = Order::orderBy('created_at', 'desc')->where([['amount_paid','0']])->paginate(15);
        
        $files = File::all();       
        
        return view('pages.admin.orders.grid_dashboard')->with(['files'=>$files,'orders'=>$orders]);
    }
}
