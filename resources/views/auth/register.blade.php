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
        <div class="login-card-wrapper " id ="register-card-wrapper">   
        <div class="login-card">
            

            <div class="login-card-body">
                <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
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
                        <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

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
    </div>
    
@include('includes.footer')

@endsection
