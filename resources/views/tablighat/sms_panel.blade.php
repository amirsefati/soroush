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
                            <button class="btn btn-primary" onclick='sms_ad_done()'>انجام شده</button>
                            <button class="btn btn-danger" onclick='sms_ad_not_done()'>انجام نشده</button>
                            <button class="btn btn-success" onclick='sms_ad_both()'>هر دو</button>
                        </div>
                    </div>
                </div>
                
                <table
                data-toggle="table"
                data-search="true"
                data-show-columns="true"
                id='sms_table'>
                    <thead>
                        <tr>
                            <th>نام مشاور</th>
                            <th>شماره تلفن مشاور</th>
                            <th data-field="status">وضیعت</th>
                            <th>تعداد تبلیغات قبلی</th>
                            <th>اطلاعات کامل</th>
                            <th>نتیجه تبلیغ</th>
                        </tr>
                    </thead>
                    <tbody>

                        <br>
                        <br>
                        <br>

                        @foreach ($reports as $report)

                            <div style="display: none">
                                {{$status = $report['tablighat']['has_done']}}
                            </div>
                        
                            <tr>
                                <td>{{$report['moshaver']['name']}}</td>
                                <td>{{$report['moshaver']['phone']}}</td>
                                <td>
                                    {{($status == 0 ? 'انجام نشده' : 'انجام شده')}} 
                                </td>
                                <td>{{$report['ad_times']}}</td>
                                <td> <span data-toggle="modal" data-target="#sms_modal" onclick="sms_modal({{json_encode($report)}})"><img src="/img/info_tablighat.svg"></span> </td>
                                <td> <span data-toggle="modal" data-target="#sms_result_modal" onclick="sms_result_modal({{json_encode($report)}})"><img src="/img/result_tablighat.svg"></span> </td>
                            </tr>
                            
                        @endforeach

                        
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>


@endsection