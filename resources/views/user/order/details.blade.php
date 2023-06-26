@extends('layouts.front')
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/front/css/user.css')}}">
@endsection
@section('content')
<section class="user-dashbord">
    <div class="container">
        <div class="row">
            @include('includes.user-dashboard-sidebar')
            <div class="col-lg-8">
                <div class="user-profile-details">
                    <div class="order-details">

                        @if($order->status != 'declined')
                        <div class="process-steps-area">
                            @include('includes.order-process')
                        </div>
                        @endif

                        <div class="header-area">
                            <h4 class="title">
                                {{__('My Order Details') }}

                            </h4>
                        </div>
                        <div class="view-order-page">
                            <h3 class="order-code">{{ __('Order#') }} {{$order->order_number}} [{{$order->status}}]
                            @if($order->status == 'pending')
                            <div class="print-order mt-2">
                                <a data-toggle="modal"  data-target="#confirm-delete-cancel" data-href="{{route('user-order-cancel',$order->id)}}" href="javascript:;"
                                    class="print-order-btn btn-sm cancel-order">
                                    <i class="fa fa-window-close"></i> {{ __('Cancel') }} {{ __('Orders') }}
                                </a>
                            </div>
                            @elseif($order->status == 'completed')
                            @if($order->refund)
                            <div class="print-order mt-2">
                                <a  href="{{route('user.refund.cancel',$order->order_number)}}"
                                    class="print-order-btn btn-sm">
                                    <i class="fa fa-window-close"></i> {{__('Cancel')}} {{ __('Refund') }}
                                </a>
                            </div>
                            @else
                            <div class="print-order mt-2">
                                <a data-toggle="modal" data-target="#vendorform"  href="javascript:;"
                                    class="print-order-btn btn-sm cancel-order">
                                    <i class="fa fa-window-close"></i> {{ __('Refund') }}
                                </a>
                            </div>
                            @endif
                            @endif
                            </h3>
                            <div class="print-order text-right">
                                <a href="{{route('user-order-print',$order->id)}}" target="_blank"
                                    class="print-order-btn">
                                    <i class="fa fa-print"></i> {{ __('Print') }}
                                </a>

                            </div>
                            <p class="order-date">{{ __('Order Date') }} {{date('d-M-Y',strtotime($order->created_at))}}
                            </p>

                            @if($order->dp == 1)

                            <div class="billing-add-area">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>{{ __('Billing Address') }}</h5>
                                        <address>
                                            {{ __('Name:') }} {{ $order->customer_name }}<br>
                                            {{ __('Email:') }} {{ $order->customer_email }}<br>
                                            {{ __('Phone:') }} {{ $order->customer_phone }}<br>
                                            {{ __('Address:') }} {{ $order->customer_address }}<br>
                                            {{ __('Country') }} {{ $order->customer_country }}<br>

                                            {{$order->customer_city}}-{{$order->customer_zip}}
                                        </address>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>{{ __('Payment Information') }}</h5>

                                        <p>{{__('Payment Status') }}:
                                            @if($order->payment_status == 'Pending')
                                            <span class='badge badge-danger'>{{__('Unpaid')}}</span>
                                            @else
                                            <span class='badge badge-success'>{{ __('Paid')}}</span>
                                            @endif
                                         
                                        </p>

                                        <p>{{ __('Paid Amount:') }}
                                            {{$order->currency_sign}}{{ round(($order->pay_amount + $order->wallet_price) * $order->currency_value , 2) }}
                                        </p>
                                        <p>{{ __('Tax') }} (<b>{{$order->tax_location}}</b>) :  {{$order->currency_sign}}{{$order->tax *$order->currency_value}}</p>
                                        <p>{{ __('Payment Method:') }} {{$order->method}}</p>

                                        @if($order->method != "Cash On Delivery")
                                        @if($order->method=="Stripe")
                                        {{$order->method}} {{ __('Charge ID:') }} <p>{{$order->charge_id}}</p>
                                        @endif
                                        {{$order->method}} {{ __('Transaction ID:') }} <p id="ttn">{{$order->txnid}}</p>
                                        <a id="tid" style="cursor: pointer;" class="mybtn2">{{ __('Edit Transaction ID') }}</a>

                                        <form id="tform">
                                            <input style="display: none; width: 100%;" type="text" id="tin" placeholder="{{ __('Enter Transaction ID & Press Enter') }}" required="" class="mb-3">
                                            <input type="hidden" id="oid" value="{{$order->id}}">

                                            <button style="display: none; padding: 5px 15px; height: auto; width: auto; line-height: unset;" id="tbtn" type="submit" class="mybtn1">{{ __('Submit') }}</button>

                                                <a style="display: none; cursor: pointer;  padding: 5px 15px; height: auto; width: auto; line-height: unset;" id="tc"  class="mybtn1">{{ __('Cancel') }}</a>

                                                {{-- Change 1 --}}
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            @else
                            <div class="shipping-add-area">
                                <div class="row">
                                    <div class="col-md-6">
                                        @if($order->shipping == "shipto")
                                        <h5>{{ __('Shipping Address') }}</h5>
                                        <address>
                                            {{ __('Name:') }}
                                            {{$order->shipping_name == null ? $order->customer_name : $order->shipping_name}}<br>
                                            {{ __('Email:') }}
                                            {{$order->shipping_email == null ? $order->customer_email : $order->shipping_email}}<br>
                                            {{ __('Phone:')}}
                                            {{$order->shipping_phone == null ? $order->customer_phone : $order->shipping_phone}}<br>
                                            {{ __('Address:') }}
                                            {{$order->shipping_address == null ? $order->customer_address : $order->shipping_address}}<br>
                                            {{$order->shipping_city == null ? $order->customer_city : $order->shipping_city}}-{{$order->shipping_zip == null ? $order->customer_zip : $order->shipping_zip}}
                                        </address>
                                        @else
                                        <h5>{{ __('PickUp Location')}}</h5>
                                        <address>
                                            {{ __('Address:') }} {{$order->pickup_location}}<br>
                                        </address>
                                        @endif

                                    </div>
                                    <div class="col-md-6">
                                        <h5>{{ __('Shipping Method') }}</h5>
                                        @if($order->shipping == "shipto")
                                        <p>{{ __('Ship To Address') }}</p>
                                        @else
                                        <p>{{ __('Pick Up') }}</p>
                                        @endif

                                        @if($order->shipping_cost != 0)
                                        @php
                                        $price = round(($order->shipping_cost / $order->currency_value),2);
                                        @endphp
                                        @if(DB::table('shippings')->where('price','=',$price)->count() > 0)
                                <p>
                                    {{ DB::table('shippings')->where('price','=',$price)->first()->title }}: {{$order->currency_sign}}{{ round($order->shipping_cost, 2) }}
                                </p>
                                        @endif
                                    @endif

                                    @if($order->packing_cost != 0)

                                        @php
                                        $pprice = round(($order->packing_cost / $order->currency_value),2);
                                        @endphp


                                        @if(DB::table('packages')->where('price','=',$pprice)->count() > 0)
                                <p>
                                    {{ DB::table('packages')->where('price','=',$pprice)->first()->title }}: {{$order->currency_sign}}{{ round($order->packing_cost, 2) }}
                                </p>
                                        @endif
                                    @endif


                                    </div>
                                </div>
                            </div>
                            <div class="billing-add-area">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>{{__('Billing Address') }}</h5>
                                        <address>
                                            {{ __('Name:') }} {{ $order->customer_name }}<br>
                                            {{ __('Email:') }} {{ $order->customer_email }}<br>
                                            {{ __('Phone:') }} {{ $order->customer_phone }}<br>
                                            {{ __('Address:') }} {{ $order->customer_address }}<br>
                                            {{$order->customer_city}}-{{$order->customer_zip}}
                                        </address>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>{{ __('Payment Information') }}</h5>

                                        @if($order->payment_status == 'Pending')
                                            <span class='badge badge-danger'>{{__('Unpaid')}}</span>
                                            @else
                                            <span class='badge badge-success'>{{ __('Paid')}}</span>
                                            @endif
                                         



                                        <p>{{ __('Paid Amount:') }}
                                            {{$order->currency_sign}}{{ round(($order->pay_amount + $order->wallet_price) * $order->currency_value , 2) }}
                                        </p>
                                        <p>{{ __('Tax') }} (<b>{{$order->tax_location}}</b>) :  {{$order->currency_sign}}{{$order->tax *$order->currency_value }}</p>
                                        <p>{{ __('Payment Method:') }} {{$order->method}}</p>

                                        @if($order->method != "Cash On Delivery")
                                        @if($order->method=="Stripe")
                                        {{$order->method}} {{ __('Charge ID:') }} <p>{{$order->charge_id}}</p>
                                        @endif
                                        {{$order->method}} {{ __('Transaction ID:') }} <p id="ttn"> {{$order->txnid}}</p>

                                        <a id="tid" style="cursor: pointer;" class="mybtn2">{{ __('Edit Transaction ID') }}</a>

                                        <form id="tform">
                                            <input style="display: none; width: 100%;" type="text" id="tin" placeholder="{{ __('Enter Transaction ID & Press Enter')}}" required="" class="mb-3">
                                            <input type="hidden" id="oid" value="{{$order->id}}">

                                            <button style="display: none; padding: 5px 15px; height: auto; width: auto; line-height: unset;" id="tbtn" type="submit" class="mybtn1">{{ __('Submit') }}</button>

                                                <a style="display: none; cursor: pointer;  padding: 5px 15px; height: auto; width: auto; line-height: unset;" id="tc"  class="mybtn1">{{ __('Cancel') }}</a>

                                                {{-- Change 1 --}}
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endif
                            <br>




                            <div class="table-responsive">
                                <h5>{{ __('Ordered Products:') }}</h5>
                                <table class="table table-bordered veiw-details-table">
                                    <thead>
                                        <tr>
                                            <th width="5%">{{ __('ID#') }}</th>
                                            <th width="35%">{{ __('Name') }}</th>
                                            <th width="20%">{{ __('Details') }}</th>
                                            <th>{{ __('Price') }}</th>
                                            <th>{{ __('Total') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cart['items'] as $product)
                                        <tr>
                                            <td>{{ $product['item']['id'] }}</td>
                                            <td>
                                                <input type="hidden" value="{{ $product['license'] }}">

                                                @if($product['item']['user_id'] != 0)
                                                @php
                                                $user = App\Models\User::find($product['item']['user_id']);
                                                @endphp
                                                @if(isset($user))
                                                <a target="_blank"
                                                    href="{{ route('front.product', $product['item']['slug']) }}">{{mb_strlen($product['item']['name'],'utf-8') > 30 ? mb_substr($product['item']['name'],0,30,'utf-8').'...' : $product['item']['name']}}</a>
                                                @else
                                                <a target="_blank"
                                                    href="{{ route('front.product', $product['item']['slug']) }}">{{mb_strlen($product['item']['name'],'utf-8') > 30 ? mb_substr($product['item']['name'],0,30,'utf-8').'...' : $product['item']['name']}}</a>
                                                @endif
                                                @else

                                                <a target="_blank"
                                                    href="{{ route('front.product', $product['item']['slug']) }}">{{mb_strlen($product['item']['name'],'utf-8') > 30 ? mb_substr($product['item']['name'],0,30,'utf-8').'...' : $product['item']['name']}}</a>

                                                @endif
                                                @if($product['item']['type'] != 'Physical')
                                                @if($order->payment_status == 'Completed')
                                                @if($product['item']['file'] != null)
                                                <a href="{{ route('user-order-download',['slug' => $order->order_number , 'id' => $product['item']['id']]) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fa fa-download"></i> {{ __('Download') }}
                                                </a>
                                                @else
                                                <a target="_blank" href="{{ $product['item']['link'] }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fa fa-download"></i> {{ __('Download') }}
                                                </a>
                                                @endif
                                                @if($product['license'] != '')
                                                <a href="javascript:;" data-toggle="modal" data-target="#confirm-delete"
                                                    class="btn btn-sm btn-info product-btn" id="license"><i
                                                        class="fa fa-eye"></i> {{ __('View License') }}</a>
                                                @endif
                                                @endif
                                                @endif
                                            </td>
                                            <td>
                                                <b>{{ __('Quantity') }}</b>: {{$product['qty']}} <br>
                                                @if(!empty($product['size']))
                                                <b>{{ __('Size')}}</b>: {{ $product['item']['measure'] }}{{str_replace('-',' ',$product['size'])}} <br>
                                                @endif
                                                @if(!empty($product['color']))
                                                <div class="d-flex mt-2">
                                                <b>{{ __('Color') }}</b>:  <span id="color-bar" style="border: 10px solid {{$product['color'] == "" ? "white" : '#'.$product['color']}};"></span>
                                                </div>
                                                @endif

                                                    @if(!empty($product['keys']))

                                                    @foreach( array_combine(explode(',', $product['keys']), explode(',', $product['values']))  as $key => $value)

                                                        <b>{{ ucwords(str_replace('_', ' ', $key))  }} : </b> {{ $value }} <br>
                                                    @endforeach

                                                    @endif

                                                  </td>
                                            <td>{{$order->currency_sign}}{{round($product['item_price']* $order->currency_value,2)}}
                                            </td>
                                            <td>{{$order->currency_sign}}{{round($product['price'] * $order->currency_value,2)}}
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="edit-account-info-div">
                                    <div class="form-group">
                                        <a class="back-btn" href="{{ route('user-orders') }}">{{ __('Back') }}</a>
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

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header d-block text-center">
                <h4 class="modal-title d-inline-block">{{ __('License Key') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p class="text-center">{{ __('The Licenes Key is :') }} <span id="key"></span></p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('Close')}}</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="confirm-delete-cancel" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

                  <div class="modal-body">
              <p class="text-center">{{ __('Confirm Cancel') }}</p>
              <p class="text-center">{{ __('You are about to cancel this order.') }}</p>
                  </div>
                  <div class="modal-footer justify-content-center">
                      <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Close') }}</button>
                      <a class="btn btn-danger text-white btn-ok">{{ __('Cancel') }} {{__('Orders')}}</a>
                  </div>
              </div>
          </div>
      </div>


      {{-- MESSAGE MODAL --}}
<div class="message-modal">
    <div class="modal" id="vendorform" tabindex="-1" role="dialog" aria-labelledby="vendorformLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="vendorformLabel">{{ __('Send Message') }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
        <div class="modal-body">
          <div class="container-fluid p-0">
            <div class="row">
              <div class="col-md-12">
                <div class="contact-form">
                  <form action="{{route('user.order.refund.submit')}}" method="POST">
                    {{csrf_field()}}
                    <ul>

                      <li>
                        <input type="text" class="input-field" id="eml" name="order_number" placeholder="{{ __('Order Number') }} *" value="{{$order->order_number}}" required="">
                      </li>

                      <li>
                        <textarea class="input-field textarea" name="message" id="msg" placeholder="{{ __('Refund') }} {{__('Messages')}} *" required=""></textarea>
                      </li>
                      <input type="hidden" name="user_id" value="{{ Auth::guard('web')->user()->id }}">

                    </ul>
                    <button class="submit-btn" id="emlsub" type="submit">{{ __('Send Message') }}</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection


@section('scripts')

<script type="text/javascript">
    $('#example').dataTable({
        "ordering": false,
        'paging': false,
        'lengthChange': false,
        'searching': false,
        'ordering': false,
        'info': false,
        'autoWidth': false,
        'responsive': true
    });
</script>
<script>
    $(document).on("click", "#tid", function (e) {
        $(this).hide();
        $("#tc").show();
        $("#tin").show();
        $("#tbtn").show();
    });
    $(document).on("click", "#tc", function (e) {
        $(this).hide();
        $("#tid").show();
        $("#tin").hide();
        $("#tbtn").hide();
    });
    $(document).on("submit", "#tform", function (e) {
        var oid = $("#oid").val();
        var tin = $("#tin").val();
        $.ajax({
            type: "GET",
            url: "{{URL::to('user/json/trans')}}",
            data: {
                id: oid,
                tin: tin
            },
            success: function (data) {
                $("#ttn").html(data);
                $("#tin").val("");
                $("#tid").show();
                $("#tin").hide();
                $("#tbtn").hide();
                $("#tc").hide();
            }
        });
        return false;
    });
</script>
<script type="text/javascript">
    $(document).on('click', '#license', function (e) {
        var id = $(this).parent().find('input[type=hidden]').val();
        $('#key').html(id);
    });

    $(document).on('click','.cancel-order',function(){
        let cancel_url = $(this).attr('data-href');
        $('#confirm-delete-cancel a.btn-ok').attr('href',cancel_url);
    })
</script>
@endsection
