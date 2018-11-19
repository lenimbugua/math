<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use JavaScript;

class ContactsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(15);

         JavaScript::put([        
            'contacts' => $contacts,                
        ]);

        
        return view('pages.admin.contacts.list_contact_messages')->with(['contacts'=>$contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'message'=>'required',
            'category'=>'required'
            
        ]);
        
        
        //make order
        $contact = new Contact;
        $contact->name=$request->input('name');
        $contact->email=$request->input('email');
        $contact->phone=$request->input('phone');
        $contact->message=$request->input('message');
        $contact->category=$request->input('category');
        
        $contact->read=0;
        
        
        $contact->save();

        return view('pages.contact_page')->with(['error'=>'Your message has been send successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
       
        return view('pages.admin.contacts.show_contact_message')->with([ 'contact'=>$contact]);
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
     * Display a specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchByEmail(Request $request)
    {
        $email = $request->input('searchByEmail');
        
        $contacts = Contact::orderBy('created_at', 'desc')->where([['email', $email]])->paginate(15);       

        JavaScript::put([        
            'contacts' => $contacts,                
        ]);
        
        return view('pages.admin.contacts.list_contact_messages')->with(['contacts'=>$contacts]);
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
