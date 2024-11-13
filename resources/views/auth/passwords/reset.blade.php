@extends('dcms.layouts.auth')

@section('content')
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <div class="container">
        <form  method="POST" class ="form-signin" action="{{ URL::route('password.update')}}">
        {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}">

            <h2 class="form-signin-heading"><strong>{{ __('मानसरोवर नेपाल:') }}</strong>&nbsp;{{ __('Reset Password') }}</h2>
            <div class="login-wrap">
                <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                    <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" autofocus>             
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                

                <div class="form-group {{ $errors->has('password') ? ' is-invalid' : '' }}">
                    <input type="password" class="form-control" name="password" placeholder="Password"  autofocus>              
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group {{ $errors->has('password') ? ' is-invalid' : '' }}">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" autofocus>
                </div>
                
                <div class="form-group">
                    <button class="btn btn-lg btn-login btn-block" type="submit">Reset Password</button>
                </div>
            </div>
        </form>
    </div>
@endsection
