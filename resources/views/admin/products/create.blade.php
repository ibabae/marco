@extends('admin.master')

@section('header')
    <!-- Plugin styles -->
    <link rel="stylesheet" href="{{ asset('vendors/bundle.css') }}" type="text/css">

    <link rel="stylesheet" href="{{asset('vendors/bootstrap/bootstrap-icons.min.css')}}"
        crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('vendors/bootstrap/fileinput.min.css')}}"
        media="all" type="text/css" />

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('vendors/select2/css/select2.min.css') }}" type="text/css">

    <!-- Range slider -->
    <link rel="stylesheet" href="{{ asset('vendors/range-slider/css/ion.rangeSlider.min.css') }}" type="text/css">

    <!-- Tagsinput -->
    <link rel="stylesheet" href="{{ asset('vendors/tagsinput/bootstrap-tagsinput.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('vendors/colorpicker/css/bootstrap-colorpicker.min.css') }}" type="text/css">

    <!-- Form wizard -->
    <link rel="stylesheet" href="{{ asset('vendors/form-wizard/jquery.steps.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/form-wizard.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/product.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('vendors/tagsinput/bootstrap-tagsinput.css')}}" type="text/css">
    <style>

    </style>
@endsection
@section('main-content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">{{ $title }}</h6>
            <ul class="nav nav-pills mb-3 flex-column flex-sm-row" id="pills-tab" role="tablist">
                <li class="flex-sm-fill nav-item" role="presentation">
                    <button class="nav-link w-100 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">اطلاعات محصول</button>
                </li>
                <li class="flex-sm-fill nav-item" role="presentation">
                    <button class="nav-link w-100" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">انبار</button>
                </li>
                <li class="flex-sm-fill nav-item" role="presentation">
                    <button class="nav-link w-100" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">رسانه</button>
                </li>
                <li class="flex-sm-fill nav-item" role="presentation">
                    <button class="nav-link w-100" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false">اطلاعات</button>
                </li>
            </ul>
            <form id="product" action="{{route('admin.shop.product.store')}}" enctype="multipart/form-data" method="POST" class="tab-content" id="myTabContent">
                @csrf
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="card">
                        <div class="card-body product-wizard">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-6 mb-3">
                                            <div class="form-floating">
                                                <input type="text" autofocus name="title" class="form-control required" id="title" placeholder="عنوان">
                                                <label for="title">عنوان</label>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-3 my-auto">
                                            <div class="form-group">
                                                <div class="custom-control custom-switch custom-checkbox-warning">
                                                    <input type="checkbox" class="custom-control-input" id="featured" name="featured">
                                                    <label class="custom-control-label" for="featured">محصول ویژه</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <div class="form-floating">
                                                <input type="text" name="code" class="form-control digits" id="code" placeholder="کد">
                                                <label for="code">کد</label>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <div class="form-floating">
                                                <input type="text" name="material" class="form-control required"id="productType" placeholder="جنس">
                                                <label for="productType">جنس</label>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <div class="form-floating">
                                                <input type="text" name="price" class="form-control required" id="price" placeholder="قیمت">
                                                <label for="price">قیمت</label>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <div class="form-floating">
                                                <input type="text" name="disPrice" class="form-control required" id="disPrice" placeholder="قیمت تخفیف">
                                                <label for="disPrice">قیمت تخفیف</label>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="خلاصه" name="excerpt" id="floatingTextarea2" style="height: 100px"></textarea>
                                                <label for="floatingTextarea2">خلاصه</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-header">انتخاب دسته</div>
                                        <div class="card-body">
                                            <div class="card-scroll">
                                                <div id="tree" class="px-1">
                                                    <ul id="categories"></ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <button type="button" class="btn btn-disabled">قبلی</button>
                        <button type="button" class="btn btn-primary ms-auto btnNext">بعدی</button>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="card">
                        <div class="card-body product-wizard">
                            <div class="col-12 " id="sizeList">
                                <div id="size-group"></div>
                                <a class="text-primary add-size small" href="{{ route('admin.product.itemsData') }}"><i class="fa fa-plus me-2"></i>افزودن</a>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <button type="button" class="btn btn-danger btnPrevious">قبلی</button>
                        <button type="button" class="btn btn-primary ms-auto btnNext">بعدی</button>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <div class="card">
                        <div class="card-body product-wizard">
                            <div class="row mb-4">
                                <div class="col-6">
                                    <label for="">تصویر روی محصول</label>
                                    <input data-show-upload="false" name="primaryImage" type="file" class="file product-image" data-browse-on-zone-click="true">
                                </div>
                                <div class="col-6">
                                    <label for="">تصویر پشت محصول</label>
                                    <input data-show-upload="false" name="secondaryImage" type="file" class="file product-image" data-browse-on-zone-click="true">
                                </div>
                                <div class="col-12">
                                    <label for="">تصاویر محصول</label>
                                    <input data-show-upload="false" name="images[]" type="file" class="file product-gallery" multiple data-browse-on-zone-click="true">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <button type="button" class="btn btn-danger btnPrevious">قبلی</button>
                        <button type="button" class="btn btn-primary ms-auto btnNext">بعدی</button>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab">
                    <div class="form-group">
                        <h6 class="card-title">ورودی برچسب</h6>
						<input type="text" class="form-control tagsinput" name="tags" placeholder="برچسب ها" value="">
                    </div>
                    <div class="d-flex">
                        <button type="button" class="btn btn-danger btnPrevious">قبلی</button>
                        <button type="submit" class="btn btn-primary ms-auto">ثبت</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('footer')
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="newColorModal" tabindex="-1" aria-labelledby="newColorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form onsubmit="return false" action="{{ route('admin.shop.color.add') }}" method="POST"
                class="modal-content color-ajax">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="newColorModalLabel">افزودن رنگ</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span data-type="add-route" @class(['d-none'])>{{ route('admin.shop.color.add') }}</span>
                    @csrf
                    @method('POST')

                    <div class="form-floating mb-2">
                        <input type="text" autofocus name="title" class="form-control required" id="title"
                            placeholder="ایکس لارج">
                        <label for="title">عنوان</label>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="input-group sample-selector mb-2">
                        <div class="px-3 my-auto">انتخاب رنگ</div>
                        <div class="input-group-append my-auto">
                            <span class="input-group-text"><i></i></span>
                        </div>
                        <input type="text" name="code" value="red" class="form-control text-left color"
                            dir="ltr">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">انصراف</button>
                    <button type="submit" class="btn btn-primary">ثبت</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="newSizeModal" tabindex="-1" aria-labelledby="newSizeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form onsubmit="return false" action="{{ route('admin.shop.size.add') }}" method="POST"
                class="modal-content size-ajax">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="newSizeModalLabel">افزودن سایز</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span data-type="add-route" @class(['d-none'])>{{ route('admin.shop.size.add') }}</span>
                    @csrf
                    @method('POST')
                    <div class="form-floating mb-2">
                        <input type="text" autofocus name="title" class="form-control required" id="title"
                            placeholder="ایکس لارج">
                        <label for="title">عنوان</label>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" autofocus name="code" class="form-control required" id="title"
                            placeholder="XL">
                        <label for="title">اختصار</label>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">انصراف</button>
                    <button type="submit" class="btn btn-primary">ثبت</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Select2 -->
    <script src="{{ asset('vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/examples/select2.js') }}"></script>

    <!-- Range slider -->
    <script src="{{ asset('vendors/range-slider/js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/examples/range-slider.js') }}"></script>

    <!-- Form wizard -->
    {{-- <script src="{{asset('vendors/form-wizard/jquery.steps.min.js')}}"></script> --}}
    <script src="{{ asset('admin-assets/js/examples/form-wizard.js') }}"></script>

    <script src='{{ asset('vendors/jquery.validate.js') }}'></script>
    {{-- <script src='{{asset('vendors/jquery-steps/jquery.steps.js')}}'></script> --}}
    <script src='{{ asset('vendors/jquery-steps/jquery.steps.js') }}'></script>
    <script src="{{asset('vendors/bootstrap/buffer.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('vendors/bootstrap/filetype.min.js')}}" type="text/javascript"></script>
    <!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you
            wish to resize images before upload. This must be loaded before fileinput.min.js -->
    <script src="{{asset('vendors/bootstrap/piexif.min.js')}}" type="text/javascript"></script>
    <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
            This must be loaded before fileinput.min.js -->
    <script src="{{asset('vendors/bootstrap/sortable.min.js')}}"
        type="text/javascript"></script>
    <!-- bootstrap.bundle.min.js below is needed if you wish to zoom and preview file content in a detail modal
            dialog. bootstrap 5.x or 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
    <script src="{{asset('vendors/bootstrap/bootstrap.bundle.min.js')}}" crossorigin="anonymous">
    </script>
    <!-- the main fileinput plugin script JS file -->
    <script src="{{asset('vendors/bootstrap/fileinput.min.js')}}"></script>
    <!-- following theme script is needed to use the Font Awesome 5.x theme (`fa5`). Uncomment if needed. -->
    <!-- script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/themes/fa5/theme.min.js"></script -->

    <!-- optionally if you need translation for your language then include the locale file as mentioned below (replace LANG.js with your language locale) -->
    <script src="{{asset('vendors/bootstrap/LANG.js')}}"></script>
    <script src="{{ asset('vendors/tagsinput/bootstrap-tagsinput.js')}}"></script>
	<script src="{{ asset('admin-assets/js/examples/tagsinput.js')}}"></script>
    <script>
        var data = {!! json_encode($categoryArray) !!};
        var lastId = 0
    </script>
    <script src="{{ asset('admin-assets/js/product.js') }}"></script>
    <script src="{{ asset('admin-assets/js/size-ajax.js') }}"></script>
    <script src="{{ asset('admin-assets/js/color-ajax.js') }}"></script>
    <script src="{{ asset('vendors/colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/examples/colorpicker.js') }}"></script>
    <script>
        $(".product-image").fileinput({
            showUpload: false,
            dropZoneEnabled: false,
            inputGroupClass: "input-group-md bg-white",
            allowedFileExtensions: ["jpg", "png", "gif"],
            rtl: true,
            browseLabel: '&hellip; جستجو',
            cancelLabel: 'انصراف',
            msgPlaceholder: 'انتخاب تصویر ...',
            msgUploadThreshold: 'پردازش &hellip;',
            removeLabel: 'حذف',
            removeTitle: 'حذف فایل انتخاب شده',
        });
        $(".product-gallery").fileinput({
            inputGroupClass: "bg-white",
            dropZoneClass: "bg-white",
            allowedFileExtensions: ["jpg", "png", "gif"],
            rtl: true,
            browseLabel: '&hellip; جستجو',
            cancelLabel: 'انصراف',
            msgPlaceholder: 'انتخاب تصاویر ...',
            msgProcessing: 'در حال پردازش &hellip;',
            dropZoneTitle: 'فایل ها را بکشید و اینجا رها کنید &hellip;',
            dropZoneClickTitle: '<br>(یا روی دکمه جستجو بزنید)',
            removeLabel: 'حذف',
            removeTitle: 'حذف فایل های انتخاب شده',
        });
    </script>
@endsection
