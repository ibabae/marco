@extends('master')
@section('main')
@include('layout.header')

<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home')}}" rel="nofollow">خانه</a>
                <span></span> فروشگاه
                <span></span> سبد خرید
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12" id="CartBox">
                    <div class="table-responsive">
                        <table class="table shopping-summery text-center clean">
                            <thead>
                                <tr class="main-heading">
                                    <th scope="col">تصویر</th>
                                    <th scope="col">نام</th>
                                    <th scope="col">قیمت</th>
                                    <th scope="col">تعداد</th>
                                    <th scope="col">مجموع</th>
                                    <th scope="col">حذف</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="6" class="text-start">
                                        <a href="#" class="text-muted"> <i class="fi-rs-cross-small"></i> خالی کردن سبد</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-action text-end">
                        <a class="btn me-10" id="UpdateCart"><i class="fi-rs-shuffle ms-10"></i>به روز رسانی</a>
                        <a class="btn " href="{{route('home')}}"><i class="fi-rs-shopping-bag ms-10"></i>ادامه خرید</a>
                    </div>
                    <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                    <div class="row mb-50">
                        <div class="col-lg-6 col-md-12">
                            <div class="heading_s1 mb-3">
                                <h4>محاسبه هزینه ارسال</h4>
                            </div>
                            <p class="mt-15 mb-30">نرخ ثابت: <span class="font-xl text-brand fw-900">5%</span></p>
                            <form class="field_form shipping_calculator">
                                <div class="form-row row">
                                    <div class="form-group col-6">
                                        <div class="custom_select">
                                            <select class="form-control select-active">
                                                <option value="">انتخاب استان...</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <input required="required" placeholder="کد پستی" name="zipcode" type="text">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-12">
                                        <button class="btn  btn-sm"><i class="fi-rs-shuffle ms-10"></i>به روز رسانی</button>
                                    </div>
                                </div>
                            </form>
                            <div class="mb-30 mt-50">
                                <div class="heading_s1 mb-3">
                                    <h4>افزودن کوپن</h4>
                                </div>
                                <div class="total-amount">
                                    <div class="left">
                                        <div class="coupon">
                                            <form action="#" target="_blank">
                                                <div class="form-row row justify-content-center">
                                                    <div class="form-group col-lg-6">
                                                        <input class="font-medium" name="Coupon" placeholder="کد کوپن">
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <button class="btn  btn-sm"><i class="fi-rs-label me-10"></i>ثبت</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="border p-md-4 p-30 border-radius cart-totals">
                                <div class="heading_s1 mb-3">
                                    <h4>مجموع سبد</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="cart_total_label">مجموع سبد</td>
                                                <td class="cart_total_amount"><span class="font-lg fw-900 text-brand totalprice">0</span></td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">هزینه ارسال</td>
                                                <td class="cart_total_amount"> <i class="ti-gift me-5"></i> ارسال رایگان</td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">جمع کل</td>
                                                <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand totalprice">0</span></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="{{route('checkout')}}" class="btn"> <i class="fi-rs-box-alt ms-10"></i> ادامه جهت تسویه</a>
                            </div>
                        </div>
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
            $('#CartBox').on('click','#UpdateCart',function(){
                const cartdata = [];
                $('#CartBox').find('.shopping-summery tbody tr').each(function(index,item){
                    var id = $(item).find('td').eq(1).find('a').attr('data-id');
                    var color = $(item).find('td').eq(1).find('a').attr('data-color');
                    var size = $(item).find('td').eq(1).find('a').attr('data-size');
                    var count = $(item).find('td').eq(3).find('input').val();
                    var row = { 'id': id, 'color' : color, 'size' : size, 'count' : count};
                    cartdata.push(row);
                })
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('updatecart')}}",
                    type: 'GET',
                    data: {
                        cart: cartdata
                    },
                    success:function(result){
                        if(result.length == 0){
                            $('#CartBox').html('<h3>سبد خرید شما خالی است</h3>');
                        } else {
                            if('{{Request::route()->getName()}}' == 'cart'){
                                $('.shopping-summery tbody').html(result.data2);
                            }
                            $('#CartList').html(result.data)
                            $('.totalprice').text(result.total)
                            $('#CartCount').text(document.querySelectorAll("#CartList li").length)
                        }
                    }
                })
            })
        });
    </script>
@endsection
