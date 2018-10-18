@extends('layouts.app')
@section('content')
  <div class="card text-center ">
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
        <a class="nav-link active bg-active-grey" href="#">Files</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="{{ route('admin.ordermessages') }}/{{$id}}">Messages</a>
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
    <div class="card-body bg-greey">
      <h5 class="card-title">Order #{{$id}}: Files</h5>  
      <div class="row no-gutter">
           <div class="col">
             <div class="card p-5 bg-white rounded">

            
           @php
             $count2=0;
           @endphp
              @foreach($files as $file)
                
                @if($file->question_or_answer == 'answer')
                <?php
                $count2++;
                ?>
               <div class="row">
                 <div class="col-2">
                    {{$count2}}
                </div>
                  <div class="col-10">
                    <a class="buttons file-downloads" href="{{route('downloadfiles',$file->id)}}"><i class="fas fa-file-download"></i>Download</a>
                  </div> 
                </div>
               @endif
            @endforeach 
          </div>
          </div>
        </div>     
    </div>    
  </div>

@endsection


  