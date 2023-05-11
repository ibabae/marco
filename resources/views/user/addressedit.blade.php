@extends('master')
@section('main')
@include('layout.header')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home')}}" rel="nofollow">خانه</a>
                <span></span> حساب کاربری
            </div>
        </div>
    </div>
    @php
        $url = url()->previous();
        $route = app('router')->getRoutes($url)->match(app('request')->create($url))->getName();
    @endphp
    <section class="pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="row">
                        @include('user.menu')
                        <div class="col-md-8">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade show active" id="address" role="tabpanel" aria-labelledby="address-tab">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card mb-3 mb-lg-0">
                                                <div class="card-header">
                                                    <h5 class="mb-0">ویرایش آدرس</h5>
                                                </div>
                                                <div class="card-body">
                                                    <form method="post" name="enq" action="{{route('account.address.update',['id'=>$address->id])}}">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                                <label>استان <span class="required text-danger">*</span></label>
                                                                <select class="form-control" name="state">
                                                                    <option default selected>انتخاب استان</option>
                                                                    @foreach($states as $state)
                                                                        <option value="{{$state->id}}" @if((old('state') AND old('state') == $state->id) OR $address->state == $state->id) selected @endif>{{$state->name_fa}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('state')
                                                                    <span class="text-warning">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>شهر<span class="required text-danger">*</span></label>
                                                                <input required="" class="form-control square" name="city" value="@if(old('city')){{old('city')}}@else{{$address->city}}@endif">
                                                                @error('city')
                                                                    <span class="text-warning">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label>آدرس <span class="required text-danger">*</span></label>
                                                                <input required="" class="form-control square" name="address" type="text" value="@if(old('address')){{old('address')}}@else{{$address->address}}@endif">
                                                                @error('address')
                                                                    <span class="text-warning">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>کد پستی </label>
                                                                <input class="form-control square" name="zipcode" type="number" value="@if(old('zipcode')){{old('zipcode')}}@else{{$address->zipcode}}@endif">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>پلاک</label>
                                                                <input class="form-control square" name="pelak" type="number" value="@if(old('pelak')){{old('pelak')}}@else{{$address->pelak}}@endif">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-check px-4">
                                                                    <label for="primary">پیشفرض</label>
                                                                    <input class="form-check-input" id="primary" name="primary" type="checkbox" @if(old('primary') == true ) checked @elseif($address->address == 1) checked @endif>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <button type="submit" class="btn btn-fill-out submit">ثبت</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@include('layout.footer')
@endsection