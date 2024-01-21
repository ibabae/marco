@extends('admin.master')
@section('main')
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">جزئیات سفارش</h2>
            <p>مشخصات سفارش با شماره: {{$order->id}}</p>
        </div>
    </div>
    <div class="card">
        <header class="card-header">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 mb-lg-0 mb-15">
                    <span>
                        <i class="material-icons md-calendar_today"></i> <b>{{\Morilog\Jalali\Jalalian::forge($order->created_at)->format('%A، %d %B %y')}} - {{date('H:i:s',strtotime($order->created_at))}}</b>
                    </span> <br>
                    <small class="text-muted">شماره سفارش: {{$order->id}}</small>
                </div>
                <div class="col-lg-6 col-md-6 ms-auto text-md-end">
                    <select class="form-select d-inline-block mb-lg-0 mb-15 mw-200" id="Status">
                        <option>تغییر وضعیت</option>
                        <option value="0" @if($order->status == '0') selected @endif>در انتظار پرداخت</option>
                        <option value="3" @if($order->status == '3') selected @endif>تأیید شده</option>
                        <option value="2" @if($order->status == '2') selected @endif>ارسال شده</option>
                        <option value="1" @if($order->status == '1') selected @endif>دریافت شده</option>
                    </select>
                    <a class="btn btn-primary" href="javascript:void(0)" id="UpdateStatus">ثبت</a>
                    {{-- <a class="btn btn-secondary print ms-2" href="#"><i class="icon material-icons md-print"></i></a> --}}
                </div>
            </div>
        </header> <!-- card-header end// -->
        <div class="card-body">
            <div class="row mb-50 mt-20 order-info-wrap">
                <div class="col-md-4">
                    <article class="icontext align-items-start">
                        <span class="icon icon-sm rounded-circle bg-primary-light">
                            <i class="text-primary material-icons md-person"></i>
                        </span>
                        <div class="text">
                            <h6 class="mb-1">مشتری</h6>
                            <p class="mb-1">
                                {{$order->User->firstName}} {{$order->User->lastName}} <br> <a href="tel:{{$order->User->phone}}">{{$order->User->phone}}</a>
                            </p>
                            <a href="{{route('user.view',['id'=>$order->User->id])}}">مشاهده پروفایل</a>
                        </div>
                    </article>
                </div> <!-- col// -->
                <div class="col-md-4">
                    <article class="icontext align-items-start">
                        <span class="icon icon-sm rounded-circle bg-primary-light">
                            <i class="text-primary material-icons md-local_shipping"></i>
                        </span>
                        <div class="text">
                            <h6 class="mb-1">اطلاعات سفارش</h6>
                            <p class="mb-1">
                                وضعیت سفارش: <?=OrderStatus($order->status)?> <br>
                                نوع پرداخت: {{PayType($order->Transaction->PayType)}}
                            </p>
                        </div>
                    </article>
                </div> <!-- col// -->
                <div class="col-md-4">
                    <article class="icontext align-items-start">
                        <span class="icon icon-sm rounded-circle bg-primary-light">
                            <i class="text-primary material-icons md-place"></i>
                        </span>
                        <div class="text">
                            <h6 class="mb-1">ارسال به</h6>
                            <p class="mb-1">
                                شهر: {{$order->User->city}} <br>استان: {{State($order->User->state)}} <br> کد پستی: {{$order->User->zipcode}}
                            </p>
                        </div>
                    </article>
                </div> <!-- col// -->
            </div> <!-- row // -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="40%">محصولات</th>
                                    <th width="15%">مشخصات</th>
                                    <th width="15%">قیمت واحد</th>
                                    <th width="10%">تعداد</th>
                                    <th width="15%" class="text-end">مجموع</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ordersform as $item)
                                    <tr>
                                        <td>
                                            <a class="itemside" href="{{route('product',['id'=>$item->Product->id])}}">
                                                <div class="left">
                                                    <img src="{{asset($item->Product->PrimaryImage)}}" width="40" height="40" class="img-xs" alt="Item">
                                                </div>
                                                <div class="info">{{$item->Product->Title}}</div>
                                            </a>
                                        </td>
                                        <td>
                                            <div>
                                             رنگ: <span style="width:15px;height:15px;background-color:{{$item->color}}; border-radius:100%;display:inline-block;border:1px solid #ddd"></span>
                                             <br>سایز: {{$item->size}}</div>
                                            </div>
                                        </td>
                                        <td> {{price(xprice($item->price))}} </td>
                                        <td> {{$item->count}} </td>
                                        <td class="text-end"> {{price(xprice($item->price) * $item->count)}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- table-responsive// -->
                </div> <!-- col// -->
                <div class="col-lg-4">
                    <div class="box shadow-sm bg-light">
                        <h6 class="mb-15">اطلاعات پرداخت</h6>
                        <p>
                            <img src="{{asset('admin-assets/imgs/card-brands/2.png')}}" class="border" height="20"> شماره کارت 6037-6037-6037-6037 <br>
                            نام: {{$order->User->firstName}} {{$order->User->lastName}} <br>
                            موبایل: {{$order->User->phone}}
                        </p>
                    </div>
                    <div class="h-25 pt-4">
                        <div class="mb-3">
                            <label>یادداشت سفارش</label>
                            <textarea class="form-control mt-1"  id="Note" placeholder="یادداشت کاربر">{{$order->Descriptions}}</textarea>
                        </div>
                        <a href="javascript:void(0)" id="UpdateNote" class="btn btn-primary">ویرایش یادداشت</a>
                    </div>
                </div> <!-- col// -->
            </div>
        </div> <!-- card-body end// -->
    </div> <!-- card end// -->
@endsection
@section('footer')
<script>
    $(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#UpdateNote').on('click',function(){
            $.ajax({
                url: "{{route('order.update')}}",
                type: 'GET',
                data: {
                    id: '{{$order->id}}',
                    type: 2,
                    val: $('#Note').val()
                },
                success:function(result){
                    toastr.success('به روز رسانی یادداشت انجام شد')
                }
            })
        });
        $('#UpdateStatus').on('click',function(){
            $.ajax({
                url: "{{route('order.update')}}",
                type: 'GET',
                data: {
                    id: '{{$order->id}}',
                    type: 1,
                    val: $('#Status').val()
                },
                success:function(result){
                    toastr.success('تغییر وضعیت سفارش انجام شد')
                }
            })
        });
    })
</script>
@endsection
