@extends('layouts.admin')

@section('content')

<div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">{{ __('Product Type Manage') }}</h4>
                    <ul class="links">
                      <li>
                        <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                      </li>
                      <li>
                        <a href="javascript:;">{{ __('General Settings') }}</a>
                      </li>
                      <li>
                        <a href="{{ route('admin-gs-product-type') }}">{{ __('Product Type Manage') }}</a>
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
                      
                        @include('includes.admin.form-both')


                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    {{ __('Physical Product') }}
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks {{ $gs->is_physical == 1 ? 'drop-success' : 'drop-danger' }}">
                                      <option data-val="1" value="{{route('admin-gs-product-type-status',['is_physical',1])}}" {{ $gs->is_physical == 1 ? 'selected' : '' }}>{{ __('Activated') }}</option>
                                      <option data-val="0" value="{{route('admin-gs-product-type-status',['is_physical',0])}}" {{ $gs->is_physical == 0 ? 'selected' : '' }}>{{ __('Deactivated') }}</option>
                                    </select>
                                  </div>
                            </div>
                          </div>

                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    {{ __('Digital Product') }}
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks {{ $gs->is_digital == 1 ? 'drop-success' : 'drop-danger' }}">
                                        <option data-val="1" value="{{route('admin-gs-product-type-status',['is_digital',1])}}" {{ $gs->is_digital == 1 ? 'selected' : '' }}>{{ __('Activated') }}</option>
                                        <option data-val="0" value="{{route('admin-gs-product-type-status',['is_digital',0])}}" {{ $gs->is_digital == 0 ? 'selected' : '' }}>{{ __('Deactivated') }}</option>
                                      </select>
                                  </div>
                            </div>
                          </div>

                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    {{ __('License Product') }}
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks {{ $gs->is_license == 1 ? 'drop-success' : 'drop-danger' }}">
                                        <option data-val="1" value="{{route('admin-gs-product-type-status',['is_license',1])}}" {{ $gs->is_license == 1 ? 'selected' : '' }}>{{ __('Activated') }}</option>
                                        <option data-val="0" value="{{route('admin-gs-product-type-status',['is_license',0])}}" {{ $gs->is_license == 0 ? 'selected' : '' }}>{{ __('Deactivated') }}</option>
                                      </select>
                                  </div>
                            </div>
                          </div>


                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    {{ __('Affiliate Product') }}
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks {{ $gs->is_affiliate == 1 ? 'drop-success' : 'drop-danger' }}">
                                        <option data-val="1" value="{{route('admin-gs-product-type-status',['is_affiliate',1])}}" {{ $gs->is_affiliate == 1 ? 'selected' : '' }}>{{ __('Activated') }}</option>
                                        <option data-val="0" value="{{route('admin-gs-product-type-status',['is_affiliate',0])}}" {{ $gs->is_affiliate == 0 ? 'selected' : '' }}>{{ __('Deactivated') }}</option>
                                      </select>
                                  </div>
                            </div>
                          </div>

                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    {{ __('Bulk Product Upload') }}
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks {{ $gs->is_bulk == 1 ? 'drop-success' : 'drop-danger' }}">
                                        <option data-val="1" value="{{route('admin-gs-product-type-status',['is_bulk',1])}}" {{ $gs->is_bulk == 1 ? 'selected' : '' }}>{{ __('Activated') }}</option>
                                        <option data-val="0" value="{{route('admin-gs-product-type-status',['is_bulk',0])}}" {{ $gs->is_bulk == 0 ? 'selected' : '' }}>{{ __('Deactivated') }}</option>
                                      </select>
                                  </div>
                            </div>
                          </div>
                         
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

@endsection
