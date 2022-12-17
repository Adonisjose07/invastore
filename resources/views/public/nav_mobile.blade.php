<nav id="mobile-menu-active">
    @if(count($categories))
        <ul class="menu-overflow">
            <li><a href="{{url('')}}">home</a></li>
            <li><a href="{{url('about-us')}}">About us</a></li>
            <li>
                <a href="{{url('shop')}}">Shop</a>
                <ul>
                    @foreach ($categories as $category)
                        <li><a href="{{url('shop/'.$category->slug)}}">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href="{{url('contact')}}">contact</a></li>
        </ul>
    @endif
</nav>