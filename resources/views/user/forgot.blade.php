@extends('layouts.front')

@section('content')

<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="pages">
                    <li>
                        <a href="{{ route('front.index') }}">
                            {{ __('Home') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user-forgot') }}">
                            {{ __('Forgot Password') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<section class="login-signup forgot-password">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="login-area">
                    <div class="header-area forgot-passwor-area">
                        <h4 class="title">{{ __('Forgot Password') }} </h4>
                        <p class="text">{{ __('Please Write your Email') }} </p>
                    </div>
                    <div class="login-form">
                        @include('includes.admin.form-login')
                        <form id="forgotform" action="{{route('user-forgot-submit')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-input">
                                <input type="email" name="email" class="User Name" placeholder="{{ __('Email Address') }}"
                                    required="">
                                <i class="icofont-user-alt-5"></i>
                            </div>
                            <div class="to-login-page">
                                <a href="{{ route('user.login') }}">
                                    {{ __('Login Now') }}
                                </a>
                            </div>
                            <input class="authdata" type="hidden" value="{{ __("Checking...") }}">
                            <button type="submit" class="submit-btn">{{ __('SUBMIT') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
