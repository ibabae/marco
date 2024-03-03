@extends('admin.master')
@section('breadcrumbs')
    <div class="header-body-left">

        <h3 class="page-title">فروشگاه</h3>

        <!-- begin::breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">داشبورد</a></li>
                <li class="breadcrumb-item" aria-current="page">فروشگاه</li>
                <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
            </ol>
        </nav>
        <!-- end::breadcrumb -->

    </div>

@endsection
@section('header')
	<!-- Plugin styles -->
    <link rel="stylesheet" href="{{asset('vendors/bundle.css')}}" type="text/css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all" type="text/css" />

    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('vendors/select2/css/select2.min.css')}}" type="text/css">

    <!-- Range slider -->
	<link rel="stylesheet" href="{{asset('vendors/range-slider/css/ion.rangeSlider.min.css')}}" type="text/css">

    <!-- Tagsinput -->
	<link rel="stylesheet" href="{{asset('vendors/tagsinput/bootstrap-tagsinput.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('vendors/colorpicker/css/bootstrap-colorpicker.min.css')}}" type="text/css">

    <!-- Form wizard -->
	<link rel="stylesheet" href="{{asset('vendors/form-wizard/jquery.steps.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('admin-assets/css/form-wizard.css')}}" type="text/css">
    <style>
        .num-block .minus, .num-block .plus{
            cursor: pointer;
        }

        .skin-2 .num-in	span {
            width: 20px;
            height: 20px;
            display: block;
            position: relative;
            background-color: #5bc9e2;
            border-radius: 5px;
        }

        .skin-2 .num-in span:before, .skin-2 .num-in span:after {
            content: '';
            position: absolute;
            background-color: #fff;
            height: 2px;
            width: 10px;
            top: 50%;
            left: 50%;
            margin-top: -1px;
            margin-left: -5px;
        }

        .skin-2 .num-in span.plus:after {
            transform: rotate(90deg);
        }

        .skin-2 .num-in input {
            max-width: 100%;
            height: 20px;
            border: none;
            text-align: center;
        }
    </style>
      <style>
        /* Basic styles for the tree structure */
        #tree ul {
            list-style-type: none;
            padding-right: 20px;
        }

        #tree ul ul {
            margin-right: 20px;
        }

        #tree label {
            cursor: pointer;
        }

      </style>

@endsection
@section('main-content')
<div class="card">
    <div class="card-body">
        <h6 class="card-title">{{$title}}</h6>
        <form id="contact" action="#">
            <div>
                <h3>اطلاعات محصول</h3>
                <section>
                    {{-- <button type="button" class="btn btn-secondary"
                        data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-custom-class="custom-tooltip"
                        data-bs-title="This top tooltip is themed via CSS variables.">
                        Custom tooltip
                    </button> --}}

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-floating">
                                <input type="text" autofocus name="title" class="form-control required" id="title" placeholder="عنوان">
                                <label for="title">عنوان</label>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-floating">
                                <input type="text" name="code" class="form-control digits" id="code" placeholder="کد">
                                <label for="code">کد</label>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-4 my-auto">
                            <div class="custom-control custom-checkbox custom-checkbox-warning">
                                <input type="checkbox" class="custom-control-input" id="featured" name="featured">
                                <label class="custom-control-label" for="featured">محصول ویژه</label>
                            </div>
                        </div>
                    </div>
                    <div id="tree">
                        <ul id="categories">
                        </ul>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="productType" class="form-control required" id="productType" placeholder="جنس">
                                <label for="productType">جنس</label>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="خلاصه" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">خلاصه</label>
                            </div>
                        </div>
                    </div>
                </section>
                <h3>انبار</h3>
                <section>
                    <div class="row mb-4">
                        <h5 class="mb-3">اقلام</h5>
                        <div class="col-12 border-bottom pb-3 mb-2" id="sizeList">
                            <div id="size-group"></div>
                            <a class="text-primary add-size small" href="{{route('admin.product.itemsData')}}"><i class="fa fa-plus me-2"></i>افزودن</a>
                        </div>

                    </div>
                </section>
                <h3>رسانه</h3>
                <section>
                    <div class="row mb-4">
                        <input id="input-id" data-show-upload="false" name="input-id" type="file" class="file" multiple data-browse-on-zone-click="true">

                    </div>
                </section>
                <h3>Finish</h3>
                <section>
                    <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                    <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                </section>
            </div>
        </form>
    </div>
</div>
@endsection
@section('footer')
<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="newColorModal" tabindex="-1" aria-labelledby="newColorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form onsubmit="return false" action="{{route('admin.color.add')}}" method="POST" class="modal-content color-ajax">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="newColorModalLabel">افزودن رنگ</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">انصراف</button>
                    <button type="submit" class="btn btn-primary">ثبت</button>
                </div>
            </form>
        </div>
  </div>
  <div class="modal fade" id="newSizeModal" tabindex="-1" aria-labelledby="newSizeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form onsubmit="return false" action="{{route('admin.size.add')}}" method="POST" class="modal-content size-ajax">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="newSizeModalLabel">افزودن سایز</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">انصراف</button>
                    <button type="submit" class="btn btn-primary">ثبت</button>
                </div>
            </form>
        </div>
  </div>
    <!-- Select2 -->
	<script src="{{asset('vendors/select2/js/select2.min.js')}}"></script>
	<script src="{{asset('admin-assets/js/examples/select2.js')}}"></script>

	<!-- Range slider -->
	<script src="{{asset('vendors/range-slider/js/ion.rangeSlider.min.js')}}"></script>
	<script src="{{asset('admin-assets/js/examples/range-slider.js')}}"></script>

    <!-- Form wizard -->
	{{-- <script src="{{asset('vendors/form-wizard/jquery.steps.min.js')}}"></script> --}}
	<script src="{{asset('admin-assets/js/examples/form-wizard.js')}}"></script>

    <script src='{{asset('vendors/jquery.validate.js')}}'></script>
    <script src='{{asset('vendors/jquery-steps/jquery.steps.js')}}'></script>
    <script>
        $(function(){
            var counter = 0;
            $("#sizeList").on('click','.add-size',function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('href'),
                    method: 'GET',
                    success:function(response){
                        counter++;
                        var $row = $("<div class='row mb-2 size-row px-2 sizeRow'>");
                        $row.append(
                            $("<div class='col-6 col-lg-4 mb-1 colors'>").append(
                                $('<div class="row">').append(
                                    $('<div class="col-10">').append(
                                        $('<select>').attr({
                                            name: "stock["+counter+"][color]",
                                            class: 'form-control colorselect'
                                        })
                                        .append(
                                            $('<option>')
                                            .html('انتخاب رنگ')
                                            .attr({value:'0',disabled:'disabled',selected:'selected'})
                                        )
                                    )
                                ).append(
                                    $('<div class="col-2 my-auto">').append(
                                        $('<a class="text-info add-new-color small" data-bs-toggle="modal" data-bs-target="#newColorModal" href="javascript:void(0)" title="افزودن رنگ جدید"><i class="fa fa-plus me-2">')
                                    )
                                )
                            )
                        )
                        // Use $.each after appending the select element
                        var $colorSelect = $row.find('.colorselect');
                        $.each(response.colors, function(key, colorItem) {
                            $colorSelect.append(
                                $('<option>').html(colorItem.name).attr({value:colorItem.id})
                            );
                        });

                        $row.append(
                            $("<div class='col-6 col-lg-4 mb-1 sizes'>").append(
                                $('<div class="row">').append(
                                    $('<div class="col-10">').append(
                                        $('<select>').attr({
                                            name: "stock["+counter+"][size]",
                                            class: 'form-control sizeselect'
                                        })
                                        .append(
                                            $('<option>')
                                            .html('انتخاب سایز')
                                            .attr({value:'0',disabled:'disabled',selected:'selected'})
                                        )
                                    )
                                ).append(
                                    $('<div class="col-2 my-auto">').append(
                                        $('<a class="text-info add-new-size small" data-bs-toggle="modal" data-bs-target="#newSizeModal" href="javascript:void(0)" title="افزودن رنگ جدید"><i class="fa fa-plus me-2">')
                                    )
                                )
                            )
                        );
                        var $sizeSelect = $row.find('.sizeselect');
                        $.each(response.sizes, function(key, sizeItem) {
                            $sizeSelect.append(
                                $('<option>').html(sizeItem.name).attr({value:sizeItem.id})
                            );
                        });

                        $row.append(
                            $("<div class='col-8 col-lg-3 mb-1'>").append(
                                $('<div class="num-block skin-2 border rounded-3 py-1">').append(
                                    $('<div class="row num-in px-1">')
                                    .append(
                                        $('<div class="col-3 px-1 my-auto">').append(
                                            $('<center>').append($('<span class="plus">'))
                                        )
                                    )
                                    .append(
                                        $('<div class="col-6 px-0">').append(
                                            $('<input>').attr({type:"text", name:"stock["+counter+"][count]", class:"in-num rounded", value:"0", readonly: true})
                                        )
                                    )
                                    .append(
                                        $('<div class="col-3 px-1 my-auto">').append(
                                            $('<center>').append($('<span class="minus dis">'))
                                        )
                                    )
                                )
                            )
                        )
                        $row.append(
                            $("<div class='col-4 col-lg-1 pt-2 mb-1'>").append(
                                $('<a class="text-danger text-center delete" href="javascript:void(0)">').append(
                                    $('<i class="fa fa-minus-circle">')
                                )
                            )
                        )
                        $row.appendTo($("#size-group"));
                    }
                })
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
                        toastr.success("دسته افزوده شد");
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
        $('#newProduct').on('submit',function(e){
            e.preventDefault();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/buffer.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/filetype.min.js" type="text/javascript"></script>
    <!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you
        wish to resize images before upload. This must be loaded before fileinput.min.js -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/piexif.min.js" type="text/javascript"></script>
    <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
        This must be loaded before fileinput.min.js -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/sortable.min.js" type="text/javascript"></script>
    <!-- bootstrap.bundle.min.js below is needed if you wish to zoom and preview file content in a detail modal
        dialog. bootstrap 5.x or 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <!-- the main fileinput plugin script JS file -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>
    <!-- following theme script is needed to use the Font Awesome 5.x theme (`fa5`). Uncomment if needed. -->
    <!-- script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/themes/fa5/theme.min.js"></script -->

    <!-- optionally if you need translation for your language then include the locale file as mentioned below (replace LANG.js with your language locale) -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/locales/LANG.js"></script>
    <script src="{{asset('admin-assets/js/custom.js')}}"></script>
    <script>
        // $.fn.fileinputBsVersion = "3.3.7"; // if not set, this will be auto-derived
        // $("#input-id").fileinput();

        // // with plugin options
        // $("#input-id").fileinput({'showUpload':false, 'previewFileType':'any'});
        $(document).ready(function() {
            $("#input-24").fileinput({
                initialPreviewAsData: true,
                overwriteInitial: false,
                maxFileSize: 100,
                showRemove: true,
                removeClass: "btn btn-danger",
                removeLabel: "حذف همه",
                removeIcon: "<i class=\"bi-trash\"></i> ",

            });
        });
        var data = {!! json_encode($categoryArray) !!};
        var jsonData = JSON.stringify(data);
        console.log(jsonData);
        const categoriesList = document.getElementById('categories');
        buildTree(data, categoriesList);
    </script>
    <script src="{{asset('admin-assets/js/size-ajax.js')}}"></script>
    <script src="{{asset('admin-assets/js/color-ajax.js')}}"></script>
    <script src="{{asset('vendors/colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
	<script src="{{asset('admin-assets/js/examples/colorpicker.js')}}"></script>


@endsection
