
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
                <div style="overflow-x: auto;">
                <table class="table table-striped" id="myTable">
                    <tr class="header">
                        <th style="width:30%;">نوع فایل</th>
                        <th style="width:30%;">نام مالک</th>
                        <th style="width:20%;">اطلاعات فایل</th>
                        <th style="width:10%;">وضعیت</th>
                        <th style="width:5%;">عملیات</th>

                    </tr>
                    @foreach($files_yes_publish as $file)
                    <tr>
                        <td><a href="/moshaver/files/{{$file->id}}">{{$file->type}}</a></td>
                        <td><a href="/moshaver/client/{{App\Models\User::find($file->userid_file)->id}}">{{App\Models\User::find($file->userid_file) ? App\Models\User::find($file->userid_file)->name : ''}}</a></td>
                        <td> <span style="font-size:12px;font-weight: bold;">{{$file->kind_type == 'sell' ? 'فروش' : 'اجاره'}}</span> <span style="font-size: 9px;color:gray">(  منطقه : {{$file->region}} )</span></td>
                        <td>20%</td>
                        <td>
                            <div class="row">
                                <div class="col-md-6 col-6 p-0">
                                <a href="/moshaver/editfile/{{$file->id}}"><img src="/img/edit.png" width="35px" alt=""></a>
                                </div>
                                <div class="col-md-6 col-6 p-0">
                                <a href="/moshaver/deletefile/{{$file->id}}"><img src="/img/delete.png" width="35px" alt=""></a>

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