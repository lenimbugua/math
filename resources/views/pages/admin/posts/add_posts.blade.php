@extends('layouts.app')

@section('content')
   
    <div class="container">
         
	    <div class="client-login-card-header">
	        <div class="d-flex justify-content-between">
	                <a  class="btn btn-link text-light" href="{{ route('home') }}">
	                    {{ __('Home') }}                
	                </a>
	                <a  class="btn btn-link text-light" href="{{ route('login') }}">
	                    <strong><i class="fas fa-user-edit"></i>{{ __('Login') }}</strong>
	                </a>
	        </div> 
	    </div>
	    <div class="add-blog-body">
	        {!! Form::open(['action' => 'BlogController@store', 'method' => 'POST']) !!}
				<div class="form-group row">
			       {{Form::label('title', 'Title', ['class'=>'col-sm-1 col-form-label'])}} 
				   <div class="col-sm-11">
				    	{{Form::text('title', '',['class'=>'form-control'])}}    		
				    </div>
				</div>
				<div class="form-group row">
			    	{{Form::label('body', 'Body', ['class'=>'col-sm-1 col-form-label'])}} 
				    <div class="col-sm-11">
				    	{{Form::textarea('body', '', ['id'=>'article-ckeditor','class'=>'form-control'])}}	      		
				    </div>
				</div> 
				<input type="hidden" name="category" value="{{$category}}"> 
				<div class="col-md-10 offset-md-1">
					{{Form::submit('Submit',['class'=>'buttons btn btn-lg btn-lg-block btn-primary'])}}
				</div>         
				
			{!! Form::close() !!}
	    </div>
        
    </div>
 @include('includes.js.ck_editor')   
@include('includes.footer')

@endsection



