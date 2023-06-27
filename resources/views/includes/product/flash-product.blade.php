        @if (Carbon\Carbon::now()->format('Y-m-d') < Carbon\Carbon::parse($prod->discount_date)->format('Y-m-d'))

        {{-- If This product belongs to vendor then apply this --}}
        @if ($prod->user_id != 0)

        {{-- check  If This vendor status is active --}}
        @if ($prod->user->is_vendor == 2)
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
        <div class="extra-list">
        <ul>
        <li>
        @if (Auth::guard('web')->check())
        <span class="add-to-wish"
        data-href="{{ route('user-wishlist-add', $prod->id) }}"
        data-toggle="tooltip" data-placement="right"
        title="{{ __('Add To Wishlist') }}" data-placement="right"><i
        class="icofont-heart-alt"></i>
        </span>
    @else
        <span rel-toggle="tooltip" title="{{ __('Add To Wishlist') }}"
        data-toggle="modal" id="wish-btn" data-target="#comment-log-reg"
        data-placement="right">
        <i class="icofont-heart-alt"></i>
        </span>
        @endif
        </li>
        <li>
        <span class="quick-view" rel-toggle="tooltip" title="{{ __('Quick View') }}"
        href="javascript:;" data-href="{{ route('product.quick', $prod->id) }}"
        data-toggle="modal" data-target="#quickview" data-placement="right"> <i
        class="icofont-eye"></i>
        </span>
        </li>
        <li>
        <span class="add-to-compare"
        data-href="{{ route('product.compare.add', $prod->id) }}"
        data-toggle="tooltip" data-placement="right" title="{{ __('Compare') }}"
        data-placement="right">
        <i class="icofont-exchange"></i>
        </span>
        </li>
        </ul>
        </div>
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
        <h4 class="price">{{ $prod->convertPrice($prod->vendorSizePrice()) }}
        <del><small>{{ $prod->showPreviousPrice() }}</small></del></h4>
        <h5 class="name">{{ $prod->showName() }}</h5>
        <div class="item-cart-area">
        @if ($prod->product_type == 'affiliate')
        <span class="add-to-cart-btn affilate-btn"
        data-href="{{ route('affiliate.product', $prod->slug) }}"><i
        class="icofont-cart"></i>
        {{ __('Buy Now') }}
        </span>
    @else
        @if ($prod->emptyStock())
        <span class="add-to-cart-btn cart-out-of-stock">
        <i class="icofont-close-circled"></i> {{ __('Out Of Stock') }}
        </span>
    @else
        <span class="add-to-cart add-to-cart-btn"
        data-href="{{ route('product.cart.add', $prod->id) }}">
        <i class="icofont-cart"></i> {{ __('Add To Cart') }}
        </span>
        <span class="add-to-cart-quick add-to-cart-btn"
        data-href="{{ route('product.cart.quickadd', $prod->id) }}">
        <i class="icofont-cart"></i> {{ __('Buy Now') }}
        </span>
        @endif
        @endif
        </div>
        </div>

        <div class="deal-counter">
        <div data-countdown="{{ $prod->discount_date }}"></div>
        </div>
        </a>


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
        <div class="extra-list">
        <ul>
        <li>
        @if (Auth::guard('web')->check())
        <span class="add-to-wish"
        data-href="{{ route('user-wishlist-add', $prod->id) }}"
        data-toggle="tooltip" data-placement="right"
        title="{{ __('Add To Wishlist') }}" data-placement="right"><i
        class="icofont-heart-alt"></i>
        </span>
    @else
        <span rel-toggle="tooltip" title="{{ __('Add To Wishlist') }}"
        data-toggle="modal" id="wish-btn" data-target="#comment-log-reg"
        data-placement="right">
        <i class="icofont-heart-alt"></i>
        </span>
        @endif
        </li>
        <li>
        <span class="quick-view" rel-toggle="tooltip" title="{{ __('Quick View') }}"
        href="javascript:;" data-href="{{ route('product.quick', $prod->id) }}"
        data-toggle="modal" data-target="#quickview" data-placement="right"> <i
        class="icofont-eye"></i>
        </span>
        </li>
        <li>
        <span class="add-to-compare"
        data-href="{{ route('product.compare.add', $prod->id) }}" data-toggle="tooltip"
        data-placement="right" title="{{ __('Compare') }}" data-placement="right">
        <i class="icofont-exchange"></i>
        </span>
        </li>
        </ul>
        </div>
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
        <h4 class="price">{{ $prod->convertPrice($prod->vendorSizePrice()) }}
        <del><small>{{ $prod->showPreviousPrice() }}</small></del></h4>
        <h5 class="name">{{ $prod->showName() }}</h5>
        <div class="item-cart-area">
        @if ($prod->product_type == 'affiliate')
        <span class="add-to-cart-btn affilate-btn"
        data-href="{{ route('affiliate.product', $prod->slug) }}"><i
        class="icofont-cart"></i> {{ __('Buy Now') }}
        </span>
    @else
        @if ($prod->type != 'Campaign')
        <span class="add-to-cart add-to-cart-btn"
        data-href="{{ route('product.cart.add', $prod->id) }}">
        <i class="icofont-cart"></i> {{ __('Add To Cart') }}
        </span>
        <span class="add-to-cart-quick add-to-cart-btn"
        data-href="{{ route('product.cart.quickadd', $prod->id) }}">
        <i class="icofont-cart"></i> {{ __('Buy Now') }}
        </span>
        @endif

        @if ($prod->type == 'Campaign')
        <span class="add-to-cart-btn">
        <i class="icofont-cart"></i> {{ __('View Product') }}
        </span>
        @endif
        @endif
        </div>
        </div>

        <div class="deal-counter">
        <div data-countdown="{{ $prod->discount_date }}"></div>
        </div>
        </a>
        @endif
        @endif
