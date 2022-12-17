<nav>
                        <ul>
                            <li><a href="{{url('')}}">home</a></li>
                            <li><a href="{{url('about-us')}}">About us</a></li>
                            <li>
                                <a href="{{url('shop')}}">Shop</a>
                                <div class="category-menu-dropdown shop-menu">
                                    <div class="category-dropdown-style category-common2 mb-30">
                                        <h4 class="categories-subtitle"> Shop CaketopArts</h4>
                                        @if(count($categories))
                                            <ul>
                                            @foreach ($categories as $category)
                                                <li><a href="{{url('shop/'.$category->slug)}}">{{$category->name}}</a></li>
                                            @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                    <div class="mega-banner-img">
                                        <a><img src="{{asset('assets/img/banner/18.jpg')}}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li><a href="contact.html">contact</a></li>
                        </ul>
                    </nav>