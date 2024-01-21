@extends('admin.master')
@section('main')
<div class="content-header">
    <h2 class="content-title">تنظیمات عمومی </h2>
</div>
<div class="card">
    <div class="card-body">
        <div class="row gx-5">
            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills ms-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" href="javascript:void(0)" aria-controls="v-pills-home" aria-selected="true">عمومی</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" href="javascript:void(0)" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" href="javascript:void(0)" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" href="javascript:void(0)" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                </div>
                <div class="tab-content px-3" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                            <form>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="row gx-3">
                                            <div class="col-12  mb-3">
                                                <label class="form-label">عنوان وبسایت</label>
                                                <input class="form-control" type="text" name="title" value="{{Setting('title')}}" placeholder="مارکوپلاس...">
                                            </div> <!-- col .// -->
                                            <div class="col-12  mb-3">
                                                <label class="form-label">توضیحات</label>
                                                <input class="form-control" type="text" name="descriptions" value="{{Setting('descriptions')}}" placeholder="فروش و عرضه...">
                                            </div> <!-- col .// -->
                                            <div class="col-lg-12  mb-3">
                                                <label class="form-label">موبایل</label>
                                                <input class="form-control" type="number" name="phone" value="{{Setting('phone')}}" dir="ltr" placeholder="09...">
                                            </div> <!-- col .// -->
                                            <div class="col-lg-12  mb-3">
                                                <label class="form-label">اینستاگرام</label>
                                                <input class="form-control" type="text" name="instagram" value="{{Setting('instagram')}}" dir="ltr" placeholder="instagram...">
                                            </div> <!-- col .// -->
                                            <div class="col-lg-12  mb-3">
                                                <label class="form-label">تلگرام</label>
                                                <input class="form-control" type="text" name="telegram" value="{{Setting('telegram')}}" dir="ltr" placeholder="telegram...">
                                            </div> <!-- col .// -->
                                            <div class="col-lg-12  mb-3">
                                                <label class="form-label">آدرس</label>
                                                <input class="form-control" type="text" name="address" value="@if(Setting('address') != 'لطفا مقدار آدرس را از تنظیمات مدیریت تغییر دهید'){{Setting('address')}}@endif" placeholder="استان، شهر ...">
                                            </div> <!-- col .// -->
                                        </div> <!-- row.// -->
                                    </div> <!-- col.// -->
                                    <aside class="col-lg-4">
                                        <figure class="text-lg-center">
                                            <img class="mb-3" src="@if(Setting('logo')!=''){{Setting('logo')}}@else{{asset('images/logo.png')}}@endif" alt="User Photo">
                                            <figcaption>
                                                <a class="btn btn-light rounded font-md" href="#">
                                                    <i class="icons material-icons md-backup font-md"></i> بارگذاری
                                                </a>
                                            </figcaption>
                                        </figure>
                                    </aside> <!-- col.// -->
                                </div> <!-- row.// -->
                                <br>
                                <button class="btn btn-primary" type="submit">ثبت تغییرات</button>
                            </form>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">profile</div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">...</div>
                </div>
            </div>
        </div> <!-- row.// -->
    </div> <!-- card body end// -->
</div> <!-- card end// -->
@endsection
