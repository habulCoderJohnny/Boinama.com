<div class="cross-sell-details">
    <div class="row">
        <div class="col-lg-12 remove-padding">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p class="success-icon"><strong><i class="icofont-check-circled"></i></strong> </p>
                <p class="success-message">{{__('Successfully added to cart')}}</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="trending-item-slider">
                @if (!empty($relatedProds))
                    @foreach($relatedProds as $relatedProd)
                        <a href="{{ route('front.product', $relatedProd->slug) }}" class="item">
                            <div class="item-img">
                                @if(!empty($relatedProd->features))
                                    <div class="sell-area">
                                    @foreach($relatedProd->features as $key => $data1)
                                        <span class="sale" style="background-color:{{ $relatedProd->colors[$key] }}">{{ $relatedProd->features[$key] }}</span>
                                        @endforeach
                                    </div>
                                @endif
                                <img class="img-fluid lazy-cross" data-src="{{ $relatedProd->thumbnail ? asset('assets/images/thumbnails/'.$relatedProd->thumbnail):asset('assets/images/noimage.png') }}" alt="">
                            </div>
                            <div class="info">
                                <div class="stars">
                                <div class="ratings">
                                    <div class="empty-stars"></div>
                                    <div class="full-stars" style="width:{{App\Models\Rating::ratings($relatedProd->id)}}%"></div>
                                </div>
                                </div>
                                <h4 class="price">{{ $relatedProd->showPrice() }} <del><small>{{ $relatedProd->showPreviousPrice() }}</small></del></h4>
                                <h5 class="name">{{ $relatedProd->showName() }}</h5>
                                <div class="item-cart-area">
                                    @if($relatedProd->product_type == "affiliate")
                                        <span class="add-to-cart-btn affilate-btn"
                                            data-href="{{ route('affiliate.product', $relatedProd->slug) }}"><i class="icofont-cart"></i>
                                            {{ __('Buy Now') }}
                                        </span>
                                    @else
                                        @if($relatedProd->emptyStock())
                                        <span class="add-to-cart-btn cart-out-of-stock">
                                            <i class="icofont-close-circled"></i> {{ __('Out Of Stock') }}
                                        </span>
                                        @else
                                        <span class="add-to-cart add-to-cart-btn" data-href="{{ route('product.cart.add',$relatedProd->id) }}" data-cs_href="{{route('product.cross-sell',$relatedProd->id)}}">
                                            <i class="icofont-cart"></i> {{ __('Add To Cart') }}
                                        </span>
                                        {{-- <span class="add-to-cart-quick add-to-cart-btn"
                                            data-href="{{ route('product.cart.quickadd',$prod->product->id) }}">
                                            <i class="icofont-cart"></i> {{ $langg->lang251 }}
                                        </span> --}}
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
                
            </div>
        </div>

    </div>
</div>

<script>
    lazyCross();
</script>
