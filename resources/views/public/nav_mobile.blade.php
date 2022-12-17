<nav id="mobile-menu-active">
    @if(count($categories))
        <ul class="menu-overflow">
        @foreach ($categories as $category)
            <li><a href="{{url('shop/'.$category->slug)}}">{{$category->name}}</a></li>
        @endforeach
        </ul>
    @endif
</nav>