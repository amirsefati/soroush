@extends('tablighat.master')

@section('content')

<div class="row">
    <div class="col-md-12 p-4">
        <div class="row index_box" style="height: 500px;">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 p-3">
                    <p class="index_box_work_p"> گزارش </p>

                    
                        <figure class="highcharts-figure" >
                        <div id="container"></div>
                        <br>
                        <p data-toggle="modal" data-target="#details_chart" class="highcharts-description" style="text-align: center;font-size:12px;">
                            جزئیات گزارش بر حسب روز
                        </p>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection