@extends('layouts.admin')
@section('content')

            <div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">{{ __('Gallery Small Banner') }} </h4>
                      <ul class="links">
                        <li>
                          <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>
                        <li>
                          <a href="javascript:;">{{ __('Home Page Settings') }} </a>
                        </li>
                        <li>
                          <a href="{{ route('admin-ps-gallary-small') }}">{{ __('Gallery Small Banner') }} </a>
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
                      <form id="geniusform" action="{{ route('admin-ps-update') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        @include('includes.admin.form-both')  

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading"> {{ __('First Banner Image') }} *</h4>
                                    <small>{{ __('(Preferred SIze: 982 X 493 Pixel)') }}</small>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="img-upload">
                                    <div id="image-preview" class="img-preview" style="background: url({{ $data->gallery_small_banner1 ? asset('assets/images/'.$data->gallery_small_banner1):asset('assets/images/noimage.png') }});">
                                        <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
                                        <input type="file" name="gallery_small_banner1" class="img-upload" id="image-upload">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">{{ __('Link') }} *</h4>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="input-field" name="gallery_small_banner_link1" placeholder="{{ __('Link') }}" required="" value="{{$data->gallery_small_banner_link1}}">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading"> {{ __('Second Banner Image') }} *</h4>
                                    <small>{{ __('(Preferred SIze: 982 X 493 Pixel)') }}</small>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="img-upload">
                                    <div id="image-preview" class="img-preview" style="background: url({{ $data->gallery_small_banner2 ? asset('assets/images/'.$data->gallery_small_banner2):asset('assets/images/noimage.png') }});">
                                        <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
                                        <input type="file" name="gallery_small_banner2" class="img-upload" id="image-upload">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">{{ __('Link') }} *</h4>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="input-field" name="gallery_small_banner_link2" placeholder="{{ __('Link') }}" required="" value="{{$data->gallery_small_banner_link2}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading"> {{ __('Third Banner Image') }} *</h4>
                                    <small>{{ __('(Preferred SIze: 982 X 493 Pixel)') }}</small>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="img-upload">
                                    <div id="image-preview" class="img-preview" style="background: url({{ $data->gallery_small_banner3 ? asset('assets/images/'.$data->gallery_small_banner3):asset('assets/images/noimage.png') }});">
                                        <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
                                        <input type="file" name="gallery_small_banner3" class="img-upload" id="image-upload">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">{{ __('Link') }} *</h4>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="input-field" name="gallery_small_banner_link3" placeholder="{{ __('Link') }}" required="" value="{{$data->gallery_small_banner_link3}}">
                            </div>
                        </div>




                        <div class="row">
                            <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading"> {{ __('Fourth Banner Image') }} *</h4>
                                    <small>{{ __('(Preferred SIze: 982 X 493 Pixel)') }}</small>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="img-upload">
                                    <div id="image-preview" class="img-preview" style="background: url({{ $data->gallery_small_banner4 ? asset('assets/images/'.$data->gallery_small_banner4):asset('assets/images/noimage.png') }});">
                                        <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
                                        <input type="file" name="gallery_small_banner4" class="img-upload" id="image-upload">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">{{ __('Link') }} *</h4>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="input-field" name="gallery_small_banner_link4" placeholder="{{ __('Link') }}" required="" value="{{$data->gallery_small_banner_link4}}">
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