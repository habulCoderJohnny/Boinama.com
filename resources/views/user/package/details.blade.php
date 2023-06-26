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

<div class="account-info">
                            <div class="header-area">
                                <h4 class="title">
                                    {{ __('Package Details') }} <a class="mybtn1" href="{{route('user-package')}}"> <i class="fas fa-arrow-left"></i> {{ __('Back') }}</a>
                                </h4>
                            </div>
                            <div class="pack-details">
                                <div class="row">

                                    <div class="col-lg-4">
                                        <h5 class="title">
                                            {{ __('Plan:') }}
                                        </h5>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="value">
                                            {{$subs->title}}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h5 class="title">
                                            {{ __('Price:') }}
                                        </h5>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="value">
                                            {{$curr->sign}}{{round($subs->price * $curr->value,2)}}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h5 class="title">
                                            {{ __('Durations:') }}
                                        </h5>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="value">
                                            {{$subs->days}} {{ __('Day(s)') }}
                                    </p></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h5 class="title">
                                            {{__('Product(s) Allowed:') }}
                                        </h5>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="value">
                                            {{ $subs->allowed_products == 0 ? 'Unlimited':  $subs->allowed_products}}
                                        </p>
                                    </div>
                                </div>

                                        @if(!empty($package))
                                            @if($package->subscription_id != $subs->id)
                                <div class="row">
                                    <div class="col-lg-4">
                                    </div>
                                    <div class="col-lg-8">
                                        <span class="notic"><b>{{ __('Note:') }}</b> {{ __('Your Previous Plan will be deactivated!') }}</span>
                                    </div>
                                </div>

                                <br>
                                 @else
                                <br>

                                  @endif
                                  @else
                                <br>
                                        @endif

                                        <form id="subscribe-form" class="pay-form" action="{{route('user-vendor-request-submit')}}" method="POST">

                            @include('includes.form-success')
                            @include('includes.form-error')
                            @include('includes.admin.form-error')

                                            {{ csrf_field() }}


                                        @if($user->is_vendor == 0)

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <h5 class="title pt-1">
                                                    {{ __('Shop Name') }} *
                                                </h5>
                                            </div>
                                            <div class="col-lg-8">
                                                    <input type="text"  id="shop-name" class="option" name="shop_name" placeholder="{{ __('Shop Name') }}" required>
                                            </div>
                                        </div>

                                        <br>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <h5 class="title pt-1">
                                                    {{ __('Owner Name') }} *
                                                </h5>
                                            </div>
                                            <div class="col-lg-8">
                                                    <input type="text" class="option" name="owner_name" placeholder="{{ __('Owner Name') }}" required>
                                            </div>
                                        </div>

                                        <br>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <h5 class="title pt-1">
                                                    {{ __('Shop Number') }} *
                                                </h5>
                                            </div>
                                            <div class="col-lg-8">
                                                    <input type="text" class="option" name="shop_number" placeholder="{{ __('Shop Number') }}" required>
                                            </div>
                                        </div>

                                        <br>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <h5 class="title pt-1">
                                                    {{ __('Shop Address') }} *
                                                </h5>
                                            </div>
                                            <div class="col-lg-8">
                                                    <input type="text" class="option" name="shop_address" placeholder="{{  __('Shop Address') }}" required>
                                            </div>
                                        </div>

                                        <br>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <h5 class="title pt-1">
                                                    {{ __('Registration Number') }} <small>{{__('(Optional)') }}</small>
                                                </h5>
                                            </div>
                                            <div class="col-lg-8">
                                                    <input type="text" class="option" name="reg_number" placeholder="{{ __('Registration Number') }}">
                                            </div>
                                        </div>

                                        <br>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <h5 class="title pt-1">
                                                    {{ __('Message') }} <small>{{ __(('Optional')) }}</small>
                                                </h5>
                                            </div>
                                            <div class="col-lg-8">
                                                <textarea class="option" name="shop_message" placeholder="{{ __('Message') }}" rows="5"></textarea>
                                            </div>
                                        </div>

                                        <br>


                                        @endif
                                        <input type="hidden" name="subs_id" value="{{ $subs->id }}">
                                        @if($subs->price != 0)

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <h5 class="title pt-1">
                                                    {{ __('Select Payment Method') }} *
                                                </h5>
                                            </div>
                                            <div class="col-lg-8">
        
                                                <select name="method" id="method" class="option" required="">
                                                    <option value="" data-form="" data-show="no" data-val="" data-href="">{{ __('Select an option') }}</option>
                                                    @foreach($gateway as $paydata)
        
                                                        @if($paydata->type == 'manual')
        
                                                        <option value="{{ $paydata->title }}" data-form="{{ $paydata->showSubscriptionLink() }}" data-show="{{ $paydata->showForm() }}" data-href="{{ route('user.load.payment',['slug1' => $paydata->showKeyword(),'slug2' => $paydata->id]) }}" data-val="{{ $paydata->title }}">
                                                            {{ $paydata->title }}
                                                          </option>
        
                                                        @else
        
                                                        <option value="{{ $paydata->name }}" data-form="{{ $paydata->showSubscriptionLink() }}" data-show="{{ $paydata->showForm() }}" data-href="{{ route('user.load.payment',['slug1' => $paydata->showKeyword(),'slug2' => $paydata->id]) }}" data-val="{{ $paydata->keyword }}">
                                                            {{ $paydata->name }}
                                                        </option>
        
                                                        @endif
        
                                                     @endforeach
                                                     <option value="" data-form="" data-show="no" data-val="" data-href="">{{ __('Select an option') }}</option>
                                                </select>
        
                                            </div>
                                        </div>
        
                                        <div id="payments" class="d-none">
        
        
        
        
                                        </div>
                                        @endif
                              
                                <div class="row">
                                    <div class="col-lg-4">
                                    </div>
                                    <div class="col-lg-8">
                                            <button type="submit" id="final-btn" class="mybtn1">{{ __('Submit') }}</button>
                                    </div>
                                </div>

                                 </form>

                            </div>
                        </div>
                    </div>
                </div>
      </div>
    </div>
  </section>

@endsection



@section('scripts')

<script type="text/javascript" src="{{ asset('assets/front/js/payvalid.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/front/js/paymin.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/front/js/payform.js') }}"></script>

<script src="https://js.paystack.co/v1/inline.js"></script>

<script src="https://www.2checkout.com/checkout/api/2co.min.js"></script>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>

<script type="text/javascript">


(function($) {
		"use strict";

$('#method').on('change',function(){
    var val  = $(this).find(':selected').attr('data-val');
    var form = $(this).find(':selected').attr('data-form');
    var show = $(this).find(':selected').attr('data-show');
    var href = $(this).find(':selected').attr('data-href');

    if(show == "yes"){
        $('#payments').removeClass('d-none');
    }else{
        $('#payments').addClass('d-none');
    }

    if(val == 'paystack'){
			$('.pay-form').prop('id','paystack');
		}
	
		else if(val == 'mercadopago'){
			$('.pay-form').prop('id','mercadopago');
		}
		else if(val == '2checkout'){
			$('.pay-form').prop('id','twocheckout');
		}
		else {
			$('.pay-form').prop('id','subscribe-form');
		}


    $('#payments').load(href);
    $('.pay-form').attr('action',form);
});


$(document).on('submit','#paystack',function(e){

            var val = $('#sub').val();
            
                if(val == 0)
                {    
                           
                    $.get('{{ route('user.paystack.check').'?shop_name=' }}'+$('#shop-name').val(), function(data, status){


                          if ((data.errors)) {

                          $('.alert-danger').show();
                          $('.alert-danger ul').html('');
                            for(var error in data.errors)
                            {
                              $('.alert-danger ul').append('<li>'+ data.errors[error] +'</li>');
                              $('#sub').val('0');
                              $('#ck').val('1');
                            }

                          }
                          else {
                            $('#ck').val('0');
                          }

                    });

                    setTimeout(function(){ 

                        if($('#ck').val() == '0') {

                            $('#preloader').hide();

                            var total = '{{round($subs->price*$curr->value,2)}}';

                                var handler = PaystackPop.setup({
                                  key: '{{$paystack['key']}}',
                                  email: '{{$user->email}}',
                                  amount: total * 100,
                                  currency: "{{strtoupper($curr->name)}}",
                                  ref: ''+Math.floor((Math.random() * 1000000000) + 1),
                                  callback: function(response){
                                    $('#ref_id').val(response.reference);
                                    $('#sub').val('1');
                                    $('#final-btn').click();
                                  },
                                  onClose: function(){
                                    window.location.reload();
                                  }
                                });
                                handler.openIframe();
                                    return false;    

                            }
                    }, 1000);
  
                         return false;
                        }
                        else {
                            $('#preloader').show();
                            return true;   
                        }
        });


       
})(jQuery);

</script>

@endsection