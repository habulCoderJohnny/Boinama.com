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
									{{ __('Reward Point') }}
									<a class="mybtn1" href="{{route('user-reward-convernt')}}"> <i class="fas fa-plus"></i> {{ __('Convert Point') }}</a>
								</h4>
							</div>
                        
							<div class="mr-table allproduct mt-4">
									<div class="table-responsiv">
											<table id="example" class="table table-hover dt-responsive" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>{{ __('Reward') }}</th>
														<th>{{ __('Amount') }}</th>
														<th>{{ __('Created at') }}</th>
													</tr>
												</thead>
												<tbody>
												@foreach($datas as $data)
													<tr>
														<td>{{$data->reward_point}}</td>
														<td>${{$data->reward_dolar}}</td>
														<td>{{$data->created_at->diffForHumans()}}</td>
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