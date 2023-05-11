@extends('master')
@section('main')
@include('layout.header')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home')}}" rel="nofollow">خانه</a>
                <span></span> صفحات
                <span></span> تماس با ما
            </div>
        </div>
    </div>
    <section class="hero-2 bg-green">
        <div class="hero-content">
            <div class="container">
                <div class="text-center">
                    <h4 class="text-brand mb-20">در ارتباط باشید</h4>
                    <h1 class="mb-20 wow fadeIn animated font-xxl fw-900">
                        از <span class="text-style-1">پیشنهادات</span> شما<br>استقبال می شود
                    </h1>
                    <p class="w-50 m-auto mb-50 wow fadeIn animated">پیشنهادات خود را با ما به اشتراک بگذارید. این به توسعه کسب و کار مشترکمان کمک میکند. </p>
                    <p class="wow fadeIn animated">
                        <a class="btn btn-brand btn-lg font-weight-bold text-white border-radius-5 btn-shadow-brand hover-up" href="{{route('about')}}">درباره ما</a>
                        <a class="btn btn-outline btn-lg btn-brand-outline font-weight-bold text-brand bg-white text-hover-white ml-15 border-radius-5 btn-shadow-brand hover-up">مرکز پشتیبانی</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="section-border pt-50 pb-50">
        <div class="container">
            <div id='map-panes' class="leaflet-map mb-50"></div>
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h4 class="mb-15 text-brand">Office</h4>
                    205 North Michigan Avenue, Suite 810<br>
                    Chicago, 60601, USA<br>
                    <abbr title="Phone">Phone:</abbr> (123) 456-7890<br>
                    <abbr title="Email">Email: </abbr><a href="http://wp.alithemes.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="02616d6c766361764247746370632c616d6f">[email&#160;protected]</a><br>
                    <a class="btn btn-outline btn-sm btn-brand-outline font-weight-bold text-brand bg-white text-hover-white mt-20 border-radius-5 btn-shadow-brand hover-up"><i class="fi-rs-marker mr-10"></i>View map</a>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h4 class="mb-15 text-brand">Studio</h4>
                    205 North Michigan Avenue, Suite 810<br>
                    Chicago, 60601, USA<br>
                    <abbr title="Phone">Phone:</abbr> (123) 456-7890<br>
                    <abbr title="Email">Email: </abbr><a href="http://wp.alithemes.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="27444849534644536762514655460944484a">[email&#160;protected]</a><br>
                    <a class="btn btn-outline btn-sm btn-brand-outline font-weight-bold text-brand bg-white text-hover-white mt-20 border-radius-5 btn-shadow-brand hover-up"><i class="fi-rs-marker mr-10"></i>View map</a>
                </div>
                <div class="col-md-4">
                    <h4 class="mb-15 text-brand">Shop</h4>
                    205 North Michigan Avenue, Suite 810<br>
                    Chicago, 60601, USA<br>
                    <abbr title="Phone">Phone:</abbr> (123) 456-7890<br>
                    <abbr title="Email">Email: </abbr><a href="http://wp.alithemes.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="c2a1adacb6a3a1b68287b4a3b0a3eca1adaf">[email&#160;protected]</a><br>
                    <a class="btn btn-outline btn-sm btn-brand-outline font-weight-bold text-brand bg-white text-hover-white mt-20 border-radius-5 btn-shadow-brand hover-up"> <i class="fi-rs-marker mr-10"></i> View map</a>
                </div>
            </div>
        </div>
    </section> --}}
    <section class="pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 m-auto">
                    <div class="contact-from-area padding-20-row-col wow FadeInUp">
                        <h3 class="mb-10 text-center">ارتباط بگیرید</h3>
                        <p class="text-muted mb-30 text-center font-sm">پیشنهاد، انتقاد یا شکایت خود را ارسال کنید</p>
                        <form class="contact-form-style text-center" id="contact-form" action="{{route('contact.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input class="form-control" name="Name" value="{{old('Name')}}" placeholder="نام" type="text">
                                        @error('Name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input class="form-control" name="Phone" value="{{old('Phone')}}" placeholder="شماره موبایل" type="number">
                                        @error('Phone')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input class="form-control" name="Location" value="{{old('Location')}}" placeholder="شهر / استان" type="tel">
                                        @error('Location')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input class="form-control" name="Subject" value="{{old('Subject')}}" placeholder="موضوع" type="text">
                                        @error('Subject')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="textarea-style mb-30">
                                        <textarea name="Message" placeholder="پیغام">{{old('Message')}}</textarea>
                                        @error('Message')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="input-style mb-20">
                                        <div class="row">
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-4 col-12">
                                                <div class="row">
                                                    <div class="col-6 ps-1">
                                                        <input type="text" class="form-control" placeholder="کد مقابل را وارد کنید..." name="captcha">
                                                    </div>
                                                    <div class="col-6 self-align-center pt-2">
                                                        <?=captcha_img()?>
                                                    </div>
                                                </div>
                                                @error('captcha')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-4"></div>
                                        </div>
                                    </div>
                                    <button class="submit submit-auto-width" type="submit">ارسال</button>
                                </div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@include('layout.footer')
@endsection