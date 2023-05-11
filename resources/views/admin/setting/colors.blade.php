@extends('admin.master')
@section('main')
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">رنگ ها</h2>
            <p>افزودن، ویرایش و حذف دسته</p>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <form action="{{route('color.store')}}" method="POST" class="formbox p-2">
                        @csrf
                        <input type="text" hidden name="id" id="id" value="0">
                        <div class="mb-4">
                            <label for="product_name" class="form-label">عنوان</label>
                            <input type="text" name="name" id="name" value="{{old('name')}}" placeholder="" class="form-control" id="product_name" />
                        </div>
                        <div class="mb-4">
                            <label class="form-label">انتخاب رنگ</label>
                            <input type="color" name="code" id="code" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-primary px-1 w-100" id="button" type="submit">ایجاد رنگ</button>
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
                                    <th>رنگ</th>
                                    <th class="text-end">عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($colors as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td><b>{{$item->Name}}</b></td>
                                        <td>
                                            <span style="width:15px;height:15px;background-color:{{$item->Code}}; border-radius:100%;display:inline-block;border:1px solid #ddd"></span>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{route('color.remove',['id'=>$item->id])}}" class="float-end mx-2 text-danger" data-id="{{$item->id}}">حذف</a>
                                            <a href="javascript:void(0);" class="float-end mx-2 edit text-primary" data-id="{{$item->id}}">ویرایش</a>
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
            url: '{{route("color.get")}}',
            type: "GET",
            data: {
                id:$(this).attr('data-id'),
            },
            success:function(data){
                console.log(data)
                $('.formbox').addClass('shadow-lg');
                $('#id').val(data.id);
                $('#name').val(data.name);
                $("#code").val(data.code);
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
        $('#button').text('ایجاد رنگ');

    })
</script>
@endsection