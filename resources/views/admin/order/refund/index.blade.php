@extends('layouts.admin') 

@section('styles')

<style type="text/css">
    
.input-field { 
    padding: 15px 20px; 
}

</style>

@endsection

@section('content')  

<input type="hidden" id="headerdata" value="{{ __('ORDER') }}">

                    <div class="content-area">
                        <div class="mr-breadcrumb">
                            <div class="row">
                                <div class="col-lg-12">
                                        <h4 class="heading">{{ __('Refund Orders') }}</h4>
                                        <ul class="links">
                                            <li>
                                                <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">{{ __('Orders') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('admin-order-index') }}">{{ __('Refund Orders') }}</a>
                                            </li>
                                        </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-area">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mr-table allproduct">
                                        @include('includes.admin.form-success') 
                                        <div class="table-responsiv">
                                        <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                                                <table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>{{ __('Customer Name') }}</th>
                                                            <th>{{ __('Order Number') }}</th>
                                                            <th>{{ __('Total Cost') }}</th>
                                                            <th width="30%">{{ __('Refund Details') }}</th>
                                                            <th width="20%">{{ __('Options') }}</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

{{-- ACCEPT MODAL --}}

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header d-block text-center">
                <h4 class="modal-title d-inline-block">{{ __("Accept Refund Request") }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <p class="text-center">{{ __("You are about to accept this Request.") }}</p>
                <p class="text-center">{{ __("Do you want to proceed?") }}</p>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __("Cancel") }}</button>
                <a class="btn btn-success btn-ok">{{ __("Accept") }}</a>
            </div>

        </div>
    </div>
</div>

{{-- ACCEPT MODAL ENDS --}}


<div class="modal fade" id="catalog-modal" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
  
      <div class="modal-header d-block text-center">
        <h4 class="modal-title d-inline-block">{{ __("Reject Refund Request") }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
      </div>
  
  
      <!-- Modal body -->
      <div class="modal-body">
        <p class="text-center">{{ __("You are about to accept this Request.") }}</p>
        <p class="text-center">{{ __("Do you want to proceed?") }}</p>
    </div>

    <!-- Modal footer -->
    <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ __("Cancel") }}</button>
        <a class="btn btn-danger btn-ok">{{ __("Reject") }}</a>
    </div>
  
      </div>
    </div>
  </div>
  



@endsection    

@section('scripts')

{{-- DATA TABLE --}}

    <script type="text/javascript">

        var table = $('#geniustable').DataTable({
               ordering: false,
               processing: true,
               serverSide: true,
               ajax: '{{ route('admin-refund-order-datatables') }}',
               columns: [
                        { data: 'customer_name', name: 'customer_name' },
                        { data: 'order_number', name: 'order_number' },
                        { data: 'pay_amount', name: 'pay_amount' },
                        { data: 'details', name: 'details' },
                        { data: 'action', searchable: false, orderable: false }
                     ],
               language : {
                    processing: '<img src="{{asset('assets/images/'.$gs->admin_loader)}}">'
                },
                drawCallback : function( settings ) {
                        $('.select').niceSelect();  
                }
            });
                                                                
    </script>

{{-- DATA TABLE --}}
    
@endsection   