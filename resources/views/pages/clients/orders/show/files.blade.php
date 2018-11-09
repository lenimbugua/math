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
          @if ($files->isEmpty()) 
             <div class="card">
                <div class="card-body">
                  <h6 class="text-danger"> There are no files uploaded <a href="{{ route('orders.create') }}">Create new order?</a></h6>
                </div>
              </div>
          @else
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
                      @else
                      <p class="text-danger">Solutions are yet to be uploaded</p>
                     @endif
                  @endforeach
                  
                  </tbody>
              </table>
                </div>
                <div class="col p-4">
                  <div style="width: 15rem">
                    <div class="row m-3">
                    <a href="{{route('revisions.create',$id)}}" type="button" class=" buttons btn btn-block btn-info" style="background: #8E2D83; height: 3rem"> Send Revision Request </a>
                  </div>
                  <div class="row m-3">
                    <a href="{{ route('approve',$id) }}" type="button" class="buttons btn btn-large btn-block btn-success" style="background:#28A745; height: 3rem"> Approve <i class="fas fa-check"></i></a>
                  </div>
                  </div>
                  
                  
                </div>
              </div>

              <strong>NB</strong> <p>The above files are not editable nor printable until you approve by clicking approve button above according to Pronto Labs <a href="{{ route('legal.blogs',['category'=>'revisionpolicy']) }}" target="blank">Revision Policy</a></p> 
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
          @endif

        </div>     
    </div>    
  

@endsection


  