        <header class="header-area header-style-1 header-height-2">
            <div class="header-top header-top-ptb-1 d-none d-lg-block">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-4">
                            <div class="header-info">
                                <ul>
                                    <li><i class="fi-rs-smartphone"></i> <a href="tel:{{Setting('phone')}}">{{phone(Setting('phone'))}}</a></li>
                                    <li><i class="fi-rs-marker"></i><a  href="page-contact.html">موقعیت</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-4">
                            <div class="text-center">
                                <div id="news-flash" class="d-inline-block">
                                    <ul>
                                        {{-- <li>Get great devices up to 50% off <a href="shop-grid-right.html">View details</a></li>
                                        <li>Supper Value Deals - Save more with coupons</li>
                                        <li>Trendy 25silver jewelry, save up 35% off today <a href="shop-grid-right.html">Shop now</a></li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <div class="header-info header-info-right">
                                <ul>
                                    @auth
                                    @if(user('role') == 1)
                                        <li><i class="fi-rs-user"></i><a href="{{route('admin.panel')}}">پنل مدیریت</a></li>
                                        <li><i class="fi-rs-user"></i><a href="{{route('account')}}">حساب کاربری</a></li>
                                    @else
                                        <li><i class="fi-rs-user"></i><a href="{{route('account')}}">حساب کاربری</a></li>
                                    @endif
                                    @else
                                        <li>
                                            <i class="fi-rs-user"></i>
                                            {{-- <a href="{{route('login')}}">ورود / ثبت نام</a> --}}
                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#authModal">
                                                ورود / ثبت نام
                                            </a>
                                        </li>

                                    @endauth
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
                <div class="container">
                    <div class="header-wrap">
                        <div class="logo logo-width-1">
                            <a href="{{route('home')}}"><img src="@if(Setting('logo')!=''){{Setting('logo')}}@else{{asset('images/logo.png')}}@endif" width="40" alt="{{Setting('title')}}"></a>
                        </div>
                        <div class="header-right">
                            <div class="search-style-2">
                                <form action="#">
                                    <select class="select-active" name="category">
                                        <option value="0">تمامی دسته ها</option>
                                    </select>
                                    <input type="text" placeholder="جستجوی محصول...">
                                </form>
                            </div>
                            <div class="header-action-right">
                                <div class="header-action-2">
                                    {{-- <div class="header-action-icon-2">
                                        <a href="{{route('wishlist')}}">
                                            <img class="svgInject" alt="Evara" src="{{asset('/assets/imgs/theme/icons/icon-heart.svg')}}">
                                            <span class="pro-count blue" id="WishCount">0</span>
                                        </a>
                                    </div> --}}
                                    <div class="header-action-icon-2">
                                        <a class="mini-cart-icon" href="{{route('cart')}}">
                                            <img alt="Evara" src="{{asset('/assets/imgs/theme/icons/icon-cart.svg')}}">
                                            <span class="pro-count blue" id="CartCount">0</span>
                                        </a>
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                            <ul id="CartList">
                                                سبد خالی است
                                            </ul>
                                            <div class="shopping-cart-footer">
                                                <div class="shopping-cart-total">
                                                    <h4>مجموع <span class="totalprice">{{price(0)}}</span></h4>
                                                </div>
                                                <div class="shopping-cart-button">
                                                    <a href="{{route('cart')}}" class="outline">نمایش سبد</a>
                                                    <a href="{{route('checkout')}}">پرداخت</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-bottom-bg-color sticky-bar">
                <div class="container">
                    <div class="header-wrap header-space-between position-relative">
                        <div class="logo logo-width-1 d-block d-lg-none">
                            <a href="{{route('home')}}"><img src="@if(Setting('logo')!=''){{Setting('logo')}}@else{{asset('images/logo.png')}}@endif" alt="{{Setting('title')}}"></a>
                        </div>
                        <div class="header-nav d-none d-lg-flex">
                            <div class="main-categori-wrap d-none d-lg-block">
                                <a class="categori-button-active" href="#">
                                    <span class="fi-rs-apps"></span> جستجوی دسته ها
                                </a>
                                <div class="categori-dropdown-wrap categori-dropdown-active-large">
                                    <ul>
                                        <li class="has-children">
                                            <a href="shop-grid-right.html"><i class="evara-font-dress"></i>تیشرت</a>
                                            <div class="dropdown-menu">
                                                <ul class="mega-menu d-lg-flex">
                                                    <li class="mega-menu-col col-lg-7">
                                                        <ul class="d-lg-flex">
                                                            <li class="mega-menu-col col-lg-6">
                                                                <ul>
                                                                    <li><span class="submenu-title">عنوان</span></li>
                                                                    <li><a class="dropdown-item nav-link nav_item" href="#">دسته</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="mega-menu-col col-lg-6">
                                                                <ul>
                                                                    <li><span class="submenu-title">عنوان</span></li>
                                                                    <li><a class="dropdown-item nav-link nav_item" href="#">دسته</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-col col-lg-5">
                                                        <div class="header-banner2">
                                                            <img src="{{asset('/assets/imgs/banner/menu-banner-2.jpg')}}" alt="menu_banner1">
                                                            <div class="banne_info">
                                                                <h6>10% تخفیف</h6>
                                                                <h4>محصول جدید</h4>
                                                                <a href="#">خرید</a>
                                                            </div>
                                                        </div>
                                                        <div class="header-banner2">
                                                            <img src="{{asset('/assets/imgs/banner/menu-banner-3.jpg')}}" alt="menu_banner2">
                                                            <div class="banne_info">
                                                                <h6>15% تخفیف</h6>
                                                                <h4>پیشنهاد داغ</h4>
                                                                <a href="#">خرید</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="has-children">
                                            <a href="shop-grid-right.html"><i class="evara-font-tshirt"></i>لباس مردانه</a>
                                            <div class="dropdown-menu">
                                                <ul class="mega-menu d-lg-flex">
                                                    <li class="mega-menu-col col-lg-7">
                                                        <ul class="d-lg-flex">
                                                            <li class="mega-menu-col col-lg-6">
                                                                <ul>
                                                                    <li><span class="submenu-title">عنوان</span></li>
                                                                    <li><a class="dropdown-item nav-link nav_item" href="#">دسته</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="mega-menu-col col-lg-6">
                                                                <ul>
                                                                    <li><span class="submenu-title">عنوان</span></li>
                                                                    <li><a class="dropdown-item nav-link nav_item" href="#">دسته</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-col col-lg-5">
                                                        <div class="header-banner2">
                                                            <img src="{{asset('/assets/imgs/banner/menu-banner-4.jpg')}}" alt="menu_banner1">
                                                            <div class="banne_info">
                                                                <h6>10% تخفیف</h6>
                                                                <h4>محصول جدید</h4>
                                                                <a href="#">خرید</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>

                                    </ul>
                                    <div class="more_categories">نمایش بیشتر...</div>
                                </div>
                            </div>
                            <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                                <nav>
                                    <ul>
                                        <li><a class="active" href="{{route('home')}}">خانه</a></li>
                                        <li><a href="{{route('blog')}}">وبلاگ</a></li>
                                        {{-- <li><a href="{{route('about')}}">درباره</a></li> --}}
                                        <li>
                                            <a href="{{route('contact')}}">تماس</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="hotline d-none d-lg-block">
                            <p><i class="fi-rs-headset"></i><span>خط ویژه</span> {{Setting('phone')}} </p>
                        </div>
                        <p class="mobile-promotion"><span class="text-brand">روز مادر مبارک</span> مبارک. تفیف ویژه 40 درصدی</p>
                        <div class="header-action-right d-block d-lg-none">
                            <div class="header-action-2">
                                {{-- <div class="header-action-icon-2">
                                    <a href="shop-wishlist.html">
                                        <img alt="Evara" src="{{asset('/assets/imgs/theme/icons/icon-heart.svg')}}">
                                        <span class="pro-count white" id="WishCount">0</span>
                                    </a>
                                </div> --}}
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="{{route('cart')}}">
                                        <img alt="Evara" src="{{asset('/assets/imgs/theme/icons/icon-cart.svg')}}">
                                        <span class="pro-count white" id="CartCount">0</span>
                                    </a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        <ul id="CartList">
                                            سبد خالی است
                                        </ul>
                                        <div class="shopping-cart-footer">
                                            <div class="shopping-cart-total">
                                                <h4>مجموع <span class="totalprice">{{price(0)}}</span></h4>
                                            </div>
                                            <div class="shopping-cart-button">
                                                <a href="{{route('cart')}}">نمایش سبد</a>
                                                <a href="{{route('checkout')}}">پرداخت</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-action-icon-2 d-block d-lg-none">
                                    <div class="burger-icon burger-icon-white">
                                        <span class="burger-icon-top"></span>
                                        <span class="burger-icon-mid"></span>
                                        <span class="burger-icon-bottom"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="mobile-header-active mobile-header-wrapper-style">
            <div class="mobile-header-wrapper-inner">
                <div class="mobile-header-top">
                    <div class="mobile-header-logo">
                        <a href="{{route('home')}}"><img src="@if(Setting('logo')!=''){{Setting('logo')}}@else{{asset('images/logo.png')}}@endif" alt="{{Setting('title')}}"></a>
                    </div>
                    <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                        <button class="close-style search-close">
                            <i class="icon-top"></i>
                            <i class="icon-bottom"></i>
                        </button>
                    </div>
                </div>
                <div class="mobile-header-content-area">
                    <div class="mobile-search search-style-3 mobile-header-border">
                        <form action="#">
                            <input type="text" placeholder="جستجوی محصول...">
                            <button type="submit"><i class="fi-rs-search"></i></button>
                        </form>
                    </div>
                    <div class="mobile-menu-wrap mobile-header-border">
                        <div class="main-categori-wrap mobile-header-border">
                            <a class="categori-button-active-2" href="#">
                                <span class="fi-rs-apps"></span> جستجوی دسته ها
                            </a>
                            <div class="categori-dropdown-wrap categori-dropdown-active-small">
                                <ul>
                                    <li><a href="shop-grid-right.html"><i class="evara-font-dress"></i>لباس زنانه</a></li>
                                    <li><a href="shop-grid-right.html"><i class="evara-font-tshirt"></i>لباس مردانه</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- mobile menu start -->
                        <nav>
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a href="index.html">خانه</a></li>
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a href="shop-grid-right.html">فروشگاه</a>
                                    <ul class="dropdown">
                                        <li><a href="shop-grid-right.html">تیشرت</a></li>
                                        <li><a href="shop-grid-left.html">شلوار</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">درباره</a></li>
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">تماس</a></li>
                            </ul>
                        </nav>
                        <!-- mobile menu end -->
                    </div>
                    <div class="mobile-header-info-wrap mobile-header-border">
                        <div class="single-mobile-header-info mt-30">
                            <a  href="page-contact.html"> موقعیت </a>
                        </div>
                        <div class="single-mobile-header-info">
                            @auth
                                @if(user('role') == 1)
                                    <a href="{{route('admin.panel')}}">پنل مدیریت </a>
                                @else
                                    <a href="{{route('account')}}">حساب کاربری </a>
                                @endif
                            @else
                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    ورود / ثبت نام
                                </a>
                            @endauth
                        </div>
                        <div class="single-mobile-header-info">
                            <a href="tel:{{Setting('phone')}}">{{phone(Setting('phone'))}}</a>
                        </div>
                        <!-- Button trigger modal -->

                    </div>
                    <div class="mobile-social-icon">
                        <h5 class="mb-15 text-grey-4">ما را دنبال کنید</h5>
                        <a href="#"><img src="{{asset('/assets/imgs/theme/icons/icon-instagram.svg')}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
