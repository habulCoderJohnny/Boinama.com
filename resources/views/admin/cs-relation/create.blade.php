@extends('layouts.admin')


@section('content')

            <div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">{{ __('Create Relations') }}</h4>
                      <ul class="links">
                        <li>
                          <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>
                        <li><a href="javascript:;">{{ __('Manage Categories') }}</a></li>
                        <li>
                          <a href="{{ route('admin-cat-index') }}">{{ __('Main Categories') }}</a>
                        </li>
                      </ul>
                  </div>
                </div>
              </div>
              <div class="add-product-content">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area">
                        @include('includes.admin.form-both')  

                        <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>

                        <form id="geniusform" action="{{route('admin-csrelation-create')}}" method="POST" enctype="multipart/form-data">
                          {{csrf_field()}}

                          <div class="row">
                            <div class="col-lg-4">
                              <div class="left-area">
                                  <h4 class="heading">{{ __('Select Type') }} *</h4>
                              </div>
                            </div>
                            <div class="col-lg-7">
                              <select class="input-field" name="category_type" onchange="loadCategories(this.value, 'mainCategories');">
                                <option value="" selected disabled>Select a type</option>
                                <option value="category">Category</option>
                                <option value="subcategory">Subcategory</option>
                                <option value="childcategory">Childcategory</option>
                              </select>
                            </div>
                          </div>


                          <div class="row">
                            <div class="col-lg-4">
                              <div class="left-area">
                                <h4 class="heading">
                                  Main Category / Subcategory / Childcategory
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-7">
                              <select id="mainCategories" class="js-example-basic-multiple" name="category_id">
                              </select>
                            </div>
                          </div>


                          <div class="row">
                            <div class="col-lg-4">
                              <div class="left-area">
                                  <h4 class="heading">{{ __('Relatable Type') }} *</h4>
                              </div>
                            </div>
                            <div class="col-lg-7">
                              <select data-status="" class="input-field" name="cs_category_type" onchange="loadCategories(this.value, 'relatedCategories');">
                                <option value="" selected disabled>Select a relatable category</option>
                                <option value="category">Category</option>
                                <option value="subcategory">Subcategory</option>
                                <option value="childcategory">Childcategory</option>
                              </select>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-lg-4">
                              <div class="left-area">
                                <h4 class="heading">
                                  Relatable Category / Subcategory / Childcategory
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-7">
                              <select class="js-example-basic-multiple" id="relatedCategories" name="cs_category_id">
                              </select>
                            </div>
                          </div>


                          <div class="row">
                            <div class="col-lg-4">
                              <div class="left-area">
                                <h4 class="heading">
                                  Searching Type
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-7">
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="search_type" id="inlineRadio1" value="random" checked>
                                <label class="form-check-label" for="inlineRadio1">Random Order</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="search_type" id="inlineRadio2" value="keyword">
                                <label class="form-check-label" for="inlineRadio2">Keyword Wise</label>
                              </div>
                            </div>
                          </div> 



                          <div class="row">
                            <div class="col-lg-4">
                              <div class="left-area">
                                
                              </div>
                            </div>
                            <div class="col-lg-7">
                              <button class="addProductSubmit-btn" type="submit">{{ __('Create Relation') }}</button>
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
<script>
  function loadCategories(val, id) {

    $.get("{{url('/')}}/admin/csrelation/types/"+val, function(data) {
      options = `<option selected disabled>Select a ${val}</option>`;
      for (let i = 0; i < data.length; i++) {
        options += `<option value="${data[i].id}">${data[i].name}</option>`;
      }
      // $("#"+id).removeAttr('disabled');
      $("#"+id).html(options);
    });
    
  }
</script>
@endsection