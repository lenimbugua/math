@extends('layouts.app')

@section('content')
        <div class="row no-gutter">        
            <div class="auth-login-banner">
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
        </div>          
        <div class="auth-form-wrapper">
            <div class="row d-flex justify-content-center"><h3>Login Form</h3></div>
            <div class="row d-flex justify-content-center">
                <div class="auth-form ">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label text-md-right">{{ __('Email') }}</label>

                                <div class="col-md-9">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-9">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-1">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-1 d-flex justify-content-center">
                               
                                    
                                    <button id="green" type="submit" class=" buttons btn btn-lg ">
                                        {{ __('Login') }}
                                    </button>                              
                                
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-1">
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                                 
                            </div>

                            <div class="form-group row">
                                
                                    <div class="col-md-8 offset-md-1">
                                        <label>
                                            <a  class="btn btn-link text-md-center" href="{{ route('register') }}">
                                        {{ __('Do not have an account yet? Register here') }}
                                    </a>
                                        </label>
                                    </div>
                                
                            </div>
                        </form>
                </div>
            </div>           
        </div>        
       

@endsection







