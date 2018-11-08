
@extends('layouts.app')

@section('content')
   <div style="color: #9C27B0" class="badge badge-warning price-badge font-weight-bold d-flex justify-content-center">
   	<div class="row mb-2"><h6 class="">Cost</h6></div>
   	<div class="row mt-3" id="totalcost" onclick="displayCost()" >$ {{$orders->cost}}</div>
   </div>
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
        {!! Form::open(['action' => ['OrdersController@update', $orders->id], 'method' => 'POST','files' => true]) !!}
        @include('includes.paper_type_edit')
        @include('includes.subject_edit')
	    <div class="form-group row">
	       {{Form::label('title', 'Title', ['class'=>'col-sm-2 col-form-label'])}} 
		   <div class="col-sm-10">
		    	{{Form::text('title', $orders->title, ['class'=>'form-control','placeholder'=>'Type Title Here.....'] )}}	      		
		    </div>
		</div>
		<div class="form-group row">
	    	{{Form::label('academicLevel', 'Academic Level', ['class'=>'col-sm-2 col-form-label'])}} 
		    <div class="col-sm-10">
		    	{{Form::select(
		    		'academicLevel',		    		
		    		['High School' => 'High School',		    		 
		    		 'Undergraduate' => 'Undergraduate',
		    		 'Master' => 'Masters',
		    		 'PhD' => 'PhD'
		    		], 
		    		 $orders->academic_level,
		    		 [
		    		 	'class'=>'form-control',
		    		    'onchange'=>'paperType()',
		    		    'id'=>'academicLevel'
		    		]
		    		 
		    	)}}	      		
		    </div>
		</div>
		<div class="form-group row"> 
	    	{{Form::label('numberofpages', 'Number Of Pages', ['class'=>'col-sm-2 col-form-label'])}} 
		   
		     <button type="button" href="#" class="btn round-buttons text-center" onclick="addQuestion()" id="add">+</button>
              <input id="numberofpages" type="number" name="numberofpages" min="1" value="{{$orders->number_of_pages}}"oninput="paperType()" style="width: 5rem; color: #9C27B0" class="m-2 form-control font-weight-bold">
                      
                      <div class="btn round-buttons" onclick="minusQuestion()">-</div>
                    
		</div>
		<div class="form-group row">
	    	{{Form::label('deadline', 'Deadline', ['class'=>'col-sm-2 col-form-label'])}} 
		    <div class="col-sm-10">
		    	{{Form::select(
		    		'deadline',		    		
		    		['6 Hours' => '6 Hours',
		    		 '12 Hours' => '12 Hours',
		    		 '24 Hours' => '24 Hours',
		    		 '2 Days' => '2 Days',
		    		 '3 Days' => '3 Days',		    		 
		    		 '5 Days' => '5 Days',		    		 
		    		 '7 Days' => '7 Days',		    		 
		    		 '9 Days' => '9 Days',
		    		 '14 Days' => '14 Days'
		    		
		    		], 
		    		 $orders->deadline,
		    		 ['class'=>'form-control', 'onchange'=>'paperType()']
		    	)}}	      		
		    </div>
		</div>
		
		{{Form::hidden('totalcost','8',['id'=>'hiddentotalcost'])}}		
			<div class="form-group row">
		    	{{Form::label('instructions', 'Instructions', ['class'=>'col-sm-2 col-form-label'])}} 
			    <div class="col-sm-10">
			    	{{Form::textarea('instructions', $orders->instructions, ['id'=>'article-ckeditor','class'=>'form-control'])}}	      		
			    </div>
			</div>
			<div class="form-group row">
		    	{{Form::label('paperformat', 'Paper Format', ['class'=>'col-sm-2 col-form-label'])}} 
			    <div class="col-sm-10">
			    	{{Form::select(
			    		'paperformat',		    		
			    		['APA' => 'APA',
			    		 'MLA' => 'MLA',
			    		 'Chicago' => 'Chicago',
			    		 'Havard' => 'Havard',
			    		 'Other' => 'Other'
			    		], 
			    		 $orders->paper_format,
			    		 [
			    		 	'class'=>'form-control',
			    		    'id'=>'paperformat'
			    		]
			    		 
			    	)}}	      		
			    </div>
			</div>
			<div class="form-group row">
				{{Form::label('numberofsources', 'Numer of Sources', ['class'=>'col-sm-2 col-form-label'])}} 
				<div class="input-group col-sm-10" style="width: 10rem; height: 2.4rem">
					  <div class="input-group-prepend " style="cursor: pointer">
					    <span class="input-group-text" onclick="minus()" >-</span>
					  </div>
					  <input type="number" id="numberofsources" type="number" name="numberofsources" min="1" value="{{$orders->number_of_sources}}" class="form-control font-weight-bold" style="color: #9C27B0">
					  <div class="input-group-append" style="cursor: pointer">
					    <span class="input-group-text" onclick="plus()" >+</span>
					  </div>
				</div>
				
				
			</div>
			<div class="form-group row">
		    	{{Form::label('files', 'Upload Materials', ['class'=>'col-sm-2 col-form-label'])}} 
			    <div class="col-sm-10">
			    	{{Form::file('files[]', ['id'=>'file','class'=>'form-control buttons','multiple'])}}	      		
			    </div>
			</div>
			{{Form::hidden('_method', 'PUT')}}
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






{{-- @extends('layouts.app')

@section('content')
@include('includes.navbar2')
	<div class="container">
		<div class="order-page">
		{!! Form::open(['action' => ['OrdersController@update', $orders->id], 'method' => 'POST','files' => true]) !!}
	    <div class="form-group row">
	       {{Form::label('category', 'Category', ['class'=>'col-sm-4 col-form-label'])}} 
		   <div class="col-sm-8">
		    	{{Form::select(
		    		'category',		    		
		    		['Mathematics' => 'Mathematics',
		    		 'Accounting' => 'Accounting',
		    		 'Statistics' => 'Statistics'		    		 
		    		], 
		    		 $orders->category,
		    		 ['class'=>'form-control']
		    	)}}	      		
		    </div>
		</div>
		<div class="form-group row">
	    	{{Form::label('academicLevel', 'Academic Level', ['class'=>'col-sm-4 col-form-label'])}} 
		    <div class="col-sm-8">
		    	{{Form::select(
		    		'academicLevel',		    		
		    		['High School' => 'High School',
		    		 'College Level' => 'College Level',
		    		 'Graduate One' => 'Graduate One',
		    		 'Masters' => 'Masters',
		    		 'PhD' => 'PhD'
		    		], 
		    		 $orders->academic_level,
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
		    		 'number_of_questions',
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
		    		 $orders->urgency,
		    		 ['class'=>'form-control']
		    	)}}	      		
		    </div>
		</div>
		<div class="form-group row">
	    	{{Form::label('amount', 'Amount', ['class'=>'col-sm-4 col-form-label'])}} 
		    <div class="col-sm-8">
		    	<h2><span class="badge badge-warning" id="totalcost" onclick="calculateCost()">${{$orders->cost}}</span></h2>      		
		    </div>
		</div>
		{{Form::hidden('totalcost','107',['id'=>'hiddentotalcost'])}}
			<div class="form-group row">
		    	{{Form::label('instructions', 'Instructions', ['class'=>'col-sm-4 col-form-label'])}} 
			    <div class="col-sm-8">
			    	{{Form::textarea('instructions', $orders->instructions, ['id'=>'article-ckeditor','class'=>'form-control'])}}	      		
			    </div>
			</div>
			<div class="form-group row">
		    	{{Form::label('files', 'Upload Additional Files', ['class'=>'col-sm-4 col-form-label'])}} 
			    <div class="col-sm-8">
			    	{{Form::file('files[]', ['id'=>'file','class'=>'form-control buttons','multiple'])}}	      		
			    </div>
			</div>
			{{Form::hidden('_method', 'PUT')}}            
			<div class="form-group row">
				<div class="col-md-8 offset-md-4">
					{{Form::submit('Submit',['class'=>'btn btn-success btn-lg btn-block '])}}
				</div>				
			</div> 
		{!! Form::close() !!}
	</div>
	</div>
	@include('includes.footer')
	@include('includes.js.ck_editor')		
@endsection --}}



