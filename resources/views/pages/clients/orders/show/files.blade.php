@extends('layouts.app')
@section('content')
  <div class="card text-center ">
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
        <a class="nav-link text-primary " href="/dashboard/{{$id}}">Details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active bg-active-grey" href="#">Files</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="{{ route('client.ordermessages') }}/{{$id}}">Messages</a>
      </li>
      
    </div>
    <div class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link text-primary" href="#">Edit</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-danger" href="#">Delete</a>
      </li>
      
    </div>
  </ul>
    </div>
  </div>
    <div class="card-body bg-greey message-body text-center">
      <div class="row d-flex justify-content-center">
       <h5 class="card-title rounded pl-4 pr-4 bg-white pt-3 pb-3">Download Order # {{$id}} Files</h5>
     </div>  
      <div class="row no-gutter d-flex justify-content-center">
          
            <div class="card p-4 mb-5  messages rounded">
            <h6 class="card-title text-success">Solutions</h6> 
             

            
           @php
             $count2=0;
           @endphp
              @foreach($files as $file)
                
                @if($file->question_or_answer == 'answer')
                <?php
                $count2++;
                ?>
               <div class="row mb-3">
                 
                   <div class="mr-3">{{$count2}}</div>
                  
                    <a class="  file-downloads" href="{{route('downloadfiles',$file->id)}}"><i class="fas fa-download"></i> Download</a>
                 
                </div>
               @endif
            @endforeach
          </div>
        </div>
        <div class="row no-gutter d-flex justify-content-center">
          <div class="card p-3  rounded">
            <h6 class="card-title text-success">Materials</h6> 
             
             @php
               $count3=0;
             @endphp 
            @foreach($files as $file)
                
                @if($file->question_or_answer == 'question')
                <?php
                $count3++;
                ?>
               <div class="row">
                 
                    <div class="mr-3">{{$count3}}</div>
                
                  
                    <a class=" file-downloads" href="{{route('downloadfiles',$file->id)}}"><i class="fas fa-download"></i> Download</a>
                 
                </div>
               @endif
            @endforeach 
          </div>
         
          </div>
        </div>     
    </div>    
  

@endsection


  