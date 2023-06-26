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
						<div class="order-history">
							<div class="header-area">
								<h4 class="title" >
									{{ __('Deposit') }}
									<a class="mybtn1" href="{{ url()->previous() }}"> <i class="fas fa-arrow-left"></i> {{ __('Back')}}</a>
								</h4>
							</div>
                    <div class="gocover" style="background: url({{ asset('assets/images/'.$gs->loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                         <form id="subscribe-form" class="pay-form" class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                @include('includes.form-success')
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="name">{{ __('Current Balance') }} {{ App\Models\Product::vendorConvertPrice(Auth::user()->balance) }}</label>
                                </div>
                               
                                  <div class="row">
                                     <div class="col-lg-12">
                                       <label class="control-label col-sm-12" for="name">{{ __('Select Payment Method') }} * </label>
                                     </div>
                                     <div class="col-lg-12">
                                        <select class="form-control" name="method" id="option" class="option" required="">
                                          <option value="" selected disabled>{{__('Select Payment Method')}}</option>
                                           @foreach ($gateways as $gateway)
                                               <option value="{{$gateway->keyword}}"  data-val="{{ $gateway->keyword }}"  data-form="{{$gateway->showDepositLink()}}" data-href="{{ route('front.load.payment',[$gateway->keyword,0]) }}">{{$gateway->name}}</option>
                                           @endforeach
                                        </select>
                                     </div>
                                  </div>

                                  
                                  <div class="form-group mt-2">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <label class="control-label col-sm-12" for="name">{{ __('Amount') }} *  </label>
                                          <div class="input-group mb-3">
                                            <input type="text" id="depositAmount" name="amount" class="form-control" placeholder="{{ __('Deposit Amount') }}" value="{{ old('amount') }}" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                                            <div class="input-group-append">
                                              <span class="input-group-text" id="basic-addon2">{{ $curr->name }}</span>
                                            </div>
                                          </div>
                                      </div>
                                    </div>
                                  </div>


                               
                                <div id="show_gateway" class="mt-3">
                                </div>
                            <hr>
                            <div class="add-product-footer">
                                <button name="addProduct_btn" id="final-btn" type="submit" class="mybtn1">{{ __('Deposit') }} </button>
                            </div>
                        </form>
						</div>
					</div>
		</div>
	  </div>
	</div>
</section>
@endsection


@section('scripts')

  <script src="https://js.paystack.co/v1/inline.js"></script>
  <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
<script>
  $(document).on('change','#option',function(){
    let urlSend = $(this).find(":selected").data('href');
    let depositUrl = $(this).find(":selected").data('form');
    $('.pay-form').attr('action',depositUrl)
    $('#show_gateway').load(urlSend);

  })
</script>

  <script type="text/javascript">

    $(document).on('submit','#paystack',function(e){
      // e.preventDefault();
        $('#preloader').hide();

        var total = $("#depositAmount").val();
        if(total > 0)
        {
          console.log(total);
          var handler = PaystackPop.setup({
            key: '{{$paystackData['key']}}',
            email: '{{$paystackData['email']}}',
            amount: total * 100,
            currency: "{{strtoupper($curr->name)}}",
            ref: ''+Math.floor((Math.random() * 1000000000) + 1),
            callback: function(response){
              $('#ref_id').val(response.reference);
              $(".pay-form").attr('id', 'subscribe-form');
              $('#final-btn').click();
            },
            onClose: function(){
            }
          });
          handler.openIframe();
          return false;
        }
        else {
            $('#preloader').show();
            return true;
        }

    });

    $(document).on('change','#option',function(){
      
		if($(this).find(":selected").attr('data-val') == 'paystack'){
			$('.pay-form').prop('id','paystack');
		}
		
		else if($(this).find(":selected").attr('data-val') == 'mercadopago'){
			$('form.pay-form').prop('id','mercadopago');
		}
		else {
			$('.pay-form').prop('id','twocheckout');
		}
	
	})

  </script>

<script type="text/javascript">

  $('#subscribe-form').on('submit',function(){
       $('#preloader').show();
  });

</script>

@endsection
