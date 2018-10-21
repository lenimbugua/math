@extends('layouts.app')

@section('content')
<div class="banner-background">
      <div class="row no-gutter">
        <div class="banner">
        	<div class="centerthenav">
        		<nav class="navbar navbar-expand-lg ">
  
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto">
			      <li class="nav-item active">
			        <a class="nav-link" href="home">Home <span class="sr-only">(current)</span></a>
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
        <div class="row no-gutter d-flex justify-content-end">
        	<a href="/blogposts/{{$post->id}}/edit" class="btn btn-info">Edit</a>
        	{!!Form::open(['action'=>['BlogController@destroy', $post->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
  				{{Form::hidden('_method','DELETE')}}
  				{{Form::submit('Delete',['class'=>'btn btn-danger'])}}
  			{!!Form::close()!!}
				
        </div> 
		       
				<h1>{{$post->title}}</h1>

				<div>{!!$post->body!!}</div>

				
				
				
			       
        </div>
      </div>
    </div>
@endsection