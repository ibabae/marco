@extends('admin.master')
@section('breadcrumbs')
    <div class="header-body-left">

        <h3 class="page-title">فروشگاه</h3>

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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $item)
                                <tr>
                                    <th scope="row">{{$item->id}}</th>
                                    <th>
                                        <figure class="avatar avatar-sm">
                                            <img src="assets/media/image/avatar.jpg" class="rounded-circle" alt="image">
                                        </figure>
                                    </th>
                                    <td>{{$item->title}}</td>
                                    <td>{{price($item->price)}}</td>
                                    <td>زاکربرگ</td>
                                    <td>@mdo</td>
                                </tr>
                            @endforeach
                            <tr>
                                <th scope="row">2</th>
                                <th>
                                    <figure class="avatar avatar-sm">
                                        <img src="assets/media/image/avatar.jpg" class="rounded-circle" alt="image">
                                    </figure>
                                </th>
                                <td>بیل</td>
                                <td>گیتس</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <th>
                                    <figure class="avatar avatar-sm">
                                        <img src="assets/media/image/avatar.jpg" class="rounded-circle" alt="image">
                                    </figure>
                                </th>
                                <td>پاول</td>
                                <td>دوروف</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
@section('footer')

@endsection
