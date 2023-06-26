@extends('layouts.front')
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/front/css/user.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/datatables.css')}}">
@endsection
@section('content')


<section class="user-dashbord">
    <div class="container">
      <div class="row">
        @include('includes.user-dashboard-sidebar')
        <div class="col-lg-8">
					<div class="user-profile-details">
						<div class="order-history">
							<div class="header-area">
								<h4 class="title">
									{{ __('Purchased Items') }}
								</h4>
							</div>
							<div class="mr-table allproduct mt-4">
								@include('includes.form-success')
									<div class="table-responsiv">
											<table id="example" class="table table-hover dt-responsive" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>{{ __('#Order') }}</th>
														<th>{{ __('Date') }}</th>
														<th>{{__('Order Total') }}</th>
														<th>{{ __('Order Status') }}</th>
														<th>{{ __('Action') }}</th>


													</tr>
												</thead>
												<tbody>
													 @foreach($orders as $order)
													<tr>
														<td>
																{{$order->order_number}}
														</td>
														<td>
																{{date('d M Y',strtotime($order->created_at))}}
														</td>
														<td>
																{{$order->currency_sign}}{{ round($order->pay_amount * $order->currency_value , 2) }}
														</td>
														<td>
															<div class="order-status {{ $order->status }}">
																	{{ucwords($order->status)}}
															</div>
														</td>
														<td>
															<a class="mybtn1 sm sm1" href="{{route('user-order',$order->id)}}">
																	{{ __('VIEW ORDER') }}
															</a>
														</td>

													</tr>
													@endforeach
												</tbody>
											</table>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
@section('scripts')
<script src="{{asset('assets/front/js/datatables.js')}}"></script>
@endsection