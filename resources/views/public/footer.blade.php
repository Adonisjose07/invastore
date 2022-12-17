<footer class="footer-area default-footer">
    <div class="footer-top-area pt-105 pb-65" data-overlay="9">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-3">
                    <div class="footer-widget mb-40">
                        <h3 class="footer-widget-title">Custom Service</h3>
                        <div class="footer-widget-content">
                            <ul>
                                <li><a href="#">Cart</a></li>
                                <li><a href="{{url('dashboard')}}">My Account</a></li>
                                <li><a href="{{url('login')}}">Login</a></li>
                                <li><a href="{{url('register')}}">Register</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-3">
                    <div class="footer-widget mb-40">
                        <h3 class="footer-widget-title">Categories</h3>
                        <div class="footer-widget-content">
                            <ul>
                                @foreach ($categories as $category )
                                    <li><a href="{{url('/shop' . $category->slug)}}">{{$category->name}}</a></li>    
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="footer-widget mb-40">
                        <h3 class="footer-widget-title">Contact</h3>
                        <div class="footer-newsletter">
                            <div class="mb-30"><pan>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is dummy.</span></div>
                            <div class="footer-contact">
                                <p><span><i class="ti-location-pin"></i></span> 77 Seventh avenue USA 12555. </p>
                                <p><span><i class=" ti-headphone-alt "></i></span> +88 (015) 609735 or +88 (012) 112266</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom black-bg ptb-20">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="copyright">
                        <p>
                            Copyright ©
                            <a href="{{url('/')}}">KHARYGOART</a> 2022 . All Right Reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>