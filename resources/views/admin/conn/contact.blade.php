@extends('admin.master')
@section('main')
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">ارتباطات</h2>
            <p>پیامهایی که از بخش تماس ارسال شده است</p>
        </div>
        {{-- <div>
            <form action="">
                    @csrf
                <input type="text" placeholder="جستجو بر اساس نام یا موبایل" class="form-control bg-white">
            </form>
        </div> --}}
    </div>
    <div class="card mb-4">
        {{-- <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="text" placeholder="Search..." class="form-control" />
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <select class="form-select">
                        <option>Status</option>
                        <option>Active</option>
                        <option>Disabled</option>
                        <option>Show all</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <select class="form-select">
                        <option>Show 20</option>
                        <option>Show 30</option>
                        <option>Show 40</option>
                    </select>
                </div>
            </div>
        </header> --}}
        <!-- card-header end// -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#ردیف</th>
                            <th>نام</th>
                            <th>موبایل</th>
                            <th>موضوع</th>
                            <th>زمان</th>
                            <th class="text-end">عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td><b>{{$item->Name}}</b></td>
                                <td>{{$item->Phone}}</td>
                                <td>{{$item->Subject}}</td>
                                <td>{{\Morilog\Jalali\Jalalian::forge($item->created_at)->format('%A، %d %B %Y ساعت H:i:s')}}</td>
                                <td class="text-end">
                                    <a href="{{route('panel.contact.view',['id'=>$item->id])}}" class="btn btn-md rounded font-sm">مشاهده</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div> <!-- table-responsive//end -->
        </div>
        <!-- card-body end// -->
    </div>
    <div class="pagination-area mt-30 mb-50">
        {{$contacts->links()}}
    </div>
@endsection