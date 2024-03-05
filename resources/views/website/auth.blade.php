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
                                    <form class="auth" action="{{route('login.post')}}">
                                        <div class="form-group phone-box">
                                            <input type="tel" required="" id="phone" name="phone" autofocus placeholder="شماره همراه">
                                        </div>
                                        <div class="form-group code-box" style="display: none">
                                            <input type="tel" name="code" id="code" placeholder="کد تأیید">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-fill-out btn-primary btn-block hover-up submit">رمز</button>
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
            $('.code-box').slideUp();
            $('#authModal').on('shown.bs.modal', function(e){
                $('#phone').focus();
            });
            $('#authModal').on('click','.update', function(e){
                e.preventDefault();
                $('.phone-box').slideDown();
                $('.code-box').slideUp();
            });
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
@endsection
