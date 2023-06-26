@extends('layouts.front')
@section('styles')
	<link rel="stylesheet" href="{{asset('assets/front/css/compaire.css')}}">
@endsection
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
							<a href="{{ route('product.compare') }}">
								{{ __('Compare') }}
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcrumb Area End -->

	<!-- Compare Area Start -->
	<section class="compare-page">
		<div class="container">

			@if(Session::has('compare'))

			<div class="row">
				<div class="col-lg-12">
					<div class="content">
						<div class="com-heading">
							<h2 class="title">
									{{ __('Product Compare') }}
							</h2>
						</div>
						<div class="compare-page-content-wrap">
							<div class="compare-table table-responsive">
								<table class="table table-bordered mb-0">
									<tbody>
										<tr>

											<td class="first-column top">{{ __('Product Name') }}</td>
											@foreach($products as $product)
											<td class="product-image-title c{{$product['item']['id']}}">

													<img class="img-fluid" src="{{ $product['item']['thumbnail'] ? asset('assets/images/thumbnails/'.$product['item']['thumbnail']):asset('assets/images/noimage.png') }}" alt="Compare product['item']">

												<a href="{{ route('front.product', $product['item']['slug']) }}">
													<h4 class="title">
															{{ $product['item']['name'] }}
													</h4>
												</a>
											</td>
											@endforeach
										</tr>
										<tr>
											<td class="first-column">{{ __('Price') }}</td>
											@foreach($products as $product)
											<td class="pro-price c{{$product['item']['id']}}">{{ App\Models\Product::find($product['item']['id'])->showPrice() }}</td>
											@endforeach
										</tr>
										<tr>
											<td class="first-column">{{__('Rating') }}</td>
											@foreach($products as $product)
											<td class="pro-ratting c{{$product['item']['id']}}">
                                                <div class="ratings">
                                                    <div class="empty-stars"></div>
                                                    <div class="full-stars" style="width:{{App\Models\Rating::ratings($product['item']['id'])}}%"></div>
                                                </div>
											</td>
											@endforeach
										</tr>




										<tr>
												<td class="first-column">{{ __('Description') }}</td>
												@foreach($products as $product)
												<td class="pro-desc c{{$product['item']['id']}}">
													<p>{{ strip_tags($product['item']['details']) }}</p>
												</td>
												@endforeach

											</tr>
											<tr>
													<td class="first-column">{{ __('Add To Cart') }}</td>
													@foreach($products as $product)
													<td class="c{{$product['item']['id']}}">
															@if($product['item']['product_type'] == "affiliate")
															<a href="{{ route('affiliate.product', $product['item']['slug']) }}" class="btn__bg">{{ __('Buy Now') }}</a>
															@else

														<a href="javascript:;" data-href="{{ route('product.cart.add',$product['item']['id']) }}" class="btn__bg add-to-cart">{{ __('Add To Cart') }}</a>
													<a href="{{ route('product.cart.quickadd',$product['item']['id']) }}" class="btn__bg">{{ __('Buy Now') }}</a>
															@endif
													</td>
													@endforeach
												</tr>
										<tr>
											<td class="first-column">{{ __('Remove') }}</td>
											@foreach($products as $product)
											<td class="pro-remove c{{$product['item']['id']}}">
												<i class="far fa-trash-alt compare-remove" data-href="{{ route('product.compare.remove',$product['item']['id']) }}" data-class="c{{$product['item']['id']}}"></i>
											</td>
											@endforeach
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

			@else

			<div class="page-center">
				<h4 class="text-center">{{ __('No Product Found.') }}</h4>
			</div>

			@endif


		</div>
	</section>
	<!-- Compare Area End -->

@endsection
