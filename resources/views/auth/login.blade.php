@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="client-login-card-header">
            <div class="d-flex justify-content-between">
                <a  class="btn btn-link text-light" href="{{ route('home') }}">
                    {{ __('Home') }}                
                </a>
                <a  class="btn btn-link text-light" href="{{ route('register') }}">
                    <strong><i class="fas fa-user-edit"></i>{{ __('Register') }}</strong>
                </a>
            </div>
            
            
            
        </div>
        <div class="login-card-wrapper " id ="login-card-wrapper">
            
                <div class="login-card">

                    

                    <div class="login-card-body">
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

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                               
                                    
                                    <button id="green" type="submit" class=" buttons btn btn-lg btn-block">
                                        {{ __('Login') }}
                                    </button>                              
                                
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-3">
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
    </div>
        
        
  @include('includes.footer')
@endsection
