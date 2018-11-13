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
        $revision_count=0;
        if(isset($revisions) ){
            $revision_count = $revisions->revision_count;
        }
        $revisions2 = Revision::where('order_id', $id)->orderBy('created_at', 'desc')->get();
        JavaScript::put([        
            'revisions' => $revisions2,                
        ]);
        return view('pages.clients.orders.show.revisions')->with(['id'=>$id, 'revisions'=>$revisions, 'revision_count'=>$revision_count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $revisions1 = Revision::where('order_id', $id)->orderBy('created_at', 'desc')->first();
        if(isset($revisions1) ){
            $revision_count = $revisions1->revision_count+1;
        }
        else{
            $revision_count =1;
        }
        
        return view('pages.clients.orders.show.create_revision')->with(['id'=>$id, 'revision_count'=>$revision_count]);
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
        $revision_count =$request->input('revision_count');

        $revision->instructions=$request->input('instructions');
        $revision->revision_count=$revision_count;
        $revision->order_id=$request->input('order_id');
        $revision->save();

        $revisions = Revision::where('order_id', $request->input('order_id'))->orderBy('created_at', 'desc')->first();

        $revisions2 = Revision::where('order_id', $request->input('order_id'))->orderBy('created_at', 'desc')->get();
        JavaScript::put([        
            'revisions' => $revisions2,                
        ]);

        return view('pages.clients.orders.show.revisions')->with(['id'=>$request->input('order_id'), 'revisions'=>$revisions, 'revision_count'=>$revision_count]);
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
        $orderId = $revisions->order_id;
        return view('pages.clients.orders.show.show_revision')->with(['id'=>$id,'orderId'=>$orderId, 'revisions'=>$revisions]);
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
        $revision = Revision::find($id);
        

        if(isset($revision) ){
           $id = $revision->order_id;

           $revision->delete();
        }

       

        $revisions = Revision::where('order_id', $id)->orderBy('created_at', 'desc')->get();
        JavaScript::put([        
            'revisions' => $revisions,                
        ]);

        $revisions1 = Revision::where('order_id', $id)->orderBy('created_at', 'desc')->first();
        $revision_count=0;
        if(isset($revisions1) ){
            $revision_count = $revisions1->revision_count;
        }
             

        
         return view('pages.clients.orders.show.revisions')->with(['success'=>'Removed successfully', 'revisions'=>$revisions, 'id'=>$id,  'revision_count' => $revision_count]);
    }
}
