@extends('layouts.app')
@section('content')

  <div class="card text-center">
<div class=" fixed-header fixed-top">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs d-flex justify-content-between">
    <div >
      <li class="nav-item">
        <a class="nav-link text-primary" href="{{route('client.dashboard')}}">Back</a>
      </li>
     
      
    </div>
    <div class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link text-primary" href="/dashboard/{{$id}}">Details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="{{ route('client.showfiles') }}/{{$id}}">Files</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active bg-active-grey" href="#">Messages</a>
      </li>
      
    </div>
    <div class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link text-primary" href="#">Edit</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-danger" href="">Delete</a>
      </li>
      
    </div>
  </ul>
  </div>
</div>
  <div class="card-body bg-greey message-body">
    <div class="container d-flex justify-content-center">
      <div class="message-wrapper pr-4 pl-4  ">
                  
          
          @include('includes.messages')
          <div v-for="message in messages">
             
                <div class="d-flex justify-content-end" v-if="message.user_type == 'client'">
                  <div class="card p-2 mb-3 message client-message "><p>@{{message.message}}</p></div>
                </div>
             
                <div class="d-flex justify-content-start" v-else>
                  <div class="card p-2 mb-3 message admin-message "><p>@{{message.message}}</p></div>
                </div>
             
            
              
           
            <div class="card">
              <p class="text-danger">You have 0 messages</p>
            </div>
          </div>
             
         
          <div class="messaging-form fixed-bottom">
            
              {!! Form::open(['action' => 'MessageController@store', 'method' => 'POST']) !!}  
           <div class="form-group row">
              {{Form::text('messageBox', '', ['v-model'=>'messageBox','class'=>'form-control col-10','placeholder'=>'Type your message here......', 'required'=>'true'])}}            
       
              <input type="hidden" name="userType" value="client">
              <input type="hidden" name="orderid"> 
        
              {{Form::submit('Send &#8594;',['class'=>' btn btn-lg btn-lg-block btn-primary col-2 buttons', '@click.prevent'=>"postMessage"])}}  
            </div>
                             
            
          {!! Form::close() !!}
          </div>
          

      </div>

  </div>

    
  </div>
</div>



@include('includes.js.client_chat_app')
@endsection


 