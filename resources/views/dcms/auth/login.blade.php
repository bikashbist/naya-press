@extends('dcms.layouts.auth')

@section('content')

<form class="form-signin" action="{{ route('login') }}" method="POST">
    {{ csrf_field() }}
    <h2 class="form-signin-heading"><strong>{{ __('मानसरोवर नेपाल:') }}</strong>{{ __('Sign In') }}</h2>
    <div class="login-wrap">
        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
            <input type="email" class="form-control" name="email"  placeholder="Email" autofocus>
            @if( $errors->has('email'))
                <span class="help-block">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
            <input type="password" class="form-control" name="password" placeholder="Password">
            @if( $errors->has('password'))
                <span class="help-block">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <label class="checkbox">
            <input type="checkbox" name="remember" value="remember-me" {{ old('remember') }}>&nbsp;{{ __('Remember Me') }}
            <span class="pull-right">
                <a href="{{ URL::route('password.resetform') }}">{{ __('I forget my password') }}</a>
            </span>
        </label>
        <button class="btn btn-lg btn-login btn-block" type="submit">{{ __('Sign In') }}</button>
        <div class="registration">
            <a class="" href="{{ URL::route('register') }}">
                    {{ __('Register a new membership') }}
            </a>
        </div>

    </div>

  </form>
@endsection

@section('js')


@endsection