@extends('website.master')
@section('main')
@include('website.layout.header')
@section('header')
    <link rel="stylesheet" href="{{asset('vendors/swiper/swiper-bundle.min.css')}}" />
    <style>
        .swiper {
          width: 100%;
          height: 100%;
        }

        .swiper-slide {
          text-align: center;
          font-size: 18px;
          background: #fff;
          display: flex;
          justify-content: center;
          align-items: center;
        }

        .swiper-slide img {
          display: block;
          width: 100%;
          height: 100%;
          object-fit: cover;
        }
      </style>

@endsection
<main class="main bg-grey-9">
    <section class="home-slider position-relative pt-3">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div dir="rtl" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach ($slider as $item)
                                <div class="swiper-slide"><img class="rounded-3" src="{{asset($item->image)}}" alt=""></div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                <div class="col-4">
                    <div><img class="rounded-3" src="{{asset('uploads/main-banner-top.jpg')}}" alt=""></div>
                    <div><img class="rounded-3" src="{{asset('uploads/main-bot.gif')}}" alt=""></div>
                </div>
            </div>
        </div>

    </section>
    <section class="featured section-padding position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{asset('assets/imgs/theme/icons/feature-1.png')}}" alt="">
                        <h4 class="bg-1">ارسال رایگان</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{asset('assets/imgs/theme/icons/feature-2.png')}}" alt="">
                        <h4 class="bg-3">سفارش آنلاین</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{asset('assets/imgs/theme/icons/feature-3.png')}}" alt="">
                        <h4 class="bg-2">قیمت مناسب</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{asset('assets/imgs/theme/icons/feature-4.png')}}" alt="">
                        <h4 class="bg-4">امتیازات ویژه</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{asset('assets/imgs/theme/icons/feature-5.png')}}" alt="">
                        <h4 class="bg-5">فروش تضمینی</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{asset('assets/imgs/theme/icons/feature-6.png')}}" alt="">
                        <h4 class="bg-6">پشتیبانی 24 ساعته</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-tabs section-padding position-relative wow fadeIn animated">
        <div class="bg-square"></div>
        <div class="container">
            <div class="tab-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">ویژه ها</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two" aria-selected="false">محبوب ترین ها</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three" type="button" role="tab" aria-controls="tab-three" aria-selected="false">جدید ترین ها</button>
                    </li>
                </ul>
                <a href="#" class="view-more d-none d-md-flex">مشاهده بیشتر<i class="fi-rs-angle-double-small-left"></i></a>
            </div>
            <!--End nav-tabs-->
            <div class="tab-content wow fadeIn animated" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">
                        @forelse ($products_featured as $item)
                            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('product',['id'=>$item->id,'title'=>str_replace(' ','-',$item->title)])}}">
                                                <img class="default-img" src="{{asset($item->PrimaryImage)}}" alt="">
                                                <img class="hover-img" src="{{asset($item->SecondaryImage)}}" alt="">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            {{-- <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a> --}}
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            @if($item->DisAmount != null OR $item->DisAmount != 0)
                                                <span class="sale">تخفیف</span>
                                            @endif
                                            @if($item->Featured == 1)
                                                <span class="hot">ویژه</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-content-wrap" dir="rtl">
                                        <div class="product-category">
                                            <a href="?category={{$item->MainCat->name}}">{{$item->MainCat->name}}</a>
                                        </div>
                                        <h2><a href="{{route('product',['id'=>$item->id,'title'=>str_replace(' ','-',$item->title)])}}">{{$item->title}}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        @php
                                            if($item->DisAmount != NULL){
                                                $price = xprice($item->Price) - $item->DisAmount;
                                            }else{
                                                $price = xprice($item->Price);
                                            }
                                        @endphp

                                        <div class="product-price">
                                            <span>{{price($price)}}</span>
                                            @if($item->DisAmount != NULL)
                                                <span class="old-price">{{price(xprice($item->Price))}}</span>
                                            @endif
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="مشاهده محصول" class="action-btn hover-up" href="{{route('product',['id'=>$item->id,'title'=>str_replace(' ','-',$item->title)])}}"><i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h4>محصول ویژه وجود ندارد</h4>
                        @endforelse
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab one (Featured)-->
                <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                    <div class="row product-grid-4">
                        @foreach ($products as $item)
                            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('product',['id'=>$item->id,'title'=>str_replace(' ','-',$item->title)])}}">
                                                <img class="default-img" src="{{asset($item->PrimaryImage)}}" alt="">
                                                <img class="hover-img" src="{{asset($item->SecondaryImage)}}" alt="">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            {{-- <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a> --}}
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="best">بیشترین فروش</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap" dir="rtl">
                                        <div class="product-category">
                                            <a href="?category={{$item->category}}">{{$item->category}}</a>
                                        </div>
                                        <h2><a href="{{route('product',['id'=>$item->id,'title'=>str_replace(' ','-',$item->title)])}}">{{$item->title}}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        @php
                                            if($item->DisAmount != NULL){
                                                $price = xprice($item->Price) - $item->DisAmount;
                                            }else{
                                                $price = xprice($item->Price);
                                            }
                                        @endphp

                                        <div class="product-price">
                                            <span>{{price($price)}}</span>
                                            @if($item->DisAmount != NULL)
                                                <span class="old-price">{{price(xprice($item->Price))}}</span>
                                            @endif
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="مشاهده محصول" class="action-btn hover-up" href="{{route('product',['id'=>$item->id,'title'=>str_replace(' ','-',$item->title)])}}"><i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab two (Popular)-->
                <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                    <div class="row product-grid-4">
                        @foreach ($products as $item)
                            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('product',['id'=>$item->id,'title'=>str_replace(' ','-',$item->title)])}}">
                                                <img class="default-img" src="{{asset($item->PrimaryImage)}}" alt="">
                                                <img class="hover-img" src="{{asset($item->SecondaryImage)}}" alt="">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            {{-- <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a> --}}
                                            {{-- <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a> --}}
                                            {{-- <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a> --}}
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="new">جدید</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap" dir="rtl">
                                        <div class="product-category">
                                            <a href="?category={{$item->category}}">{{$item->category}}</a>
                                        </div>
                                        <h2><a href="{{route('product',['id'=>$item->id,'title'=>str_replace(' ','-',$item->title)])}}">{{$item->title}}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        @php
                                            if($item->DisAmount != NULL){
                                                $price = $item->Price - $item->DisAmount;
                                            }else{
                                                $price = $item->Price;
                                            }
                                        @endphp

                                        <div class="product-price">
                                            <span>{{price($price)}}</span>
                                            @if($item->DisAmount != NULL)
                                                <span class="old-price">{{price($item->Price)}}</span>
                                            @endif
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="مشاهده محصول" class="action-btn hover-up" href="{{route('product',['id'=>$item->id,'title'=>str_replace(' ','-',$item->title)])}}"><i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab three (New added)-->
            </div>
            <!--End tab-content-->
        </div>
    </section>
    <section class="banner-2 section-padding pb-0">
        <div class="container">
            <div class="banner-img banner-big wow fadeIn animated f-none">
                <img src="assets/imgs/banner/banner-4.png" alt="">
                <div class="banner-text d-md-block d-none">
                    <h4 class="mb-15 mt-40 text-brand">بازگشت محصول</h4>
                    <h2 class="fw-600 mb-20">درصورتی که فروشنده هستید <br>اگر محصول شما فروش نرفت می توانید برگشت بزنید</h2>
                    <a href="shop-grid-right.html" class="btn">اطلاعات بیشتر <i class="fi-rs-arrow-left"></i></a>
                </div>
            </div>
        </div>
    </section>
    {{--
    <section class="popular-categories section-padding mt-15 mb-25">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20">دسته های <span>محبوب</span></h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
                <div class="carausel-6-columns" id="carausel-6-columns">
                    <div class="card-1">
                        <figure class=" img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img src="assets/imgs/shop/category-thumb-1.jpg" alt=""></a>
                        </figure>
                        <h5><a href="shop-grid-right.html">تیشرت</a></h5>
                    </div>
                    <div class="card-1">
                        <figure class=" img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"> <img src="assets/imgs/shop/category-thumb-2.jpg" alt=""></a>
                        </figure>
                        <h5><a href="shop-grid-right.html">کیف</a></h5>
                    </div>
                    <div class="card-1">
                        <figure class=" img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img src="assets/imgs/shop/category-thumb-3.jpg" alt=""></a>
                        </figure>
                        <h5><a href="shop-grid-right.html">سندل</a></h5>
                    </div>
                    <div class="card-1">
                        <figure class=" img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img src="assets/imgs/shop/category-thumb-4.jpg" alt=""></a>
                        </figure>
                        <h5><a href="shop-grid-right.html">اسکارف</a></h5>
                    </div>
                    <div class="card-1">
                        <figure class=" img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img src="assets/imgs/shop/category-thumb-5.jpg" alt=""></a>
                        </figure>
                        <h5><a href="shop-grid-right.html">کفش</a></h5>
                    </div>
                    <div class="card-1">
                        <figure class=" img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img src="assets/imgs/shop/category-thumb-6.jpg" alt=""></a>
                        </figure>
                        <h5><a href="shop-grid-right.html">بالش</a></h5>
                    </div>
                    <div class="card-1">
                        <figure class=" img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img src="assets/imgs/shop/category-thumb-7.jpg" alt=""></a>
                        </figure>
                        <h5><a href="shop-grid-right.html">شلوار گلگلی</a></h5>
                    </div>
                    <div class="card-1">
                        <figure class=" img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img src="assets/imgs/shop/category-thumb-8.jpg" alt=""></a>
                        </figure>
                        <h5><a href="shop-grid-right.html">کلاه</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
--}}
    <section class="section-padding">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20">محصولات <span>جدید</span></h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
                <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                    @foreach ($products as $item)
                        <div class="product-cart-wrap small hover-up">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{route('product',['id'=>$item->id,'title'=>str_replace(' ','-',$item->title)])}}">
                                        <img class="default-img" src="{{asset($item->primaryImage)}}" alt="">
                                        <img class="hover-img" src="{{asset($item->secondaryImage)}}" alt="">
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    {{-- <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a> --}}
                                    {{-- <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html" tabindex="0"><i class="fi-rs-heart"></i></a> --}}
                                    {{-- <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html" tabindex="0"><i class="fi-rs-shuffle"></i></a> --}}
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">ویژه</span>
                                </div>
                            </div>
                            <div class="product-content-wrap" dir="rtl">
                                <h2><a href="{{route('product',['id'=>$item->id,'title'=>str_replace(' ','-',$item->title)])}}">{{$item->title}}</a></h2>
                                <div class="rating-result" title="90%">
                                    <span></span>
                                </div>
                                @php
                                    if($item->disAmount != NULL){
                                        $price = xprice($item->price) - $item->disAmount;
                                    }else{
                                        $price = xprice($item->price);
                                    }
                                @endphp
                                <div class="product-price">
                                    <span>{{price($price)}}</span>
                                    @if($item->disAmount != NULL)
                                        <span class="old-price">{{price(xprice($item->price))}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!--End product-cart-wrap-2-->
                </div>
            </div>
        </div>
    </section>
{{--
    <section class="section-padding">
        <div class="container">
            <h3 class="section-title mb-20 wow fadeIn animated">برند های <span>ویژه</span></h3>
            <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-3-arrows"></div>
                <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-1.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-2.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-3.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-4.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-5.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-6.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-3.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    --}}
    <section class="bg-grey-9 section-padding">
        <div class="container pt-25 pb-25">
            <div class="heading-tab d-flex" dir="rtl">
                <div class="heading-tab-left wow fadeIn animated">
                    <h3 class="section-title mb-20">بهترین فروش <span>ماهانه</span></h3>
                </div>
                <div class="heading-tab-right wow fadeIn animated">
                    <ul class="nav nav-tabs right no-border" id="myTab-1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-one-1" data-bs-toggle="tab" data-bs-target="#tab-one-1" type="button" role="tab" aria-controls="tab-one" aria-selected="true">ویژه ها</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-two-1" data-bs-toggle="tab" data-bs-target="#tab-two-1" type="button" role="tab" aria-controls="tab-two" aria-selected="false">محبوب</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-three-1" data-bs-toggle="tab" data-bs-target="#tab-three-1" type="button" role="tab" aria-controls="tab-three" aria-selected="false">جدید ترین</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                {{-- <div class="col-lg-3 d-none d-lg-flex">
                    <div class="banner-img style-2 wow fadeIn animated">
                        <img src="assets/imgs/banner/banner-9.jpg" alt="">
                        <div class="banner-text">
                            <span>زنانه</span>
                            <h4 class="mt-5">17 درصد تفیف<br>لباس های زنانه</h4>
                            <a href="" class="text-white">خرید <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-12 col-md-12">
                    <div class="tab-content wow fadeIn animated" id="myTabContent-1">
                        <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                            <div class="carausel-4-columns-cover arrow-center position-relative">
                                <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                                <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                                    @foreach ($products as $item)
                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="{{route('product',['id'=>$item->id,'title'=>str_replace(' ','-',$item->title)])}}">
                                                        <img class="default-img" src="{{asset($item->PrimaryImage)}}" alt="">
                                                        <img class="hover-img" src="{{asset($item->SecondaryImage)}}" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    {{-- <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a> --}}
                                                    {{-- <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a> --}}
                                                    {{-- <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a> --}}
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">ویژه</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap" dir="rtl">
                                                <div class="product-category">
                                                    <a href="?category={{$item->category}}">{{$item->category}}</a>
                                                </div>
                                                <h2><a href="{{route('product',['id'=>$item->id,'title'=>str_replace(' ','-',$item->title)])}}">{{$item->title}}</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span>
                                                        <span>70%</span>
                                                    </span>
                                                </div>
                                                @php
                                                    if($item->DisAmount != NULL){
                                                        $price = $item->Price - $item->DisAmount;
                                                    }else{
                                                        $price = $item->Price;
                                                    }
                                                @endphp
                                                <div class="product-price">
                                                    <span>{{price($price)}} </span>
                                                    <span class="old-price">{{price($item->Price)}}</span>
                                                </div>
                                                <div class="product-action-1 show">
                                                    <a aria-label="مشاهده محصول" class="action-btn hover-up" href="{{route('product',['id'=>$item->id,'title'=>str_replace(' ','-',$item->title)])}}"><i class="fi-rs-shopping-bag-add"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{route('product',['id'=>1,'title'=>'test'])}}">
                                                    <img class="default-img" src="assets/imgs/shop/product-2-1.jpg" alt="">
                                                    <img class="hover-img" src="assets/imgs/shop/product-2-2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                {{-- <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a> --}}
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="new">جدید</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap" dir="rtl">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html">دسته </a>
                                            </div>
                                            <h2><a href="{{route('product',['id'=>1,'title'=>'test'])}}">عنوان</a></h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                    <span>70%</span>
                                                </span>
                                            </div>
                                            <div class="product-price">
                                                <span>{{price(138000)}}</span>
                                                <span class="old-price">{{price(145000)}}</span>
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="مشاهده محصول" class="action-btn hover-up" href="shop-cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{route('product',['id'=>1,'title'=>'test'])}}">
                                                    <img class="default-img" src="assets/imgs/shop/product-3-1.jpg" alt="">
                                                    <img class="hover-img" src="assets/imgs/shop/product-3-2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                {{-- <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a> --}}
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="best">بهترین فروش</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap" dir="rtl">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html">دسته </a>
                                            </div>
                                            <h2><a href="{{route('product',['id'=>1,'title'=>'test'])}}">عنوان</a></h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                    <span>70%</span>
                                                </span>
                                            </div>
                                            <div class="product-price">
                                                <span>{{price(152000)}}</span>
                                                <span class="old-price">{{price(156000)}}</span>
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="مشاهده محصول" class="action-btn hover-up" href="shop-cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{route('product',['id'=>1,'title'=>'test'])}}">
                                                    <img class="default-img" src="assets/imgs/shop/product-4-1.jpg" alt="">
                                                    <img class="hover-img" src="assets/imgs/shop/product-4-2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                {{-- <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a> --}}
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">-12%</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap" dir="rtl">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html">دسته </a>
                                            </div>
                                            <h2><a href="{{route('product',['id'=>1,'title'=>'test'])}}">عنوان</a></h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                    <span>70%</span>
                                                </span>
                                            </div>
                                            <div class="product-price">
                                                <span>{{price(238000)}}</span>
                                                <span class="old-price">{{price(245000)}}</span>
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="مشاهده محصول" class="action-btn hover-up" href="shop-cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{route('product',['id'=>1,'title'=>'test'])}}">
                                                    <img class="default-img" src="assets/imgs/shop/product-11-1.jpg" alt="">
                                                    <img class="hover-img" src="assets/imgs/shop/product-11-2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                {{-- <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a> --}}
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="sale">تخفیف</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap" dir="rtl">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html">دسته</a>
                                            </div>
                                            <h2><a href="{{route('product',['id'=>1,'title'=>'test'])}}">عنوان</a></h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                    <span>70%</span>
                                                </span>
                                            </div>
                                            <div class="product-price">
                                                <span>{{price(238000)}}</span>
                                                <span class="old-price">{{price(245000)}}</span>
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="مشاهده محصول" class="action-btn hover-up" href="shop-cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End tab-pane-->
                        <div class="tab-pane fade" id="tab-two-1" role="tabpanel" aria-labelledby="tab-two-1">
                            <div class="carausel-4-columns-cover arrow-center position-relative">
                                <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-2-arrows"></div>
                                <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns-2">
                                    @foreach ($products as $item)
                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="{{route('product',['id'=>$item->id,'title'=>str_replace(' ','-',$item->title)])}}">
                                                        <img class="default-img" src="{{asset($item->PrimaryImage)}}" alt="">
                                                        <img class="hover-img" src="{{asset($item->SecondaryImage)}}" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    {{-- <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a> --}}
                                                    {{-- <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a> --}}
                                                    {{-- <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a> --}}
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">ویژه</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap" dir="rtl">
                                                <div class="product-category">
                                                    <a href="?category={{$item->category}}">{{$item->category}}</a>
                                                </div>
                                                <h2><a href="{{route('product',['id'=>$item->id,'title'=>str_replace(' ','-',$item->title)])}}">{{$item->title}}</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span>
                                                        <span>70%</span>
                                                    </span>
                                                </div>
                                                @php
                                                    if($item->DisAmount != NULL){
                                                        $price = $item->Price - $item->DisAmount;
                                                    }else{
                                                        $price = $item->Price;
                                                    }
                                                @endphp
                                                <div class="product-price">
                                                    <span>{{price($price)}} </span>
                                                    <span class="old-price">{{price($item->Price)}}</span>
                                                </div>
                                                <div class="product-action-1 show">
                                                    <a aria-label="مشاهده محصول" class="action-btn hover-up" href="{{route('product',['id'=>$item->id,'title'=>str_replace(' ','-',$item->title)])}}"><i class="fi-rs-shopping-bag-add"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{route('product',['id'=>1,'title'=>'test'])}}">
                                                    <img class="default-img" src="assets/imgs/shop/product-7-1.jpg" alt="">
                                                    <img class="hover-img" src="assets/imgs/shop/product-7-2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                {{-- <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a> --}}
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="new">جدید</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap" dir="rtl">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html">دسته</a>
                                            </div>
                                            <h2><a href="{{route('product',['id'=>1,'title'=>'test'])}}">عنوان</a></h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                    <span>70%</span>
                                                </span>
                                            </div>
                                            <div class="product-price">
                                                <span>{{price(138000)}} </span>
                                                <span class="old-price">{{price(145000)}}</span>
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="مشاهده محصول" class="action-btn hover-up" href="shop-cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{route('product',['id'=>1,'title'=>'test'])}}">
                                                    <img class="default-img" src="assets/imgs/shop/product-5-1.jpg" alt="">
                                                    <img class="hover-img" src="assets/imgs/shop/product-5-1.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                {{-- <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a> --}}
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="best">بهترین فروش</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap" dir="rtl">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html">ساعت</a>
                                            </div>
                                            <h2><a href="{{route('product',['id'=>1,'title'=>'test'])}}">عنوان</a></h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                    <span>70%</span>
                                                </span>
                                            </div>
                                            <div class="product-price">
                                                <span>{{price(152000)}} </span>
                                                <span class="old-price">{{price(156000)}}</span>
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="مشاهده محصول" class="action-btn hover-up" href="shop-cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{route('product',['id'=>1,'title'=>'test'])}}">
                                                    <img class="default-img" src="assets/imgs/shop/product-10-1.jpg" alt="">
                                                    <img class="hover-img" src="assets/imgs/shop/product-10-2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                {{-- <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a> --}}
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">-12%</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap" dir="rtl">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html">دسته</a>
                                            </div>
                                            <h2><a href="{{route('product',['id'=>1,'title'=>'test'])}}">عنوان</a></h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                    <span>70%</span>
                                                </span>
                                            </div>
                                            <div class="product-price">
                                                <span>{{price(238000)}}</span>
                                                <span class="old-price">{{price(245000)}}</span>
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="مشاهده محصول" class="action-btn hover-up" href="shop-cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{route('product',['id'=>1,'title'=>'test'])}}">
                                                    <img class="default-img" src="assets/imgs/shop/product-12-1.jpg" alt="">
                                                    <img class="hover-img" src="assets/imgs/shop/product-12-2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                {{-- <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
    <i class="fi-rs-eye"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a> --}}
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="sale">Sale</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap" dir="rtl">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html">دسته</a>
                                            </div>
                                            <h2><a href="{{route('product',['id'=>1,'title'=>'test'])}}">عنوان</a></h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                    <span>70%</span>
                                                </span>
                                            </div>
                                            <div class="product-price">
                                                <span>{{price(238000)}}</span>
                                                <span class="old-price">{{price(245000)}}</span>
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="مشاهده محصول" class="action-btn hover-up" href="shop-cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-three-1" role="tabpanel" aria-labelledby="tab-three-1">
                            <div class="carausel-4-columns-cover arrow-center position-relative">
                                <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-3-arrows"></div>
                                <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns-3">
                                    @foreach ($products as $item)
                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="{{route('product',['id'=>$item->id,'title'=>str_replace(' ','-',$item->title)])}}">
                                                        <img class="default-img" src="{{asset($item->primaryImage)}}" alt="">
                                                        <img class="hover-img" src="{{asset($item->secondaryImage)}}" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    {{-- <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a> --}}
                                                    {{-- <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a> --}}
                                                    {{-- <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a> --}}
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">ویژه</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap" dir="rtl">
                                                <div class="product-category">
                                                    <a href="?category={{$item->category}}">{{$item->category}}</a>
                                                </div>
                                                <h2><a href="{{route('product',['id'=>$item->id,'title'=>str_replace(' ','-',$item->title)])}}">{{$item->title}}</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span>
                                                        <span>70%</span>
                                                    </span>
                                                </div>
                                                @php
                                                    if($item->DisAmount != NULL){
                                                        $price = $item->price - $item->disAmount;
                                                    }else{
                                                        $price = $item->price;
                                                    }
                                                @endphp
                                                <div class="product-price">
                                                    <span>{{price($price)}} </span>
                                                    <span class="old-price">{{price($item->price)}}</span>
                                                </div>
                                                <div class="product-action-1 show">
                                                    <a aria-label="مشاهده محصول" class="action-btn hover-up" href="{{route('product',['id'=>$item->id,'title'=>str_replace(' ','-',$item->title)])}}"><i class="fi-rs-shopping-bag-add"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach                                <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{route('product',['id'=>1,'title'=>'test'])}}">
                                                    <img class="default-img" src="assets/imgs/shop/product-13-1.jpg" alt="">
                                                    <img class="hover-img" src="assets/imgs/shop/product-13-2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                {{-- <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
    <i class="fi-rs-eye"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a> --}}
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="new">جدید</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap" dir="rtl">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html">دسته</a>
                                            </div>
                                            <h2><a href="{{route('product',['id'=>1,'title'=>'test'])}}">عنوان</a></h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                    <span>70%</span>
                                                </span>
                                            </div>
                                            <div class="product-price">
                                                <span>{{price(138000)}} </span>
                                                <span class="old-price">{{price(145000)}}</span>
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="مشاهده محصول" class="action-btn hover-up" href="shop-cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{route('product',['id'=>1,'title'=>'test'])}}">
                                                    <img class="default-img" src="assets/imgs/shop/product-14-1.jpg" alt="">
                                                    <img class="hover-img" src="assets/imgs/shop/product-14-2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                {{-- <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
    <i class="fi-rs-eye"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a> --}}
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="best">فرئش ویژه</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap" dir="rtl">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html">دسته</a>
                                            </div>
                                            <h2><a href="{{route('product',['id'=>1,'title'=>'test'])}}">عنوان</a></h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                    <span>70%</span>
                                                </span>
                                            </div>
                                            <div class="product-price">
                                                <span>{{price(152000)}} </span>
                                                <span class="old-price">{{price(156000)}}</span>
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="مشاهده محصول" class="action-btn hover-up" href="shop-cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{route('product',['id'=>1,'title'=>'test'])}}">
                                                    <img class="default-img" src="assets/imgs/shop/product-15-1.jpg" alt="">
                                                    <img class="hover-img" src="assets/imgs/shop/product-15-2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                {{-- <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
    <i class="fi-rs-eye"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a> --}}
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">-12%</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap" dir="rtl">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html">دسته</a>
                                            </div>
                                            <h2><a href="{{route('product',['id'=>1,'title'=>'test'])}}">عنوان</a></h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                    <span>70%</span>
                                                </span>
                                            </div>
                                            <div class="product-price">
                                                <span>{{price(238000)}}</span>
                                                <span class="old-price">{{price(245000)}}</span>
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="مشاهده محصول" class="action-btn hover-up" href="shop-cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{route('product',['id'=>1,'title'=>'test'])}}">
                                                    <img class="default-img" src="assets/imgs/shop/product-11-1.jpg" alt="">
                                                    <img class="hover-img" src="assets/imgs/shop/product-11-2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                {{-- <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
    <i class="fi-rs-eye"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a> --}}
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="sale">تخفیف</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap" dir="rtl">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html">دسته</a>
                                            </div>
                                            <h2><a href="{{route('product',['id'=>1,'title'=>'test'])}}">عنوان</a></h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                    <span>70%</span>
                                                </span>
                                            </div>
                                            <div class="product-price">
                                                <span>{{price(238000)}}</span>
                                                <span class="old-price">{{price(245000)}}</span>
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="مشاهده محصول" class="action-btn hover-up" href="shop-cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End tab-content-->
                </div>
                <!--End Col-lg-9-->
            </div>
        </div>
    </section>
{{--
    <section class="mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-bg wow fadeIn animated" style="background-image: url('assets/imgs/banner/banner-8.jpg')">
                        <div class="banner-content">
                            <h5 class="text-grey-4 mb-15">بنر نمونه. مثال:</h5>
                            <h2 class="fw-600"><span class="text-brand">روز مادر مبارک</span> تخفیف 40 درصدی</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    --}}
</main>
@include('website.layout.footer')
@section('footer')
<script src="{{asset('vendors/swiper/swiper-bundle.min.js')}}"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>

@endsection
@endsection
