@include('public.head')
    <!-- extra head options -->
    </head>

    <body>
        @include('public.header')

        @include('public.home_slider')
        @include('public.home_featured_area')
        @include('public.home_product_area')
        @include('public.home_banner_area')
        @include('public.home_testimonial_area')
        

        @include('public.footer_home')
        @include('public.modals')
        @include('public.foot')
        <!-- extra foot options -->
        <script>
            window.addEventListener('DOMContentLoaded', () => {
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
                                    case 'create':
                                        e.target.className = 'icofont icofont-shopping-cart';
                                        break;
                                    case 'delete':
                                        e.target.className = 'pe-7s-cart';
                                        break;
                                    case 'redirect':
                                        window.location = "{{url('login')}}"
                                        break;
                                }
                                updateMiniCart();
                            }
                        }
                        xhr.send();

                    }, false)
                }, false)
                
            })
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
                        let itemAdded = document.querySelector('i[data-product-id="'+res.product_id+'"]');
                        if(itemAdded){
                            itemAdded.className='pe-7s-cart';
                        }

                        // let miniCartItem = document.querySelector('li[data-product-id="'+res.product_id+'"]');
                        // miniCartItem.remove();

                        updateMiniCart()
                    }
                }
                xhr.send();
            }

        </script>
    </body>
</html>
