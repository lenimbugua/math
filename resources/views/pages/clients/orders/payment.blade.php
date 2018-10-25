@extends('layouts.app')

@section('content')

      <div class="row no-gutter">
        
          <div class="legal-banner">
            <nav class="navbar fixed-top navbar-expand-lg navbar-light legal " >
  
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
      <div class="main-content-area">
        <div class="the-contents"> 
          <div class="row no-gutter">
            <div class="col-md-6">
              <h2><strong>Simple and Secure</strong></h2>
         We accept: VISA, American Express, JCB, Mastercard, ICBC and many more 
          
            <div style="margin: 15px">
              <form action="{{route('charge')}}" method="POST" id="payment-form">
                {{ csrf_field() }}

                <div class="form-group row">
                     {{Form::label('name', 'Your Name', ['for'=>'name','class'=>'font-weight-bold'])}} 
                   
                      <input name="name" class="form-control" id="example1-name" data-tid="elements_examples.form.name_placeholder" type="text" placeholder="Jane Doe" required="" autocomplete="name">
                </div>
                <div class="form-group row">
                     {{Form::label('email', 'Email Address', ['for'=>'email','class'=>'font-weight-bold'])}} 
                   
                      <input name="email" class="form-control" id="example1-email" data-tid="elements_examples.form.email_placeholder" type="email" placeholder="janedoe@gmail.com" required="" autocomplete="email"> 
                </div>
                <div class="form-group row">
                     {{Form::label('phone', 'Phone', ['for'=>'phone','class'=>'font-weight-bold'])}} 
                   
                      <input name="phone" class="form-control" id="example1-phone" data-tid="elements_examples.form.phone_placeholder" type="tel" placeholder="(941) 555-0123" required="" autocomplete="tel">  
                </div>
                <div class="form-group row mb-1">
                    {{Form::label('message', 'Your Card', ['for'=>'card','class'=>'font-weight-bold'])}}                    
                </div> 
                <div class="row mb-2">
                     <div id="card"></div> 
                   </div>
             
                  <div class="form-group row">
                    @if(session('cost'))
                       <input type="hidden" name="cost" value="{{session('cost')}}">
                       @if(is_null($id))
                          <input type="hidden" name="last_insert_id" value="{{session('last_insert_id')}}">
                        @else
                          <input type="hidden" name="last_insert_id" value="{{$id}}">
                        @endif
                       
                      
                        <button type="submit" data-tid="elements_examples.form.pay_button"class="buttons btn btn-primary btn-lg btn-block" role="button" style="background: #6772E5" aria-pressed="true">Pay $ {{session('cost')}} 
                        </button> 
                  
                    @endif  
                  </div>         
            
                </form>
            </div>
          
            </div>
            <div class="col-md-6 p-4">
              <div class="contacts">
                <div class="row mb-2">
                  <h1><strong><i class="fab fa-cc-visa" style="color: #0061B2"></i>  </strong></h1><h5 class="m-3"><strong>VISA</strong></h5>
                </div>
                
                
            <div class="pl-4 mb-4">
              Pronto Labs<br> 
              +40 762 321 762<br> 
              24/7 Expert Support<br>
            </div>

            <div class="row mb-2">
                  <h1><strong><i class="fab fa-cc-mastercard" style="color: #F79E1B"></i> </strong></h1><h5 class="m-3"><strong>Mastercard</strong></h5>
                </div>
                
                
            <div class="pl-4 mb-4">
              Pronto Labs<br> 
              info@prontolabs.io<br> 
              24/7 Expert Support<br>
            </div>

            <div class="row mb-2">
                  <h1><strong><i class="fab fa-cc-amex" style="color: #46A5E5"></i>  </strong></h1><h5 class="m-3"><strong>American Express</strong></h5>
            </div>
                
                
            <div class="pl-4 mb-4">
              Pronto Labs<br> 
              info@prontolabs.io<br> 
              24/7 Expert Support<br>
            </div>

            <div class="row mb-2">
                  <h1><strong><i class="fab fa-cc-jcb" style="color: #C21533"></i>  </strong></h1><h5 class="m-3"><strong>JCB Co., Ltd.</strong></h5>
            </div>
                
                
            <div class="pl-4 mb-4">
              Pronto Labs<br> 
              info@prontolabs.io<br> 
              24/7 Expert Support<br>
            </div>



           
              </div>
              
              
            
          </div>
            
        
        
          
        </div>
      </div>
    </div>
</div>
	
@include('includes.js.payment2')
@endsection