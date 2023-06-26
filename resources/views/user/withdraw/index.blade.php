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
								<h4 class="title" >
									{{ __('My Withdraws') }}
									<a class="mybtn1" href="{{route('user-wwt-create')}}"> <i class="fas fa-plus"></i> {{ __('Withdraw Now') }}</a>
								</h4>
							</div>
							<div class="mr-table allproduct mt-4">
									<div class="table-responsiv">
											<table id="example" class="table table-hover dt-responsive" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>{{ __('Withdraw Date') }}</th>
														<th>{{__('Method') }}</th>
														<th>{{ __('Account') }}</th>
														<th>{{ __('Amount') }}</th>
														<th>{{ __('Status')}}</th>
													</tr>
												</thead>
												<tbody>
                            @foreach($withdraws as $withdraw)
                                <tr>
                                    <td>{{date('d-M-Y',strtotime($withdraw->created_at))}}</td>
                                    <td>{{$withdraw->method}}</td>
                                    @if($withdraw->method != "Bank")
                                        <td>{{$withdraw->acc_email}}</td>
                                    @else
                                        <td>{{$withdraw->iban}}</td>
                                    @endif
                                    <td>{{$sign->sign}}{{ round($withdraw->amount * $sign->value , 2) }}</td>
                                    <td>{{ucfirst($withdraw->status)}}</td>
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