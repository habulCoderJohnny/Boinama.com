@extends('layouts.front')
@section('content')

<!-- Breadcrumb Area Start -->
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
            <a href="javascript:;">
              {{ __('404') }}
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb Area End -->

<section class="fourzerofour">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="content">
            <img src="{{ $gs->error_banner ? asset('assets/images/'.$gs->error_banner):asset('assets/images/noimage.png') }}" alt="">
            <h4 class="heading">
              {{ __("Oops! You're lost...") }}
            </h4>
            <p class="text">
              {{ __('The page you are looking for might have been moved, renamed, or might never existed.') }}
            </p>
            <a class="mybtn1" href="{{ route('front.index') }}">{{ __('Back Home') }}</a>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection
