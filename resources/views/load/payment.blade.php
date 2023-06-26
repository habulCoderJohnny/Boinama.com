@if($payment == 'cod')
                                <input type="hidden" name="method" value="Cash On Delivery">


@endif
@if($payment == 'paypal')
                                <input type="hidden" name="method" value="Paypal">
                                <input type="hidden" name="cmd" value="_xclick">
                                <input type="hidden" name="no_note" value="1">
                                <input type="hidden" name="lc" value="UK">
                                <input type="hidden" name="currency_code" value="{{$curr->name}}">
                                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest">

@endif

@if($payment == 'stripe')
                                	<input type="hidden" name="method" value="Stripe">
                                  <div class="row" >
                                    <div class="col-lg-6">
                                      <input class="form-control card-elements" name="cardNumber" type="text" placeholder="{{ __('Card Number') }}" autocomplete="off"  autofocus oninput="validateCard(this.value);" />
                                      <span id="errCard"></span>
                                    </div>
                                    <div class="col-lg-6">
                                      <input class="form-control card-elements" name="cardCVC" type="text" placeholder="{{ __('Cvv') }}" autocomplete="off"  oninput="validateCVC(this.value);" />
                                      <span id="errCVC"></span>
                                    </div>
                                    <div class="col-lg-6">
                                      <input class="form-control card-elements" name="month" type="text" placeholder="{{ __('Month') }}"  />
                                    </div>
                                    <div class="col-lg-6">
                                      <input class="form-control card-elements" name="year" type="text" placeholder="{{ __('Year') }}"  />
                                    </div>
                                </div>


                                <script type="text/javascript" src="{{ asset('assets/front/js/payvalid.js') }}"></script>
                                <script type="text/javascript" src="{{ asset('assets/front/js/paymin.js') }}"></script>
                                <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
                                <script type="text/javascript" src="{{ asset('assets/front/js/payform.js') }}"></script>


                                <script type="text/javascript">
                                  var cnstatus = false;
                                  var dateStatus = false;
                                  var cvcStatus = false;

                                  function validateCard(cn) {
                                    cnstatus = Stripe.card.validateCardNumber(cn);
                                    if (!cnstatus) {
                                      $("#errCard").html('{{ __('Card number not valid') }}');
                                    } else {
                                      $("#errCard").html('');
                                    }



                                  }

                                  function validateCVC(cvc) {
                                    cvcStatus = Stripe.card.validateCVC(cvc);
                                    if (!cvcStatus) {
                                      $("#errCVC").html('{{ __('CVC number not valid') }}');
                                    } else {
                                      $("#errCVC").html('');
                                    }

                                  }

                                </script>


@endif


@if($payment == 'instamojo')
                                	<input type="hidden" name="method" value="Instamojo">

@endif


@if($payment == 'paystack')

        <input type="hidden" name="ref_id" id="ref_id" value="">
        <input type="hidden" name="sub" id="sub" value="0">
		    <input type="hidden" name="method" value="Paystack">

@endif

@if($payment == 'razorpay')
<input type="hidden" name="method" value="Razorpay">

@endif

@if($payment == 'molly')
<input type="hidden" name="method" value="Molly">

@endif


@if($payment == 'other')

                                <input type="hidden" name="method" value="{{ $gateway->title }}">

                                  <div class="row" >

<div class="col-lg-12 pb-2">

	{!! $gateway->details !!}

</div>


<div class="col-lg-6">
	<label>{{ __('Transaction ID#') }} *</label>
	<input class="form-control" name="txn_id4" type="text" placeholder="{{ __('Transaction ID#') }}"  />
</div>


  </div>
@endif

@if($payment == 'voguepay')

        <input type="hidden" name="ref_id" id="ref_id" value="">
        <input type="hidden" name="sub" id="sub" value="0">
		    <input type="hidden" name="method" value="Voguepay">

@endif





@if($payment == 'ssl')
     <input type="hidden" name="method" value="SSLCommerz">

@endif


@if($payment == 'authorize.net')
     <input type="hidden" name="method" value="Authorize.Net">


                <div class="row" >
                  <div class="col-lg-6">
                    <input class="form-control card-elements" name="cardNumber" type="text" placeholder="{{ __('Card Number') }}" autocomplete="off"/>
                  </div>
                  <div class="col-lg-6">
                    <input class="form-control card-elements" name="cardCode" type="text" placeholder="{{ __('Enter Code') }}" autocomplete="off"/>
                  </div>
                  <div class="col-lg-6">
                    <input class="form-control card-elements" name="month" type="text" placeholder="{{ __('Month') }}"  />
                  </div>
                  <div class="col-lg-6">
                    <input class="form-control card-elements" name="year" type="text" placeholder="{{ __('Year') }}"  />
                  </div>
              </div>

@endif


@if($payment == 'mercadopago')

  <input type="hidden" name="method" value="mercadopago">

  <div class="row">

    <div class="col-lg-6">
      <input class="input-field" type="text" placeholder="{{ __('Credit Card Number') }}" id="cardNumber" data-checkout="cardNumber" onselectstart="return false" autocomplete=off required />
    </div>

    <div class="col-lg-6">
      <input class="input-field" type="text" id="securityCode" data-checkout="securityCode" placeholder="{{ __('Security Code') }}" onselectstart="return false" autocomplete=off required />
    </div>

    <div class="col-lg-6">
      <input class="input-field" type="text" id="cardExpirationMonth" data-checkout="cardExpirationMonth" placeholder="{{ __('Expiration Month') }}" autocomplete=off required />
    </div>

    <div class="col-lg-6">
    <input class="input-field" type="text" id="cardExpirationYear" data-checkout="cardExpirationYear" placeholder="{{ __('Expiration Year') }}" autocomplete=off required />
    </div>

    <div class="col-lg-6">
      <input class="input-field" type="text" id="cardholderName" data-checkout="cardholderName" placeholder="{{ __('Card Holder Name') }}" required />
    </div>

    <div class="col-lg-6">
      <div class="col-lg-12">
        <div class="row">
            <label for="docType" class="col-lg-3 pl-0" id="dc-label">{{ __('Document type') }}</label>
            <select class="input-field col-lg-9 pl-0" id="docType" data-checkout="docType" required>
            </select>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <input class="input-field" type="text" id="docNumber" data-checkout="docNumber" placeholder="{{ __('Document Number') }}" required />
    </div>

  </div>


    <input type="hidden" id="installments" value="1"/>
    <input type="hidden" name="description"/>
    <input type="hidden" name="paymentMethodId" />
    
   @php
       $gateway_data = App\Models\PaymentGateway::where('keyword','mercadopago')->first();
    $gateway = $gateway_data->convertAutoData();
   @endphp

 <script>
     
      Mercadopago.setPublishableKey('{{$gateway['public_key']}}');
      
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
