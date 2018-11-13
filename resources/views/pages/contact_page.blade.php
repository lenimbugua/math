@extends('layouts.app')

@section('content')
<div class="map-banner-background">
      <div class="row no-gutter">
        <div  id="map">
        	<div class="centerthenav">
        		<nav class="navbar fixed-top navbar-expand-lg navbar-light " id="scrolled">
  
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto">
			      <li class="nav-item active">
			        <a class="nav-link text-light" href="home">Home <span class="sr-only">(current)</span></a>
			      </li>  
			      
			    </ul>
			    
			  </div>
			</nav>
        	</div>
        	
          <div class="row no-gutter">
            <div class="banner-text">              
            </div>            
          </div>                    
        </div>
      </div>     
    </div>
    <div class="row no-gutter">
      <div class="main-content-area">
        <div class="the-contents"> 
        	<div class="row no-gutter">
        		<div class="col-md-6">
        			<h2><strong>Send us a message</strong></h2>
					You can contact us with anything related to our Products. We'll get in touch with you as soon as possible. 
						@include('includes.messages')
						<div style="margin: 15px">
							{!! Form::open(['action' => 'ContactsController@store', 'method' => 'POST']) !!}
						<div class="form-group row">
					       {{Form::label('name', 'Your Name', ['for'=>'name','class'=>'font-weight-bold'])}} 
						   
						    	{{Form::text('name', '',['class'=>'form-control'])}}  
						</div>
						<div class="form-group row">
					       {{Form::label('email', 'Email Address', ['for'=>'email','class'=>'font-weight-bold'])}} 
						   
						    	{{Form::email('email', '',['class'=>'form-control'])}}  
						</div>
						<div class="form-group row">
					       {{Form::label('phone', 'Phone', ['for'=>'phone','class'=>'font-weight-bold'])}} 
						   
						    	{{Form::number('phone', '',['class'=>'form-control'])}}  
						</div>
						<div class="form-group row">
					    	{{Form::label('message', 'Your Message', ['for'=>'message','class'=>'font-weight-bold'])}} 
						   
						    {{Form::textarea('message', '', ['id'=>'article-ckeditor','class'=>'form-control'])}}
						    {{Form::hidden('category', 'contactus', ['id'=>'category','class'=>'form-control'])}}	      		
						    
						</div> 
						
						<div class="form-group row">
							{{Form::submit('Contact Us',['class'=>'buttons btn btn-lg btn-lg-block', 'style'=>'background:#9C27B0'])}}
						</div>         
						
					{!! Form::close() !!}
						</div>
					
        		</div>
        		<div class="col-md-6 p-4">
        			<div class="contacts">
        				<div class="row mb-2">
	        				<h1><strong><i class="fas fa-phone-volume rotate" style="color: #9C27B0"></i></strong></h1><h5 class="m-3"><strong>Give Us A Ring</strong></h5>
	        			</div>
        				
        				
						<div class="pl-4 mb-4">
							Pronto Labs<br> 
							+40 762 321 762<br> 
							24/7 Expert Support<br>
						</div>

						<div class="row mb-2">
	        				<h1><strong><i class="fas fa-envelope" style="color: #9C27B0"></i></strong></h1><h5 class="m-3"><strong>Mail Us</strong></h5>
	        			</div>
        				
        				
						<div class="pl-4 mb-4">
							Pronto Labs<br> 
							info@prontolabs.io<br> 
							24/7 Expert Support<br>
						</div>

						<div class="mb-4">
							<a href="{{ route('orders.create') }}" class="buttons btn btn-primary btn-lg btn-block" role="button" style="background: #9C27B0" aria-pressed="true">Make an Order Now</a>
						</div>
						
        			</div>
        			
        			
        		
        	</div>
		        
				
				
			    
        </div>
      </div>
    </div>
</div>
    <div class="blog-footer">
    	@include('includes.footer')
    </div>

@endsection
