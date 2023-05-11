<footer class="main">
    <section class="newsletter p-30 text-white wow fadeIn animated">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-md-3 mb-lg-0">
                    <div class="row align-items-center">
                        <div class="col flex-horizontal-center">
                            <img class="icon-email" src="{{asset('/assets/imgs/theme/icons/icon-email.svg')}}" alt="">
                            <h4 class="font-size-20 mb-0 ml-3">در خبرنامه عضو شوید</h4>
                        </div>
                        {{-- <div class="col my-4 my-md-0 des">
                            <h5 class="font-size-15 ml-4 mb-0">...and receive <strong>$25 coupon for first shopping.</strong></h5>
                        </div> --}}
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
                            <a href="{{route('home')}}"><img src="@if(Setting('logo')!=''){{Setting('logo')}}@else{{asset('images/logo.png')}}@endif" alt="{{Setting('title')}}"></a>
                        </div>
                        <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">تماس</h5>
                        <p class="wow fadeIn animated">
                            <strong>آدرس: </strong>{{Setting('address')}}
                        </p>
                        <p class="wow fadeIn animated">
                            <strong>تلفن: </strong>{{Setting('phone')}}
                        </p>
                        {{-- <p class="wow fadeIn animated">
                            <strong>Hours: </strong>10:00 - 18:00, Mon - Sat
                        </p> --}}
                        <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">دنبال کنید</h5>
                        <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                            <a href="https://instagram.com/{{Setting('instagram')}}" target="_blank"><img src="{{asset('/assets/imgs/theme/icons/icon-instagram.svg')}}" alt=""></a>
                            {{-- <a href="#"><img src="{{asset('/assets/imgs/theme/icons/icon-facebook.svg')}}" alt=""></a>
                            <a href="#"><img src="{{asset('/assets/imgs/theme/icons/icon-twitter.svg')}}" alt=""></a>
                            <a href="#"><img src="{{asset('/assets/imgs/theme/icons/icon-pinterest.svg')}}" alt=""></a>
                            <a href="#"><img src="{{asset('/assets/imgs/theme/icons/icon-youtube.svg')}}" alt=""></a> --}}
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
                        {{-- <li><a href="#">علاقه مندی ها</a></li> --}}
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
                                <a href="#" class="hover-up"><img src="{{asset('images/enamad.png')}}" class="p-1" alt="نماد"></a>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">
                            <p class="mb-20 wow fadeIn animated">درگاه ها</p>
                            <img class="wow fadeIn animated" src="{{asset('images/payir.svg')}}" alt="">
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
                <p class="float-md-left font-sm text-muted mb-0">&copy; {{date('Y')}}, <strong class="text-brand">{{Setting('title')}}</strong> - تمامی حقوق محفوظ است </p>
            </div>
            <div class="col-lg-6">
                <p class="text-lg-end text-start font-sm text-muted mb-0">
                    طراحی و توسعه <a href="https://instagram.com/babaeidev" target="_blank">BabaeiDev</a>
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
<!-- Vendor JS-->
<script src="{{asset('assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/slick.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.syotimer.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/wow.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery-ui.js')}}"></script>
<script src="{{asset('assets/js/plugins/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assets/js/plugins/magnific-popup.js')}}"></script>
<script src="{{asset('assets/js/plugins/select2.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/waypoints.js')}}"></script>
<script src="{{asset('assets/js/plugins/counterup.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.countdown.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/images-loaded.js')}}"></script>
<script src="{{asset('assets/js/plugins/isotope.js')}}"></script>
<script src="{{asset('assets/js/plugins/scrollup.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.vticker-min.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.theia.sticky.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.elevatezoom.js')}}"></script>
<!-- Template  JS -->
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('assets/js/shop.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-left",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    @if(Session::has('message'))
        var type = "{{Session::get('type','info')}}"
        switch(type){
            case 'info':
                toastr.info("{{Session::get('message')}}");
            break;
            case 'success':
                toastr.success("{{Session::get('message')}}");
            break;
            case 'warning':
                toastr.warning("{{Session::get('message')}}");
            break;
            case 'danger':
                toastr.error("{{Session::get('message')}}");
            break;
        }
    @endif

</script>

<script>
    $(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{route('getcart')}}",
            type: 'GET',
            data: {
                page: '{{Request::route()->getName()}}'
            },
            success:function(result){
                if(result.length == 0){
                    $('#CartBox').html('<h3>سبد خرید شما خالی است</h3>');
                } else {
                    if('{{Request::route()->getName()}}' == 'cart'){
                        $('.shopping-summery tbody').html(result.data2);
                    } else if('{{Request::route()->getName()}}' == 'checkout'){
                        $('.order_table tbody').html(result.data3);
                    }
                    $('#CartList').html(result.data)
                    $('.totalprice').text(result.total)
                    $('.pro-count').text(document.querySelectorAll("#CartList li").length)
                }
            }
        })
        $('#CartList, #CartBox').on('click','.shopping-cart-delete a',function(e){
            e.preventDefault();
            $.ajax({
                url: "{{route('removeitem')}}",
                type: 'GET',
                data: {
                    id: $(this).attr('data-id'),
                    color: $(this).attr('data-color').replace('#', ''),
                    size: $(this).attr('data-size'),
                    page: '{{Request::route()->getName()}}',
                },
                success:function(result){
                    $('#CartList').html(result.data);
                    $('.pro-count').text(document.querySelectorAll("#CartList li").length)
                    if('{{Request::route()->getName()}}' == 'cart'){
                        $('.shopping-summery tbody').html(result.data2);
                    }
                    if(document.querySelectorAll("#CartList li").length == 0){
                        if('{{Request::route()->getName()}}' == 'cart'){
                            $('#CartBox').html('<h3>سبد خرید شما خالی است</h3>')
                        }
                        $('#CartList').text('سبد خالی است')
                        $('.totalprice').text(0)
                    } else {
                        $('.totalprice').text(result.total)
                    }
                    toastr.success(result.message.text)
                },
                error:function(e){
                    console.log(e)
                }
            })
        })
        $('.detail-extralink, tbody').on('click','.num-in span',function () {
            var $input = $(this).parents('.num-block').find('input.in-num');
            var max = $('#Count').attr('max')
            if($(this).hasClass('minus')) {
                var count = parseFloat($input.val()) - 1;
                count = count < 0 ? 0 : count;
    
                if (count < 2) {
                    $(this).addClass('dis');
                }else {
                    $(this).removeClass('dis');
                }
                $input.val(count);
            } else {
                var count = parseFloat($input.val()) + 1
                if(count > max){
                    count = count - 1
                } else {
                    count = count;
                }
                $input.val(count);
                if (count > 1) {
                    $(this).parents('.num-block').find(('.minus')).removeClass('dis');
                }
            }
            $input.change();
            return false;
        });
    })
</script>