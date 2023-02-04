<div class="mainmenu pull-left">
    <ul class="nav navbar-nav collapse navbar-collapse">
        <li><a href="/" class="active">Trang chủ</a></li>

        @foreach ($menuParent as $menuParentItem)
        <li class="dropdown">
            <a href="#">{{ $menuParentItem->name }}
                @if ($menuParentItem->menuChildren->count())
                    <i class="fa fa-angle-down"></i>
                @endif
            </a>
            <ul role="menu" class="sub-menu">
                @if ($menuParentItem->menuChildren->count())
                    @foreach ($menuParentItem->menuChildren as $menuChildItem)
                        <li><a href="product-details.html">{{ $menuChildItem->name }}</a></li>
                    @endforeach
                @endif
            </ul>
        </li>
        @endforeach

        {{-- <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
            <ul role="menu" class="sub-menu">
                <li><a href="blog.html">Blog List</a></li>
                <li><a href="blog-single.html">Blog Single</a></li>
            </ul>
        </li> --}}
        {{-- <li><a href="404.html">404</a></li> --}}
        {{-- <li><a href="contact-us.html">Contact</a></li> --}}
    </ul>
</div>