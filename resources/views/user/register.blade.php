@extends('layouts.front')

@section('content')
    <div class="new-signin-page">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-7">
                    <div class="inner-container right-panel-active">
                        <!-- Sign Up -->
                        <div class="container__form container--signup">
                            <div class="form" id="form1">
                                <h2 class="form__title">{{ __('Sign Up') }}</h2>
                                <form class="mregisterform" action="{{ route('user-register-submit') }}" method="POST">
                                    {{ csrf_field() }}
                                    @include('includes.admin.form-login')
                                    <div class="form-input">
                                        <input type="text" class="User Name" name="name"
                                            placeholder="{{ __('Full Name') }}" required="">
                                    </div>

                                    <div class="form-input">
                                        <input type="email" class="User Name" name="email"
                                            placeholder="{{ __('Email Address') }}" required="">
                                    </div>

                                    <div class="form-input">
                                        <input type="text" class="User Name" name="phone"
                                            placeholder="{{ __('Phone Number.') }}" required="">
                                    </div>

                                    <div class="form-input">
                                        <input type="text" class="User Name" name="address"
                                            placeholder="{{ __('Address') }}" required="">
                                    </div>

                                    <div class="form-input">
                                        <input type="password" class="Password" name="password"
                                            placeholder="{{ __('Password') }}" required="">
                                    </div>

                                    <div class="form-input">
                                        <input type="password" class="Password" name="password_confirmation"
                                            placeholder="{{ __('Confirm Password') }}" required="">
                                    </div>

                                    @if ($gs->is_capcha == 1)
                                        <div class="form-input">
                                            {!! NoCaptcha::display() !!}
                                            {!! NoCaptcha::renderJs() !!}
                                            @error('g-recaptcha-response')
                                                <p class="my-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    @endif

                                    <input class="mprocessdata" type="hidden" value="{{ __('Processing...') }}">


                                    <button type="submit" class="mybtn1 submit-btn">{{ __('Register') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
