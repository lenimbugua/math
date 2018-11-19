<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Revision;
use JavaScript;

class AdminRevisionController extends Controller
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
        return view('pages.admin.orders.show.revisions')->with(['id'=>$id, 'revisions'=>$revisions, 'revision_count'=>$revision_count]);
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
        $revisions = Revision::find($id);
        $orderId = $revisions->order_id;
        return view('pages.admin.orders.show.show_revision')->with(['id'=>$id,'orderId'=>$orderId, 'revisions'=>$revisions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
