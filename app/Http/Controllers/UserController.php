<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use JavaScript;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $users = User::orderBy('id','asc')->paginate(20);
        JavaScript::put([        
            'users' => $users,                
        ]);
        return view('pages.admin.users.all_users')->with([ 'users'=>$users]);

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
       
        return view('pages.admin.users.show_user')->with([ 'user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
     * Display a specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchByEmail(Request $request)
    {
        $email = $request->input('searchByEmail');
        
        $users = User::orderBy('created_at', 'desc')->where([['email', $email]])->paginate(15);       

        JavaScript::put([        
            'users' => $users,                
        ]);
        
        return view('pages.admin.users.all_users')->with(['users'=>$users]);
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
