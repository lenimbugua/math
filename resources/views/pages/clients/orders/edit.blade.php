@extends('layouts.app')

@section('content')
	{!! Form::open(['action' => ['OrdersController@update', $order->id], 'method' => 'POST']) !!}
	    <div class="form-group row">
	       {{Form::label('category', 'Category', ['class'=>'col-sm-4 col-form-label'])}} 
		   <div class="col-sm-8">
		    	{{Form::select(
		    		'category',		    		
		    		['M' => 'Mathematics',
		    		 'A' => 'Accounting',
		    		 'S' => 'Statistics'		    		 
		    		], 
		    		 'M',
		    		 ['class'=>'form-control']
		    	)}}	      		
		    </div>
		</div>
		<div class="form-group row">
	    	{{Form::label('academicLevel', 'Academic Level', ['class'=>'col-sm-4 col-form-label'])}} 
		    <div class="col-sm-8">
		    	{{Form::select(
		    		'academicLevel',		    		
		    		['H' => 'High School',
		    		 'C' => 'Collage Level',
		    		 'G' => 'Graduate One',
		    		 'M' => 'Masters',
		    		 'P' => 'PhD'
		    		], 
		    		 'H',
		    		 ['class'=>'form-control']
		    	)}}	      		
		    </div>
		</div>
		<div class="form-group row">
	    	{{Form::label('urgency', 'Urgency', ['class'=>'col-sm-4 col-form-label'])}} 
		    <div class="col-sm-8">
		    	{{Form::select(
		    		'urgency',		    		
		    		['12hrs' => '12 Hours',
		    		 '24hrs' => '24 Hours',
		    		 '2days' => '2 Days',
		    		 '3days' => '3 Days',
		    		 '4days' => '4 Days',
		    		 '5days' => '5 Days',
		    		 '6days' => '6 Days',
		    		 '7days' => '7 Days',
		    		 '8days' => '8 Days',
		    		 '9days' => '9 Days',
		    		 '10days' => '10 Days',
		    		 'above10' => 'Above 10 Days'
		    		], 
		    		 '3days',
		    		 ['class'=>'form-control']
		    	)}}	      		
		    </div>
		</div>
		<div class="form-group row">
	    	{{Form::label('instructions', 'Instructions', ['class'=>'col-sm-4 col-form-label'])}} 
		    <div class="col-sm-8">
		    	{{Form::textarea('instructions', $order->instructions, ['id'=>'article-ckeditor','class'=>'form-control'])}}	      		
		    </div>
		</div> 
		{{Form::hidden('_method', 'PUT')}}          
		{{Form::submit('Submit',['class'=>'btn btn-primary'])}}
	{!! Form::close() !!}
@endsection