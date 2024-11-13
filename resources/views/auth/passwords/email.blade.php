@extends('dcms.layouts.auth')

@section('content')

  <form class="form-signin" method="POST" action="{{ URL::route('password.email')}}">
    {{ csrf_field() }}  
    <h2 class="form-signin-heading"><strong>{{ __('मानसरोवर नेपाल:') }}</strong>&nbsp;{{ __('Reset Password') }}</h2>
      @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
      @endif
      <div class="login-wrap form-group {{ $errors->has('email') ? 'has-error' : '' }}">
          @if ($errors->has('email'))
          <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
          @endif
          <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="" autofocus> 
          <button class="btn btn-lg btn-login btn-block" type="submit">Send reset link</button>
      </div>
  </form>

@endsection
