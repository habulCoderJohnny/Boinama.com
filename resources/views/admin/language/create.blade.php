@extends('layouts.admin')
@section('content')
<div class="content-area">
   <div class="mr-breadcrumb">
      <div class="row">
         <div class="col-lg-12">
            <h4 class="heading">{{ __('Create Language') }} <a class="add-btn" href="{{route('admin-lang-index')}}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h4>
            <ul class="links">
               <li>
                  <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
               </li>
               <li><a href="javascript:;">{{ __('Language Settings') }}</a></li>
               <li>
                  <a href="{{ route('admin-lang-index') }}">{{ __('Website Language') }} </a>
               </li>
               <li>
                  <a href="{{ route('admin-lang-create') }}">{{ __('Create') }}</a>
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
                  <form id="geniusform" action="{{route('admin-lang-store')}}" method="POST" enctype="multipart/form-data">
                     {{csrf_field()}}
                     @include('includes.admin.form-both')  
                     <div class="row">
                        <div class="col-lg-4">
                           <div class="left-area">
                              <h4 class="heading">{{ __('Language') }} *</h4>
                              <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                           </div>
                        </div>
                        <div class="col-lg-7">
                           <input type="text" class="input-field" name="language" placeholder="{{ __('Language') }}" value="" required="">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-4">
                           <div class="left-area">
                              <h4 class="heading">{{ __('Language Direction') }} *</h4>
                              <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                           </div>
                        </div>
                        <div class="col-lg-7">
                           <select name="rtl" class="input-field" required="">
                           <option value="0">{{ __('Left To Right') }}</option>
                           <option value="1">{{ __('Right To Left') }}</option>
                           </select>
                        </div>
                     </div>
                     <hr>
                     <h3 class="text-center">{{__('Edit Language')}}</h3>
                     <hr>


                     <div class="common">
                        
                        
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Track Order</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Track Order</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">My Account</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">My Account</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">User Panel</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">User Panel</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Vendor Panel</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Vendor Panel</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Logout</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Logout</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Sign in</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Sign in</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Join</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Join</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Sell</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Sell</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">All Categories</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">All Categories</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Search For Product</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Search For Product</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Cart</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Cart</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Item(s)</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Item(s)</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">View Cart</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">View Cart</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Total</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Total</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Checkout</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Checkout</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Cart is empty.</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Cart is empty.</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Wish</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Wish</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Compare</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Compare</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Categories</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Categories</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">See All Categories</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">See All Categories</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Home</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Home</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Blog</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Blog</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Faq</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Faq</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Contact Us</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Contact Us</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Shop Now</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Shop Now</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Featured</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Featured</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Best Seller</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Best Seller</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Flash Deal</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Flash Deal</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Top Rated</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Top Rated</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Big Save</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Big Save</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Hot</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Hot</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">New</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">New</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Trending</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Trending</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Sale</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Sale</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Read More</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Read More</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Brands</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Brands</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Tag</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Tag</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Search</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Search</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Archive</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Archive</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Blog Details</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Blog Details</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">View(s)</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">View(s)</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Source</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Source</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Recent Post</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Recent Post</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Archives</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Archives</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Tags</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Tags</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Name</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Name</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Phone Number</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Phone Number</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Email Address</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Email Address</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Your Message</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Your Message</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Code</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Code</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Send Message</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Send Message</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Find Us Here</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Find Us Here</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add To Wishlist</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add To Wishlist</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Quick View</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Quick View</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add To Cart</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add To Cart</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Buy Now</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Buy Now</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">No Product Found.</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">No Product Found.</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Filter Results By</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Filter Results By</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">To</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">To</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Popular Tags</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Popular Tags</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Sort By</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Sort By</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Latest Product</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Latest Product</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Oldest Product</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Oldest Product</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Lowest Price</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Lowest Price</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Highest Price</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Highest Price</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Product Compare</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Product Compare</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Product Name</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Product Name</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Price</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Price</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Rating</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Rating</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Description</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Description</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Remove</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Remove</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Product SKU</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Product SKU</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Out Of Stock</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Out Of Stock</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">In Stock</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">In Stock</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Review(s)</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Review(s)</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add To Favorite Seller</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add To Favorite Seller</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Favorite</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Favorite</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Contact Seller</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Contact Seller</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Platform</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Platform</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Region</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Region</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">License Type</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">License Type</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Product Condition</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Product Condition</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Watch Video</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Watch Video</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Estimated Shipping Time</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Estimated Shipping Time</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Size</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Size</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Color</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Color</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add to Cart</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add to Cart</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">SHARE</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">SHARE</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">DESCRIPTION</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">DESCRIPTION</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">BUY &amp; RETURN POLICY</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">BUY &amp; RETURN POLICY</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Reviews</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Reviews</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Comment</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Comment</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Ratings &amp; Reviews</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Ratings &amp; Reviews</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">No Review Found.</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">No Review Found.</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Review</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Review</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Your Review</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Your Review</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">SUBMIT</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">SUBMIT</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Login</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Login</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">To Review</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">To Review</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">To Comment</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">To Comment</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Write Comment</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Write Comment</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Write Your Comments Here...</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Write Your Comments Here...</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Post Comment</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Post Comment</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Reply</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Reply</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">View</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">View</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Replies</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Replies</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Edit</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Edit</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Delete</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Delete</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Edit Your Comment</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Edit Your Comment</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Submit</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Submit</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Cancel</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Cancel</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Edit Your Reply</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Edit Your Reply</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Write your reply</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Write your reply</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Subject *</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Subject *</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Product Quick View</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Product Quick View</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Related Products</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Related Products</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Seller's Products</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Seller's Products</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Sold By</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Sold By</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">No Vendor Found</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">No Vendor Found</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Total Item</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Total Item</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Visit Store</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Visit Store</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Wholesell</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Wholesell</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Quantity</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Quantity</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Discount</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Discount</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Off</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Off</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Report This Item</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Report This Item</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">REPORT PRODUCT</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">REPORT PRODUCT</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Please give the following details</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Please give the following details</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Report Title</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Report Title</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Report Note</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Report Note</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Verified</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Verified</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Size &amp; Color</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Size &amp; Color</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Unit Price</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Unit Price</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Sub Total</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Sub Total</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">PRICE DETAILS</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">PRICE DETAILS</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Total MRP</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Total MRP</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Tax</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Tax</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Have a promotion code?</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Have a promotion code?</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Coupon Code</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Coupon Code</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Apply</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Apply</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Place Order</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Place Order</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Shipping Cost</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Shipping Cost</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Billing Details</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Billing Details</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Shipping Details</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Shipping Details</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Ship To Address</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Ship To Address</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Pick Up</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Pick Up</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Pickup Location</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Pickup Location</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Full Name</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Full Name</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Email</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Email</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Address</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Address</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Country</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Country</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Select Country</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Select Country</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">City</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">City</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Postal Code</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Postal Code</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Ship to a Different Address?</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Ship to a Different Address?</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Payment Information</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Payment Information</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Order Note</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Order Note</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Optional</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Optional</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Order Now</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Order Now</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Card Number</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Card Number</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Cvv</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Cvv</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Month</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Month</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Year</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Year</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Transaction ID#</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Transaction ID#</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Orders</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Orders</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Payment</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Payment</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Personal Information</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Personal Information</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Your Name</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Your Name</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Your Email</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Your Email</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Create an account ?</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Create an account ?</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Your Password</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Your Password</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Confirm Your Password</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Confirm Your Password</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Continue</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Continue</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Total Price</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Total Price</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Back</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Back</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Shipping Info</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Shipping Info</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Payment Info</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Payment Info</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">PayPal Express</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">PayPal Express</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Credit Card</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Credit Card</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Cash On Delivery</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Cash On Delivery</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Instamojo</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Instamojo</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Paytm</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Paytm</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Razorpay</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Razorpay</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Paystack</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Paystack</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Mollie Payment</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Mollie Payment</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Shipping Method</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Shipping Method</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Packaging</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Packaging</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Final Price</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Final Price</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Card number not valid</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Card number not valid</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">CVC number not valid</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">CVC number not valid</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Wishlists</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Wishlists</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Success</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Success</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Get Back To Our Homepage</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Get Back To Our Homepage</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Login &amp; Register</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Login &amp; Register</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">LOGIN NOW</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">LOGIN NOW</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Type Email Address</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Type Email Address</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Type Password</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Type Password</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Remember Password</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Remember Password</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Forgot Password?</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Forgot Password?</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Authenticating...</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Authenticating...</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Vendor Login</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Vendor Login</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Or</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Or</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Sign In with social media</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Sign In with social media</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Signup Now</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Signup Now</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Password</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Password</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Confirm Password</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Confirm Password</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Processing...</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Processing...</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Register</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Register</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Vendor Registration</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Vendor Registration</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Forgot Password</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Forgot Password</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Please Write your Email</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Please Write your Email</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Login Now</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Login Now</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Checking...</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Checking...</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Store Name</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Store Name</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Service Center</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Service Center</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Contact Now</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Contact Now</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Follow Us</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Follow Us</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Shop Name</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Shop Name</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Owner Name</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Owner Name</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Shop Number</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Shop Number</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Shop Address</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Shop Address</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Registration Number</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Registration Number</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Message</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Message</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Footer Links</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Footer Links</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Successfully Added To Cart</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Successfully Added To Cart</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Already Added To Cart</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Already Added To Cart</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Successfully Added To Wishlist</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Successfully Added To Wishlist</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Already Added To Wishlist</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Already Added To Wishlist</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Successfully Removed From The Wishlist</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Successfully Removed From The Wishlist</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Successfully Added To Compare</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Successfully Added To Compare</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Already Added To Compare</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Already Added To Compare</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Successfully Removed From The Compare</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Successfully Removed From The Compare</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Successfully Changed The Color</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Successfully Changed The Color</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Coupon Found</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Coupon Found</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">No Coupon Found</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">No Coupon Found</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Coupon Already Applied</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Coupon Already Applied</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Email Not Found</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Email Not Found</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Oops Something Goes Wrong !!</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Oops Something Goes Wrong !!</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Message Sent !!</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Message Sent !!</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">THANK YOU FOR YOUR PURCHASE.</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">THANK YOU FOR YOUR PURCHASE.</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">We'll email you an order confirmation with details and tracking info.</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">We'll email you an order confirmation with details and tracking info.</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">You have subscribed successfully.</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">You have subscribed successfully.</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">This email has already been taken.</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">This email has already been taken.</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Your Email Address</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Your Email Address</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">SUBSCRIBE</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">SUBSCRIBE</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">404</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">404</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Oops! You're lost...</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Oops! You're lost...</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">The page you are looking for might have been moved, renamed, or might never existed.</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">The page you are looking for might have been moved, renamed, or might never existed.</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Back Home</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Back Home</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Dashboard</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Dashboard</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Purchased Items</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Purchased Items</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Affiliate Code</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Affiliate Code</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Withdraw</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Withdraw</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Favorite Sellers</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Favorite Sellers</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Messages</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Messages</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Tickets</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Tickets</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Disputes</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Disputes</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Edit Profile</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Edit Profile</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Reset Password</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Reset Password</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Start Selling</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Start Selling</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Pricing Plans</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Pricing Plans</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Account Information</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Account Information</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Phone</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Phone</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Fax</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Fax</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Zip</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Zip</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Affiliate Bonus</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Affiliate Bonus</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Recent Orders</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Recent Orders</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Total Orders</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Total Orders</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Pending Orders</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Pending Orders</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">All Time</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">All Time</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">My Balance</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">My Balance</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">#Order</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">#Order</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Date</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Date</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Order Total</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Order Total</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Order Status</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Order Status</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">VIEW ORDER</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">VIEW ORDER</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">My Order Details</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">My Order Details</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Order#</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Order#</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Print</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Print</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Order Date</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Order Date</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Billing Address</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Billing Address</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Name:</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Name:</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Email:</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Email:</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Phone:</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Phone:</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Address:</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Address:</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Paid Amount:</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Paid Amount:</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Payment Method:</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Payment Method:</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Charge ID:</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Charge ID:</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Transaction ID:</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Transaction ID:</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Edit Transaction ID</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Edit Transaction ID</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Transaction ID &amp; Press Enter</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Transaction ID &amp; Press Enter</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Shipping Address</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Shipping Address</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">PickUp Location</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">PickUp Location</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Ordered Products:</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Ordered Products:</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">ID#</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">ID#</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Download</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Download</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">View License</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">View License</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">License Key</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">License Key</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">The Licenes Key is :</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">The Licenes Key is :</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Close</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Close</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Affiliate Informations</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Affiliate Informations</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Your Affilate Link *</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Your Affilate Link *</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">This is your affilate link just copy the link and paste anywhere you want.</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">This is your affilate link just copy the link and paste anywhere you want.</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Affiliate Banner *</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Affiliate Banner *</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">This is your affilate banner Preview.</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">This is your affilate banner Preview.</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Affiliate Banner HTML Code *</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Affiliate Banner HTML Code *</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">This is your affilate banner html code just copy the code and paste anywhere you want.</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">This is your affilate banner html code just copy the code and paste anywhere you want.</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">My Withdraws</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">My Withdraws</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Withdraw Now</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Withdraw Now</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Withdraw Date</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Withdraw Date</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Method</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Method</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Account</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Account</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Amount</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Amount</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Status</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Status</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Withdraw Method</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Withdraw Method</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Select Withdraw Method</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Select Withdraw Method</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Paypal</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Paypal</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Skrill</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Skrill</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Payoneer</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Payoneer</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Bank</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Bank</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Withdraw Amount</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Withdraw Amount</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Account Email</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Account Email</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter IBAN/Account No</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter IBAN/Account No</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Account Name</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Account Name</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Address</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Address</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Swift Code</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Swift Code</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Additional Reference(Optional)</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Additional Reference(Optional)</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Withdraw Fee</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Withdraw Fee</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">and</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">and</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">will deduct from your account.</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">will deduct from your account.</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Current Balance</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Current Balance</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Order Tracking</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Order Tracking</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Get Tracking Code</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Get Tracking Code</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">View Tracking</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">View Tracking</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">No Order Found</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">No Order Found</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Actions</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Actions</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Confirm Delete</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Confirm Delete</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">You are about to delete this Seller.</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">You are about to delete this Seller.</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Do you want to proceed?</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Do you want to proceed?</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Compose Message</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Compose Message</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Sent</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Sent</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Action</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Action</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Subject</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Subject</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">You are about to delete this Conversation.</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">You are about to delete this Conversation.</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Conversation with</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Conversation with</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add Reply</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add Reply</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add Ticket</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add Ticket</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add Dispute</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add Dispute</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Time</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Time</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Order Number</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Order Number</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Send</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Send</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">You are about to delete this Ticket.</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">You are about to delete this Ticket.</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">You are about to delete this Dispute.</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">You are about to delete this Dispute.</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Order Number:</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Order Number:</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Subject:</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Subject:</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Admin</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Admin</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Upload</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Upload</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">User Name</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">User Name</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Save</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Save</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Current Password</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Current Password</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">New Password</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">New Password</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Re-Type New Password</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Re-Type New Password</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Free</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Free</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Day(s)</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Day(s)</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Current Plan</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Current Plan</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Expired on:</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Expired on:</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Ends on:</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Ends on:</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Renew</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Renew</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Get Started</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Get Started</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Package Details</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Package Details</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Plan:</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Plan:</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Price:</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Price:</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Durations:</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Durations:</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Product(s) Allowed:</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Product(s) Allowed:</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Note:</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Note:</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Your Previous Plan will be deactivated!</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Your Previous Plan will be deactivated!</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">(Optional)</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">(Optional)</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Select Payment Method</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Select Payment Method</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Select an option</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Select an option</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Stripe</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Stripe</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Card</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Card</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">(In Any Language)</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">(In Any Language)</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">ADD NEW</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">ADD NEW</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">EDIT</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">EDIT</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Welcome!</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Welcome!</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">New Order(s).</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">New Order(s).</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Clear All</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Clear All</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">You Have a new order.</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">You Have a new order.</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">No New Notifications.</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">No New Notifications.</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Dashbord</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Dashbord</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">All Orders</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">All Orders</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Products</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Products</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add New Product</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add New Product</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">All Products</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">All Products</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Product Catalogs</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Product Catalogs</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Affiliate Products</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Affiliate Products</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add Affiliate Product</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add Affiliate Product</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">All Affiliate Products</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">All Affiliate Products</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Bulk Product Upload</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Bulk Product Upload</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Withdraws</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Withdraws</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Settings</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Settings</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Services</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Services</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Banner</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Banner</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Social Links</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Social Links</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Verify Account</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Verify Account</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Shop Details</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Shop Details</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Vendor Verification</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Vendor Verification</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Details</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Details</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Verification Details</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Verification Details</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Attachment</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Attachment</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">(Maximum Size is: 10MB)</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">(Maximum Size is: 10MB)</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add More Attachment</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add More Attachment</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Verify Now</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Verify Now</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Your Documents Submitted Successfully.</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Your Documents Submitted Successfully.</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Orders Pending!</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Orders Pending!</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Orders Procsessing!</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Orders Procsessing!</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Orders Completed!</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Orders Completed!</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Total Products!</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Total Products!</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Total Item Sold!</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Total Item Sold!</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Total Earnings!</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Total Earnings!</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">View All</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">View All</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Total Qty</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Total Qty</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Total Cost</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Total Cost</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Payment Method</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Payment Method</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Pending</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Pending</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Processing</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Processing</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Completed</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Completed</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Declined</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Declined</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Update Status</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Update Status</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">You are about to update the Order's Status.</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">You are about to update the Order's Status.</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Proceed</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Proceed</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Order Details</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Order Details</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Charge ID</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Charge ID</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Transaction ID</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Transaction ID</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Payment Status</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Payment Status</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Unpaid</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Unpaid</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Paid</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Paid</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Order ID</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Order ID</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Total Product</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Total Product</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Ordered Date</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Ordered Date</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">View Invoice</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">View Invoice</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Customer Name</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Customer Name</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Products Ordered</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Products Ordered</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Product ID#</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Product ID#</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Product Title</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Product Title</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Vendor Removed</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Vendor Removed</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Send Email</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Send Email</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">The Licenes Key is</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">The Licenes Key is</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter New License Key</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter New License Key</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Save License</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Save License</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Order Invoice</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Order Invoice</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Invoice Number</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Invoice Number</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Product</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Product</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Qty</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Qty</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Packaging Cost</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Packaging Cost</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Subtotal</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Subtotal</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">TAX</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">TAX</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Print Invoice</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Print Invoice</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Product Sku</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Product Sku</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Product Sku</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Product Sku</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Type</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Type</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Activated</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Activated</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Deactivated</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Deactivated</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">View Gallery</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">View Gallery</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">You are about to delete this Product.</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">You are about to delete this Product.</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Image Gallery</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Image Gallery</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Upload File</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Upload File</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Done</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Done</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">You can upload multiple Images.</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">You can upload multiple Images.</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">No Images Found.</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">No Images Found.</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Product Types</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Product Types</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Physical</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Physical</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Digital</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Digital</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">License</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">License</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Physical Product</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Physical Product</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Digital Product</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Digital Product</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">License Product</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">License Product</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Allow Product Condition</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Allow Product Condition</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Used</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Used</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Category</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Category</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Select Category</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Select Category</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Sub Category</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Sub Category</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Select Sub Category</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Select Sub Category</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Child Category</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Child Category</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Select Child Category</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Select Child Category</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Feature Image</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Feature Image</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Upload Image Here</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Upload Image Here</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Product Gallery Images</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Product Gallery Images</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Set Gallery</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Set Gallery</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Allow Estimated Shipping Time</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Allow Estimated Shipping Time</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Product Estimated Shipping Time</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Product Estimated Shipping Time</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Allow Product Sizes</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Allow Product Sizes</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Size Name</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Size Name</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">(eg. S,M,L,XL,XXL,3XL,4XL)</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">(eg. S,M,L,XL,XXL,3XL,4XL)</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Size Qty</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Size Qty</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">(Number of quantity of this size)</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">(Number of quantity of this size)</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Size Price</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Size Price</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">(This price will be added with base price)</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">(This price will be added with base price)</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add More Size</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add More Size</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Allow Product Colors</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Allow Product Colors</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Product Colors</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Product Colors</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">(Choose Your Favorite Colors)</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">(Choose Your Favorite Colors)</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add More Color</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add More Color</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Allow Product Whole Sell</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Allow Product Whole Sell</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Quantity</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Quantity</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Discount Percentage</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Discount Percentage</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add More Field</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add More Field</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Product Current Price</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Product Current Price</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">In</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">In</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">e.g 20</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">e.g 20</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Product Previous Price</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Product Previous Price</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Product Stock</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Product Stock</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">(Leave Empty will Show Always Available)</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">(Leave Empty will Show Always Available)</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Allow Product Measurement</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Allow Product Measurement</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Product Measurement</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Product Measurement</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">None</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">None</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Gram</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Gram</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Kilogram</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Kilogram</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Litre</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Litre</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Pound</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Pound</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Custom</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Custom</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Unit</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Unit</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Product Description</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Product Description</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Product Buy/Return Policy</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Product Buy/Return Policy</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Youtube Video URL</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Youtube Video URL</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Allow Product SEO</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Allow Product SEO</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Meta Tags</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Meta Tags</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Meta Description</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Meta Description</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Feature Tags</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Feature Tags</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Your Keyword</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Your Keyword</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Create Product</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Create Product</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Select Upload Type</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Select Upload Type</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Upload By File</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Upload By File</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Upload By Link</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Upload By Link</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Select File</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Select File</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Link</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Link</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Product License</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Product License</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">License Quantity</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">License Quantity</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Product Platform</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Product Platform</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Product Region</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Product Region</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Edit Product</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Edit Product</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Product Affiliate Link</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Product Affiliate Link</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">(External Link)</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">(External Link)</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Feature Image Source</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Feature Image Source</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">File</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">File</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Feature Image Link</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Feature Image Link</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Prefered Size: (800x800) or Square Size.</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Prefered Size: (800x800) or Square Size.</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Image height and width must be 600 x 600.</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Image height and width must be 600 x 600.</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Image must have square size.</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Image must have square size.</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Download Sample CSV</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Download Sample CSV</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Upload a File</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Upload a File</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Start Import</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Start Import</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">SERVICE</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">SERVICE</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Featured Image</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Featured Image</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Title</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Title</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">You are about to delete this Service.</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">You are about to delete this Service.</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add New Service</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add New Service</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Current Featured Image</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Current Featured Image</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Upload Image</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Upload Image</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Prefered Size: (600x600) or Square Sized Image</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Prefered Size: (600x600) or Square Sized Image</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Create Service</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Create Service</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">SHIPPING METHOD</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">SHIPPING METHOD</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Shipping Methods</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Shipping Methods</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">PACKAGING</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">PACKAGING</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Packagings</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Packagings</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">You are about to delete this Shipping Method.</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">You are about to delete this Shipping Method.</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">You are about to delete this Packaging.</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">You are about to delete this Packaging.</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add New Shipping Method</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add New Shipping Method</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add New Packaging</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add New Packaging</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Subtitle</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Subtitle</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Duration</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Duration</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Create</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Create</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Current Banner</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Current Banner</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Prefered Size: (1920x220) Image</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Prefered Size: (1920x220) Image</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Upload Banner</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Upload Banner</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Facebook</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Facebook</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Google Plus</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Google Plus</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Twitter</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Twitter</textarea>
                            </div>
                         </div>
                      </div>

                      
                      <div class="lang-area mb-3">
                         
                         <div class="row">
                            <div class="col-lg-6">
                            <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Linkedin</textarea>
                            </div>

                            <div class="col-lg-6">
                            <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Linkedin</textarea>
                            </div>
                         </div>
                      </div>

                                           </div>


                     <div class="row">
                        <div class="col-lg-4">
                           <div class="left-area">
                           </div>
                        </div>
                        <div class="col-lg-7">
                           <button class="addProductSubmit-btn" type="submit">Save</button>
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