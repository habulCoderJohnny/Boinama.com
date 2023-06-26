@extends('layouts.admin')
@section('content')
<div class="content-area">
   <div class="mr-breadcrumb">
      <div class="row">
         <div class="col-lg-12">
            <h4 class="heading">{{ __('Edit Language') }} <a class="add-btn" href="{{route('admin-lang-index')}}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h4>
            <ul class="links">
               <li>
                  <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
               </li>
               <li><a href="javascript:;">{{ __('Language Settings') }}</a></li>
               <li>
                  <a href="{{ route('admin-lang-index') }}">{{ __('Website Language') }} </a>
               </li>
               <li>
                  <a href="{{ route('admin-lang-edit',$data->id) }}">{{ __('Edit') }}</a>
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
                  <form id="geniusform" action="{{route('admin-lang-update',$data->id)}}" method="POST" enctype="multipart/form-data">
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
                           <input type="text" class="input-field" name="language" placeholder="{{ __('Language') }}" value="{{$data->language}}" required="">
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
                              <option value="0" {{ $data->rtl == '0'  ? 'selected' : '' }}>{{ __('Left To Right') }}</option>
                              <option value="1" {{ $data->rtl == '1'  ? 'selected' : '' }}>{{ __('Right To Left') }}</option>
                           </select>
                        </div>
                     </div>
                     <hr>
                     <h3 class="text-center">{{__('Edit Language')}}</h3>
                     <hr>
                     <div class="lang-tag-top-filds" id="lang-section">
                        @foreach($lang as $key => $val)

                        <div class="lang-area mb-3">
                           <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                           <div class="row">
                              <div class="col-lg-6">
                              <textarea name="keys[]" class="form-control" placeholder="{{ __('Enter Language Key') }}" readonly="">{{ $key }}</textarea>
                              </div>

                              <div class="col-lg-6">
                              <textarea  name="values[]" class="form-control" placeholder="{{ __('Enter Language Value') }}" required="">{{ $val }}</textarea>
                              </div>
                           </div>
                        </div>

                        @endforeach
                     </div>

                    
             
                     <div class="row">
                        <div class="col-lg-4">
                           <div class="left-area">
                           </div>
                        </div>
                        <div class="col-lg-7">
                           <a href="javascript:;" id="lang-btn" class="add-fild-btn addProductSubmit"><i class="icofont-plus"></i> {{ __('Add More Field') }}</a>
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

@section('scripts')
  <script type="text/javascript">
    
    function isEmpty(el){
        return !$.trim(el.html())
    }

    
  $("#lang-btn").on('click', function(){

      $("#lang-section").append(''+
                                  '<div class="lang-area mb-3">'+
                                    '<span class="remove lang-remove"><i class="fas fa-times"></i></span>'+
                                    '<div class="row">'+
                                      '<div class="col-lg-6">'+
                                      '<textarea name="keys[]" class="form-control" placeholder="{{ __('Enter Language Key') }}" required=""></textarea>'+
                                      '</div>'+
                                      '<div class="col-lg-6">'+
                                      '<textarea  name="values[]" class="form-control" placeholder="{{ __('Enter Language Value') }}" required=""></textarea>'+
                                      '</div>'+
                                    '</div>'+
                                  '</div>'+
                              '');

  });

  $(document).on('click','.lang-remove', function(){

      $(this.parentNode).remove();
      if (isEmpty($('#lang-section'))) {

      $("#lang-section").append(''+
                                  '<div class="lang-area">'+
                                    '<span class="remove lang-remove"><i class="fas fa-times"></i></span>'+
                                    '<div class="row">'+
                                      '<div class="col-lg-6">'+
                                      '<textarea name="keys[]" class="form-control" placeholder="{{ __('Enter Language Key') }}" required=""></textarea>'+
                                      '</div>'+
                                      '<div class="col-lg-6">'+
                                      '<textarea  name="values[]" class="form-control" placeholder="{{ __('Enter Language Value') }}" required=""></textarea>'+
                                      '</div>'+
                                    '</div>'+
                                  '</div>'+
                              '');


      }

  });

  </script>
@endsection
