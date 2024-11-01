@extends('admin.master')

@section('main-content')
<div class="card card-body overflow-hidden" data-backround-image="{{asset('admin-assets/media/image/profile-bg.png')}}">
    <div class="p-3 d-lg-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <div>
                <figure class="avatar avatar-xl mr-3">
                    <img src="{{$user->avatar}}" class="rounded-circle" alt="...">
                </figure>
            </div>
            <div class="text-white">
                <h3 class="line-height-30 m-b-10">
                    جان اسنو
                    <a href="{{route('admin.user.edit', $user->id)}}" data-toggle="tooltip" title="ویرایش پروفایل" class="font-size-15 text-white btn-floating m-l-5 align-middle">
                        <i class="fa fa-pencil"></i>
                    </a>
                </h3>
                <p class="mb-0 opacity-8">طراح وب</p>
            </div>
        </div>
        <div>
            <ul class="list-inline text-center">
                <li class="list-inline-item my-2">
                    <a href="#" class="text-success d-inline-block">
                        <h2 class="font-weight-bold mb-2 primary-font line-height-36">418</h2>
                        <span>مطلب</span>
                    </a>
                </li>
                <li class="list-inline-item my-2">
                    <a href="#" class="text-warning d-inline-block ml-3">
                        <h2 class="font-weight-bold mb-2 primary-font line-height-36">1,596</h2>
                        <span>دنبال کننده</span>
                    </a>
                </li>
                <li class="list-inline-item my-2">
                    <a href="#" class="text-info d-inline-block ml-3">
                        <h2 class="font-weight-bold mb-2 primary-font line-height-36">7,896</h2>
                        <span>لایک</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="row row-sm">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">اشتراک گذاری فعالیت</h6>
                <form>
                    <div class="form-group">
                        <textarea rows="3" class="form-control" placeholder="چیزی بنویسید"></textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary">ثبت</button>
                        <div>
                            <a href="#" data-toggle="tooltip" title="افزودن تصویر" class="btn btn-light btn-icon">
                                <i class="ti-image"></i>
                            </a>
                            <a href="#" data-toggle="tooltip" title="افزودن ویدئو" class="btn btn-light btn-icon m-l-5">
                                <i class="ti-video-camera"></i>
                            </a>
                            <a href="#" data-toggle="tooltip" title="افزودن فایل" class="btn btn-light btn-icon m-l-5">
                                <i class="ti-file"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills flex-column flex-sm-row" id="myTab" role="tablist">
                    <li class="flex-sm-fill text-sm-center nav-item">
                        <a class="nav-link active" id="hometimeline-tab" data-toggle="tab" href="#timeline" role="tab" aria-selected="true">خط زمانی</a>
                    </li>
                    <li class="flex-sm-fill text-sm-center nav-item">
                        <a class="nav-link" id="photos-tab" data-toggle="tab" href="#photos" role="tab" aria-selected="false">تصاویر</a>
                    </li>
                    <li class="flex-sm-fill text-sm-center nav-item">
                        <a class="nav-link" id="followers-tab1" data-toggle="tab" href="#followers" role="tab" aria-selected="false">
                            دنبال کنندگان <span class="badge badge-light m-l-5">6</span>
                        </a>
                    </li>
                    <li class="flex-sm-fill text-sm-center nav-item">
                        <a class="nav-link" id="earnings-tab" data-toggle="tab" href="#earnings" role="tab" aria-selected="false">درآمد</a>
                    </li>
                </ul>
                <div class="tab-content p-t-30" id="myTabContent">
                    <div class="tab-pane fade show active" id="timeline" role="tabpanel">
                        <div class="timeline">
                            <div class="timeline-item">
                                <div>
                                    <figure class="avatar avatar-sm m-r-15 bring-forward">
                                        <img src="assets/media/image/avatar.jpg" class="rounded-circle" alt="image">
                                    </figure>
                                </div>
                                <div>
                                    <h6>لورم ایپسوم</h6>
                                    <p class="m-b-5">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
                                    <small class="text-muted">
                                        <i class="fa fa-clock-o m-r-5"></i> دیروز
                                    </small>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div>
                                    <figure class="avatar avatar-sm m-r-15 bring-forward">
                                        <span class="avatar-title bg-danger rounded-circle">ک</span>
                                    </figure>
                                </div>
                                <div>
                                    <h6>افزودن کاربر جدید</h6>
                                    <p class="m-b-5">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
                                    <p class="m-b-5">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله</p>
                                    <small class="text-muted">
                                        <i class="fa fa-clock-o m-r-5"></i> 1398/08/14
                                    </small>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div>
                                    <figure class="avatar avatar-sm m-r-15 bring-forward">
                                        <span class="avatar-title bg-warning rounded-circle">
                                            <i class="ti-image"></i>
                                        </span>
                                    </figure>
                                </div>
                                <div>
                                    <div class="row m-b-5">
                                        <div class="col-md-6">
                                            <img src="assets/media/image/portfolio-five.jpg" alt="image" class="w-25 m-r-5">
                                            <img src="assets/media/image/portfolio-one.jpg" alt="image" class="w-25 m-r-5">
                                            <img src="assets/media/image/portfolio-three.jpg" alt="image" class="w-25 m-r-5">
                                        </div>
                                    </div>
                                    <small class="text-muted">
                                        <i class="fa fa-clock-o m-r-5"></i> 1398/05/26
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="photos" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-4 mb-3">
                                <img class="img-fluid rounded" src="assets/media/image/portfolio-one.jpg" alt="image">
                            </div>
                            <div class="col-lg-4 mb-3">
                                <img class="img-fluid rounded" src="assets/media/image/portfolio-two.jpg" alt="image">
                            </div>
                            <div class="col-lg-4 mb-3">
                                <img class="img-fluid rounded" src="assets/media/image/portfolio-three.jpg" alt="image">
                            </div>
                            <div class="col-lg-4 mb-3">
                                <img class="img-fluid rounded" src="assets/media/image/portfolio-four.jpg" alt="image">
                            </div>
                            <div class="col-lg-4 mb-3">
                                <img class="img-fluid rounded" src="assets/media/image/portfolio-five.jpg" alt="image">
                            </div>
                            <div class="col-lg-4 mb-3">
                                <img class="img-fluid rounded" src="assets/media/image/portfolio-six.jpg" alt="image">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="followers" role="tabpanel">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center p-l-r-0">
                                <figure class="avatar avatar-sm m-r-15">
                                    <a href="#">
                                        <span class="avatar-title rounded-circle">و</span>
                                    </a>
                                </figure>
                                <div>
                                    <h6 class="m-b-0 primary-font">تونی استارک</h6>
                                    <small class="text-muted">مهندس</small>
                                </div>
                                <a href="#" class="btn btn-success btn-sm ml-auto">دنبال کننده</a>
                            </li>
                            <li class="list-group-item d-flex align-items-center p-l-r-0">
                                <figure class="avatar avatar-sm m-r-15">
                                    <a href="#">
                                        <img src="assets/media/image/avatar.jpg" class="rounded-circle" alt="image">
                                    </a>
                                </figure>
                                <div>
                                    <h6 class="m-b-0 primary-font">تونی استارک</h6>
                                    <small class="text-muted">منابع انسانی</small>
                                </div>
                                <a href="#" class="btn btn-light btn-outline-light btn-sm ml-auto">دنبال کردن</a>
                            </li>
                            <li class="list-group-item d-flex align-items-center p-l-r-0">
                                <figure class="avatar avatar-sm m-r-15">
                                    <a href="#">
                                        <span class="avatar-title rounded-circle">م</span>
                                    </a>
                                </figure>
                                <div>
                                    <h6 class="m-b-0 primary-font">استیو راجرز</h6>
                                    <small class="text-muted">مشاور املاک</small>
                                </div>
                                <a href="#" class="btn btn-success btn-sm ml-auto">دنبال کننده</a>
                            </li>
                            <li class="list-group-item d-flex align-items-center p-l-r-0">
                                <figure class="avatar avatar-sm m-r-15">
                                    <a href="#">
                                        <span class="avatar-title rounded-circle">ک</span>
                                    </a>
                                </figure>
                                <div>
                                    <h6 class="m-b-0 primary-font">جان اسنو</h6>
                                    <small class="text-muted">مهندس</small>
                                </div>
                                <a href="#" class="btn btn-success btn-sm ml-auto">دنبال کننده</a>
                            </li>
                            <li class="list-group-item d-flex align-items-center p-l-r-0">
                                <figure class="avatar avatar-sm m-r-15">
                                    <a href="#">
                                        <span class="avatar-title rounded-circle">و</span>
                                    </a>
                                </figure>
                                <div>
                                    <h6 class="m-b-0 primary-font">تونی استارک</h6>
                                    <small class="text-muted">مهندس</small>
                                </div>
                                <a href="#" class="btn btn-success btn-sm ml-auto">دنبال کننده</a>
                            </li>
                            <li class="list-group-item d-flex align-items-center p-l-r-0">
                                <figure class="avatar avatar-sm m-r-15">
                                    <a href="#">
                                        <img src="assets/media/image/avatar.jpg" class="rounded-circle" alt="image">
                                    </a>
                                </figure>
                                <div>
                                    <h6 class="m-b-0 primary-font">تونی استارک</h6>
                                    <small class="text-muted">منابع انسانی</small>
                                </div>
                                <a href="#" class="btn btn-light btn-outline-light btn-sm ml-auto">دنبال کردن</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="earnings" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>تاریخ</th>
                                        <th>تعداد فروش</th>
                                        <th>درآمد</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>دوشنبه، 12</td>
                                        <td>
                                            3
                                        </td>
                                        <td>400,000 تومان</td>
                                    </tr>
                                    <tr>
                                        <td>سه شنبه، 13</td>
                                        <td>
                                            2
                                        </td>
                                        <td>400,000 تومان</td>
                                    </tr>
                                    <tr>
                                        <td>چهارشنبه، 14</td>
                                        <td>
                                            3
                                        </td>
                                        <td>420,000 تومان</td>
                                    </tr>
                                    <tr>
                                        <td>پنجشنبه، 15</td>
                                        <td>
                                            5
                                        </td>
                                        <td>500,000 تومان</td>
                                    </tr>
                                    <tr>
                                        <td>جمعه، 16</td>
                                        <td>
                                            3
                                        </td>
                                        <td>400,000 تومان</td>
                                    </tr>
                                    <tr>
                                        <td>شنبه، 17</td>
                                        <td>
                                            3
                                        </td>
                                        <td>400,000 تومان</td>
                                    </tr>
                                    <tr>
                                        <td>یکشنبه، 18</td>
                                        <td>
                                            3
                                        </td>
                                        <td>400,000 تومان</td>
                                    </tr>
                                    <tr>
                                        <td>دوشنبه، 19</td>
                                        <td>
                                            3
                                        </td>
                                        <td>500,000 تومان</td>
                                    </tr>
                                    <tr>
                                        <td>سه شنبه، 20</td>
                                        <td>
                                            3
                                        </td>
                                        <td>400,000 تومان</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2">جمع کل:</th>
                                        <th>3,720,000 تومان</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">تکمیل پروفایل</h6>
                <div class="d-flex align-items-center">
                    <div class="icon-block icon-block-floating icon-block-outline-success m-r-20">
                        <i class="fa fa-pencil"></i>
                    </div>
                    <div class="progress flex-grow-1" style="height: 7px">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 89%;" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="small m-l-10">89%</span>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h6 class="card-title d-flex justify-content-between align-items-center">
                    اطلاعات
                    <a href="#" class="link-1 font-size-13 primary-font">
                        <i class="ti-pencil m-r-5 align-middle"></i> ویرایش
                    </a>
                </h6>
                <div class="row mb-2">
                    <div class="col-6 text-muted">نام:</div>
                    <div class="col-6">جان</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6 text-muted">نام خانوادگی:</div>
                    <div class="col-6">اسنو</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6 text-muted">سن:</div>
                    <div class="col-6">26</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6 text-muted">شغل:</div>
                    <div class="col-6">طراح وب</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6 text-muted">شهر:</div>
                    <div class="col-6">تبریز، ایران</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6 text-muted">آدرس:</div>
                    <div class="col-6">چهارراه آبرسان، برج بلور، طبقه 455</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6 text-muted">تلفن:</div>
                    <div class="col-6" dir="ltr">(+98) 123 456 789</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6 text-muted">ایمیل:</div>
                    <div class="col-6">johnsnow@sample.com</div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">مهارت ها</h6>
                <div class="m-b-20">
                    <div class="font-size-13">نرم افزار</div>
                    <div class="d-flex align-items-center">
                        <div class="progress flex-grow-1" style="height: 7px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 42%;" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="small m-l-10">42%</span>
                    </div>
                </div>
                <div class="m-b-20">
                    <div class="font-size-13">طراحی</div>
                    <div class="d-flex align-items-center">
                        <div class="progress flex-grow-1" style="height: 7px">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="small m-l-10">75%</span>
                    </div>
                </div>
                <div class="m-b-20">
                    <div class="font-size-13">بهینه سازی سئو</div>
                    <div class="d-flex align-items-center">
                        <div class="progress flex-grow-1" style="height: 7px">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="small m-l-10">50%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')

@endsection
