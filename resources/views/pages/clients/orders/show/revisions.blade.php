@extends('layouts.app')
@section('content')
<div class="card text-center  ">
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
        <a class="nav-link text-primary" href="#">Details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="{{ route('client.showfiles') }}/{{$id}}">Files</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="{{ route('client.ordermessages') }}/{{$id}}">Messages</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="{{ route('chat',['id'=>$id]) }}">Chat</a>
      </li>

      <li class="nav-item">
        <a class="nav-link active bg-active-grey" href="#">Revisions</a>
      </li>
      
    </div>
    <div class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link text-primary" href="#">Edit</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-danger" href="{{ route('client.showfiles') }}/{{$id}}">Delete</a>
      </li>
      
    </div>
  </ul>
  </div>
</div>
  <div class="card-body bg-greey message-body">
    <div class="container">
      <div class="revision-form-wrapper p-4">
         @include('includes.messages')
        {!! Form::open(['action' => 'OrdersController@store', 'method' => 'POST','files' => true]) !!}

          <div class="form-group">

            {{Form::label('instructions', 'Type Revision Instructions Below' , ['class'=>'revision-label d-flex justify-content-left mb-0 '])}} 
            
              {{Form::textarea('instructions', '', ['id'=>'article-ckeditor','class'=>'form-control'])}}          
        </div>
        <div class="form-group">
            {{Form::label('files', 'Upload Revision Materials (Optional)', ['class'=>'revision-label d-flex justify-content-left  mb-0'])}} 
            
              {{Form::file('files[]', ['id'=>'file','class'=>'form-control buttons','multiple'])}}            
            
        </div>
         <button id="green" type="submit" class=" buttons btn btn-lg btn-block">
                                        {{ __('Submit Revision Request') }}
                                    </button>

        {!! Form::close() !!}
      </div>
     
    </div>

  </div>

    
  </div>
</div>

 @include('includes.js.ck_editor')
@endsection


 