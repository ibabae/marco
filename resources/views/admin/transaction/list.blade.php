@extends('admin.master')
@section('main')
<div class="content-header">
    <h2 class="content-title">تراکنش های مالی</h2>
</div>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-9">
                <header class="border-bottom mb-4 pb-4">
                    <div class="row">
                        <div class="col-lg-5 col-6 me-auto">
                            <input type="text" placeholder="جستجو..." class="form-control">
                        </div>
                    </div>
                </header> <!-- card-header end// -->
                <div class="table-responsive">
                    <table class="table table-hover transaction">
                        <thead>
                            <tr>
                                <th>شماره تراکنش</th>
                                <th>مبلغ</th>
                                <th>وضعیت</th>
                                <th>نوع پرداخت</th>
                                <th>تاریخ</th>
                                <th class="text-end"> عملیات </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $item)
                                <tr>
                                    <td><b>{{$item->id}}</b></td>
                                    <td>{{price($item->Price)}}</td>
                                    <td><?=TransStatus($item->Status)?></td>
                                    <td><?=GateWay($item->GateWay)?></td>
                                    <td>{{\Morilog\Jalali\Jalalian::forge($item->created_at)->format('%A، %d %B %Y')}} <span class="text-primary">ساعت</span> {{date('H:i',strtotime($item->created_at))}}</td>
                                    <td class="text-end">
                                        <a href="" class="btn btn-sm btn-light font-sm rounded details" data-id="{{$item->id}}">جزئیات</a>
                                    </td>
                                </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                    </table>
                </div> <!-- table-responsive.// -->
            </div> <!-- col end// -->
            <aside class="col-lg-3">
                <div class="box bg-light trans-detail" style="min-height:80%">
                    <p class="text-center text-muted my-5 not-select">برای مشاهده تراکنش <br> آن را انتخاب کنید</p>
                </div>
            </aside> <!-- col end// -->
        </div> <!-- row end// -->
    </div> <!-- card-body // -->
</div> <!-- card end// -->
<div class="pagination-area mt-30 mb-50">
    {{$transactions->links()}}
</div>
@endsection
@section('footer')
<script>
    $(function(){
        $('.text-end a').on('click',function(e){
            e.preventDefault();
            // View Transaction Details
        })
        $('.transaction').on('click','.details',function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{route("transaction.get")}}',
                type: "GET",
                data: {
                    id: $(this).attr('data-id'),
                },
                success:function(data){
                    // console.log(data);
                    $('.trans-detail').html(data)
                },
                error:function(data){
                    console.log(data)
                },
            });
        })
    })
</script>
    
@endsection