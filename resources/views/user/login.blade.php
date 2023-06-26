@extends('layouts.front')

@section('content')

<div class="new-signin-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
              <div class="inner-container right-panel-active">
                
                <!-- Sign In -->
                <div class="container__form container--signin pc-active">
                    <div class="form" id="form2">
                        <h2 class="form__title">{{__('Sign In')}}</h2>
                        
                        <form class="mloginform" action="{{ route('user.login.submit') }}" method="POST">
                        {{ csrf_field() }}
                        @include('includes.admin.form-login')
                        <div class="form-input">
                            <input type="email" name="email" placeholder="{{ __('Type Email Address') }}" required="">
                        </div>
                        <div class="form-input">
                            <input type="password" class="Password" name="password" placeholder="{{ __('Type Password') }}"
                            required="">
                        </div>
                        <div class="form-forgot-pass">
                            <div class="left">
                            <input type="checkbox" name="remember" id="mrp" {{ old('remember') ? 'checked' : '' }}>
                            <label for="mrp">{{ __('Remember Password') }}</label>
                            </div>
                            <div class="right">
                            <a href="{{ route('user-forgot') }}">
                                {{ __('Forgot Password?') }}
                            </a>
                            </div>
                        </div>
                        <input type="hidden" name="modal" value="1">
                        <input class="mauthdata" type="hidden" value="{{ __('Authenticating...') }}">
                        <button type="submit" class="mybtn1 submit-btn mt-4">{{ __('Login') }}</button>
                        @if(App\Models\Socialsetting::find(1)->f_check == 1 || App\Models\Socialsetting::find(1)->g_check ==
                        1)
                        <div class="social-area">

                            <p class="text">{{ __('Sign In with social media') }}</p>
                            <ul class="social-links">
                            @if(App\Models\Socialsetting::find(1)->f_check == 1)
                            <li>
                                <a href="{{ route('social-provider','facebook') }}">
                                <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            @endif
                            @if(App\Models\Socialsetting::find(1)->g_check == 1)
                            <li>
                                <a href="{{ route('social-provider','google') }}">
                                <i class="fab fa-google-plus-g"></i>
                                </a>
                            </li>
                            @endif
                            </ul>
                        </div>
                        @endif
                        </form>
                    </div>
                </div>

        
              </div>
            </div>
        </div>
    </div>
</div>

@endsection
