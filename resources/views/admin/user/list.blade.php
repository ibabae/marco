@extends('admin.master')
@section('main')
<div class="content-header">
    <h2 class="content-title">لیست کاربران</h2>
    <div>
        <a href="#" class="btn btn-primary"><i class="material-icons md-plus"></i> افزودن کاربر</a>
    </div>
</div>
<div class="card mb-4">
    <header class="card-header">
        <div class="row gx-3">
            <div class="col-lg-4 col-md-6 me-auto">
                <input type="text" placeholder="جستجو..." class="form-control">
            </div>
            {{-- <div class="col-lg-2 col-md-3 col-6">
                <select class="form-select">
                    <option>Status</option>
                    <option>Active</option>
                    <option>Disabled</option>
                    <option>Show all</option>
                </select>
            </div> --}}
            {{-- <div class="col-lg-2 col-md-3 col-6">
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
                        <th>نام</th>
                        <th>شماره همراه</th>
                        <th>وضعیت</th>
                        <th>تاریخ عضویت</th>
                        <th class="text-end"> عملیات </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td width="40%">
                                <a href="#" class="itemside">
                                    <div class="info pl-3">
                                        <h6 class="mb-0 title">{{$item->firstName}} {{$item->lastName}}</h6>
                                    </div>
                                </a>
                            </td>
                            <td><a href="tel:0{{$item->phone}}">0{{$item->phone}}</a></td>
                            <td>
                                @if($item->status == 1)
                                    <span class="badge rounded-pill alert-success">فعال</span>
                                @else
                                    <span class="badge rounded-pill alert-warning">غیرفعال</span>
                                @endif
                            </td>
                            <td>{{\Morilog\Jalali\Jalalian::forge($item->created_at)->format('%A، %d %B %y')}}</td>
                            <td class="text-end">
                                <a href="{{route('user.view',['id'=>$item->id])}}" class="btn btn-sm btn-brand rounded font-sm mt-15">مشاهده مشخصات</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table> <!-- table-responsive.// -->
        </div>
    </div> <!-- card-body end// -->
</div> <!-- card end// -->
<div class="pagination-area mt-15 mb-50">
    {{$users->links()}}
</div>
@endsection
