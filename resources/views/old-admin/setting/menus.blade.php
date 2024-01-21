@extends('admin.master')
@section('main')
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">فهرست ها</h2>
            <p>افزودن، ویرایش و حذف فهرست</p>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <form action="{{route('menu.store')}}" method="POST" class="formbox p-2">
                        @csrf
                        <input type="text" hidden name="id" id="id" value="0">
                        <div class="mb-4">
                            <label class="form-label">عنوان</label>
                            <input type="text" name="name" id="name" value="{{old('name')}}" placeholder="" class="form-control"/>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">لینک</label>
                            <input type="text" name="link" id="link" value="{{old('link')}}" placeholder="" class="form-control" />
                        </div>
                        <div class="mb-4">
                            <label class="form-label">مادر</label>
                            <select name="main" id="main" class="form-control">
                                <option selected disabled>انتخاب فهرست مادر</option>
                                @foreach($mainmenus as $item)
                                    <option>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-sm btn-primary px-1 w-100" id="button" type="submit">ایجاد فهرست</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-sm btn-warning px-1 w-100" id="discard" type="button">انصراف</button>
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
                                    <th>آدرس</th>
                                    <th>مادر</th>
                                    <th class="text-end">عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td><b>{{$item->name}}</b></td>
                                        <td>
                                            {{$item->link}}
                                        </td>
                                        <td>
                                            @if($item->main != 0)
                                            @else
                                                {{$item->main}}
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            <a href="{{route('menu.remove',['id'=>$item->id])}}" class="float-end mx-2 text-danger" data-id="{{$item->id}}">حذف</a>
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
            url: '{{route("menu.get")}}',
            type: "GET",
            data: {
                id:$(this).attr('data-id'),
            },
            success:function(data){
                console.log(data)
                $('.formbox').addClass('shadow-lg');
                $('#id').val(data.id);
                $('#name').val(data.name);
                $("#link").val(data.link);
                $("#main").val(data.main);
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
        $('#button').text('ایجاد سایز');

    })
</script>
@endsection