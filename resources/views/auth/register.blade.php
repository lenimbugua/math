@extends('layouts.app')

@section('content')
        <div class="row no-gutter">        
            <div class="auth-banner">
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
            <div class="row d-flex justify-content-center"><h3>Create an Account to get Started</h3></div>
            <div class="row d-flex justify-content-center">
                <div class="auth-form ">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}" style="width: 35rem">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('Confirm Password') }}
                            </label>
                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="btn btn-primary buttons btn-lg btn-block">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        <div class="form-group row">                        
                            <div class="col-md-8 offset-md-1">
                                <label>
                                    <a  class="btn btn-link text-md-center" style="text-align: center;" href="{{ route('login') }}">
                                        {{ __('Already have an account? Login here') }}
                                    </a>
                                </label>
                            </div>                        
                        </div>
                    </form>
                </div>
            </div>           
        </div>        
       

@endsection


