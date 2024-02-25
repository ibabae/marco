@extends('admin.master')
@section('breadcrumbs')
    <div class="header-body-left">

        <h3 class="page-title">{{$title}}</h3>

        <!-- begin::breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">داشبورد</a></li>
                <li class="breadcrumb-item" aria-current="page">فروشگاه</li>
                <li class="breadcrumb-item active" aria-current="page">محصولات</li>
            </ol>
        </nav>
        <!-- end::breadcrumb -->

    </div>

@endsection
@section('header')

@endsection
@section('main-content')
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">تصویر</th>
                                <th scope="col">عنوان</th>
                                <th scope="col">قیمت</th>
                                <th scope="col">دسته</th>
                                <th scope="col">وضعیت</th>
                                <th @class(['text-end']) scope="col">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $item)
                                <tr>
                                    <th scope="row">{{$item->id}}</th>
                                    <th>
                                        <figure class="avatar avatar-sm">
                                            <img src="{{asset($item->primaryImage)}}" class="rounded-circle" alt="{{$item->title}}">
                                        </figure>
                                    </th>
                                    <td>{{$item->title}}</td>
                                    <td>{{price($item->price)}}</td>
                                    <td>زاکربرگ</td>
                                    <td>@mdo</td>
                                    <td @class(['text-end'])>
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-light btn-floating btn-icon btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{route('admin.product.edit',$item->id)}}">ویرایش</a>
                                                <button class="dropdown-item" type="button">عمل دیگر</button>
                                                <button class="dropdown-item" type="button">یک عمل دیگر</button>
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
