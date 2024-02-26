@extends('admin.master')
@section('breadcrumbs')
    <div class="header-body-left">

        <h3 class="page-title">{{$title}}</h3>

        <!-- begin::breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">داشبورد</a></li>
                <li class="breadcrumb-item" aria-current="page">فروشگاه</li>
                <li class="breadcrumb-item" aria-current="page">محصولات</li>
                <li class="breadcrumb-item active" aria-current="page">اندازه ها</li>
            </ol>
        </nav>
        <!-- end::breadcrumb -->

    </div>

@endsection
@section('header')

@endsection
@section('main-content')
<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">افزودن</h6>
                <form class="size-ajax" onsubmit="return false" action="{{route('admin.size.add')}}" method="POST">
                    <span data-type="add-route" @class(['d-none'])>{{route('admin.size.add')}}</span>
                    @csrf
                    @method('POST')

                    <div class="form-floating mb-2">
                        <input type="text" autofocus name="title" class="form-control required" id="title" placeholder="ایکس لارج">
                        <label for="title">عنوان</label>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" autofocus name="code" class="form-control required" id="title" placeholder="XL">
                        <label for="title">اختصار</label>
                        <div class="invalid-feedback"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">ثبت</button>
                </form>
            </div>
        </div>

    </div>
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">عنوان</th>
                                <th scope="col">اختصار</th>
                                <th @class(['text-end']) scope="col">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sizes as $item)
                                <tr>
                                    <th scope="row">{{$item->id}}</th>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->code}}</td>
                                    <td @class(['text-end'])>
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-light btn-floating btn-icon btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item edit-size" href="{{route('admin.size.edit',$item->id)}}" data-id="{{$item->id}}">ویرایش</a>
                                                <form action="{{route('admin.size.destroy',$item->id)}}" method="POST" onsubmit="return confirm('Are you sure?')" @class(['d-inline-flex'])>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item text-danger">حذف</button>
                                                </form>
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
    </div>
</div>

@endsection
@section('footer')
    <script src="{{asset('admin-assets/js/size-ajax.js')}}"></script>
    <script>
    </script>
@endsection
