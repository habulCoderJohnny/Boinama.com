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
									{{ __('Reward Point') }}
									<a class="mybtn1" href="{{ url()->previous() }}"> <i class="fas fa-arrow-left"></i> {{ __('Back')}}</a>
								</h4>
							</div>
                    <div class="gocover" style="background: url({{ asset('assets/images/'.$gs->loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                         <form id="userform" action="{{route('user-reward-convert-submit')}}" class="pay-form" class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                @include('includes.admin.form-both')
                                <div class="form-group">
                                    <label class="control-label col-sm-4">{{ __('Current Point') }} : {{ Auth::user()->reward }}</label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4">{{$gs->reward_point}} {{__('Reward Point To (USD)')}} ${{$gs->reward_dolar}}</label>
                                </div>
                               
                                  <div class="form-group mt-2">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <label class="control-label col-sm-12" for="reward">{{ __('Reward Point') }} *  </label>
                                          <div class="input-group mb-3">
                                            <input type="text" id="reward" name="reward_point" class="form-control" placeholder="{{ __('Reward Point') }}" value="{{ old('reward_point') }}" required>
                                           
                                          </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group mt-2">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <label class="control-label col-sm-12" for="name">{{ __('Convert Total') }} *  </label>
                                          <div class="input-group mb-3">
                                            <input type="text" id="convert_total" class="form-control" placeholder="{{ __('Convert Total') }}" value="" readonly>
                                            <div class="input-group-append">
                                              <span class="input-group-text" id="basic-addon2">{{ $curr->name }}</span>
                                            </div>
                                          </div>
                                      </div>
                                    </div>
                                  </div>

                            <hr>
                      
                            <div class="add-product-footer">
                                <button type="button" id="check" class="mybtn1">{{ __('Check') }} </button>
                                <button id="final-btn" type="submit" class="mybtn1">{{ __('Convert') }} </button>
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

  $('#subscribe-form').on('submit',function(){
       $('#preloader').show();
  });


  $(document).on('click','#check',function(){
    let point = parseInt($('#reward').val());
    if(point <'{{$gs->reward_point}}'){
        toastr.error('Minimum Convert Point is {{$gs->reward_point}}');
    }else if(point >'{{$user->reward}}'){
        toastr.error('Your reward point is ' + '{{$user->reward}}');
    }else{
        let amount = (point / '{{$gs->reward_point}}' )* '{{$gs->reward_dolar}}';
        $('#convert_total').val(amount);
    }




  })

</script>

@endsection
