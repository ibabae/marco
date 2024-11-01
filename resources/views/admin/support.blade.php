@extends('admin.master')

@section('main-content')
<div class="row">
    <div class="col-md-8">
        <div class="row">
            <div class="col-xl-6 col-lg-12 col-md-12">
                <div class="card card-body">
                    <div class="d-md-flex align-items-center">
                        <div class="position-relative me-md-3 text-center mb-3 mt-1 my-md-0">
                            <div id="circle-1" class="circle"></div>
                            <div class="position-absolute a-0 d-flex flex-column align-items-center justify-content-center">
                                <h3 class="mb-1 line-height-20 primary-font">65%</h3>
                                <span class="font-size-13 text-muted">دستیابی</span>
                            </div>
                        </div>
                        <div class="text-xs-center">
                            <h6 class="mb-1 primary-font">زمان رسیدگی به شکایت</h6>
                            <p class="text-muted m-b-10">
                                <small>میانگین زمان رسیدگی به شکایات.</small>
                            </p>
                            <h3 class="mb-0 primary-font line-height-28"><span>7د</span>:<span>32ث</span>
                                <small>/ هدف: <span>8د<span>:<span>0ث</span></small>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-md-12">
                <div class="card card-body">
                    <div class="d-md-flex align-items-center">
                        <div class="position-relative me-md-3 text-center mb-3 mt-1 my-md-0">
                            <div id="circle-2" class="circle"></div>
                            <div class="position-absolute a-0 d-flex flex-column align-items-center justify-content-center">
                                <h3 class="mb-1 line-height-20 primary-font">35%</h3>
                                <span class="font-size-13 text-muted">دستیابی</span>
                            </div>
                        </div>
                        <div class="text-xs-center">
                            <h6 class="mb-1 primary-font">میانگین سرعت پاسخ</h6>
                            <p class="text-muted m-b-10">
                                <small>سرعت عمل اعضای پشتیبانی را بسنجید.</small>
                            </p>
                            <h3 class="mb-0 primary-font line-height-28">0m:20s
                                <small>/ هدف: 0m:10s</small>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h6 class="card-title">وضعیت تیکت</h6>
                    <div class="dropdown">
                        <a class="btn btn-outline-light btn-sm" href="#" data-toggle="dropdown">
                            2019 <i class="ti-angle-down m-l-5"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item">2018</a>
                            <a href="#" class="dropdown-item">2017</a>
                        </div>
                    </div>
                </div>
                <div class="text-center mb-3">
                    <ul class="list-inline">
                        <li class="list-inline-item font-weight-bold font-size-13">
                            <i class="fa fa-circle text-primary me-1"></i> تیکت های در انتظار
                        </li>
                        <li class="list-inline-item font-weight-bold font-size-13">
                            <i class="fa fa-circle text-success me-1"></i> تیکت های حل شده
                        </li>
                        <li class="list-inline-item font-weight-bold font-size-13">
                            <i class="fa fa-circle text-danger me-1"></i> تیکت های جدید
                        </li>
                    </ul>
                </div>
                <canvas id="chart-ticket-status"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">امتیاز کل</div>
                    <div class="card-body">
                        <p class="text-muted">کیفیت عملکرد تیم پشتیبانی را بسنجید.</p>
                        <div class="d-flex align-items-end">
                            <h1 class="m-r-10 m-b-0 line-height-38 primary-font">4.2</h1>
                            <div class="font-size-18">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-muted"></i>
                            </div>
                        </div>
                        <hr class="m-b-0">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item p-t-b-10 p-l-r-0 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <strong class="m-r-20">5.0</strong>
                                    <div class="font-size-14">
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="m-r-20">3,230</div>
                                    <div>58%</div>
                                </div>
                            </div>
                            <div class="list-group-item p-t-b-10 p-l-r-0 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <strong class="m-r-20">4.0</strong>
                                    <div class="font-size-14">
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-muted"></i>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="m-r-20">2,230</div>
                                    <div>24%</div>
                                </div>
                            </div>
                            <div class="list-group-item p-t-b-10 p-l-r-0 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <strong class="m-r-20">3.0</strong>
                                    <div class="font-size-14">
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-muted"></i>
                                        <i class="fa fa-star text-muted"></i>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="m-r-20">1,230</div>
                                    <div>10%</div>
                                </div>
                            </div>
                            <div class="list-group-item p-t-b-10 p-l-r-0 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <strong class="m-r-20">2.0</strong>
                                    <div class="font-size-14">
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-muted"></i>
                                        <i class="fa fa-star text-muted"></i>
                                        <i class="fa fa-star text-muted"></i>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="m-r-20">1,230</div>
                                    <div>5%</div>
                                </div>
                            </div>
                            <div class="list-group-item p-t-b-10 p-l-r-0 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <strong class="m-r-20">1.0</strong>
                                    <div class="font-size-14">
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-muted"></i>
                                        <i class="fa fa-star text-muted"></i>
                                        <i class="fa fa-star text-muted"></i>
                                        <i class="fa fa-star text-muted"></i>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="m-r-20">7</div>
                                    <div>2%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">رضایت مشتری</div>
                    <div class="card-body">
                        <h1 class="primary-font line-height-30">
                            9.8 <small class="text-success">2.1%</small>
                        </h1>
                        <p class="text-muted">امتیاز عملکرد</p>
                        <div class="progress" style="height: 10px">
                            <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="list-group list-group-flush m-t-10">
                            <div class="list-group-item p-t-b-10 p-l-r-0 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <i class="fa fa-circle m-r-10 text-primary"></i>
                                    <span>عالی</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="m-r-20">3,230</div>
                                    <div>58%</div>
                                </div>
                            </div>
                            <div class="list-group-item p-t-b-10 p-l-r-0 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <i class="fa fa-circle m-r-10 text-danger"></i>
                                    <span>خیلی خوب</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="m-r-20">3,230</div>
                                    <div>58%</div>
                                </div>
                            </div>
                            <div class="list-group-item p-t-b-10 p-l-r-0 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <i class="fa fa-circle m-r-10 text-warning"></i>
                                    <span>خوب</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="m-r-20">3,230</div>
                                    <div>58%</div>
                                </div>
                            </div>
                            <div class="list-group-item p-t-b-10 p-l-r-0 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <i class="fa fa-circle m-r-10 text-info"></i>
                                    <span>متوسط</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="m-r-20">3,230</div>
                                    <div>58%</div>
                                </div>
                            </div>
                            <div class="list-group-item p-t-b-10 p-l-r-0 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <i class="fa fa-circle m-r-10 text-success"></i>
                                    <span>ضعیف</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="m-r-20">3,230</div>
                                    <div>58%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-body">
            <h3 class="primary-font font-weight-bold mb-3 line-height-24">
                <span class="align-middle">321</span>
                <span class="font-size-13">تیکت جدید</span>
            </h3>
            <div class="progress mb-2" style="height: 5px">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p class="font-size-13 m-b-0">
                <span class="text-success">1.2% <i class="ti-arrow-up m-r-5"></i></span> از دیروز</p>
        </div>
        <div class="card card-body">
            <h3 class="primary-font font-weight-bold mb-3 line-height-24">
                <span class="align-middle">70</span>
                <span class="font-size-13">تیکت حل شده</span>
            </h3>
            <div class="progress mb-2" style="height: 5px">
                <div class="progress-bar bg-success" role="progressbar" style="width: 10%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p class="font-size-13 m-b-0"><span class="text-danger">-2.2% <i class="ti-arrow-down m-r-5"></i></span> از دیروز</p>
        </div>
        <div class="card card-body">
            <h3 class="primary-font font-weight-bold mb-3 line-height-24">
                <span class="align-middle">100</span>
                <span class="font-size-13">تیکت باز</span>
            </h3>
            <div class="progress mb-2" style="height: 5px">
                <div class="progress-bar bg-info" role="progressbar" style="width: 30%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p class="font-size-13 m-b-0"><span class="text-success">4.2% <i class="ti-arrow-up m-r-5"></i></span> از دیروز</p>
        </div>
        <div class="card card-body">
            <h3 class="primary-font font-weight-bold mb-3 line-height-24">
                <span class="align-middle">125</span>
                <span class="font-size-13">تیکت در انتظار</span>
            </h3>
            <div class="progress mb-2" style="height: 5px">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 55%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p class="font-size-13 m-b-0"><span class="text-success">4.2% <i class="ti-arrow-up m-r-5"></i></span> از دیروز</p>
        </div>
        <div class="card">
            <div class="card-header">فعالیت های اخیر</div>
            <div class="card-body">
                <div class="timeline">
                    <div class="timeline-item">
                        <div>
                            <figure class="avatar avatar-sm m-r-15 bring-forward">
                                <span class="avatar-title bg-primary-bright text-primary rounded-circle">
                                    <i class="fa fa-clock-o font-size-20"></i>
                                </span>
                            </figure>
                        </div>
                        <div>
                            <p class="m-b-5"><strong>لورم ایپسوم</strong> لورم ایپسوم متن ساختگی با تولید سادگی <strong>لورم ایپسوم متن ساختگی با</strong></p>
                            <small class="text-muted">
                                <i class="fa fa-clock-o m-r-5"></i> 5 ساعت پیش
                            </small>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div>
                            <figure class="avatar avatar-sm m-r-15 bring-forward">
                                <span class="avatar-title bg-info-bright text-info rounded-circle">
                                    <i class="fa fa-file-text-o font-size-20"></i>
                                </span>
                            </figure>
                        </div>
                        <div>
                            <p class="m-b-5"><strong>استیو جابز</strong> یک ضمیمه جدید به تیکت افزود <strong>لورم ایپسوم متن ساختگی با تولید سادگی</strong></p>
                            <small class="text-muted">
                                <i class="fa fa-clock-o m-r-5"></i> 8 ساعت پیش
                            </small>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div>
                            <figure class="avatar avatar-sm m-r-15 bring-forward">
                                <span class="avatar-title bg-warning-bright text-warning rounded-circle">
                                    <i class="fa fa-money font-size-20"></i>
                                </span>
                            </figure>
                        </div>
                        <div>
                            <p class="m-b-5"><strong>کاترین</strong> یک تیکت جدید ثبت کرد <strong>لورم ایپسوم متن ساختگی با</strong></p>
                            <small class="text-muted">
                                <i class="fa fa-clock-o m-r-5"></i> دیروز
                            </small>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div>
                            <figure class="avatar avatar-sm m-r-15 bring-forward">
                                <span class="avatar-title bg-success-bright text-success rounded-circle">
                                    <i class="fa fa-dollar font-size-20"></i>
                                </span>
                            </figure>
                        </div>
                        <div>
                            <p class="m-b-5"><strong>کاترین</strong> تنظیمات دسته تیکت را تغییر داد
                                <strong>پرداخت و صورتحساب</strong></p>
                            <small class="text-muted">
                                <i class="fa fa-clock-o m-r-5"></i> 1 روز پیش
                            </small>
                        </div>
                    </div>
                </div>
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

	<!-- Dashboard scripts -->
	<script src="{{asset('admin-assets/js/examples/dashboard.js')}}"></script>
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
@endsection
