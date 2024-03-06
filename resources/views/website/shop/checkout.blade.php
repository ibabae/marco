@extends('website.master')
@section('main')
@include('website.layout.header')
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
            <form action="{{route('payout')}}" method="POST" id="checkoutform" class="row">
                @csrf
                <div class="col-md-6">
                    <div class="mb-25">
                        <h4>اطلاعات صورت حساب</h4>
                    </div>
                    <div>
                        @csrf
                        <div class="form-group">
                            <input type="text" name="firstName" value="{{User('firstName')}}" placeholder="نام *">
                        </div>
                        <div class="form-group">
                            <input type="text" name="lastName" value="{{User('lastName')}}" placeholder="نام خانوادگی *">
                        </div>
                        <div class="form-group">
                            <input type="text" name="copmany" value="{{User('company')}}" placeholder="نام فروشگاه">
                        </div>
                        <div class="mb-25">
                            <h5>آدرس ها</h5>
                        </div>
                        @if($addresses->count() == 0)
                            <div class="alert alert-info">
                                <div class="d-flex justify-content-between">
                                    <p class="my-auto">آدرسی ثبت نشده</p>
                                </div>
                            </div>
                        @endif
                        <div id="address-box">
                            @foreach ($addresses as $address)
                                <div class="custome-radio">
                                    <input class="form-check-input" required="" type="radio" name="address" value="{{$address->id}}" id="{{$address->id}}" @if($address->primary){{'checked'}}@endif>
                                    <label class="form-check-label" for="{{$address->id}}" data-bs-toggle="collapse" data-target="#{{$address->id}}" aria-controls="{{$address->id}}">{{$address->State->name.' - '.$address->City->name.' - '.$address->address.' پلاک '.$address->number.' - کدپستی '.$address->zipcode}}</label>
                                    <div class="form-group collapse in" id="{{$address->id}}">
                                        <p class="text-muted mt-5">{{$address->address}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mb-30" data-bs-toggle="modal" data-bs-target="#addressModal">افزودن آدرس</button>
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
                        <button class="btn btn-fill-out btn-block mt-30" type="submit">ثبت سفارش</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
@include('website.layout.footer')
@endsection
@section('footer')
    <script>
        $(function(){
            $('#checkoutform').on('submit',function(e){
                console.log('submit')
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success:function(result){
                        if(result.success == true) {
                            location.href = result.route
                        } else {
                            toast.warning(result.message);

                        }
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
        })
    </script>
@endsection
