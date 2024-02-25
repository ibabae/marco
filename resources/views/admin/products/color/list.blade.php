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
                <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
            </ol>
        </nav>
        <!-- end::breadcrumb -->

    </div>

@endsection
@section('header')
<link rel="stylesheet" href="{{asset('vendors/colorpicker/css/bootstrap-colorpicker.min.css')}}" type="text/css">

@endsection
@section('main-content')
<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">افزودن</h6>
                <form class="ajax" onsubmit="return false" action="{{route('admin.color.add')}}" method="POST">
                    <span data-type="add-route" @class(['d-none'])>{{route('admin.color.add')}}</span>
                    @csrf
                    @method('POST')

                    <div class="form-floating mb-2">
                        <input type="text" autofocus name="title" class="form-control required" id="title" placeholder="ایکس لارج">
                        <label for="title">عنوان</label>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="input-group sample-selector mb-2">
                        <div class="px-3 my-auto">انتخاب رنگ</div>
                        <div class="input-group-append my-auto">
                            <span class="input-group-text"><i></i></span>
                        </div>
                        <input type="text" name="code" value="red" class="form-control text-left color" dir="ltr">
                    </div>
                    <button type="submit" class="btn btn-primary">ثبت</button>
                    <button type="button" class="btn btn-warning" @style('display:none')>انصراف</button>
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
                                <th scope="col">رنگ</th>
                                <th @class(['text-end']) scope="col">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($colors as $item)
                                <tr>
                                    <td scope="row">{{$item->id}}</td>
                                    <td>{{$item->title}}</td>
                                    <td><div class="card card-body p-3 m-0 border" @style('background-color:'.$item->code)></div></td>
                                    <td @class(['text-end'])>
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-light btn-floating btn-icon btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item edit" href="{{route('admin.color.edit',$item->id)}}" data-id="{{$item->id}}">ویرایش</a>
                                                <a class="dropdown-item delete text-danger" href="{{route('admin.color.destroy',$item->id)}}">حذف</a>
                                                <!-- <form action="{{route('admin.color.destroy',$item->id)}}" method="POST" onsubmit="return confirm('Are you sure?')" @class(['d-inline-flex'])>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item text-danger">حذف</button>
                                                </form> -->
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
    <script src="{{asset('admin-assets/js/color-ajax.js')}}"></script>
    <script src="{{asset('vendors/colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
	<script src="{{asset('admin-assets/js/examples/colorpicker.js')}}"></script>

@endsection
