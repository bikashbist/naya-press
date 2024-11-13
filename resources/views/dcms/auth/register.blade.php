@extends('dcms.layouts.auth')

@section('content')

      <form class="form-signin" action="{{ route('register') }}" method="POST">
        {{ csrf_field() }}
        <h2 class="form-signin-heading">{{__('dcms_lang.register.info') }}</h2>
        <div class="login-wrap">
            <p>Enter your personal details below</p>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                <input type="text" class="form-control" name="name" placeholder="{{__('dcms_lang.register.name') }}" value="{{ old('name') }}"  autofocus>
                @if( $errors->has('name'))
                <span class="help-block">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                <input type="email" class="form-control" name="email" placeholder="{{__('dcms_lang.register.email') }}" value="{{ old('email') }}" >
                @if( $errors->has('email'))
                <span class="help-block">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                <input type="password" class="form-control" name="password" placeholder="{{ __('dcms_lang.register.password') }}" >
                @if( $errors->has('password'))
                <span class="help-block">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password_confirmation" placeholder="{{__('dcms_lang.register.re_password') }}" > 
            </div>
            <button class="btn btn-lg btn-login btn-block" type="submit">{{__('dcms_lang.register.register') }}</button>

            <div class="registration">
                <a class="" href="{{ URL::route('login') }}">
                        {{__('dcms_lang.register.login') }}
                </a>
            </div>

        </div>

      </form>

@endsection

 