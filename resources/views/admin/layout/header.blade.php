<header class="main-header navbar">
    <div class="col-search">
        <form class="searchform" action="{{route('product.search')}}" method="GET">
            @csrf
            <div class="input-group">
                <input name="q" type="text" class="form-control" placeholder="جستجوی محصول">
                <button class="btn btn-light bg" type="button"> <i class="material-icons md-search"></i></button>
            </div>
            <!-- <datalist id="search_terms">
                <option value="Products">
                <option value="New orders">
                <option value="Apple iphone">
                <option value="Ahmed Hassan">
            </datalist> -->
        </form>
    </div>
    <div class="col-nav">
        <button class="btn btn-icon btn-mobile ms-auto" data-trigger="#offcanvas_aside"> <i class="material-icons md-apps"></i> </button>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link btn-icon" href="#">
                    <i class="material-icons md-notifications animation-shake"></i>
                    <span class="badge rounded-pill">3</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn-icon darkmode" href="#"> <i class="material-icons md-nights_stay"></i> </a>
            </li>
            <li class="nav-item">
                <a href="#" class="requestfullscreen nav-link btn-icon"><i class="material-icons md-cast"></i></a>
            </li>
            <li class="dropdown nav-item">
                <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount" aria-expanded="false"> <img class="img-xs rounded-circle" src="{{asset('images/blank.png')}}" alt="User"></a>
                <div class="dropdown-menu dropdown-menu-start" aria-labelledby="dropdownAccount">
                    <a class="dropdown-item" href="{{route('settings')}}"><i class="material-icons md-settings"></i>تنظیمات</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{route('logout')}}"><i class="material-icons md-exit_to_app"></i>خروج</a>
                </div>
            </li>
        </ul>
    </div>
</header>