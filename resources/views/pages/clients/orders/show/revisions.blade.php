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
        <a class="nav-link text-primary" href="/dashboard/{{$id}}">Details</a>
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
        
        @if(!$revisions)
        @php
          $revision_count =1;
          echo $revisions;
          echo "revisions is empty";
          echo $revision_count;
        @endphp
        @else
        <h6>Revisions</h6>
        <div class="card mb-4">
          
          <div id="table_div"></div>
        </div>
        
        @php
          
        @endphp
            
                @php
                  $revision_count=++$revisions->revision_count;
                @endphp
                
           
            
          
        @endif
        @if($revision_count < 4)
            @include('includes.messages')
            {!! Form::open(['action' => 'RevisionsController@store', 'method' => 'POST','files' => true]) !!}

              <div class="form-group">

                {{Form::label('instructions', 'Type Revision Reasons/Instructions Below' , ['class'=>'revision-label d-flex justify-content-left mb-0 '])}} 
                
                  {{Form::textarea('instructions', '', ['id'=>'article-ckeditor','class'=>'form-control'])}}          
            </div>
            <div class="form-group">
                {{Form::label('files', 'Upload Revision Materials (Optional)', ['class'=>'revision-label d-flex justify-content-left  mb-0'])}} 
                
                  {{Form::file('files[]', ['id'=>'file','class'=>'form-control buttons','multiple'])}}            
                
            </div>
            {{Form::hidden('revision_count',$revision_count)}}
            {{Form::hidden('order_id',$id)}}
             <button id="green" type="submit" class=" buttons btn btn-lg btn-block revision-label">
                {{ __('Submit Revision Request') }}
              </button>

            {!! Form::close() !!}
        @else
          <div class="card">
            <p class="text-danger">You have exhausted revisions <a href="{{route('orders.create') }}">Create new Order?</a></p>
          </div>
        @endif
         
      </div>
     
    </div>

  </div>

    
  </div>
</div>

 @include('includes.js.ck_editor')
@include('includes.footer')
        <script type="text/javascript">
          var chartData = [];
      function getData (){

                      console.log(revisions);
                      for(let value of revisions){

                        let aOpen='<a class="text-dark" href="/revision/'+value.id+'">';
                        let aClose='</a>';
                        
                        chartData.push([aOpen+value.revision_count+aClose, aOpen+value.created_at+aClose]);
                        
                      }
                      
                  }
        </script>
        
          @include('includes.js.revision')
@endsection


 