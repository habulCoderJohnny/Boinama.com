@php 

$pay_data = $gateway->convertAutoData();

@endphp

@if($payment == 'paypal') 

@endif

@if($payment == 'stripe') 

        <div class="row mt-2">
            <div class="col-lg-4">
                <h5 class="title pt-1">
                  {{ __('Card Number') }} *
                </h5>
            </div>
            <div class="col-lg-8">
                    <input type="text" class="option card-elements" name="card" id="scard" placeholder="{{ __('Card Number') }}" required="" autocomplete="off"  autofocus oninput="validateCard(this.value);">
                    <span id="errCard" class="pt-1 pb-1 d-none"></span>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-lg-4">
                <h5 class="title pt-1">
                  {{ __('Cvv') }} *
                </h5>
            </div>
            <div class="col-lg-8">
                    <input type="text" class="option card-elements" name="cvv" id="scvv" placeholder="{{ __('Cvv') }}" required="" autocomplete="off"  oninput="validateCVC(this.value);">
                    <span id="errCVC" class="pt-1 pb-1 d-none"></span>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-lg-4">
                <h5 class="title pt-1">
                  {{ __('Month') }} *
                </h5>
            </div>
            <div class="col-lg-8">
                    <input type="text" class="option card-elements" name="month" id="smonth" placeholder="{{ __('Month') }}" required="">
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-lg-4">
                <h5 class="title pt-1">
                  {{ __('Year')}} *
                </h5>
            </div>
            <div class="col-lg-8">
                    <input type="text" class="option card-elements" name="year" id="syear" placeholder="{{ __('Year')}}" required="">
            </div>
        </div>

  <script type="text/javascript">

(function($) {
		"use strict";

    var cnstatus = false;
    var dateStatus = false;
    var cvcStatus = false;
                              
    function validateCard(cn) {
      cnstatus = Stripe.card.validateCardNumber(cn);
      if (!cnstatus) {
        $("#errCard").removeClass('d-none').html('{{ __("Card number not valid") }}');
      } else {
        $("#errCard").addClass('d-none').html('');
      }
    }
                              
    function validateCVC(cvc) {
      cvcStatus = Stripe.card.validateCVC(cvc);
      if (!cvcStatus) {
        $("#errCVC").removeClass('d-none').html('{{ __("CVC number not valid") }}');
      } else {
        $("#errCVC").addClass('d-none').html('');
      }
            
    }

})(jQuery);        

  </script>

@endif


@if($payment == 'instamojo') 

@endif

@if($payment == 'razorpay') 

@endif

@if($payment == 'sslcommerz') 

@endif

@if($payment == 'flutterwave') 

@endif

@if($payment == 'paystack') 
<input type="hidden" name="ref_id" id="ref_id" value="">
<input type="hidden" name="sub" id="sub" value="0">
<input type="hidden" name="method" value="Paystack">
<input type="hidden" name="ck" id="ck" value="0">
@endif

@if($payment == 'voguepay') 
                              
  <input type="hidden" name="txnid" id="ref_id" value="">

@endif

@if($payment == 'mollie')

@endif

@if($payment == 'authorize.net') 

  <div class="row mt-2">
    <div class="col-lg-4">
        <h5 class="title pt-1">
          {{ __('Card Number') }} *
        </h5>
    </div>
    <div class="col-lg-8">
            <input type="text" class="option card-elements" name="cardNumber" placeholder="{{ __('Card Number') }}" required="" >
    </div>
  </div>

  <div class="row mt-2">
    <div class="col-lg-4">
        <h5 class="title pt-1">
          {{ __('Card Code') }} *
        </h5>
    </div>
    <div class="col-lg-8">
            <input type="text" class="option card-elements " name="cardCode" placeholder="{{ __('Card Code') }}" required="" >
    </div>
  </div>

  <div class="row mt-2">
    <div class="col-lg-4">
        <h5 class="title pt-1">
          {{ __('Month') }} *
        </h5>
    </div>
    <div class="col-lg-8">
            <input type="text" class="option card-elements" name="month" placeholder="{{ __('Month') }}" required="">
    </div>
  </div>

  <div class="row mt-2">
    <div class="col-lg-4">
        <h5 class="title pt-1">
          {{ __('Year')}} *
        </h5>
    </div>
    <div class="col-lg-8">
            <input type="text" class="option card-elements" name="year"  placeholder="{{ __('Year')}}" required="">
    </div>
  </div>

@endif

@if($payment == '2checkout') 

  <input id="token" name="token" type="hidden" value="">

  <div class="row mt-2">
    <div class="col-lg-4">
        <h5 class="title pt-1">
          {{ __('Card Number') }} *
        </h5>
    </div>
    <div class="col-lg-8">
        <input type="text" class="option" id="ccNo" name="cardNumber" placeholder="{{ __('Card Number') }}" required="" >
    </div>
  </div>

  <div class="row mt-2">
    <div class="col-lg-4">
        <h5 class="title pt-1">
          {{ __('Cvv') }} *
        </h5>
    </div>
    <div class="col-lg-8">
        <input type="text" class="option" id="cvv" name="cardCVC" placeholder="{{ __('Cvv') }}" required="" >
    </div>
  </div>

  <div class="row mt-2">
    <div class="col-lg-4">
        <h5 class="title pt-1">
          {{ __('Month') }} *
        </h5>
    </div>
    <div class="col-lg-8">
        <input type="text" class="option" id="expMonth" name="month" placeholder="{{ __('Month') }}" required="">
    </div>
  </div>

  <div class="row mt-2">
    <div class="col-lg-4">
        <h5 class="title pt-1">
          {{ __('Year')}} *
        </h5>
    </div>
    <div class="col-lg-8">
        <input type="text" class="option" id="expYear" name="year"  placeholder="{{ __('Year')}}" required="">
    </div>
  </div>

                              
  <script>

(function($) {
		"use strict";

    // Called when token created successfully.
    var successCallback = function(data) {
      var myForm = document.getElementById('twocheckout');
                              
      // Set the token as the value for the token input
      myForm.token.value = data.response.token.token;
                              
      // IMPORTANT: Here we call `submit()` on the form element directly instead of using jQuery to prevent and infinite token request loop.
      myForm.submit();
    };
                              
    // Called when token creation fails.
    var errorCallback = function(data) {
      if (data.errorCode === 200) {tokenRequest();} else {alert(data.errorMsg);}
    };

    var tokenRequest = function() {
      // Setup token request arguments
      var args = {
        sellerId: "{{ $pay_data['seller_id'] }}",
        publishableKey: "{{ $pay_data['public_key'] }}",
        ccNo: $("#ccNo").val(),
        cvv: $("#cvv").val(),
        expMonth: $("#expMonth").val(),
        expYear: $("#expYear").val()
      };
                              
      // Make the token request
      TCO.requestToken(successCallback, errorCallback, args);
    };
                              
    $(function() {
      // Pull in the public encryption key for our environment
      @if($pay_data['sandbox_check'] == 1)
        TCO.loadPubKey('sandbox');
      @else 
        TCO.loadPubKey('production');
      @endif
                              
      $(".pay-form").submit(function(e) {
        // Call our token request function
        tokenRequest();                   
        // Prevent form from submitting
        return false;
      });
    });

})(jQuery);

  </script>
                                
@endif

@if($payment == 'mercadopago')

<div class="row mt-2">
  <div class="col-lg-4">
      <h5 class="title pt-1">
        {{ __('Credit Card Number') }}*
      </h5>
  </div>
  <div class="col-lg-8">
    <input class="option" type="text" placeholder="{{ __('Credit Card Number') }}" id="cardNumber" data-checkout="cardNumber" onselectstart="return false" autocomplete=off required />
  </div>
</div>


<div class="row mt-2">
  <div class="col-lg-4">
      <h5 class="title pt-1">
        {{ __('Security Code') }}*
      </h5>
  </div>
  <div class="col-lg-8">
    <input class="option" type="text" id="securityCode" data-checkout="securityCode" placeholder="{{ __('Security Code') }}" onselectstart="return false" autocomplete=off required />
  </div>
</div>

<div class="row mt-2">
  <div class="col-lg-4">
      <h5 class="title pt-1">
        {{ __('Expiration Month') }}*
      </h5>
  </div>
  <div class="col-lg-8">
    <input class="option" type="text" id="cardExpirationMonth" data-checkout="cardExpirationMonth" placeholder="{{ __('Expiration Month') }}" autocomplete=off required />
  </div>
</div>

<div class="row mt-2">
  <div class="col-lg-4">
      <h5 class="title pt-1">
        {{ __('Expiration Year') }}*
      </h5>
  </div>
  <div class="col-lg-8">
    <input class="option" type="text" id="cardExpirationYear" data-checkout="cardExpirationYear" placeholder="{{ __('Expiration Year') }}" autocomplete=off required />
  </div>
</div>

<div class="row mt-2">
  <div class="col-lg-4">
      <h5 class="title pt-1">
        {{ __('Card Holder Name') }}*
      </h5>
  </div>
  <div class="col-lg-8">
    <input class="option" type="text" id="cardholderName" data-checkout="cardholderName" placeholder="{{ __('Card Holder Name') }}" required />
  </div>
</div>

<div class="row mt-2">
  <div class="col-lg-4">
      <h5 class="title pt-1">
        {{ __('Document type') }}*
      </h5>
  </div>
  <div class="col-lg-8">
    <select class="option" id="docType" data-checkout="docType" required></select>
  </div>
</div>

<div class="row mt-2">
  <div class="col-lg-4">
      <h5 class="title pt-1">
        {{ __('Document Number') }}*
      </h5>
  </div>
  <div class="col-lg-8">
    <input class="form-control" type="text" id="docNumber" data-checkout="docNumber" placeholder="{{ __('Document Number') }}" required />
  </div>
</div>

  <input type="hidden" id="installments" value="1"/>
  <input type="hidden" name="description"/>
  <input type="hidden" name="paymentMethodId" />


  <script>
     
    Mercadopago.setPublishableKey('{{$pay_data['public_key']}}');
    
    function getBin() {
        var ccNumber = document.querySelector('input[data-checkout="cardNumber"]');
        return ccNumber.value.replace(/[ .-]/g, '').slice(0, 6);
    };
    
    function guessingPaymentMethod(event) {
        var bin = getBin();
    
        if (event.type == "keyup") {
            if (bin.length >= 6) {
                Mercadopago.getPaymentMethod({
                    "bin": bin
                }, setPaymentMethodInfo);
            }
        } else {
            setTimeout(function() {
                if (bin.length >= 6) {
                    Mercadopago.getPaymentMethod({
                        "bin": bin
                    }, setPaymentMethodInfo);
                }
            }, 100);
        }
    };
    
    Mercadopago.getIdentificationTypes();
    
    
    function setPaymentMethodInfo(status, response) {
        if (status == 200) {
            // do somethings ex: show logo of the payment method
            var form = document.querySelector('#mercadopago');
    
            if (document.querySelector("input[name=paymentMethodId]") == null) {
                var paymentMethod = document.createElement('input');
                paymentMethod.setAttribute('name', "paymentMethodId");
                paymentMethod.setAttribute('type', "hidden");
                paymentMethod.setAttribute('value', response[0].id);
    
                form.appendChild(paymentMethod);
            } else {
                document.querySelector("input[name=paymentMethodId]").value = response[0].id;
            }
        }
    };
    
    function addEvent(el, eventName, handler) {
        if (el.addEventListener) {
           el.addEventListener(eventName, handler);
        } else {
            el.attachEvent('on' + eventName, function(){
              handler.call(el);
            });
        }
    };
    
    addEvent(document.querySelector('input[data-checkout="cardNumber"]'), 'keyup', guessingPaymentMethod);
    addEvent(document.querySelector('input[data-checkout="cardNumber"]'), 'change', guessingPaymentMethod);
    
    doSubmit = false;
    addEvent(document.querySelector('#mercadopago'),'submit',doPay);
    function doPay(event){
        event.preventDefault();
        if(!doSubmit){
            var $form = document.querySelector('#mercadopago');
    
            Mercadopago.createToken($form, sdkResponseHandler); // The function "sdkResponseHandler" is defined below
    
            return false;
        }
    };
    
    function sdkResponseHandler(status, response) {
        console.log(response);
    
        if (status != 200 && status != 201) {
            alert("verify filled data");
        }else{
         
            var form = document.querySelector('#mercadopago');
    
            var card = document.createElement('input');
            card.setAttribute('name',"token");
            card.setAttribute('type',"hidden");
            card.setAttribute('value',response.id);
            form.appendChild(card);
            // doSubmit=true;
             form.submit();
        }
    };
    </script>


@endif

@if($payment == 'other') 

<div class="row mt-3">
  <div class="col-lg-4">

  </div>
  <div class="col-lg-8">
    {!! clean($gateway->details , array('Attr.EnableID' => true)) !!}
  </div>
</div>

<div class="row mt-3">
  <div class="col-lg-4">
      <h5 class="title pt-1">
        {{ __('Transaction ID#') }} *
      </h5>
  </div>
  <div class="col-lg-8">
        <input type="text" class="option" name="txnid" placeholder="{{ __('Transaction ID#') }}" required="">
  </div>
</div>

@endif