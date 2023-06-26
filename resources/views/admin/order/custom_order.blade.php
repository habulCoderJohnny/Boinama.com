@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{asset('assets/front/css/admin_cart.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/admin_common.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/plugin.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/product_details.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/responsive.css')}}">
@endsection



@section('content')

<div class="content-area">
    <div class="mr-breadcrumb">
       <div class="row">
          <div class="col-lg-12">
             <h4 class="heading">{{ __('Order Details') }} <a class="add-btn" href="javascript:history.back();"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h4>
             <ul class="links">
                <li>
                   <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                </li>
                <li>
                   <a href="javascript:;">{{ __('Orders') }}</a>
                </li>
                <li>
                   <a href="javascript:;">{{ __('Order Details') }}</a>
                </li>
             </ul>
          </div>
       </div>
    </div>
    @include('includes.admin.form-error') 
    <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
    <form id="customOrderForm" action="{{ route('admin-custom-order-store') }}" method="POST">
        {{csrf_field()}}
    <div class="row">
  
    <div class="col-lg-6">
        <div class="special-box">
            <div class="heading-area">
                <h4 class="title">
                {{ __('Billing Details') }}
                <a href="javascript:;" data-toggle="modal" data-target="#select_customer" class="mybtn1" style="padding: 5px 12px;"><i class="fa fa-eye"></i> {{ __('Add Customer Info') }}</a>
                </h4>
            </div>
            <div class="table-responsive-sm">
                <table class="table">
                    <tbody id="view_form_info">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="add-product-content1 ">
                    <div class="product-description">
                        <div class="body-area">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="text-muted" for="">{{__('Search Product')}}</label>
                                    <input type="text" class=" form-control" id="prod_name_admin" name="search" placeholder="Search Product" value="" autocomplete="off">
                                    <div class="autocomplete">
                                      <div id="myInputautocomplete-list" class="autocomplete-items">
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
            </div>
        </div>
    </div>
</div>  



<div class="row mb-5" id="admin_cart_view">

</div>

</div>


     





</form>
<span class="quick-view" rel-toggle="tooltip"  href="javascript:;" data-href="" data-toggle="modal" data-target="#quickview" data-placement="right"> <i class="icofont-eye"></i>
</span>
 {{-- DELETE MODAL --}}

<div class="modal fade" id="select_customer" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
  
    <div class="modal-header d-block text-center">
      <h4 class="modal-title d-inline-block">{{ __('Select Customer') }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <div class="content-area">

                <div class="add-product-content1">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-description">
                                <div class="body-area">
                                   

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">
                                                    <h4 class="heading">{{ __('Select Customer') }} *</h4>
                                                    <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <select  class="js-example-basic-multiple" id="select_user" >
                                                @foreach (DB::table('users')->where('ban',0)->get() as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                            <button class="addProductSubmit-btn" id="new_user" type="button">{{ __('New Customer') }}</button>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer justify-content-center">
              <button type="button" class="btn btn-default close_modal" data-dismiss="modal">{{ __('Cancel') }}</button>
        </div>
  
      </div>
    </div>
  </div>
  
  {{-- DELETE MODAL ENDS --}}
  

<!-- Product Quick View Modal -->

<div class="modal fade" id="quickview" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog quickview-modal modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="submit-loader">
            <img src="{{asset('assets/images/'.$gs->loader)}}" alt="">
        </div>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="container quick-view-modal">

            </div>
        </div>
      </div>
    </div>
  </div>
<!-- Product Quick View Modal -->

@endsection

@section('scripts')


<script src="{{asset('assets/front/js/admin_custom.js')}}"></script>




<script>
    $('#admin_cart_view').load('{{route('admin.cart.load')}}');
    $(document).on('click','#new_user',function(){
        $( "#view_form_info" ).load( "{{route('admin.custom.order.form')}}" );
        $('.close_modal').click();
    })

    $(document).on('change','#select_user',function(){
        let user_id = $(this).val();
        $( "#view_form_info" ).load( "{{route('admin.custom.order.form')}}" + '/?user_id='+user_id );
        $('.close_modal').click();
    })

    $(document).on('change','#select_product_search',function(){
        let url = $('option:selected', this).attr('data-target');
        $('.quick-view').attr('data-href',url);
        $('.quick-view').click();
        
    })


    // Auto Complete Section
    $(document).on('keyup','#prod_name_admin', function () {
    var search = encodeURIComponent($(this).val());
     if(search == ""){
       $(".autocomplete").hide();
     }
     else{
       $(".autocomplete").show();
       $("#myInputautocomplete-list").load(mainurl+'/admin/autosearch/product/'+search);

     }
   });
// Auto Complete Section Ends














    
</script>



	
@endsection
