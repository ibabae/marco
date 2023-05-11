@extends('admin.master')
@section('main')
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">دسته ها</h2>
            <p>افزودن، ویرایش و حذف دسته</p>
        </div>
        <div>
            <input type="text" placeholder="Search Categories" class="form-control bg-white">
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <form action="{{route('category.store')}}" method="POST" class="formbox p-2">
                        @csrf
                        <input type="text" hidden name="id" id="id" value="0">
                        <div class="mb-4">
                            <label for="product_name" class="form-label">عنوان</label>
                            <input type="text" name="name" id="name" value="{{old('name')}}" placeholder="" class="form-control" id="product_name" />
                        </div>
                        <div class="mb-4">
                            <label class="form-label">والد</label>
                            <select class="form-select" name="parent" id="select">
                                <option value="0" default>بدون والد</option>
                                @foreach ($categories as $item)
                                    <option @if(old('parent') == $item->id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">توضیحات</label>
                            <textarea placeholder="" name="descriptions" id="descriptions" value="{{old('descriptions')}}" class="form-control"></textarea>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-primary px-1 w-100" id="button" type="submit">ایجاد دسته</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-warning px-1 w-100" id="discard" type="button">انصراف</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-9">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>نام</th>
                                    <th>والد</th>
                                    <th>توضیحات</th>
                                    <th class="text-end">عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td><b>{{$item->name}}</b></td>
                                        <td>
                                            @php
                                                if($item->parent != 0){
                                                    $parent = DB::table('categories')->where('id',$item->parent)->first();
                                                    echo '<span class="badge bg-light">'.$parent->name.'</span>';
                                                }else {
                                                    echo '<span class="badge bg-primary">دسته اصلی</span>';
                                                }
                                            @endphp
                                        </td>
                                        <td>{{$item->descriptions}}</td>
                                        <td class="text-end">
                                            <a href="javascript:void(0);" class="float-end mx-2 edit text-primary" data-id="{{$item->id}}">ویرایش</a>
                                            <a href="{{route('category.remove',['id'=>$item->id])}}" class="float-end mx-2 text-danger" data-id="{{$item->id}}">حذف</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- .col// -->
            </div> <!-- .row // -->
        </div> <!-- card body .// -->
    </div> <!-- card .// -->
@endsection
@section('header')
@endsection
@section('footer')
<script>
    $('.edit').on('click',function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{route("category.get")}}',
            type: "GET",
            data: {
                type: 1,
                id:$(this).attr('data-id'),
            },
            success:function(data){
                $('.formbox').addClass('shadow-lg');
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#descriptions').val(data.descriptions);
                $("#select").val("val2");
                $('#select option[value='+data.id+']').attr('selected','selected');
                $('#button').text('ثبت');
            },
            error:function(data){
                console.log(data)
            },
        });
    })
    $('#discard').on('click',function(){
        $('#name').val('')
        $('#id').val('')
        $('#descriptions').val('')
        $('.formbox').removeClass('shadow-lg');
        $('#select option').attr('selected',null);
        $('#button').text('ایجاد دسته');

    })
</script>
@endsection