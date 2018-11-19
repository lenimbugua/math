@extends('layouts.app')
@section('content')
<div class="card text-center  ">
  <div class=" fixed-header fixed-top">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs d-flex justify-content-between">
    <div >
      <li class="nav-item">
        <a class="nav-link text-whiten" href="{{ route('adminrevisions.index', ['id'=>$orderId] )}}">Back</a>
      </li>
     
      
    </div>
    <div >
      <li class="nav-item">
        <a class="nav-link active bg-active" href="#">Revision Details</a>
      </li>    
    </div>
    <div class="nav nav-tabs card-header-tabs">
      
    </div>
  </ul>
  </div>
</div>
  <div class="card-body bg-greey message-body">
    <div class="container">
      @include('includes.messages')
      <div class="row no-gutter">
        <div class="col-12">
          <div class="card mt-2 p-2  bg-white rounded text-left ">
            
            @if($revisions!= null)
              <div class="show-order-item mb-3">             
                <h5 class="card-title rounded pl-1 pr-1 bg-white pt-1 pb-1 mb-0">Revision Instructions for Order {!!$revisions->order_id!!}</h5>             
              </div>          
              {!!$revisions->instructions!!}
            @endif
        </div>
        </div>
          
      </div>
     
    </div>

  </div>

    
  </div>
</div>

 
@endsection


 