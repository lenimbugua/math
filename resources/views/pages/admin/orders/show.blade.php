@extends('layouts.app')

@section('content')
	<a href="/orders" class="btn btn-success">Go back</a>
	<h1>{{$order->category}}</h1>
	<div>{!!$order->instructions!!}</div>
	<hr>
	<small> Ordered on {{$order->created_at}}</small>	
@endsection