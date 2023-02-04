<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i>{{ getConfigValueSetting('phone_number') }}</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ getConfigValueSetting('facebook_link') }}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{ getConfigValueSetting('twitter_link') }}"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{ getConfigValueSetting('linkIn_link') }}"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="{{ getConfigValueSetting('dribbble_link') }}"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="{{ getConfigValueSetting('google_link') }}"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
    
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="/"><img src="{{ asset('Eshopper/images/home/logo.png') }}" alt="" /></a>
                    </div>
                    <div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canada</a></li>
                                <li><a href="#">UK</a></li>
                            </ul>
                        </div>
                        
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canadian Dollar</a></li>
                                <li><a href="#">Pound</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
                            <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                            <li><a href="{{ route('checkout.index') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <li ><a href="{{ route('cart.index') }}" onclick=""><i class="fa fa-shopping-cart" ></i> Cart</a></li>
                            @can('checkAuth')
                            {{-- <li><a href="{{ route('customer.logout') }}"><i class="fa fa-lock"></i> Logout</a></li>            --}}
                            <li>
                            <div class="dropdown custom-dropdown">
                                <a href="#" data-toggle="dropdown" class="d-flex align-items-center dropdown-link text-left dropdown-account" aria-haspopup="true" aria-expanded="false" data-offset="0, 20">
                                  <div class="profile-pic mr-3">
                                    <img src="{{ asset('dropdown18/images/person_2.jpg') }}" alt="Image">
                                  </div>
                                  <div class="profile-info">
                                    <h3>Kevin Thomas</h3>
                                  </div>
                    
                    
                                </a>
                    
                                <div class="dropdown-menu dropdown-menu-account" aria-labelledby="dropdownMenuButton" >
                                  <a class="dropdown-item" href="#"> <span class="icon icon-dashboard"></span> User Dashboard</a>
                                  <a class="dropdown-item" href="#"><span class="icon icon-mail_outline"></span>Inbox <span class="number">3</span></a>
                                  <a class="dropdown-item" href="#"><span class="icon icon-people"></span>Following</a>
                                  <a class="dropdown-item" href="#"><span class="icon icon-cog"></span>Setting<span>New</span></a>
                                  <a class="dropdown-item" href="{{ route('customer.logout') }}"><span class="icon icon-sign-out"></span>Log out</a>
                                </div>
                              </div>
                            </li>
                            @else
                            <li><a href="{{ route('customer.login') }}"><i class="fa fa-lock"></i> Login</a></li>
                            @endcan
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!--Main menu-->
                    @include('components.main_menu')
                    <!--/Main menu-->
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
    
</header><!--/header-->