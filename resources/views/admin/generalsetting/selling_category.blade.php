@extends('layouts.admin')
@section('content')

            <div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">{{ __('Vendor Selling In Category') }} </h4>
                      <ul class="links">
                        <li>
                          <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>
                        <li>
                          <a href="javascript:;">{{ __('General Settings') }} </a>
                        </li>
                        <li>
                          <a href="javascript:;">{{ __('Vendor Selling In Category') }} </a>
                        </li>
                      </ul>
                  </div>
                </div>
              </div>
              <div class="add-product-content1">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area">

                      <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                      <form id="geniusform" action="{{ route('admin-gs-update') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        @include('includes.admin.form-both')  

                        <hr>
                        <h5 class="text-center">{{ __('Permissions') }}</h5>
                        <hr>

                        <div class="row justify-content-center">
                            <div class="col-lg-4 d-flex justify-content-between">
                              <label class="control-label">{{ __('Physical') }} *</label>
                              <label class="switch">
                                <input type="checkbox" name="vendor_selling[]" value="physical" {{in_array('physical',$vendor_sell_category) ? 'checked':''}}>
                                <span class="slider round"></span>
                              </label>
                            </div>

                            <div class="col-lg-2"></div>
                            <div class="col-lg-4 d-flex justify-content-between">
                              <label class="control-label">{{ __('Digital') }} *</label>
                              <label class="switch">
                                <input type="checkbox" name="vendor_selling[]" value="digital" {{in_array('digital',$vendor_sell_category) ? 'checked':''}}>
                                <span class="slider round"></span>
                              </label>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-lg-4 d-flex justify-content-between">
                              <label class="control-label">{{ __('License') }} *</label>
                              <label class="switch">
                                <input type="checkbox" name="vendor_selling[]" value="license" {{in_array('license',$vendor_sell_category) ? 'checked':''}}>
                                <span class="slider round"></span>
                              </label>
                            </div>

                            <div class="col-lg-2"></div>
                            <div class="col-lg-4 d-flex justify-content-between">

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-4">
                                <div class="left-area">
                                    
                                </div>
                            </div>
                            <div class="col-lg-7">
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