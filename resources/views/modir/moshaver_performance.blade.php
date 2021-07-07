@extends('modir.master')
@section('content')

<div class="row">
    <div class="col-md-12">
        .<div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <div id="accordianId" role="tablist" aria-multiselectable="true">
                    <div class="card">
                        <div class="card-header" role="tab" id="section1HeaderId">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">
                          انتخاب بازه 
                        </a>
                            </h5>
                        </div>
                        <div id="section1ContentId" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
                            <br>
                            <form action="/modir/range_moshaver_performance" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4" style="text-align: center;">
                                        <div class="range-from-example"></div>
                                        از <input name="from" type="text" id="range_from_modir" class="mt-2">
                                    </div>
                                    <div class="col-md-4" style="text-align: center;">
                                        <div class="range-to-example"></div>
                                        تا <input name="to" type="text" id="range_to_modir" class="mt-2">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12" style="text-align: center;">
                                        <button type="submit" class="btn btn-success pl-4 pr-4">اعمال بازه </button>
                                    </div>
                                </div>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
                <br>
                <hr>
                <div class="row">
                    <div class="col-md-12" style="text-align: left">
                        <div style="position: absolute; left: 15px; top: 10px">
                            <button class="btn btn-primary" onclick='only_moshaver_table()'>مشاور</button>
                            <button class="btn btn-danger" onclick='only_monshi_table()'>منشی</button>
                            <button class="btn btn-success" onclick='both_table()'>هر دو</button>
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