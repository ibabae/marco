@extends('master')
@section('main')
@include('layout.header')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home')}}" rel="nofollow">خانه</a>
                <span></span> {{$page->Title}}
            </div>
        </div>
    </div>
    <section class="pt-50 pb-50">
        <div class="container">
            <?=$page->Content?>
        </div>
    </section>
</main>
@include('layout.footer')
@endsection