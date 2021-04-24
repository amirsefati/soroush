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
                <div class="row">
                    @foreach($users as $user)
                        <div class="col-md-3 mt-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="/moshaver/edituser/{{$user->id}}">
                                        <img src="{{$user->thumbnail ? $user->thumbnail : '/img/noimg.png'}}" class="addfilelist_img" alt="">
                                    </a>
                                </div>
                                <div class="col-md-6 pr-0 pt-2">
                                    <div>
                                        <p>{{$user->name}}</p>
                                        <p class="listuser_phone">شماره تلفن : <span>{{$user->phone}}</span></p>
                                        <p class="listuser_phone">نوع درخواست : <span>{{$user->kind_type == 'sell' ? ' خریدار' : 'اجاره'}}</span></p>
                                        <br>
                                        <a style="color: blue;padding:10px" href="/moshaver/user_find_file/{{$user->id}}">جستجو فایل</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


@endsection