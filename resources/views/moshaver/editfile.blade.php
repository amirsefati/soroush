@extends('moshaver.master')
@section('content')
<input type="text" id="what_kind_type" value="{{$file->kind_type}}"  hidden>
<input type="text" id="what_kind_type_presell" value="{{$file->presell_date}}"  hidden>

<input type="text" id="what_type" value="{{$file->type}}" hidden>
<input type="text" id="infileedit" value="1" hidden>

<input type="text" id="what_wc"  value="{{$file->wc}}" hidden>
<input type="text" id="what_floor_type"  value="{{$file->floor_type}}" hidden>
<input type="text" id="what_outdoor_face"  value="{{$file->outdoor_face}}" hidden>
<input type="text" id="what_indoor_face"  value="{{$file->indoor_face}}" hidden>
<input type="text" id="what_cabinet"  value="{{$file->cabinet}}" hidden>
<input type="text" id="what_cooling"  value="{{$file->cooling}}" hidden>
<input type="text" id="what_kitchen"  value="{{$file->kitchen}}" hidden>

<div style="display:none ;">
{{$dread_only = $file->userid_moshaver == Auth::user()->id ? '' : 'readonly'}}
{{$sread_only = $file->userid_moshaver == Auth::user()->id ? '' : 'disabled'}}

</div>
<div class="row">
    <div class="col-md-12">
    <form action="/moshaver/editfile_post" method="POST" enctype="multipart/form-data">
    @csrf
        <input type="text" name="fileid" value="{{$file->id}}" id="fileid_edit" hidden>
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
                                    <select style="width: 200px;" name="publish" class="form-control" id="">
                                        <option value="">ارسال برای تایید</option>
                                        <option value="monshi">ارسال برای منشی</option>
                                        <option value="modir">ارسال برای مدیر</option>
                                    </select>
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
                        <div class="row" style="justify-content: center;">

                            <span id="step1" class="col-md-1 col-4 step_page step_page_line1" data-toggle="collapse" data-target="#collaps1" aria-expanded="false" aria-controls="collaps1">
                                <span  class="step_dot stepgreen">
                                    <img class="imgstepdot greensvg" id="step1img" src="/img/step1.svg" alt="">
                                </span> <br>  
                            <span class="stepgreenp">مشخصات اولیه فایل</span></span>

                            <span id="step2" class="col-md-1 col-4 step_page step_page_line2" data-toggle="collapse" data-target="#collaps2" aria-expanded="false" aria-controls="collaps2">
                                <span id="step2_span" class="step_dot stepgreen">
                                    <img class="imgstepdot greensvg" id="step2img" src="/img/step2.svg" alt="">
                                </span> <br> 
                            <span id="step2_span_span" class="stepgreenp"> اطلاعات تکمیلی</span></span>

                            <span id="step3" class="col-md-1 col-4 step_page" data-toggle="collapse" data-target="#collaps3" aria-expanded="false" aria-controls="collaps3">
                                <span id="step3_span" class="step_dot">
                                    <img class="imgstepdot" id="step3img" src="/img/step3.svg" alt="">
                                </span> <br>  
                            <span id="step3_span_span">افزودن عکس و فیلم</span></span>
                        </div>
                    </div>
                </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="multi-collapse collapse " id="collaps1">
                        <div class="card card-body m-3" style="background:#f4f6f9;box-shadow:0 0 51px 0 rgba(0,0,0,.08),0 6px 18px 0 rgba(0,0,0,.05)!important">
                            <div class="row">
                                <div class="col-md-12" style="text-align: center;">
                                    <button class="btn btn-danger pr-3 pl-3 pt-2 pb-2" type="button" id="sell">خرید و فروش</button>
                                    <button class="btn btn-warning pr-3 pl-3 pt-2 pb-2" type="button" id="rent">رهن و اجاره</button>
                                    <button class="btn btn-info pr-3 pl-3 pt-2 pb-2" type="button" id="presell"> پیش فروش</button>

                                </div>
                            </div>
                            <br>
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <label for="type">نوع ملک :</label>
                                    <select name="type" class="form-control" id="type_maskoni" required {{$dread_only}}>

                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="area"> متراژ(مترمربع) :</label>
                                    <input name="area" type="number" id="area" class="form-control" value="{{$file->area}}" {{$dread_only}}>

                                </div>

                                <div class="col-md-4" id="agecol">
                                    <label for="age"> سال ساخت :</label>
                                    <input name="age"  id="datepickeruserage" class="form-control" value="{{$file->age}}" {{$dread_only}}>

                                </div>
                            </div>


                            <hr>


                            <div class="row justify-content-center">   
                                <div class="col-md-3" id="colprice">
                                    <label for="price">قیمت متری :</label>
                                    <input type="text" name="price" id="price"  onkeyup="reformatText(this)"  class="form-control" value="{{$file->price}}" {{$dread_only}}>
                                </div>

                                <div class="col-md-3" id="colrent">
                                    <label for="rent_annual">رهن :</label>
                                    <input type="text" name="rent_annual" onkeyup="reformatText(this)" id="rentrpice" class="form-control" value="{{$file->rent_annual}}" {{$dread_only}}>
                                </div>

                                <div class="col-md-3" id="colrentmonth">
                                    <label for="rent_month">اجاره :</label>
                                    <input type="text" name="rent_month" onkeyup="reformatText(this)" id="rent_month" class="form-control" value="{{$file->rent_month}}" {{$dread_only}}>
                                </div>

                                <div class="col-md-3" id="bedroom_number">
                                    <label for="bedroom_number">تعداد خواب :</label>
                                    <input type="number" name="bedroom_number" class="form-control" value="{{$file->bedroom_number}}" {{$dread_only}}>
                                </div>

                                <div class="col-md-3" id="floorcol">
                                    <label for="floor"> طبقه واحد :</label>
                                    <input type="number" name="floor" class="form-control" value="{{$file->floor}}" {{$dread_only}}>
                                </div>

                                <div class="col-md-3" id="presellcol">
                                    <label for="presell">  موعد تحویل :</label>

                                    <div class="row">
                                        <div class="col-md-6 pl-0">
                                            <select name="presell_y" class="form-control" id="" {{$dread_only}}>
                                                <option value="{{explode('-',$file->presell_date)[0]}}">{{explode("-",$file->presell_date)[0]}}</option>
                                                <option value="1400">1400</option>
                                                <option value="1401">1401</option>
                                                <option value="1402">1402</option>
                                                <option value="1403">1403</option>
                                                <option value="1404">1404</option>
                                                <option value="1405">1405</option>
                                                <option value="1406">1406</option>
                                                <option value="1407">1407</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 pr-1">
                                            <select name="presell_m" class="form-control" id="" {{$dread_only}}>
                                                <option value="{{explode('-',$file->presell_date)[0] ? explode('-',$file->presell_date)[1] : ''}}">{{explode("-",$file->presell_date)[0] ? explode("-",$file->presell_date)[1] : ''}}</option>

                                                <option value="فرودین">فرودین</option>
                                                <option value="اردیبهشت">اردیبهشت</option>
                                                <option value="خرداد">خرداد</option>
                                                <option value="تیر">تیر</option>
                                                <option value="مرداد">مرداد</option>
                                                <option value="شهریور">شهریور</option>
                                                <option value="مهر">مهر</option>
                                                <option value="آبان">آبان</option>
                                                <option value="آذر">آذر</option>
                                                <option value="دی">دی</option>
                                                <option value="بهمن">بهمن</option>
                                                <option value="اسفند">اسفند</option>

                                            </select>
                                        </div> 
                                    </div>
                                     
                                    
                                </div>
                                
                            </div>


                            <hr>

                        <div class="row  justify-content-center">
                            <div class="col-md-5">
                                <label for="userid_file">اطلاعات مالک :</label>
                                <select class="all_customers" name="userid_file" style="width: 100%" {{$sread_only}}>
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
                            <div class="col-md-6">
                                <label for="phone1">شماره تلفن :</label>
                                <input type="number" name="phone1" class="form-control" value="{{$file->phone1}}" {{$dread_only}}>
                            </div>
                            <div class="col-md-3">
                                <label for="address"> کد قطعه بلوک :</label>
                                <input type="text" name="code_block" id="region" class="form-control" value="{{$file->code_block}}" {{$dread_only}}>
                            </div>
                            <div class="col-md-3">
                                <label for="phone1"> منطقه :</label>
                                <input type="number" name="region" id="region" class="form-control" value="{{$file->region}}" {{$dread_only}}>
                            </div>

                        </div>
                        
                        <hr>
                        <span style="color: gray;font-size:11px;">آدرس :</span> 
                        <div class="row pt-1">
                        
                        <div class="col-md-3 mt-2">
                                <label for="address">خیابان اصلی  :</label>
                                <input type="text" name="address1" class="form-control" value="{{explode('-',$file->address) ? explode('-',$file->address)[0] : ''}}" {{$dread_only}}>
                            </div>

                            <div class="col-md-3 mt-2">
                                <label for="address">خیابان فرعی  :</label>
                                <input type="text" name="address2" class="form-control" value="{{explode('-',$file->address)[0] ? explode('-',$file->address)[1] : ''}}" {{$dread_only}}>
                            </div>

                            <div class="col-md-2 mt-2">
                                <label for="address"> کوچه  :</label>
                                <input type="text" name="address3" class="form-control" value="{{explode('-',$file->address)[0] ? explode('-',$file->address)[2] : ''}}" {{$dread_only}}> 
                            </div>

                            <div class="col-md-1 mt-2">
                                <label for="address"> پلاک  :</label>
                                <input type="number" name="address4" class="form-control" value="{{explode('-',$file->address)[0] ? explode('-',$file->address)[3] : ''}}" {{$dread_only}}>
                            </div>

                            <div class="col-md-3 mt-2">
                                <label for="address"> اسم ساختمان  :</label>
                                <input type="text" name="address5" class="form-control" value="{{explode('-',$file->address)[0] ? explode('-',$file->address)[4] : ''}}" {{$dread_only}}>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="note">یادداشت شخصی :</label>
                                <textarea name="note" class="form-control" id="" rows="3" {{$dread_only}}></textarea>
                            </div>
                        </div>

                        
                        </div>
                    </div>
                    <br>
                    <div class="collapse multi-collapse show" id="collaps2">
                        <div class="card card-body" style="background:#f4f6f9;box-shadow:0 0 51px 0 rgba(0,0,0,.08),0 6px 18px 0 rgba(0,0,0,.05)!important">
                            <div class="row">
                                

                                <div class="col-md-3">
                                    <label for="">لوکیشن :</label>
                                    <input autocomplete="off" id=llocation data-toggle="modal" data-target="#show_map" name="location" placeholder="افزودن لوکیشن" class="form-control" onclick="showlocation()" {{$dread_only}}>
                                </div>

                                <div class="col-md-3">
                                    <label for="deed_type"> نوع سند :</label>
                                    <select class="multiselectfiles" name="deed_type" id="" style="width:100%" {{$sread_only}}>
                                        <option value="تجاری">تجاری</option>
                                        <option value="اداری">اداری</option>
                                        <option value="مسکونی">مسکونی</option>
                                        <option value="قولنامه ای">قولنامه ای</option>
                                        <option value="منگوله دار">منگوله دار</option>
                                        <option value="تک برگ">تک برگ</option>
                                        <option value="شش دانگ">شش دانگ</option>
                                        <option value="تفکیک شده">تفکیک شده</option>
                                        <option value="مادر">مادر</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="evacuation_status">وضعیت سکونت :</label>
                                    <select class="multiselectfiles" name="evacuation_status" id="" style="width:100%" {{$sread_only}}>
                                        <option value="تخلیه">تخلیه</option>
                                        <option value="مالک مستقر">مالک مستقر</option>
                                        <option value="مستاجر مستقر">مستاجر مستقر</option>
                                    </select>
                                </div>
                                    
                                <div class="col-md-3">
                                    <label for="convertible"> معاوضه :</label>
                                    <select class="multiselectfiles" name="convertible" id="" style="width:100%" {{$sread_only}} >
                                        <option value="دارد">دارد</option>
                                        <option value="ندارد">ندارد</option>

                                    </select>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <label for="allfloor">تعداد طبقات :</label>
                                    <input type="number" name="allfloor" class="form-control" value="{{$file->allfloor}}" {{$dread_only}}>
                                </div>
                                <div class="col-md-3">
                                    <label for="suiteinfloor">تعداد واحد در طبقه :</label>
                                    <input type="number" name="suiteinfloor" class="form-control" value="{{$file->suiteinfloor}}" {{$dread_only}}>
                                </div>
                                <div class="col-md-3">
                                    <label for="allsuite">تعداد کل واحد ها :</label>
                                    <input type="number" name="allsuite" class="form-control" value="{{$file->allsuite}}" {{$dread_only}}>
                                </div>
                                <div class="col-md-3">
                                    <label for="parking">تعداد پارکینگ :</label>
                                    <input type="number" name="parking" class="form-control" value="{{$file->parking}}" {{$dread_only}}>
                                </div>
                            </div>

                            <div class="row mt-3">

                                <div class="col-md-3">
                                    <label for="master_number">تعداد خواب‌های مستر :</label>
                                    <input type="number" name="master_number" class="form-control" value="{{$file->master_number}}" {{$dread_only}}>
                                </div>

                                <div class="col-md-3">
                                    <label for="wc_number">تعداد سرویس بهداشتی :</label>
                                    <input type="number" name="wc_number" class="form-control" value="{{$file->wc_number}}" {{$dread_only}}>
                                </div>

                                <div class="col-md-3">
                                    <label for="wc">نوع سرویس بهداشتی :</label>
                                    <select class="multiselectfiles" name="wc[]" id="what_wc_selected" multiple="multiple" style="width:100%" {{$dread_only}}>
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
                                
                            </div>  
                                
                                <div class="row mt-3">

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
                                    
                                </div>

                                <div class="row mt-3">

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
                                        <select class="multiselectfiles" name="cabinet[]" id="cabinet" multiple="multiple" style="width:100%">
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
                                    </div>
                                </div>


                                <div class="row mt-3">

                                    <div class="col-md-3">
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

                                    <div class="col-md-3">
                                        <label for="kitchen">آشپزخانه :</label>
                                        <select class="multiselectfiles" name="kitchen[]" multiple="multiple" id="" style="width:100%">
                                            <option value="مطبخ">مطبخ</option>
                                            <option value="هود">هود</option>
                                            <option value="اپن">اپن</option>
                                            <option value="گاز رومیزی">گاز رومیزی</option>
                                            <option value="جزیره">جزیره</option>
                                            <option value="شوتینگ">شوتینگ</option>
                                            <option value="فورمات">فورمات</option>
                                            <option value="نورپردازی">نورپردازی</option>
                                            <option value="نورگیر سقفی">نورگیر سقفی</option>
                                            <option value="فول فرنیه">فول فرنیه</option>
                                            <option value="نیمه فرنیش">نیمه فرنیش</option>
                                            <option value="هواکش">هواکش</option>
                                            <option value="صفحه کورین">صفحه کورین</option>
                                            <option value="صفحه سنگ">صفحه سنگ</option>
                                            <option value="صفحه چوب">صفحه چوب</option>
                                            <option value="طراحی کلاسیک">طراحی کلاسیک</option>
                                            <option value="طراحی مدرن">طراحی مدرن</option>
                                            <option value="طراحی معاصر">طراحی معاصر</option>
                                            <option value="سینک تک">سینک تک</option>
                                            <option value="سینک دوقلو">سینک دوقلو</option>
                                            <option value="سوپر مارکت">سوپر مارکت</option>

                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="indoor_facility">امکانات اصلی :</label>
                                        <select class="multiselectfiles" name="indoor_facility[]" multiple="multiple" id="" style="width:100%">
                                            <option value="آب">آب</option>
                                            <option value="برق">برق</option>
                                            <option value="گاز">گاز</option>
                                            <option value="تلفن">تلفن</option>

                                        </select>
                                    </div><div class="col-md-3">
                                        <label for="secure_facility">امکانات امنیتی :</label>
                                        <select class="multiselectfiles" name="secure_facility[]" multiple="multiple" id="" style="width:100%">
                                            <option value="اطفا حریق">اطفا حریق</option>
                                            <option value="اعلام حریق">اعلام حریق</option>
                                            <option value="آیفون تصویری">آیفون تصویری   </option>
                                            <option value="حفاظ شاخ گوزنی">حفاظ شاخ گوزنی</option>
                                            <option value="حفاظ آکاردئونی">حفاظ آکاردئونی</option>
                                            <option value="درب ریموت دار">درب ریموت دار</option>
                                            <option value="نگهبانی ۲۴ ساعته">نگهبانی ۲۴ ساعته</option>
                                            <option value="دوربین مدار بسته">دوربین مدار بسته</option>
                                            <option value="درب ضد سرقت">درب ضد سرقت</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">

                                    <div class="col-md-3">
                                        <label for="sport_facility">امکانات ورزشی :</label>
                                        <select class="multiselectfiles" name="sport_facility[]" id="" style="width:100%" multiple>
                                            <option value="استخر روباز">استخر روباز</option>
                                            <option value="استخر مشاع">استخر مشاع   </option>
                                            <option value="استخر اختصاصی">استخر اختصاصی</option>
                                            <option value="سونا">سونا</option>
                                            <option value="جکوزی">جکوزی</option>
                                            <option value="سالن بدنسازی">سالن بدنسازی</option>
                                            <option value="سالن یوگا">سالن یوگا</option>  
                                            <option value="سالن بولینگ">سالن بولینگ</option>
                                            <option value="سالن والیبال">سالن والیبال</option>
                                            <option value="زمین بسکتبال">زمین بسکتبال</option>
                                            <option value="زمین تنیس">زمین تنیس</option>
                                            <option value="میز پینگ پنگ">میز پینگ پنگ</option>
                                            <option value="سالن اسکواش">سالن اسکواش</option>
                                            <option value="لاین پیاده روی">لاین پیاده روی</option>
                                            <option value="لاین دوچرخه سواری">لاین دوچرخه سواری</option>
                                            <option value="زمین فوتبال">زمین فوتبال</option>

                                      </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="welfair_facility">امکانات رفاهی تفریحی :</label>
                                        <select class="multiselectfiles" name="sport_facility[]" multiple="multiple" id="" style="width:100%">
                                            <option value="باربیکیو">باربیکیو</option>
                                            <option value="آلاچیق">آلاچیق</option>
                                            <option value="فضای بازی کودکان">فضای بازی کودکان</option>
                                            <option value="سالن ماساژ">سالن ماساژ</option>
                                            <option value="لاندری">لاندری</option>
                                            <option value="سالن مطالعه">سالن مطالعه</option>
                                            <option value="خیاطی">خیاطی</option>
                                            <option value="شوتینگ">شوتینگ</option>
                                            <option value="کلوب بازی">کلوب بازی</option>
                                            <option value="روف گاردن">روف گاردن</option>
                                            <option value="لابی">لابی</option>
                                            <option value="نمازخانه">نمازخانه</option>
                                            <option value="کافی شاپ">کافی شاپ</option>
                                            <option value="TV Room">TV Room</option>
                                            <option value="حیاط خلوت">حیاط خلوت</option>
                                            <option value="اتاق کودک">اتاق کودک</option>
                                            <option value="فضای سبز">فضای سبز</option>
                                            <option value="کیترینگ">کیترینگ</option>
                                            <option value="خواب مستر">خواب مستر</option>
                                            <option value="کمد دیواری">کمد دیواری</option>
                                            <option value="دستگاه خودپرداز">دستگاه خودپرداز</option>
                                            <option value="اینترنت پرسرعت">اینترنت پرسرعت</option>
                                            <option value="اینترنت مرکزی">اینترنت مرکزی</option>
                                            <option value="ماهواره مرکزی">ماهواره مرکزی</option>
                                            <option value="آب اضطراری">آب اضطراری</option>
                                            <option value="برق ۳ فاز">برق ۳ فاز</option>
                                            <option value="برق اضطراری">برق اضطراری</option>
                                            <option value="آتشکده">آتشکده</option>
                                            <option value="چاه آب">چاه آب</option>
                                            <option value="آنتن مرکزی">آنتن مرکزی</option>
                                            <option value="جاروبرقی مرکزی">جاروبرقی مرکزی</option>
                                            <option value="نشیمن مجزا">نشیمن مجزا</option>
                                            <option value="طراحی مناسب با افراد کم توان">طراحی مناسب با افراد کم توان</option>
                                            <option value="درب برقی">درب برقی</option>
                                            <option value="اسمارت هوم">اسمارت هوم</option>
                                            <option value="نیمه مبله">نیمه مبله</option>
                                            <option value="مبله">مبله</option>
                                            <option value="پارکینگ مهمان">پارکینگ مهمان</option>
                                            <option value="نیروی خدمات">نیروی خدمات</option>
                                            <option value="پاسیو">پاسیو</option>
                                            <option value="آبنما">آبنما</option>

                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="outdoor_status">وضعیت بیرونی :</label>
                                        <select class="multiselectfiles" name="outdoor_status[]" multiple="multiple" id="" style="width:100%">
                                            <option value="بن بست">بن بست</option>
                                            <option value="تو دلی">تو دلی</option>
                                            <option value="شهرکی">شهرکی</option>
                                            <option value="دو نبش">دو نبش</option>
                                            <option value="دوبر"> دوبر</option>
                                            <option value="بر اصلی">بر اصلی </option>
                                            <option value="بافت فرسوده">بافت فرسوده </option>
                                            <option value="کوهستانی">کوهستانی </option>
                                            <option value="ساحلی"> ساحلی</option>
                                            <option value="جنگلی">جنگلی </option>
                                            <option value="کوچه فرعی">کوچه فرعی </option>

                                        </select>
                                    </div><div class="col-md-3">
                                        <label for="indoor_status">وضعیت داخلی :</label>
                                        <select class="multiselectfiles" name="indoor_status[]" multiple="multiple" id="" style="width:100%">
                                            <option value="بازسازی شده">بازسازی شده</option>
                                            <option value="فول بازسازی شده">فول بازسازی شده</option>
                                            <option value="نیمه دوبلکس">نیمه دوبلکس</option>
                                            <option value="ترپیلکس">ترپیلکس</option>
                                            <option value="دوبلکس">دوبلکس</option>
                                            <option value="نیمه تریپلکس">نیمه تریپلکس</option>
                                            <option value="اختلاف سطح">اختلاف سطح</option>
                                            <option value="درب مستقل">درب مستقل</option>
                                            <option value="فلت">فلت</option>
                                            <option value="نیاز به بازسازی">نیاز به بازسازی</option>

                                        </select>
                                    </div>
                                </div>
                                

                                <hr>

                                

                                <div class="row mt-3">
                                    
                                    <h5 class="mr-3">مشخصات آگهی :</h5>
                                    <br>
                                    <br>

                                    <div class="col-md-12 mb-3">
                                        <label for="name">عنوان آگهی :</label>
                                        <input type="text" name="name" class="form-control" value="{{$file->name}}">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="ad_text"> متن آگهی :</label>
                                        <textarea name="ad_text" class="form-control" id="" rows="3"></textarea>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <div class="collapse multi-collapse" id="collaps3">
                    <div class="row">       
                    <br>
                            <div class="col-md-12" style="text-align: center;">
                                <p>عکس های عادی</p>
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="headingOne" style="text-align: center;margin:auto;">
                                        <h5 class="mb-0">
                                            <span class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            مشاهده عکس های آرشیو
                                            </span>
                                        </h5>
                                        </div>
                                        @if($file->images)
                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="row" style="justify-content: center;">
                                                    @foreach(json_decode($file->images) as $img) 
                                                        <div class="col-md-2">
                                                            <img src="{{$img}}" style="width: 100%;" alt="">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>

                                    
                                    </div>
                                <div class="card card-body" style="text-align: center;">
                                    <div id="drag-drop-area" name="images"></div>
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