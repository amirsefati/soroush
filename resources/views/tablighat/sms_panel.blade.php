@extends('tablighat.master')
@section('content')

<div class="row">
    <div class="col-md-12">
        .<div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12" style="text-align: left">
                        <div style="position: absolute; left: 15px; top: 10px">
                            <button class="btn btn-primary" onclick='ad_done()'>انجام شده</button>
                            <button class="btn btn-danger" onclick='ad_not_done()'>انجام نشده</button>
                            <button class="btn btn-success" onclick='ad_both()'>هر دو</button>
                        </div>
                    </div>
                </div>

                <table
                    id="moshaver_performance_table"
                    data-show-columns-toggle-all="true"
                    data-pagination-h-align="left"
                    data-pagination-detail-h-align="right"
                    style="text-align: right">
                </table>
            </div>
        </div>
    </div>
</div>


@endsection