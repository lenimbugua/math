@extends('layouts.app')
@section('content')
<div class="card text-center  ">
  <div class=" fixed-header fixed-top">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs d-flex justify-content-between">
    <div >
      <li class="nav-item">
        <a class="nav-link text-primary" href="{{ route('revision.show',['id'=>$revisions->id]) }}">Back</a>
      </li>
     
      
    </div>
    <div class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active bg-active" href="#">Edit Revision</a>
      </li>
      
      
    </div>
    <div class="nav nav-tabs card-header-tabs">
      
      
    </div>
  </ul>
  </div>
</div>
  <div class="card-body bg-greey message-body">
    <div class="container">
      <div class="revision-form-wrapper p-4">
        
        
        
            @include('includes.messages')
            {!! Form::open(['action' => ['RevisionsController@update', $revisions->id], 'method' => 'POST','files' => true]) !!}

              <div class="form-group">

                {{Form::label('instructions', 'Type Revision Reasons/Instructions Below' , ['class'=>'revision-label d-flex justify-content-left mb-0 '])}} 
                
                  {{Form::textarea('instructions', $revisions->instructions, ['id'=>'article-ckeditor','class'=>'form-control'])}}          
            </div>
            <div class="form-group">
                {{Form::label('files', 'Upload Revision Materials (Optional)', ['class'=>'revision-label d-flex justify-content-left  mb-0'])}} 
                
                  {{Form::file('files[]', ['id'=>'file','class'=>'form-control buttons','multiple'])}}            
                
            </div>
            {{Form::hidden('_method', 'PUT')}}  
             <button id="green" type="submit" class=" buttons btn btn-lg btn-block revision-label">
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


 