@extends('master')
@section('main')
@include('layout.header')

<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home')}}" rel="nofollow">خانه</a>
                <span></span> ثبت نام
            </div>
        </div>
    </div>
    <section class="pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-lg-6">
                            <div class="login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h3 class="mb-30">ثبت نام</h3>
                                    </div>
                                    <form class="auth">
                                        <div class="form-group row">
                                            <div class="col">
                                                <input type="text" required="" id="firstName" name="firstName" autofocus placeholder="نام">
                                            </div>
                                            <div class="col">
                                                <input type="text" id="lastName" name="lastName" autofocus placeholder="نام خانوادگی">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" placeholder="آدرس ایمیل">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" required="" id="phone" name="phone" autofocus placeholder="شماره همراه">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="pass" id="pass" placeholder="رمز عبور" autocomplete="new-password" value="">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-fill-out btn-primary btn-block hover-up submit">عضویت</button>
                                            <a class="btn btn-fill-out btn-secondary btn-block hover-up" href="{{route('login')}}">ورود</a>
                                            <div class="alert alert-warning message mt-2" style="display:none"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@include('layout.footer')
@endsection

@section('footer')

    <script>
        $(function(){
            $('#pass').val('');
        })
        $('.auth').submit('keyup keypress',function(e){
            e.preventDefault();
            console.log(e);
            var keyCode = e.keyCode || e.which;
            if($('#phone').val().length === 0){
                $('#phone').addClass('border-danger');
            }else if( keyCode === 13){

            } else {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('auth')}}",
                    type: "POST",
                    async: false,
                    data:  {
                        'firstName': $('#firstName').val(),
                        'lastName': $('#lastName').val(),
                        'email': $('#email').val(),
                        'phone': $('#phone').val(),
                        'password': $('#pass').val(),
                        'type': "{{Route::currentRouteName()}}"
                    },
                    success:function(data){
                        if(data === 'success') {
                            $('#exampleModal').modal('hide');
                            window.location.replace("{{route('home')}}");
                        } else if(data === 'exist') {
                            $('.message').text('کاربر وجود دارد').slideDown();
                            setInterval(function () {
                                $('.message').text('').slideUp()
                            }, 4000);
                        } else {
                            console.log(data)
                        }
                        $('.submit').html('ثبت');
                    },
                    error:function(e){
                        console.log(e)
                    },
                });
            }
        })
    </script>
@endsection
