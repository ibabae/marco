@extends('admin.master')
@section('main')
<div class="row">
    <div class="col-9">
        <div class="content-header">
            <h2 class="content-title">ویرایش محصول</h2>
            <a href="{{route('product',['id'=>$product->id,'title'=>$product->title])}}">مشاهده</a>
        </div>
    </div>
    <div class="col-12">
        <form class="row" action="{{route('product.edit.store',['id'=>$product->id])}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="col-12 col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row gx-5">
                            <section class="content-body p-xl-4">
                                <div class="row mb-4">
                                    <label class="col-lg-2 col-3 col-form-label">عنوان<span class="text-danger">*</span></label>
                                    <div class="col-lg-4 col-9">
                                        <input type="text" name="title" value="{{$product->title}}" class="form-control" required value="{{old('title')}}" placeholder="">
                                        @error('Title')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div> <!-- col.// -->
                                    <label class="col-lg-2 col-3 col-form-label"></label>
                                    <div class="col-lg-4 col-9 pt-2">
                                        <input type="checkbox" name="featured" class="form-check-input" @if($product->featured == 1) checked="" @endif> ویژه
                                        @error('Featured')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div> <!-- col.// -->
                                </div> <!-- row.// -->
                                <div class="row">
                                    <label class="col-lg-2 col-3 col-form-label">کد</label>
                                    <div class="col-lg-4 col-9 col-6 mb-4">
                                        <input type="text" name="Code" value="{{$product->code}}" class="form-control" required value="{{old('code')}}" placeholder="">
                                        @error('Code')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label class="col-lg-2 col-3 col-form-label">جنس</label>
                                    <div class="col-lg-4 col-9 col-6 mb-4">
                                        <input type="text" name="material" value="{{$product->material}}" class="form-control" required value="{{old('material')}}" placeholder="">
                                        @error('Material')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div> <!-- row.// -->
                                </div> <!-- row.// -->
                                <div class="row">
                                    <label class="col-lg-2 col-3 col-form-label">قیمت اصلی</label>
                                    <div class="col-lg-4 col-9 col-6 mb-4">
                                        <input placeholder="" name="price" value="{{number_format($product->price)}}" required value="{{old('price')}}" id="" type="text" class="form-control amount">
                                        @error('Price')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <label class="col-lg-2 col-3 col-form-label">مقدار تخفیف</label>
                                    <div class="col-lg-4 col-9 col-6 mb-4">
                                        <input placeholder="" value="{{number_format($product->disAmount)}}" name="disAmount" type="text" value="{{old('disAmount')}}" class="form-control amount">
                                        @error('DisAmount')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-lg-3 col-form-label">توضیحات</label>
                                    <div class="col-lg-9">
                                        <textarea class="form-control" name="description" required placeholder="" rows="4">{{$product->description}}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div> <!-- col.// -->
                                </div> <!-- row.// -->

                                <textarea id="editor" name="content">{{$product->content}}</textarea>
                                @error('content')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror

                                <div class="row mb-4">
                                    <label class="col-lg-3 col-form-label">وضعیت</label>
                                    <div class="col-lg-9">
                                        <label class="form-check my-2">
                                            <input type="checkbox" name="status" class="form-check-input" @if($product->status == 1) checked="" @endif>
                                            <span class="form-check-label">فعال </span>
                                        </label>
                                    </div> <!-- col.// -->
                                </div> <!-- row.// -->
                                <div class="row mb-4">
                                    <h5 class="mb-3">سایزبندی</h5>
                                    <div class="col-12 border-bottom pb-3 mb-2" id="sizeList">
                                        <div id="size-group">
                                            @php($i = 0)
                                            @if(is_array(json_decode($product->stock ,true)))
                                                @foreach (json_decode($product->stock ,true) as $item)
                                                    @php($i += 1)
                                                    <div class="row mb-2 size-row px-2 sizeRow">
                                                        <div class="col-6 col-lg-4 mb-1">
                                                            <select name="stock[{{$i}}][color]" id="" class="form-control">
                                                                @foreach ($colors as $color)
                                                                    <option value="{{$color->code}}" @if($item['color'] == $color->code ) selected @endif>{{$color->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-6 col-lg-4 mb-1">
                                                            <select name="stock[{{$i}}][size]" id="" class="form-control">
                                                                @foreach ($sizes as $size)
                                                                    <option value="{{$size->code}}" @if($item['size'] == $size->code) selected @endif>{{$size->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-8 col-lg-3 mb-1">
                                                            <div class="num-block skin-2 border rounded-3 py-2">
                                                                <div class="row num-in px-1">
                                                                    <div class="col-3 px-1"><center><span class="plus"></span></center></div>
                                                                    <div class="col-6 px-0"><input type="text" name="stock[{{$i}}][count]" class="in-num" value="{{$item['count']}}" readonly=""></div>
                                                                    <div class="col-3 px-1"><center><span class="minus dis"></span></center></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 col-lg-1 pt-2 mb-1">
                                                            <a class="text-danger text-center delete" href="javascript:void(0)"><i class="icon material-icons md-delete"></i></a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <a class="text-primary add-size small"><i class="icon material-icons md-plus"></i>افزودن</a>
                                    </div>
                                </div>

                            </section> <!-- content-body .// -->
                            <div class="col-12">
                                <div class="float-start">
                                    {{-- <button class="btn btn-light rounded font-sm mr-5 text-body hover-up">ذخیره پیش نویس</button> --}}
                                    <button id="submit" class="btn btn-md rounded font-sm hover-up">انتشار</button>
                                </div>
                            </div>

                        </div> <!-- row.// -->
                    </div> <!-- card body end// -->
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>تصاویر</h4>
                    </div>
                    <div class="card-body">
                        <div class="input-upload">
                            <h6 class="text-end my-2">تصویر اصلی <span class="text-danger">*</span></h6>
                            <img src="{{asset($product->primaryImage)}}" alt="">
                            <input class="form-control" accept="image/*" name="PrimaryImage" type="file">
                            <h6 class="text-end my-2">تصویر دوم</h6>
                            <img src="{{asset($product->secondaryImage)}}" alt="">
                            <input class="form-control" accept="image/*" name="SecondaryImage" type="file">
                            <h6 class="text-end my-2">تصاویر گالری</h6>
                            <div class="row">
                                @foreach ($gallery as $item)
                                    <div class="col-3 px-1">
                                        <img src="{{asset($item->Name)}}" alt="" width="50" class="float-start">
                                    </div>
                                @endforeach
                            </div>
                            <hr>
                            <input class="form-control" type="file" name="gallery[]" accept="image/*" multiple>
                            <span class="text-danger small text-right">در صورت انتخاب دوباره، تصاویر قبلی حذف می شوند</span>
                        </div>
                    </div>
                </div> <!-- card end// -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>دسته بندی</h4>
                    </div>
                    <div class="card-body">
                        <div class="row gx-2">
                            <div class="col-12 mb-3">
                                <label class="form-label">دسته</label>
                                <select class="form-select" name="MainCategory" id="MainCategory">
                                    @foreach ($category as $item)
                                        <option value="{{$item->id}}" @if($product->MainCategory == $item->id) selected @endif>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="NewMainBox my-1" style="display: none">
                                <input type="text" class="form-control" id="newmain">
                                <button class="btn btn-sm btn-primary" id="addMain">ثبت</button>
                            </div>
                            <a href="" class="text-primary add-main">+ افزودن دسته</a>
                            <div class="col-12 mb-3" id="SubCatBox">
                                <label class="form-label">زیردسته</label>
                                <select class="form-select" id="SubCategory" name="category">
                                    @forelse ($subcategories as $item)
                                        <option value="{{$item->id}}" @if($product->category == $item->id) selected @endif>{{$item->name}}</option>
                                    @empty
                                    @endforelse
                                </select>
                                <div class="NewSubBox my-1" style="display: none">
                                    <input type="text" class="form-control" id="newsub">
                                    <button class="btn btn-sm btn-primary" id="addSub">ثبت</button>
                                </div>
                                <a href="" class="text-primary add-sub">+ افزودن زیر دسته</a>
                            </div>
                            <div class="mb-4">
                                <label for="product_name" class="form-label w-100">برچسب</label>
                                <input type="text" id="#inputTag" class="w-100" value="{{$product->tags}}" data-role="tagsinput" name="tags">
                            </div>
                        </div> <!-- row.// -->
                    </div>
                </div> <!-- card end// -->
            </div>
        </form>
    </div>
</div>
@endsection
@section('header')
    <link rel="stylesheet" href="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

@endsection

@section('footer')
    <script src="{{asset('admin-assets/plugins/CKEditor/ckeditor.js')}}"></script>
    <script src="{{asset('admin-assets/plugins/CKEditor/samples/js/sample.js')}}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script> --}}
    <script src="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

    <script>
        $("#inputTag").tagsinput('items');
        initSample();
        $(function(){
            var counter = {{$i}};
            $("#sizeList").on('click','.add-size',function(e) {
                counter++;
                var $row = $("<div class='row mb-2 size-row px-2 sizeRow'>");
                                $row.append(
                    $("<div class='col-6 col-lg-4 mb-1'>").append(
                        $('<select>').attr({
                            name: "stock["+counter+"][color]",
                            class: 'form-control'
                        })
                        @foreach($colors as $color)
                            .append($('<option>').html('{{$color->name}}').attr({value:'{{$color->code}}',}))
                        @endforeach
                    )
                );
                $row.append(
                    $("<div class='col-6 col-lg-4 mb-1'>").append(
                        $('<select>').attr({
                            name: "stock["+counter+"][size]",
                            class: 'form-control'
                        })
                        @foreach($sizes as $size)
                            .append($('<option>').html('{{$size->name}}').attr({value:'{{$size->code}}',}))
                        @endforeach
                    )
                );
                $row.append(
                    $("<div class='col-8 col-lg-3 mb-1'>").append(
                        $('<div class="num-block skin-2 border rounded-3 py-2">').append(
                            $('<div class="row num-in px-1">')
                            .append(
                                $('<div class="col-3 px-1">').append(
                                    $('<center>').append($('<span class="plus">'))
                                )
                            )
                            .append(
                                $('<div class="col-6 px-0">').append(
                                    $('<input>').attr({type:"text", name:"stock["+counter+"][count]", class:"in-num", value:"0", readonly: true})
                                )
                            )
                            .append(
                                $('<div class="col-3 px-1">').append(
                                    $('<center>').append($('<span class="minus dis">'))
                                )
                            )
                        )
                    )
                )
                $row.append(
                    $("<div class='col-4 col-lg-1 pt-2 mb-1'>").append(
                        $('<a class="text-danger text-center delete" href="javascript:void(0)">').append(
                            $('<i class="icon material-icons md-delete">')
                        )
                    )
                )
                $row.appendTo($("#size-group"));


            });
            $("#sizeList").on('click','.delete',function(){
                $(this).parent().parent().remove();
            })
            $('span[data-role="remove"]').html('x')
            $('#MainCategory').on('change',function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{route("category.get")}}',
                    type: "GET",
                    data: {
                        type: 2,
                        id: $(this).val(),
                    },
                    success:function(data){
                        $('#SubCategory').html(data)
                    },
                    error:function(data){
                        console.log(data)
                    },
                });
            })
        })
        $(function(){
            $('#sizeList').on('click','.num-in span',function () {
                var $input = $(this).parents('.num-block').find('input.in-num');
                if($(this).hasClass('minus')) {
                    var count = parseFloat($input.val()) - 1;
                    count = count < 0 ? 0 : count;

                    if (count < 2) {
                        $(this).addClass('dis');
                    }else {
                        $(this).removeClass('dis');
                    }
                    $input.val(count);
                } else {
                    var count = parseFloat($input.val()) + 1
                    $input.val(count);
                    if (count > 1) {
                        $(this).parents('.num-block').find(('.minus')).removeClass('dis');
                    }
                }

                $input.change();
                return false;
            });
            $('.add-sub').on('click',function(e){
                e.preventDefault();
                $('.NewSubBox').slideDown();
            })
            $('.add-main').on('click',function(e){
                e.preventDefault();
                $('.NewMainBox').slideDown();
            })
            $('#addSub').on('click',function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{route('category.store')}}",
                    type: 'POST',
                    data: {
                        parent: $('#MainCategory').val(),
                        name: $('#newsub').val(),
                        descriptions: null,
                        type: 1
                    },
                    success:function(data){
                        $('#SubCategory').html(data)
                        $('.NewSubBox').slideUp()
                        toastr.success("زیر دسته افزوده شد");
                    },
                    error:function(data){
                        console.log(data)
                    },
                })
            })
            $('#addMain').on('click',function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{route('category.store')}}",
                    type: 'POST',
                    data: {
                        parent: 0,
                        name: $('#newmain').val(),
                        descriptions: null,
                        type: 2
                    },
                    success:function(data){
                        $('#MainCategory').html(data)
                        $('.NewMainBox').slideUp()
                        toastr.success("دسته افزوده شد");
                    },
                    error:function(data){
                        console.log(data)
                    },
                })
            })
        })
        $('.amount').on('keyup',function(){
            var val = $(this).val();
            val = val.replace(/[^0-9\.]/g,'');
            if(val != "") {
                valArr = val.split('.');
                valArr[0] = (parseInt(valArr[0],10)).toLocaleString();
                val = valArr.join('.');
            }
            $(this).val(val);
        })

    </script>
@endsection
