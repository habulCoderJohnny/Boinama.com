@extends('layouts.front')

@section('styles')
    <link rel="stylesheet" href="{{ asset('public/assets/front/css/user.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/front/css/datatables.css') }}">
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
                                    {{ __('Deposits') }}
                                    <a class="mybtn1" href="{{ route('user-deposit-create') }}"> <i class="fas fa-plus"></i>
                                        {{ __('Deposit') }}</a>
                                </h4>
                            </div>
                            <div class="mr-table allproduct mt-4">
                                <div class="table-responsiv">
                                    <table id="example" class="table table-hover dt-responsive" cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Deposit Date') }}</th>
                                                <th>{{ __('Method') }}</th>
                                                <th>{{ __('Amount') }}</th>
                                                <th>{{ __('Status') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (Auth::user()->deposits as $data)
                                                <tr>
                                                    <td>{{ date('d-M-Y', strtotime($data->created_at)) }}</td>
                                                    <td>{{ $data->method }}</td>
                                                    <td>{{ $data->currency_code }}
                                                        {{ round($data->amount * $data->currency_value, 2) }}</td>
                                                    <td>{{ $data->status == 1 ? 'Completed' : 'Pending' }}</td>
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
    <script src="{{ asset('public/assets/front/js/datatables.js') }}"></script>
@endsection
