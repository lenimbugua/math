@extends('layouts.app')

@section('content')
<div class="blog-banner-background">
      <div class="row no-gutter">
        <div class="blog-banner">
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
        	<div class="row no-gutter d-flex justify-content-end">{{$posts->links()}}</div>
		        @foreach($posts as $post)
				
				<h1>{{$post->title}}</h1>

				<div>{!!$post->body!!}</div>
				
				
				
			@endforeach         
        </div>
      </div>
    </div>
    <div class="blog-footer">
    	@include('includes.footer')
    </div>

@endsection
