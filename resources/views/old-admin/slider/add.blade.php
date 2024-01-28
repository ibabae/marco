@extends('admin.master')
@section('main')
<div class="row">
    <div class="col-12 col-lg-9">
        <div class="content-header">
            <h2 class="content-title">افزودن محصول</h2>
        </div>
    </div>
    <div class="col-12">
        <form class="row" action="{{route('slide.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row gx-5">
                        <section class="content-body p-xl-4">
                            <div class="row mb-4">
                                <label class="col-lg-2 col-3 col-form-label"><span class="text-danger">*</span> عنوان</label>
                                <div class="col-lg-4 col-9">
                                    <input type="text" name="Title" class="form-control" required value="{{old('Title')}}" placeholder="">
                                    @error('Title')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> <!-- col.// -->

                            </div> <!-- row.// -->
                            <div class="row mb-4">
                                <label class="col-lg-2 col-3 col-form-label"><span class="text-danger">*</span> متن دوم</label>
                                <div class="col-lg-4 col-9">
                                    <input type="text" name="Text2" class="form-control" required value="{{old('Text2')}}" placeholder="">
                                    @error('Text2')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> <!-- col.// -->
                                <label class="col-lg-2 col-3 col-form-label"><span class="text-danger">*</span> متن سوم</label>
                                <div class="col-lg-4 col-9">
                                    <input type="text" name="Text3" class="form-control" required value="{{old('Text3')}}" placeholder="">
                                    @error('Text3')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> <!-- col.// -->

                            </div> <!-- row.// -->
                            <div class="row mb-4">

                                <label class="col-lg-2 col-3 col-form-label"><span class="text-danger">*</span> تصویر اصلی</label>
                                <div class="col-lg-4 col-9">
                                    <input class="form-control mb-2" accept="image/*" name="Image" type="file" required>
                                    @error('Image')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> <!-- col.// -->
                                <label class="col-lg-2 col-3 col-form-label"><span class="text-danger">*</span> لینک</label>
                                <div class="col-lg-4 col-9">
                                    <input type="text" name="Link" class="form-control" required value="{{old('Link')}}" placeholder="">
                                    @error('Link')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> <!-- col.// -->
                                <label class="col-lg-2 col-3 col-form-label"></label>
                                <div class="col-lg-4 col-9 pt-2">
                                    <input type="checkbox" name="Status" id="status" class="form-check-input">
                                    <label for="status">فعال</label>
                                    @error('Featured')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> <!-- col.// -->

                            </div>
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
        </form>
    </div>
</div>
@endsection
