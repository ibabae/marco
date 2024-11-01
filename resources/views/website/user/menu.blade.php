<div class="col-md-4">
    <div class="dashboard-menu">
        <ul class="nav flex-column" role="tablist">
            <li class="nav-item">
                <a class="nav-link @if(Route::is('user.account.index')) active @endif" href="{{route('user.account.index')}}" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-home ms-1"></i>خلاصه فعالیت ها</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(Route::is('user.order.index')) active @endif" href="{{route('user.order.index')}}" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag ms-1"></i>سفارشات</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link @if(Route::is('account.track')) active @endif" href="{{route('account.track')}}" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check ms-1"></i>پیگیری سفارش</a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link @if(Route::is('user.address.index')) active @endif" href="{{route('user.address.index')}}" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker ms-1"></i>آدرس ها</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-comment ms-1"></i>دیدگاه ها و پرسش ها</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-comment ms-1"></i>پیام ها</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-clock ms-1"></i>بازدید ها</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(Route::is('user.profile.index')) active @endif" href="{{route('user.profile.index')}}" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user ms-1"></i>اطلاعات حساب کاربری</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-danger" href="{{route('user.account.logout')}}"><i class="fi-rs-sign-out ms-1 text-danger"></i>خروج</a>
            </li>
        </ul>
    </div>
</div>
