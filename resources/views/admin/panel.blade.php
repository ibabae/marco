@extends('admin.master')
@section('header')
    	<!-- Datepicker -->
	<link rel="stylesheet" href="{{asset('vendors/datepicker/daterangepicker.css')}}">

	<!-- Slick -->
	<link rel="stylesheet" href="{{asset('vendors/slick/slick.css')}}">
	<link rel="stylesheet" href="{{asset('vendors/slick/slick-theme.css')}}">

	<!-- Vmap -->
	<link rel="stylesheet" href="{{asset('vendors/vmap/jqvmap.min.css')}}">

@endsection
@section('main-content')
<div class="card">
    <div class="card-body">
        <div class="card-title d-flex justify-content-between align-items-center">
            <h6>شبکه های فروش</h6>
            <div class="slick-single-arrows">
                <a class="btn btn-outline-light btn-sm">
                    <i class="ti-angle-right"></i>
                </a>
                <a class="btn btn-outline-light btn-sm">
                    <i class="ti-angle-left"></i>
                </a>
            </div>
        </div>
        <div class="row slick-single-item">
            <div class="col-xl-3 col-lg-6 col-lg-6 col-sm-12">
                <div class="card border mb-0 mx-1">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div>
                                <div class="icon-block icon-block-sm bg-danger icon-block-floating me-2">
                                    <i class="fa fa-money"></i>
                                </div>
                            </div>
                            <span class="font-size-13">همه</span>
                            <h2 class="mb-0 ms-auto font-weight-bold text-danger primary-font line-height-30">2,587</h2>
                        </div>
                        <div class="progress" style="height: 5px">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 71%" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-lg-6 col-sm-12">
                <div class="card border mb-0 mx-1">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div>
                                <div class="icon-block icon-block-sm bg-success icon-block-floating me-2">
                                    <i class="fa fa-globe"></i>
                                </div>
                            </div>
                            <span class="font-size-13">مستقیم</span>
                            <h2 class="mb-0 ms-auto font-weight-bold text-success primary-font line-height-30">562</h2>
                        </div>
                        <div class="progress" style="height: 5px">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 39%" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-lg-6 col-sm-12">
                <div class="card border mb-0 mx-1">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <div class="icon-block icon-block-sm bg-info icon-block-floating me-2">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                            <span class="font-size-13">تلفن</span>
                            <h2 class="mb-0 ms-auto font-weight-bold text-info primary-font line-height-30">256</h2>
                        </div>
                        <div class="progress" style="height: 5px">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-lg-6 col-sm-12">
                <div class="card border mb-0 mx-1">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <div class="icon-block icon-block-sm bg-facebook icon-block-floating me-2">
                                    <i class="fa fa-facebook"></i>
                                </div>
                            </div>
                            <span class="font-size-13">فیسبوک</span>
                            <h2 class="mb-0 ms-auto font-weight-bold text-facebook primary-font line-height-30">147</h2>
                        </div>
                        <div class="progress" style="height: 5px">
                            <div class="progress-bar bg-facebook" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-lg-6 col-sm-12">
                <div class="card border mb-0 mx-1">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <div class="icon-block icon-block-sm bg-whatsapp icon-block-floating me-2">
                                    <i class="fa fa-whatsapp"></i>
                                </div>
                            </div>
                            <span class="font-size-13">واتس اپ</span>
                            <h2 class="mb-0 ms-auto font-weight-bold text-whatsapp primary-font line-height-30">874</h2>
                        </div>
                        <div class="progress" style="height: 5px">
                            <div class="progress-bar bg-whatsapp" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-lg-6 col-sm-12">
                <div class="card border mb-0 mx-1">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <div class="icon-block icon-block-sm bg-instagram icon-block-floating me-2">
                                    <i class="fa fa-instagram"></i>
                                </div>
                            </div>
                            <span class="font-size-13">اینستاگرام</span>
                            <h2 class="mb-0 ms-auto font-weight-bold text-instagram primary-font line-height-30">1,968</h2>
                        </div>
                        <div class="progress" style="height: 5px">
                            <div class="progress-bar bg-instagram" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-lg-6 col-sm-12">
                <div class="card border mb-0 mx-1">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <div class="icon-block icon-block-sm bg-google icon-block-floating me-2">
                                    <i class="fa fa-instagram"></i>
                                </div>
                            </div>
                            <span class="font-size-13">گوگل</span>
                            <h2 class="mb-0 ms-auto font-weight-bold text-google primary-font line-height-30">3654</h2>
                        </div>
                        <div class="progress" style="height: 5px">
                            <div class="progress-bar bg-google" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-lg-6 col-sm-12">
                <div class="card border mb-0 mx-1">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <div class="icon-block icon-block-sm bg-warning icon-block-floating me-2">
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <span class="font-size-13">سایر</span>
                            <h2 class="mb-0 ms-auto font-weight-bold text-warning primary-font line-height-30">206</h2>
                        </div>
                        <div class="progress" style="height: 5px">
                            <div class="progress-bar bg-warning-gradient" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-6 col-md-12">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title m-b-20">گزارشات</h6>
                <div class="row m-b-20">
                    <div class="col-sm-6 text-primary mb-2 mb-sm-0">
                        <h5 class="font-size-23 primary-font line-height-36 m-b-5">56,234,076 <span class="font-size-16">تومان</span></h5>
                        <h6 class="font-size-13 primary-font">مجموع فروش</h6>
                    </div>
                    <div class="col-sm-6 text-success">
                        <h5 class="font-size-23 primary-font line-height-36 m-b-5">620,076 <span class="font-size-16">تومان</span></h5>
                        <h6 class="font-size-13 primary-font">میانگین</h6>
                    </div>
                </div>
                <canvas id="chart_demo_1"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="card">
                    <div class="card-header">کل مشتریان</div>
                    <div class="card-body text-center">
                        <div class="mb-2">
                            <span class="bar-1">2,5,9,6,5,2,4,3,7,5</span>
                        </div>
                        <div class="font-size-40 font-weight-bold text-primary">1,241</div>
                        <p class="m-b-0">
                            <i class="fa fa-caret-up text-primary m-r-5"></i> 23% افزایش در هفته پیش
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-12">
                <div class="card">
                    <div class="card-header">میانگین ارزش سفارش</div>
                    <div class="card-body text-center">
                        <div class="mb-2">
                            <span class="bar-3">2,5,9,6,5,2,4,3,7,5</span>
                        </div>
                        <div class="font-size-40 font-weight-bold text-success">732,520 <span class="font-size-20">تومان</span></div>
                        <p class="m-b-0">
                            <i class="fa fa-caret-down text-danger m-r-5"></i> 4 واحد کمتر از هفته پیش
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                شبکه های فروش
                <ul class="list-inline">
                    <li class="list-inline-item mb-0">
                        <a href="#" class="js-card-refresh link-1">
                            <i class="fa fa-refresh"></i>
                        </a>
                    </li>
                    <li class="list-inline-item mb-0">
                        <div class="dropdown">
                            <a href="#" class="link-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right primary-font">
                                <a href="#" class="dropdown-item">عمل</a>
                                <a href="#" class="dropdown-item">عمل دیگر</a>
                                <a href="#" class="dropdown-item">یک عمل دیگر</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="mb-4 text-center">
                    <div class="position-relative">
                        <div id="sales-circle-graphic" class="circle"></div>
                        <div class="position-absolute a-0 d-flex flex-column align-items-center justify-content-center">
                            <h3 class="mb-1 line-height-20 primary-font">65%</h3>
                            <span class="font-size-13">میانگین</span>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <h6 class="primary-font mb-1">گوگل</h6>
                    <div class="d-flex align-items-center">
                        <div class="progress flex-grow-1" style="height: 5px">
                            <div class="progress-bar bg-google" role="progressbar" style="width: 42%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="small m-l-10">42%</span>
                    </div>
                </div>
                <div class="mb-4">
                    <h6 class="primary-font mb-1">اینستاگرام</h6>
                    <div class="d-flex align-items-center">
                        <div class="progress flex-grow-1" style="height: 5px">
                            <div class="progress-bar bg-instagram" role="progressbar" style="width: 34%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="small m-l-10">34%</span>
                    </div>
                </div>
                <div class="mb-4">
                    <h6 class="primary-font mb-1">واتس اپ</h6>
                    <div class="d-flex align-items-center">
                        <div class="progress flex-grow-1" style="height: 5px">
                            <div class="progress-bar bg-whatsapp" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="small m-l-10">60%</span>
                    </div>
                </div>
                <div class="mb-4">
                    <h6 class="primary-font mb-1">فیسبوک</h6>
                    <div class="d-flex align-items-center">
                        <div class="progress flex-grow-1" style="height: 5px">
                            <div class="progress-bar bg-facebook" role="progressbar" style="width: 20%;" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="small m-l-10">20%</span>
                    </div>
                </div>
                <div>
                    <h6 class="primary-font mb-1">لینکدین</h6>
                    <div class="d-flex align-items-center">
                        <div class="progress flex-grow-1" style="height: 5px">
                            <div class="progress-bar bg-linkedin" role="progressbar" style="width: 30%;" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="small m-l-10">30%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-12">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">فروش های منطقه‌ای</h6>
                <canvas id="chart_demo_9"></canvas>
                <div class="row">
                    <div class="col-sm-4 mt-3 mb-2 mb-sm-0">
                        <h5 class="font-size-23 text-primary font-weight-bold primary-font line-height-36 mb-1">4,234,076 <small>تومان</small></h5>
                        <h6 class="font-size-13 mb-0 primary-font">مجموع فروش</h6>
                    </div>
                    <div class="col-sm-4 mt-3 mb-2 mb-sm-0">
                        <h5 class="font-size-23 text-warning font-weight-bold primary-font line-height-36 mb-1">620,076 <small>تومان</small></h5>
                        <h6 class="font-size-13 mb-0 primary-font">میانگین</h6>
                    </div>
                    <div class="col-sm-4 mt-3">
                        <h5 class="font-size-23 text-danger font-weight-bold primary-font line-height-36 mb-1">20,076 <small>تومان</small></h5>
                        <h6 class="font-size-13 mb-0 primary-font">بازگشت</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-body d-flex justify-content-between align-items-center flex-sm-row">
                    <span class="mb-3 mb-sm-0 me-sm-3 d-flex align-items-center">
                        <span class="icon-block bg-success icon-block-floating icon-block-sm m-r-10 flex-shrink-0">
                            <i class="fa fa-download font-size-16"></i>
                        </span>
                        <span class="line-height-26">گزارش آماده شد. هم اکنون می‌توانید آن را دریافت کنید</span>
                    </span>
                    <a href="#" class="btn btn-sm btn-light btn-uppercase">دریافت</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">فروش محصولات</div>
            <div class="card-body">
                <div class="m-b-20 d-flex align-items-center">
                    <div class="icon-block icon-block-outline-success icon-block-floating m-r-10">
                        <i class="fa fa-cube font-size-18"></i>
                    </div>
                    <h2 class="m-0 font-weight-bold primary-font">65,353</h2>
                </div>
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <h3 class="m-b-10 primary-font">
                            4,324
                            <small class="font-size-13 m-l-5">مجموع قیمت</small>
                        </h3>
                        <div class="progress m-b-10" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <i class="fa fa-caret-up text-success"></i> 10% افزایش
                    </div>
                    <div class="col-sm-6">
                        <h3 class="m-b-10 primary-font">
                            2,214
                            <small class="font-size-13 m-l-5">مجموع موجودی</small>
                        </h3>
                        <div class="progress m-b-10" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <i class="fa fa-caret-down text-danger"></i> 14% کاهش
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">وضعیت خرید</div>
            <div class="card-body">
                <div class="m-b-20 d-lg-flex justify-content-between align-items-center">
                    <ul class="list-inline m-l-5">
                        <li class="list-inline-item font-size-13">
                            <i class="fa fa-circle text-success m-r-5"></i> موفقیت
                        </li>
                        <li class="list-inline-item font-size-13">
                            <i class="fa fa-circle text-danger m-r-5"></i> بازگشت
                        </li>
                    </ul>
                    <div class="reportrange btn btn-outline-light">
                        <i class="ti-calendar m-r-10"></i>
                        <span></span>
                        <i class="ti-angle-down m-l-10"></i>
                    </div>
                    <div class="d-lg-none d-sm-block mb-4"></div>
                </div>
                <canvas id="chart_demo_3"></canvas>
                <div class="row m-t-25">
                    <div class="col-xl-6 col-lg-12">
                        <div class="card card-body text-success bg-success-bright text-center mb-2">
                            <h5 class="font-size-23 font-weight-bold primary-font line-height-30 m-b-10">234,076 <span class="font-size-16">تومان</span></h5>
                            <h6 class="font-size-13 m-b-0 primary-font">مجموع فروش</h6>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12">
                        <div class="card card-body bg-danger-bright text-danger text-center mb-2">
                            <h5 class="font-size-23 font-weight-bold primary-font line-height-30 m-b-10">20,076 <span class="font-size-16">تومان</span></h5>
                            <h6 class="font-size-13 m-b-0 primary-font">بازگشت</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">درآمد های اخیر شما</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="d-flex align-items-center m-b-20">
                            <div class="icon-block m-r-15 icon-block-lg icon-block-outline-success text-success">
                                <i class="fa fa-bar-chart"></i>
                            </div>
                            <div>
                                <h6 class="font-size-13 primary-font">سود ناخالص</h6>
                                <h4 class="m-b-0 primary-font line-height-28">1,958,104 تومان</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex align-items-center m-b-20">
                            <div class="icon-block m-r-15 icon-block-lg icon-block-outline-danger  text-danger">
                                <i class="fa fa-hand-lizard-o"></i>
                            </div>
                            <div>
                                <h6 class="font-size-13 primary-font">کسر مالیات</h6>
                                <h4 class="m-b-0 primary-font line-height-28">234,769 تومان</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex align-items-center m-b-20">
                            <div class="icon-block m-r-15 icon-block-lg icon-block-outline-warning text-warning">
                                <i class="fa fa-dollar"></i>
                            </div>
                            <div>
                                <h6 class="font-size-13 primary-font">سود خالص</h6>
                                <h4 class="m-b-0 primary-font line-height-28">1,608,469 تومان</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table m-b-0">
                        <thead>
                            <tr>
                                <th>تاریخ</th>
                                <th>تعداد فروش</th>
                                <th>سود ناخالص</th>
                                <th>کسر مالیات</th>
                                <th class="text-right">سود خالص</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1398/03/15</td>
                                <td>1,050</td>
                                <td class="text-success">+ 32,580 تومان</td>
                                <td class="text-danger">- 3,023 تومان</td>
                                <td class="text-right">28,670 تومان</td>
                            </tr>
                            <tr>
                                <td>1398/03/14</td>
                                <td>780</td>
                                <td class="text-success">+ 32,580 تومان</td>
                                <td class="text-danger">- 3,023 تومان</td>
                                <td class="text-right">28,670 تومان</td>
                            </tr>
                            <tr>
                                <td>1398/03/13</td>
                                <td>1.980</td>
                                <td class="text-success">+ 32,580 تومان</td>
                                <td class="text-danger">- 3,023 تومان</td>
                                <td class="text-right">28,670 تومان</td>
                            </tr>
                            <tr>
                                <td>1398/03/12</td>
                                <td>300</td>
                                <td class="text-success">+ 32,580 تومان</td>
                                <td class="text-danger">- 3,023 تومان</td>
                                <td class="text-right">28,670 تومان</td>
                            </tr>
                            <tr>
                                <td>1398/03/11</td>
                                <td>940</td>
                                <td class="text-success">+ 32,580 تومان</td>
                                <td class="text-danger">- 3,023 تومان</td>
                                <td class="text-right">28,670 تومان</td>
                            </tr>
                            <tr>
                                <td>1398/03/10</td>
                                <td>1.280</td>
                                <td class="text-success">+ 32,580 تومان</td>
                                <td class="text-danger">- 3,023 تومان</td>
                                <td class="text-right">28,670 تومان</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-6 col-md-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <span>توزیع درآمد</span>
                <div class="dropdown primary-font">
                    <a class="btn btn-outline-light btn-sm" href="#" data-toggle="dropdown">
                        آمریکا <i class="ti-angle-down m-l-5"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item">آمریکا</a>
                        <a href="#" class="dropdown-item">آلمان</a>
                        <a href="#" class="dropdown-item">ایران</a>
                        <a href="#" class="dropdown-item">ایتالیا</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="vmap_usa_en" style="height: 300px"></div>
                <div class="table-responsive">
                    <table class="table table-borderless m-b-0">
                        <thead>
                            <tr>
                                <th class="wd-40">استان ها</th>
                                <th class="wd-25 text-right">سفارشات</th>
                                <th class="wd-35 text-right">درآمد</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="tx-medium">تهران</td>
                                <td class="text-right">12,201</td>
                                <td class="text-right text-success">150,200 تومان</td>
                            </tr>
                            <tr>
                                <td class="tx-medium">تبریز</td>
                                <td class="text-right">11,950</td>
                                <td class="text-right text-success">138,910 تومان</td>
                            </tr>
                            <tr>
                                <td class="tx-medium">کرمان</td>
                                <td class="text-right">11,198</td>
                                <td class="text-right text-success">132,050 تومان</td>
                            </tr>
                            <tr>
                                <td class="tx-medium">مشهد</td>
                                <td class="text-right">9,885</td>
                                <td class="text-right text-success">127,762 تومان</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                مشتریان جدید
                <a href="#" class="js-card-refresh link-1">
                    <i class="fa fa-refresh"></i>
                </a>
            </div>
            <div class="card-body pt-2">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex align-items-center p-l-r-0">
                        <figure class="avatar avatar-sm avatar-state-success m-r-15">
                            <span class="avatar-title bg-primary rounded-circle">و</span>
                        </figure>
                        <div>
                            <h6 class="m-b-0 primary-font">تونی استارک</h6>
                            <small class="text-muted">مهندس</small>
                        </div>
                        <div class="dropdown ms-auto">
                            <a href="#" data-toggle="dropdown" class="btn btn-primary btn-sm" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">مشاهده</a>
                                <a href="#" class="dropdown-item">ارسال پیام</a>
                                <a href="#" class="dropdown-item">اختصاص دادن</a>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item d-flex align-items-center p-l-r-0">
                        <figure class="avatar avatar-sm avatar-state-success m-r-15">
                            <img src="admin-assets/media/image/avatar.jpg" class="rounded-circle" alt="image">
                        </figure>
                        <div>
                            <h6 class="m-b-0 primary-font">تونی استارک</h6>
                            <small class="text-muted">منابع انسانی</small>
                        </div>
                        <div class="dropdown ms-auto">
                            <a href="#" data-toggle="dropdown" class="btn btn-primary btn-sm" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">مشاهده</a>
                                <a href="#" class="dropdown-item">ارسال پیام</a>
                                <a href="#" class="dropdown-item">اختصاص دادن</a>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item d-flex align-items-center p-l-r-0">
                        <figure class="avatar avatar-sm avatar-state-success m-r-15">
                            <span class="avatar-title bg-primary rounded-circle">ج</span>
                        </figure>
                        <div>
                            <h6 class="m-b-0 primary-font">استیو راجرز</h6>
                            <small class="text-muted">مشاور املاک</small>
                        </div>
                        <div class="dropdown ms-auto">
                            <a href="#" data-toggle="dropdown" class="btn btn-primary btn-sm" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">مشاهده</a>
                                <a href="#" class="dropdown-item">ارسال پیام</a>
                                <a href="#" class="dropdown-item">اختصاص دادن</a>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item d-flex align-items-center p-l-r-0">
                        <figure class="avatar avatar-sm avatar-state-success m-r-15">
                            <span class="avatar-title bg-dark rounded-circle">ن‌پ</span>
                        </figure>
                        <div>
                            <h6 class="m-b-0 primary-font">جان اسنو</h6>
                            <small class="text-muted">مهندس</small>
                        </div>
                        <div class="dropdown ms-auto">
                            <a href="#" data-toggle="dropdown" class="btn btn-primary btn-sm" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">مشاهده</a>
                                <a href="#" class="dropdown-item">ارسال پیام</a>
                                <a href="#" class="dropdown-item">اختصاص دادن</a>
                            </div>
                        </div>
                    </li>
                </ul>
                <a href="#" class="btn btn-block text-center font-size-13 p-b-0">
                    مشاهده همه
                </a>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                لیست وظایف روزانه
                <a href="#" class="js-card-refresh link-1">
                    <i class="fa fa-refresh"></i>
                </a>
            </div>
            <div class="card-body">
                <div class="custom-control custom-checkbox-success custom-checkbox todo-item">
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label d-flex justify-content-between" for="customCheck1">لورم ایپسوم متن ساختگی با تولید
                        <small class="text-muted text-right font-size-13 m-l-10">13 تیر 1398</small>
                    </label>
                </div>
                <div class="custom-control custom-checkbox-success custom-checkbox-success custom-checkbox todo-item">
                    <input type="checkbox" class="custom-control-input" id="customCheck2" checked>
                    <label class="custom-control-label d-flex justify-content-between" for="customCheck2">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                        <small class="text-muted text-right font-size-13 m-l-10">25 دی 1398</small>
                    </label>
                </div>
                <div class="custom-control custom-checkbox-success custom-checkbox todo-item">
                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                    <label class="custom-control-label d-flex justify-content-between" for="customCheck3">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                        <small class="text-muted text-right font-size-13 m-l-10">13 تیر 1398</small>
                    </label>
                </div>
                <div class="custom-control custom-checkbox-success custom-checkbox todo-item">
                    <input type="checkbox" class="custom-control-input" id="customCheck4" checked>
                    <label class="custom-control-label d-flex justify-content-between" for="customCheck4">لورم ایپسوم متن ساختگی
                        <small class="text-muted text-right font-size-13 m-l-10">10 شهریور 1398</small>
                    </label>
                </div>
                <div class="custom-control custom-checkbox-success custom-checkbox todo-item">
                    <input type="checkbox" class="custom-control-input" id="customCheck5">
                    <label class="custom-control-label d-flex justify-content-between" for="customCheck5">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                        <small class="text-muted text-right font-size-13 m-l-10">13 تیر 1398</small>
                    </label>
                </div>
                <div class="custom-control custom-checkbox custom-checkbox-success todo-item">
                    <input type="checkbox" class="custom-control-input" id="customCheck6">
                    <label class="custom-control-label d-flex justify-content-between" for="customCheck6">لورم ایپسوم متن ساختگی با تولید
                        <small class="text-muted text-right font-size-13 m-l-10">27 مرداد 1398</small>
                    </label>
                </div>
                <div class="custom-control custom-checkbox-success custom-checkbox todo-item">
                    <input type="checkbox" class="custom-control-input" id="customCheck7" checked>
                    <label class="custom-control-label d-flex justify-content-between" for="customCheck7">لورم ایپسوم متن ساختگی با تولید سادگی
                        <small class="text-muted text-right font-size-13 m-l-10">13 تیر 1398</small>
                    </label>
                </div>
                <form class="mt-4">
                    <div class="input-group">
                        <input type="text" class="form-control" aria-label="Example text with button addon" placeholder="وظیفه جدید" aria-describedby="button-addon1">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button" id="button-addon1">افزودن</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                کاربران زیر مجموعه من
                <a href="#" class="js-card-refresh link-1">
                    <i class="fa fa-refresh"></i>
                </a>
            </div>
            <div class="card-body pt-2">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex align-items-center p-l-r-0">
                        <figure class="avatar avatar-sm m-r-15">
                            <span class="avatar-title bg-success rounded-circle">ی</span>
                        </figure>
                        <div>
                            <h6 class="m-b-0 primary-font">اما واتسون</h6>
                            <small class="text-muted">مهندس</small>
                        </div>
                        <span class="badge badge-danger ms-auto">رد شده</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center p-l-r-0">
                        <figure class="avatar avatar-sm m-r-15">
                            <span class="avatar-title bg-danger rounded-circle">ک</span>
                        </figure>
                        <div>
                            <h6 class="m-b-0 primary-font">تونی استارک</h6>
                            <small class="text-muted">منابع انسانی</small>
                        </div>
                        <span class="badge badge-success ms-auto">اتمام یافته</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center p-l-r-0">
                        <figure class="avatar avatar-sm m-r-15">
                            <span class="avatar-title bg-warning rounded-circle">آ</span>
                        </figure>
                        <div>
                            <h6 class="m-b-0 primary-font">استیو راجرز</h6>
                            <small class="text-muted">مشاور املاک</small>
                        </div>
                        <span class="badge badge-warning ms-auto">در انتظار</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center p-l-r-0">
                        <figure class="avatar avatar-sm m-r-15">
                            <span class="avatar-title bg-info rounded-circle">ل</span>
                        </figure>
                        <div>
                            <h6 class="m-b-0 primary-font">اولیور کوئین</h6>
                            <small class="text-muted">مهندس</small>
                        </div>
                        <span class="badge badge-success ms-auto">اتمام یافته</span>
                    </li>
                </ul>
                <a href="#" class="btn btn-block text-center font-size-13 p-b-0">
                    مشاهده همه
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
	<!-- Chartjs -->
	<script src="{{asset('vendors/charts/chartjs/chart.min.js')}}"></script>

	<!-- Circle progress -->
	<script src="{{asset('vendors/circle-progress/circle-progress.min.js')}}"></script>

	<!-- Peity -->
	<script src="{{asset('vendors/charts/peity/jquery.peity.min.js')}}"></script>
	<script src="{{asset('admin-assets/js/examples/charts/peity.js')}}"></script>

	<!-- Datepicker -->
	<script src="{{asset('vendors/datepicker/daterangepicker.js')}}"></script>

	<!-- Slick -->
	<script src="{{asset('vendors/slick/slick.min.js')}}"></script>

	<!-- Vamp -->
	<script src="{{asset('vendors/vmap/jquery.vmap.min.js')}}"></script>
	<script src="{{asset('vendors/vmap/maps/jquery.vmap.usa.js')}}"></script>
	<script src="{{asset('admin-assets/js/examples/vmap.js')}}"></script>

	<div class="colors">
		<!-- To use theme colors with Javascript -->
		<div class="bg-primary"></div>
		<div class="bg-primary-bright"></div>
		<div class="bg-secondary"></div>
		<div class="bg-secondary-bright"></div>
		<div class="bg-info"></div>
		<div class="bg-info-bright"></div>
		<div class="bg-success"></div>
		<div class="bg-success-bright"></div>
		<div class="bg-danger"></div>
		<div class="bg-danger-bright"></div>
		<div class="bg-warning"></div>
		<div class="bg-warning-bright"></div>
	</div>

    <!-- Dashboard scripts -->
	<script src="{{asset('admin-assets/js/examples/dashboard.js')}}"></script>
@endsection
