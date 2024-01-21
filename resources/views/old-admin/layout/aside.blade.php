<aside class="navbar-aside" id="offcanvas_aside">
    <div class="aside-top">
        <a href="{{route('home')}}" class="brand-wrap">
            <img src="@if(Setting('logo')!=''){{Setting('logo')}}@else{{asset('images/logo.png')}}@endif" class="logo" alt="{{Setting('title')}}">
        </a>
        <div>
            <button class="btn btn-icon btn-aside-minimize"> <i class="text-muted material-icons md-menu_open"></i> </button>
        </div>
    </div>
    <nav>
        <ul class="menu-aside">
            <li class="menu-item @if(Route::is('old.panel')){{'active'}}@endif">
                <a class="menu-link" href="{{route('old.panel')}}"> <i class="icon material-icons md-home"></i>
                    <span class="text">داشبورد</span>
                </a>
            </li>
            <li class="menu-item has-submenu @if(Route::is('old.product.list') OR Route::is('old.product.add') OR Route::is('old.category.list')){{'active'}}@endif">
                <a class="menu-link" href="{{route('old.product.list')}}"> <i class="icon material-icons md-person"></i>
                    <span class="text">محصولات</span>
                </a>
                <div class="submenu" @if(Route::is('old.product.list') OR Route::is('old.product.add') OR Route::is('old.product.edit') OR Route::is('old.category.list')) style="display: block" @endif>
                    <a class="@if(Route::is('old.product.list')){{'active'}}@endif" href="{{route('old.product.list')}}">لیست محصولات</a>
                    <a class="@if(Route::is('old.product.add')){{'active'}}@endif" href="{{route('old.product.add')}}">افزودن محصول</a>
                    <a class="@if(Route::is('old.category.list')){{'active'}}@endif" href="{{route('old.category.list')}}">دسته ها</a>
                </div>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link" href="page-orders-1.html"> <i class="icon material-icons md-shopping_cart"></i>
                    <span class="text">سفارشات</span>
                </a>
                <div class="submenu" @if(Route::is('old.order.list') OR Route::is('old.order.view')) style="display: block" @endif>
                    <a href="{{route('old.order.list')}}">سفارشات</a>
                </div>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link" href="page-sellers-cards.html"> <i class="icon material-icons md-store"></i>
                    <span class="text">کاربران</span>
                </a>
                <div class="submenu" @if(Route::is('old.user.list') OR Route::is('old.user.view')) style="display: block" @endif>
                    <a href="{{route('old.user.list')}}">کاربران</a>
                </div>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link" href="page-transactions-1.html"> <i class="icon material-icons md-monetization_on"></i>
                    <span class="text">تراکنش ها</span>
                </a>
                <div class="submenu" @if(Route::is('old.transaction.list')) style="display: block" @endif>
                    <a href="{{route('old.transaction.list')}}">تراکنش ها</a>
                    {{-- <a href="page-transactions-2.html">Transaction 2</a> --}}
                </div>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link" href="#"> <i class="icon material-icons md-pages"></i>
                    <span class="text">صفحات</span>
                </a>
                <div class="submenu">
                    <a href="{{route('old.page.list')}}">صفحات</a>
                    <a href="{{route('old.page.add')}}">افزودن صفحه</a>
                </div>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link" href="#"> <i class="icon material-icons md-pages"></i>
                    <span class="text">اسلایدر</span>
                </a>
                <div class="submenu">
                    <a href="{{route('old.slide.list')}}">اسلایدر</a>
                    <a href="{{route('old.slide.add')}}">افزودن اسلاید</a>
                </div>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link" href="{{route('old.panel.contact')}}"> <i class="icon material-icons md-comment"></i>
                    <span class="text">ارتباطات</span>
                </a>
                <div class="submenu" @if(Route::is('old.panel.contact') OR Route::is('old.panel.contact.view') OR Route::is('old.panel.comment') OR Route::is('old.panel.comment.view') OR Route::is('old.panel.support') OR Route::is('old.panel.support.view')) style="display: block" @endif>
                    <a href="{{route('old.panel.contact')}}" @if(Route::is('old.panel.contact') OR Route::is('old.panel.contact.view')) class="fw-bolder" @endif>تماس ها</a>
                    <a href="{{route('old.panel.comment')}}" @if(Route::is('old.panel.comment') OR Route::is('old.panel.comment.view')) class="fw-bolder" @endif>نظرات</a>
                    <a href="{{route('old.panel.support')}}">پشتیبانی</a>
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
                    <a href="{{route('old.settings')}}">تنظیمات عمومی</a>
                    <a href="{{route('old.settings.fiscal')}}">تنظیمات مالی</a>
                    <a href="{{route('old.colors')}}">رنگ ها</a>
                    <a href="{{route('old.menus')}}">فهرست ها</a>
                    <a href="{{route('old.sizes')}}">سایز ها</a>
                </div>
            </li>
        </ul>
    </nav>
</aside>
