

@extends('layouts.app')

@section('content')
	<div>
		{!! Form::open(['action' => 'OrdersController@store', 'method' => 'POST']) !!}
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
		    		['1' => 'High School',
		    		 '2' => 'College Level',
		    		 '3' => 'Graduate One',
		    		 '4' => 'Masters',
		    		 '5' => 'PhD'
		    		], 
		    		 '0',
		    		 [
		    		 	'class'=>'form-control',
		    		    'onchange'=>'calculateCost()',
		    		    'id'=>'academiclevel'
		    		]
		    		 
		    	)}}	      		
		    </div>
		</div>
		<div class="form-group row">
	    	{{Form::label('noofquestions', 'Number Of Questions', ['class'=>'col-sm-4 col-form-label'])}} 
		    <div class="col-sm-8">
		    	{{Form::select(
		    		'noofquestions',		    		
		    		['1' => '1 Question',
		    		 '2' => '2 Questions',
		    		 '3' => '3 Questions',
		    		 '4' => '4 Questions',
		    		 '5' => '5 Questions',
		    		 '6' => '6 Questions',
		    		 '7' => '7 Questions',
		    		 '8' => '8 Questions',
		    		 '9' => '9 Questions',
		    		 '10' => '10 Questions',
		    		 '11' => '11 Questions',
		    		 '12' => '12 Questions'
		    		], 
		    		 '1',
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
	    	{{Form::label('amount', 'Amount', ['class'=>'col-sm-4 col-form-label'])}} 
		    <div class="col-sm-8">
		    	<h2><span class="badge badge-warning" id="totalcost" onclick="calculateCost()">$ 107</span></h2>      		
		    </div>
		</div>
		{{Form::hidden('totalcost','107',['id'=>'hiddentotalcost'])}}
		<div class="form-group row">
	    	{{Form::label('instructions', 'Instructions', ['class'=>'col-sm-4 col-form-label'])}} 
		    <div class="col-sm-8">
		    	{{Form::textarea('instructions', '', ['id'=>'article-ckeditor','class'=>'form-control'])}}	      		
		    </div>
		</div>           
		{{Form::submit('Submit',['class'=>'btn btn-primary'])}}
	{!! Form::close() !!}
	</div>	
@endsection
{{-- <textarea>Next, get a free Cloud API key!</textarea> --}}
