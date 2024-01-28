@extends('admin.master')
@section('main')
<div class="row">
    <div class="col-12 col-lg-9">
        <div class="content-header">
            <h2 class="content-title">افزودن صفحه</h2>
        </div>
    </div>
    <div class="col-12">
        <form class="row" action="{{route('page.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row gx-5">
                            <section class="content-body p-xl-4">
                                <div class="row mb-4">
                                    <label class="col-lg-2 col-3 col-form-label" for="Title"><span class="text-danger">*</span> عنوان</label>
                                    <div class="col-lg-4 col-9">
                                        <input type="text" name="Title" class="form-control" id="Title" required value="{{old('Title')}}" placeholder="">
                                        @error('Title')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div> <!-- col.// -->
                                    <label class="col-lg-2 col-3 col-form-label" for="Slug">آدرس انگلیسی</label>
                                    <div class="col-lg-4 col-9 mb-4">
                                        <input type="text" name="Slug" class="form-control" id="Slug" value="{{old('Slug')}}" placeholder="">
                                        @error('Slug')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div> <!-- row.// -->

                                </div> <!-- row.// -->
                                <textarea id="editor" name="Content">{{old('Content')}}</textarea>
                                @error('Content')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror

                                <div class="row mb-4">
                                    <label class="col-lg-3 col-form-label">وضعیت</label>
                                    <div class="col-lg-9">
                                        <label class="form-check my-2">
                                            <input type="checkbox" name="Status" class="form-check-input" checked="">
                                            <span class="form-check-label">فعال </span>
                                        </label>
                                    </div> <!-- col.// -->
                                </div> <!-- row.// -->

                            </section> <!-- content-body .// -->
                            <div class="col-12">
                                <div class="float-start">
                                    {{-- <button class="btn btn-light rounded font-sm me-5 text-body hover-up">ذخیره پیش نویس</button> --}}
                                    <button id="submit" class="btn btn-md rounded font-sm hover-up">انتشار</button>
                                </div>
                            </div>

                        </div> <!-- row.// -->
                    </div> <!-- card body end// -->
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('header')


@endsection

@section('footer')
    <script src="{{asset('admin-assets/plugins/CKEditor/ckeditor.js')}}"></script>
    <script src="{{asset('admin-assets/plugins/CKEditor/samples/js/sample.js')}}"></script>

    <script>
        initSample();
    </script>
@endsection
