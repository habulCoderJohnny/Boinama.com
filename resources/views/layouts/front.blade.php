<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if (isset($page->meta_tag) && isset($page->meta_description))
        <meta name="keywords" content="{{ $page->meta_tag }}">
        <meta name="description" content="{{ $page->meta_description }}">
        <title>{{ $gs->title }}</title>
    @elseif(isset($blog->meta_tag) && isset($blog->meta_description))
        <meta name="keywords" content="{{ $blog->meta_tag }}">
        <meta name="description" content="{{ $blog->meta_description }}">
        <title>{{ $gs->title }}</title>
    @elseif(isset($productt))
        <meta name="keywords" content="{{ !empty($productt->meta_tag) ? implode(',', $productt->meta_tag) : '' }}">
        <meta name="description"
            content="{{ $productt->meta_description != null ? $productt->meta_description : strip_tags($productt->description) }}">
        <meta property="og:title" content="{{ $productt->name }}" />
        <meta property="og:description"
            content="{{ $productt->meta_description != null ? $productt->meta_description : strip_tags($productt->description) }}" />
        <meta property="og:image" content="{{ asset('assets/images/thumbnails/' . $productt->thumbnail) }}" />
        <meta name="author" content="GeniusOcean">
        <title>{{ substr($productt->name, 0, 11) . '-' }}{{ $gs->title }}</title>
    @else
        <meta name="keywords" content="{{ $seo->meta_keys }}">
        <meta name="author" content="GeniusOcean">
        <title>{{ $gs->title }}</title>
    @endif
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('public/assets/images/' . $gs->favicon) }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/front/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/front/css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/front/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/front/css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/front/css/plugin.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/front/css/style.css') }}">
    @yield('styles')
    <link rel="stylesheet" href="{{ asset('public/assets/front/css/product_details.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/front/css/new.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/front/css/common-responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/front/css/responsive.css') }}">


    <link rel="stylesheet"
        href="{{ asset('assets/front/css/styles.php?color=' . str_replace('#', '', $gs->colors) . '&' . 'header_color=' . str_replace('#', '', $gs->header_color) . '&' . 'footer_color=' . str_replace('#', '', $gs->footer_color) . '&' . 'copyright_color=' . str_replace('#', '', $gs->copyright_color) . '&' . 'menu_color=' . str_replace('#', '', $gs->menu_color) . '&' . 'menu_hover_color=' . str_replace('#', '', $gs->menu_hover_color)) }}">

    @php
        $language = Session::has('language') ? App\Models\Language::findOrFail(Session::get('language')) : App\Models\Language::where('is_default', 1)->first();
    @endphp
    @if ($language->rtl == 1)
        <link rel="stylesheet" href="{{ asset('/public/assets/front/css/rtl/rtl.css') }}">
    @endif
    <style>
        .wdfp {
            background: red;
        }

        .lazy {
            background-color: rgb(243 240 238);
        }
    </style>
</head>

<body>

    @if ($gs->is_loader == 1)
        @if (url()->current() == route('front.index'))
        @else
            <div class="preloader" id="preloader"
                style="background: url({{ asset('public/assets/images/' . $gs->loader) }}) no-repeat scroll center center #FFF;">
            </div>
        @endif
    @endif
    <div class="xloader d-none" id="xloader"
        style="background: url({{ asset('public/assets/front/images/xloading.gif') }}) no-repeat scroll center center #FFF;">
    </div>

    @if ($gs->is_popup == 1)

        @if (isset($visited))
            <div style="display:none">
                <img class="lazy" data-src="{{ asset('public/assets/images/' . $gs->popup_background) }}">
            </div>

            <!--  Starting of subscribe-pre-loader Area   -->
            <div class="subscribe-preloader-wrap" id="subscriptionForm" style="display: none;">
                <div class="subscribePreloader__thumb"
                    style="background-image: url({{ asset('public/assets/images/' . $gs->popup_background) }});">
                    <span class="preload-close"><i class="fas fa-times"></i></span>
                    <div class="subscribePreloader__text text-center">
                        <h1>{{ $gs->popup_title }}</h1>
                        <p>{{ $gs->popup_text }}</p>
                        <form action="{{ route('front.subscribe') }}" id="subscribeform" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="email" name="email" placeholder="{{ __('Enter Your Email Address') }}"
                                    required="">
                                <button id="sub-btn" type="submit">{{ __('SUBSCRIBE') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--  Ending of subscribe-pre-loader Area   -->
        @endif

    @endif

    <section class="top-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 remove-padding">
                    <div class="content">
                        <div class="left-content">
                            <div class="list">
                                <ul>


                                    @if ($gs->is_language == 1)
                                        <li>
                                            <div class="language-selector">
                                                <i class="fas fa-globe-americas"></i>
                                                <select name="language" class="language selectors nice">
                                                    @foreach (DB::table('languages')->get() as $language)
                                                        <option value="{{ route('front.language', $language->id) }}"
                                                            {{ Session::has('language') ? (Session::get('language') == $language->id ? 'selected' : '') : ($language->is_default == 1 ? 'selected' : '') }}>
                                                            {{ $language->language }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </li>
                                    @endif

                                    @if ($gs->is_currency == 1)
                                        <li>
                                            <div class="currency-selector">
                                                <span>{{ Session::has('currency')? DB::table('currencies')->where('id', '=', Session::get('currency'))->first()->sign: DB::table('currencies')->where('is_default', '=', 1)->first()->sign }}</span>
                                                <select name="currency" class="currency selectors nice">
                                                    @foreach (DB::table('currencies')->get() as $currency)
                                                        <option value="{{ route('front.currency', $currency->id) }}"
                                                            {{ Session::has('currency') ? (Session::get('currency') == $currency->id ? 'selected' : '') : ($currency->is_default == 1 ? 'selected' : '') }}>
                                                            {{ $currency->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </li>
                                    @endif


                                </ul>
                            </div>
                        </div>
                        <div class="right-content">
                            <div class="list">
                                <ul>

                                    <li class="t-m-social-links">
                                        <a href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fab fa-pinterest-p"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Top Header Area End -->

    <!-- Logo Header Area Start -->
    <section class="logo-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-2 col-sm-6 col-5 remove-padding">
                    <div class="logo">
                        <a href="{{ route('front.index') }}">
                            <img src="{{ asset('public/assets/images/' . $gs->logo) }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-sm-12 remove-padding order-last order-sm-2 order-md-2">
                    <div class="search-box-wrapper">
                        <div class="search-box">
                            <div class="categori-container" id="catSelectForm">
                                <select name="category" id="category_select" class="categoris nice">
                                    <option value="">{{ __('All Categories') }}</option>
                                    @foreach ($categories as $data)
                                        <option value="{{ $data->slug }}"
                                            {{ Request::route('category') == $data->slug ? 'selected' : '' }}>
                                            {{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <form id="searchForm" class="search-form"
                                action="{{ route('front.category', [Request::route('category'), Request::route('subcategory'), Request::route('childcategory')]) }}"
                                method="GET">
                                @if (!empty(request()->input('sort')))
                                    <input type="hidden" name="sort" value="{{ request()->input('sort') }}">
                                @endif
                                @if (!empty(request()->input('minprice')))
                                    <input type="hidden" name="minprice"
                                        value="{{ request()->input('minprice') }}">
                                @endif
                                @if (!empty(request()->input('maxprice')))
                                    <input type="hidden" name="maxprice"
                                        value="{{ request()->input('maxprice') }}">
                                @endif
                                <input type="text" id="prod_name" name="search"
                                    placeholder="{{ __('Search For Product') }}"
                                    value="{{ request()->input('search') }}" autocomplete="off">
                                <div class="autocomplete">
                                    <div id="myInputautocomplete-list" class="autocomplete-items">
                                    </div>
                                </div>
                                <button type="submit"><i class="icofont-search-1"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-7 remove-padding order-lg-last">
                    <div class="l-h-right-area">
                        <div class="helpful-links">
                            <ul class="helpful-links-inner">

                                <li class="my-dropdown" data-toggle="tooltip" data-placement="top"
                                    title="{{ __('Cart') }}">
                                    <a href="javascript:;" class="cart carticon">
                                        <div class="icon">
                                            <i class="icofont-cart"></i>
                                            <span class="cart-quantity"
                                                id="cart-count">{{ Session::has('cart') ? count(Session::get('cart')->items) : '0' }}</span>
                                        </div>

                                    </a>
                                    <div class="my-dropdown-menu" id="cart-items">
                                        @include('load.cart')
                                    </div>
                                </li>
                                <!--<li class="wishlist"  data-toggle="tooltip" data-placement="top" title="{{ __('Wish') }}">-->
                                <!--    @if (Auth::guard('web')->check())
-->
                                <!--        <a href="{{ route('user-wishlists') }}" class="wish">-->
                                <!--            <i class="far fa-heart" ></i>-->
                                <!--            <span id="wishlist-count">{{ Auth::user()->wishlistCount() }}</span>-->
                                <!--        </a>-->
                            <!--    @else-->
                                <!--        <a href="javascript:;" data-toggle="modal" id="wish-btn" data-target="#comment-log-reg" class="wish">-->
                                <!--            <i class="far fa-heart"></i>-->
                                <!--            <span id="wishlist-count">0</span>-->
                                <!--        </a>-->
                                <!--
@endif-->
                                <!--</li>-->
                                <!--<li class="compare"  data-toggle="tooltip" data-placement="top" title="{{ __('Compare') }}">-->
                                <!--    <a href="{{ route('product.compare') }}" class="wish compare-product">-->
                                <!--        <div class="icon">-->
                                <!--            <i class="fas fa-exchange-alt"></i>-->
                                <!--            <span id="compare-count">{{ Session::has('compare') ? count(Session::get('compare')->items) : '0' }}</span>-->
                                <!--        </div>-->
                                <!--    </a>-->
                                <!--</li>-->


                            </ul>
                        </div>
                        <ul class="u-login-area">
                            @if (!Auth::guard('web')->check())
                                <li class="login profilearea my-dropdown">
                                    <a href="#" class="sign-log">
                                        <div class="links">
                                            <i class="far fa-user"></i>
                                            <span class="sign-in"><span>{{ __('Sign in') }} <i
                                                        class="fas fa-chevron-down"></i> </span>
                                        </div>
                                    </a>
                                    <div class="my-dropdown-menu profile-dropdown">
                                        <ul class="profile-links">
                                            <li>
                                                <a href="{{ route('user.login') }}"><i
                                                        class="fas fa-angle-double-right"></i> {{ __('Login') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('user.register') }}"><i
                                                        class="fas fa-angle-double-right"></i>
                                                    {{ __('Register') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @else
                                <li class="profilearea my-dropdown">

                                    <a href="javascript: ;" id="profile-icon" class="profile carticon">
                                        <span class="text">
                                            <i class="far fa-user"></i> {{ __('My Account') }} <i
                                                class="fas fa-chevron-down"></i>
                                        </span>
                                    </a>
                                    <div class="my-dropdown-menu profile-dropdown">
                                        <ul class="profile-links">
                                            <li>
                                                <a href="{{ route('user-dashboard') }}"><i
                                                        class="fas fa-angle-double-right"></i>
                                                    {{ __('User Panel') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('user-profile') }}"><i
                                                        class="fas fa-angle-double-right"></i>
                                                    {{ __('Edit Profile') }}</a>
                                            </li>

                                            <li>
                                                <a href="{{ route('user-logout') }}"><i
                                                        class="fas fa-angle-double-right"></i> {{ __('Logout') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endif

                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Logo Header Area End -->

    <!--Main-Menu Area Start-->
    <!--<div class="mainmenu-area mainmenu-bb">-->
    <!--	<div class="container">-->
    <!--		<div class="row align-items-center mainmenu-area-innner">-->
    <!--			<div class="col-lg-3 col-md-6 categorimenu-wrapper remove-padding">-->

    <!--				<div class="categories_menu">-->
    <!--					<div class="categories_title">-->
    <!--						<h2 class="categori_toggle"><i class="fa fa-bars"></i>  {{ __('Categories') }} <i class="fa fa-angle-down arrow-down"></i></h2>-->
    <!--					</div>-->
    <!--					<div class="categories_menu_inner">-->
    <!--						@include('load.category')-->
    <!--					</div>-->
    <!--				</div>-->
    <!--			</div>-->
    <!--			<div class="col-lg-9 col-md-6 mainmenu-wrapper remove-padding">-->
    <!--				<nav hidden>-->
    <!--					<div class="nav-header">-->
    <!--						<button class="toggle-bar"><span class="fa fa-bars"></span></button>-->
    <!--					</div>-->
    <!--					<ul class="menu">-->
    <!--						@if ($gs->is_home == 1)
-->
    <!--						<li><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>-->
    <!--
@endif-->

    <!--						@if ($ps->review_blog == 1)
-->
    <!--						<li class="active" ><a  href="{{ route('front.blog') }}">{{ __('Blog') }}</a></li>-->
    <!--
@endif-->

    <!--						@if ($gs->is_faq == 1)
-->
    <!--						<li><a href="{{ route('front.faq') }}">{{ __('Faq') }}</a></li>-->
    <!--
@endif-->
    <!--						@foreach (DB::table('pages')->where('header', '=', 1)->get() as $data)
-->
    <!--							<li><a href="{{ route('front.page', $data->slug) }}">{{ $data->title }}</a></li>-->
    <!--
@endforeach-->
    <!--						@if ($gs->is_contact == 1)
-->
    <!--						<li><a href="{{ route('front.contact') }}">{{ __('Contact Us') }}</a></li>-->
    <!--
@endif-->
    <!--						<li>-->
    <!--							<a href="javascript:;" data-toggle="modal" data-target="#track-order-modal" class="track-btn">{{ __('Track Order') }}</a>-->
    <!--						</li>-->
    <!--					</ul>-->

    <!--				</nav>-->
    <!--			</div>-->
    <!--		</div>-->
    <!--	</div>-->
    <!--</div>-->
    <!--Main-Menu Area End-->
    <style>
        .megamenu-li {
            position: static !important;
        }

        .megamenu {
            position: absolute !important;
            width: 100% !important;
            left: 0 !important;
            right: 0 !important;
            padding: 15px !important;
        }

        .navbar-expand-lg .navbar-nav .nav-link {
            padding: 15px 15px;
        }
    </style>

    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded container-fluid" style="padding:0px;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
            aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
                @foreach ($categories[1]->subs as $sub)
                    <li class="nav-item dropdown megamenu-li">
                        <a class="nav-link dropdown-toggle"
                            href="{{ route('front.subcat', ['slug1' => $categories[1]->slug, 'slug2' => $sub->slug]) }}"
                            id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">{{ $sub->name }}</a>
                        <div class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                            <div class="row">
                                @foreach ($sub->childs as $child)
                                    <div class="col-sm-3 col-lg-3">
                                        <a class="dropdown-item"
                                            href="{{ route('front.childcat', ['slug1' => $categories[1]->slug, 'slug2' => $sub->slug, 'slug3' => $child->slug]) }}">{{ $child->name }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </li>
                @endforeach
                <li class="nav-item">
                    <a class="nav-link" href="">ই-বুক</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">রামাদান প্রোডাক্টস</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">স্টকের প্রোডাক্ট সমূহ</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">বইমেলা ২০২৩</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">অর্গানিক ফুড</a>


                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://boinama.com/category/book/bisoy/Islamic-books">ইসলামি বই</a>
                </li>
            </ul>
        </div>
    </nav>



    @yield('content')

    <!-- Footer Area Start -->
    <footer class="footer" id="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="footer-info-area">
                        <div class="footer-logo">
                            <a href="{{ route('front.index') }}" class="logo-link">
                                <img class="" src="{{ asset('public/assets/images/' . $gs->footer_logo) }}"
                                    alt="">
                            </a>
                        </div>
                        <div class="text">
                            <p>
                                {!! $gs->footer !!}
                            </p>
                        </div>
                    </div>
                    <div class="fotter-social-links">
                        <ul>
                            @if ($socialsetting->f_status == 1)
                                <li>
                                    <a href="{{ $socialsetting->facebook }}" class="facebook" target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                            @endif

                            @if ($socialsetting->g_status == 1)
                                <li>
                                    <a href="{{ $socialsetting->gplus }}" class="google-plus" target="_blank">
                                        <i class="fab fa-google-plus-g"></i>
                                    </a>
                                </li>
                            @endif

                            @if ($socialsetting->t_status == 1)
                                <li>
                                    <a href="{{ $socialsetting->twitter }}" class="twitter" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                            @endif

                            @if ($socialsetting->l_status == 1)
                                <li>
                                    <a href="{{ $socialsetting->linkedin }}" class="linkedin" target="_blank">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                            @endif

                            @if ($socialsetting->d_status == 1)
                                <li>
                                    <a href="{{ $socialsetting->dribble }}" class="dribbble" target="_blank">
                                        <i class="fab fa-dribbble"></i>
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="footer-widget info-link-widget">
                        <h4 class="title">
                            {{ __('Footer Links') }}
                        </h4>
                        <ul class="link-list">
                            <li>
                                <a href="{{ route('front.index') }}">
                                    <i class="fas fa-angle-double-right"></i>{{ __('Home') }}
                                </a>
                            </li>

                            @foreach (DB::table('pages')->where('footer', '=', 1)->get() as $data)
                                <li>
                                    <a href="{{ route('front.page', $data->slug) }}">
                                        <i class="fas fa-angle-double-right"></i>{{ $data->title }}
                                    </a>
                                </li>
                            @endforeach

                            <li>
                                <a href="{{ route('front.contact') }}">
                                    <i class="fas fa-angle-double-right"></i>{{ __('Contact Us') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="footer-widget recent-post-widget">
                        <h4 class="title">
                            {{ __('Contact Now') }}
                        </h4>
                        <!--<ul class="post-list">-->
                        <!--	@foreach (App\Models\Blog::orderBy('created_at', 'desc')->limit(3)->get() as $blog)
-->
                        <!--	<li>-->
                        <!--		<div class="post">-->
                        <!--		  <div class="post-img">-->
                        <!--			<img class="lazy" style="width: 73px; height: 59px;" data-src="{{ asset('public/assets/images/blogs/' . $blog->photo) }}" alt="">-->
                        <!--		  </div>-->
                        <!--		  <div class="post-details">-->
                        <!--			<a href="{{ route('front.blogshow', $blog->id) }}">-->
                        <!--				<h4 class="post-title">-->
                        <!--					{{ mb_strlen($blog->title, 'utf-8') > 45 ? mb_substr($blog->title, 0, 45, 'utf-8') . ' ..' : $blog->title }}-->
                        <!--				</h4>-->
                        <!--			</a>-->
                        <!--			<p class="date">-->
                        <!--				{{ date('M d - Y', strtotime($blog->created_at)) }}-->
                        <!--			</p>-->
                        <!--		  </div>-->
                        <!--		</div>-->
                        <!--	  </li>-->
                        <!--
@endforeach-->
                        <!--</ul>-->
                    </div>
                </div>
            </div>
        </div>

        <div class="copy-bg">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="content">
                            <div class="content">
                                <p>{!! $gs->copyright !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->

    <!-- Back to Top Start -->
    <div class="bottomtotop">
        <i class="fas fa-chevron-right"></i>
    </div>
    <!-- Back to Top End -->

    <!-- LOGIN MODAL -->
    <div class="modal fade" id="comment-log-reg" tabindex="-1" role="dialog"
        aria-labelledby="comment-log-reg-Title" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <nav class="comment-log-reg-tabmenu">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link login active" id="nav-log-tab1" data-toggle="tab"
                                href="#nav-log1" role="tab" aria-controls="nav-log" aria-selected="true">
                                {{ __('Login') }}
                            </a>
                            <a class="nav-item nav-link" id="nav-reg-tab1" data-toggle="tab" href="#nav-reg1"
                                role="tab" aria-controls="nav-reg" aria-selected="false">
                                {{ __('Register') }}
                            </a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-log1" role="tabpanel"
                            aria-labelledby="nav-log-tab1">
                            <div class="login-area">
                                <div class="header-area">
                                    <h4 class="title">{{ __('LOGIN NOW') }}</h4>
                                </div>
                                <div class="login-form signin-form">
                                    @include('includes.admin.form-login')
                                    <form class="mloginform" action="{{ route('user.login.submit') }}"
                                        method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-input">
                                            <input type="email" name="email"
                                                placeholder="{{ __('Type Email Address') }}" required="">
                                            <i class="icofont-user-alt-5"></i>
                                        </div>
                                        <div class="form-input">
                                            <input type="password" class="Password" name="password"
                                                placeholder="{{ __('Type Password') }}" required="">
                                            <i class="icofont-ui-password"></i>
                                        </div>
                                        <div class="form-forgot-pass">
                                            <div class="left">
                                                <input type="checkbox" name="remember" id="mrp"
                                                    {{ old('remember') ? 'checked' : '' }}>
                                                <label for="mrp">{{ __('Remember Password') }}</label>
                                            </div>
                                            <div class="right">
                                                <a href="javascript:;" id="show-forgot">
                                                    {{ __('Forgot Password?') }}
                                                </a>
                                            </div>
                                        </div>
                                        <input type="hidden" name="modal" value="1">
                                        <input class="mauthdata" type="hidden"
                                            value="{{ __('Authenticating...') }}">
                                        <button type="submit" class="submit-btn">{{ __('Login') }}</button>
                                        @if ($socialsetting->f_check == 1 || $socialsetting->g_check == 1)
                                            <div class="social-area">
                                                <h3 class="title">{{ __('Or') }}</h3>
                                                <p class="text">{{ __('Sign In with social media') }}</p>
                                                <ul class="social-links">
                                                    @if ($socialsetting->f_check == 1)
                                                        <li>
                                                            <a href="{{ route('social-provider', 'facebook') }}">
                                                                <i class="fab fa-facebook-f"></i>
                                                            </a>
                                                        </li>
                                                    @endif
                                                    @if ($socialsetting->g_check == 1)
                                                        <li>
                                                            <a href="{{ route('social-provider', 'google') }}">
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
                        <div class="tab-pane fade" id="nav-reg1" role="tabpanel" aria-labelledby="nav-reg-tab1">
                            <div class="login-area signup-area">
                                <div class="header-area">
                                    <h4 class="title">{{ __('Signup Now') }}</h4>
                                </div>
                                <div class="login-form signup-form">
                                    @include('includes.admin.form-login')
                                    <form class="mregisterform" action="{{ route('user-register-submit') }}"
                                        method="POST">
                                        {{ csrf_field() }}

                                        <div class="form-input">
                                            <input type="text" class="User Name" name="name"
                                                placeholder="{{ __('Full Name') }}" required="">
                                            <i class="icofont-user-alt-5"></i>
                                        </div>

                                        <div class="form-input">
                                            <input type="email" class="User Name" name="email"
                                                placeholder="{{ __('Email Address') }}" required="">
                                            <i class="icofont-email"></i>
                                        </div>

                                        <div class="form-input">
                                            <input type="text" class="User Name" name="phone"
                                                placeholder="{{ __('Phone Number') }}" required="">
                                            <i class="icofont-phone"></i>
                                        </div>

                                        <div class="form-input">
                                            <input type="text" class="User Name" name="address"
                                                placeholder="{{ __('Address') }}" required="">
                                            <i class="icofont-location-pin"></i>
                                        </div>

                                        <div class="form-input">
                                            <input type="password" class="Password" name="password"
                                                placeholder="{{ __('Password') }}" required="">
                                            <i class="icofont-ui-password"></i>
                                        </div>

                                        <div class="form-input">
                                            <input type="password" class="Password" name="password_confirmation"
                                                placeholder="{{ __('Confirm Password') }}" required="">
                                            <i class="icofont-ui-password"></i>
                                        </div>


                                        @if ($gs->is_capcha == 1)
                                            <div class="form-input" id="chapcha_load">
                                                <div id="check-chapcha">
                                                    {!! NoCaptcha::display() !!}
                                                    {!! NoCaptcha::renderJs() !!}
                                                    @error('g-recaptcha-response')
                                                        <p class="my-2">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endif

                                        <input class="mprocessdata" type="hidden"
                                            value="{{ __('Processing...') }}">
                                        <button type="submit" class="submit-btn">{{ __('Register') }}</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGIN MODAL ENDS -->

    <!-- FORGOT MODAL -->
    <div class="modal fade" id="forgot-modal" tabindex="-1" role="dialog" aria-labelledby="comment-log-reg-Title"
        aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="login-area">
                        <div class="header-area forgot-passwor-area">
                            <h4 class="title">{{ __('Forgot Password') }} </h4>
                            <p class="text">{{ __('Please Write your Email') }} </p>
                        </div>
                        <div class="login-form">
                            @include('includes.admin.form-login')
                            <form id="mforgotform" action="{{ route('user-forgot-submit') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-input">
                                    <input type="email" name="email" class="User Name"
                                        placeholder="{{ __('Email Address') }}" required="">
                                    <i class="icofont-user-alt-5"></i>
                                </div>
                                <div class="to-login-page">
                                    <a href="javascript:;" id="show-login">
                                        {{ __('Login Now') }}
                                    </a>
                                </div>
                                <input class="fauthdata" type="hidden" value="{{ __('Checking...') }}">
                                <button type="submit" class="submit-btn">{{ __('SUBMIT') }}</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- FORGOT MODAL ENDS -->


    <!-- Product Quick View Modal -->

    <div class="modal fade" id="quickview" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog quickview-modal modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="submit-loader">
                    <img class="lazy" data-src="{{ asset('public/assets/images/' . $gs->loader) }}"
                        alt="">
                </div>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container quick-view-modal">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Quick View Modal -->

    <!-- Order Tracking modal Start-->
    <div class="modal fade" id="track-order-modal" tabindex="-1" role="dialog"
        aria-labelledby="order-tracking-modal" aria-hidden="true">
        <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title"> <b><i class="fas fa-truck"></i>{{ __('Order Tracking') }}</b> </h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="order-tracking-content">
                        <form id="track-form" class="track-form">
                            {{ csrf_field() }}
                            <input type="text" id="track-code" placeholder="{{ __('Get Tracking Code') }}"
                                required="">
                            <button type="submit" class="mybtn1">{{ __('View Tracking') }}</button>
                            <a href="#" data-toggle="modal" data-target="#order-tracking-modal"></a>
                        </form>
                    </div>

                    <div>
                        <div class="submit-loader d-none">
                            <img class="lazy" data-src="{{ asset('public/assets/images/' . $gs->loader) }}"
                                alt="">
                        </div>
                        <div id="track-order">

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Order Tracking modal End -->


    <!-- Modal -->
    <div class="modal fade" id="crossSellModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content" style="max-width:700px;height:600px;">
                <div class="submit-loader">
                    <img src="{{ asset('public/assets/images/' . $gs->loader) }}" alt="">
                </div>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('You may also like') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="crossProducts">
                        <div class="cross-sell-details">
                            <div class="row">
                                <div class="col-lg-12 remove-padding">
                                    <div class="trending-item-slider">
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('front.cart') }}" class="mybtn1">{{ __('View Cart') }}</a>
                    <button type="button" class="mybtn1" data-dismiss="modal">{{ __('Continue') }}</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var mainurl = "{{ url('/') }}";
        var gs = {!! json_encode(
            \App\Models\Generalsetting::first()->makeHidden([
                'stripe_key',
                'stripe_secret',
                'smtp_pass',
                'instamojo_key',
                'instamojo_token',
                'paystack_key',
                'paystack_email',
                'paypal_business',
                'paytm_merchant',
                'paytm_secret',
                'paytm_website',
                'paytm_industry',
                'paytm_mode',
                'molly_key',
                'razorpay_key',
                'razorpay_secret',
            ]),
        ) !!};
        var langg = {
            "add_cart": "{{ __('Successfully Added To Cart') }}",
            "already_cart": "{{ __('Already Added To Cart') }}",
            "out_stock": "{{ __('Out Of Stock') }}",
            "add_wish": "{{ __('Successfully Added To Wishlist') }}",
            "already_wish": "{{ __('Already Added To Wishlist') }}",
            "wish_remove": "{{ __('Successfully Removed From The Wishlist') }}",
            "add_compare": "{{ __('Successfully Added To Compare') }}",
            "already_compare": "{{ __('Already Added To Compare') }}",
            "compare_remove": "{{ __('Successfully Removed From The Compare') }}",
            "color_change": "{{ __('Successfully Changed The Color') }}",
            "coupon_found": "{{ __('Coupon Found') }}",
            "no_coupon": "{{ __('No Coupon Found') }}",
            "already_coupon": "{{ __('Coupon Already Applied') }}",
            "email_not_found": "{{ __('Email Not Found') }}",
            "something_wrong": "{{ __('Oops Something Goes Wrong !!') }}",
            "message_sent": "{{ __('Message Sent !!') }}",
            "order_title": "{{ __('THANK YOU FOR YOUR PURCHASE.') }}",
            "order_text": "{{ __("We'll email you an order confirmation with details and tracking info.") }}",
            "subscribe_success": "{{ __('You have subscribed successfully.') }}",
            "subscribe_error": "{{ __('This email has already been taken.') }}",
        };
    </script>


    <!-- jquery -->

    <script src="{{ asset('public/assets/front/js/jquery.js') }}"></script>
    <script src="{{ asset('public/assets/front/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- popper -->
    <script src="{{ asset('public/assets/front/js/popper.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('public/assets/front/js/bootstrap.min.js') }}"></script>
    <!-- plugin js-->
    <script src="{{ asset('public/assets/front/js/plugin.js') }}"></script>

    <script src="{{ asset('public/assets/front/js/xzoom.min.js') }}"></script>
    <script src="{{ asset('public/assets/front/js/jquery.hammer.min.js') }}"></script>
    <script src="{{ asset('public/assets/front/js/setup.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/front/js/lazy.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/front/js/lazy.plugin.js') }}"></script>

    <script src="{{ asset('public/assets/front/js/toastr.js') }}"></script>
    <!-- main -->
    <script src="{{ asset('public/assets/front/js/main.js') }}"></script>
    <!-- custom -->
    <script src="{{ asset('public/assets/front/js/custom.js') }}"></script>


    <script>
        $(window).on('load', function() {
            setTimeout(function() {
                $('.categories_menu_inner').load('{{ route('front.get.category') }}');
            }, 500);

        });

        function lazy() {
            $(".lazy").Lazy({
                scrollDirection: 'vertical',
                effect: "fadeIn",
                effectTime: 1000,
                threshold: 0,
                visibleOnly: false,
                onError: function(element) {
                    console.log('error loading ' + element.data('src'));
                }
            });
        }

        function lazyCross() {
            $(".lazy-cross").Lazy({
                scrollDirection: 'horizontal',
                effect: "fadeIn",
                effectTime: 1000,
                threshold: 0,
                visibleOnly: false,
                onError: function(element) {
                    console.log('error loading ' + element.data('src'));
                }
            });
        }

        lazy();
    </script>



    {!! $seo->google_analytics !!}

    @if ($gs->is_talkto == 1)
        <!--Start of Tawk.to Script-->
        {!! $gs->talkto !!}
        <!--End of Tawk.to Script-->
    @endif

    @yield('scripts')
    <script>
        const $megamenuParentListItem = $('.megamenu-nav > li.is-parent');

        const $megamenuBackground = $('#megamenu-background');

        const isTouch = 'ontouchstart' in window || !!(navigator.msMaxTouchPoints);

        const handleMenuItemOpenState = (elem) => {
            elem.addClass('is-open');
            elem.find('a').first().attr('aria-expanded', true);
        };

        const handleMenuItemCloseState = (elem) => {
            elem.removeClass('is-open');
            elem.find('a').first().attr('aria-expanded', false);
        };

        const openMegamenu = (bgElem, heightVal) => {
            $('body').addClass('megamenu-visible');
            bgElem.height(heightVal);
        };

        const closeMegamenu = (bgElem, heightVal) => {
            $('body').removeClass('megamenu-visible');
            bgElem.height(heightVal);
        };

        const $megamenuContentElem = $('.megamenu-nav .megamenu-content');

        const getTallestMenuHeight = () => {
            let maxHeight = 0;
            $megamenuContentElem.each((index, item) => {
                if ($(item).outerHeight() > maxHeight) {
                    maxHeight = $(item).outerHeight();
                }
            });
            return maxHeight;
        }

        const debouncedClose = _.debounce(closeMegamenu, 400);
        const throttledContentHeightCount = _.throttle(getTallestMenuHeight, 100);

        let megamenuContentMaxHeight = 0;

        window.onresize = () => {
            megamenuContentMaxHeight = throttledContentHeightCount();
        };

        $(() => {
            megamenuContentMaxHeight = getTallestMenuHeight();

            $megamenuParentListItem.each((index, item) => {
                if (!isTouch) {
                    $(item).hoverIntent({
                        sensitivity: 10,
                        interval: 50,
                        over: () => {
                            debouncedClose.cancel();
                            $megamenuParentListItem.removeClass('is-open');
                            handleMenuItemOpenState($(item));
                            openMegamenu($megamenuBackground, megamenuContentMaxHeight);
                        },
                        out: () => {
                            handleMenuItemCloseState($(item));
                            debouncedClose($megamenuBackground, 0);
                        },
                    });
                }

                $(item).find('a').first().on('click touch', () => {
                    if (!$(item).hasClass('is-open')) {
                        $megamenuParentListItem.removeClass('is-open');
                        handleMenuItemOpenState($(item));
                        openMegamenu($megamenuBackground, megamenuContentMaxHeight);
                    } else {
                        handleMenuItemCloseState($(item));
                        closeMegamenu($megamenuBackground, 0);
                    }
                });
            });

            $('#megamenu-dim').on('click touch', (e) => {
                if ($('body').hasClass('megamenu-visible')) {
                    e.preventDefault();
                    $megamenuParentListItem.removeClass('is-open');
                    closeMegamenu($megamenuBackground, 0);
                }
            });
        });

        $(document).ready(function() {
            $(".megamenu").on("click", function(e) {
                e.stopPropagation();
            });
        });
    </script>
</body>

</html>
