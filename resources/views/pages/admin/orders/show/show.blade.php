@extends('layouts.app')
@section('content')
<div class="card text-center  ">
  <div class=" fixed-header fixed-top">
    <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs d-flex justify-content-between">
      <div >
      <li class="nav-item">
        <a class="nav-link text-primary" href="{{route('admin.dashboard')}}">Back</a>
      </li>
     
      
    </div>
    <div class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active bg-active-grey" href="#">Details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="{{ route('admin.showfiles') }}/{{$order->id}}">Files</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="{{ route('admin.ordermessages') }}/{{$order->id}}">Messages</a>
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
@endsection


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