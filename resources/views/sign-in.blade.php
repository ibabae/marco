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
                                        <h3 class="mb-30">ورود</h3>
                                    </div>
                                    <form class="auth">
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" placeholder="آدرس ایمیل">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="pass" id="pass" placeholder="رمز عبور" autocomplete="new-password" value="">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col">
                                                    <button class="btn btn-fill-out btn-primary btn-block hover-up submit">ورود</button>
                                                </div>
                                                <div class="col my-auto">
                                                    <a class="text-primary hover-up" href="{{route('forget')}}">فراموشی رمز عبور!</a>
                                                </div>
                                            </div>
                                            <div class="alert alert-warning message mt-2" style="display:none"></div>
                                        </div>
                                    </form>
                                    <hr class="border-secondary">
                                    <div class="row">
                                        <div class="col">
                                            حساب نداری؟ <a class="text-primary hover-up" href="{{route('register')}}">ثبت نام کن</a>
                                        </div>
                                    </div>
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
            if($('#email').val().length === 0){
                $('#email').addClass('border-danger');
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
                        'email': $('#email').val(),
                        'password': $('#pass').val(),
                        'type': "{{Route::currentRouteName()}}"
                    },
                    success:function(data){
                        if(data === 'success') {
                            $('#exampleModal').modal('hide');
                            window.location.replace("{{route('home')}}");
                        } else if(data === 'notexist') {
                            $('.message').text('کاربر وجود ندارد').slideDown();
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
