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
        
        $files = File::where('order_id' ,'=', $id)->get();
        return view('pages.clients.orders.show.files')->with(['id'=> $id,'files'=>$files]);
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
    public function payed()
    {
        $user_id = auth()->user()->id;
        $order = Order::orderBy('created_at', 'desc')->where([['amount_payed', '>','0'],['user_id',$user_id]])->paginate(5);
        
        $files = File::all();

        
        return view('dashboard')->with(['files'=>$files,'orders'=>$order]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function unpayed()
    {
        $user_id = auth()->user()->id;
        $order = Order::orderBy('created_at', 'desc')->where([['amount_payed','0'],['user_id',$user_id]])->paginate(5);
        
        $files = File::all();

        
        return view('dashboard')->with(['files'=>$files,'orders'=>$order]);
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
    public function payedListLayout()
    {
        $user_id = auth()->user()->id;
        $orders = Order::orderBy('created_at', 'desc')->where([['amount_payed', '>','0'],['user_id',$user_id]])->paginate(15);        
        
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
    public function unpayedListLayout()
    {
        $user_id = auth()->user()->id;
        $orders = Order::orderBy('created_at', 'desc')->where([['amount_payed','0'],['user_id',$user_id]])->paginate(15);       

        JavaScript::put([        
            'orders' => $orders,                
        ]);
        
        return view('pages.clients.orders.list_dashboard')->with(['orders'=>$orders]);
    }
}
