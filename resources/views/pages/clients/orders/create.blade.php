@extends('layouts.app')

@section('content')
   <div style="color: #9C27B0" class="badge badge-warning price-badge font-weight-bold d-flex justify-content-center">
   	<div class="row mb-2"><h6 class="">Cost</h6></div>
   	<div class="row mt-3" id="totalcost" onclick="displayCost()" >$19.00</div>
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
        {!! Form::open(['action' => 'OrdersController@store', 'method' => 'POST','files' => true]) !!}
        @include('includes.paper_type2')
        @include('includes.subject')
	    <div class="form-group row">
	       {{Form::label('title', 'Title', ['class'=>'col-sm-2 col-form-label'])}} 
		   <div class="col-sm-10">
		    	{{Form::text('title', '', ['class'=>'form-control','placeholder'=>'Type Title Here.....'] )}}	      		
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
		    		 'High School',
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
              <input id="numberofpages" type="number" name="numberofpages" min="1" value="1"oninput="paperType()" style="width: 5rem; color: #9C27B0" class="m-2 form-control font-weight-bold">
                      
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
		    		 '14 Days',
		    		 ['class'=>'form-control', 'onchange'=>'paperType()']
		    	)}}	      		
		    </div>
		</div>
		
		{{Form::hidden('totalcost','8',['id'=>'hiddentotalcost'])}}
		{{Form::hidden('approved','0',['id'=>'approved'])}}
			<div class="form-group row">
		    	{{Form::label('instructions', 'Instructions', ['class'=>'col-sm-2 col-form-label'])}} 
			    <div class="col-sm-10">
			    	{{Form::textarea('instructions', '', ['id'=>'article-ckeditor','class'=>'form-control'])}}	      		
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
			    		 'APA',
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
					  <input type="number" id="numberofsources" type="number" name="numberofsources" min="1" value="1" class="form-control font-weight-bold" style="color: #9C27B0">
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





