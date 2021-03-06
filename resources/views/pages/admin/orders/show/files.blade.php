{{-- <div class=" fixed-header fixed-top">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs d-flex justify-content-between">
        <div >
          <li class="nav-item">
            <a class="nav-link text-whiten" href="{{route('client.dashboard')}}">Back</a>
          </li>          
        </div>
        <div class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link text-whiten " href="/dashboard/{{$id}}">Details</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active bg-active-grey" href="#">Files</a>
          </li>          
           <li class="nav-item">
            <a class="nav-link text-whiten" href="{{ route('revisions.index',['id'=>$id]) }}">Revisions</a>
          </li>
          
        </div>
        <div class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
           
          </li>
          
          
        </div>
      </ul>
    </div>
  </div>
 --}}
  @extends('layouts.app')
@section('content')
  <div class="card text-center ">
    <div class=" fixed-header fixed-top">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs d-flex justify-content-between">
        <div >
          <li class="nav-item">
            <a class="nav-link text-whiten" href="{{route('admin.dashboard')}}">Back</a>
          </li>          
        </div>
        <div class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link text-whiten " href="/adminfunctions/{{$id}}">Details</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active bg-active-grey" href="#">Files</a>
          </li>          
           <li class="nav-item">
            <a class="nav-link text-whiten" href="{{ route('adminrevisions.index',['id'=>$id]) }}">Revisions</a>
          </li>
          
        </div>
        <div class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
           
          </li>
          
          
        </div>
      </ul>
    </div>
  </div>
    
    <div class="card-body bg-greey message-body text-center">
      <div class="row d-flex justify-content-center">
       
     </div>  
      <div class="row no-gutter d-flex justify-content-center">
          @if ($files->isEmpty()) 
             <div class="card">
                <div class="card-body">
                  @if($order->amount_paid<$order->cost)
                    @php
                        $count=0;
                        $deficit = $order->cost-$order->amount_paid;
                        session(['cost' => $order->cost]);
                        session(['id' => $order->id]);
                    @endphp
                    <h6 class="text-primary">The client has not fully paid for this order</h6>
                     
                  @else
                    <h6 class="text-primary">You have not uploaded any file. Progress is <span style="color: #894C84; font-weight: bold;">{{$order->progress}}% <span> </h6>
                  @endif

                </div>
              </div>
          @else
            @php
              $hasSolution=false
            @endphp
            @foreach($files as $file)
                      
                      @if($file->question_or_answer == 'answer')
                        @php
                          $hasSolution=true
                        @endphp
                        @break
                      @endif
            @endforeach
            @php
              $hasMaterials=false
            @endphp
            @foreach($files as $file)
                      
                      @if($file->question_or_answer == 'question')
                        @php
                          $hasMaterials=true
                        @endphp
                        @break
                      @endif
            @endforeach

            @if($hasSolution)
              <div class="card p-4 mb-5  messages rounded " style="width: 90%">
              
                    <h6 class="card-title text-success">Solutions</h6> 
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                                       <table class="table table-sm table-bordered" style="width: 18rem">  
                     <thead>
                            <tr>
                              <th scope="col"></th>
                              <th scope="col" colspan="3">Files</th>                  
                            </tr>
                          </thead>
                          <tbody>          
                       @php
                         $count2=0;

                       @endphp
                          
                          @foreach($files as $file)
                            
                            @if($file->question_or_answer == 'answer')

                            <?php
                            $count2++;

                            ?>
                             
                           <tr>
                              <th scope="row">{{$count2}}</th>
                              <td><a href="{{route('downloadfiles',$file->id)}}" type="button" class="buttons btn btn-primary"> Download <i class="fas fa-download"></i></a></td>
                              
                            </tr>
                            
                           @endif
                        @endforeach
                        
                        </tbody>
                    </table>
                      </div>
                      
                      
                      
                    </div>
                    
                </div>
            @else
                            <p class="text-danger">Solutions are yet to be uploaded</p>
            @endif


        </div>
        @if($hasMaterials)
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
              
               @endif
            @endforeach 
             </tbody>
            </table> 
          </div>
         
          </div> 
          @endif  
          @endif

        </div>     
    </div>   

@include('includes.js.payment')
@endsection


  