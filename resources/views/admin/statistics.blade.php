@extends('admin.master')
@section('breadcrumbs')
<div class="header-body-left">

    <h3 class="page-title">داشبورد آمار سایت</h3>

    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">داشبورد آمار سایت</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->

</div>

@endsection

@section('main-content')
<div class="row">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="font-weight-bold m-b-10 line-height-30 primary-font">3,605</h2>
                        <h6 class="font-size-13 mb-2 text-primary font-weight-bold primary-font">تعداد کلیک</h6>
                        <p class="m-0 small text-muted">لورم ایپسوم متن ساختگی با تولید</p>
                    </div>
                    <div>
                        <span class="dashboard-pie-1">2/5</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="font-weight-bold m-b-10 line-height-30 primary-font">3,137</h2>
                        <h6 class="font-size-13 mb-2 text-success font-weight-bold primary-font">تعداد بازدید</h6>
                        <p class="m-0 small text-muted">لورم ایپسوم متن ساختگی با تولید</p>
                    </div>
                    <div>
                        <span class="dashboard-pie-2">4/5</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="font-weight-bold m-b-10 line-height-30 primary-font">8,765</h2>
                        <h6 class="font-size-13 mb-2 text-warning font-weight-bold primary-font">مجموع تبدیل</h6>
                        <p class="m-0 small text-muted">لورم ایپسوم متن ساختگی با تولید</p>
                    </div>
                    <div>
                        <span class="dashboard-pie-3">1/5</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="font-weight-bold m-b-10 line-height-30 primary-font">68%</h2>
                        <h6 class="font-size-13 mb-2 text-info font-weight-bold primary-font">نرخ بارگذاری صفحه</h6>
                        <p class="m-0 small text-muted">لورم ایپسوم متن ساختگی با تولید</p>
                    </div>
                    <div>
                        <span class="dashboard-pie-4">2/5</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex mb-3 justify-content-between">
                    <div>
                        <h6 class="card-title mb-2">نمودار بازدیدکنندگان سایت</h6>
                    </div>
                    <div class="reportrange btn btn-light btn-sm mt-1 mt-md-0">
                        <i class="ti-calendar mr-2"></i>
                        <span></span>
                        <i class="ti-angle-down ml-2"></i>
                    </div>
                </div>
                <div class="d-lg-none d-sm-block mb-4"></div>
                <canvas id="users-chart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="m-b-30">
                    <h6 class="text-muted font-size-13 d-flex justify-content-between m-b-5 primary-font">
                        <span>کاربران جدید</span>
                        <span>65% دستیابی به هدف</span>
                    </h6>
                    <p class="font-size-16 m-b-10 font-weight-bolder">13,596</p>
                    <div class="progress" style="height: 5px">
                        <div class="progress-bar bg-success-bright" role="progressbar" style="width: 42%;" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="m-b-30">
                    <h6 class="text-muted font-size-13 d-flex justify-content-between m-b-5 primary-font">
                        <span>بازدید صفحه</span>
                        <span>45% دستیابی به هدف</span>
                    </h6>
                    <p class="font-size-16 m-b-10 font-weight-bolder">43,596</p>
                    <div class="progress" style="height: 5px">
                        <div class="progress-bar bg-danger-bright" role="progressbar" style="width: 42%;" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="m-b-30">
                    <h6 class="text-muted font-size-13 d-flex justify-content-between m-b-5 primary-font">
                        <span>بارگذاری صفحه</span>
                        <span>20% دستیابی به هدف</span>
                    </h6>
                    <p class="font-size-16 m-b-10 font-weight-bolder">16,869</p>
                    <div class="progress" style="height: 5px">
                        <div class="progress-bar bg-warning-bright" role="progressbar" style="width: 42%;" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div>
                    <h6 class="text-muted font-size-13 d-flex justify-content-between m-b-5 primary-font">
                        <span>نرخ نوسان</span>
                        <span>85% دستیابی به هدف</span>
                    </h6>
                    <p class="font-size-16 m-b-10 font-weight-bolder">28.50%</p>
                    <div class="progress" style="height: 5px">
                        <div class="progress-bar bg-info-bright" role="progressbar" style="width: 42%;" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-3 col-lg-12">
        <div class="card">
            <div class="card-header">بازدیدهای کانال</div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-10 offset-1">
                        <canvas id="chart_demo_7" width="100%" height="100%"></canvas>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h6 class="font-size-13 text-muted mb-2 primary-font">ورود مستقیم</h6>
                        <div class="d-flex align-items-center">
                            <i class="fa fa-circle text-danger m-r-5 font-size-13"></i>
                            <h4 class="mb-0 primary-font">1.242</h4>
                        </div>
                    </div>
                    <div class="col-6">
                        <h6 class="font-size-13 text-muted mb-2 primary-font">ایمیل</h6>
                        <div class="d-flex align-items-center">
                            <i class="fa fa-circle text-info m-r-5 font-size-13"></i>
                            <h4 class="mb-0 primary-font">742</h4>
                        </div>
                    </div>
                    <div class="col-6 m-t-20">
                        <h6 class="font-size-13 text-muted mb-2 primary-font">ارجاع</h6>
                        <div class="d-flex align-items-center">
                            <i class="fa fa-circle text-warning m-r-5 font-size-13"></i>
                            <h4 class="mb-0 primary-font">442</h4>
                        </div>
                    </div>
                    <div class="col-6 m-t-20">
                        <h6 class="font-size-13 text-muted mb-2 primary-font">شبکه اجتماعی</h6>
                        <div class="d-flex align-items-center">
                            <i class="fa fa-circle text-success m-r-5 font-size-13"></i>
                            <h4 class="mb-0 primary-font">2.742</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-12">
        <div class="card">
            <div class="card-header">آمار دستگاه ها</div>
            <div class="card-body">
                <div class="m-l-15">
                    <div class="row">
                        <div class="col-4">
                            <div class="d-flex">
                                <i class="fa fa-circle text-primary m-r-5 m-t-5 font-size-13"></i>
                                <div>
                                    <h4 class="mb-1 primary-font">1,902</h4>
                                    <h6 class="text-muted font-size-13 primary-font">موبایل</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-flex">
                                <i class="fa fa-circle text-success m-r-5 m-t-5 font-size-13"></i>
                                <div>
                                    <h4 class="mb-1 primary-font">1,202</h4>
                                    <h6 class="text-muted font-size-13 primary-font">دسکتاپ</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-flex">
                                <i class="fa fa-circle text-warning m-r-5 m-t-5 font-size-13"></i>
                                <div>
                                    <h4 class="mb-1 primary-font">365</h4>
                                    <h6 class="text-muted font-size-13 primary-font">سایر</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <canvas id="device_session_chart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-12">
        <div class="card">
            <div class="card-header">بالاترین منبع ترافیک</div>
            <div class="card-body text-center">
                <h1 class="font-size-40 font-weight-bold primary-font line-height-50 m-b-10">30,201</h1>
                <h6 class="font-size-13 m-b-0 primary-font">جستجوگر وب</h6>
                <p class="small m-t-b-15 text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون</p>
                <div class="row mb-4">
                    <div class="col-6">
                        <h2 class="text-success font-weight-bold primary-font line-height-30 mb-1">%20</h2>
                        <small class="font-size-13">دسکتاپ</small>
                    </div>
                    <div class="col-6">
                        <h2 class="text-warning font-weight-bold primary-font line-height-30 mb-1">%80</h2>
                        <small class="font-size-13">موبایل</small>
                    </div>
                </div>
                <button class="btn btn-outline-primary btn-uppercase">آشنایی بیشتر</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">مجموع بازدید</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tr class="font-size-13 text-muted">
                            <th>لینک</th>
                            <th>عنوان صفحه</th>
                            <th>درصد (%)</th>
                            <th class="text-right">مقدار</th>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">
                                    <i class="fa fa-external-link"></i>
                                </a>
                            </td>
                            <td>صفحه اصلی</td>
                            <td>
                                <div class="progress" style="height: 5px">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 65%;" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                            <td class="text-right">65.35%</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">
                                    <i class="fa fa-external-link"></i>
                                </a>
                            </td>
                            <td>درباره من</td>
                            <td>
                                <div class="progress" style="height: 5px">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 51%;" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                            <td class="text-right">51.20%</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">
                                    <i class="fa fa-external-link"></i>
                                </a>
                            </td>
                            <td>محصولات</td>
                            <td>
                                <div class="progress" style="height: 5px">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 39%;" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                            <td class="text-right">39.10%</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">
                                    <i class="fa fa-external-link"></i>
                                </a>
                            </td>
                            <td>دسته‌بندی ها</td>
                            <td>
                                <div class="progress" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 40%;" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                            <td class="text-right">40%</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">
                                    <i class="fa fa-external-link"></i>
                                </a>
                            </td>
                            <td>تماس</td>
                            <td>
                                <div class="progress" style="height: 5px">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 80%;" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                            <td class="text-right">80%</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"> مرورگرهای بازدیدکنندگان</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tr class="font-size-13 text-muted">
                            <th></th>
                            <th>مرورگر</th>
                            <th>جلسات</th>
                            <th>نرخ نوسان</th>
                            <th class="text-right">نرخ تبدیل</th>
                        </tr>
                        <tr>
                            <td>
                                <i class="fa fa-chrome"></i>
                            </td>
                            <td>گوگل کروم</td>
                            <td>13,41</td>
                            <td>40.95%</td>
                            <td class="text-right">19.45%</td>
                        </tr>
                        <tr>
                            <td>
                                <i class="fa fa-firefox"></i>
                            </td>
                            <td>فایرفاکس</td>
                            <td>13,41</td>
                            <td>40.95%</td>
                            <td class="text-right">19.45%</td>
                        </tr>
                        <tr>
                            <td>
                                <i class="fa fa-edge"></i>
                            </td>
                            <td>اج</td>
                            <td>13,41</td>
                            <td>40.95%</td>
                            <td class="text-right">19.45%</td>
                        </tr>
                        <tr>
                            <td>
                                <i class="fa fa-safari"></i>
                            </td>
                            <td>سافاری</td>
                            <td>13,41</td>
                            <td>40.95%</td>
                            <td class="text-right">19.45%</td>
                        </tr>
                        <tr>
                            <td>
                                <i class="fa fa-opera"></i>
                            </td>
                            <td>اوپرا</td>
                            <td>13,41</td>
                            <td>40.95%</td>
                            <td class="text-right">19.45%</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
    <!-- Dashboard scripts -->
	<script src="{{asset('admin-assets/js/examples/dashboard.js')}}"></script>
@endsection
