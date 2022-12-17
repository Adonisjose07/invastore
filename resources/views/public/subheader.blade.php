<div class="header-bottom-furniture wrapper-padding-2 border-top-3">
    <div class="container-fluid">
        <div class="furniture-bottom-wrapper">
            <div class="furniture-login">
                <ul>
                    @if(Auth::user())
                        <li><a href="{{route('dashboard')}}">Account </a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="#" onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                >Logout </a>
                            </form>
                        </li>
                                
                    @else
                        <li>Get Access: <a href="{{route('login')}}">Login </a></li>
                        <li><a href="{{route('register')}}">Register </a></li>
                    @endif
                </ul>
            </div>
            <div class="furniture-search">
                <form method="GET" action="{{route('shop')}}">
                    <input name="name" value="{{($filter_name) ? $filter_name : ''}}" placeholder="I am Searching for . . ." type="text">
                    <button>
                        <i class="ti-search"></i>
                    </button>
                </form>
            </div>
            <div class="furniture-wishlist">
                <ul>
                    <!-- <li><a data-toggle="modal" data-target="#exampleCompare" href="#"><i class="ti-reload"></i> Compare</a></li> -->
                    <li><a href="wishlist.html"><i class="ti-heart"></i> Wishlist</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="tope">
    @if(isset($subheader_banner))
        <img src="{{($subheader_banner != '') ? asset('storage/'.$subheader_banner): 'assets/img/bg/breadcrumb.jpg'}}">
    @else
        <img src="{{asset('assets/img/bg/breadcrumb.jpg')}}">
    @endif
</div>