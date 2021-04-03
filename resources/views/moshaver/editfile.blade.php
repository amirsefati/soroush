@extends('moshaver.master')
@section('content')
<input type="text" id="what_kind_type" value="{{$file->kind_type}}"  hidden>

<input type="text" id="what_type" value="{{$file->type}}" hidden>


<input type="text" id="what_wc"  value="{{$file->wc}}" hidden>
<input type="text" id="what_floor_type"  value="{{$file->floor_type}}" hidden>
<input type="text" id="what_outdoor_face"  value="{{$file->outdoor_face}}" hidden>
<input type="text" id="what_indoor_face"  value="{{$file->indoor_face}}" hidden>
<input type="text" id="what_cabinet"  value="{{$file->cabinet}}" hidden>
<input type="text" id="what_cooling"  value="{{$file->cooling}}" hidden>
<input type="text" id="what_kitchen"  value="{{$file->kitchen}}" hidden>

<div class="row">
    <div class="col-md-12">
    <form action="/moshaver/editfile_post" method="POST" enctype="multipart/form-data">
    @csrf
        <input type="text" name="fileid" value="{{$file->id}}" hidden>
        <input type="text" name="userid_moshaver" value="{{Auth::user()->id}}" hidden>
        <input type="text" name="kind_type" id="kind_type_select" hidden>
        <div class="card">
            <div class="card-header">
                <div class="row" style="width: 100%;">
                    <div class="col-md-4">ویرایش فایل </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4" >
                        <div class="row">
                            <div class="col-md-6 col-6" style="text-align: left;">
                                <div class="custom-control custom-switch pt-2">
                                    @if($file->publish == 1)
                                        <input type="checkbox" class="custom-control-input" id="switch1" checked="checked" name="publish">
                                    @else
                                        <input type="checkbox" class="custom-control-input" id="switch1" name="publish">
                                    @endif
                                    <label class="custom-control-label" for="switch1">انتشار فایل</label>
                                </div>
                            </div>
                            <div class="col-md-6 col-6" style="text-align: left;">
                                <button type="submit" class="btn btn-success pr-4 pl-4">ویرایش فایل</button>
                            </div>
                        </div>
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
                                    <select name="type" class="form-control" id="type_maskoni" required>

                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="area"> متراژ(مترمربع) :</label>
                                    <input name="area" type="number" id="area" class="form-control" value="{{$file->area}}">

                                </div>

                                <div class="col-md-4" id="agecol">
                                    <label for="age"> سن بنا :</label>
                                    <input name="age" type="number" class="form-control" value="{{$file->age}}">

                                </div>
                            </div>


                            <hr>


                            <div class="row justify-content-center">   
                                <div class="col-md-3" id="colprice">
                                    <label for="price">قیمت :</label>
                                    <input type="number" name="price" id="price" class="form-control" value="{{$file->price}}">
                                    <small id="pricetopersion"></small>
                                </div>

                                <div class="col-md-3" id="colrent">
                                    <label for="rent_annual">رهن :</label>
                                    <input type="number" name="rent_annual" id="rentrpice" class="form-control" value="{{$file->rent_annual}}">
                                    <small id="renttopersion"></small>
                                </div>

                                <div class="col-md-3" id="colrentmonth">
                                    <label for="rent_month">اجاره :</label>
                                    <input type="number" name="rent_month" id="rent_month" class="form-control" value="{{$file->rent_month}}">
                                    <small id="rent_monthtopersion"></small>
                                </div>

                                <div class="col-md-3" id="bedroom_number">
                                    <label for="bedroom_number">تعداد خواب :</label>
                                    <input type="number" name="bedroom_number" class="form-control" value="{{$file->bedroom_number}}">
                                </div>

                                <div class="col-md-3" id="floorcol">
                                    <label for="floor"> طبقه واحد :</label>
                                    <input type="number" name="floor" class="form-control" value="{{$file->floor}}">
                                </div>
                            </div>


                            <hr>

                        <div class="row  justify-content-center">
                            <div class="col-md-5">
                                <label for="userid_file">اطلاعات مالک :</label>
                                <select class="all_customers" name="userid_file" style="width: 100%">
                                    @if($file->userid_file)
                                        <option value="{{$file->userid_file}}" selected>{{App\Models\User::find($file->userid_file)->name}}</option>
                                    @else
                                        <option value="">کاربر را انتخاب کنید</option>
                                    @endif
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
                                <input type="number" name="phone1" class="form-control" value="{{$file->phone1}}">
                            </div>
                            <div class="col-md-6">
                                <label for="address">آدرس ملک :</label>
                                <input type="text" name="address" class="form-control" value="{{$file->address}}">
                            </div>
                            <div class="col-md-2">
                                <label for="phone1"> منطقه :</label>
                                <input type="number" name="region" id="region" class="form-control" value="{{$file->region}}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="note">یادداشت شخصی :</label>
                                <textarea name="note" class="form-control" id="" rows="3"></textarea>
                            </div>
                        </div>
                        </div>
                    </div>
                    <br>
                    <div class="collapse multi-collapse" id="collaps2">
                        <div class="card card-body" style="background:#f4f6f9;box-shadow:0 0 51px 0 rgba(0,0,0,.08),0 6px 18px 0 rgba(0,0,0,.05)!important">
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="name">عنوان :</label>
                                    <input type="text" name="name" class="form-control" value="{{$file->name}}">
                                </div>

                                <div class="col-md-4">
                                    <label for="name">لوکیشن :</label>
                                    <input type="text" name="name" placeholder="در حال ساخت" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <label for="allfloor">تعداد طبقات :</label>
                                    <input type="number" name="allfloor" class="form-control" value="{{$file->allfloor}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="suiteinfloor">تعداد وارد در طبقه :</label>
                                    <input type="number" name="suiteinfloor" class="form-control" value="{{$file->suiteinfloor}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="allsuite">تعداد کل واحد ها :</label>
                                    <input type="number" name="allsuite" class="form-control" value="{{$file->allsuite}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="parking">تعداد پارکینگ :</label>
                                    <input type="number" name="parking" class="form-control" value="{{$file->parking}}">
                                </div>
                            </div>

                            <div class="row mt-3">

                                <div class="col-md-3">
                                    <label for="wc_number">تعداد سرویس بهداشتی :</label>
                                    <input type="number" name="wc_number" class="form-control" value="{{$file->wc_number}}">
                                </div>

                                <div class="col-md-3">
                                    <label for="wc">نوع سرویس بهداشتی :</label>
                                    <select class="multiselectfiles" name="wc[]" id="what_wc_selected" multiple="multiple" style="width:100%">
                                        <option value="ایرانی">ایرانی</option>
                                        <option value="فرنگی">فرنگی</option>
                                        <option value="وان حمام">وان حمام</option>
                                        <option value="وان جکوزی">وان جکوزی</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="direction"> جهت ملک :</label>
                                    <select class="multiselectfiles" name="direction" id="" style="width:100%">
                                        @if($file->direction)
                                            <option value="{{$file->direction}}" selected>{{$file->direction}}</option>
                                        @else
                                            <option value="">انتخاب کنید</option> 
                                        @endif
                                        <option value="شمالی">شمالی</option> 
                                        <option value="جنوبی">جنوبی</option> 
                                        <option value="شرقی">شرقی</option> 
                                        <option value="غربی">غربی</option> 
                                        <option value="شمال شرقی">شمال شرقی</option> 
                                        <option value="شمال غربی">شمال غربی</option> 
                                        <option value="جنوب شرقی">جنوب شرقی</option> 
                                        <option value="حنوب غربی">حنوب غربی</option> 
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="depot">انباری :</label>
                                    <select class="multiselectfiles" name="depot" id="" style="width:100%">
                                        @if($file->depot)
                                            <option value="{{$file->depot}}" selected>{{$file->depot  ? 'دارد' : 'ندارد'}}</option>
                                        @else
                                            <option value="">انتخاب کنید</option> 
                                        @endif
                                        <option value="1">دارد</option>
                                        <option value="0">ندارد</option>
                                    </select>
                                </div>
                            </div>  
                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <label for="elevator">آسانسور :</label>
                                        <select class="multiselectfiles" name="elevator" id="" style="width:100%">
                                            @if($file->elevator)
                                                <option value="{{$file->elevator}}" selected>{{$file->elevator ? 'دارد' : 'ندارد'}}</option>
                                            @else
                                                <option value="">انتخاب کنید</option> 
                                            @endif
                                            <option value="1">دارد</option>
                                            <option value="0">ندارد</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="balcony">بالکن :</label>
                                        <select class="multiselectfiles" name="balcony" id="" style="width:100%">
                                            @if($file->balcony)
                                                <option value="{{$file->balcony}}" selected>{{$file->balcony  ? 'دارد' : 'ندارد'}}</option>
                                            @else
                                                <option value="">انتخاب کنید</option> 
                                            @endif 
                                            <option value="1">دارد</option>
                                            <option value="0">ندارد</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="wc">کف :</label>
                                        <select class="multiselectfiles" name="floor_type[]" id="floor_type" multiple="multiple" style="width:100%">
                                            <option value="سنگ">سنگ</option>
                                            <option value="موزائیک">موزائیک</option>
                                            <option value="کاشی">کاشی</option>
                                            <option value="پارکت">پارکت</option>
                                            <option value="موکت">موکت</option>
                                            <option value="فرش">فرش</option>
                                            <option value="بتن">بتن</option>
                                            <option value="چوب">چوب</option>
                                            <option value="بامبو">بامبو</option>
                                            <option value="مکالیوم">مکالیوم</option>
                                            <option value="PVC">PVC</option>
                                            <option value="لینولیوم">لینولیوم</option>
                                            <option value="کاشی آجری">کاشی آجری</option>
                                            <option value="اپکسی">اپکسی</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="shell">نوع اسکلت :</label>
                                        <select class="multiselectfiles" name="shell" id="shell" style="width:100%">
                                            @if($file->shell)
                                                <option value="{{$file->shell}}" selected>{{$file->shell}}</option>
                                            @else
                                                <option value="">انتخاب کنید</option> 
                                            @endif
                                            <option value="بتنی">بتنی</option>
                                            <option value="فلزی پیچ مهره">فلزی پیچ مهره</option>
                                            <option value="فلزی جوشی">فلزی جوشی</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <label for="outdoor_face">نمای خارجی :</label>
                                        <select class="multiselectfiles" name="outdoor_face[]" id="outdoor_face" multiple="multiple" id="" style="width:100%">
                                            <option value="سرامیک">سرامیک</option>
                                            <option value="آجر">آجر</option>
                                            <option value="سنگ ترمو">سنگ ترمو</option>
                                            <option value="سیمان">سیمان</option>
                                            <option value="شیشه">شیشه</option>
                                            <option value="مونولیت">مونولیت</option>
                                            <option value="بایرامیکس">بایرامیکس</option>
                                            <option value="استرج متال">استرج متال</option>
                                            <option value="پنل گرانیتی">پنل گرانیتی</option>
                                            <option value="کنیتکس">کنیتکس</option>
                                            <option value="رومی">رومی</option>
                                            <option value="ترکیبی">ترکیبی</option>
                                            <option value="PVC">PVC</option>
                                            <option value="کامپوزیت">کامپوزیت</option>

                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="indoor_face">نمای داخلی :</label>
                                        <select class="multiselectfiles" name="indoor_face[]" multiple="multiple" id="indoor_face" style="width:100%">
                                            <option value="دیوار نقاشی">دیوار نقاشی</option>
                                            <option value="کاغذ اپوکسی">کاغذ اپوکسی</option>
                                            <option value="کاغذ دیواری">کاغذ دیواری</option>
                                            <option value="دیوار چوب کاری">دیوار چوب کاری</option>
                                            <option value="دیوار آجر نما">دیوار آجر نما</option>
                                            <option value="دیوار پارچه کوبی">دیوار پارچه کوبی</option>
                                            <option value="دیوار بتنی هوشمند">دیوار بتنی هوشمند</option>
                                            <option value="دیوار سنگ">دیوار سنگ</option>
                                        </select>
                                    </div><div class="col-md-3">
                                        <label for="cabinet">کابینت :</label>
                                        <select class="multiselectfiles" name="cabinet[]" id="cabinet" multiple="multiple" id="" style="width:100%">
                                            <option value="فلزی">فلزی</option>
                                            <option value="فایبرگلس">فایبرگلس</option>
                                            <option value="های گلس">های گلس</option>
                                            <option value="چوبی فلزی">چوبی فلزی</option>
                                            <option value="ممبران">ممبران</option>
                                            <option value="MDF">MDF</option>
                                            <option value="چوبی">چوبی</option>
                                            <option value="ملامینه">ملامینه</option>
                                            <option value="لترون">لترون</option>
                                            <option value="روکش چوب">روکش چوب</option>
                                            <option value="روکش HDL">روکش HDL</option>
                                            <option value="روکش HPL">روکش HPL</option>
                                            <option value="روکش HDF">روکش HDF</option>
                                            <option value="اکریلیک">اکریلیک</option>
                                            <option value="PVC">PVC</option>

                                        </select>
                                    </div><div class="col-md-3">
                                        <label for="cooling">سرمایش گرمایش :</label>
                                        <select class="multiselectfiles" name="cooling[]" multiple="multiple" id="cooling" style="width:100%">
                                            <option value="گرمایش از کف">گرمایش از کف</option>
                                            <option value="شوفاژ">شوفاژ</option>
                                            <option value="پکیج">پکیج</option>
                                            <option value="موتوز خانه مرکزی">موتوز خانه مرکزی</option>
                                            <option value="شومینه">شومینه</option>
                                            <option value="رادیاتور">رادیاتور</option>
                                            <option value="گرمایش خورشیدی">گرمایش خورشیدی</option>
                                            <option value="حرارت مرکزی">حرارت مرکزی</option>
                                            <option value="زنت">زنت</option>
                                            <option value="یونیت هیتر">یونیت هیتر</option>
                                            <option value="فن کوئل">فن کوئل</option>
                                            <option value="کولر">کولر</option>
                                            <option value="اسپیلیت">اسپیلیت</option>
                                            <option value="داکت اسپیلیت">داکت اسپیلیت</option>
                                            <option value="مینی چیلر">مینی چیلر</option>
                                            <option value="چیلر">چیلر</option>
                                            <option value="ایرواش">ایرواش</option>
                                            <option value="هواساز">هواساز</option>
                                            <option value="VRF">VRF</option>
                                            <option value="GHP">GHP</option>
                                            <option value="اکونوپک">اکونوپک</option>
                                            <option value="پکیج یونیت">پکیج یونیت</option>
                                            <option value="سرمایش از سقف">سرمایش از سقف</option>
                                            <option value="سزمایش از کف">سزمایش از کف</option>

                                        </select>
                                    </div>
                                </div>


                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <label for="kitchen">آشپزخانه :</label>
                                        <select class="multiselectfiles" name="kitchen" id="" style="width:100%">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="indoor_facility">امکانات اصلی :</label>
                                        <select class="multiselectfiles" name="indoor_facility" id="" style="width:100%">
                                            <option value=""></option>
                                        </select>
                                    </div><div class="col-md-3">
                                        <label for="secure_facility">امکانات امنیتی :</label>
                                        <select class="multiselectfiles" name="secure_facility" id="" style="width:100%">
                                            <option value=""></option>
                                        </select>
                                    </div><div class="col-md-3">
                                        <label for="sport_facility">امکانات ورزشی :</label>
                                        <select class="multiselectfiles" name="sport_facility" id="" style="width:100%">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <label for="welfair_facility">امکانات رفاهی تفریحی :</label>
                                        <select class="multiselectfiles" name="welfair_facility" id="" style="width:100%">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="outdoor_status">وضعیت بیرونی :</label>
                                        <select class="multiselectfiles" name="outdoor_status" id="" style="width:100%">
                                            <option value=""></option>
                                        </select>
                                    </div><div class="col-md-3">
                                        <label for="indoor_status">وضعیت داخلی :</label>
                                        <select class="multiselectfiles" name="indoor_status" id="" style="width:100%">
                                            <option value=""></option>
                                        </select>
                                    </div><div class="col-md-3">
                                        <label for="evacuation_status">وضعیت سکونت</label>
                                        <select class="multiselectfiles" name="evacuation_status" id="" style="width:100%">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <label for="deed_type"> نوع سند :</label>
                                        <select class="multiselectfiles" name="deed_type" id="" style="width:100%">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="convertible"> معاوضه :</label>
                                        <select class="multiselectfiles" name="convertible" id="" style="width:100%">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <div class="collapse multi-collapse" id="collaps3">
                        <div class="card card-body">
                            <p style="margin-bottom: 3px;font-size:12px"> - بخش عکس پروژه و ویدیو پروژه قابلیت آپلود چندین فایل را دارد</p>
                            <p style="font-size:12px"> - در صورت آپلود ویدیو سرعت ذخیره فایل به شدت کاهش می یابد</p>
                            <br>
                            <label for="thumbnail" class="box_upload_thumbnail">
                                <p class="box_upload_thumbnailspan">آپلود عکس شاخص</p>
                                <img src="../img/uploadimg.png" class="box_upload_thumbnailimg" alt="">
                            </label>
                            <input type="file" name="thumbnail" id="thumbnail" style="display: none;" accept="image/x-png,image/gif,image/jpeg">
                            <br>
                            <div class="row">
                                <div class="col-md-6 mt-2">
                                    <label for="images">عکس پروژه :</label>
                                    <input type="file" name="images[]" id="images" accept="image/x-png,image/gif,image/jpeg"  multiple>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="videos">ویدیو پروژه :</label>
                                    <input type="file" name="videos[]" id="videos" accept="video/mp4,video/x-m4v,video/*"  multiple>
                                </div>
                            </div>
                        </div>
                        <div class="row m-2">
                            <div class="col-md-3" style="text-align: center;">
                                <a href="{{$file->thumbnail}}" target="blank">
                                <img src="{{$file->thumbnail}}" style="width:100%;padding:5px;cursor:zoom-in;" alt="">
                                <span style="padding: 5px;font-size:12px">تصویر شاخص</span>
                                </a>
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