@extends('layouts.app')
@section('content')
<div class="card text-center  ">
  <div class=" fixed-header fixed-top">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs d-flex justify-content-between">
    <div >
      <li class="nav-item">
        <a class="nav-link text-whiten" href="{{route('client.dashboard')}}">Back</a>
      </li>
     
      
    </div>
    <div class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active bg-active-grey" href="#">Details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-whiten" href="{{ route('client.showfiles') }}/{{$order->id}}">Files</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-whiten" href="{{ route('revisions.index',['id'=>$order->id]) }}">Revisions</a>
      </li>
      
    </div>
    <div class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link text-whiten" href="{{ route('orders.show',['id'=>$order->id]) }}">Edit</a>
      </li>
     
      
    </div>
  </ul>
  </div>
</div>
  <div class="card-body bg-greey message-body">
    <div class="container">
     
    <div class="row no-gutter mt-0 pb-0">
        <div class="col-12">
          <div class="card mt-0 p-2 pb-0 mb-2 bg-white rounded text-left ">          
            
              <small class="item-title font-weight-light">Title</small>
              <h6>{{$order->title}}</h6>
           
        </div>
        </div>
          
      </div>
         
    <div class="card-deck">
       
        <div class="card mr-3 p-3 bg-white rounded text-left ">
          <div class="show-order-item mb-3">
            <small class="item-title font-weight-light">Order Id</small><br>
            <span class="font2">{{$order->id}}</span>
          </div>
          <div class="show-order-item mb-3">
            <small class="item-title font-weight-light">Created at</small><br>
            <span class="font2">{{$order->created_at}}</span>
          </div>
          <div class="show-order-item mb-3">
            <small class="item-title">Deadline</small><br>
            <span class="font2">{{$order->deadline}}</span>
          </div>
          <div class="show-order-item mb-3">
            <small class="item-title">Academic Level</small><br>
            <span class="font2">{{$order->academic_level}}</span>
          </div>
          <div class="show-order-item-last">
            <small class="item-title">Type of Paper</small><br>
            <span class="font2">{{$order->paper_type}}</span>
          </div>
                             
        </div>
      
      
        <div class="card p-3 bg-white rounded text-left ">          
          <div class="show-order-item mb-3">
            <small class="item-title font-weight-light">Subject</small><br>
            <span class="font2">{{$order->subject}}</span>
          </div>
          <div class="show-order-item mb-3">
            <small class="item-title">Paper Format</small><br>
            <span class="font2">{{$order->paper_format}}</span>
          </div>
          <div class="show-order-item mb-3">
            <small class="item-title">Pages</small><br>
            <span class="font2">{{$order->number_of_pages}}</span>
          </div>
          <div class="show-order-item mb-3">
            <small class="item-title">Sources/References</small><br>
            <span class="font2">{{$order->number_of_sources}}</span>
          </div>
          <div class="show-order-item-last">
            <small class="item-title">Price</small><br>
            <span class="font2">$ {{$order->cost}}</span>
          </div>
        </div>
      
      
        <div class="card p-3 bg-white rounded text-left ">
          <div class="show-order-item mb-3">
            <small class="item-title font-weight-light">Writer Category</small><br>
           <span class="font2"> Pro Writer</span>
          </div>
          <div class="show-order-item mb-3">
            <small class="item-title">Payment Status</small><br>
            @if($order->amount_paid==0)
              <span class="font2">Unpaid</span>
            @elseif($order->amount_paid < $order->cost)
            <span class="font-weight-bold" style="color: #9C27B0" >${{$order->amount_paid }}</span>Paid <span class="font-weight-bold" style="color: #9C27B0" >${{$order->cost-$order->amount_paid }}</span>remaining 
            @else
               <span class="font2">Paid</span>         
            @endif
          </div>
          <div class="show-order-item mb-3">
            <small class="item-title">Order Status</small><br>
            
            @if($order->amount_paid==0)

               <span class="font2">Waiting for Payment</span>
               
            @elseif($order->amount_paid < $order->cost)
               <span class="font2">please complete payment</span>
               
            @else
                <span class="font2">Progress is</span> <span class="font-weight-bold" style="color: #9C27B0" >{{$order->progress}}%</span>
            @endif
          </div> 
          @php
              $count=0;
              $deficit = $order->cost-$order->amount_paid;
              session(['cost' => $order->cost]);
              session(['id' => $order->id]);
          @endphp
          @if($order->amount_paid==0)             
             @include('includes.modals.client_dashboard_payment_modal')
          @elseif($order->amount_paid < $order->cost)             
             @include('includes.modals.client_dashboard_payment_modal')
          @else
              
          @endif         
      
    </div>
     
    </div>  
    

      <div class="row no-gutter">
        <div class="col-12">
          <div class="card mt-2 p-4  bg-white rounded text-left ">
            <div class="show-order-item mb-3">
            <small class="item-title">Order Instructions</small>
            
          </div>
          
            {!!$order->instructions!!}
        </div>
        </div>
          
      </div>
    </div>

  </div>

    
  </div>
</div>
@include('includes.js.payment')
@endsection


 