


 <div class="banner-section">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12" style="padding:0px;">
				<div class="banner-inner-area">
					<!--<div class="big-banner">-->
					<!--	<a href="{{$ps->gallery_large_banner_link}}" class="banner">-->
					<!--		<div class="img lazy" data-src="{{ $ps->gallery_large_banner ? asset('assets/images/'.$ps->gallery_large_banner):asset('assets/images/noimage.png') }}" ></div>-->

					<!--	</a>-->
					<!--</div>-->

					<div class="right-banner">
						<div class="mycol c1">
							<a href="{{$ps->gallery_small_banner_link1}}" class="banner">
								<div class="img lazy" data-src="{{ $ps->gallery_small_banner1 ? asset('assets/images/'.$ps->gallery_small_banner1):asset('assets/images/noimage.png') }}"></div>
							</a>
						</div>
						<div class="mycol c2">
							<a href="{{$ps->gallery_small_banner_link2}}" class="banner">
								<div class="img lazy" data-src="{{ $ps->gallery_small_banner2 ? asset('assets/images/'.$ps->gallery_small_banner2):asset('assets/images/noimage.png') }}"></div>
							</a>
						</div>
						<div class="mycol c3">
							<a href="{{$ps->gallery_small_banner_link3}}" class="banner">
								<div class="img lazy" data-src="{{ $ps->gallery_small_banner3 ? asset('assets/images/'.$ps->gallery_small_banner3):asset('assets/images/noimage.png') }}"></div>

							</a>
						</div>
						<div class="mycol">
							<a href="{{$ps->gallery_small_banner_link4}}" class="banner">
								<div class="img lazy" data-src="{{ $ps->gallery_small_banner4 ? asset('assets/images/'.$ps->gallery_small_banner4):asset('assets/images/noimage.png lazy') }}"></div>
							</a>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

	@if($ps->featured == 1)
	<!-- Trending Item Area Start -->
	<section  class="trending">
		<div class="container-fluid">
            <div class="t-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-top">
                            <h2 class="section-title">
                                {{ __('Featured') }}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-item-slider">
                            @foreach($feature_products as $prod)
                                @include('includes.product.slider-product')
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
		</div>
	</section>
	<!-- Tranding Item Area End -->
@endif

@if($ps->small_banner == 1)

	<!-- Banner Area One Start -->
	<section class="banner-section">
		<div class="container-fluid">
			@foreach($banners->where('type','=','TopSmall')->get()->chunk(2) as $chunk)
				<div class="row">
					@foreach($chunk as $img)
						<div class="col-lg-6">
							<div class="left">
								<a class="banner-effect" href="{{ $img->link }}" target="_blank">
									<img class="lazy" data-src="{{asset('assets/images/banners/'.$img->photo)}}" alt="">
								</a>
							</div>
						</div>
					@endforeach
				</div>
			@endforeach
		</div>
	</section>
	<!-- Banner Area One Start -->
@endif



	@if($ps->best == 1)
		<!-- Phone and Accessories Area Start -->
		<!--<section class="phone-and-accessories categori-item">-->
		<!--	<div class="container">-->
		<!--		<div class="row">-->
		<!--			<div class="col-lg-12">-->
		<!--				<div class="section-top">-->
		<!--					<h2 class="section-title">-->
		<!--						{{ __('Best Seller') }}-->
		<!--					</h2>-->
		<!--				</div>-->
		<!--			</div>-->
		<!--		</div>-->
		<!--		<div class="row">-->
		<!--			<div class="col-lg-12">-->
		<!--				<div class="row">-->
		<!--				     <div class="trending-item-slider">-->
		<!--					@foreach($best_products as $prod)-->
		<!--						@include('includes.product.home-product')-->
		<!--					@endforeach-->
		<!--					</div>-->
		<!--				</div>-->
		<!--			</div>-->
					<!--<div class="col-lg-3 remove-padding d-none d-lg-block">-->
					<!--	<div class="aside">-->
					<!--		<a class="banner-effect mb-10" href="{{ $ps->best_seller_banner_link }}">-->
					<!--			<img class="lazy" data-src="{{asset('assets/images/'.$ps->best_seller_banner)}}" alt="">-->
					<!--		</a>-->
					<!--		<a class="banner-effect" href="{{ $ps->best_seller_banner_link1 }}">-->
					<!--			<img class="lazy" data-src="{{asset('assets/images/'.$ps->best_seller_banner1)}}" alt="">-->
					<!--		</a>-->
					<!--	</div>-->
					<!--</div>-->
		<!--		</div>-->
		<!--	</div>-->
		<!--</section>-->
			<section  class="trending">
		<div class="container-fluid">
            <div class="t-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-top">
                            <h2 class="section-title">
                                {{ __('Best Seller') }}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-item-slider">
                            @foreach($best_products as $prod)
                                @include('includes.product.home-product')
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
		</div>
	</section>
		<!-- Phone and Accessories Area start-->
	@endif

	@if($ps->flash_deal == 1)
		<!-- Electronics Area Start -->
		<!--<section class="categori-item electronics-section">-->
		<!--	<div class="container">-->
		<!--		<div class="row">-->
		<!--			<div class="col-lg-12">-->
		<!--				<div class="section-top">-->
		<!--					<h2 class="section-title">-->
		<!--						{{ __('Flash Deal') }}-->
		<!--					</h2>-->
		<!--				</div>-->
		<!--			</div>-->
		<!--		</div>-->
		<!--		<div class="row">-->
		<!--			<div class="col-lg-12">-->
		<!--				<div class="flash-deals">-->
		<!--					<div class="flas-deal-slider">-->

		<!--						@foreach($discount_products as $prod)-->
		<!--							@include('includes.product.flash-product')-->
		<!--						@endforeach-->
		<!--					</div>-->
		<!--				</div>-->
		<!--			</div>-->
		<!--		</div>-->
		<!--	</div>-->
		<!--</section>-->
		<section  class="trending">
		<div class="container-fluid">
            <div class="t-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-top">
                            <h2 class="section-title">
                                {{ __('Flash Deal') }}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-item-slider">
                            @foreach($discount_products as $prod)
                                @include('includes.product.flash-product')
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
		</div>
	</section>
		<!-- Electronics Area start-->
	@endif

	@if($ps->large_banner == 1)
		<!-- Banner Area One Start -->
		<section class="banner-section">
			<div class="container-fluid">
				@foreach($banners->where('type','=','Large')->get()->chunk(1) as $chunk)
					<div class="row">
						@foreach($chunk as $img)
							<div class="col-lg-12">
								<div class="img">
									<a class="banner-effect" href="{{ $img->link }}">
										<img class="lazy" data-src="{{asset('assets/images/banners/'.$img->photo)}}" alt="">
									</a>
								</div>
							</div>
						@endforeach
					</div>
				@endforeach
			</div>
		</section>
		<!-- Banner Area One Start -->
	@endif

	@if($ps->top_rated == 1)
		<!-- Electronics Area Start -->
		<!--<section class="categori-item electronics-section">-->
		<!--	<div class="container">-->
		<!--		<div class="row">-->
		<!--			<div class="col-lg-12">-->
		<!--				<div class="section-top">-->
		<!--					<h2 class="section-title">-->
		<!--						{{ __('Top Rated') }}-->
		<!--					</h2>-->
		<!--				</div>-->
		<!--			</div>-->
		<!--		</div>-->
		<!--		<div class="row">-->
		<!--			<div class="col-lg-12">-->
		<!--				<div class="row">-->

		<!--					@foreach($top_products as $prod)-->
		<!--						@include('includes.product.top-product')-->
		<!--					@endforeach-->

		<!--				</div>-->
		<!--			</div>-->
		<!--		</div>-->
		<!--	</div>-->
		<!--</section>-->
		<section  class="trending">
		<div class="container-fluid">
            <div class="t-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-top">
                            <h2 class="section-title">
                                {{ __('Top Rated') }}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-item-slider">
                            @foreach($top_products as $prod)
								@include('includes.product.top-product')
							@endforeach
                        </div>
                    </div>

                </div>
            </div>
		</div>
	</section>
		<!-- Electronics Area start-->
	@endif

	@if($ps->bottom_small == 1)
		<!-- Banner Area One Start -->
		<section class="banner-section">
			<div class="container-fluid">
				@foreach($banners->where('type','=','BottomSmall')->get()->chunk(3) as $chunk)
					<div class="row">
						@foreach($chunk as $img)
							<div class="col-lg-4">
								<div class="left">
									<a class="banner-effect" href="{{ $img->link }}" target="_blank">
										<img class="lazy" data-src="{{asset('assets/images/banners/'.$img->photo)}}" alt="">
									</a>
								</div>
							</div>
						@endforeach
					</div>
				@endforeach
			</div>
		</section>
		<!-- Banner Area One Start -->
	@endif

	@if($ps->big == 1)
		<!-- Clothing and Apparel Area Start -->
		<!--<section class="categori-item clothing-and-Apparel-Area">-->
		<!--	<div class="container">-->
		<!--		<div class="row">-->
		<!--			<div class="col-lg-12">-->
		<!--				<div class="section-top">-->
		<!--					<h2 class="section-title">-->
		<!--						{{ __('Big Save') }}-->
		<!--					</h2>-->

		<!--				</div>-->
		<!--			</div>-->
		<!--		</div>-->
		<!--		<div class="row">-->
		<!--			<div class="col-lg-9">-->
		<!--				<div class="row">-->
		<!--					@foreach($big_products as $prod)-->
		<!--						@include('includes.product.home-product')-->
		<!--					@endforeach-->



		<!--				</div>-->
		<!--			</div>-->
		<!--			<div class="col-lg-3 remove-padding d-none d-lg-block">-->
		<!--				<div class="aside">-->
		<!--					<a class="banner-effect mb-10" href="{{ $ps->big_save_banner_link }}">-->
		<!--						<img class="lazy" data-src="{{asset('assets/images/'.$ps->big_save_banner)}}" alt="">-->
		<!--					</a>-->
		<!--					<a class="banner-effect" href="{{ $ps->big_save_banner_link1 }}">-->
		<!--						<img class="lazy" data-src="{{asset('assets/images/'.$ps->big_save_banner1)}}" alt="">-->
		<!--					</a>-->
		<!--				</div>-->
		<!--			</div>-->
		<!--		</div>-->
		<!--	</div>-->
		<!--	</div>-->
		<!--</section>-->
		
		<section  class="trending">
		<div class="container-fluid">
            <div class="t-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-top">
                            <h2 class="section-title">
                                	{{ __('Big Save') }}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-item-slider">
                            @foreach($big_products as $prod)
									@include('includes.product.home-product')
							@endforeach
                        </div>
                    </div>

                </div>
            </div>
		</div>
	</section>
		<!-- Clothing and Apparel Area start-->
	@endif

	@if($ps->hot_sale == 1)
		<!-- hot-and-new-item Area Start -->
		<section class="hot-and-new-item">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="accessories-slider">
							<div class="slide-item">
								<div class="row">
									<div class="col-lg-3 col-sm-6">
										<div class="categori">
											<div class="section-top">
												<h2 class="section-title">
													{{ __('Hot') }}
												</h2>
											</div>
											<div class="hot-and-new-item-slider">
												@foreach($hot_products->chunk(3) as $chunk)
													<div class="item-slide">
														<ul class="item-list">
															@foreach($chunk as $prod)
																@include('includes.product.list-product')
															@endforeach
														</ul>
													</div>
												@endforeach
											</div>

										</div>
									</div>
									<div class="col-lg-3 col-sm-6">
										<div class="categori">
											<div class="section-top">
												<h2 class="section-title">
													{{ __('New') }}
												</h2>
											</div>

											<div class="hot-and-new-item-slider">

												@foreach($latest_products->chunk(3) as $chunk)
													<div class="item-slide">
														<ul class="item-list">
															@foreach($chunk as $prod)
																@include('includes.product.list-product')
															@endforeach
														</ul>
													</div>
												@endforeach

											</div>
										</div>
									</div>
									<div class="col-lg-3 col-sm-6">
										<div class="categori">
											<div class="section-top">
												<h2 class="section-title">
													{{ __('Trending') }}
												</h2>
											</div>


											<div class="hot-and-new-item-slider">

												@foreach($trending_products->chunk(3) as $chunk)
													<div class="item-slide">
														<ul class="item-list">
															@foreach($chunk as $prod)
																@include('includes.product.list-product')
															@endforeach
														</ul>
													</div>
												@endforeach

											</div>

										</div>
									</div>
									<div class="col-lg-3 col-sm-6">
										<div class="categori">
											<div class="section-top">
												<h2 class="section-title">
													{{ __('Sale') }}
												</h2>
											</div>

											<div class="hot-and-new-item-slider">

												@foreach($sale_products->chunk(3) as $chunk)
													<div class="item-slide">
														<ul class="item-list">
															@foreach($chunk as $prod)
																@include('includes.product.list-product')
															@endforeach
														</ul>
													</div>
												@endforeach

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Clothing and Apparel Area start-->
	@endif

    <!--<section class="review-section">-->
    <!--    <div class="container">-->
    <!--        <div class="col-lg-12">-->
    <!--            <div class="aside">-->
    <!--                <div class="slider-wrapper">-->
    <!--                    <h4 class="section-title">{{__('Customer Feedback')}}</h4>-->
    <!--                    <div class="aside-review-slider">-->
    <!--                        @foreach($reviews as $review)-->
    <!--                            <div class="slide-item">-->
    <!--                                <div class="top-area">-->
    <!--                                        <img class="lazy" data-src="{{ $review->photo ? asset('assets/images/reviews/'.$review->photo) : asset('assets/images/noimage.png') }}" alt="">-->
    <!--                                </div>-->
    <!--                                <div class="main-centent">-->
    <!--                                    <p class="review-text">-->
    <!--                                        {!! $review->details !!}-->
    <!--                                    </p>-->

    <!--                                    <h4 class="name">{{ $review->title }}</h4>-->
    <!--                                    <p class="dagenation">{{ $review->subtitle }}</p>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        @endforeach-->


    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

	@if($ps->review_blog == 1)
		<!-- Blog Area Start -->
		<section class="blog-area">
			<div class="container-fluid">
				<div class="row">
					@foreach(DB::table('blogs')->orderby('views','desc')->take(2)->get() as $blogg)
						<div class="col-lg-4 col-md-6">
							<div class="blog-box">
								<div class="blog-images">
									<div class="img">
										<img  data-src="{{ $blogg->photo ? asset('assets/images/blogs/'.$blogg->photo):asset('assets/images/noimage.png') }}" class="img-fluid lazy" alt="">

									</div>

								</div>
								<div class="details">
									<div class="top-meta">
										<p class="postbay">
											{{__('By Admin')}},
										</p>
										<p class="date">
											<span>{{date('d', strtotime($blogg->created_at))}}</span>
												<span>{{date('M', strtotime($blogg->created_at))}}</span>
										</p>
									</div>
									<a href='{{route('front.blogshow',$blogg->id)}}'>
										<h4 class="blog-title">
											{{mb_strlen($blogg->title,'utf-8') > 40 ? mb_substr($blogg->title,0,40,'utf-8')."...":$blogg->title}}
										</h4>
									</a>
									<p class="blog-text">
										{{substr(strip_tags($blogg->details),0,170)}}
									</p>
									<a class="read-more-btn" href="{{route('front.blogshow',$blogg->id)}}">{{ __('Read More') }}</a>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</section>
		<!-- Blog Area start-->
	@endif

	@if($ps->partners == 1)
		<!-- Partners Area Start -->
		<section class="partners">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-top">
							<h2 class="section-title">
								{{ __('Brands') }}
							</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="partner-slider">
							@foreach($partners as $data)
								<div class="item-slide">
									<a href="{{ $data->link }}" target="_blank">
										<img class="lazy" data-src="{{asset('assets/images/partner/'.$data->photo)}}" alt="">
									</a>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Partners Area Start -->
	@endif

	@if($ps->service == 1)

    {{-- Sunscripber Area Start --}}
<!--<div class="subscriber-section">-->
<!--    <div class="container">-->
<!--      <div class="row">-->
<!--        <div class="col-lg-12">-->
<!--          <div class="subscriber-area"  style="background-image: url({{asset('assets/images/'.$gs->newsletter_banner)}})">-->
<!--              <div class="overlay"></div>-->
<!--              <div class="content">-->
<!--                  <h3>{{__('Subscribe Our Newsletters')}}</h3>-->
<!--                  <h6>{{__('Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, nisi.')}}</h6>-->
<!--                  <form id="subscribeform" action="{{route('front.subscribe')}}" method="POST" class="sub-form">-->
<!--					@csrf-->
<!--                      <input type="email" name="email" placeholder="Enter your email address">-->
<!--                      <button class="mybtn1" type="submit">{{__('Subscribe Now')}}</button>-->
<!--                  </form>-->
<!--              </div>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
  {{-- Sunscripber Area End --}}

	{{-- Info Area Start --}}
	<section class="info-area">
			<div class="container-fluid">
						<div class="row mb-4" style="margin-top:-40px">
							<div class="col-lg-12 p-0">
								<div class="info-big-box">
									<div class="row">
										
										@foreach($services as $service)
											<div class="col-6 col-xl-3 p-0">
												<div class="info-box">
													<div class="icon">
														<img class="lazy-service" data-src="{{ asset('assets/images/services/'.$service->photo) }}">
													</div>
													<div class="info">
														<div class="details">
															<h4 class="title">{{ $service->title }}</h4>
															<p class="text">
																{!! $service->details !!}
															</p>
														</div>
													</div>
												</div>
											</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
			</div>
		</section>
		{{-- Info Area End  --}}

		@endif


	<!-- main -->
	<script src="{{asset('assets/front/js/mainextra.js')}}"></script>

	<script>
			$(".lazy-service",).Lazy({
				scrollDirection: 'vertical',
				effect: "fadeIn",
				effectTime:1000,
				threshold: 0,
				visibleOnly: true,  
				onError: function(element) {
					console.log('error loading ' + element.data('src'));
				}
			});
			$(".lazy",).Lazy({
				scrollDirection: 'vertical',
				effect: "fadeIn",
				effectTime:1000,
				threshold: 0,
				visibleOnly: true,  
				onError: function(element) {
					console.log('error loading ' + element.data('src'));
				}
			});
	
	</script>
