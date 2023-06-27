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
                    @include('includes.form-success')
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <div class="user-profile-details">
                                <div class="account-info">
                                    <div class="header-area">
                                        <h4 class="title">
                                            {{ __('Account Information') }}
                                        </h4>
                                    </div>
                                    <div class="edit-info-area">
                                    </div>
                                    <div class="main-info">
                                        <h5 class="title">{{ $user->name }}</h5>
                                        <ul class="list">
                                            <li>
                                                <p><span class="user-title">{{ __('Email') }}:</span> {{ $user->email }}
                                                </p>
                                            </li>
                                            @if ($user->phone != null)
                                                <li>
                                                    <p><span class="user-title">{{ __('Phone') }}:</span>
                                                        {{ $user->phone }}</p>
                                                </li>
                                            @endif
                                            @if ($user->fax != null)
                                                <li>
                                                    <p><span class="user-title">{{ __('Fax') }}:</span>
                                                        {{ $user->fax }}</p>
                                                </li>
                                            @endif
                                            @if ($user->city != null)
                                                <li>
                                                    <p><span class="user-title">{{ __('City') }}:</span>
                                                        {{ $user->city }}</p>
                                                </li>
                                            @endif
                                            @if ($user->zip != null)
                                                <li>
                                                    <p><span class="user-title">{{ __('Zip') }}:</span>
                                                        {{ $user->zip }}</p>
                                                </li>
                                            @endif
                                            @if ($user->address != null)
                                                <li>
                                                    <p><span class="user-title">{{ __('Address') }}:</span>
                                                        {{ $user->address }}</p>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="user-profile-details h100">
                                <div class="account-info wallet h100">
                                    <div class="header-area">
                                        <h4 class="title">
                                            {{ __('My Balance') }}
                                        </h4>
                                    </div>
                                    <div class="edit-info-area">
                                    </div>
                                    <div class="main-info">
                                        <h3 class="title w-title">{{ __('Affiliate Bonus') }}:</h3>
                                        <h3 class="title w-price">
                                            {{ App\Models\Product::vendorConvertPrice($user->affilate_income) }}</h3>
                                    </div>
                                    <hr>
                                    <div class="main-info">
                                        <h3 class="title w-title">{{ __('Wallet Balance') }}:</h3>
                                        <h3 class="title w-price">
                                            {{ App\Models\Product::vendorConvertPrice($user->balance) }}</h3>
                                        <a href="{{ route('user-deposit-create') }}"
                                            class="mybtn1">{{ __('Deposit') }}</a>
                                    </div>
                                    <hr>
                                    <div class="main-info">
                                        <h3 class="title w-title">{{ __('Reward Point') }}:</h3>
                                        <h3 class="title w-price">{{ $user->reward }}</h3>
                                        <a href="{{ route('user-reward-convernt') }}"
                                            class="mybtn1">{{ __('Convert Point') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row row-cards-one mb-3">
                        <div class="col-md-6 col-xl-6">
                            <div class="card c-info-box-area">
                                <div class="c-info-box box2">
                                    <p>{{ Auth::user()->orders()->where('status', 'completed')->count() }}</p>
                                </div>
                                <div class="c-info-box-content">
                                    <h6 class="title">{{ __('Total Orders') }}</h6>
                                    <p class="text">{{ __('All Time') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-6">
                            <div class="card c-info-box-area">
                                <div class="c-info-box box1">
                                    <p>{{ Auth::user()->orders()->where('status', 'pending')->count() }}</p>
                                </div>
                                <div class="c-info-box-content">
                                    <h6 class="title">{{ __('Pending Orders') }}</h6>
                                    <p class="text">{{ __('All Time') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="user-profile-details">
                                <div class="account-info wallet">
                                    <div class="header-area">
                                        <h4 class="title">
                                            {{ __('Recent Orders') }}
                                        </h4>
                                    </div>
                                    <div class="edit-info-area">
                                    </div>
                                    <div class="main-info">
                                        <div class="mr-table allproduct mt-4">
                                            <div class="table-responsiv">
                                                <table id="example" class="table table-hover dt-responsive"
                                                    cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>{{ __('#Order') }}</th>
                                                            <th>{{ __('Date') }}</th>
                                                            <th>{{ __('Order Total') }}</th>
                                                            <th>{{ __('Order Status') }}</th>
                                                            <th>{{ __('View') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach (Auth::user()->orders()->latest()->take(5)->get() as $order)
                                                            <tr>
                                                                <td>
                                                                    {{ $order->order_number }}
                                                                </td>
                                                                <td>
                                                                    {{ date('d M Y', strtotime($order->created_at)) }}
                                                                </td>
                                                                <td>
                                                                    {{ $order->currency_sign }}{{ round($order->pay_amount * $order->currency_value, 2) }}
                                                                </td>
                                                                <td>
                                                                    <div class="order-status {{ $order->status }}">
                                                                        {{ ucwords($order->status) }}
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a class="mybtn2 sm"
                                                                        href="{{ route('user-order', $order->id) }}">
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
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('public/assets/front/js/datatables.js') }}"></script>
@endsection
