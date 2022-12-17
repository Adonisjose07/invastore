        
@include('public.head')
    <!-- extra head options -->
    </head>
    <body>
        @include('public.header')
        @include('public.subheader')
        <div class="product-details ptb-100 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-7 col-12">
                        <div class="product-details-img-content">
                            <div class="product-details-tab mr-35 product-details-tab2">
                                <div class="product-details-small nav mr-10 product-details-2" role=tablist>
                                    @foreach ($product->gallery as $index => $image)
                                        <a class="{{($index == 0) ? 'active' : ''}} mb-10" href="#pro-details{{$index}}" data-toggle="tab" role="tab" aria-selected="true">
                                            <img src="{{asset('storage/'.$image->url)}}" alt="">
                                        </a>
                                    @endforeach
                                </div>
                                <div class="product-details-large tab-content">
                                    @foreach($product->gallery as $index => $image)
                                        <div class="tab-pane fade {{ ($index == 0) ? 'active show' : ''}}" id="pro-details{{$index}}" role="tabpanel">
                                            <div class="tab-pane-image-wrapper">
                                                <!-- <a href="{{asset('storage/'.$image->url)}}"> -->
                                                    <img src="{{asset('storage/'.$image->url)}}" alt="">
                                                <!-- </a> -->
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-5 col-12">
                        <div class="product-details-content">
                            <input type="hidden" class="product-id" value="{{$product->id}}">
                            <h3>{{$product->name}}</h3>
                            <div class="details-price">
                                <span>${{$product->price}}</span>
                            </div>
                            <p>
                                {{$product->description}}
                            </p>
                            <div class="quickview-plus-minus">
                                <div class="cart-plus-minus">
                                    <input type="number" min="1" value="{{($product->isAddedToCart) ? $product->qtyAddedToCart : 1}}" name="quantity" class="cart-plus-minus-box">
                                </div>
                                <div class="quickview-btn-cart">
                                    <a class="btn-hover-black" href="#" data-product-id="{{$product->id}}">{{ ($product->isAddedToCart) ? 'update cart' : 'add to cart'}}</a>
                                </div>
                                <div class="quickview-btn-wishlist">
                                    <a class="btn-hover" href="#"><i class="pe-7s-like"></i></a>
                                </div>
                            </div>
                            <div class="product-details-cati-tag mt-35">
                                <ul>
                                    <li class="categories-title">Category :</li>
                                    <li><a href="{{url('/shop/'.$product->category->slug)}}">{{$product->category->name}}</a></li>
                                </ul>
                            </div>  
                            <!-- <div class="product-share">
                                <ul>
                                    <li class="categories-title">Share :</li>
                                    <li>
                                        <a href="#">
                                            <i class="icofont icofont-social-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icofont icofont-social-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icofont icofont-social-pinterest"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icofont icofont-social-flikr"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <!-- product area start -->
         @if(count($related_products))
            <div class="product-area pb-95">
                <div class="container">
                    <div class="section-title-3 text-center mb-50">
                        <h2>Related products</h2>
                    </div>
                    <div class="product-style">
                        <div class="related-product-active owl-carousel">
                            @foreach ($related_products as $relatedProduct )
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="{{url('/shop/'.$category->slug.'/'.$relatedProduct->slug)}}">
                                            <img src="{{asset('storage/'.$relatedProduct->getFeaturedImage())}}" alt="">
                                        </a>
                                        <!-- <span>hot</span> -->
                                        <div class="product-action">
                                            <a class="animate-left" title="Wishlist" href="#">
                                                <i class="pe-7s-like"></i>
                                            </a>
                                            <a class="animate-top" title="Add To Cart" href="#" data-quick-add-to-cart data-product-id="{{$relatedProduct->id}}">
                                                <i class="{{($relatedProduct->isAddedToCart) ? 'icofont icofont-shopping-cart' : 'pe-7s-cart' }}"></i>
                                            </a>
                                            <a class="animate-right trigger-modal" title="Quick View" data-product-id="{{$relatedProduct->id}}" href="#">
                                                <i class="pe-7s-look"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h4><a href="{{url('/shop/'.$relatedProduct->category->slug.'/'.$relatedProduct->slug)}}">{{$relatedProduct->name}}</a></h4>
                                        <span>${{$relatedProduct->price}}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- product area end -->
        @include('public.footer')
        @include('public.modals')
        @include('public.foot')
        <!-- extra foot options -->
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                var triggerTabList = [].slice.call(document.querySelectorAll('.product-details-small a'))
                triggerTabList.forEach(function (triggerEl) {
                    var tabTrigger = new bootstrap.Tab(triggerEl)
                    triggerEl.addEventListener('click', function (event) {
                        event.preventDefault()
                        tabTrigger.show()
                    })
                })

                document.querySelector('.product-details-content .quickview-btn-cart a').addEventListener('click', (e) => {
                    e.preventDefault();
                    let container = document.querySelector('.product-details-content');
                    let product_id = container.querySelector('input.product-id').value;
                    let xhr = createXHR("{{url('add-to-cart')}}"+'/'+product_id);
                    let formData = new FormData();
                    formData.append('quantity', container.querySelector('[name="quantity"]').value);
                    xhr.onload = (evt) => {
                            let res = JSON.parse(evt.target.response);
                            if(res.success){
                                switch(res.action){
                                    case 'create':                                        
                                    case 'updated':
                                        e.target.innerText = 'update cart';
                                        break;
                                    case 'redirect':
                                        window.location = "{{url('login')}}"
                                        break;
                                }
                                updateMiniCart();
                                
                            }
                        }
                        xhr.send(formData);
                }, false)

                document.querySelectorAll('a[data-quick-add-to-cart]').forEach((el) => {
                    el.addEventListener('click', (e) => {
                        e.preventDefault();
                        let current = e.currentTarget;

                        let xhr = new XMLHttpRequest();
                        xhr.open('POST', "{{url('quick-add-to-cart')}}"+'/'+current.dataset.productId);
                        xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}")
                        xhr.onload = (evt) => {
                            let res = JSON.parse(evt.target.response);
                            if(res.success){
                                switch(res.action){
                                    case 'redirect':
                                        window.location = "{{url('login')}}"
                                        break;
                                    default:
                                        updateProductCards(current.dataset.productId, res.action)
                                }
                                updateMiniCart();
                            }
                        }
                        xhr.send();

                    }, false)
                }, false)

                triggerModals = document.querySelectorAll('.trigger-modal');
                triggerModals.forEach((el) => {
                    el.addEventListener('click', (e) => {
                        e.preventDefault();
                        let xhr = new XMLHttpRequest();
                        xhr.open('POST', "{{url('quick-view')}}"+'/'+e.currentTarget.dataset.productId, true);
                        xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}")

                        xhr.onload = (e) => {
                            let res = JSON.parse(e.target.response);
                            if(res.success){
                                let modalEl = document.querySelector('#quickViewModal')
                                modalEl.querySelector('.quick-view-tab-content').innerHTML = res.tabpanel;
                                modalEl.querySelector('.quick-view-list.nav').innerHTML = res.tablist;
                                modalEl.querySelector('.quick-view-name').innerHTML = res.name;
                                modalEl.querySelector('.quick-view-price').innerHTML = res.price;
                                modalEl.querySelector('.quick-view-description').innerHTML = res.description;
                                modalEl.querySelector('input.product-id').value = res.product_id;
                                modalEl.querySelector('input.cart-plus-minus-box').value= res.product_quantity;
                                modalEl.querySelector('.quickview-btn-cart a').innerText = (res.product_in_cart) ? 'update cart' : 'add to cart';
                                
                                let triggerTabList = [].slice.call(modalEl.querySelectorAll('.quick-view-list a'))
                                    triggerTabList.forEach(function (triggerEl) {
                                    let tabTrigger = new bootstrap.Tab(triggerEl)

                                    triggerEl.addEventListener('click', function (event) {
                                        event.preventDefault()
                                        tabTrigger.show()
                                    })
                                })
                                var modal = bootstrap.Modal.getOrCreateInstance(modalEl) // Returns a Bootstrap modal instance
                                modal.show();
                            }
                        }
                        xhr.send()

                    }, false)
                })

                document.querySelector('.modal .quickview-btn-cart a').addEventListener('click', (e) => {
                    e.preventDefault();
                    let modalEl = document.querySelector('#quickViewModal');
                    let product_id = modalEl.querySelector('input.product-id').value;
                    let xhr = createXHR("{{url('add-to-cart')}}"+'/'+product_id);
                    let formData = new FormData();
                    formData.append('quantity', modalEl.querySelector('[name="quantity"]').value);
                    xhr.onload = (evt) => {
                            let res = JSON.parse(evt.target.response);
                            if(res.success){
                                switch(res.action){
                                    case 'create':                                        
                                    case 'updated':
                                        e.target.innerText = 'update cart';
                                        updateProductCards(product_id, res.action)
                                        break;
                                    case 'redirect':
                                        window.location = "{{url('login')}}"
                                        break;
                                }
                                updateMiniCart();
                                
                            }
                        }
                        xhr.send(formData);
                }, false)
            }, false)

            function createXHR(endpoint){
                let xhr = new XMLHttpRequest();
                xhr.open('POST', endpoint);
                xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}");
                return xhr;
            }
            
            function updateMiniCart(){
                let dropdown = document.querySelector('.cart-dropdown');
                let counter = document.querySelector('.handicraft-count');
                let xhr = new XMLHttpRequest();
                xhr.open('POST', "{{url('update-minicart')}}")
                xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}")
                xhr.onload = (e) => {
                    let res = JSON.parse(e.target.response);
                    if(res.success){
                        dropdown.innerHTML = res.html;
                        counter.innerText = res.count;
                    }
                }
                xhr.send()
            }
            
            function deleteMiniCartItem(id){
                let xhr = new XMLHttpRequest();
                xhr.open('POST', "{{url('delete-minicart-item')}}"+'/'+id)
                xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}")
                xhr.onload = (e) => {
                    let res = JSON.parse(e.target.response)
                    if(res.success){
                        updateProductCards(res.product_id, 'delete')
                        updateMiniCart()
                    }
                }
                xhr.send();
            }

            function updateProductCards(product_id, action ){
                let product_grid_1 = document.querySelectorAll('.related-product-active a[data-quick-add-to-cart][data-product-id="'+product_id+'"] i');
                if(product_grid_1.length){
                    //owl-carousel clone this element
                    product_grid_1.forEach(el => {
                        el.className = (action == 'updated' || action == 'create') ? 'icofont icofont-shopping-cart' : 'pe-7s-cart' ;
                    })
                }
                
                let product_grid_2 = document.querySelector('.product-details-content .quickview-btn-cart a[data-product-id="'+product_id+'"]');
                if(product_grid_2){
                    product_grid_2.innerText = (action == 'updated' || action == 'create') ? 'cart remove' : 'add to cart';
                }
                
            }

        </script>
    </body>
</html>