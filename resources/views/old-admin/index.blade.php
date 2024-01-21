@extends('old-admin.master')
@section('main')
<div class="content-header">
    <div>
        <h2 class="content-title card-title">داشبورد </h2>
        <p>تمامی اطلاعات مربوط به کسب و کار</p>
    </div>
</div>
<div class="row">
    <div class="col-lg-3">
        <div class="card card-body mb-4">
            <article class="icontext">
                <span class="icon icon-sm rounded-circle bg-success-light"><i class="text-success material-icons md-local_shipping"></i></span>
                <div class="text">
                    <h6 class="mb-1 card-title">سفارشات</h6> <span>{{price(Orders())}}</span>
                    <span class="text-sm">سفارشات پرداخت شده</span>
                </div>
            </article>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card card-body mb-4">
            <article class="icontext">
                <span class="icon icon-sm rounded-circle bg-primary-light"><i class="text-primary material-icons md-monetization_on"></i></span>
                <div class="text">
                    <h6 class="mb-1 card-title">سود</h6>
                    <span>{{price(Profit())}}</span>
                    <span class="text-sm">بدون محاسبه مالیات</span>
                </div>
            </article>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card card-body mb-4">
            <article class="icontext">
                <span class="icon icon-sm rounded-circle bg-warning-light"><i class="text-warning material-icons md-qr_code"></i></span>
                <div class="text">
                    <h6 class="mb-1 card-title">محصولات</h6> <span>{{Products()}}</span>
                    <span class="text-sm">
                        در {{Categories()}} دسته مختلف
                    </span>
                </div>
            </article>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card card-body mb-4">
            <article class="icontext">
                <span class="icon icon-sm rounded-circle bg-info-light"><i class="text-info material-icons md-shopping_basket"></i></span>
                <div class="text">
                    <h6 class="mb-1 card-title">درآمد ماهانه</h6> <span>{{price(0)}}</span>
                    <span class="text-sm">
                        میزان سود در {{\Morilog\Jalali\Jalalian::forge('last month')->format('%B %Y')}}
                    </span>
                </div>
            </article>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-8 col-lg-12">
        <div class="card mb-4">
            <article class="card-body">
                <h5 class="card-title">نمودار فروش</h5>
                <canvas id="myChart" height="120px"></canvas>
            </article>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12">
        <div class="card mb-4">
            <article class="card-body">
                <h5 class="card-title">اعضای جدید</h5>
                <div class="new-member-list">
                    @foreach($users as $user)
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex align-items-center">
                                <img src="{{asset('images/blank.png')}}" alt="" class="avatar">
                                <div>
                                    <h6>0{{$user->phone}}</h6>
                                </div>
                            </div>
                            <a href="{{route('old.user.view',['id'=>$user->id])}}" class="btn btn-xs">مشاهده</a>
                        </div>
                    @endforeach
                </div>
            </article>
        </div>
    </div>
</div>
<div class="card mb-4">
    <header class="card-header">
        <h4 class="card-title">آخرین سفارشات</h4>
        <div class="row align-items-center d-none">
            <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                <div class="custom_select">
                    <select class="form-select select-nice">
                        <option selected>همه دسته ها</option>
                        <option>دسته</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <input type="date" value="02.05.2021" class="form-control">
            </div>
            <div class="col-md-2 col-6">
                <div class="custom_select">
                    <select class="form-select select-nice">
                        <option selected>وضعیت</option>
                        <option>نوع وضعیت</option>
                    </select>
                </div>
            </div>
        </div>
    </header>
    <div class="card-body">
        <div class="table-responsive">
            <div class="table-responsive">
                <table class="table align-middle table-nowrap mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="align-middle" scope="col">شماره سفارش</th>
                            <th class="align-middle" scope="col">تاریخ</th>
                            <th class="align-middle" scope="col">مجموع</th>
                            <th class="align-middle" scope="col">وضعیت پرداخت</th>
                            <th class="align-middle" scope="col">نحوه پرداخت</th>
                            <th class="align-middle" scope="col">مشاهده مشخصات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $item)
                            <tr>
                                <td>{{$item->User->firstName}} {{$item->User->lastName}}</td>
                                <td>{{\Morilog\Jalali\Jalalian::forge($item->created_at)->format('%d %B %Y')}}</td>
                                <td>{{price($item->Price)}}</td>
                                <td><?=OrderStatus($item->Status)?></td>
                                <td>
                                    <i class="material-icons md-payment font-xxl text-muted mr-5"></i> <?=GateWay($item->Transaction->GateWay, $type = 0)?>
                                </td>
                                <td>
                                    <a href="{{route('order.view',['id'=>$item->id])}}" class="btn btn-xs"> مشاهده فاکتور</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div> <!-- table-responsive end// -->
    </div>
</div>
<div class="pagination-area mt-30 mb-50">
    {{$orders->links()}}
</div>
@endsection
@section('footer')
    <script src="{{asset('admin-assets/js/vendors/chart.js')}}"></script>
@endsection
