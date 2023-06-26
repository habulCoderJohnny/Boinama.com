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
									{{ __('Withdraw Now') }}
									<a class="mybtn1" href="{{route('user-wwt-index')}}"> <i class="fas fa-arrow-left"></i> {{ __('Back') }}</a>
								</h4>
							</div>

                                                <div class="gocover" style="background: url({{ asset('assets/images/'.$gs->loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                         <form id="userform" class="form-horizontal" action="{{route('user-wwt-store')}}" method="POST" enctype="multipart/form-data">

                                                    {{ csrf_field() }}

                                                    @include('includes.admin.form-both')
                                <div class="form-group">
                                    <label class="control-label col-sm-12" for="name">{{ __('Current Balance') }} {{ App\Models\Product::vendorConvertPrice(Auth::user()->affilate_income) }}</label>
                                </div>



                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="name">{{ __('Withdraw Method') }} *

                                    </label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="methods" id="withmethod" required>
                                            <option value="">{{__('Select Withdraw Method') }}</option>
                                            <option value="Paypal">{{ __('Paypal') }}</option>
                                            <option value="Skrill">{{ __('Skrill') }}</option>
                                            <option value="Payoneer">{{ __('Payoneer') }}</option>
                                            <option value="Bank">{{ __('Bank') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-12" for="name">{{ __('Withdraw Amount') }} *

                                    </label>
                                    <div class="col-sm-12">
                                        <input name="amount" placeholder="{{ __('Withdraw Amount')  }}" class="form-control"  type="text" value="{{ old('amount') }}" required>
                                    </div>
                                </div>

                                <div id="paypal" style="display: none;">

                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="name">{{ __('Enter Account Email') }} *

                                        </label>
                                        <div class="col-sm-12">
                                            <input name="acc_email" placeholder="{{ __('Enter Account Email') }}" class="form-control" value="{{ old('email') }}" type="email">
                                        </div>
                                    </div>

                                </div>
                                <div id="bank" style="display: none;">

                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="name">{{ __('Enter IBAN\/Account No') }} *

                                        </label>
                                        <div class="col-sm-12">
                                            <input name="iban" value="{{ old('iban') }}" placeholder="{{ __('Enter IBAN\/Account No')}}" class="form-control" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="name">{{ __('Enter Account Name') }} *

                                        </label>
                                        <div class="col-sm-12">
                                            <input name="acc_name" value="{{ old('accname') }}" placeholder="{{ __('Enter Account Name') }}" class="form-control" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="name">{{ __('Enter Address') }} *

                                        </label>
                                        <div class="col-sm-12">
                                            <input name="address" value="{{ old('address') }}" placeholder="{{ __('Enter Address') }}" class="form-control" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="name">{{ __('Enter Swift Code') }} *

                                        </label>
                                        <div class="col-sm-12">
                                            <input name="swift" value="{{ old('swift') }}" placeholder="{{ __('Enter Swift Code') }}" class="form-control" type="text">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-12" for="name">{{ __('Additional Reference(Optional)')}} *

                                    </label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="reference" rows="6" placeholder="{{ __('Additional Reference(Optional)') }}">{{ old('reference') }}</textarea>
                                    </div>
                                </div>

                         <div id="resp" class="col-md-12">

                            <span class="help-block">
                                <strong>{{__('Withdraw Fee') }} {{ $sign->sign }}{{ $gs->withdraw_fee }} {{ __('and') }} {{ $gs->withdraw_charge }}% {{ __('will deduct from your account.') }}</strong>
                            </span>
                            </div>

                                            <hr>
                                            <div class="add-product-footer">
                                                <button name="addProduct_btn" type="submit" class="mybtn1">{{ __('Withdraw') }}</button>
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


<script type="text/javascript">


    $("#withmethod").change(function(){
        var method = $(this).val();
        if(method == "Bank"){

            $("#bank").show();
            $("#bank").find('input, select').attr('required',true);

            $("#paypal").hide();
            $("#paypal").find('input').attr('required',false);

        }
        if(method != "Bank"){
            $("#bank").hide();
            $("#bank").find('input, select').attr('required',false);

            $("#paypal").show();
            $("#paypal").find('input').attr('required',true);
        }
        if(method == ""){
            $("#bank").hide();
            $("#paypal").hide();
        }

    })

</script>

@endsection
