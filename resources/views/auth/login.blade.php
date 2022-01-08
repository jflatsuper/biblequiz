@extends('layouts.sign')

@section('content')
<div class="container">
    <div class="row " style="color: black">
        <div class="col-md-12">
          
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="col-md-6 offset-md-4">
                                
                            <h3><strong>Login</strong></h3>
                   
                        
                    </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label "><h4>{{ __('E-Mail Address') }}</h4></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label "><h4>{{ __('Password') }}</h4></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" style="background-color:#05AFAF;width:70%;height:60px;font-size:20px;color:#fff;border-radius:15px">
                                    {{ __('Login') }}
                                </button>

                                
                                    <a class="btn btn-link" href="{{ route('register') }}">
                                        {{ __('Register') }}
                                    </a>
                              
                            </div>
                        </div>
                    </form>
           
    </div>
    </div>
</div>
@endsection
