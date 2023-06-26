@extends('layouts.admin') 
@section('styles')
<link href="{{asset('assets/admin/css/jquery-ui.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')  
					
					<div class="content-area">
						<div class="mr-breadcrumb">
							<div class="row">
								<div class="col-lg-12">
										<h4 class="heading">{{ __('Withdraw Earning') }}</h4>
										<ul class="links">
											<li>
												<a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
											</li>
											<li>
												<a href="javascript:;">{{ __('Total Earning') }} </a>
											</li>
											<li>
												<a href="{{ route('admin-withdraw-income') }}">{{ __('Withdraw Earning') }}</a>
											</li>
										</ul>
								</div>
							</div>
						</div>
						<form action="{{route('admin-withdraw-income')}}" method="GET">
							<div class="product-area">
							  <div class="row">
							   
								@include('includes.admin.form-both')  
							   
								<div class="col-sm-3 offset-2 mt-3">
								  <input type="text"  autocomplete="off" class="input-field discount_date" value="{{$start_date != '' ? $start_date->format('d-m-Y') : ''}}"  name="start_date"  placeholder="{{ __("Enter Date") }}"  value="">
								</div>
								<div class="col-sm-3 mt-3">
								  <input type="text"  autocomplete="off" class="input-field discount_date" value="{{$end_date != '' ? $end_date->format('d-m-Y') : ''}}" name="end_date"  placeholder="{{ __("Enter Date") }}"  value="">
								</div>
								 <div class="col-sm-4 mt-3">
								   <button type="submit" class="mybtn1">Check</button>
								   <button type="button" id="reset" class="mybtn1">Reset</button>
								  </div>
							  
				
								<div class="col-lg-12">
								  <p class="text-center"> <b> {{$start_date != '' ? $start_date->format('d-m-Y') : ''}} {{$start_date != '' && $end_date != '' ? 'To' : ''}}  {{$end_date != '' ? $end_date->format('d-m-Y') : ''}} {{__('Total Earning')}} : {{$total}}</b></p>
								  <p class="text-center"> <b>Current Month Earning : {{$current_month}}</b></p>
								  <p class="text-center"> <b>Last 30 Days Earning : {{$last_30_days}}</b></p>
								  <div class="mr-table allproduct">
				
								</form>
										@include('includes.admin.form-success') 
										<div class="table-responsiv">
												<table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
													<thead>
                                                        {{__('User Dashboard')}}
														<tr>
									                        <th width="5%">{{ __('#') }}</th>
									                        <th width="20%">{{ __('User Name') }}</th>
									                        <th width="20%">{{ __('Withdraw Earning') }}</th>
									                        <th width="10%">{{ __('Created At') }}</th>
														</tr>
													</thead>
													<tbody>
														@foreach ($orders as $key => $order)
															<tr>
																<td>{{$key+1}}</td>
																<td>
																	{{$order->user->name}}	
																</td>
															
																<td>
																{{$currency->sign}}{{round($order->fee * $currency->value,2)}}
																</td>
																<td>
																	{{$order->created_at->format('d-m-Y')}}
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



@endsection    



@section('scripts')
<script type="text/javascript">
	$('#geniustable').DataTable();	
	$(document).on('click','#reset',function(){
	$('.discount_date').val('');
	location.href = '{{route('admin-withdraw-income')}}';
	})												
</script>
@endsection   