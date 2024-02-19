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


@endsection
@section('main-content')
<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">افزودن</h6>
                <form class="ajax" onsubmit="return false" action="{{route('admin.category.add')}}" method="POST">
                    <span data-type="add-route" @class(['d-none'])>{{route('admin.category.add')}}</span>
                    @csrf
                    @method('POST')

                    <div class="form-floating mb-2">
                        <input type="text" autofocus name="title" class="form-control required" id="title" placeholder="ایکس لارج">
                        <label for="title">عنوان</label>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mb-2">
                        <select class="form-select" name="parentId" id="floatingSelect" aria-label="Floating label select example">
                            <option selected disabled>انتخاب دسته والد</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">دسته والد</label>
                    </div>
                    <div class="form-floating mb-2">
                        <textarea name="description" class="form-control" id="description" placeholder="توضیحات" style="height: 100px"></textarea>
                        <label for="description">توضیحات</label>
                        <div class="invalid-feedback"></div>
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
                                <th scope="col">والد</th>
                                <th scope="col">تعداد محصولات</th>
                                <th @class(['text-end']) scope="col">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $item)
                                <tr>
                                    <th scope="row">{{$item->id}}</th>
                                    <td>{{$item->title}}</td>
                                    <td><span class="badge bg-primary">{{$item->Parent}}</span></td>
                                    <td><span class="badge bg-info">{{$item->countProducts}}</span></td>
                                    <td @class(['text-end'])>
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-light btn-floating btn-icon btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item edit" href="{{route('admin.category.edit',$item->id)}}" data-id="{{$item->id}}">ویرایش</a>
                                                <a href="javascript:void(0);" data-action="{{route('admin.category.destroy',$item->id)}}" class="dropdown-item category-delete-warning">حذف</a>
                                                {{-- <form action="{{route('admin.category.destroy',$item->id)}}" method="POST" onsubmit="return confirm('Are you sure?')" @class(['d-inline-flex'])>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item text-danger">حذف</button>
                                                </form> --}}
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
    <script src="{{asset('admin-assets/js/category-ajax.js')}}"></script>
    <script>
        $('.category-delete-warning').on('click', function () {
            var urlAddress = $(this).attr('data-action')
            swal({
                title: "هشدار!",
                text: "با حذف این دسته، زیر دسته های آن به همراه تمامی محصولات مرتبط حذف خواهد شد.!",
                icon: "warning",
                buttons: {
                    confirm : 'باشه',
                    cancel : 'انصراف'
                },
                dangerMode: true
            })
            .then(function(willDelete) {
                if (willDelete) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    console.log(urlAddress);
                    $.ajax({
                        url: urlAddress,
                        method: 'DELETE',
                    })
                    location.reload()
                }
                else {
                    // swal("فایل خیالی شما در امان است!", {
                    //     icon: "error",
                    //     button: "باشه"
                    // });
                }
            });
        });

    </script>
	<script src="{{asset('admin-assets/js/examples/sweet-alert.js')}}"></script>


@endsection
