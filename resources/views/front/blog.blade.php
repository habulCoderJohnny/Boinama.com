@extends('layouts.front')
@section('styles')
    <link rel="stylesheet" href="{{ asset('public/assets/front/css/blog_details.css') }}">
@endsection
@section('content')
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="pages">

                        {{-- Category Breadcumbs --}}

                        @if (isset($bcat))
                            <li>
                                <a href="{{ route('front.index') }}">
                                    {{ __('Home') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.blog') }}">
                                    {{ __('Blog') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.blogcategory', $bcat->slug) }}">
                                    {{ $bcat->name }}
                                </a>
                            </li>
                        @elseif(isset($slug))
                            <li>
                                <a href="{{ route('front.index') }}">
                                    {{ __('Home') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.blog') }}">
                                    {{ __('Blog') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.blogtags', $slug) }}">
                                    {{ __('Tag') }}: {{ $slug }}
                                </a>
                            </li>
                        @elseif(isset($search))
                            <li>
                                <a href="{{ route('front.index') }}">
                                    {{ __('Home') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.blog') }}">
                                    {{ __('Blog') }}
                                </a>
                            </li>
                            <li>
                                <a href="Javascript:;">
                                    {{ __('Search') }}
                                </a>
                            </li>
                            <li>
                                <a href="Javascript:;">
                                    {{ $search }}
                                </a>
                            </li>
                        @elseif(isset($date))
                            <li>
                                <a href="{{ route('front.index') }}">
                                    {{ __('Home') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.blog') }}">
                                    {{ __('Blog') }}
                                </a>
                            </li>
                            <li>
                                <a href="Javascript:;">
                                    {{ __('Archive') }}: {{ date('F Y', strtotime($date)) }}
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('front.index') }}">
                                    {{ __('Home') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.blog') }}">
                                    {{ __('Blog') }}
                                </a>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Blog Page Area Start -->
    <section class="blogpagearea">
        <div class="container">
            <div id="ajaxContent">

                <div class="row">

                    @foreach ($blogs as $blogg)
                        <div class="col-md-6 col-lg-4">
                            <div class="blog-box">
                                <div class="blog-images">
                                    <div class="img">
                                        <img src="{{ $blogg->photo ? asset('public/assets/images/blogs/' . $blogg->photo) : asset('public/assets/images/noimage.png') }}"
                                            class="img-fluid" alt="">

                                    </div>
                                </div>
                                <div class="details">
                                    <div class="top-meta">
                                        <p class="postbay">
                                            By Admin,
                                        </p>
                                        <p class="date">
                                            <span>{{ date('d', strtotime($blogg->created_at)) }}</span>
                                            <span>{{ date('M', strtotime($blogg->created_at)) }}</span>
                                        </p>
                                    </div>
                                    <a href='{{ route('front.blogshow', $blogg->id) }}'>
                                        <h4 class="blog-title">
                                            {{ mb_strlen($blogg->title, 'utf-8') > 50 ? mb_substr($blogg->title, 0, 50, 'utf-8') . '...' : $blogg->title }}
                                        </h4>
                                    </a>
                                    <p class="blog-text">
                                        {{ substr(strip_tags($blogg->details), 0, 120) }}
                                    </p>
                                    <a class="read-more-btn"
                                        href="{{ route('front.blogshow', $blogg->id) }}">{{ __('Read More') }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="page-center">
                    {!! $blogs->links() !!}
                </div>
            </div>

        </div>
    </section>
    <!-- Blog Page Area Start -->
@endsection


@section('scripts')
    <script type="text/javascript">
        // Pagination Starts

        $(document).on('click', '.pagination li', function(event) {
            event.preventDefault();
            if ($(this).find('a').attr('href') != '#' && $(this).find('a').attr('href')) {
                $('#preloader').show();
                $('#ajaxContent').load($(this).find('a').attr('href'), function(response, status, xhr) {
                    if (status == "success") {
                        $("html,body").animate({
                            scrollTop: 0
                        }, 1);
                        $('#preloader').fadeOut();


                    }

                });
            }
        });

        // Pagination Ends
    </script>
@endsection
