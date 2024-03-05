@extends('master')
@section('main')
@include('layout.header')

<main class="main">
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    {{-- {{dd($trans)}} --}}
                    @if($trans->PayType == 1)
                        <div class="row border rounded-3 p-4">
                            <p class="text-center mb-3">مبلغ <span class="text-info fw-bolder">{{price($trans->Price)}}</span> را به شماره کارت <span class="text-info fw-bolder">{{Setting('cart')}}</span> به نام <span class="text-info fw-bolder">{{Setting('cartname')}}</span> واریز کنید و پس از پرداخت، تأیید کنید.</p>
                            <div class="col-4"></div>
                            <form action="{{route('verify',['id'=>$trans->id])}}" class="col-lg-4" method="GET">
                                @csrf
                                <div class="row">
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="trackId" placeholder="شماره ارجاع / کد پیگیری">
                                    </div>
                                    <div class="col-3 px-2">
                                        <button class="btn btn-success" type="submit">ثبت</button>
                                    </div>
                                </div>
                            </form>
                            <div class="col-4"></div>
                        </div>
                    @elseif($trans->PayType == 2)
                        <div class="border rounded-3 p-4">
                            <p class="text-center">مبلغ: <span class="text-info fw-bolder">{{price($trans->Price)}}</span> چک در زمان تحویل سفارش دریافت می شود. <a href="{{route('account')}}" class="btn btn-success btn-sm">تأیید</a></p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@include('layout.footer')

@endsection