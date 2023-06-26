@extends('layouts.admin')
@section('content')

            <div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">{{ __('Login Page Background') }} </h4>
                      <ul class="links">
                        <li>
                          <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>
                        <li>
                          <a href="javascript:;">{{ __('General Settings') }} </a>
                        </li>
                        <li>
                          <a href="javascript:;">{{ __('Login Page Background') }} </a>
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


                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                      <div class="left-area">
                                          <h4 class="heading">{{ __('Current Background Image') }} *</h4>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="img-upload full-width-img">
                                          <div id="image-preview" class="img-preview" style="background: url({{ $gs->login_background ? asset('assets/images/'.$gs->login_background):asset('assets/images/noimage.png') }});">
                                              <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
                                              <input type="file" name="login_background" class="img-upload" id="image-upload">
                                            </div>
                                      </div>
          
                                    </div>
                                </div>
          
                                <br>

                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                      <div class="left-area">
                                          <h4 class="heading">{{ __('Title') }} *
                                            </h4>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <input type="text" class="input-field" placeholder="{{ __('Title') }}" name="login_title" value="{{ $gs->login_title }}" required="">
                                    </div>
                                  </div>
          
          
                                    <div class="row justify-content-center">
                                        <div class="col-lg-3">
                                          <div class="left-area">
                                            <h4 class="heading">
                                                {{ __('Text') }} *
                                            </h4>
                                          </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="tawk-area">
                                              <textarea class="input-field"  name="login_text" placeholder="{{ __('Text') }}">{{$gs->login_text}}</textarea>
                                            </div>
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