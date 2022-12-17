<div class="col-lg-3">
    <div class="shop-sidebar mr-50">
        <form method="GET" action="{{$sidebar_active != 'all' ? route('shop.category', ['slug' => $sidebar_active]) : route('shop')}}">
            <input type="hidden" name="tab_style" id="tab_style" value="{{$tab_style}}">
            <div class="sidebar-widget mb-10">
                <h3 class="sidebar-title">Filter Products</h3>
                <h7 class="font-bold">Name</h7>
                <div class="sidebar-search">
                    <input placeholder="product name.." type="text" name="name" value="{{($filter_name) ? $filter_name : ''}}">
                </div>
            </div>
            <div class="sidebar-widget mb-40">
                <!-- <h3 class="sidebar-title">Product Price</h3> -->
                <h7 class="font-bold">Price</h7>
                <div class="price_filter">
                    <input type="number" name="min" class="price_min" placeholder="min" value="{{($filter_min) ? $filter_min : ''}}">
                    <input type="number" name="max" class="price_max" placeholder="max" value="{{($filter_max) ? $filter_max : ''}}">
                </div>
                <button type="submit" class="price_filter_btn">Filter</button> 
            </div>
        </form>
        <div class="sidebar-widget mb-45">
            <h3 class="sidebar-title">Categories</h3>
            <div class="sidebar-categories">
                <ul>
                    <li><a href="{{route('shop')}}" class="{{$sidebar_active == 'all' ? 'sidebar_shop_active' : ''}}">All <span>{{$total_products}}</span></a></li>
                    @foreach ($categories as $category)
                        <li><a href="{{route('shop.category', ['slug' => $category->slug])}}" class="{{($sidebar_active == $category->slug) ? 'sidebar_shop_active' : ''}}">{{$category->name}} <span>{{$category->products_count()}}</span></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        
        <div class="sidebar-widget mb-50">
            <h3 class="sidebar-title">Top rated products</h3>
            <div class="sidebar-top-rated-all">
                <div class="sidebar-top-rated mb-30">
                    <div class="single-top-rated">
                        <div class="top-rated-img">
                            <a href="#"><img src="{{asset('assets/img/product/sidebar-product/1.jpg')}}" alt=""></a>
                        </div>
                        <div class="top-rated-text">
                            <h4><a href="#">Flying Drone</a></h4>
                            <div class="top-rated-rating">
                                <ul>
                                    <li><i class="pe-7s-star"></i></li>
                                    <li><i class="pe-7s-star"></i></li>
                                    <li><i class="pe-7s-star"></i></li>
                                    <li><i class="pe-7s-star"></i></li>
                                    <li><i class="pe-7s-star"></i></li>
                                </ul>
                            </div>
                            <span>$140.00</span>
                        </div>
                    </div>
                </div>
                <div class="sidebar-top-rated mb-30">
                    <div class="single-top-rated">
                        <div class="top-rated-img">
                            <a href="#"><img src="{{asset('assets/img/product/sidebar-product/2.jpg')}}" alt=""></a>
                        </div>
                        <div class="top-rated-text">
                            <h4><a href="#">Flying Drone</a></h4>
                            <div class="top-rated-rating">
                                <ul>
                                    <li><i class="pe-7s-star"></i></li>
                                    <li><i class="pe-7s-star"></i></li>
                                    <li><i class="pe-7s-star"></i></li>
                                    <li><i class="pe-7s-star"></i></li>
                                    <li><i class="pe-7s-star"></i></li>
                                </ul>
                            </div>
                            <span>$140.00</span>
                        </div>
                    </div>
                </div>
                <div class="sidebar-top-rated mb-30">
                    <div class="single-top-rated">
                        <div class="top-rated-img">
                            <a href="#"><img src="{{asset('assets/img/product/sidebar-product/4.jpg')}}" alt=""></a>
                        </div>
                        <div class="top-rated-text">
                            <h4><a href="#">Flying Drone</a></h4>
                            <div class="top-rated-rating">
                                <ul>
                                    <li><i class="pe-7s-star"></i></li>
                                    <li><i class="pe-7s-star"></i></li>
                                    <li><i class="pe-7s-star"></i></li>
                                    <li><i class="pe-7s-star"></i></li>
                                    <li><i class="pe-7s-star"></i></li>
                                </ul>
                            </div>
                            <span>$140.00</span>
                        </div>
                    </div>
                </div>
                <div class="sidebar-top-rated mb-30">
                    <div class="single-top-rated">
                        <div class="top-rated-img">
                            <a href="#"><img src="{{asset('assets/img/product/sidebar-product/4.jpg')}}" alt=""></a>
                        </div>
                        <div class="top-rated-text">
                            <h4><a href="#">Flying Drone</a></h4>
                            <div class="top-rated-rating">
                                <ul>
                                    <li><i class="pe-7s-star"></i></li>
                                    <li><i class="pe-7s-star"></i></li>
                                    <li><i class="pe-7s-star"></i></li>
                                    <li><i class="pe-7s-star"></i></li>
                                    <li><i class="pe-7s-star"></i></li>
                                </ul>
                            </div>
                            <span>$140.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>