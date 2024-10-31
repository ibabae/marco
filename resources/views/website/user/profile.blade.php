@extends('website.master')
@section('main')
@include('website.layout.header')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home')}}" rel="nofollow">خانه</a>
                <span></span> حساب کاربری
            </div>
        </div>
    </div>
    <section class="pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="row">
                        @include('website.user.menu')
                        <div class="col-md-8">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade active show" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>جزئیات حساب</h5>
                                        </div>
                                        <div class="card-body">
                                            <form id="profile" method="post" action="{{route('user.profile.store')}}" name="enq">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>نام <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="firstName" type="text" value="{{$user->firstName}}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>نام خانوادگی <span class="required">*</span></label>
                                                        <input class="form-control square" name="lastName" value="{{$user->lastName}}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>ایمیل <span class="required">*</span></label>
                                                        <input class="form-control square" value="{{$user->email}}" name="email" type="text">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>موبایل <span class="required">*</span></label>
                                                        <input class="form-control square" value="0{{$user->phone}}" readonly type="text">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-fill-out submit" name="submit">ذخیره</button>
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
    </section>
</main>
@include('website.layout.footer')
@endsection
@section('footer')
    <script>
        $('#profile').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                method: 'POST',
                url: $(this).attr('action'),
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(result){
                    toastr.success(result.message);
                },
                error: function(xhr, textStatus, errorThrown){
                    let messages = Object.entries(xhr.responseJSON.message)
                    for (var i = 0; i < messages.length; i++) {
                        toastr.warning(messages[i][1]);
                        $("input[name="+messages[i][0]+"]").addClass('border-danger')
                    }
                }
            })
        })
    </script>
@endsection
