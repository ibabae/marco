<div class="col-md-4">
    <div class="dashboard-menu">
        <ul class="nav flex-column" role="tablist">
            <li class="nav-item">
                <a class="nav-link @if(Route::is('account')) active @endif" href="{{route('account')}}" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders ms-10"></i>داشبورد</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(Route::is('account.orders')) active @endif" href="{{route('account.orders')}}" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag ms-10"></i>سفارشات</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link @if(Route::is('account.track')) active @endif" href="{{route('account.track')}}" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check ms-10"></i>پیگیری سفارش</a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link @if(Route::is('account.address')) active @endif" href="{{route('account.address')}}" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker ms-10"></i>آدرس ها</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(Route::is('account.profile')) active @endif" href="{{route('account.profile')}}" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user ms-10"></i>جزئیات حساب</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-danger" href="{{route('logout')}}"><i class="fi-rs-sign-out ms-10 text-danger"></i>خروج</a>
            </li>
        </ul>
    </div>
</div>
