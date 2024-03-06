@extends('website.master')
@section('main')
@include('website.layout.header')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home')}}" rel="nofollow">خانه</a>
                <span></span> حساب کاربری
            </div>
        </div>
    </div>
    {{-- @php
        $url = url()->previous();
        $route = app('router')->getRoutes($url)->match(app('request')->create($url))->getName();
    @endphp --}}
    <section class="pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="row">
                        @include('website.user.menu')
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">سفارشات</h5>
                                </div>
                                <div class="card-body">
                                    @if($orderItems->count() >= 1)
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>محصول</th>
                                                        <th>تاریخ</th>
                                                        <th>مبلغ</th>
                                                        <th>عملیات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php($id = 1)
                                                    @foreach ($orderItems as $item)
                                                        <tr>
                                                            <td><a href="{{route('product',['id'=>$item->productId])}}" target="_blank">{{$item->Product->title}}</a></td>
                                                            <td><small class="small">{{\Morilog\Jalali\Jalalian::forge($item->created_at)->format('%A، %d %B %Y')}} <span class="text-primary">ساعت</span> {{date('H:i',strtotime($item->created_at))}}</small></td>
                                                            <td>{{price($item->price)}}</td>
                                                            <td><a href="{{route('account.orders.view',['id'=>$item->id])}}" class="btn-small d-block">نمایش</a></td>
                                                        </tr>
                                                        @php($id += 1)
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                    تا کنون سفارشی ثبت نشده
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@include('website.layout.footer')
@endsection
