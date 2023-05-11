@extends('master')
@section('main')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{route('home')}}" rel="nofollow">خانه</a>
            <span></span> {{$product->MainCat->name}}
            <span></span> {{$product->SubCat->name}}
        </div>
    </div>
</div>
<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-detail accordion-detail">
                    <div class="row mb-50">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    @foreach ($gallery as $item)
                                        <figure class="border-radius-10">
                                            <img src="{{asset($item->Name)}}" alt="product image">
                                        </figure>
                                    @endforeach
                                </div>
                                <!-- THUMBNAILS -->
                                <div class="slider-nav-thumbnails pl-15 pr-15">
                                    @foreach ($gallery as $item)
                                        <div><img src="{{asset($item->Name)}}" alt="product image"></div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- End Gallery -->
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info">
                                <h2 class="title-detail">{{$product->Title}}</h2>
                                <div class="product-detail-rating">
                                    {{-- <div class="pro-details-brand">
                                        <span> برند: <a href="shop-grid-right.html">مارکو</a></span>
                                    </div> --}}
                                    <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width:0%">
                                            </div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (0 دیدگاه)</span>
                                    </div>
                                </div>
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        @if($product->DisAmount != NULL)
                                            <ins><span class="text-brand">{{price($product->Price - $product->DisAmount)}}</span></ins>
                                            <ins><span class="old-price font-md ml-15">{{price($product->Price)}}</span></ins>
                                            <span class="save-price  font-md color3 ml-15"> @if($product->DisType == 1) {{price($product->DisAmount)}} @else %{{$product->DisAmount}} @endif تخفیف</span>
                                        @else
                                            <ins><span class="text-brand">{{price($product->Price)}}</span></ins>
                                        @endif
                                    </div>
                                </div>
                                <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                <div class="short-desc mb-30">
                                    <p>{{$product->Descriptions}}</p>
                                </div>
                                <div class="product_sort_info font-xs mb-30">
                                    <ul>
                                        <li class="mb-10"><i class="fi-rs-crown ml-5"></i>ارسال رایگان داخل استان</li>
                                        <li class="mb-10"><i class="fi-rs-refresh ml-5"></i>بازگشت محصول در صورت عدم فروش</li>
                                        <li><i class="fi-rs-credit-card ml-5"></i>شمارش حضوری داخل استان</li>
                                    </ul>
                                </div>
                                <div class="attr-detail attr-color mb-15">
                                    <strong class="ml-10">رنگ</strong>
                                    @php
                                        $colors = [];
                                        foreach (json_decode($product->Stock ,true) as $mystock) {
                                            extract($mystock);
                                            $colors[$color][$size] = $count;
                                        }
                                        $output = [];
                                        foreach ($colors as $color => $sizes) {
                                            $data = [];
                                            foreach ($sizes as $size => $count) {
                                                $data[] = ['size' => $size, 'count' => $count];
                                            }
                                            $output[] = ['color' => $color, 'data'  => $data];
                                        }
                                    @endphp
                                    <ul class="list-filter color-filter">
                                        @foreach ($output as $item)
                                            <li><a href="#" data-color="{{$item['color']}}" class="selectcolor"><span class="border" style="background-color: {{$item['color']}}"></span></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="attr-detail attr-size" style="display: none" id="SizeBox">
                                    <strong class="ml-10">اندازه</strong>
                                    <ul class="list-filter size-filter font-small" id="SizeList"> </ul>
                                </div>
                                <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                <div class="detail-extralink">
                                    <div class="num-block skin-2 border rounded-3 p-2" style="display: none">
                                        <div class="row num-in px-1">
                                            <div class="col-3 px-1"><center><span class="plus"></span></center></div>
                                            <div class="col-6 px-0"><input type="text" name="Stock[0][count]" max="0" class="in-num p-0" value="0" readonly="" id="Count"></div>
                                            <div class="col-3 px-1"><center><span class="minus dis"></span></center></div>
                                        </div>
                                    </div>    
                                    
                                    {{-- <div class="detail-qty border radius">
                                        <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        <input class="qty-val border-0" max="1" value="1">
                                        <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                    </div> --}}
                                    <div class="product-extra-link2">
                                        <button type="submit" class="button button-add-to-cart" data-id="{{$product->id}}">افزودن به سبد</button>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                    </div>
                                </div>
                                <ul class="product-meta font-xs color-grey mt-50">
                                    <li class="mb-5">کد: {{$product->UniqueId}}</li>
                                    <li class="mb-5">برچسبها: 
                                        @php
                                            foreach(explode(',',$product->Tags) as $tag){
                                                echo '<a href="/?tag='.$tag.'" rel="tag">'.$tag.'</a>، ';
                                            }
                                        @endphp
                                    </li>
                                    {{-- <li>Availability:<span class="in-stock text-success ml-5">8 Items In Stock</span></li> --}}
                                </ul>
                            </div>
                            <!-- Detail Info -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 m-auto entry-main-content">
                            <h2 class="section-title style-1 mb-30">درباره محصول</h2>
                            <?=$product->Content?>
                            <div class="social-icons single-share mt-3">
                                <ul class="text-grey-5 d-inline-block">
                                    <li><strong class="ml-10">اشتراک گذاری:</strong></li>
                                    <li class="social-instagram"><a href="#"><img src="{{asset('/assets/imgs/theme/icons/icon-instagram.svg')}}" alt=""></a></li>
                                    <li class="social-facebook"><a href="#"><img src="{{asset('/assets/imgs/theme/icons/icon-facebook.svg')}}" alt=""></a></li>
                                    <li class="social-twitter"> <a href="#"><img src="{{asset('/assets/imgs/theme/icons/icon-twitter.svg')}}" alt=""></a></li>
                                    <li class="social-linkedin"><a href="#"><img src="{{asset('/assets/imgs/theme/icons/icon-pinterest.svg')}}" alt=""></a></li>
                                </ul>
                            </div>
                            <h3 class="section-title style-1 mb-30 mt-30">Reviews (3)</h3>
                            <!--Comments-->
                            <div class="comments-area style-2">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <h4 class="mb-30">پرسش و پاسخ مشتری</h4>
                                        <div class="comment-list">
                                            <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb text-center">
                                                        <img src="{{asset('/assets/imgs/page/avatar-6.jpg')}}" alt="">
                                                        <h6><a href="#">محمد محمدی</a></h6>
                                                        {{-- <p class="font-xxs">Since 2012</p> --}}
                                                    </div>
                                                    <div class="desc">
                                                        <div class="product-rate d-inline-block">
                                                            <div class="product-rating" style="width:90%">
                                                            </div>
                                                        </div>
                                                        <p>تشکر از شما برای ارسال در 1 روز به مشهد</p>
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <p class="font-xs mr-30">28 مرداد 1401 ساعت 11:30</p>
                                                                <a href="#" class="text-brand btn-reply">پاسخ <i class="fi-rs-arrow-left"></i> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--single-comment -->
                                            <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb text-center">
                                                        <img src="{{asset('/assets/imgs/page/avatar-7.jpg')}}" alt="">
                                                        <h6><a href="#">احسان رضایی</a></h6>
                                                        {{-- <p class="font-xxs">Since 2008</p> --}}
                                                    </div>
                                                    <div class="desc">
                                                        <div class="product-rate d-inline-block">
                                                            <div class="product-rating" style="width:90%">
                                                            </div>
                                                        </div>
                                                        <p>قیمتتون نصبت ب کیفیت عالیه.</p>
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <p class="font-xs mr-30">25 مرداد 1401 ساعت 18:47 </p>
                                                                <a href="#" class="text-brand btn-reply">پاسخ <i class="fi-rs-arrow-left"></i> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--single-comment -->
                                            <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb text-center">
                                                        <img src="{{asset('/assets/imgs/page/avatar-8.jpg')}}" alt="">
                                                        <h6><a href="#">حمید قاسمی</a></h6>
                                                        {{-- <p class="font-xxs">Since 2010</p> --}}
                                                    </div>
                                                    <div class="desc">
                                                        <div class="product-rate d-inline-block">
                                                            <div class="product-rating" style="width:90%">
                                                            </div>
                                                        </div>
                                                        <p>با کیفیت و زیبا. بیشتر از حد انتظارم خوب بود</p>
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <p class="font-xs mr-30">20 مرداد 1401 ساعت 14:18 </p>
                                                                <a href="#" class="text-brand btn-reply">پاسخ <i class="fi-rs-arrow-left"></i> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--single-comment -->
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <h4 class="mb-30">بررسی های مشتریان</h4>
                                        <div class="d-flex mb-30">
                                            <div class="product-rate d-inline-block ml-15">
                                                <div class="product-rating" style="width:90%">
                                                </div>
                                            </div>
                                            <h6>4.8 از 5</h6>
                                        </div>
                                        <div class="progress">
                                            <span>5 ستاره</span>
                                            <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                        </div>
                                        <div class="progress">
                                            <span>4 ستاره</span>
                                            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                        </div>
                                        <div class="progress">
                                            <span>3 ستاره</span>
                                            <div class="progress-bar" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                                        </div>
                                        <div class="progress">
                                            <span>2 ستاره</span>
                                            <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                                        </div>
                                        <div class="progress mb-30">
                                            <span>1 ستاره</span>
                                            <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                                        </div>
                                        {{-- <a href="#" class="font-xs text-muted">How are ratings calculated?</a> --}}
                                    </div>
                                </div>
                            </div>
                            <!--comment form-->
                            <div class="comment-form">
                                <h4 class="mb-15">افزودن دیدگاه</h4>
                                <div class="product-rate d-inline-block mb-30">
                                </div>
                                <div class="row">
                                    <div class="col-lg-8 col-md-12">
                                        <form class="form-contact comment_form" action="#" id="commentForm">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="نوشتن دیدگاه"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input class="form-control" name="name" id="name" type="text" placeholder="نام">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input class="form-control" name="email" id="email" type="email" placeholder="ایمیل">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input class="form-control" name="website" id="website" type="text" placeholder="وبسایت">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="button button-contactForm">ثبت دیدگاه</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-60">
                        <div class="col-12">
                            <h3 class="section-title style-1 mb-30">محصولات مشابه</h3>
                        </div>
                        <div class="col-12">
                            <div class="row related-products">
                                <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                    <div class="product-cart-wrap small hover-up">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="shop-product-right.html" tabindex="0">
                                                    <img class="default-img" src="{{asset('/assets/imgs/shop/product-2-1.jpg')}}" alt="">
                                                    <img class="hover-img" src="{{asset('/assets/imgs/shop/product-2-2.jpg')}}" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html" tabindex="0"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">Hot</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <h2><a href="shop-product-right.html" tabindex="0">Ulstra Bass Headphone</a></h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                </span>
                                            </div>
                                            <div class="product-price">
                                                <span>$238.85 </span>
                                                <span class="old-price">$245.8</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                    <div class="product-cart-wrap small hover-up">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="shop-product-right.html" tabindex="0">
                                                    <img class="default-img" src="{{asset('/assets/imgs/shop/product-3-1.jpg')}}" alt="">
                                                    <img class="hover-img" src="{{asset('/assets/imgs/shop/product-4-2.jpg')}}" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html" tabindex="0"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="sale">-12%</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <h2><a href="shop-product-right.html" tabindex="0">Smart Bluetooth Speaker</a></h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                </span>
                                            </div>
                                            <div class="product-price">
                                                <span>$138.85 </span>
                                                <span class="old-price">$145.8</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                    <div class="product-cart-wrap small hover-up">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="shop-product-right.html" tabindex="0">
                                                    <img class="default-img" src="{{asset('/assets/imgs/shop/product-4-1.jpg')}}" alt="">
                                                    <img class="hover-img" src="{{asset('/assets/imgs/shop/product-4-2.jpg')}}" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html" tabindex="0"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="new">New</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <h2><a href="shop-product-right.html" tabindex="0">HomeSpeak 12UEA Goole</a></h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                </span>
                                            </div>
                                            <div class="product-price">
                                                <span>$738.85 </span>
                                                <span class="old-price">$1245.8</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                    <div class="product-cart-wrap small hover-up mb-0">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="shop-product-right.html" tabindex="0">
                                                    <img class="default-img" src="{{asset('/assets/imgs/shop/product-5-1.jpg')}}" alt="">
                                                    <img class="hover-img" src="{{asset('/assets/imgs/shop/product-3-2.jpg')}}" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html" tabindex="0"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">Hot</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <h2><a href="shop-product-right.html" tabindex="0">Dadua Camera 4K 2021EF</a></h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                </span>
                                            </div>
                                            <div class="product-price">
                                                <span>$89.8 </span>
                                                <span class="old-price">$98.8</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="banner-img banner-big wow fadeIn f-none animated mt-50">
                        <img class="border-radius-10" src="{{asset('/assets/imgs/banner/banner-4.png')}}" alt="">
                        <div class="banner-text">
                            <h4 class="mb-15 mt-40">Repair Services</h4>
                            <h2 class="fw-600 mb-20">We're an Apple <br>Authorised Service Provider</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('footer')
    <script>
        $(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.selectcolor').on('click',function(e){
                $('.num-block').hide();
                $('#Count').attr('max',0).val('0');
                $.ajax({
                    url: "{{route('stock')}}",
                    type: "GET",
                    data: {
                        id: '{{$product->id}}',
                        type: 1,
                        color: $(this).attr('data-color')
                    },
                    success:function(data){
                        $('#SizeBox').show();
                        $('#SizeList').html(data)
                    },
                    error:function(data){
                        console.log(data)
                    }

                })
            })
            $('#SizeList').on('click','a.SizeItem',function(e){
                $('.num-block').show();
                $("#SizeBox .active").removeClass("active");
                $(this).parent().addClass('active');
                $.ajax({
                    url: "{{route('stock')}}",
                    type: "GET",
                    data: {
                        id: '{{$product->id}}',
                        type: 2,
                        color: $("ul.color-filter li.active a.selectcolor").attr('data-color'),
                        size: $(this).text()
                    },
                    success:function(data){
                        $('#Count').attr('max',data).val('0');
                    },
                    error:function(data){
                        console.log(data)
                    }
                })
            })
            
            
            $('.button-add-to-cart').on('click',function(e){
                var id = $(this).attr('data-id');
                var color = $("ul.color-filter li.active a.selectcolor").attr('data-color');
                var size = $("ul#SizeList li.active a.SizeItem").text();
                var count = $('#Count').val();
                e.preventDefault();
                if(typeof id !== 'undefined' && typeof color !== 'undefined' && typeof size !== 'undefined' && typeof count !== 'undefined'){
                    $.ajax({
                        url: "{{route('addtocart')}}",
                        type: 'GET',
                        data: {
                            id: $(this).attr('data-id'),
                            color: $("ul.color-filter li.active a.selectcolor").attr('data-color'),
                            size: $("ul#SizeList li.active a.SizeItem").text(),
                            count: $('#Count').val(),
                        },
                        success:function(result){
                            $('#CartList').html(result.data);
                            $('#CartCount').text(document.querySelectorAll("#CartList li").length)
                            $('.shopping-cart-total h4 span').text(result.total)
                            if(result.message.type == 'success'){
                                toastr.success(result.message.text)
                            } else {
                                toastr.warning(result.message.text)
                            }
                        },
                        error:function(e){
                            console.log(e)
                        }
                    })
                } else {
                    console.log('error')
                }
            })
        })
    </script>
@endsection