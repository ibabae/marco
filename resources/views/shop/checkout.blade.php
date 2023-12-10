@extends('master')
@section('main')
@include('layout.header')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home')}}" rel="nofollow">خانه</a>
                <span></span> فروشگاه
                <span></span> تصویه
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                @auth
                @else
                    <div class="col-lg-6 mb-sm-15">
                        <div class="toggle_info">
                            <span>
                                <i class="fi-rs-user ml-10"></i>
                                <span class="text-muted"></span>
                                <a href="#loginform" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">وارد شو یا ثبت نام کن</a>
                            </span>
                        </div>
                        <div class="panel-collapse collapse login_form" id="loginform">
                            <div class="panel-body">
                                {{-- <p class="mb-30 font-sm">اگر قبلا از ما خرید کرده اید، با شماره همراهی که با شرکت ارتباط دارید ثبت نام کنید.</p> --}}
                                <form class="auth">
                                    <div class="form-group phone-box">
                                        <input type="text" name="phone" id="phone" placeholder="شماره همراه">
                                    </div>
                                    <div class="form-group code-box" style="display: none">
                                        <input type="text" name="code" id="code" placeholder="کد تأیید">
                                    </div>
                                    <div class="login_footer form-group">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="remember" value="">
                                                <label class="form-check-label" for="remember"><span>به خاطر بسپار</span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-md">ورود</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endauth

                {{-- <div class="col-lg-6">
                    <div class="toggle_info">
                        <span><i class="fi-rs-label ml-10"></i><span class="text-muted">کوپن داری؟</span> <a href="#coupon" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">کلیک کن تا وارد کنی</a></span>
                    </div>
                    <div class="panel-collapse collapse coupon_form " id="coupon">
                        <div class="panel-body">
                            <p class="mb-30 font-sm">اگر کوپن تخفیف داری اینجا وارد کن</p>
                            <form method="post">
                                <div class="form-group">
                                    <input type="text" placeholder="کد کوپن رو اینجا وارد کن">
                                </div>
                                <div class="form-group">
                                    <button class="btn  btn-md" name="login">ثبت کوپن</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="divider mt-50 mb-50"></div>
                </div>
            </div>
            <form action="{{route('payout')}}" method="POST" id="form" class="row">
                <div class="col-md-6">
                    <div class="mb-25">
                        <h4>اطلاعات صورت حساب</h4>
                    </div>
                    <div>
                        @csrf
                        <div class="form-group">
                            @php
                                if(old('firstName') != null){
                                    $firstName = old('firstName');
                                }else{
                                    if(user('firstName') != 'کاربر'){
                                        $firstName = user('firstName');
                                    } else {
                                        $firstName = '';
                                    }
                                }
                            @endphp
                            <input type="text" name="firstName" value="{{$firstName}}" required="" placeholder="نام *">
                            @error('firstName')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="lastName" value="@if(old('lastName') != null){{old('lastName')}}@else{{user('lastName')}}@endif" required="" placeholder="نام خانوادگی *">
                            @error('lastName')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="cname" value="@if(old('cname') != null){{old('cname')}}@else{{user('cname')}}@endif" placeholder="نام فروشگاه">
                        </div>
                        <div class="form-group">
                            <div class="custom_select">
                                <select class="form-control select-active" name="state" required="">
                                    <option value="0" disabled default>انتخاب استان</option>
                                    @foreach ($states as $item)
                                        <option value="{{$item->id}}" @if(old('state') != null AND old('state') == $item->id) selected @else @if(user('state') == $item->id) selected @endif @endif>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('state')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <input type="text" name="address" value="@if(old('address') != null){{old('address')}}@else{{user('address')}}@endif" required="" placeholder="آدرس *">
                            @error('address')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="address2" value="@if(old('address2') != null){{old('address2')}}@else{{user('address2')}}@endif" placeholder="آدرس دوم">
                        </div>
                        <div class="form-group">
                            <input type="text" name="city" required="" value="@if(old('city') != null){{old('city')}}@else{{user('city')}}@endif" placeholder="شهر *">
                            @error('city')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="zipcode" required="" value="@if(old('zipcode') != null){{old('zipcode')}}@else{{user('zipcode')}}@endif" placeholder="کد پستی *">
                            @error('zipcode')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="number" name="phone" required="" value="@if(old('phone') != null){{old('phone')}}@else{{user('phone')}}@endif" placeholder="تلفن همراه *">
                            @error('phone')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <div class="checkbox">
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="newaccount" id="createaccount">
                                    <label class="form-check-label label_info" data-bs-toggle="collapse" href="#collapsePassword" data-target="#collapsePassword" aria-controls="collapsePassword" for="createaccount"><span>ایجاد حساب جدید؟</span></label>
                                </div>
                            </div>
                        </div> --}}
                        <div class="ship_detail">
                            {{-- <div class="form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="newaddress" id="differentaddress">
                                        <label class="form-check-label label_info" data-bs-toggle="collapse" data-target="#collapseAddress" href="#collapseAddress" aria-controls="collapseAddress" for="differentaddress"><span>ارسال به آدرس دیگر؟</span></label>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div id="collapseAddress" class="different_address collapse in">
                                <div class="form-group">
                                    <input type="text" required="" name="firstName" placeholder="نام *">
                                </div>
                                <div class="form-group">
                                    <input type="text" required="" name="lastName" placeholder="نام خانوادگی *">
                                </div>
                                <div class="form-group">
                                    <input required="" type="text" name="cname" placeholder="نام فروشگاه">
                                </div>
                                <div class="form-group">
                                    <div class="custom_select">
                                        <select class="form-control select-active" name="state" required="">
                                            <option value="0" disabled selected>انتخاب استان</option>
                                            @foreach ($states as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="address" required="" placeholder="آدرس *">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="address2" required="" placeholder="آدرس دوم">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="city" required="" placeholder="شهر *">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="zipcode" required="" placeholder="کد پستی">
                                </div>
                            </div> --}}
                        </div>
                        <div class="mb-20">
                            <h5>اطلاعات تکمیلی</h5>
                        </div>
                        <div class="form-group mb-30">
                            <textarea rows="5" name="descriptions" placeholder="یادداشت های سفارش">{{old('descriptions')}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="order_review">
                        <div class="mb-20">
                            <h4>سفارشات شما</h4>
                        </div>
                        <div class="table-responsive order_table text-center">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">محصول</th>
                                        <th>مجموع</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                        <div class="payment_method">
                            <div class="mb-25">
                                <h5>پرداخت</h5>
                            </div>
                            {{old('payment_option')}}
                            <div class="payment_option">
                                <div class="custome-radio">
                                    <input class="form-check-input" required="" type="radio" name="payment_option" value="1" id="exampleRadios3" @if(old('payment_option') != null){{old('payment_option')}}@endif>
                                    <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#bankTranfer" aria-controls="bankTranfer">کارت به کارت</label>
                                    <div class="form-group collapse in" id="bankTranfer">
                                        <p class="text-muted mt-5">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration. </p>
                                    </div>
                                </div>
                                <div class="custome-radio">
                                    <input class="form-check-input" required="" type="radio" name="payment_option" value="2" id="exampleRadios4" @if(old('payment_option') != null){{old('payment_option')}}@endif>
                                    <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">پرداخت با چک</label>
                                    <div class="form-group collapse in" id="checkPayment">
                                        <p class="text-muted mt-5">Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode. </p>
                                    </div>
                                </div>
                                <div class="custome-radio">
                                    <input class="form-check-input" required="" type="radio" name="payment_option" value="3" id="exampleRadios5" @if(old('payment_option') != null){{old('payment_option')}}@else checked="" @endif>
                                    <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">پرداخت آنلاین</label>
                                    <div class="form-group collapse in" id="paypal">
                                        <p class="text-muted mt-5">Pay via PayPal; you can pay with your credit card if you don't have a PayPal account.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:void(0)" class="btn btn-fill-out btn-block mt-30" id="submit">ثبت سفارش</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
@include('layout.footer')
@endsection
@section('footer')
    <script>
        $(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#submit').on('click',function(){
                $('#form').submit();
            })
            $('.auth').on('submit',function(e){
                e.preventDefault();
                $.ajax({
                    url: "{{route('auth')}}",
                    type: "POST",
                    async: false,
                    data:  {
                        'phone': $('#phone').val(),
                        'code': $('#code').val(),
                    },
                    success:function(data){
                        if(data === 'get_code'){
                            $('.phone-box').hide();
                            $('.code-box').slideDown();
                            $('#code').focus();
                        } else if(data === 'success') {
                            $('#exampleModal').modal('hide');
                            @if(Route::is('checkout'))
                                window.location.replace("{{route('checkout')}}");
                            @else
                                window.location.replace("{{route('home')}}");
                            @endif
                        } else {
                            console.log(data)
                        }
                    },
                    error:function(e){
                        console.log(e)
                    },
                });
            })
        })
    </script>
@endsection
