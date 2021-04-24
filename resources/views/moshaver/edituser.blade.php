@extends('moshaver.master')
@section('content')

<input type="text" id="pageedituser" value="edituser" hidden>
<input type="text" id="what_elevator" value="{{$user->elevator}}" hidden>
<input type="text" id="what_depot" value="{{$user->depot}}" hidden>
<input type="text" id="what_parking" value="{{$user->parking}}" hidden>
<input type="text" id="what_balcony" value="{{$user->balcony}}" hidden>

<input type="text" id="what_sporty" value="{{$user->sporty}}" hidden>
<input type="text" id="what_religen" value="{{$user->religen}}" hidden>
<input type="text" id="what_work" value="{{$user->work}}" hidden>
<input type="text" id="what_likes" value="{{$user->likes}}" hidden>

<div class="row">
    <div class="col-md-12">
    <form action="/moshaver/edituser_post" method="POST" enctype="multipart/form-data">
    @csrf
        <input type="text" name="userid" value="{{$user->id}}" hidden>
        <input type="text"  id="what_kind_type" value="{{$user->kind_type}}" hidden>
        <input type="text" name="kind_type" id="kind_type" value="" hidden>
        <input type="text" name="" id="what_type" value="{{$user->type}}" hidden>

        <input type="text" name="userid_inter" value="{{Auth::user()->id}}" hidden>

        <div class="card">
            <div class="card-header">
                <div class="row" style="width: 100%;">
                    <div class="col-md-4">ویرایش کاربر</div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4" >
                        <div class="row">
                            <div class="col-md-6 col-6" style="text-align: left;">
                               
                            </div>
                            <div class="col-md-6 col-6" style="text-align: left;">
                                <button type="submit" class="btn btn-success pr-4 pl-4">ارسال اطلاعات</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
            
                <div class="row">
                    <div class="col-md-12" style="text-align: center;">
                        <button class="btn btn-primary" id="collapsbtn1" type="button" data-toggle="collapse" data-target="#collaps1" aria-expanded="false" aria-controls="collaps1">مشخصات اولیه مالک</button>
                        <button class="btn btn-primary" id="collapsbtn2" type="button" data-toggle="collapse" data-target="#collaps2" aria-expanded="false" aria-controls="collaps2">اطلاعات تکمیلی</button>
                        <button class="btn btn-primary" id="collapsbtn3" type="button" data-toggle="collapse" data-target="#collaps3" aria-expanded="false" aria-controls="collaps3">افزودن عکس و فیلم</button>
                    </div>
                </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="multi-collapse collapse show" id="collaps1">
                        <div class="card card-body m-3" style="background:#f4f6f9;box-shadow:0 0 51px 0 rgba(0,0,0,.08),0 6px 18px 0 rgba(0,0,0,.05)!important">
                            <div class="row">
                                <div class="col-md-12" style="text-align: center;">
                                    <button class="btn btn-danger pr-3 pl-3 pt-2 pb-2" type="button" id="seller"> خریدار </button>
                                    <button class="btn btn-warning pr-3 pl-3 pt-2 pb-2" type="button" id="renter"> مستاجر </button>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="name">نام کاربر :</label>
                                    <input type="text" class="form-control" name="name" value="{{$user->name}}" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="phone"> شماره تلفن :</label>
                                    <input type="number" class="form-control" name="phone" value="{{$user->phone}}" required>
                                </div>
                            </div>
                        


                            <hr>
                            
                            <div class="row mt-2 justify-content-center">
                                <div class="col-md-4 " id="colseller">
                                    <label for="price">بودجه خریدار :</label>
                                    <input type="number" class="form-control" name="price" value="{{$user->price}}" id="adduser_price">
                                    <small id="adduser_price_small"></small>
                                </div>
                                <div class="col-md-4 " id="colrenterannual">
                                    <label for="rent_annual">بودجه رهن :</label>
                                    <input type="number" class="form-control" name="rent_annual" value="{{$user->rent_annual}}"   id="adduser_rent_annual">
                                    <small id="adduser_rent_annual_small"></small>
                                </div>
                                <div class="col-md-4 " id="colrentermonth">
                                    <label for="price">بودجه اجاره :</label>
                                    <input type="number" class="form-control" name="rent_month" value="{{$user->rent_month}}" id="adduser_rent_month">
                                    <small id="adduser_rent_month_small"></small>
                                </div>
                            </div>

                            <hr>

                            <div class="row mt-2">

                                <div class="col-md-3">
                                    <label for="type">نوع ملک :</label>
                                    <select name="type" class="form-control" id="type_maskoni" required>

                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="area">متراژ :</label>
                                    <input type="number" class="form-control" name="area" value="{{$user->area}}">
                                </div>

                                <div class="col-md-2">
                                    <label for="region">منطقه :</label>
                                    <input type="number" class="form-control" name="region" id="region" value="{{$user->region}}">
                                </div>
                                
                                <div class="col-md-2">
                                    <label for="bedroom_number">تعداد خواب :</label>
                                    <input type="number" class="form-control" name="bedroom_number" value="{{$user->bedroom_number}}">
                                </div>
                                <div class="col-md-2">
                                    <label for="age"> حداکثر سن بنا :</label>
                                    <input type="number" class="form-control" name="age" value="{{$user->age}}">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label for="">آخرین مهلت مشتری :</label>
                                    <input type="text" class="form-control" id="datepickeruser" name="timer"/>
                                </div>
                                <div class="col-md-8">
                                    <label for="desc">یادداشت شخصی :</label>
                                    <input type="text" class="form-control" name="desc" value="{{$user->desc}}">
                                </div>
                            </div>

                            <div class="row mt-4">
                                
                                <div class="col-md-2 col-6">
                                    <div class="custom-control custom-switch pt-2">
                                        <input type="checkbox" class="custom-control-input" id="elevator" name="elevator">
                                        <label class="custom-control-label" for="elevator">آسانسور</label>
                                    </div>
                                </div>

                                <div class="col-md-2 col-6">
                                    <div class="custom-control custom-switch pt-2">
                                        <input type="checkbox" class="custom-control-input" id="depot" name="depot">
                                        <label class="custom-control-label" for="depot">انباری</label>
                                    </div>
                                </div>

                                <div class="col-md-2 col-6">
                                    <div class="custom-control custom-switch pt-2">
                                        <input type="checkbox" class="custom-control-input" id="parking" name="parking">
                                        <label class="custom-control-label" for="parking">پارکینگ</label>
                                    </div>
                                </div>

                                <div class="col-md-2 col-6">
                                    <div class="custom-control custom-switch pt-2">
                                        <input type="checkbox" class="custom-control-input" id="balcony" name="balcony">
                                        <label class="custom-control-label" for="balcony">بالکن</label>
                                    </div>
                                </div>
                            </div>
                       
                        </div>
                    </div>
                    <br>
                    <div class="collapse multi-collapse" id="collaps2">
                        <div class="card card-body" style="background:#f4f6f9;box-shadow:0 0 51px 0 rgba(0,0,0,.08),0 6px 18px 0 rgba(0,0,0,.05)!important">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="sporty">فوتبالی :</label>
                                    <select class="multiselectfiles" name="sporty[]" id="sporty" multiple="multiple" style="width:100%">
                                        <option value="استقلالی"> استقلالی</option>
                                        <option value="پرسپولیسی"> پرسپولیسی</option>
                                        <option value="دو آتیشه"> دو آتیشه</option>
                                        <option value="متعصب"> متعصب</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="religen">مذهبی :</label>
                                    <select class="multiselectfiles" name="religen[]" id="religen" multiple="multiple" style="width:100%">
                                        <option value="متعصب"> متعصب</option>
                                        <option value="حزب اللهی"> حزب اللهی</option>
                                        <option value="مسیحی">مسیحی </option>
                                        <option value="زرتشتی">زرتشتی </option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="work">شغل :</label>
                                    <select class="multiselectfiles" name="work[]" id="work" multiple="multiple" style="width:100%">
                                        <option value="آزاد">آزاد </option>
                                        <option value="کارمند">کارمند </option>
                                        <option value="پاره وقت">پاره وقت </option>
                                        <option value="شب کار">شب کار </option>
                                        <option value="موسیقی">موسیقی </option>

                                    </select>
                                </div>

                                
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label for="likes"> حیوان خانگی :</label>
                                    <select class="multiselectfiles" name="likes[]" id="likes" multiple="multiple" style="width:100%">
                                        <option value="سگ"> سگ</option>
                                        <option value="گربه">گربه </option>
                                        <option value="پرنده "> پرنده </option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="info">شرح شخصیتی :</label>
                                    <textarea name="info" class="form-control" id="" rows="6"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="collapse multi-collapse" id="collaps3">
                        <div class="card card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p style="font-size: 12px;margin:3px">-مدارک مورد نیاز کاربر را می توانید از این بخش آپلود کنید</p>
                                    <p style="font-size: 12px;margin:3px">-آپلود فایل ها بدون محدودیت می باشد</p>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-6 mt-2">
                                    <label for="documnts"> مدارک  :</label>
                                    <input type="file" name="documnts[]" id="images" accept="image/x-png,image/gif,image/jpeg"  multiple>
                                </div>
                            </div>
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