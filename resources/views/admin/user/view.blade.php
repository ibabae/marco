@extends('admin.master')
@section('main')
<div class="content-header">
    <a href="javascript:history.back()"><i class="material-icons md-arrow_back"></i> بازگشت </a>
</div>
<div class="card mb-4">
    <div class="card-header bg-primary" style="height:150px">
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl col-lg flex-grow-0" style="flex-basis:230px">
                <div class="img-thumbnail shadow w-100 bg-white position-relative text-center" style="height:190px; width:200px; margin-top:-120px">
                    <img src="{{asset('images/blank.png')}}" class="center-xy img-fluid" alt="Logo Brand">
                </div>
            </div> <!--  col.// -->
            <div class="col-xl col-lg">
                <h3>{{$user->firstName}} {{$user->lastName}}</h3>
            </div> <!--  col.// -->
            <div class="col-xl-4 text-md-end">
                <a href="{{route('order.add',['id'=>$user->id])}}" class="btn btn-primary btn-sm">  <i class="material-icons md-plus"></i> افزودن سفارش</a>
            </div> <!--  col.// -->
        </div> <!-- card-body.// -->
        <hr class="my-4">
        <div class="row g-4">
            <div class="col-md-12 col-lg-4 col-xl-3">
                <article class="box">
                    <p class="mb-0 text-muted">تعداد سفارشات: <span class="text-success">{{count($orders)}}</span></p>

                    <p class="mb-0 text-muted">مجموع خرید:
                        @php
                            $total = 0;
                            foreach ($orders as $key => $value) {
                                $total += $value->Price;
                            }
                        @endphp
                        <span class="text-success mb-0">{{price($total)}}</span>
                    </p>
                </article>
            </div> <!--  col.// -->
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <h6>تماس</h6>
                <p><a href="tel:0{{$user->phone}}">0{{$user->phone}}</a></p>
                <p><a href="mailto:{{$user->email}}">{{$user->email}}</a></p>
            </div> <!--  col.// -->
            <div class="col-sm-6 col-lg-4 col-xl-3">

            </div> <!--  col.// -->
            {{-- <div class="col-sm-6 col-xl-4 text-xl-end">
                <map class="mapbox position-relative d-inline-block">
                    <img src="{{asset('admin-assets/imgs/misc/map.jpg')}}" class="rounded2" height="120" alt="map">
                    <span class="map-pin" style="top:50px; left: 100px"></span>
                    <button class="btn btn-sm btn-brand position-absolute bottom-0 end-0 mb-15 mr-15 font-xs"> Large </button>
                </map>
            </div> <!--  col.// --> --}}
        </div> <!--  row.// -->
    </div> <!--  card-body.// -->
</div> <!--  card.// -->
<div class="card mb-4">
    <div class="card-body">
        <div class="d-flex align-items-start">
            <div class="col-lg-3">
                <div class="nav flex-column nav-pills ms-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a href="javascript:void" class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">سفارشات</a>
                    <a href="javascript:void" class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">محصولات خریداری شده</a>
                    <a href="javascript:void" class="nav-link" id="v-pills-addresses-tab" data-bs-toggle="pill" data-bs-target="#v-pills-addresses" type="button" role="tab" aria-controls="v-pills-addresses" aria-selected="false">آدرس ها</a>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                        <h5 class="card-title">سفارشات</h5>
                        @if($orders->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">مجموع</th>
                                            <th scope="col">وضعیت</th>
                                            <th scope="col">تاریخ</th>
                                            <th scope="col" class="text-end"> عملیات </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $item)
                                            <tr>
                                                <td>{{price($item->Price)}}</td>
                                                <td><?=OrderStatus($item->Status)?></td>
                                                <td>{{\Morilog\Jalali\Jalalian::forge($item->created_at)->format('%A، %d %B %Y')}}</td>
                                                <td class="text-end">
                                                    <a href="{{route('order.view',['id'=>$item->id])}}" class="btn btn-md rounded font-sm">جزئیات</a>
                                                </td>
                                            </tr>
                                        @empty

                                        @endforelse

                                    </tbody>
                                </table>
                            </div> <!-- table-responsive //end -->
                        @else
                            <div class="alert alert-warning">سفارشی ثبت نشده</div>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
                        <h5 class="card-title">محصولات</h5>
                        <div class="row">
                            @if($ordersform->count() > 0)
                                @foreach ($ordersform as $item)
                                    @php
                                        $order = DB::table('orders')->where('id',$item->orderId)->where('Status','!=',0)->first();
                                    @endphp
                                    @if($order == true)
                                        <div class="col-lg-3 col-md-6">
                                            <div class="card card-product-grid">
                                                <a href="{{route('product',['id'=>$item->productId])}}" target="_blank" class="img-wrap"> <img src="{{asset($item->Product->PrimaryImage)}}" alt="Product"> </a>
                                                <div class="info-wrap">
                                                    <a href="{{route('product',['id'=>$item->productId])}}" target="_blank" class="title">{{$item->Product->Title}}</a>
                                                    رنگ: <span style="width:15px;height:15px;background-color:{{$item->color}}; border-radius:100%;display:inline-block;border:1px solid #ddd"></span> سایز: {{$item->size}}
                                                    <div class="price mt-1">{{price($item->price)}}</div> <!-- price-wrap.// -->
                                                </div>
                                            </div> <!-- card-product  end// -->
                                        </div> <!-- col.// -->
                                    @endif
                                @endforeach
                            @else
                                <div class="alert alert-warning">محصولی خریداری نشده</div>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-addresses" role="tabpanel" aria-labelledby="v-pills-addresses-tab" tabindex="0">
                        <h5 class="card-title">آدرس ها</h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">استان</th>
                                        <th scope="col">شهر</th>
                                        <th scope="col">آدرس</th>
                                        <th scope="col">پلاک</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($addresses as $item)
                                        <tr>
                                            <td>@if($item->primary == 1)<i class="icon material-icons md-check ml-10 text-success" title="پیشفرض"></i>@endif{{$item->State->name}}</td>
                                            <td>{{$item->City->name}}</td>
                                            <td>{{$item->address}}</td>
                                            <td>{{$item->number}}</td>
                                        </tr>
                                    @empty

                                    @endforelse

                                </tbody>
                            </table>
                        </div> <!-- table-responsive //end -->
                    </div>
                </div>
            </div>
        </div> <!-- row.// -->
    </div> <!--  card-body.// -->
</div> <!--  card.// -->
@endsection
