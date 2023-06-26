@extends('layouts.admin')


@section('styles')

<style type="text/css">
.img-upload #image-preview {
  background-size: unset !important;
  }
</style>

@endsection

@section('content')

<div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">{{ __('Payment Informations') }}</h4>
                    <ul class="links">
                      <li>
                        <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                      </li>
                      <li>
                        <a href="javascript:;">{{ __('Payment Settings') }}</a>
                      </li>
                      <li>
                        <a href="{{ route('admin-gs-payments') }}">{{ __('Payment Informations') }}</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="add-product-content social-links-area">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area" id="modalEdit">
                        <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                        <form action="{{ route('admin-gs-update-payment') }}" id="geniusform" method="POST" enctype="multipart/form-data">
                          {{ csrf_field() }}

                        @include('includes.admin.form-both')
                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    {{ __('Guest Checkout') }}
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks {{ $gs->guest_checkout == 1 ? 'drop-success' : 'drop-danger' }}">
                                      <option data-val="1" value="{{route('admin-gs-guest',1)}}" {{ $gs->guest_checkout == 1 ? 'selected' : '' }}>{{ __('Activated') }}</option>
                                      <option data-val="0" value="{{route('admin-gs-guest',0)}}" {{ $gs->guest_checkout == 0 ? 'selected' : '' }}>{{ __('Deactivated') }}</option>
                                    </select>
                                  </div>
                            </div>
                          </div>

                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    {{ __('Cash On Delivery') }}
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks {{ $gs->cod_check == 1 ? 'drop-success' : 'drop-danger' }}">
                                      <option data-val="1" value="{{route('admin-gs-cod',1)}}" {{ $gs->cod_check == 1 ? 'selected' : '' }}>{{ __('Activated') }}</option>
                                      <option data-val="0" value="{{route('admin-gs-cod',0)}}" {{ $gs->cod_check == 0 ? 'selected' : '' }}>{{ __('Deactivated') }}</option>
                                    </select>
                                  </div>
                            </div>
                          </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Cash On Delivery Text') }} *</h4>

                            </div>
                          </div>
                          <div class="col-lg-6">
                            <textarea class="input-field" name="cod_text" placeholder="{{ __('Cash On Delivery Text') }}">{{ $gs->cod_text }}</textarea>

                          </div>
                        </div>
                        
                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Currency Format') }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                              <select name="currency_format" required="">
                                  <option value="0" {{ $gs->currency_format == 0 ? 'selected' : '' }}>{{__('Before Price')}}</option>
                                  <option value="1" {{ $gs->currency_format == 1 ? 'selected' : '' }}>{{ __('After Price') }}</option>
                              </select>
                          </div>
                        </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Withdraw Fee') }} *
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="{{ __('Withdraw Fee') }}" name="withdraw_fee" value="{{ $gs->withdraw_fee }}" required="">
                          </div>
                        </div>
  
                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Withdraw Charge(%)') }} *
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="{{ __('Withdraw Charge(%)') }}" name="withdraw_charge" value="{{ $gs->withdraw_charge }}" required="">
                          </div>
                        </div>
  
                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Tax(%)') }} *
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="{{ __('Tax(%)') }}" name="tax" value="{{ $gs->tax }}" required="">
                          </div>
                        </div>
  

                          <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">

                            </div>
                          </div>
                          <div class="col-lg-6">
                            <button class="addProductSubmit-btn" type="submit">{{ __('Save') }}</button>
                          </div>
                        </div>
                     </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

@endsection