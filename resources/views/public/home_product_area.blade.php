<!-- product area start -->
<div class="product-style-area wrapper-padding-2">
    <div class="container-fluid">
        <div class="coustom-row-4">
            @foreach ($products as $product)
                <div class="custom-col-two-5 custom-col-style-4" data-product-id="{{$product->id}}">
                    <div class="product-wrapper mb-65">
                        <div class="product-img-hanicraft">
                            <a href="{{url('/shop/'.$product->category->slug.'/'.$product->slug)}}">
                                <img src="{{asset('storage/'.$product->gallery()->where('featured', '=', 1)->get()[0]->url)}}" alt="">
                            </a>
                            <div class="hanicraft-action-position">
                                <div class="hanicraft-action">
                                    <a class="action-cart" title="Add To Cart" href="#">
                                        <i data-quick-add-to-cart data-product-id="{{$product->id}}" class="{{(isset($product->isAddedToCart)) ? 'icofont icofont-shopping-cart' : 'pe-7s-cart'}}"></i>
                                    </a>
                                    <a class="action-like" title="Wishlist" href="#">
                                        <i class="pe-7s-like"></i>
                                    </a>
                                </div> 
                            </div>
                        </div>
                        <div class="product-content-hanicraft">
                            <h5>${{$product->price}}</h5>
                            <h4><a href="product-details.html">{{$product->name}}</a></h4>
                            <span>{{$product->category->name}}</span>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- <div class="custom-col-two-5 custom-col-style-4">
                <div class="product-wrapper mb-65">
                    <div class="product-img-hanicraft">
                        <a href="#">
                            <img src="assets/img/product/handicraft/2.jpg" alt="">
                        </a>
                        <span class="new">new</span>
                        <span class="sell">sell</span>
                        <div class="hanicraft-action-position">
                            <div class="hanicraft-action">
                                <a class="action-cart" title="Add To Cart" href="#">
                                    <i class="pe-7s-cart"></i>
                                </a>
                                <a class="action-like" title="Wishlist" href="#">
                                    <i class="pe-7s-like"></i>
                                </a>
                                <a class="action-repeat" title="Compare" href="#" data-toggle="modal" data-target="#exampleCompare" >
                                    <i class="pe-7s-repeat"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-content-hanicraft">
                        <h5>$40.33</h5>
                        <h4><a href="product-details.html">rivia Accent Chair</a></h4>
                        <span>Buskat</span>
                    </div>
                </div>
            </div>
            <div class="custom-col-two-5 custom-col-style-4">
                <div class="product-wrapper mb-65">
                    <div class="product-img-hanicraft">
                        <a href="#">
                            <img src="assets/img/product/handicraft/3.jpg" alt="">
                        </a>
                        <div class="hanicraft-action-position">
                            <div class="hanicraft-action">
                                <a class="action-cart" title="Add To Cart" href="#">
                                    <i class="pe-7s-cart"></i>
                                </a>
                                <a class="action-like" title="Wishlist" href="#">
                                    <i class="pe-7s-like"></i>
                                </a>
                                <a class="action-repeat" title="Compare" href="#" data-toggle="modal" data-target="#exampleCompare" >
                                    <i class="pe-7s-repeat"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-content-hanicraft">
                        <h5>$40.33</h5>
                        <h4><a href="product-details.html">Seafront Accent Chair</a></h4>
                        <span>Buskat</span>
                    </div>
                </div>
            </div>
            <div class="custom-col-two-5 custom-col-style-4">
                <div class="product-wrapper mb-65">
                    <div class="product-img-hanicraft">
                        <a href="#">
                            <img src="assets/img/product/handicraft/4.jpg" alt="">
                        </a>
                        <span class="new">new</span>
                        <div class="hanicraft-action-position">
                            <div class="hanicraft-action">
                                <a class="action-cart" title="Add To Cart" href="#">
                                    <i class="pe-7s-cart"></i>
                                </a>
                                <a class="action-like" title="Wishlist" href="#">
                                    <i class="pe-7s-like"></i>
                                </a>
                                <a class="action-repeat" title="Compare" href="#" data-toggle="modal" data-target="#exampleCompare" >
                                    <i class="pe-7s-repeat"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-content-hanicraft">
                        <h5>$40.33</h5>
                        <h4><a href="product-details.html">Menga Accent Chair</a></h4>
                        <span>Buskat</span>
                    </div>
                </div>
            </div>
            <div class="custom-col-two-5 custom-col-style-4">
                <div class="product-wrapper mb-65">
                    <div class="product-img-hanicraft">
                        <a href="#">
                            <img src="assets/img/product/handicraft/5.jpg" alt="">
                        </a>
                        <div class="hanicraft-action-position">
                            <div class="hanicraft-action">
                                <a class="action-cart" title="Add To Cart" href="#">
                                    <i class="pe-7s-cart"></i>
                                </a>
                                <a class="action-like" title="Wishlist" href="#">
                                    <i class="pe-7s-like"></i>
                                </a>
                                <a class="action-repeat" title="Compare" href="#" data-toggle="modal" data-target="#exampleCompare" >
                                    <i class="pe-7s-repeat"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-content-hanicraft">
                        <h5>$40.33</h5>
                        <h4><a href="product-details.html">Network Accent Chair</a></h4>
                        <span>Buskat</span>
                    </div>
                </div>
            </div>
            <div class="custom-col-two-5 custom-col-style-4">
                <div class="product-wrapper mb-65">
                    <div class="product-img-hanicraft">
                        <a href="#">
                            <img src="assets/img/product/handicraft/6.jpg" alt="">
                        </a>
                        <div class="hanicraft-action-position">
                            <div class="hanicraft-action">
                                <a class="action-cart" title="Add To Cart" href="#">
                                    <i class="pe-7s-cart"></i>
                                </a>
                                <a class="action-like" title="Wishlist" href="#">
                                    <i class="pe-7s-like"></i>
                                </a>
                                <a class="action-repeat" title="Compare" href="#" data-toggle="modal" data-target="#exampleCompare" >
                                    <i class="pe-7s-repeat"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-content-hanicraft">
                        <h5>$40.33</h5>
                        <h4><a href="product-details.html">Ardenboro Sofa</a></h4>
                        <span>Buskat</span>
                    </div>
                </div>
            </div>
            <div class="custom-col-two-5 custom-col-style-4">
                <div class="product-wrapper mb-65">
                    <div class="product-img-hanicraft">
                        <a href="#">
                            <img src="assets/img/product/handicraft/7.jpg" alt="">
                        </a>
                        <div class="hanicraft-action-position">
                            <div class="hanicraft-action">
                                <a class="action-cart" title="Add To Cart" href="#">
                                    <i class="pe-7s-cart"></i>
                                </a>
                                <a class="action-like" title="Wishlist" href="#">
                                    <i class="pe-7s-like"></i>
                                </a>
                                <a class="action-repeat" title="Compare" href="#" data-toggle="modal" data-target="#exampleCompare" >
                                    <i class="pe-7s-repeat"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-content-hanicraft">
                        <h5>$40.33</h5>
                        <h4><a href="product-details.html">Daystar Sofa</a></h4>
                        <span>Buskat</span>
                    </div>
                </div>
            </div>
            <div class="custom-col-two-5 custom-col-style-4">
                <div class="product-wrapper mb-65">
                    <div class="product-img-hanicraft">
                        <a href="#">
                            <img src="assets/img/product/handicraft/8.jpg" alt="">
                        </a>
                        <span class="new">new</span>
                        <div class="hanicraft-action-position">
                            <div class="hanicraft-action">
                                <a class="action-cart" title="Add To Cart" href="#">
                                    <i class="pe-7s-cart"></i>
                                </a>
                                <a class="action-like" title="Wishlist" href="#">
                                    <i class="pe-7s-like"></i>
                                </a>
                                <a class="action-repeat" title="Compare" href="#" data-toggle="modal" data-target="#exampleCompare" >
                                    <i class="pe-7s-repeat"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-content-hanicraft">
                        <h5>$40.33</h5>
                        <h4><a href="product-details.html">Power Reclining Sofa</a></h4>
                        <span>Buskat</span>
                    </div>
                </div>
            </div>
            <div class="custom-col-two-5 custom-col-style-4">
                <div class="product-wrapper mb-65">
                    <div class="product-img-hanicraft">
                        <a href="#">
                            <img src="assets/img/product/handicraft/9.jpg" alt="">
                        </a>
                        <div class="hanicraft-action-position">
                            <div class="hanicraft-action">
                                <a class="action-cart" title="Add To Cart" href="#">
                                    <i class="pe-7s-cart"></i>
                                </a>
                                <a class="action-like" title="Wishlist" href="#">
                                    <i class="pe-7s-like"></i>
                                </a>
                                <a class="action-repeat" title="Compare" href="#" data-toggle="modal" data-target="#exampleCompare" >
                                    <i class="pe-7s-repeat"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-content-hanicraft">
                        <h5>$40.33</h5>
                        <h4><a href="product-details.html">Power Reclining Sofa</a></h4>
                        <span>Buskat</span>
                    </div>
                </div>
            </div>
            <div class="custom-col-two-5 custom-col-style-4">
                <div class="product-wrapper mb-65">
                    <div class="product-img-hanicraft">
                        <a href="#">
                            <img src="assets/img/product/handicraft/10.jpg" alt="">
                        </a>
                        <span class="new">new</span>
                        <span class="sell">sell</span>
                        <div class="hanicraft-action-position">
                            <div class="hanicraft-action">
                                <a class="action-cart" title="Add To Cart" href="#">
                                    <i class="pe-7s-cart"></i>
                                </a>
                                <a class="action-like" title="Wishlist" href="#">
                                    <i class="pe-7s-like"></i>
                                </a>
                                <a class="action-repeat" title="Compare" href="#" data-toggle="modal" data-target="#exampleCompare" >
                                    <i class="pe-7s-repeat"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-content-hanicraft">
                        <h5>$40.33</h5>
                        <h4><a href="product-details.html">Hand made Basket Pot</a></h4>
                        <span>Buskat</span>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<!-- product area end -->