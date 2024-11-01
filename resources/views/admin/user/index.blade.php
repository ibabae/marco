@extends('admin.master')

@section('main-content')
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">آواتار</th>
                                <th scope="col">نام</th>
                                <th scope="col">شماره همراه</th>
                                <th @class(['text-end']) scope="col">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $item)
                                <tr>
                                    <th>
                                        <figure class="avatar avatar-sm">
                                            <img src="{{asset($item->avatar)}}" class="rounded-circle" alt="Avatar">
                                        </figure>
                                    </th>
                                    <td @if(!$item->status)@class(['text-warning'])@endif>{{$item->name}}</td>
                                    <td><a href="tel:{{$item->phone}}">0{{$item->phone}}</a></td>
                                    <td @class(['text-end'])>
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-light btn-floating btn-icon btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{route('admin.layer.user.show', $item->id)}}">مشاهده</a>
                                                <a class="dropdown-item" href="{{route('admin.layer.user.edit',$item->id)}}">ویرایش</a>
                                                <a class="dropdown-item text-danger">حذف</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
@section('footer')

@endsection
