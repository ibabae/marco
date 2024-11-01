@extends('admin.master')

@section('main-content')
<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">افزودن</h6>
                <form class="ajax" onsubmit="return false" action="{{route('admin.shop.category.add')}}" method="POST">
                    <span data-type="add-route" @class(['d-none'])>{{route('admin.shop.category.add')}}</span>
                    @csrf
                    @method('POST')

                    <div class="form-floating mb-2">
                        <input type="text" autofocus name="title" class="form-control required" id="title" placeholder="ایکس لارج">
                        <label for="title">عنوان</label>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mb-2">
                        <select class="form-select categoryselect" name="parentId" id="floatingSelect" aria-label="Floating label select example">
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
                    <button type="button" class="btn btn-warning" @style('display:none') data-href="{{route('admin.shop.category.create')}}">انصراف</button>
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
                                    <td><span class="badge bg-primary">{{$item->Parent['title']}}</span></td>
                                    <td><span class="badge bg-info">{{$item->countProducts}}</span></td>
                                    <td @class(['text-end'])>
                                        <a class="btn btn-sm btn-primary btn-floating edit" href="{{route('admin.shop.category.edit',$item->id)}}"><i class="fa fa-edit text-light"></i></a>
                                        <a class="btn btn-sm btn-danger btn-floating category-delete-warning" href="{{route('admin.shop.category.destroy',$item->id)}}"><i class="fa fa-trash"></i></a>
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
    <script src="{{asset('admin-assets/js/examples/sweet-alert.js')}}"></script>
    <script src="{{asset('admin-assets/js/category-ajax.js')}}"></script>


@endsection
