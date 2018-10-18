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
      
    </div>
    <div class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link text-primary" href="#">Edit</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-danger" href="{{ route('client.showfiles') }}/{{$order->id}}">Delete</a>
      </li>
      
    </div>
  </ul>
  </div>
</div>
  <div class="card-body bg-greey message-body">
    <div class="container">
     <div class="row d-flex justify-content-center">
     <h5 class="card-title rounded pl-4 pr-4 bg-white pt-3 pb-3">Order {{$order->id}}</h5>
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
            {{$order->urgency}}<br>
          </div>
          <div class="show-order-item mb-3">
            <small class="item-title">Price</small><br>
            {{$order->cost}}<br>
          </div>
          <div class="show-order-item mb-3">
            <small class="item-title">Payment Status</small><br>
            @if($order->amount_payed==0)
            Unpayed<br>
            @else
            Payed<br>
            @endif
          </div>
          <div class="show-order-item mb-3">
            <small class="item-title">Order Status</small><br>
            @if($order->amount_payed==0)
            Waiting for Payment<br>
            @else
            Progress is {{$order->progress}}<br>
            @endif
          </div>
          
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mr-2 p-3 bg-white rounded text-left ">
          <div class="show-order-item mb-3">
            <small class="item-title font-weight-light">Category</small><br>
            {{$order->category}}<br>
          </div>
          <div class="show-order-item mb-3">
            <small class="item-title">Academic Level</small><br>
            {{$order->academic_level}}<br>
          </div>
          
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-3 bg-white rounded text-left ">
       <div class="show-order-item mb-3">

            <small class="item-title font-weight-light">Writer Category</small><br>
            Best Available Writer<br>
          </div>
          <div class="show-order-item mb-3">
            <small class="item-title">Problems</small><br>
            {{$order->number_of_questions}}<br>
          </div>
      </div>
    </div>
     
    </div>
    
   <div class="row d-flex justify-content-center">
     <h5 class="card-title rounded pl-4 pr-4 bg-white pt-3 pb-3">Order Instructions</h5>
   </div>
   
    

      <div class="row no-gutter">
        <div class="col-12">
          <div class="card mt-3 p-2  bg-white rounded text-left ">
          
            {!!$order->instructions!!}
        </div>
        </div>
          
      </div>
    </div>

  </div>

    
  </div>
</div>
@endsection


 