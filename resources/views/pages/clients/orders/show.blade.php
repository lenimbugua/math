@extends('layouts.app')

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

@endsection