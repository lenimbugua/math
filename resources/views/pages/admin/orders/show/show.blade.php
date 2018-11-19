@extends('layouts.app')
@section('content')
<div class="card text-center  ">
  <div class=" fixed-header fixed-top">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs d-flex justify-content-between">
       <div>
          <li class="nav-item">
            <a class="nav-link text-whiten" href="{{route('admin.dashboard')}}">Back</a>
          </li>
         
          
        </div>
        <div class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link active bg-active-grey" href="#">Details</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-whiten" href="{{ route('admin.showfiles') }}/{{$order->id}}">Files</a>
          </li>
          
        </div>
        <div class="nav nav-tabs card-header-tabs">
          
          
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


 






{{-- @extends('layouts.app')
@section('content')
<div class="card text-center  ">
  <div class=" fixed-header fixed-top">
    <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs d-flex justify-content-between">
    <div>
      <li class="nav-item">
        <a class="nav-link text-whiten" href="{{route('admin.dashboard')}}">Back</a>
      </li>
     
      
    </div>
    <div class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active bg-active-grey" href="#">Details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-whiten" href="{{ route('admin.showfiles') }}/{{$order->id}}">Files</a>
      </li>
      
    </div>
    <div class="nav nav-tabs card-header-tabs">
      
      
    </div>
      
    </ul>
  </div>
  </div>
  
  <div class="card-body bg-greey">
    <h5 class="card-title">Order #{{$order->id}}</h5>
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
    
   
   <h5 class="card-title">Order Instructions</h5>
    

      <div class="col">
          <div class="card m-6 mt-3 p-2 bg-white rounded text-left ">
          
            {!!$order->instructions!!}
        </div>
      </div>
  </div>

    
  </div>
</div>
@endsection --}}


  {{-- @extends('layouts.app')

  @section('content')
  	<a href="/orders" class="btn btn-success">Go back</a>
  	<h1>{{$order->category}}</h1>
  	<div>{!!$order->instructions!!}</div>
  	<hr>
  	<small> Ordered on {{$order->created_at}} by {{$order->user->name}}</small>	
  	<hr>
  	@if(!Auth::guest())
  		@if(Auth::user()->id == $order->user_id)
  			<a href="/orders/{{$order->id}}/edit" class="btn btn-info">Edit</a>
  			{!!Form::open(['action'=>['OrdersController@destroy', $order->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
  				{{Form::hidden('_method','DELETE')}}
  				{{Form::submit('Delete',['class'=>'btn btn-danger'])}}
  			{!!Form::close()!!}
  		@endif
  	@endif

  @endsection --}}