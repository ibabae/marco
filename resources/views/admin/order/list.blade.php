@extends('admin.master')
@section('main')
<div class="content-header">
    <div>
        <h2 class="content-title card-title">سفارشات </h2>
    </div>
    <div>
        <a href="{{route('order.add')}}" class="btn btn-primary btn-sm"><i class="material-icons md-plus"></i> افزودن سفارش</a>
    </div>
</div>
<div class="card mb-4">
    <header class="card-header">
        <div class="row gx-3">
            <div class="col-lg-4 col-md-6 me-auto">
                <input type="text" placeholder="جستجو..." class="form-control">
            </div>
            {{-- <div class="col-lg-2 col-6 col-md-3">
                <select class="form-select">
                    <option>Status</option>
                    <option>Active</option>
                    <option>Disabled</option>
                    <option>Show all</option>
                </select>
            </div> --}}
            {{-- <div class="col-lg-2 col-6 col-md-3">
                <select class="form-select">
                    <option>Show 20</option>
                    <option>Show 30</option>
                    <option>Show 40</option>
                </select>
            </div> --}}
        </div>
    </header> <!-- card-header end// -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#ردیف</th>
                        <th scope="col">نام</th>
                        <th scope="col">موبایل</th>
                        <th scope="col">مجموع</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">تاریخ</th>
                        <th scope="col" class="text-end"> عملیات </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td><b>{{$item->User->firstName}} {{$item->User->lastName}}</b></td>
                            <td><a href="tel:{{$item->User->phone}}">{{$item->User->phone}}</a></td>
                            <td>{{price($item->Price)}}</td>
                            <td><?=OrderStatus($item->Status)?></td>
                            <td>{{\Morilog\Jalali\Jalalian::forge($item->created_at)->format('%A، %d %B %Y')}}</td>
                            <td class="text-end">
                                <a href="{{route('order.view',['id'=>$item->id])}}" class="btn btn-md rounded font-sm">مشاهده</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> <!-- table-responsive //end -->
    </div> <!-- card-body end// -->
</div> <!-- card end// -->
<div class="pagination-area mt-15 mb-50">
    {{$orders->links()}}
</div>
@endsection
