@extends('admin.master')
@section('breadcrumbs')
    <div class="header-body-left">

        <h3 class="page-title">فروشگاه</h3>

        <!-- begin::breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">داشبورد</a></li>
                <li class="breadcrumb-item" aria-current="page">فروشگاه</li>
                <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
            </ol>
        </nav>
        <!-- end::breadcrumb -->

    </div>

@endsection
@section('header')
	<!-- Select2 -->
    <link rel="stylesheet" href="{{asset('vendors/select2/css/select2.min.css')}}" type="text/css">

    <!-- Range slider -->
	<link rel="stylesheet" href="{{asset('vendors/range-slider/css/ion.rangeSlider.min.css')}}" type="text/css">

    <!-- Tagsinput -->
	<link rel="stylesheet" href="{{asset('vendors/tagsinput/bootstrap-tagsinput.css')}}" type="text/css">

    <!-- Form wizard -->
	<link rel="stylesheet" href="{{asset('vendors/form-wizard/jquery.steps.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('admin-assets/css/form-wizard.css')}}" type="text/css">

@endsection
@section('main-content')
<div class="card">
    <div class="card-body">
        <h6 class="card-title">{{$title}}</h6>
        <form id="contact" action="#">
            <div>
                <h3>اطلاعات محصول</h3>
                <section>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-floating mb-3">
                                <input type="text" autofocus name="title" class="form-control required" id="title" placeholder="عنوان">
                                <label for="title" class="error invalid-feedback">عنوان</label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-floating mb-3">
                                <input type="text" name="code" class="form-control required digits " id="code" placeholder="کد">
                                <label for="code" class="error invalid-feedback">کد</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-floating mb-3">
                                <input type="text" name="productType" class="form-control required digits " id="code" placeholder="کد">
                                <label for="productType" class="error invalid-feedback">جنس</label>
                            </div>
                        </div>
                    </div>
                </section>
                <h3>انبار</h3>
                <section>
                    <label for="name">First name *</label>
                    <input id="name" name="name" type="text" class="required">
                    <label for="surname">Last name *</label>
                    <input id="surname" name="surname" type="text" class="required">
                    <label for="email">Email *</label>
                    <input id="email" name="email" type="text" class="required email">
                    <label for="address">Address</label>
                    <input id="address" name="address" type="text">
                </section>
                <h3>Hints</h3>
                <section>
                    <ul>
                        <li>Foo</li>
                        <li>Bar</li>
                        <li>Foobar</li>
                    </ul>
                </section>
                <h3>Finish</h3>
                <section>
                    <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                </section>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Select2</h6>
                <div class="form-group">
                    <select class="js-example-basic-single">
                        <option>انتخاب</option>
                        <option value="France">ایران</option>
                        <option value="Brazil">برزیل</option>
                        <option value="Yemen">ایتالیا</option>
                        <option value="United States">آلمان</option>
                        <option value="China">چین</option>
                        <option value="Argentina">آرژانتین</option>
                        <option value="Bulgaria">اسپانیا</option>
                    </select>
                </div>
                <p>چند انتخاب</p>
                <div class="form-group">
                    <select class="js-example-basic-single" multiple>
                        <option>انتخاب</option>
                        <option value="France">ایران</option>
                        <option selected value="Brazil">برزیل</option>
                        <option selected value="Yemen">ایتالیا</option>
                        <option selected value="United States">آلمان</option>
                        <option value="China">چین</option>
                        <option value="Argentina">آرژانتین</option>
                        <option value="Bulgaria">اسپانیا</option>
                    </select>
                </div>
                <p>چند انتخاب و دسته بندی شده</p>
                <select class="js-example-basic-single" multiple>
                    <option>انتخاب</option>
                    <optgroup label="شهرها">
                        <option value="Wonosari">تبریز</option>
                        <option value="Antipolo">تهران</option>
                        <option value="Lesuhe">اصفهان</option>
                        <option selected value="Sunzhuang">شیراز</option>
                        <option value="Hongchuan">همدان</option>
                    </optgroup>
                    <optgroup label="کشورها">
                        <option value="France">ایران</option>
                        <option selected value="Brazil">برزیل</option>
                        <option selected value="Yemen">ایتالیا</option>
                        <option selected value="United States">آلمان</option>
                        <option value="China">چین</option>
                        <option value="Argentina">آرژانتین</option>
                        <option value="Bulgaria">اسپانیا</option>
                    </optgroup>
                </select>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h6 class="card-title">انتخاب‌گر بازه</h6>
                <p>تنظیم مقدار حداقل، حداکثر و شروع</p>
                <div class="form-group">
                    <input type="text" id="demo_1">
                </div>
                <p>تنظیم نوع به double، مشخص کردن بازه، نمایش توری، افزودن پسوند «تومان»</p>
                <div class="form-group">
                    <input type="text" id="demo_2">
                </div>
                <p>اضافه کردن قدم</p>
                <div class="form-group">
                    <input type="text" id="demo_3">
                </div>
                <p>اجبار به مقادیر اعشاری، با استفاده از قدم اعشاری 0.1</p>
                <div class="form-group">
                    <input type="text" id="demo_4">
                </div>
                <p>آرایه مقادیر همه چیز میتواند باشد، حتی متن</p>
                <div class="form-group">
                    <input type="text" id="demo_5">
                </div>
                <div class="card-title mt-4">دموی پیشرفته</div>
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                <div class="form-group">
                    <input type="text" id="demo_6">
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-6">

        <div class="card">
            <div class="card-body">
                <h6 class="card-title">ورودی برچسب</h6>
                <input type="text" class="form-control tagsinput" placeholder="برچسب ها" value="HTML5, CSS3, JavaScript, Laravel">
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h6 class="card-title">ماسک ورودی</h6>
                <div class="form-group">
                    <label>تلفن</label>
                    <input type="text" data-input-mask="phone" class="form-control text-left" placeholder="(555) 555-5555" dir="ltr">
                </div>
                <div class="form-group">
                    <label>تاریخ</label>
                    <input type="text" data-input-mask="date" class="form-control text-left" placeholder="1398/12/05" dir="ltr">
                </div>
                <div class="form-group">
                    <label>زمان</label>
                    <input type="text" data-input-mask="time" class="form-control text-left" placeholder="12:25:45" dir="ltr">
                </div>
                <div class="form-group">
                    <label>پول</label>
                    <input type="text" data-input-mask="money" class="form-control text-left" placeholder="54,28" dir="ltr">
                </div>
                <div class="form-group">
                    <label>آدرس IP</label>
                    <input type="text" data-input-mask="ip_address" class="form-control text-left" placeholder="192.168.544.444" dir="ltr">
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('footer')
    <!-- Select2 -->
	<script src="{{asset('vendors/select2/js/select2.min.js')}}"></script>
	<script src="{{asset('admin-assets/js/examples/select2.js')}}"></script>

	<!-- Range slider -->
	<script src="{{asset('vendors/range-slider/js/ion.rangeSlider.min.js')}}"></script>
	<script src="{{asset('admin-assets/js/examples/range-slider.js')}}"></script>

    <!-- Form wizard -->
	{{-- <script src="{{asset('vendors/form-wizard/jquery.steps.min.js')}}"></script> --}}
	<script src="{{asset('admin-assets/js/examples/form-wizard.js')}}"></script>

    <script src='{{asset('vendors/jquery.validate.js')}}'></script>
    <script src='{{asset('vendors/jquery-steps/jquery.steps.js')}}'></script>

@endsection
