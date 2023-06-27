@extends('layouts.front')
@section('styles')
    <style>
        .lazy-x {
            -webkit-animation: sharp 5s;
            /* Chrome, Safari, Opera */
            animation: sharp 0.5s;
        }

        @-webkit-keyframes sharp {
            from {
                -webkit-filter: blur(5px);
                -moz-filter: blur(5px);
                -o-filter: blur(5px);
                -ms-filter: blur(5px);
                filter: blur(5px);
            }

            to {
                -webkit-filter: none;
                -moz-filter: none;
                -o-filter: none;
                -ms-filter: none;
                filter: none;
            }
        }

        @keyframes sharp {
            from {
                -webkit-filter: blur(5px);
                -moz-filter: blur(5px);
                -o-filter: blur(5px);
                -ms-filter: blur(5px);
                filter: blur(5px);
            }

            to {
                -webkit-filter: none;
                -moz-filter: none;
                -o-filter: none;
                -ms-filter: none;
                filter: none;
            }
        }
    </style>
@endsection
@section('content')

    @if ($ps->slider == 1)
        @if (count($sliders))
            @include('includes.slider-style')
        @endif
    @endif

    @if ($ps->slider == 1)
        <!-- Hero Area Start -->
        <section class="hero-area">

            @if ($ps->slider == 1)

                @if (count($sliders))
                    <div class="hero-area-slider-wrapper">
                        <div class="container-fluid">
                            <div class="hero-area-slider">
                                <div class="slide-progress"></div>
                                <div class="intro-carousel">

                                    @foreach ($sliders as $data)
                                        <div class="intro-content {{ $data->position }} lazy"
                                            data-src="{{ asset('public/assets/images/sliders/' . $data->photo) }}">
                                            <div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="slider-content">
                                                            <!-- layer 1 -->
                                                            <div class="layer-1">
                                                                <h4 style="font-size: {{ $data->subtitle_size }}px; color: {{ $data->subtitle_color }}"
                                                                    class="subtitle subtitle{{ $data->id }}"
                                                                    data-animation="animated {{ $data->subtitle_anime }}">
                                                                    {{ $data->subtitle_text }}</h4>
                                                                <h2 style="font-size: {{ $data->title_size }}px; color: {{ $data->title_color }}"
                                                                    class="title title{{ $data->id }}"
                                                                    data-animation="animated {{ $data->title_anime }}">
                                                                    {{ $data->title_text }}</h2>
                                                            </div>
                                                            <!-- layer 2 -->
                                                            <div class="layer-2">
                                                                <p style="font-size: {{ $data->details_size }}px; color: {{ $data->details_color }}"
                                                                    class="text text{{ $data->id }}"
                                                                    data-animation="animated {{ $data->details_anime }}">
                                                                    {{ $data->details_text }}</p>
                                                            </div>
                                                            <!-- layer 3 -->
                                                            <!--<div class="layer-3">-->
                                                            <!--	<a href="{{ $data->link }}" target="_blank" class="mybtn1"><span>{{ __('Shop Now') }} <i class="fas fa-chevron-right"></i></span></a>-->
                                                            <!--</div>-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            @endif
            <!--<div class="hero-right-area">-->
            <!--    <a href="{{ $ps->slider_right_banner_link }}" class="banner banner1">-->
            <!--        <div class="img" style="background-image: url({{ $ps->slider_right_banner1 ? asset('public/assets/images/' . $ps->slider_right_banner1) : asset('public/assets/images/noimage.png') }})"></div>-->

            <!--    </a>-->
            <!--    <a href="{{ $ps->slider_right_banner_link1 }}" class="banner banner2">-->
            <!--        <div class="img" style="background-image: url({{ $ps->slider_right_banner2 ? asset('public/assets/images/' . $ps->slider_right_banner2) : asset('public/assets/images/noimage.png') }})"></div>-->
            <!--    </a>-->
            <!--</div>-->

        </section>
        <!-- Hero Area End -->
    @endif


    @if ($ps->featured_category == 1)
        {{-- Slider buttom Category Start --}}
        <section class="slider-buttom-category d-md-block">
            <div class="container-fluid">
                <div class="row">
                    @foreach ($categories->where('is_featured', '=', 1) as $cat)
                        <div class="col-xl-2 col-lg-3 col-md-4 sc-common-padding">
                            <a href="{{ route('front.category', $cat->slug) }}" class="single-category">

                                <div class="right">
                                    <img class="lazy"
                                        data-src="{{ asset('public/assets/images/categories/' . $cat->image) }}"
                                        alt="">
                                </div>
                                <div class="left">
                                    <h5 class="title">
                                        {{ $cat->name }}
                                    </h5>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        {{-- Slider buttom banner End --}}
    @endif



    <section id="extraData">
        <div class="text-center">
            <img src="{{ asset('public/assets/images/' . $gs->loader) }}">
        </div>
    </section>


@endsection


@section('scripts')
    <script>
        let checkTrur = 0;
        $(window).on('scroll', function() {

            if (checkTrur == 0) {
                $('#extraData').load('{{ route('front.extraIndex') }}');
                checkTrur = 1;
            }
        });
    </script>
@endsection
