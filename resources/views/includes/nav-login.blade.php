<div class="nav-login">
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                            @csrf

                            <div class="input-group input-group-sm mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Email</span>
                                  </div>
                                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong><small>{{ $errors->first('email') }}</small></strong>
                                        </span>
                                    @endif
                            </div>
                            
                            <div class="input-group input-group-sm mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Password</span>
                                  </div>
                                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong><small>{{ $errors->first('password') }}</small></strong>
                                    </span>
                                @endif
                            </div>
                            

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> <small>{{ __('Remember Me') }}</small>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                               
                                    <div class="col">
                                        <button type="submit" class="nav-login-register-button buttons">
                                            {{ __('Login') }}
                                        </button> 
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="buttons nav-login-register-button">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                                                 
                                
                            </div>

                            <div class="form-group row mb-0">
                                <div class="">
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                                 
                            </div>

                            
                        </form>
                    </div>