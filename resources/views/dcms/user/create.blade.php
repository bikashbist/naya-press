@extends('dcms.layouts.app')

@section('content')

<div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12">
            <section class="panel">
                <header class="panel-heading">
                    <h3>{{ $_panel }}</h3>
                </header>
                <div class="panel-body">
                        @include('dcms.includes.buttons.button-back')
                        @include('dcms.includes.flash_message_error') 

                    <form class="" action="{{ route('register') }}" method="POST">
                            {{ csrf_field() }}
                            {{-- <h2 class="form-signin-heading">{{__('dcms_lang.register.info') }}</h2> --}}
                            <div class="">
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
                                <button class="btn btn-success" type="submit">{{__('dcms_lang.register.register') }}</button>
                                <a href="{{ URL::route($_base_route.'.index') }}"><button class="btn btn-danger" type="button">{{__('Cancel') }}</button></a>

                              

                            </div>

                        </form>

                    </div>
                </div>
            </section>
        </div>
</div>


@endsection

@section('js')

@endsection