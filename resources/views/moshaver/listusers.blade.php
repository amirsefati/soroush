@extends('moshaver.master')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row" style="width:100%">
                    <div class="col-md-4 pt-2 pr-4">لیست کابران   </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4" style="text-align: left;">
                        <a href="/moshaver/addfile_get">
                            <button class="btn btn-danger pr-5 pl-5">افزودن کاربر جدید</button>
                        </a>
                       
                    </div>

                </div>
            </div>
            <div class="card-body">
                <input type="text" id="myInput"  placeholder="جست جو کاربر  ...">
                <div style="overflow-x: auto;">
                <table class="table table-striped" id="myTable">
                    <tr class="header">
                        <th style="width:30%;">نام کاربر </th>
                        <th style="width:30%;">شماره تلفن    </th>
                        <th style="width:20%;"> نوع درخواست</th>
                        <th style="width:10%;">منطقه</th>
                        <th style="width:5%;">عملیات</th>

                    </tr>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->type}}</td>
                        <td>{{$user->region}}</td>
                        <td>
                            <div class="row">
                                <div class="col-md-6 col-6 p-0">
                                <a href="/moshaver/edituser/{{$user->id}}">Edit</a>
                                </div>
                                <div class="col-md-6 col-6 p-0">
                                <a href="/moshaver/deleteuser/{{$user->id}}"><img src="/img/delete.png" width="35px" alt=""></a>

                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection