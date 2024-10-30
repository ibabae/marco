<footer class="main">
    <section class="newsletter p-30 text-white wow fadeIn animated">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-md-3 mb-lg-0">
                    <div class="row align-items-center">
                        <div class="col flex-horizontal-center">
                            <img class="icon-email" src="{{asset('/assets/imgs/theme/icons/icon-email.svg')}}" alt="">
                            <h4 class="font-size-20 mb-0 ms-3">در خبرنامه عضو شوید</h4>
                        </div>
                        {{-- <div class="col my-4 my-md-0 des">
                            <h5 class="font-size-15 ms-4 mb-0">...and receive <strong>$25 coupon for first shopping.</strong></h5>
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
<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
            <form method="post" id="add-address" action="{{route('account.address.post')}}">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>استان <span class="required text-danger">*</span></label>
                        <input required class="form-control square" name="state" >
                    </div>
                    <div class="form-group col-md-6">
                        <label>شهر<span class="required text-danger">*</span></label>
                        <input required class="form-control square" name="city">
                    </div>
                    <div class="form-group col-md-12">
                        <label>آدرس <span class="required text-danger">*</span></label>
                        <input required class="form-control square" name="address" type="text">
                    </div>
                    <div class="form-group col-md-6">
                        <label>کد پستی </label>
                        <input class="form-control square" name="zipcode" type="number">
                    </div>
                    <div class="form-group col-md-6">
                        <label>پلاک</label>
                        <input class="form-control square" name="pelak" type="number">
                    </div>
                    <div class="col-md-12">
                        <div class="form-check px-4">
                            <label for="primary">پیشفرض</label>
                            <input class="form-check-input" id="primary" name="primary" type="checkbox">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-fill-out submit">ثبت</button>
                    </div>
                </div>
            </form>
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


    $(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#add-address').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response){
                    console.log(response);
                    $('#addressModal').modal('hide');
                    toastr.success(response.message);
                    var $box = $('#address-box');
                    $box.empty()
                    $.each(response.data, function(key, row) {
                        var address = row.address;
                        var pelak = row.number != null ? ' پلاک ' +row.number : '';
                        var zipcode = row.zipcode != null ? ' کدپستی ' +row.zipcode : '';
                        console.log(address,pelak,zipcode)
                        $box.append(
                            $('<div>').attr({
                                class: 'custome-radio'
                            })
                            .append(
                                $('<input>').attr({
                                    class: "form-check-input",
                                    type:"radio",
                                    name: "address",
                                    value: row.id,
                                    id: 'address-'+row.id,
                                    checked: row.primary ? true : false
                                })
                            )
                            .append(
                                $('<label>').attr({
                                    class: 'form-check-label',
                                    for: "address-"+row.id,
                                    'data-bs-toggle': "collapse",
                                    'data-target': "#address-"+row.id,
                                    'aria-controls': row.id,
                                }).html(row.state.name+' - '+row.city.name+' - '+address+' '+pelak+' '+zipcode)
                            )
                            .append(
                                $('<div>').attr({
                                    class: 'form-group collapse in',
                                    id: row.id
                                }).append(
                                    $('<p>').attr({
                                        class: "text-muted mt-5"
                                    }).html(row.address)
                                )
                            )
                        )
                    }.bind('#address-box'));

                },
                error:function(xhr, status, error){
                    console.log(xhr.status)
                    $('.loading-overlay').removeClass('d-flex').addClass('d-none')
                    $('.overlay').fadeOut();
                    // console.log(xhr)
                    if(xhr.status == 422){
                        let message = Object.entries(xhr.responseJSON.message)
                        for (var i = 0; i < message.length; i++) {
                            toastr.warning(message[i][1]);
                            if(message[i][0] == 'excerpt'){
                                $("textarea[name="+message[i][0]+"]").addClass('border-warning')
                            }else if(message[i][0] == 'content'){
                                $("#quilleditor").addClass('border-warning')
                            } else {
                                if($('input')){
                                    $("input[name="+message[i][0]+"]").addClass('border-warning')
                                }
                            }
                        }
                    } else {
                        toastr.error(xhr.responseJSON.message);
                    }
                }
            })
        })
        $.ajax({
            url: "{{route('getcart')}}",
            type: 'GET',
            data: {
                page: '{{Request::route()->getName()}}'
            },
            success:function(result){
                if(result.data.length == 0){
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
        $('#CartList, #CartBox, .table-responsive').on('click','.shopping-cart-delete a',function(e){
            e.preventDefault();
            $.ajax({
                url: "{{route('removeitem')}}",
                type: 'GET',
                data: {
                    id: $(this).attr('data-id'),
                    color: $(this).attr('data-color'),
                    size: $(this).attr('data-size'),
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
        $('.detail-extralink, .table-responsive').on('click','.num-in span',function () {
            var $input = $(this).parents('.num-block').find('input.in-num');
            var max = $('.count').attr('max')
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
    $(function(){
        $('.code-box').slideUp();
        $('.auth').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: new FormData(this),
                processData: false,
                contentType: false,
                success:function(response){
                    console.log(response)
                    refreshCaptcha()
                    if(response.data == 'getCode'){
                        $('.auth #codebox').focus();
                        $('#captcha').val('');
                        $('.resend-msg').slideDown();
                        $('.phone-box').slideUp();
                        $('.code-box').slideDown();
                        $("#loading-message").slideUp()
                        $('.full_form').removeClass('overlay__inner')
                        $('#phone').text(response.phone)
                        $('#time').text(response.time)
                        $('.login-btn').text('ورود به داشبورد')
                        var seconds = response.time;
                    }else if(response.data == 'resend'){
                        var seconds = response.time;
                    } else {
                        // window.location.replace("{{url()->current()}}");
                        location.reload();
                    }
                    var countdown = setInterval(function() {
                        seconds--;
                        if (seconds >= 0) {
                            $('#time').text(seconds);
                        } else {
                            $('.resend-msg').slideUp();
                            // $('.login-btn').slideUp();
                            $('.resend').slideDown()
                            clearInterval(countdown);
                        }
                    }, 1000)
                },
                error: function(xhr, status, error) {
                    refreshCaptcha()
                    console.log(xhr)
                    let messages = Object.entries(xhr.responseJSON.message)
                    for (var i = 0; i < messages.length; i++) {
                        toastr.error(messages[i][1]);
                        $("input[name="+messages[i][0]+"]").addClass('border-danger')
                    }
                }
            });
        })
        // const inputElements = [...document.querySelectorAll('input.code-input')]

        // inputElements.forEach((ele,index)=>{
        //     ele.addEventListener('keydown',(e)=>{
        //         if(e.keyCode === 8 && e.target.value==='') inputElements[Math.max(0,index-1)].focus()
        //     })
        //     ele.addEventListener('input',(e)=>{
        //         const [first,...rest] = e.target.value
        //         e.target.value = first ?? ''
        //         const lastInputBox = index===inputElements.length-1
        //         const didInsertContent = first!==undefined
        //         if(didInsertContent && !lastInputBox) {
        //             inputElements[index+1].focus()
        //             inputElements[index+1].value = rest.join('')
        //             inputElements[index+1].dispatchEvent(new Event('input'))
        //         }
        //         const code = inputElements.map(({value})=>value).join('')
        //         // if(code.length == 6){
        //         //     submitForm(code)
        //         // }
        //     })
        // })

        // const inputElements = document.querySelectorAll('.input');

        // inputElements.forEach((ele, index) => {

        //   ele.addEventListener('keyup', (e) => {
        //     if (e.key === 'Backspace' && e.target.value === '') {
        //       inputElements[Math.max(0, index-1)].focus();
        //     }
        //   });

        //   ele.addEventListener('input', (e) => {
        //     const [first] = e.target.value;
        //     e.target.value = first || '';

        //     if (first && index < inputElements.length - 1) {
        //       inputElements[index+1].focus();
        //       inputElements[index+1].value = e.target.value.slice(1);
        //     }

        //   });

        // });
        function submitForm(code) {
            // console.log(code)
            $('#code').val(code);
            $('.auth').submit();
        }
        $('.resend').on('click',function(e){
            e.preventDefault();
            $('.code-box').slideUp();
            $('.phone-box').slideDown();
            $('.resend').slideUp();
            $('.login-btn').slideDown();
            refreshCaptcha();
            $('.code-input').val('')
        });
        function refreshCaptcha() {
            $.get('/refresh-captcha', function (data) {
                $('#captcha-image').attr('src', data['captcha']);
            });
        }

    });

</script>
