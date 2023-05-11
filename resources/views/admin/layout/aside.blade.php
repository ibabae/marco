<aside class="navbar-aside" id="offcanvas_aside">
    <div class="aside-top">
        <a href="{{route('home')}}" class="brand-wrap">
            <img src="@if(Setting('logo')!=''){{Setting('logo')}}@else{{asset('images/logo.png')}}@endif" width="40" class="logo" alt="{{Setting('title')}}">
        </a>
        <div>
            <button class="btn btn-icon btn-aside-minimize"> <i class="text-muted material-icons md-menu_open"></i> </button>
        </div>
    </div>
    <nav>
        <ul class="menu-aside">
            <li class="menu-item active">
                <a class="menu-link" href="{{route('panel')}}"> <i class="icon material-icons md-home"></i>
                    <span class="text">داشبورد</span>
                </a>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link" href="{{route('product.list')}}"> <i class="icon material-icons md-person"></i>
                    <span class="text">محصولات</span>
                </a>
                <div class="submenu" @if(Route::is('product.list') OR Route::is('product.add') OR Route::is('product.edit') OR Route::is('category.list')) style="display: block" @endif>
                    <a href="{{route('product.list')}}">لیست محصولات</a>
                    <a href="{{route('product.add')}}">افزودن محصول</a>
                    <a href="{{route('category.list')}}">دسته ها</a>
                </div>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link" href="page-orders-1.html"> <i class="icon material-icons md-shopping_cart"></i>
                    <span class="text">سفارشات</span>
                </a>
                <div class="submenu" @if(Route::is('order.list') OR Route::is('order.view')) style="display: block" @endif>
                    <a href="{{route('order.list')}}">سفارشات</a>
                </div>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link" href="page-sellers-cards.html"> <i class="icon material-icons md-store"></i>
                    <span class="text">کاربران</span>
                </a>
                <div class="submenu" @if(Route::is('user.list') OR Route::is('user.view')) style="display: block" @endif>
                    <a href="{{route('user.list')}}">کاربران</a>
                </div>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link" href="page-transactions-1.html"> <i class="icon material-icons md-monetization_on"></i>
                    <span class="text">تراکنش ها</span>
                </a>
                <div class="submenu" @if(Route::is('transaction.list')) style="display: block" @endif>
                    <a href="{{route('transaction.list')}}">تراکنش ها</a>
                    {{-- <a href="page-transactions-2.html">Transaction 2</a> --}}
                </div>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link" href="#"> <i class="icon material-icons md-pages"></i>
                    <span class="text">صفحات</span>
                </a>
                <div class="submenu">
                    <a href="{{route('page.list')}}">صفحات</a>
                    <a href="{{route('page.add')}}">افزودن صفحه</a>
                </div>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link" href="#"> <i class="icon material-icons md-pages"></i>
                    <span class="text">اسلایدر</span>
                </a>
                <div class="submenu">
                    <a href="{{route('slide.list')}}">اسلایدر</a>
                    <a href="{{route('slide.add')}}">افزودن اسلاید</a>
                </div>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link" href="{{route('panel.contact')}}"> <i class="icon material-icons md-comment"></i>
                    <span class="text">ارتباطات</span>
                </a>
                <div class="submenu" @if(Route::is('panel.contact') OR Route::is('panel.contact.view') OR Route::is('panel.comment') OR Route::is('panel.comment.view') OR Route::is('panel.support') OR Route::is('panel.support.view')) style="display: block" @endif>
                    <a href="{{route('panel.contact')}}" @if(Route::is('panel.contact') OR Route::is('panel.contact.view')) class="fw-bolder" @endif>تماس ها</a>
                    <a href="{{route('panel.comment')}}" @if(Route::is('panel.comment') OR Route::is('panel.comment.view')) class="fw-bolder" @endif>نظرات</a>
                    <a href="{{route('panel.support')}}">پشتیبانی</a>
                </div>

            </li>
            {{-- <li class="menu-item">
                <a class="menu-link" href="page-brands.html"> <i class="icon material-icons md-stars"></i>
                    <span class="text">Brands</span>
                </a>
            </li> --}}
        </ul>
        <hr>
        <ul class="menu-aside">
            <li class="menu-item has-submenu">
                <a class="menu-link" href="#"> <i class="icon material-icons md-settings"></i>
                    <span class="text">تنظیمات</span>
                </a>
                <div class="submenu">
                    <a href="{{route('settings')}}">تنظیمات عمومی</a>
                    <a href="{{route('settings.fiscal')}}">تنظیمات مالی</a>
                    <a href="{{route('colors')}}">رنگ ها</a>
                    <a href="{{route('menus')}}">فهرست ها</a>
                    <a href="{{route('sizes')}}">سایز ها</a>
                </div>
            </li>
        </ul>
    </nav>
</aside>