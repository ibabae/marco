@extends('admin.master')

@section('main-content')
<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">افزودن</h6>
                <form class="size-ajax" onsubmit="return false" action="{{route('admin.shop.size.add')}}" method="POST">
                    <span data-type="add-route" @class(['d-none'])>{{route('admin.shop.size.add')}}</span>
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
                                        <a class="btn btn-sm btn-primary btn-floating edit" href="{{route('admin.shop.size.edit',$item->id)}}"><i class="fa fa-edit text-light"></i></a>
                                        <a class="btn btn-sm btn-danger btn-floating size-delete-warning" href="{{route('admin.shop.size.destroy',$item->id)}}"><i class="fa fa-trash"></i></a>
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
    <script src="{{asset('admin-assets/js/examples/sweet-alert.js')}}"></script>
@endsection
