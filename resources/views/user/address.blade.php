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
                                <div class="tab-pane fade show active" id="address" role="tabpanel" aria-labelledby="address-tab">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card mb-3 mb-lg-0">
                                                <div class="card-header">
                                                    <h5 class="mb-0 float-end py-2">آدرس ها</h5>
                                                    <a href="{{route('account.address.add')}}" class="btn btn-primary py-1 float-start">افزودن آدرس</a>
                                                </div>
                                                <div class="card-body">
                                                    @if($addresses->count() >= 1)
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>موقعیت</th>
                                                                        <th>آدرس</th>
                                                                        <th>کدپستی</th>
                                                                        <th>پلاک</th>
                                                                        <th>عملیات</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php($id = 1)
                                                                    @foreach ($addresses as $item)
                                                                        <tr>
                                                                            <td>@if($item->primary == 1)<i class="fi-rs-check ml-10 text-success"></i>@endif{{$item->State->name}} - {{$item->city}}</td>
                                                                            <td><small class="small">{{$item->address}}</small></td>
                                                                            <td>{{$item->zipcode}}</td>
                                                                            <td>{{$item->pelak}}</td>
                                                                            <td><a href="{{route('account.address.edit',['id'=>$item->id])}}" class="btn-small d-block">ویرایش</a></td>
                                                                        </tr>
                                                                        @php($id += 1)
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    @else
                                                    تا کنون آدرسی ثبت نشده
                                                    @endif
                                                </div>
                                            </div>
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
