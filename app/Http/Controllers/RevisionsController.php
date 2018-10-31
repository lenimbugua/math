<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Revision;
use JavaScript;

class RevisionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $revisions = Revision::where('order_id', $id)->orderBy('created_at', 'desc')->first();
        $revisions2 = Revision::where('order_id', $id)->orderBy('created_at', 'desc')->get();
        JavaScript::put([        
            'revisions' => $revisions2,                
        ]);
        return view('pages.clients.orders.show.revisions')->with(['id'=>$id, 'revisions'=>$revisions]);
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
    public function store(Request $request, Order $order)
    {

        $this -> validate($request,[           
                       
            'instructions'=>'required',
        ]);

        $revision = new Revision;
        $revision->instructions=$request->input('instructions');
        $revision->revision_count=$request->input('revision_count');
        $revision->order_id=$request->input('order_id');
        $revision->save();

        $revisions = Revision::where('order_id', $request->input('order_id'))->orderBy('created_at', 'desc')->first();

        $revisions2 = Revision::where('order_id', $request->input('order_id'))->orderBy('created_at', 'desc')->get();
        JavaScript::put([        
            'revisions' => $revisions2,                
        ]);

        return view('pages.clients.orders.show.revisions')->with(['id'=>$request->input('order_id'), 'revisions'=>$revisions]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $revisions = Revision::find($id);
        
        return view('pages.clients.orders.show.show_revision')->with(['id'=>$id, 'revisions'=>$revisions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $revisions = Revision::find($id);
        
        return view('pages.clients.orders.show.edit_revision')->with(['id'=>$id, 'revisions'=>$revisions]);
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
            'instructions'=>'required'           
        ]);

    
        $revisions = Revision::find($id);
        
        $revisions->instructions=$request->input('instructions');
        $revisions->save();

       
        
         return view('pages.clients.orders.show.show_revision')->with(['success'=>'Edited successfully', 'revisions'=>$revisions, 'id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $revisions = Revision::find($id);
        $id = $revisions->order_id;
             

        $revisions->delete();
         return view('pages.clients.orders.show.show_revision')->with(['success'=>'Removed successfully', 'revisions'=>$revisions, 'id'=>$id]);
    }
}
