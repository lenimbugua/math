@extends('layouts.app')
@section('content')
<div class="card text-center  ">
  <div class=" fixed-header fixed-top">
      <div class="card-header">
    
          <ul class="nav nav-tabs card-header-tabs d-flex justify-content-between">
    <div >
      <li class="nav-item">
        <a class="nav-link text-primary" href="{{route('admin.dashboard')}}">Back</a>
      </li>
     
      
    </div>
    <div class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link text-primary" href="/adminfunctions/{{$id}}">Details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="{{ route('admin.showfiles') }}/{{$id}}">Files</a>
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
          @if(count($messages)>0)

         
            @foreach($messages as $message)
              @if($message->user_type == 'client')
                <div class="d-flex justify-content-end">
                  <div class="card pb-1 mb-2 message client-message "><p>{{$message->message}}</p></div>
                </div>
              @else
                <div class="d-flex justify-content-start">
                  <div class="card pb-1 mb-2 message admin-message "><p>{{$message->message}}</p></div>
                </div>
              @endif
            
              
            @endforeach
          
          @else
            <div class="card">
              <p class="text-danger">You have 0 messages</p>
            </div>
          @endif
          </div>
</div>
          <div class="messaging-form fixed-bottom">
            
              {!! Form::open(['action' => 'AdminMessageController@store', 'method' => 'POST']) !!}  
           <div class="form-group row">
              {{Form::textarea('message', '', ['id'=>'article-ckeditor','rows'=>'2','class'=>'form-control col-10','placeholder'=>'Type Your Message Here', 'required'=>'true'])}}            
       
              <input type="hidden" name="usertype" value="admin">
              <input type="hidden" name="orderid" value="{{$id}}"> 
        
              {{Form::submit('Send &#8594;',['class'=>' btn btn-lg btn-lg-block btn-primary col-2 buttons'])}}  
            </div>
                             
            
          {!! Form::close() !!}
          </div>
          

      </div>

  
    
  </div>

@endsection


 