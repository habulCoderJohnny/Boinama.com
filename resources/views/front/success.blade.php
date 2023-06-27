@extends('layouts.front')


@section('styles')
    <link rel="stylesheet" href="{{ asset('public/assets/front/css/checkout.css') }}">
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
                            <a href="{{ route('payment.return') }}">
                                {{ __('Success') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->






    <section class="tempcart">

        @if (!empty($tempcart))

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <!-- Starting of Dashboard data-table area -->
                        <div class="content-box section-padding add-product-1">
                            <div class="top-area">
                                <div class="content">
                                    <h4 class="heading">
                                        {{ __('THANK YOU FOR YOUR PURCHASE.') }}
                                    </h4>
                                    <p class="text">
                                        {{ __("We'll email you an order confirmation with details and tracking info.") }}
                                    </p>
                                    <a href="{{ route('front.index') }}"
                                        class="link">{{ __('Get Back To Our Homepage') }}</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="product__header">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-12">
                                                <div class="product-header-title">
                                                    <h2>{{ __('Order#') }} {{ $order->order_number }}</h2>
                                                </div>
                                            </div>
                                            @include('includes.form-success')
                                            <div class="col-md-12" id="tempview">
                                                <div class="dashboard-content">
                                                    <div class="view-order-page" id="print">
                                                        <p class="order-date">{{ __('Order Date') }}
                                                            {{ date('d-M-Y', strtotime($order->created_at)) }}</p>


                                                        @if ($order->dp == 1)

                                                            <div class="billing-add-area">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <h5>{{ __('Billing Address') }}</h5>
                                                                        <address>
                                                                            {{ __('Name:') }}
                                                                            {{ $order->customer_name }}<br>
                                                                            {{ __('Email:') }}
                                                                            {{ $order->customer_email }}<br>
                                                                            {{ __('Phone:') }}
                                                                            {{ $order->customer_phone }}<br>
                                                                            {{ __('Address:') }}
                                                                            {{ $order->customer_address }}<br>
                                                                            {{ $order->customer_district }}-{{ $order->customer_zip }}
                                                                        </address>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <h5>{{ __('Payment Information') }}</h5>
                                                                        <p>{{ __('Paid Amount:') }}
                                                                            {{ $order->currency_sign }}{{ round(($order->pay_amount + $order->wallet_price) * $order->currency_value, 2) }}
                                                                        </p>
                                                                        <p>{{ __('Payment Method:') }}
                                                                            {{ $order->method }}</p>

                                                                        @if ($order->method != 'Cash On Delivery')
                                                                            @if ($order->method == 'Stripe')
                                                                                {{ $order->method }}
                                                                                {{ __('Charge ID:') }} <p>
                                                                                    {{ $order->charge_id }}</p>
                                                                            @endif
                                                                            {{ $order->method }}
                                                                            {{ __('Transaction ID:') }} <p id="ttn">
                                                                                {{ $order->txnid }}</p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="shipping-add-area">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        @if ($order->shipping == 'shipto')
                                                                            <h5>{{ __('Shipping Address') }}</h5>
                                                                            <address>
                                                                                {{ __('Name:') }}
                                                                                {{ $order->shipping_name == null ? $order->customer_name : $order->shipping_name }}<br>
                                                                                {{ __('Email:') }}
                                                                                {{ $order->shipping_email == null ? $order->customer_email : $order->shipping_email }}<br>
                                                                                {{ __('Phone:') }}
                                                                                {{ $order->shipping_phone == null ? $order->customer_phone : $order->shipping_phone }}<br>
                                                                                {{ __('Address:') }}
                                                                                {{ $order->shipping_address == null ? $order->customer_address : $order->shipping_address }}<br>
                                                                                {{ $order->shipping_upazila == null ? $order->customer_upazila : $order->shipping_upazila }},
                                                                                {{ $order->shipping_district == null ? $order->customer_district : $order->shipping_district }},{{ $order->shipping_division == null ? $order->customer_division : $order->shipping_division }}
                                                                            </address>
                                                                        @else
                                                                            <h5>{{ __('PickUp Location') }}</h5>
                                                                            <address>
                                                                                {{ __('Address:') }}
                                                                                {{ $order->pickup_location }}<br>
                                                                            </address>
                                                                        @endif

                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <h5>{{ __('Shipping Method') }}</h5>
                                                                        @if ($order->shipping == 'shipto')
                                                                            <p>{{ __('Ship To Address') }}</p>
                                                                        @else
                                                                            <p>{{ __('Pick Up') }}</p>
                                                                        @endif
                                                                        @if ($order->shipping_cost != 0)
                                                                            @php
                                                                                $price = round($order->shipping_cost / $order->currency_value, 2);
                                                                            @endphp
                                                                            @if (DB::table('shippings')->where('price', '=', $price)->count() > 0)
                                                                                <p>
                                                                                    {{ DB::table('shippings')->where('price', '=', $price)->first()->title }}:
                                                                                    {{ $order->currency_sign }}{{ round($order->shipping_cost, 2) }}
                                                                                </p>
                                                                            @endif
                                                                        @endif

                                                                        @if ($order->packing_cost != 0)
                                                                            @php
                                                                                $pprice = round($order->packing_cost / $order->currency_value, 2);
                                                                            @endphp


                                                                            @if (DB::table('packages')->where('price', '=', $pprice)->count() > 0)
                                                                                <p>
                                                                                    {{ DB::table('packages')->where('price', '=', $pprice)->first()->title }}:
                                                                                    {{ $order->currency_sign }}{{ round($order->packing_cost, 2) }}
                                                                                </p>
                                                                            @endif
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="billing-add-area">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <h5>{{ __('Billing Address') }}</h5>
                                                                        <address>
                                                                            {{ __('Name:') }}
                                                                            {{ $order->customer_name }}<br>
                                                                            {{ __('Email:') }}
                                                                            {{ $order->customer_email }}<br>
                                                                            {{ __('Phone:') }}
                                                                            {{ $order->customer_phone }}<br>
                                                                            {{ __('Address:') }}
                                                                            {{ $order->customer_address }}<br>
                                                                            {{ $order->customer_upazila }},{{ $order->customer_district }},{{ $order->customer_division }}
                                                                        </address>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <h5>{{ __('Payment Information') }}</h5>
                                                                        <p>{{ __('Paid Amount:') }}
                                                                            {{ $order->currency_sign }}{{ round(($order->pay_amount + $order->wallet_price) * $order->currency_value, 2) }}
                                                                        </p>
                                                                        <p>{{ __('Payment Method:') }}
                                                                            {{ $order->method }}</p>

                                                                        @if ($order->method != 'Cash On Delivery')
                                                                            @if ($order->method == 'Stripe')
                                                                                {{ $order->method }}
                                                                                {{ __('Charge ID:') }} <p>
                                                                                    {{ $order->charge_id }}</p>
                                                                            @endif
                                                                            @if ($order->method == 'Paypal')
                                                                                {{ $order->method }}
                                                                                {{ __('Transaction ID:') }} <p
                                                                                    id="ttn">
                                                                                    {{ isset($_GET['tx']) ? $_GET['tx'] : '' }}
                                                                                </p>
                                                                            @else
                                                                                {{ $order->method }}
                                                                                {{ __('Transaction ID:') }} <p
                                                                                    id="ttn">{{ $order->txnid }}</p>
                                                                            @endif
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <br>
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <h4 class="text-center">{{ __('Ordered Products:') }}</h4>
                                                                <thead>
                                                                    <tr>

                                                                        <th width="60%">{{ __('Name') }}</th>
                                                                        <th width="20%">{{ __('Details') }}</th>
                                                                        <th width="10%">{{ __('Price') }}</th>
                                                                        <th width="10%">{{ __('Total') }}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php
                                                                        $cart = json_decode($order->cart, true);
                                                                    @endphp
                                                                    @foreach ($cart['items'] as $product)
                                                                        <tr>

                                                                            <td>{{ $product['item']['name'] }}</td>
                                                                            <td>
                                                                                <b>{{ __('Quantity') }}</b>:
                                                                                {{ $product['qty'] }} <br>
                                                                                @if (!empty($product['size']))
                                                                                    <b>{{ __('Size') }}</b>:
                                                                                    {{ $product['item']['measure'] }}{{ str_replace('-', ' ', $product['size']) }}
                                                                                    <br>
                                                                                @endif
                                                                                @if (!empty($product['color']))
                                                                                    <div class="d-flex mt-2">
                                                                                        <b>{{ __('Color') }}</b>: <span
                                                                                            id="color-bar"
                                                                                            style="border: 10px solid #{{ $product['color'] == '' ? 'white' : $product['color'] }};"></span>
                                                                                    </div>
                                                                                @endif

                                                                                @if (!empty($product['keys']))
                                                                                    @foreach (array_combine(explode(',', $product['keys']), explode(',', $product['values'])) as $key => $value)
                                                                                        <b>{{ ucwords(str_replace('_', ' ', $key)) }}
                                                                                            : </b> {{ $value }}
                                                                                        <br>
                                                                                    @endforeach
                                                                                @endif

                                                                            </td>
                                                                            <td>{{ $order->currency_sign }}{{ round($product['item_price'] * $order->currency_value, 2) }}
                                                                            </td>
                                                                            <td>{{ $order->currency_sign }}{{ round($product['price'] * $order->currency_value, 2) }}
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
                        <!-- Ending of Dashboard data-table area -->
                    </div>

        @endif

    </section>

@endsection
