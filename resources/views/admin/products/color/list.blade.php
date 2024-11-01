@extends('admin.master')

@section('header')
<link rel="stylesheet" href="{{asset('vendors/colorpicker/css/bootstrap-colorpicker.min.css')}}" type="text/css">

@endsection
@section('main-content')
<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">افزودن</h6>
                <form class="color-ajax" onsubmit="return false" action="{{route('admin.shop.color.add')}}" method="POST">
                    <span data-type="add-route" @class(['d-none'])>{{route('admin.shop.color.add')}}</span>
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
                            <span class="input-group-text"><i class="border"></i></span>
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
                                        <a class="btn btn-sm btn-primary btn-floating edit" href="{{route('admin.shop.color.edit',$item->id)}}"><i class="fa fa-edit text-light"></i></a>
                                        <a class="btn btn-sm btn-danger btn-floating color-delete-warning" href="{{route('admin.shop.color.destroy',$item->id)}}"><i class="fa fa-trash"></i></a>
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
<script src="{{asset('vendors/colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{asset('admin-assets/js/examples/colorpicker.js')}}"></script>
<script src="{{asset('admin-assets/js/examples/sweet-alert.js')}}"></script>
<script src="{{asset('admin-assets/js/color-ajax.js')}}"></script>

@endsection
