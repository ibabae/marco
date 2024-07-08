@extends('website.master')
@section('main')
    <div class="container">
        <div class="row align-items-center height-100vh text-center">
            <div class="col-lg-8 m-auto">
                <p class="mb-50"><img src="{{asset('assets/imgs/theme/404.png')}}" alt="" class="hover-up"></p>
                <h2 class="mb-30">صفحه یافت نشد</h2>
                <p class="font-lg text-grey-700 mb-30">
                    صفحه ای که به دنبال آن هستید یا وجود ندارد یا حذف شده.<br> به <a href="{{route('home')}}"> <span> خانه</span></a> بروید یا در رابطه با مشکل <a href="page-contact.html"><span>با ما تماس بگیرید</span></a>
                </p>
                <form class="contact-form-style text-center" id="contact-form" action="{{route('products')}}" method="GET">
                    <div class="row">
                        <div class="col-lg-6 m-auto">
                            <div class="input-style mb-20 hover-up">
                                <input name="q" class="form-control" placeholder="جستجو" type="text">
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-default submit-auto-width font-xs hover-up" href="{{route('home')}}">بازگشت به خانه</a>
                </form>
            </div>
        </div>
    </div>
@endsection
