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
                                    {{ __('Affiliate Informations') }}
                                </h4>
                            </div>
                            <div class="edit-info-area">

                                <div class="body">
                                        <div class="edit-info-area-form">
                                                <div class="gocover" style="background: url({{ asset('assets/images/'.$gs->loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                                                <form>
                                                    @include('includes.admin.form-both')

                                                    <div class="row">
                                                        <div class="col-lg-4 text-right pt-2 f-14">
                                                            <label>{{ __('Your Affilate Link *') }} <a id="affilate_click" data-toggle="tooltip" data-placement="top" title="Copy"  href="javascript:;" class="mybtn1 copy"><i class="fas fa-copy"></i></a></label>
                                                            <br>
                                                            <small>{{ __('This is your affilate link just copy the link and paste anywhere you want.') }}</small>
                                                        </div>
                                                        <div class="col-lg-8 pt-2">
                                                             <textarea id="affilate_address" class="input-field affilate" name="address" readonly="" row="5">{{ url('/').'/?reff='.$user->affilate_code}}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row pb-5">
                                                        <div class="col-lg-4 text-right pt-2 f-14">
                                                            <label>{{ __('Affiliate Banner *') }}</label>
                                                            <br>
                                                            <small>{{ __('This is your affilate banner Preview.') }}</small>
                                                        </div>
                                                        <div class="col-lg-8 pt-2 pl-5">
                                                             <a href="{{ url('/').'/?reff='.$user->affilate_code}}" target="_blank"><img src="{{asset('assets/images/'.$gs->affilate_banner)}}"></a>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-4 text-right pt-2 f-14">
                                                            <label>{{ __('Affiliate Banner HTML Code *') }} <a id="affilate_html_click" data-toggle="tooltip" data-placement="top" title="Copy"  href="javascript:;" class="mybtn1 copy"><i class="fas fa-copy"></i></a></label>
                                                            <br>
                                                            <small>{{__('This is your affilate banner html code just copy the code and paste anywhere you want.') }}</small>
                                                        </div>
                                                        <div class="col-lg-8 pt-2">
                                                             <textarea id="affilate_html" class="input-field affilate" name="address" readonly="" row="5"><a href="{{ url('/').'/?reff='.$user->affilate_code}}" target="_blank"><img src="{{asset('assets/images/'.$gs->affilate_banner)}}"></a></textarea>
                                                        </div>
                                                    </div>


                                                </form>
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

<script type="text/javascript">
    $('#affilate_click').on('click',function(){
       var copyText =  document.getElementById("affilate_address");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

    });

    $('#affilate_html_click').on('click',function(){
       var copyText =  document.getElementById("affilate_html");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

    });

</script>


@endsection
