       @php
           // dd($prod->cross_selling_products);
           $crossIds = [];
           foreach ($prod->cross_selling_products as $crProd) {
               $crossIds[] = $crProd->cross_selling_product_id;
           }
           
           $countCsProds = 0;
           $term = Str::slug($prod->name, ' ');
           
           // check if the product's childcategory is in `cs_category_relations` table
if (!empty($prod->childcategory->category_relation)) {
    $sType = $prod->childcategory->category_relation->search_type;

    // if related with 'category' then show products under that category
    if ($prod->childcategory->category_relation->cs_category_type == 'App\Models\Category') {
        $countCsProds = \App\Models\Product::where('category_id', $prod->childcategory->category_relation->cs_category_id)
            ->when($sType == 'keyword', function ($query) use ($term) {
                return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)', [$term]);
            })
            ->whereNotIn('id', $crossIds)
            ->count();
    }
    // if related with 'subcategory' then show products under that subcategory
    elseif ($prod->childcategory->category_relation->cs_category_type == 'App\Models\Subcategory') {
        $countCsProds = \App\Models\Product::where('subcategory_id', $prod->childcategory->category_relation->cs_category_id)
            ->when($sType == 'keyword', function ($query) use ($term) {
                return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)', [$term]);
            })
            ->whereNotIn('id', $crossIds)
            ->count();
    }
    // if related with 'childcategory' then show products under that childcategory
    elseif ($prod->childcategory->category_relation->cs_category_type == 'App\Models\Childcategory') {
        $countCsProds = \App\Models\Product::where('childcategory_id', $prod->childcategory->category_relation->cs_category_id)
            ->when($sType == 'keyword', function ($query) use ($term) {
                return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)', [$term]);
            })
            ->whereNotIn('id', $crossIds)
            ->count();
    }
}

// check if the product's subcategory is in `cs_category_relations` table
           elseif (!empty($prod->subcategory->category_relation)) {
               $sType = $prod->subcategory->category_relation->search_type;
           
               // if related with 'category' then show products under that category
               if ($prod->subcategory->category_relation->cs_category_type == 'App\Models\Category') {
                   $countCsProds = \App\Models\Product::where('category_id', $prod->subcategory->category_relation->cs_category_id)
                       ->when($sType == 'keyword', function ($query) use ($term) {
                           return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)', [$term]);
                       })
                       ->whereNotIn('id', $crossIds)
                       ->count();
               }
               // if related with 'subcategory' then show products under that subcategory
               elseif ($prod->subcategory->category_relation->cs_category_type == 'App\Models\Subcategory') {
                   $countCsProds = \App\Models\Product::where('subcategory_id', $prod->subcategory->category_relation->cs_category_id)
                       ->when($sType == 'keyword', function ($query) use ($term) {
                           return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)', [$term]);
                       })
                       ->whereNotIn('id', $crossIds)
                       ->count();
               }
               // if related with 'childcategory' then show products under that childcategory
               elseif ($prod->subcategory->category_relation->cs_category_type == 'App\Models\Childcategory') {
                   $countCsProds = \App\Models\Product::where('childcategory_id', $prod->subcategory->category_relation->cs_category_id)
                       ->when($sType == 'keyword', function ($query) use ($term) {
                           return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)', [$term]);
                       })
                       ->whereNotIn('id', $crossIds)
                       ->count();
               }
           }
           
           // check if the product's category is in `cs_category_relations` table
elseif (!empty($prod->category->category_relation)) {
    $sType = $prod->category->category_relation->search_type;

    // if related with 'category' then show products under that category
    if ($prod->category->category_relation->cs_category_type == 'App\Models\Category') {
        $countCsProds = \App\Models\Product::where('category_id', $prod->category->category_relation->cs_category_id)
            ->when($sType == 'keyword', function ($query) use ($term) {
                return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)', [$term]);
            })
            ->whereNotIn('id', $crossIds)
            ->count();
    }
    // if related with 'subcategory' then show products under that subcategory
    elseif ($prod->category->category_relation->cs_category_type == 'App\Models\Subcategory') {
        $countCsProds = \App\Models\Product::where('subcategory_id', $prod->category->category_relation->cs_category_id)
            ->when($sType == 'keyword', function ($query) use ($term) {
                return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)', [$term]);
            })
            ->whereNotIn('id', $crossIds)
            ->count();
    }
    // if related with 'childcategory' then show products under that childcategory
    elseif ($prod->category->category_relation->cs_category_type == 'App\Models\Childcategory') {
        $countCsProds = \App\Models\Product::where('childcategory_id', $prod->category->category_relation->cs_category_id)
            ->when($sType == 'keyword', function ($query) use ($term) {
                return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)', [$term]);
            })
            ->whereNotIn('id', $crossIds)
                       ->count();
               }
           }
           
       @endphp


       {{-- If This product belongs to vendor then apply this --}}
       @if ($prod->user_id != 0)

       {{-- check  If This vendor status is active --}}
       @if ($prod->user->is_vendor == 2)

       @if (isset($_GET['max']))

       @if ($prod->vendorPrice() <= $_GET['max'])



       <a href="{{ route('front.product', $prod->slug) }}" class="item">
       <div class="item-img">
       @if (!empty($prod->features))
       <div class="sell-area">
       @foreach ($prod->features as $key => $data1)
       <span class="sale"
       style="background-color:{{ $prod->colors[$key] }}">{{ $prod->features[$key] }}</span>
       @endforeach
       </div>
       @endif

       <img class="img-fluid lazy"
       data-src="{{ $prod->thumbnail ? asset('public/assets/images/thumbnails/' . $prod->thumbnail) : asset('public/assets/images/noimage.png') }}"
       alt="">
       </div>
       <div class="info">
       <div class="stars">
       <div class="ratings">
       <div class="empty-stars"></div>
       <div class="full-stars"
       style="width:{{ number_format((float) $prod->ratings->avg('rating'), 1, '.', '') * 20 }}%">
       </div>
       </div>
       </div>
       <h4 class="price">{{ $prod->convertPrice($prod->vendorSizePrice()) }}</h4>
       <h5 class="name">{{ $prod->showName() }}</h5>


       <div class="item-cart-area">
       @if ($prod->product_type == 'affiliate')
   @else
       @if ($prod->emptyStock())
       <span class="add-to-cart-btn cart-out-of-stock">
       <i class="icofont-close-circled"></i> {{ __('Out Of Stock') }}
       </span>
   @else
       @if ($prod->cross_selling_products()->count() + $countCsProds > 0)
       {{-- if the product has cross selling products --}}

       @if ($prod->type != 'Campaign')
       <span class="hidden-add-to-cart"
       data-href="{{ route('product.cart.add', $prod->id) }}"></span>
       <span class="crosssell-btn"
       data-cs_href="{{ route('product.cross-sell', $prod->id) }}">
       <i class="icofont-cart"></i> {{ __('Add To Cart') }}
       </span>
       @endif
   @else
       {{-- if the product does not have cross selling products --}}
       <span class="add-to-cart add-to-cart-btn"
       data-href="{{ route('product.cart.add', $prod->id) }}"
       data-cs_href="{{ route('product.cross-sell', $prod->id) }}">
       <i class="icofont-cart"></i> {{ __('Add To Cart') }}
       </span>
       @endif



       @if ($prod->type == 'Campaign')
       <span class="add-to-cart-btn">
       <i class="icofont-cart"></i> {{ __('View Product') }}
       </span>
       @endif

       {{-- <span class="add-to-cart-quick add-to-cart-btn"
																	data-href="{{ route('product.cart.quickadd',$prod->id) }}">
																	<i class="icofont-cart"></i> {{ $langg->lang251 }}
																</span> --}}
       @endif
       @endif
       </div>
       </div>
       </a>

       @endif
   @else
       <div class="col-lg-4 col-md-4 col-6 remove-padding">

       <a href="{{ route('front.product', $prod->slug) }}" class="item">
       <div class="item-img">
       @if (!empty($prod->features))
       <div class="sell-area">
       @foreach ($prod->features as $key => $data1)
       <span class="sale"
       style="background-color:{{ $prod->colors[$key] }}">{{ $prod->features[$key] }}</span>
       @endforeach
       </div>
       @endif

       <img class="img-fluid lazy"
       data-src="{{ $prod->thumbnail ? asset('public/assets/images/thumbnails/' . $prod->thumbnail) : asset('public/assets/images/noimage.png') }}"
       alt="">
       </div>
       <div class="info">
       <div class="stars">
       <div class="ratings">
       <div class="empty-stars"></div>
       <div class="full-stars"
       style="width:{{ number_format((float) $prod->ratings->avg('rating'), 1, '.', '') * 20 }}%">
       </div>
       </div>
       </div>
       <h4 class="price">{{ $prod->vendorSizePrice() }}
       <del><small>{{ $prod->showPreviousPrice() }}</small></del></h4>
       <h5 class="name">{{ $prod->showName() }}</h5>
       <h5 class="name">By:</h5>
       <div class="item-cart-area">
       @if ($prod->product_type == 'affiliate')
   @else
       @if ($prod->stock === 0)
       <span class="add-to-cart-btn cart-out-of-stock">
       <i class="icofont-close-circled"></i> {{ __('Out Of Stock') }}
       </span>
   @else
       @if ($prod->cross_selling_products()->count() + $countCsProds > 0)
       {{-- if the product has cross selling products --}}
       @if ($prod->type != 'Campaign')
       <span class="hidden-add-to-cart"
       data-href="{{ route('product.cart.add', $prod->id) }}"></span>
       <span class="crosssell-btn"
       data-cs_href="{{ route('product.cross-sell', $prod->id) }}">
       <i class="icofont-cart"></i> {{ __('Add To Cart') }}
       </span>
       @endif
   @else
       {{-- if the product does not have cross selling products --}}
       <span class="add-to-cart add-to-cart-btn"
       data-href="{{ route('product.cart.add', $prod->id) }}"
       data-cs_href="{{ route('product.cross-sell', $prod->id) }}">
       <i class="icofont-cart"></i> {{ __('Add To Cart') }}
       </span>
       @endif



       @if ($prod->type == 'Campaign')
       <span class="add-to-cart-btn">
       <i class="icofont-cart"></i> {{ __('View Product') }}
       </span>
       @endif

       {{-- <span class="add-to-cart-quick add-to-cart-btn"
																	data-href="{{ route('product.cart.quickadd',$prod->id) }}">
																	<i class="icofont-cart"></i> {{ $langg->lang251 }}
																</span> --}}
       @endif
       @endif
       </div>
       </div>
       </a>

       </div>

       @endif

       @endif

       {{-- If This product belongs admin and apply this --}}
   @else
       <a href="{{ route('front.product', $prod->slug) }}" class="item">
       <div class="item-img">
       @if (!empty($prod->features))
       <div class="sell-area">
       @foreach ($prod->features as $key => $data1)
       <span class="sale"
       style="background-color:{{ $prod->colors[$key] }}">{{ $prod->features[$key] }}</span>
       @endforeach
       </div>
       @endif

       <img class="img-fluid lazy"
       data-src="{{ $prod->thumbnail ? asset('public/assets/images/thumbnails/' . $prod->thumbnail) : asset('public/assets/images/noimage.png') }}"
       alt="">
       </div>
       <div class="info">
       <div class="stars">
       <div class="ratings">
       <div class="empty-stars"></div>
       <div class="full-stars"
       style="width:{{ number_format((float) $prod->ratings->avg('rating'), 1, '.', '') * 20 }}%">
       </div>
       </div>
       </div>
       <h4 class="price">{{ $prod->convertPrice($prod->vendorSizePrice()) }}</h4>
       <h5 class="name">{{ $prod->showName() }}</h5>

       <div class="item-cart-area">
       @if ($prod->product_type == 'affiliate')
   @else
       @if ($prod->stock === 0)
       <span class="add-to-cart-btn cart-out-of-stock">
       <i class="icofont-close-circled"></i> {{ __('Out Of Stock') }}
       </span>
   @else
       @if ($prod->cross_selling_products()->count() + $countCsProds > 0)
       {{-- if the product has cross selling products --}}

       @if ($prod->type != 'Campaign')
       <span class="hidden-add-to-cart"
       data-href="{{ route('product.cart.add', $prod->id) }}"></span>
       <span class="crosssell-btn"
       data-cs_href="{{ route('product.cross-sell', $prod->id) }}">
       <i class="icofont-cart"></i> {{ __('Add To Cart') }}
       </span>
       @endif
   @else
       {{-- if the product does not have cross selling products --}}
       <span class="add-to-cart add-to-cart-btn"
       data-href="{{ route('product.cart.add', $prod->id) }}"
       data-cs_href="{{ route('product.cross-sell', $prod->id) }}">
       <i class="icofont-cart"></i> {{ __('Add To Cart') }}
       </span>
       @endif



       @if ($prod->type == 'Campaign')
       <span class="add-to-cart-btn">
       <i class="icofont-cart"></i> {{ __('View Product') }}
       </span>
       @endif


       @endif
       @endif
       </div>
       </div>
       </a>


       @endif
