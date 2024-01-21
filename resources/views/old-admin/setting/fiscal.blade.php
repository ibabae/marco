@extends('admin.master')
@section('main')
<div class="content-header">
    <h2 class="content-title">تنظیمات مالی </h2>
</div>
<div class="card">
    <div class="card-body">
        <div class="row gx-5">
            <div class="col-lg-12">
                <section class="content-body p-xl-4">
                    <form>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row gx-3">
                                    <div class="col-12  mb-3">
                                        <label class="form-label">درصد مالیات</label>
                                        <div class="input-group mb-3">
                                            <input type="text" dir="ltr" class="form-control" aria-label="Sizing example input" name="tax" value="{{Setting('tax')}}" aria-describedby="inputGroup-sizing-default">
                                            <span class="input-group-text" id="inputGroup-sizing-default">%</span>
                                        </div>
                                    </div> <!-- col .// -->
                                    <div class="col-12  mb-3">
                                        <label class="form-label">درصد سود از هر محصول</label>
                                        <div class="input-group mb-3">
                                            <input type="text" dir="ltr" class="form-control" aria-label="Sizing example input" name="profit" value="{{Setting('profit')}}" aria-describedby="inputGroup-sizing-default">
                                            <span class="input-group-text" id="inputGroup-sizing-default">%</span>
                                        </div>
                                    </div> <!-- col .// -->
                                </div> <!-- row.// -->
                            </div> <!-- col.// -->
                        </div> <!-- row.// -->
                        <br>
                        <button class="btn btn-primary" type="submit">ذخیره تغییرات</button>
                    </form>
                </section> <!-- content-body .// -->
            </div> <!-- col.// -->
        </div> <!-- row.// -->
    </div> <!-- card body end// -->
</div> <!-- card end// -->
@endsection