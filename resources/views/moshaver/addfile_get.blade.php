@extends('moshaver.master')
@section('content')

<div class="row">
    <div class="col-md-12">
    <form action="/moshaver/addfile_post" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="card">
            <div class="card-header">
                <div class="row" style="width: 100%;">
                    <div class="col-md-4">افزودن فایل جدید</div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4" style="text-align: left;">
                        <button type="submit" class="btn btn-success pr-4 pl-4">ارسال فایل</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
            
                <div class="row">
                    <div class="col-md-12" style="text-align: center;">
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collaps1" aria-expanded="false" aria-controls="collaps1">مشخصات اولیه فایل</button>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collaps2" aria-expanded="false" aria-controls="collaps2">اطلاعات تکمیلی</button>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collaps3" aria-expanded="false" aria-controls="collaps3">افزودن عکس و فیلم</button>
                    </div>
                </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="multi-collapse collapse show" id="collaps1">
                        <div class="card card-body m-3" style="background:#f4f6f9;box-shadow:0 0 51px 0 rgba(0,0,0,.08),0 6px 18px 0 rgba(0,0,0,.05)!important">
                            <div class="row">
                                <div class="col-md-12" style="text-align: center;">
                                    <button class="btn btn-danger pr-3 pl-3 pt-2 pb-2" type="button" id="sell">خرید و فروش</button>
                                    <button class="btn btn-warning pr-3 pl-3 pt-2 pb-2" type="button" id="rent">رهن و اجاره</button>
                                </div>
                            </div>
                            <br>
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <label for="type">نوع ملک :</label>
                                    <select name="type" class="form-control" id="type_maskoni">

                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="area"> متراژ(مترمربع) :</label>
                                    <input name="area" type="number" id="area" class="form-control" required>

                                </div>

                                <div class="col-md-4" id="age">
                                    <label for="age"> سن بنا :</label>
                                    <input name="age" type="number" class="form-control" >

                                </div>
                            </div>


                            <hr>


                            <div class="row justify-content-center">   
                                <div class="col-md-3" id="colprice">
                                    <label for="price">قیمت :</label>
                                    <input type="number" name="price" id="price" class="form-control" >
                                    <small id="pricetopersion"></small>
                                </div>

                                <div class="col-md-3" id="colrent">
                                    <label for="rent">رهن :</label>
                                    <input type="number" name="rent" id="rentrpice" class="form-control" >
                                    <small id="renttopersion"></small>
                                </div>

                                <div class="col-md-3" id="colrentmonth">
                                    <label for="rent_month">اجاره :</label>
                                    <input type="number" name="rent_month" id="rent_month" class="form-control" >
                                    <small id="rent_monthtopersion"></small>
                                </div>

                                <div class="col-md-3" id="bedroom_number">
                                    <label for="bedroom_number">تعداد خواب :</label>
                                    <input type="number" name="bedroom_number" class="form-control">
                                </div>

                                <div class="col-md-3" id="floor">
                                    <label for="floor"> طبقه واحد :</label>
                                    <input type="number" name="floor" class="form-control">
                                </div>
                            </div>


                            <hr>

                        <div class="row  justify-content-center">
                            <div class="col-md-5">
                                <label for="userid_file">اطلاعات مالک :</label>
                                <select class="all_customers" style="width: 100%">
                                        <option value="">کاربر را انتخاب کنید</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}} - {{$user->phone}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 pt-4">
                                <button class="btn btn-success mt-1" type="button"  data-toggle="modal" data-target="#myModal">ثبت نام کاربر جدید</button>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="phone1">شماره تلفن :</label>
                                <input type="number" class="form-control">
                            </div>
                            <div class="col-md-8">
                                <label for="note">یادداشت شخصی :</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="address">آدرس ملک :</label>
                                <textarea name="" class="form-control" id="" rows="3"></textarea>
                            </div>
                        </div>
                        </div>
                    </div>
                    <br>
                    <div class="collapse multi-collapse" id="collaps2">
                        <div class="card card-body">
                            section 2
                        </div>
                    </div>

                    <div class="collapse multi-collapse" id="collaps3">
                        <div class="card card-body">
                            section3
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </form>

    </div>
</div>


@endsection