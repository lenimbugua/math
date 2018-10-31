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
        <a class="nav-link active bg-active-grey" href="#">Details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="{{ route('client.showfiles') }}/{{$order->id}}">Files</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="{{ route('client.ordermessages') }}/{{$order->id}}">Messages</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="{{ route('chat',['id'=>$order->id]) }}">Chat</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="{{ route('revisions.index',['id'=>$order->id]) }}">Revisions</a>
      </li>
      
    </div>
    <div class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link text-primary" href="{{ route('orders.show',['id'=>$order->id]) }}">Edit</a>
      </li>
     
      
    </div>
  </ul>
  </div>
</div>
  <div class="card-body bg-greey message-body">
    <div class="container">
     <div class="row d-flex justify-content-center mb-0">
     <h5 class="card-title rounded pl-4 pr-4 bg-white pt-3 pb-3 mb-0">Order {{$order->id}}</h5>
     
            
   </div>
    <div class="row no-gutter mt-0 pb-0">
        <div class="col-12">
          <div class="card mt-0 p-2 mb-2 bg-white rounded text-left ">          
            <div class="show-order-item mb-3">
              <small class="item-title font-weight-light">Title</small><br>
              <h6>{{$order->title}}</h6>
            </div>
        </div>
        </div>
          
      </div>
         
    <div class="row no-gutter">
       <div class="col-md-4">
        <div class="card mr-3 p-3 bg-white rounded text-left ">
          <div class="show-order-item mb-3">
            <small class="item-title font-weight-light">Created at</small><br>
            {{$order->created_at}}<br>
          </div>
          <div class="show-order-item mb-3">
            <small class="item-title">Deadline</small><br>
            {{$order->deadline}}<br>
          </div>
          <div class="show-order-item mb-3">
            <small class="item-title">Price</small><br>
            {{$order->cost}}<br>
          </div>
          <div class="show-order-item mb-3">
            <small class="item-title">Payment Status</small><br>
            @if($order->amount_paid==0)
            Unpaid<br>
            @else
            Paid<br>
            @endif
          </div>
          <div class="show-order-item mb-3">
            <small class="item-title">Order Status</small><br>
            @if($order->amount_paid==0)
            Waiting for Payment<br>
            @else
            Progress is <span class="font-weight-bold" style="color: #9C27B0" >{{$order->progress}}%</span>
            @endif
          </div>
          
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mr-2 p-3 bg-white rounded text-left ">
          <div class="show-order-item mb-3">
            <small class="item-title font-weight-light">Subject</small><br>
            {{$order->subject}}<br>
          </div>
          <div class="show-order-item mb-3">
            <small class="item-title">Academic Level</small><br>
            {{$order->academic_level}}<br>
          </div>
          <div class="show-order-item mb-3">
            <small class="item-title">Type of Paper</small><br>
            {{$order->paper_type}}<br>
          </div>
          <div class="show-order-item mb-3">
            <small class="item-title">Paper Format</small><br>
            {{$order->paper_format}}<br>
          </div>
          
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-3 bg-white rounded text-left ">
       <div class="show-order-item mb-3">

            <small class="item-title font-weight-light">Writer Category</small><br>
            Pro Writer<br>
          </div>
          <div class="show-order-item mb-3">
            <small class="item-title">Pages</small><br>
            {{$order->number_of_pages}}<br>
          </div>
          <div class="show-order-item mb-3">
            <small class="item-title">Sources/References</small><br>
            {{$order->number_of_sources}}<br>
          </div>
      </div>
    </div>
     
    </div>  
    

      <div class="row no-gutter">
        <div class="col-12">
          <div class="card mt-2 p-2  bg-white rounded text-left ">
            <div class="show-order-item mb-3">
            <h5 class="card-title rounded pl-1 pr-1 bg-white pt-1 pb-1 mb-0">Order Instructions</h5>
            
          </div>
          
            {!!$order->instructions!!}
        </div>
        </div>
          
      </div>
    </div>

  </div>

    
  </div>
</div>
@endsection


 