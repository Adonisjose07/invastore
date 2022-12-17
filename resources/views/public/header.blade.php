 <!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!--Notification Section-->
<div class="notification-section notification-section-padding-2 notification-img-3 ptb-10">
    <div class="container-fluid">
        <div class="notification-wrapper">
            <div class="notification-pera-graph-3">
                <p>Buy New Products for your celebration More Then 3000+ cake top Decorator style </p>
            </div>
            <div class="notification-btn-close">
                <div class="notification-btn-3">
                    <a href="#">Shop Now</a>
                </div>
                <div class="notification-close notification-icon-3">
                    <button><i class="pe-7s-close"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- header start -->
<header>
    <div class="header-bottom wrapper-padding-2 res-header-sm">
        <div class="container-fluid">
            <div class="header-bottom-wrapper">
                <div class="logo-2 ptb-40">
                    <a href="index.html">
                        <img src="{{asset('assets/img/logo/logo-4.png')}}" alt="">
                    </a>
                </div>
                <div class="menu-style-2 handicraft-menu menu-hover">
                    @include('public.nav_desktop')
                </div>
                <div class="handicraft-search-cart">
                    <div class="handicraft-search">
                        <button class="search-toggle">
                            <i class="pe-7s-search s-open"></i>
                            <i class="pe-7s-close s-close"></i>
                        </button>
                        <div class="handicraft-content">
                            <form action="{{route('shop')}}">
                                <input placeholder="Search" type="text" name="name">
                            </form>
                        </div>
                    </div>
                    <div class="header-cart-4">
                        <a class="icon-cart" href="#">
                            <i class="ti-shopping-cart"></i>
                            <span class="handicraft-count">
                                @if($cart)
                                    {{count($cart->items)}}
                                @else
                                    0
                                @endif
                            </span>
                        </a>
                        <ul class="cart-dropdown">
                            @if($cart)
                                @foreach ($cart->items as $cartItem)
                                    <li class="single-product-cart" data-product-id="{{$cartItem->product->id}}">
                                        <div class="cart-img">
                                            <a href="#">
                                                <img class="minicart-img" src="{{asset('storage/'.$cartItem->product->gallery()->where('featured', '=', 1)->get()[0]->url)}}" alt="">
                                            </a>
                                        </div>
                                        <div class="cart-title">
                                            <h5><a href="#">{{$cartItem->product->name}}</a></h5>
                                            <!-- <h6><a href="#">{{$cartItem->product->category->name}}</a></h6> -->
                                            <span>${{$cartItem->product->price}} x {{$cartItem->quantity}}</span>
                                        </div>
                                        <div class="cart-delete">
                                            <a href="javascript://" onclick="deleteMiniCartItem({{$cartItem->id}})"><i class="ti-trash"></i></a>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                            <li class="cart-space">
                                <div class="cart-sub">
                                    <h4>Subtotal</h4>
                                </div>
                                <div class="cart-price">
                                    <h4>
                                        @if($cart)
                                            {{$cart->total}}
                                        @else   
                                            0
                                        @endif
                                    </h4>
                                </div>
                            </li>
                            <li class="cart-btn-wrapper">
                                <a class="cart-btn btn-hover" href="#">view cart</a>
                                <a class="cart-btn btn-hover" href="#">checkout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="mobile-menu-area handicraft-menu d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                    <div class="mobile-menu">
                        @include('public.nav_mobile')							
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->