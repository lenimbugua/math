@extends('layouts.app')

@section('content')
   
    <div class="container">         
	    <div class="client-login-card-header">
	        <div class="d-flex justify-content-between">
	                <a  class="btn btn-link text-light" href="{{ route('home') }}">
	                    {{ __('Home') }}                
	                </a>
	                <a  class="btn btn-link text-light" href="{{ route('admin.dashboard') }}">
	                    <strong><i class="fas fa-tachometer-alt"></i> {{ __('Dashboard') }}</strong>
	                </a>
	        </div> 
	    </div>
	        <div class="login-card-wrapper " id ="register-card-wrapper">   
	        <div class="login-card">
	            

	            <div class="login-card-body">
	                <div class="card" style="width: 18rem;">
					  <div class="card-header">
					    <i class="fas fa-pen"></i> Edit
					  </div>
					  <ul class="list-group list-group-flush">
					    <li class="list-group-item">
					    	<i class="fas fa-plus"></i> Add Blogs
					    	<ol>
					    		<li><a href="{{ route('add.post',['category'=>'math']) }}">A Math Blog</a> </li>
					    		<li><a href="{{ route('add.post',['category'=>'accounting']) }}">An Accounting Blog</a></li>
					    		<li><a href="{{ route('add.post',['category'=>'statistics']) }}">A statistics Blog</a></li>
					    		<li><a href="{{ route('add.post',['category'=>'general']) }}"> A general Blog</a></li>
					    	</ol>
					    </li>
					    <li class="list-group-item">
					    	<a href="{{ route('list.blogs') }}"><i class="fas fa-pen"> </i>Edit Blogs</a>
						</li>
					    <li class="list-group-item">
					    	<a href="{{ route('edit.TPA',['category'=> 'termsandconditions']) }} ">
					    			<i class="fas fa-pen"> </i>Edit Terms and Conditions
					    	</a>
					     	
						</li>
						<li class="list-group-item">
							<a href="{{ route('edit.TPA',['category'=> 'privacypolicy']) }} ">
					    			<i class="fas fa-pen"> </i>Edit Privacy Policy
					    	</a>					     	
						</li>
						<li class="list-group-item">
							<a href="{{ route('edit.TPA',['category'=> 'revisionpolicy']) }} ">
					    			<i class="fas fa-pen"> </i>Edit Revision Policy
					    	</a>					     	
						</li>
						<li class="list-group-item">
							<a href="{{ route('edit.TPA',['category'=> 'moneyBG']) }} ">
					    			<i class="fas fa-pen"> </i>Edit Money Back Guarantee
					    	</a>					     	
						</li>
						<li class="list-group-item">
							<a href="{{ route('edit.TPA',['category'=> 'cookiepolicy']) }} ">
					    			<i class="fas fa-pen"> </i>Edit Cookie Policy
					    	</a>					     	
						</li>
						<li class="list-group-item">
							<a href="{{ route('edit.TPA',['category'=> 'disclaimer']) }} ">
					    			<i class="fas fa-pen"> </i>Edit Disclaimer
					    	</a>					     	
						</li>
						<li class="list-group-item">
							<a href="{{ route('edit.TPA',['category'=> 'reportabuse']) }} ">
					    			<i class="fas fa-pen"> </i>Edit Report Abuse
					    	</a>					     	
						</li>
						<li class="list-group-item">
							<a href="{{ route('edit.TPA',['category'=> 'about']) }} ">
					    			<i class="fas fa-pen"> </i>About Us Page
					    	</a>					     	
						</li>
						<li class="list-group-item">
							<a href="blogposts/create"> <i class="fas fa-plus"> </i>Create TPA</a>
					     	
						</li>
					  </ul>
					</div>
	            </div>
	        </div>        
	    </div>
    </div>
    
@include('includes.footer')

@endsection
