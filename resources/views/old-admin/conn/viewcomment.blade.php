@extends('admin.master')
@section('main')
    <div class="content-header">
        <div>

            <h2 class="content-title card-title mb-3">دیدگاه از: @if($comment->UserId != null) <a href="{{route('user.view',['id'=>$comment->UserId])}}">{{$comment->Author}}</a> @else {{$comment->Author}} @endif</h2>
            <h3 class="mb-3">محصول: <a href="{{route('product',['id'=>$comment->PostId])}}" target="_blank" class="text-info">{{$comment->Product->Title}}</a></h3>
            <p>موبایل: <a href="tel:{{$comment->Phone}}">{{$comment->Phone}}</a> @if($comment->Location != '') | موقعیت: {{$comment->Location}} @endif</p>
        </div>
        {{-- <div>
            <form action="">
                    @csrf
                <input type="text" placeholder="جستجو بر اساس نام یا موبایل" class="form-control bg-white">
            </form>
        </div> --}}
    </div>
        <div class="row mb-4">
            <div class="col-lg-10 col-12">
                <div class="card m-0">
                    <!-- card-header end// -->
                    <div class="card-body">
                        <p>{{$comment->Comment}}</p>
                    </div>
                    <!-- card-body end// -->
                </div>
            </div>
            <div class="col-lg-2 col-12 small text-center">
                {{\Morilog\Jalali\Jalalian::forge($comment->created_at)->format('%A، %d %B %Y ساعت H:i:s')}}
            </div>
        </div>
        @foreach ($replies as $item)
            @if($item->UserId != null AND $item->User->role == 1)
                <div class="row mb-4">
                    <div class="col-lg-2 col-12 small text-center order-2 order-lg-1">
                        {{\Morilog\Jalali\Jalalian::forge($item->created_at)->format('%A، %d %B %Y ساعت H:i:s')}}
                    </div>
                    <div class="col-lg-10 col-12 order-1 order-lg-2">
                        <div class="card m-0 bg-secondary text-light">
                            <!-- card-header end// -->
                            <div class="card-body">
                                <p>{{$item->Comment}}</p>
                            </div>
                            <!-- card-body end// -->
                        </div>
                    </div>
                </div>
            @else 
            <div class="row mb-4">
                <div class="col-lg-10 col-12">
                    <div class="card m-0">
                        <!-- card-header end// -->
                        <div class="card-body">
                            <p>{{$item->Comment}}</p>
                        </div>
                        <!-- card-body end// -->
                    </div>
                </div>
                <div class="col-lg-2 col-12 small text-center">
                    {{\Morilog\Jalali\Jalalian::forge($item->created_at)->format('%A، %d %B %Y ساعت H:i:s')}}
                </div>
            </div>
            @endif
        @endforeach
    </div>
    <div class="row">
        <div class="card mb-4">
            <!-- card-header end// -->
            <div class="card-body">
                <form action="{{route('panel.comment.reply',['id'=>$comment->id])}}" method="POST">
                    @csrf
                    <div class="row mb-2">
                        <div class="col-9">
                            <textarea name="Comment" id="Comment" cols="30" rows="10" class="form-control mt-2" placeholder="پاسخ به دیدگاه..."></textarea>
                        </div>
                        <div class="col-3">
                            <button class="btn btn-primary float-end py-1">ثبت</button>
                        </div>
                    </div>

                </form>
            </div>
            <!-- card-body end// -->
        </div>

        
    </div>
@endsection