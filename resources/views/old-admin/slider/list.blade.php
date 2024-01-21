@extends('admin.master')
@section('main')
<div class="content-header">
    <div>
        <h2 class="content-title card-title">اسلایدر اصلی</h2>
    </div>
    <div>
        <a href="{{route('slide.add')}}" class="btn btn-primary btn-sm rounded">افزودن</a>
    </div>
</div>
<div class="card mb-4">
    {{-- <header class="card-header">
        <div class="row align-items-center">
            <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                <select class="form-select">
                    <option selected>All category</option>
                    <option>Electronics</option>
                    <option>Clothes</option>
                    <option>Automobile</option>
                </select>
            </div>
            <div class="col-md-2 col-6">
                <input type="date" value="02.05.2021" class="form-control">
            </div>
            <div class="col-md-2 col-6">
                <select class="form-select">
                    <option selected>Status</option>
                    <option>Active</option>
                    <option>Disabled</option>
                    <option>Show all</option>
                </select>
            </div>
        </div>
    </header> <!-- card-header end// --> --}}
    <div class="card-body">
        @foreach ($collection as $item)
            <article class="itemlist">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-sm-4 col-8 flex-grow-1 col-name">
                        <a class="itemside" href="" target="_blank">
                            <div class="left">
                                <img src="{{asset($item->Image)}}" class="img-sm img-thumbnail" alt="Item">
                            </div>
                            <div class="info">
                                <h6 class="mb-0">{{$item->Title}}</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-1 col-sm-2 col-4 col-status">
                        @if($item->Status == 1)
                            <span class="badge rounded-pill alert-success">فعال</span>
                        @else
                            <span class="badge rounded-pill alert-warning">غیرفعال</span>
                        @endif
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4 col-date">
                        <span class="small">{{\Morilog\Jalali\Jalalian::forge($item->created_at)->format('%A، %d %B %Y')}}</span>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4 col-action text-end">
                        <a href="{{route('slide.edit',['id'=>$item->id])}}" class="btn btn-sm font-sm rounded btn-brand">
                            <i class="material-icons md-edit"></i> ویرایش
                        </a>
                        {{-- <a href="{{route('product.delete',['id'=>$item->id])}}"  class="btn btn-sm font-sm btn-light rounded">
                            <i class="material-icons md-delete_forever"></i> حذف
                        </a> --}}
                    </div>
                </div> <!-- row .// -->
            </article> <!-- itemlist  .// -->
        @endforeach
    </div> <!-- card-body end// -->
</div> <!-- card end// -->
@endsection