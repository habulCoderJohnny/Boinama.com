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
													return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)' , array($term));
												})
												->whereNotIn('id', $crossIds)->count();

											}
											// if related with 'subcategory' then show products under that subcategory
											elseif ($prod->childcategory->category_relation->cs_category_type == 'App\Models\Subcategory') {
												$countCsProds = \App\Models\Product::where('subcategory_id', $prod->childcategory->category_relation->cs_category_id)
												->when($sType == 'keyword', function ($query) use ($term) {
													return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)' , array($term));
												})
												->whereNotIn('id', $crossIds)->count();
											}
											// if related with 'childcategory' then show products under that childcategory
											elseif ($prod->childcategory->category_relation->cs_category_type == 'App\Models\Childcategory') {
												$countCsProds = \App\Models\Product::where('childcategory_id', $prod->childcategory->category_relation->cs_category_id)
												->when($sType == 'keyword', function ($query) use ($term) {
													return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)' , array($term));
												})
												->whereNotIn('id', $crossIds)->count();
											}
										}

										// check if the product's subcategory is in `cs_category_relations` table
										elseif (!empty($prod->subcategory->category_relation)) {

											$sType = $prod->subcategory->category_relation->search_type;

											// if related with 'category' then show products under that category
											if ($prod->subcategory->category_relation->cs_category_type == 'App\Models\Category') {
												$countCsProds = \App\Models\Product::where('category_id', $prod->subcategory->category_relation->cs_category_id)
												->when($sType == 'keyword', function ($query) use ($term) {
													return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)' , array($term));
												})
												->whereNotIn('id', $crossIds)->count();
											}
											// if related with 'subcategory' then show products under that subcategory
											elseif ($prod->subcategory->category_relation->cs_category_type == 'App\Models\Subcategory') {
												$countCsProds = \App\Models\Product::where('subcategory_id', $prod->subcategory->category_relation->cs_category_id)
												->when($sType == 'keyword', function ($query) use ($term) {
													return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)' , array($term));
												})
												->whereNotIn('id', $crossIds)->count();
											}
											// if related with 'childcategory' then show products under that childcategory
											elseif ($prod->subcategory->category_relation->cs_category_type == 'App\Models\Childcategory') {
												$countCsProds = \App\Models\Product::where('childcategory_id', $prod->subcategory->category_relation->cs_category_id)
												->when($sType == 'keyword', function ($query) use ($term) {
													return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)' , array($term));
												})
												->whereNotIn('id', $crossIds)->count();
											}
										}

										// check if the product's category is in `cs_category_relations` table
										elseif (!empty($prod->category->category_relation)) {

											$sType = $prod->category->category_relation->search_type;

											// if related with 'category' then show products under that category
											if ($prod->category->category_relation->cs_category_type == 'App\Models\Category') {
												$countCsProds = \App\Models\Product::where('category_id', $prod->category->category_relation->cs_category_id)
												->when($sType == 'keyword', function ($query) use ($term) {
													return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)' , array($term));
												})
												->whereNotIn('id', $crossIds)->count();
											}
											// if related with 'subcategory' then show products under that subcategory
											elseif ($prod->category->category_relation->cs_category_type == 'App\Models\Subcategory') {
												$countCsProds = \App\Models\Product::where('subcategory_id', $prod->category->category_relation->cs_category_id)
												->when($sType == 'keyword', function ($query) use ($term) {
													return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)' , array($term));
												})
												->whereNotIn('id', $crossIds)->count();
											}
											// if related with 'childcategory' then show products under that childcategory
											elseif ($prod->category->category_relation->cs_category_type == 'App\Models\Childcategory') {
												$countCsProds = \App\Models\Product::where('childcategory_id', $prod->category->category_relation->cs_category_id)
												->when($sType == 'keyword', function ($query) use ($term) {
													return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)' , array($term));
												})
												->whereNotIn('id', $crossIds)->count();
											}
										}

										@endphp

										

											<a class="item" href="{{ route('front.product', $prod->slug) }}">
												<div class="item-img">
												@if(!empty($prod->features))
														<div class="sell-area">
														@foreach($prod->features as $key => $data1)
															<span class="sale" style="background-color:{{ $prod->colors[$key] }}">{{ $prod->features[$key] }}</span>
															@endforeach
														</div>
													@endif
														
													<img class="img-fluid lazy" data-src="{{ $prod->thumbnail ? asset('assets/images/thumbnails/'.$prod->thumbnail):asset('assets/images/noimage.png') }}" alt="">
												</div>
												<div class="info">
													<div class="stars">
														<div class="ratings">
															<div class="empty-stars"></div>
															<div class="full-stars" style="width:{{number_format((float)$prod->ratings->avg('rating'), 1, '.', '')*20}}%"></div>
														</div>
													</div>
													<h4 class="price">{{ $prod->convertPrice($prod->vendorSizePrice()) }} <del><small>{{ $prod->showPreviousPrice() }}</small></del></h4>
													<h5 class="name">{{ $prod->showName() }}</h5>
													<div class="item-cart-area">
														@if($prod->product_type == "affiliate")
															
														@else
															@if($prod->emptyStock())
															<span class="add-to-cart-btn cart-out-of-stock">
																<i class="icofont-close-circled"></i> {{ __('Out Of Stock') }}
															</span>
															@else

															@if (($prod->cross_selling_products()->count() + $countCsProds) > 0)
																{{-- if the product has cross selling products --}}
																@if ($prod->type != 'Campaign')
																	<span class="hidden-add-to-cart" data-href="{{ route('product.cart.add',$prod->id) }}"></span>
																	<span class="crosssell-btn" data-cs_href="{{route('product.cross-sell',$prod->id)}}">
																		<i class="icofont-cart"></i> {{ __('Add To Cart') }}
																	</span>
																@endif
															@else
																{{-- if the product does not have cross selling products --}}
																<span class="add-to-cart add-to-cart-btn" data-href="{{ route('product.cart.add',$prod->id) }}" data-cs_href="{{route('product.cross-sell',$prod->id)}}">
																	<i class="icofont-cart"></i> {{ __('Add To Cart') }}
																</span>
															@endif

															

															@if ($prod->type == 'Campaign')
																<span class="add-to-cart-btn" >
																	<i class="icofont-cart"></i> {{__('View Product')}}
																</span>
															@endif

															@endif
														@endif
													</div>
												</div>
											</a>
							
