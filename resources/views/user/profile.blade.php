@extends('master')
@section('main')
@include('layout.header')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home')}}" rel="nofollow">خانه</a>
                <span></span> حساب کاربری
            </div>
        </div>
    </div>
    @php
        $url = url()->previous();
        $route = app('router')->getRoutes($url)->match(app('request')->create($url))->getName();
    @endphp
    <section class="pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="row">
                        @include('user.menu')
                        <div class="col-md-8">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade active show" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>جزئیات حساب</h5>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" name="enq">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>نام <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="name" type="text" value="{{$user->fname}}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>نام خانوادگی <span class="required">*</span></label>
                                                        <input class="form-control square" name="lname" value="{{$user->lname}}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>ایمیل <span class="required">*</span></label>
                                                        <input class="form-control square" value="{{$user->email}}" readonly type="text">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>موبایل <span class="required">*</span></label>
                                                        <input class="form-control square" value="0{{$user->phone}}" readonly type="text">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-fill-out submit" name="submit">ذخیره</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@include('layout.footer')
@endsection