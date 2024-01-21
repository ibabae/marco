@extends('admin.master')
@section('main')
    <div class="content-header">
        <div>
            <h2 class="content-title card-title mb-3">پیغام از طرف {{$contact->Name}}</h2>
            <h3 class="mb-3">موضوع: <span class="text-info">{{$contact->Subject}}</span></h3>
            <p>موبایل: <a href="tel:{{$contact->Phone}}">{{$contact->Phone}}</a> @if($contact->Location != '') | موقعیت: {{$contact->Location}} @endif</p>
        </div>
        {{-- <div>
            <form action="">
                    @csrf
                <input type="text" placeholder="جستجو بر اساس نام یا موبایل" class="form-control bg-white">
            </form>
        </div> --}}
    </div>
    <div class="card mb-4">
        <!-- card-header end// -->
        <div class="card-body">
            <p>{{$contact->Message}}</p>
        </div>
        <!-- card-body end// -->
    </div>
@endsection