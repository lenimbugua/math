      </ul>
@extends('layouts.app')
@section('content')
  <div class="card text-center ">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
          <a class="nav-link" href="#">Details</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Files</a>
        </li>
        
      </ul>
    </div>
    <div class="card-body">
      <h5 class="card-title">Order #{{$order->id}}: Files</h5>  
      <div class="row no-gutter">
           <div class="col">
             <div class="card m-6 mt-3 mb-6 p-2 bg-white rounded">

            
           @php
             $count2=0;
           @endphp
              @foreach($files as $file)
                
                @if($file->order_id==$order->id and $file->question_or_answer == 'answer')
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


  