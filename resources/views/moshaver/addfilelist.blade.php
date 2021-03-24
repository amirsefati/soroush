@extends('moshaver.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row" style="width:100%">
                    <div class="col-md-4 pt-2 pr-4">لیست فایل های ناقص</div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4" style="text-align: left;">
                        <a href="/moshaver/addfile_get">
                            <button class="btn btn-danger pr-5 pl-5">افزودن فایل</button>
                        </a>
                        <a href="/moshaver/adduser">
                        <button class="btn btn-warning">افزودن کاربر</button>
                        </a>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <input type="text" id="myInput" onkeyup="myFunction(1)" placeholder="جست جو فایل  ...">

                <table class="table table-striped" id="myTable">
                    <tr class="header">
                        <th style="width:30%;">نام فایل</th>
                        <th style="width:30%;">نام مالک</th>
                        <th style="width:30%;">اطلاعات فایل</th>
                        <th style="width:10%;">وضعیت</th>

                    </tr>
                    <tr>
                        <td>فایل اول</td>
                        <td>سروش عزیز زاده</td>
                        <td>منطقه 1</td>
                        <td>20%</td>
                    </tr>
                    
                </table>
            </div>
        </div>
    </div>
</div>

@endsection