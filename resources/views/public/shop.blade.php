@include('public.head')
    <!-- extra head options -->
    </head>
    <body>
        @include('public.header')
        @include('public.subheader')
        <div class="shop-page-wrapper shop-page-padding ptb-120">
            <div class="container-fluid">
                <div class="row">
                    @include('public.shop_sidebar')
                    <div class="col-lg-9">
                        <div class="shop-product-wrapper res-xl res-xl-btn">
                            <div class="shop-bar-area">
                                <div class="shop-bar pb-60">
                                    <div class="shop-found-selector">
                                        <div class="shop-found">
                                            <p><span>{{$products->total()}}</span> Product Found of <span>{{$total_products}}</span></p>
                                        </div>
                                        <div class="shop-selector">
                                            <label>Sort By : </label>
                                            <select name="sort" id="sort_select">
                                                <option value="default" {{($sort == 'default') ? 'selected' : ''}}>Default</option>
                                                <option value="asc" {{($sort == 'asc') ? 'selected' : ''}} >A to Z</option>
                                                <option value="desc" {{($sort =='desc') ? 'selected' : ''}}> Z to A</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="shop-filter-tab">
                                        <div class="shop-tab nav">                                            
                                            <a class="shop-grid-style {{($tab_style == '#grid-sidebar1' || $tab_style == '') ? 'active' : ''}}" href="#grid-sidebar1">
                                                <i class="ti-layout-grid4-alt"></i>
                                            </a>
                                            <a class="shop-grid-style {{($tab_style == '#grid-sidebar2' || $tab_style == '') ? 'active' : ''}}" href="#grid-sidebar2">
                                                <i class="ti-menu"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="shop-product-content tab-content">
                                    <div id="grid-sidebar1" class="tab-pane fade {{($tab_style == '#grid-sidebar1' || $tab_style == '') ? 'active show' : ''}}">
                                        <div class="row">
                                            @if(count($products))
                                                @foreach ($products as $product)
                                                    <div class="col-lg-6 col-md-6 col-xl-3">
                                                        <div class="product-wrapper mb-30">
                                                            <div class="product-img">
                                                                <a href="{{url('/shop/'.$product->category->slug.'/'.$product->slug)}}">
                                                                    <img src="{{asset('storage/'.$product->getFeaturedImage())}}" alt="">
                                                                </a>
                                                                <!-- <span>hot</span> -->
                                                                <div class="product-action">
                                                                    <a class="animate-left" title="Wishlist" href="#">
                                                                        <i class="pe-7s-like"></i>
                                                                    </a>
                                                                    <a class="animate-top" title="Add To Cart" href="javascript://" onclick="(e) => {e.preventDefault()}">
                                                                        <i class="{{(isset($product->isAddedToCart)) ? 'icofont icofont-shopping-cart' : 'pe-7s-cart'}}" data-quick-add-to-cart data-product-id="{{$product->id}}"></i>
                                                                    </a>
                                                                    <!-- <a class="animate-right" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
                                                                        <i class="pe-7s-look"></i>
                                                                    </a> -->
                                                                    <a class="animate-right trigger-modal" title="Quick View" href="javascript://" data-product-id="{{$product->id}}">
                                                                        <i class="pe-7s-look"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="product-content">
                                                                <h4><a href="{{url('/shop/'.$product->category->slug.'/'.$product->slug)}}">{{$product->name}} </a></h4>
                                                                <span>${{$product->price}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach                                            
                                            @else
                                                <h3>No products found</h3>
                                            @endif
                                            
                                        </div>
                                    </div>
                                    <div id="grid-sidebar2" class="tab-pane fade {{($tab_style == '#grid-sidebar2') ? 'active show' : ''}}">
                                        <div class="row">
                                            @if(count($products))
                                                @foreach ($products as $product)
                                                    <div class="col-lg-12 col-xl-6">
                                                        <div class="product-wrapper mb-30 single-product-list product-list-right-pr mb-60">
                                                            <div class="product-img list-img-width">
                                                                <a href="{{url('/shop/'.$product->category->slug.'/'.$product->slug)}}">
                                                                    <img src="{{asset('storage/'.$product->getFeaturedImage())}}" alt="">
                                                                </a>
                                                                <!-- <span>hot</span> -->
                                                                <div class="product-action-list-style">
                                                                    <a class="animate-right trigger-modal" title="Quick View"  href="javascript://" data-product-id="{{$product->id}}">
                                                                        <i class="pe-7s-look"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="product-content-list">
                                                                <div class="product-list-info">
                                                                    <h4><a href="{{url('/shop/'.$product->category->slug.'/'.$product->slug)}}">{{$product->name}}</a></h4>
                                                                    <span>${{$product->price}}</span>
                                                                    <p>{{$product->category->name}}. </p>
                                                                </div>
                                                                <div class="product-list-cart-wishlist">
                                                                    <div class="product-list-cart">
                                                                        <a class="btn-hover list-btn-style" data-quick-add-to-cart-2 data-product-id="{{$product->id}}" href="#">
                                                                            {{(isset($product->isAddedToCart)) ? 'cart remove' : 'add to cart'}}                                                                            
                                                                        </a>
                                                                    </div>
                                                                    <div class="product-list-wishlist">
                                                                        <a class="btn-hover list-btn-wishlist" href="#">
                                                                            <i class="pe-7s-like"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <h3>No products found</h3>    
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pagination-style mt-30 mb-30 text-center justify-center">
                            <?php
                                $filters = [];
                                if($filter_min){
                                    $filters['price_min'] = $filter_min;
                                }
                                if($filter_max){
                                    $filters['price_max'] = $filter_max;
                                }
                                if($filter_name){
                                    $filters['name'] = $filter_name;
                                }
                                if($tab_style){
                                    $filters['tab_style'] = $tab_style;
                                }
                            ?>
                            {{$products->appends($filters)->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('public.footer')
        @include('public.modals')
        @include('public.foot')
        <!-- extra foot options -->
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                const sort = document.getElementById('sort_select');
                sort.addEventListener('change', (e) => {
                    let value = e.target.value;
                    let params = new URLSearchParams(location.search);
                    if(value != 'default'){
                        params.set('order', e.target.value);
                    }else{
                        params.delete('order');
                    }
                    let tab_style = '#' + document.querySelector('.shop-grid-style.active').href.split('#')[1]
                    params.set('tab_style', tab_style)
                    
                    window.location.href = `${location.pathname}?${params}`;
                }, false)

                // const grid_styles = document.querySelectorAll('.shop-grid-style')
                var triggerTabList = [].slice.call(document.querySelectorAll('.shop-tab a'))
                triggerTabList.forEach(function (triggerEl) {
                    var tabTrigger = new bootstrap.Tab(triggerEl)

                    triggerEl.addEventListener('click', function (event) {
                        event.preventDefault()
                        document.getElementById('tab_style').value = '#'+event.currentTarget.href.split('#')[1];
                        document.querySelectorAll('.pagination-style a').forEach( (el) => {
                            let params = new URLSearchParams('?'+el.href.split('?')[1]);
                            
                            let style = event.currentTarget.href.split('#')[1]
                            params.set('tab_style', '#'+style)
                            let sort = document.querySelector('#sort_select');
                            if(sort && sort.value != 'default'){
                                params.set('order', sort.value)
                            }
                            el.href = `${location.pathname}?${params}`
                        })
                        tabTrigger.show()
                    })
                })

                triggerModals = document.querySelectorAll('.trigger-modal');
                triggerModals.forEach((el) => {
                    el.addEventListener('click', (e) => {
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


                let params = new URLSearchParams(location.search);
                if(params.has('tab_style')){
                    document.querySelectorAll('.pagination-style a').forEach( (el) => {
                        let params = new URLSearchParams('?'+el.href.split('?')[1]);
                        
                        let style = params.get('tab_style')
                        params.set('tab_style', style)
                        el.href = `${location.pathname}?${params}`
                    })
                }

                //quick-add-to-cart
                document.querySelectorAll('i[data-quick-add-to-cart]').forEach((el) => {
                    el.addEventListener('click', (e) => {
                        e.preventDefault();
                        let xhr = new XMLHttpRequest();
                        xhr.open('POST', "{{url('quick-add-to-cart')}}"+'/'+e.target.dataset.productId);
                        xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}")
                        xhr.onload = (evt) => {
                            let res = JSON.parse(evt.target.response);

                            if(res.success){
                                switch(res.action){
                                    case 'redirect':
                                        window.location = "{{url('login')}}"
                                        break;
                                    default:
                                        updateProductCards(e.target.dataset.productId, res.action)
                                }
                                updateMiniCart();
                            }
                        }
                        xhr.send();

                    }, false)
                }, false)
                document.querySelectorAll('[data-quick-add-to-cart-2]').forEach((el) => {
                    el.addEventListener('click', (e) => {
                        e.preventDefault();
                        let xhr = new XMLHttpRequest();
                        xhr.open('POST', "{{url('quick-add-to-cart')}}"+'/'+e.target.dataset.productId);
                        xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}")
                        xhr.onload = (evt) => {
                            let res = JSON.parse(evt.target.response);

                            if(res.success){
                                switch(res.action){
                                    case 'redirect':
                                        window.location = "{{url('login')}}"
                                        break;
                                    default:
                                        updateProductCards(e.target.dataset.productId, res.action)
                                        break;
                                }
                                updateMiniCart();
                            }
                        }
                        xhr.send();

                    }, false)
                }, false)

                document.querySelector('.quickview-btn-cart a').addEventListener('click', (e) => {
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
            
            function updateProductCards(product_id, action ){
                let product_grid_1 = document.querySelector('i[data-product-id="'+product_id+'"]');
                
                if(product_grid_1){
                    product_grid_1.className = (action == 'updated' || action == 'create') ? 'icofont icofont-shopping-cart' : 'pe-7s-cart' ;
                }
                let product_grid_2 = document.querySelector('.product-list-cart a[data-product-id="'+product_id+'"]');
                if(product_grid_2){
                    product_grid_2.innerText = (action == 'updated' || action == 'create') ? 'cart remove' : 'add to cart';
                }

                if(action == 'updated'){
                    $.notify('Product updated', 'success');
                }
                if(action == 'create'){
                    $.notify('Product added to cart', 'success');
                }
                if(action == 'delete'){
                    $.notify('Product deleted from cart');
                }
                
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

        </script>
    </body>
</html>