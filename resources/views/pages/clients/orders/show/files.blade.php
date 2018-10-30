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
       <li class="nav-item">
        <a class="nav-link text-primary" href="{{ route('revisions.index',['id'=>$id]) }}">Revisions</a>
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
       
     </div>  
      <div class="row no-gutter d-flex justify-content-center">
          
            <div class="card p-4 mb-5  messages rounded" style="width: 90%">
            <h6 class="card-title text-success">Solutions</h6> 
             <table class="table table-sm table-bordered">
              

            
           @php
             $count2=0;
           @endphp
              @foreach($files as $file)
                
                @if($file->question_or_answer == 'answer')
                <?php
                $count2++;
                ?>
                <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col">Action</th>                  
                </tr>
              </thead>
              <tbody> 
               <tr>
                  <th scope="row">{{$count2++}}</th>
                  <td><a href="{{route('downloadfiles',$file->id)}}" type="button" class="btn btn-primary"> Download <i class="fas fa-download"></i></a></td>
                 
                </tr>
                @else
                <p class="text-danger">Solutions are yet to be uploaded</p>
               @endif
            @endforeach
            </tbody>
            </table> 
          </div>
        </div>
        <div class="row no-gutter d-flex justify-content-center">
          <div class="card p-3  rounded" style="width: 90%">
            <h6 class="card-title text-success">Materials</h6>
            <table class="table table-sm table-bordered">
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col">Action</th>                  
                </tr>
              </thead>
              <tbody>            
             @php
               $count3=0;
             @endphp 
            @foreach($files as $file)
                
                @if($file->question_or_answer == 'question')
                <?php
                $count3++;
                ?>
                <tr>
                  <th scope="row">{{$count3++}}</th>
                  <td><a href="{{route('downloadfiles',$file->id)}}" type="button" class="btn btn-primary"> Download <i class="fas fa-download"></i></a></td>
                 
                </tr>
              @else
              <p class="text-danger">No materials uploaded</p>
               @endif
            @endforeach 
             </tbody>
            </table> 
          </div>
         
          </div>
        </div>     
    </div>    
  

@endsection


  