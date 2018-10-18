@extends('layouts.app')

@section('content')
   
    <div class="container">
         
    <div class="client-login-card-header">
        <div class="d-flex justify-content-between">
                <a  class="btn btn-link text-light" href="{{ route('home') }}">
                    {{ __('Home') }}                
                </a>
                <a  class="btn btn-link text-light" href="{{ route('client.dashboard') }}">
                    <strong><i class="fas fa-tachometer-alt"></i> {{ __('My Dashboard') }}</strong>
                </a>
        </div> 
    </div>
    <div class="add-blog-body">
    	@include('includes.messages')
        {!! Form::open(['action' => 'OrdersController@store', 'method' => 'POST','files' => true]) !!}
	    <div class="form-group row">
	       {{Form::label('category', 'Category', ['class'=>'col-sm-2 col-form-label'])}} 
		   <div class="col-sm-10">
		    	{{Form::select(
		    		'category',		    		
		    		['Mathematics' => 'Mathematics',
		    		 'Accounting' => 'Accounting',
		    		 'Statistics' => 'Statistics'		    		 
		    		], 
		    		 'Mathematics',
		    		 ['class'=>'form-control']
		    	)}}	      		
		    </div>
		</div>
		<div class="form-group row">
	    	{{Form::label('academicLevel', 'Academic Level', ['class'=>'col-sm-2 col-form-label'])}} 
		    <div class="col-sm-10">
		    	{{Form::select(
		    		'academicLevel',		    		
		    		['High School' => 'High School',
		    		 'College Level' => 'College Level',
		    		 'Graduate One' => 'Graduate One',
		    		 'Masters' => 'Masters',
		    		 'PhD' => 'PhD'
		    		], 
		    		 'College Level',
		    		 [
		    		 	'class'=>'form-control',
		    		    'onchange'=>'calculateCost()',
		    		    'id'=>'academiclevel'
		    		]
		    		 
		    	)}}	      		
		    </div>
		</div>
		<div class="form-group row"> 
	    	{{Form::label('noofquestions', 'Number Of Questions', ['class'=>'col-sm-2 col-form-label'])}} 
		   {{--  <div class="col-sm-10">
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
		    </div> --}}
		    <div class="btn round-buttons" onclick="addQuestion()">+</div>
                      <input id="numberofquestions" type="number" name="noofquestions" min="1" value="1"style="width: 5rem; color: #9C27B0" class="m-2 form-control font-weight-bold">
                      {{-- <div class="round-buttons">0</div> --}}
                      <div class="btn round-buttons" onclick="minusQuestion()">-</div>
		</div>
		<div class="form-group row">
	    	{{Form::label('urgency', 'Urgency', ['class'=>'col-sm-2 col-form-label'])}} 
		    <div class="col-sm-10">
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
	    	{{Form::label('amount', 'Amount', ['class'=>'col-sm-2 col-form-label'])}} 
		    <div class="col-sm-10">
		    	<h2><span class="badge badge-warning" id="totalcost" onclick="calculateCost()">$ 107</span></h2>      		
		    </div>
		</div>
		{{Form::hidden('totalcost','107',['id'=>'hiddentotalcost'])}}
			<div class="form-group row">
		    	{{Form::label('instructions', 'Instructions', ['class'=>'col-sm-2 col-form-label'])}} 
			    <div class="col-sm-10">
			    	{{Form::textarea('instructions', '', ['id'=>'article-ckeditor','class'=>'form-control'])}}	      		
			    </div>
			</div>
			<div class="form-group row">
		    	{{Form::label('files', 'Upload Materials', ['class'=>'col-sm-2 col-form-label'])}} 
			    <div class="col-sm-10">
			    	{{Form::file('files[]', ['id'=>'file','class'=>'form-control buttons','multiple'])}}	      		
			    </div>
			</div>
			<div class="form-group row">
				<div class="col-md-10 offset-md-2">
					{{Form::submit('Submit',['class'=>'btn btn-success btn-lg btn-block '])}}
				</div>				
			</div>           
			
		{!! Form::close() !!}
    </div>
        
    </div>
    @include('includes.js.cost_calculator')
 @include('includes.js.ck_editor')   
@include('includes.footer')

@endsection





