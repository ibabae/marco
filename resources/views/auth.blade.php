@extends('master')
@section('main')
@include('layout.header')

<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home')}}" rel="nofollow">خانه</a>
                <span></span> ورود / ثبت نام
            </div>
        </div>
    </div>
    <section class="pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-lg-5">
                            <div class="login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h3 class="mb-30">ورود / ثبت نام</h3>
                                    </div>
                                    <form class="auth" action="{{route('auth')}}">
                                        <div class="form-group phone-box">
                                            <input type="tel" required="" id="phone" name="phone" autofocus placeholder="شماره همراه">
                                        </div>
                                        <div class="form-group code-box" style="display: none">
                                            <input type="tel" name="code" id="code" placeholder="کد تأیید">
                                        </div>
                                        <div class="form-group">
                                            <button data-type="sms" class="btn btn-fill-out btn-block hover-up submit">پیامک</button>
                                            <button data-type="pass" class="btn btn-fill-out btn-primary btn-block hover-up submit">رمز</button>
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
                    url: $(this).data('action'),
                    type: "POST",
                    async: false,
                    data:  {
                        'phone': $('#phone').val(),
                        'code': $('#code').val(),
                        'password': $('#pass').val(),
                        'type': $(this).attr('data-type'),
                    },
                    success:function(data){
                        if(data === 'get_code'){
                            $('.phone-box').hide();
                            $('.code-box').slideDown();
                            $('#code').focus();
                        } else if(data === 'success') {
                            $('#exampleModal').modal('hide');
                            window.location.replace("{{route('home')}}");
                        } else {
                            console.log(data)
                        }
                        if($(this).attr('data-type') == 'sms'){
                            $('button[data-type="pass"]').hide();
                        } else {
                            $('button[data-type="sms"]').hide();
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
