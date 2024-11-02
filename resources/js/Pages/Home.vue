<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

defineProps<{
    canLogin?: boolean;
    canRegister?: boolean;
    laravelVersion: string;
    phpVersion: string;
}>();

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <header class="header-area header-style-1 header-height-2">
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="home"><img src="images/logo.png" width="40" alt="title"></a>
                    </div>
                    <div class="header-right">
                        <div class="search-style-2">
                            <form action="#">
                                <input type="text" placeholder="جستجوی محصول...">
                            </form>
                        </div>
                        <div class="header-action-right">
                            <div class="header-action-2">
                                <div class="header-action-icon-2">
                                    <a href="{{route('wishlist')}}">
                                        <img class="svgInject" alt="Evara" src="assets/imgs/theme/icons/icon-heart.svg">
                                        <span class="pro-count blue" id="WishCount">0</span>
                                    </a>
                                </div>
                                <div class="header-action-icon-2">
                                    <a href="{{route('login')}}" class=""><i class="fi-rs-user"></i></a>
                                </div>
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="cart">
                                        <img alt="Evara" src="assets/imgs/theme/icons/icon-cart.svg">
                                        <span class="pro-count blue" id="CartCount">0</span>
                                    </a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        <ul id="CartList">
                                            سبد خالی است
                                        </ul>
                                        <div class="shopping-cart-footer">
                                            <div class="shopping-cart-total">
                                                <h4>مجموع <span class="totalprice">0</span></h4>
                                            </div>
                                            <div class="shopping-cart-button">
                                                <a href="cart" class="outline">نمایش سبد</a>
                                                <a href="checkout">پرداخت</a>
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
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="{{route('home')}}"><img src="images/logo.png" alt="{{Setting('title')}}"></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <div class="main-categori-wrap d-none d-lg-block">
                            <a class="categori-button-active" href="#">
                                <span class="fi-rs-apps"></span> جستجوی دسته ها
                            </a>
                            <div class="categori-dropdown-wrap categori-dropdown-active-large">
                                <ul>
                                    <li class="has-children">
                                        <a href="shop-grid-right.html"><i class="evara-font-dress"></i>تیشرت</a>
                                        <div class="dropdown-menu">
                                            <ul class="mega-menu d-lg-flex">
                                                <li class="mega-menu-col col-lg-7">
                                                    <ul class="d-lg-flex">
                                                        <li class="mega-menu-col col-lg-6">
                                                            <ul>
                                                                <li><span class="submenu-title">عنوان</span></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">دسته</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="mega-menu-col col-lg-6">
                                                            <ul>
                                                                <li><span class="submenu-title">عنوان</span></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">دسته</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="mega-menu-col col-lg-5">
                                                    <div class="header-banner2">
                                                        <img src="assets/imgs/banner/menu-banner-2.jpg" alt="menu_banner1">
                                                        <div class="banne_info">
                                                            <h6>10% تخفیف</h6>
                                                            <h4>محصول جدید</h4>
                                                            <a href="#">خرید</a>
                                                        </div>
                                                    </div>
                                                    <div class="header-banner2">
                                                        <img src="assets/imgs/banner/menu-banner-3.jpg" alt="menu_banner2">
                                                        <div class="banne_info">
                                                            <h6>15% تخفیف</h6>
                                                            <h4>پیشنهاد داغ</h4>
                                                            <a href="#">خرید</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="has-children">
                                        <a href="shop-grid-right.html"><i class="evara-font-tshirt"></i>لباس مردانه</a>
                                        <div class="dropdown-menu">
                                            <ul class="mega-menu d-lg-flex">
                                                <li class="mega-menu-col col-lg-7">
                                                    <ul class="d-lg-flex">
                                                        <li class="mega-menu-col col-lg-6">
                                                            <ul>
                                                                <li><span class="submenu-title">عنوان</span></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">دسته</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="mega-menu-col col-lg-6">
                                                            <ul>
                                                                <li><span class="submenu-title">عنوان</span></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">دسته</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="mega-menu-col col-lg-5">
                                                    <div class="header-banner2">
                                                        <img src="assets/imgs/banner/menu-banner-4.jpg" alt="menu_banner1">
                                                        <div class="banne_info">
                                                            <h6>10% تخفیف</h6>
                                                            <h4>محصول جدید</h4>
                                                            <a href="#">خرید</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                </ul>
                                <div class="more_categories">نمایش بیشتر...</div>
                            </div>
                        </div>
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li><a class="active" href="{{route('home')}}">خانه</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="hotline d-none d-lg-block">
                        <p><i class="fi-rs-headset"></i><span>خط ویژه</span> 09123456789 </p>
                    </div>
                    <p class="mobile-promotion"><span class="text-brand">روز مادر مبارک</span> مبارک. تفیف ویژه 40 درصدی</p>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="d-flex">
                            <div class="header-action-icon-2">
                                <a href="shop-wishlist.html">
                                    <img alt="Evara" src="assets/imgs/theme/icons/icon-heart.svg">
                                    <span class="pro-count white" id="WishCount">0</span>
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#authModal">
                                    <i class="fa fa-user"></i>
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="cart">
                                    <img alt="Evara" src="assets/imgs/theme/icons/icon-cart.svg">
                                    <span class="pro-count white" id="CartCount">0</span>
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul id="CartList">
                                        سبد خالی است
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>مجموع <span class="totalprice">0</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="cart">نمایش سبد</a>
                                            <a href="checkout">پرداخت</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="header-action-icon-2 d-block d-lg-none">
                                <div class="burger-icon burger-icon-white">
                                    <span class="burger-icon-top"></span>
                                    <span class="burger-icon-mid"></span>
                                    <span class="burger-icon-bottom"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="{{route('home')}}"><img src="images/logo.png" alt="{{Setting('title')}}"></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="#">
                        <input type="text" placeholder="جستجوی محصول...">
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <div class="main-categori-wrap mobile-header-border">
                        <a class="categori-button-active-2" href="#">
                            <span class="fi-rs-apps"></span> جستجوی دسته ها
                        </a>
                        <div class="categori-dropdown-wrap categori-dropdown-active-small">
                            <ul>
                                <li><a href="shop-grid-right.html"><i class="evara-font-dress"></i>لباس زنانه</a></li>
                                <li><a href="shop-grid-right.html"><i class="evara-font-tshirt"></i>لباس مردانه</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="index.html">خانه</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="shop-grid-right.html">فروشگاه</a>
                                <ul class="dropdown">
                                    <li><a href="shop-grid-right.html">تیشرت</a></li>
                                    <li><a href="shop-grid-left.html">شلوار</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">درباره</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">تماس</a></li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap mobile-header-border">
                    <div class="single-mobile-header-info mt-30">
                        <a  href="page-contact.html"> موقعیت </a>
                    </div>
                    <div class="single-mobile-header-info">
                        @auth
                            @if(user('role') == 1)
                                <a href="{{route('admin.dashboard.panel')}}">پنل مدیریت </a>
                            @else
                                <a href="{{route('user.account.index')}}">حساب کاربری </a>
                            @endif
                        @else
                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                ورود / ثبت نام
                            </a>
                        @endauth
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="tel:09123456789">phone</a>
                    </div>
                    <!-- Button trigger modal -->

                </div>
                <div class="mobile-social-icon">
                    <h5 class="mb-15 text-grey-4">ما را دنبال کنید</h5>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <main class="main bg-grey-9">
        <section class="home-slider position-relative pt-3">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <div dir="rtl" class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                    <div class="swiper-slide"><img class="rounded-3" src="uploads/slider/2022-10/08/main-slider-1.jpg" alt=""></div>
                                    <div class="swiper-slide"><img class="rounded-3" src="uploads/slider/2022-10/08/main-slider-2.jpg" alt=""></div>
                                    <div class="swiper-slide"><img class="rounded-3" src="uploads/slider/2022-10/08/main-slider-3.jpg" alt=""></div>


                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div><img class="rounded-3" src="uploads/main-banner-top.jpg" alt=""></div>
                        <div><img class="rounded-3" src="uploads/main-bot.gif" alt=""></div>
                    </div>
                </div>
            </div>

        </section>
        <section class="featured section-padding position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-1.png" alt="">
                            <h4 class="bg-1">ارسال رایگان</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-2.png" alt="">
                            <h4 class="bg-3">سفارش آنلاین</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-3.png" alt="">
                            <h4 class="bg-2">قیمت مناسب</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-4.png" alt="">
                            <h4 class="bg-4">امتیازات ویژه</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-5.png" alt="">
                            <h4 class="bg-5">فروش تضمینی</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-6.png" alt="">
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
                                <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="/">
                                                    <img class="default-img" src="assets/imgs/shop/product-1-1.jpg" alt="">
                                                    <img class="hover-img" src="assets/imgs/shop/product-1-1.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="sale">تخفیف</span>
                                                    <span class="hot">ویژه</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap" dir="rtl">
                                            <div class="product-category">
                                                <a href="/">دسته اصلی</a>
                                            </div>
                                            <h2><a href="link">title</a></h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                    <span>90%</span>
                                                </span>
                                            </div>

                                            <div class="product-price">
                                                <span>0 تومان</span>

                                                    <span class="old-price">0 تومان</span>

                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="مشاهده محصول" class="action-btn hover-up" href="/"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab one (Featured)-->
                    <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                        <div class="row product-grid-4">
                                <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="/">
                                                    <img class="default-img" src="assets/imgs/shop/product-1-1.jpg" alt="">
                                                    <img class="hover-img" src="assets/imgs/shop/product-1-1.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="best">بیشترین فروش</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap" dir="rtl">
                                            <div class="product-category">
                                                <a href="/">دسته</a>
                                            </div>
                                            <h2><a href="/">title</a></h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                    <span>90%</span>
                                                </span>
                                            </div>

                                            <div class="product-price">
                                                <span>0 تومان</span>
                                                    <span class="old-price">0 تومان</span>
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="مشاهده محصول" class="action-btn hover-up" href="/"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab two (Popular)-->
                    <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                        <div class="row product-grid-4">

                                <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="/">
                                                    <img class="default-img" src="assets/imgs/shop/product-1-1.jpg" alt="">
                                                    <img class="hover-img" src="assets/imgs/shop/product-1-1.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="new">جدید</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap" dir="rtl">
                                            <div class="product-category">
                                                <a href="?category=cat">cat</a>
                                            </div>
                                            <h2><a href="/">title</a></h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                    <span>90%</span>
                                                </span>
                                            </div>

                                            <div class="product-price">
                                                <span>0 تومان</span>

                                                    <span class="old-price">0</span>

                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="مشاهده محصول" class="action-btn hover-up" href="/"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


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
        <section class="section-padding">
            <div class="container wow fadeIn animated">
                <h3 class="section-title mb-20">محصولات <span>جدید</span></h3>
                <div class="carausel-6-columns-cover position-relative">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
                    <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">

                            <div class="product-cart-wrap small hover-up">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="/">
                                            <img class="default-img" src="assets/imgs/shop/product-1-1.jpg" alt="">
                                            <img class="hover-img" src="assets/imgs/shop/product-1-1.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">ویژه</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap" dir="rtl">
                                    <h2><a href="/">title</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span></span>
                                    </div>
                                    <div class="product-price">
                                        <span>0 تومان</span>
                                            <span class="old-price">0</span>
                                        </div>
                                </div>
                            </div>


                        <!--End product-cart-wrap-2-->
                    </div>
                </div>
            </div>
        </section>
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
                    <div class="col-lg-12 col-md-12">
                        <div class="tab-content wow fadeIn animated" id="myTabContent-1">
                            <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                                <div class="carausel-4-columns-cover arrow-center position-relative">
                                    <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                                    <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">

                                            <div class="product-cart-wrap">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="/">
                                                            <img class="default-img" src="assets/imgs/shop/product-1-1.jpg" alt="">
                                                            <img class="hover-img" src="assets/imgs/shop/product-1-1.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">ویژه</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap" dir="rtl">
                                                    <div class="product-category">
                                                        <a href="?category=cat">cat</a>
                                                    </div>
                                                    <h2><a href="/">title</a></h2>
                                                    <div class="rating-result" title="90%">
                                                        <span>
                                                            <span>70%</span>
                                                        </span>
                                                    </div>
                                                    <div class="product-price">
                                                        <span>0 تومان </span>
                                                        <span class="old-price">0</span>
                                                    </div>
                                                    <div class="product-action-1 show">
                                                        <a aria-label="مشاهده محصول" class="action-btn hover-up" href="/"><i class="fi-rs-shopping-bag-add"></i></a>
                                                    </div>
                                                </div>
                                            </div>



                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="/">
                                                        <img class="default-img" src="assets/imgs/shop/product-1-1.jpg" alt="">
                                                        <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="new">جدید</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap" dir="rtl">
                                                <div class="product-category">
                                                    <a href="shop-grid-right.html">دسته </a>
                                                </div>
                                                <h2><a href="/">عنوان</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span>
                                                        <span>70%</span>
                                                    </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>138000</span>
                                                    <span class="old-price">145000</span>
                                                </div>
                                                <div class="product-action-1 show">
                                                    <a aria-label="مشاهده محصول" class="action-btn hover-up" href="shop-cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="/">
                                                        <img class="default-img" src="assets/imgs/shop/product-1-1.jpg" alt="">
                                                        <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="best">بهترین فروش</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap" dir="rtl">
                                                <div class="product-category">
                                                    <a href="shop-grid-right.html">دسته </a>
                                                </div>
                                                <h2><a href="/">عنوان</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span>
                                                        <span>70%</span>
                                                    </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>152000</span>
                                                    <span class="old-price">156000</span>
                                                </div>
                                                <div class="product-action-1 show">
                                                    <a aria-label="مشاهده محصول" class="action-btn hover-up" href="shop-cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="/">
                                                        <img class="default-img" src="assets/imgs/shop/product-1-1.jpg" alt="">
                                                        <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">-12%</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap" dir="rtl">
                                                <div class="product-category">
                                                    <a href="shop-grid-right.html">دسته </a>
                                                </div>
                                                <h2><a href="/">عنوان</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span>
                                                        <span>70%</span>
                                                    </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>238000</span>
                                                    <span class="old-price">245000</span>
                                                </div>
                                                <div class="product-action-1 show">
                                                    <a aria-label="مشاهده محصول" class="action-btn hover-up" href="shop-cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="/">
                                                        <img class="default-img" src="assets/imgs/shop/product-1-1.jpg" alt="">
                                                        <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="sale">تخفیف</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap" dir="rtl">
                                                <div class="product-category">
                                                    <a href="shop-grid-right.html">دسته</a>
                                                </div>
                                                <h2><a href="/">عنوان</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span>
                                                        <span>70%</span>
                                                    </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>238000</span>
                                                    <span class="old-price">245000</span>
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
                                            <div class="product-cart-wrap">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="/">
                                                            <img class="default-img" src="assets/imgs/shop/product-1-1.jpg" alt="">
                                                            <img class="hover-img" src="assets/imgs/shop/product-1-1.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">ویژه</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap" dir="rtl">
                                                    <div class="product-category">
                                                        <a href="?category=cat">cat</a>
                                                    </div>
                                                    <h2><a href="/">title</a></h2>
                                                    <div class="rating-result" title="90%">
                                                        <span>
                                                            <span>70%</span>
                                                        </span>
                                                    </div>
                                                    <div class="product-price">
                                                        <span>0 تومان </span>
                                                        <span class="old-price">0</span>
                                                    </div>
                                                    <div class="product-action-1 show">
                                                        <a aria-label="مشاهده محصول" class="action-btn hover-up" href="/"><i class="fi-rs-shopping-bag-add"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="/">
                                                        <img class="default-img" src="assets/imgs/shop/product-1-1.jpg" alt="">
                                                        <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="new">جدید</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap" dir="rtl">
                                                <div class="product-category">
                                                    <a href="shop-grid-right.html">دسته</a>
                                                </div>
                                                <h2><a href="/">عنوان</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span>
                                                        <span>70%</span>
                                                    </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>138000 </span>
                                                    <span class="old-price">145000</span>
                                                </div>
                                                <div class="product-action-1 show">
                                                    <a aria-label="مشاهده محصول" class="action-btn hover-up" href="shop-cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="/">
                                                        <img class="default-img" src="assets/imgs/shop/product-1-1.jpg" alt="">
                                                        <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="best">بهترین فروش</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap" dir="rtl">
                                                <div class="product-category">
                                                    <a href="shop-grid-right.html">ساعت</a>
                                                </div>
                                                <h2><a href="/">عنوان</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span>
                                                        <span>70%</span>
                                                    </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>152000 </span>
                                                    <span class="old-price">156000</span>
                                                </div>
                                                <div class="product-action-1 show">
                                                    <a aria-label="مشاهده محصول" class="action-btn hover-up" href="shop-cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="/">
                                                        <img class="default-img" src="assets/imgs/shop/product-1-1.jpg" alt="">
                                                        <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">-12%</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap" dir="rtl">
                                                <div class="product-category">
                                                    <a href="shop-grid-right.html">دسته</a>
                                                </div>
                                                <h2><a href="/">عنوان</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span>
                                                        <span>70%</span>
                                                    </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>238000</span>
                                                    <span class="old-price">245000</span>
                                                </div>
                                                <div class="product-action-1 show">
                                                    <a aria-label="مشاهده محصول" class="action-btn hover-up" href="shop-cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="/">
                                                        <img class="default-img" src="assets/imgs/shop/product-1-1.jpg" alt="">
                                                        <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
        <i class="fi-rs-eye"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="sale">Sale</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap" dir="rtl">
                                                <div class="product-category">
                                                    <a href="shop-grid-right.html">دسته</a>
                                                </div>
                                                <h2><a href="/">عنوان</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span>
                                                        <span>70%</span>
                                                    </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>238000</span>
                                                    <span class="old-price">245000</span>
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

                                            <div class="product-cart-wrap">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="/">
                                                            <img class="default-img" src="assets/imgs/shop/product-1-1.jpg" alt="">
                                                            <img class="hover-img" src="assets/imgs/shop/product-1-1.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">ویژه</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap" dir="rtl">
                                                    <div class="product-category">
                                                        <a href="?category=cat">cat</a>
                                                    </div>
                                                    <h2><a href="/">title</a></h2>
                                                    <div class="rating-result" title="90%">
                                                        <span>
                                                            <span>70%</span>
                                                        </span>
                                                    </div>
                                                    <div class="product-price">
                                                        <span>0 تومان </span>
                                                        <span class="old-price">0</span>
                                                    </div>
                                                    <div class="product-action-1 show">
                                                        <a aria-label="مشاهده محصول" class="action-btn hover-up" href="/"><i class="fi-rs-shopping-bag-add"></i></a>
                                                    </div>
                                                </div>
                                            </div>

                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="/">
                                                        <img class="default-img" src="assets/imgs/shop/product-1-1.jpg" alt="">
                                                        <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
        <i class="fi-rs-eye"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="new">جدید</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap" dir="rtl">
                                                <div class="product-category">
                                                    <a href="shop-grid-right.html">دسته</a>
                                                </div>
                                                <h2><a href="/">عنوان</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span>
                                                        <span>70%</span>
                                                    </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>138000 </span>
                                                    <span class="old-price">145000</span>
                                                </div>
                                                <div class="product-action-1 show">
                                                    <a aria-label="مشاهده محصول" class="action-btn hover-up" href="shop-cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="/">
                                                        <img class="default-img" src="assets/imgs/shop/product-1-1.jpg" alt="">
                                                        <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
        <i class="fi-rs-eye"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="best">فرئش ویژه</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap" dir="rtl">
                                                <div class="product-category">
                                                    <a href="shop-grid-right.html">دسته</a>
                                                </div>
                                                <h2><a href="/">عنوان</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span>
                                                        <span>70%</span>
                                                    </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>152000 </span>
                                                    <span class="old-price">156000</span>
                                                </div>
                                                <div class="product-action-1 show">
                                                    <a aria-label="مشاهده محصول" class="action-btn hover-up" href="shop-cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="/">
                                                        <img class="default-img" src="assets/imgs/shop/product-1-1.jpg" alt="">
                                                        <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
        <i class="fi-rs-eye"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">-12%</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap" dir="rtl">
                                                <div class="product-category">
                                                    <a href="shop-grid-right.html">دسته</a>
                                                </div>
                                                <h2><a href="/">عنوان</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span>
                                                        <span>70%</span>
                                                    </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>238000</span>
                                                    <span class="old-price">245000</span>
                                                </div>
                                                <div class="product-action-1 show">
                                                    <a aria-label="مشاهده محصول" class="action-btn hover-up" href="shop-cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="/">
                                                        <img class="default-img" src="assets/imgs/shop/product-1-1.jpg" alt="">
                                                        <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
        <i class="fi-rs-eye"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="sale">تخفیف</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap" dir="rtl">
                                                <div class="product-category">
                                                    <a href="shop-grid-right.html">دسته</a>
                                                </div>
                                                <h2><a href="/">عنوان</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span>
                                                        <span>70%</span>
                                                    </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>238000</span>
                                                    <span class="old-price">245000</span>
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

    </main>
    <footer class="main">
        <section class="newsletter p-30 text-white wow fadeIn animated">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 mb-md-3 mb-lg-0">
                        <div class="row align-items-center">
                            <div class="col flex-horizontal-center">
                                <img class="icon-email" src="assets/imgs/theme/icons/icon-email.svg" alt="">
                                <h4 class="font-size-20 mb-0 ms-3">در خبرنامه عضو شوید</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <!-- Subscribe Form -->
                        <form class="form-subcriber d-flex wow fadeIn animated">
                            <input type="email" class="form-control bg-white font-small" placeholder="شماره همراه...">
                            <button class="btn bg-dark text-white" type="submit">عضویت</button>
                        </form>
                        <!-- End Subscribe Form -->
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widget-about font-md mb-md-5 mb-lg-0">
                            <div class="logo logo-width-1 wow fadeIn animated">
                                <a href="{{route('home')}}"><img src="images/logo.png" alt="{{Setting('title')}}"></a>
                            </div>
                            <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">تماس</h5>
                            <p class="wow fadeIn animated">
                                <strong>آدرس: </strong>address
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>تلفن: </strong>09123456789
                            </p>
                            <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">دنبال کنید</h5>
                            <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                                <a href="https://instagram.com/{{Setting('instagram')}}" target="_blank"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                                <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                                <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                                <a href="#"><img src="assets/imgs/theme/icons/icon-youtube.svg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <h5 class="widget-title wow fadeIn animated">درباره</h5>
                        <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                            <li><a href="#">درباره ما</a></li>
                            <li><a href="#">نحوه ارسال</a></li>
                            <li><a href="#">حریم خصوصی</a></li>
                            <li><a href="#">قوانین و مقررات</a></li>
                            <li><a href="#">تماس با ما</a></li>
                            <li><a href="#">مرکز پشتیبانی</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2  col-md-3">
                        <h5 class="widget-title wow fadeIn animated">حساب</h5>
                        <ul class="footer-list wow fadeIn animated">
                            <li><a href="#">ورود</a></li>
                            <li><a href="{{route('cart')}}">مشاهده سبد</a></li>
                            <li><a href="#">پیگیری سفارش</a></li>
                            <li><a href="#">کمک</a></li>
                            <li><a href="#">سفارش</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <h5 class="widget-title wow fadeIn animated">بنر ها</h5>
                        <div class="row">
                            <div class="col-md-8 col-lg-12">
                                <div class="download-app wow fadeIn animated">
                                    <a href="#" class="hover-up"><img src="images/enamad.png" class="p-1" alt="نماد"></a>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">
                                <p class="mb-20 wow fadeIn animated">درگاه ها</p>
                                <img class="wow fadeIn animated" src="images/payir.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container pb-20 wow fadeIn animated">
            <div class="row">
                <div class="col-12 mb-20">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-lg-6">
                    <p class="float-md-left font-sm text-muted mb-0">&copy; 2023, <strong class="text-brand">Title</strong> - تمامی حقوق محفوظ است </p>
                </div>
                <div class="col-lg-6">
                    <p class="text-lg-end text-start font-sm text-muted mb-0">
                        طراحی و توسعه <a href="https://github.com/ibabaei" target="_blank">iBabaei</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <h5 class="mb-10">در حال بارگذاری</h5>
                    <div class="loader">
                        <div class="bar bar1"></div>
                        <div class="bar bar2"></div>
                        <div class="bar bar3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
