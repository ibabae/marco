@extends('website.master')
@section('main')

<main class="main">
    <section class="pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                                <div class="padding_eight_all bg-white">
                                    <center>
                                        <a href="{{route('home')}}">
                                            <img src="@if(Setting('logo')!=''){{Setting('logo')}}@else{{asset('images/logo.png')}}@endif" width="100" alt="{{Setting('title')}}">
                                        </a>
                                    </center>
                                    <div class="heading_s1">
                                        <h3 class="mb-30">ورود / ثبت نام</h3>
                                    </div>
                                    <p class="small great">سلام! <br>
                                        لطفا شماره موبایل یا ایمیل خود را وارد کنید
                                    </p>
                                    <form class="auth" action="{{route('login.store')}}">
                                        <div class="form-group phone-box">
                                            <input type="tel" required="" id="phone" name="phone" autofocus>
                                        </div>
                                        <div class="mb-4 code-box" style="display:none">
                                            <div class="input-group input-group-lg">
                                                <div class="row w-100 m-0" dir="ltr">
                                                    {{-- <div class="px-1"><input name='code' class='bg-light form-control code-input text-center' id="codebox" input="tel" max="6"/></div> --}}
                                                    <div class="col-2 px-1"><input name='code[0]' id="codebox" class='bg-light form-control code-input code1'/></div>
                                                    <div class="col-2 px-1"><input name='code[1]' class='bg-light text-center form-control code-input'/></div>
                                                    <div class="col-2 px-1"><input name='code[2]' class='bg-light text-center form-control code-input'/></div>
                                                    <div class="col-2 px-1"><input name='code[3]' class='bg-light text-center form-control code-input'/></div>
                                                    <div class="col-2 px-1"><input name='code[4]' class='bg-light text-center form-control code-input'/></div>
                                                    <div class="col-2 px-1"><input name='code[5]' class='bg-light text-center form-control code-input'/></div>
                                                    <input type="text" id="code" name="code" hidden>
                                                </div>
                                            </div>
                                            <p class="resend-msg small my-2 text-center"><span id="time">00:00</span> مانده تا دریافت مجدد کد</p>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-fill-out btn-primary btn-block hover-up submit w-100">ورود</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@section('footer')
    <script src="{{asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

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
                    success:function(response, textStatus, xhr){
                        if(xhr.status == 200){
                            window.location.replace("../");
                        }else{
                            $('.phone-box').slideUp();
                            $('.resend-msg').slideDown();
                            $('.code-box').slideDown(300, function(){
                                $('#codebox').focus();
                            });
                            var seconds = response.data.time;
                            var phone = response.data.phone;
                            $('.heading_s1 .mb-30').text('کد تایید را وارد کنید')
                            $('.great').text('کد تایید برای شماره '+phone+' پیامک شد')
                            var countdown = setInterval(function() {
                                if (seconds >= 0) {
                                    var minutes = Math.floor(seconds / 60);
                                    var remainingSeconds = seconds % 60;
                                    $('#time').text(minutes + ":" + (remainingSeconds < 10 ? "0" : "") + remainingSeconds);

                                    seconds--;
                                } else {
                                    $('.resend-msg').slideUp();
                                    $('.code-box').slideUp();
                                    $('.phone-box').slideDown();
                                    $('.resend').slideDown();
                                    $('#code').val('');
                                    $('.code-input').val('');

                                    clearInterval(countdown);
                                }
                            }, 1000);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr, status, error)

                        let errors = Object.entries(xhr.responseJSON.errors)
                        for (var i = 0; i < errors.length; i++) {
                            toastr.error(errors[i][1]);
                            $("input[name="+errors[i][0]+"]").addClass('border-danger')
                        }
                    }
                });
            })
            const inputElements = [...document.querySelectorAll('input.code-input')]

            inputElements.forEach((ele,index)=>{
                ele.addEventListener('keydown',(e)=>{
                    if(e.keyCode === 8 && e.target.value==='') inputElements[Math.max(0,index-1)].focus()
                })
                ele.addEventListener('input',(e)=>{
                    const [first,...rest] = e.target.value
                    e.target.value = first ?? ''
                    const lastInputBox = index===inputElements.length-1
                    const didInsertContent = first!==undefined
                    if(didInsertContent && !lastInputBox) {
                        inputElements[index+1].focus()
                        inputElements[index+1].value = rest.join('')
                        inputElements[index+1].dispatchEvent(new Event('input'))
                    }
                    const code = inputElements.map(({value})=>value).join('')
                    if(code.length == 6){
                        submitForm(code)
                    }
                })
            })

            function submitForm(code) {
                $('#code').val(code);
                $('.auth').submit();
            }
        });
    </script>
@endsection
