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

    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('vendors/select2/css/select2.min.css')}}" type="text/css">

    <!-- Range slider -->
	<link rel="stylesheet" href="{{asset('vendors/range-slider/css/ion.rangeSlider.min.css')}}" type="text/css">

    <!-- Tagsinput -->
	<link rel="stylesheet" href="{{asset('vendors/tagsinput/bootstrap-tagsinput.css')}}" type="text/css">

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
@endsection
@section('main-content')
<div class="card">
    <div class="card-body">
        <h6 class="card-title">{{$title}}</h6>
        <form id="contact" action="#">
            <div>
                <h3>اطلاعات محصول</h3>
                <section>
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
                        <h5 class="mb-3">سایزبندی</h5>
                        <div class="col-12 border-bottom pb-3 mb-2" id="sizeList">
                            <div id="size-group"></div>
                            <a class="text-primary add-size small"><i class="fa fa-plus me-2"></i>افزودن سایز</a>
                        </div>
                    </div>
                </section>
                <h3>Hints</h3>
                <section>
                    <ul>
                        <li>Foo</li>
                        <li>Bar</li>
                        <li>Foobar</li>
                    </ul>
                </section>
                <h3>Finish</h3>
                <section>
                    <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                </section>
            </div>
        </form>
    </div>
</div>
@endsection
@section('footer')
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
                counter++;
                var $row = $("<div class='row mb-2 size-row px-2 sizeRow'>");
                $row.append(
                    $("<div class='col-6 col-lg-4 mb-1'>").append(
                        $('<select>').attr({
                            name: "stock["+counter+"][color]",
                            class: 'form-control'
                        })
                        .append($('<option>').html('انتخاب رنگ').attr({value:'0',disabled:'disabled',selected:'selected'}))
                        @foreach($colors as $color)
                            .append($('<option>').html('{{$color->title}}').attr({value:'{{$color->id}}',}))
                        @endforeach
                    )
                );
                $row.append(
                    $("<div class='col-6 col-lg-4 mb-1'>").append(
                        $('<select>').attr({
                            name: "stock["+counter+"][size]",
                            class: 'form-control'
                        })
                        .append($('<option>').html('انتخاب سایز').attr({value:'0',disabled:'disabled',selected:'selected'}))
                        @foreach($sizes as $size)
                            .append($('<option>').html('{{$size->title}}').attr({value:'{{$size->id}}',}))
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
            // e.preventDefault();
        });
    </script>

@endsection
