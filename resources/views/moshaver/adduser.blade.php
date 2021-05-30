@extends('moshaver.master')
@section('content')


<div class="row">
    <div class="col-md-12">
    <form action="/moshaver/adduser_post" method="POST" enctype="multipart/form-data">
    @csrf
    
        <input type="text" name="userid_inter" value="{{Auth::user()->id}}" hidden>
        <input type="text" name="kind_type" id="kind_type" value="" hidden>
        <div class="card">
            <div class="card-header">
                <div class="row" style="width: 100%;">
                    <div class="col-md-4">افزودن کاربر   جدید</div>
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
                    <div class="row" style="justify-content: center;">
                            <span id="step1" class="col-md-1 col-4 step_page step_page_line1" data-toggle="collapse" data-target="#collaps1" aria-expanded="false" aria-controls="collaps1">
                                <span  class="step_dot stepgreen">
                                    <img class="imgstepdot greensvg" id="step1img" src="/img/step1.svg" alt="">
                                </span> <br>  
                            <span class="stepgreenp"> مشخصات اولیه مشتری </span></span>

                            <span id="step2" class="col-md-1 col-4 step_page" data-toggle="collapse" data-target="#collaps2" aria-expanded="false" aria-controls="collaps2">
                                <span id="step2_span" class="step_dot">
                                    <img class="imgstepdot" id="step2img" src="/img/step2.svg" alt="">
                                </span> <br> 
                            <span id="step2_span_span" class=""> اطلاعات تکمیلی</span></span>
                            </div>  </div>
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
                                    <input type="text" class="form-control" name="name" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="phone"> شماره تلفن :</label>
                                    <input type="number" class="form-control" name="phone" required>
                                </div>
                            </div>
                        


                            <hr>
                            
                            <div class="row mt-2 justify-content-center">
                                <div class="col-md-4 " id="colseller">
                                    <label for="price">بودجه خریدار :</label>
                                    <input type="text" onkeyup="reformatText(this)" class="form-control" name="price" id="adduser_price">
                                </div>
                                <div class="col-md-4 " id="colrenterannual">
                                    <label for="rent_annual">بودجه رهن :</label>
                                    <input type="text" onkeyup="reformatText(this)" class="form-control" name="rent_annual"   id="adduser_rent_annual">
                                </div>
                                <div class="col-md-4 " id="colrentermonth">
                                    <label for="price">بودجه اجاره :</label>
                                    <input type="text" onkeyup="reformatText(this)" class="form-control" name="rent_month" id="adduser_rent_month">
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
                                    <input type="number" class="form-control">
                                </div>

                                <div class="col-md-2">
                                    <label for="region">منطقه :</label>
                                    <input type="number" class="form-control" name="region" id="region">
                                </div>
                                
                                <div class="col-md-2">
                                    <label for="bedroom_number">تعداد خواب :</label>
                                    <input type="number" class="form-control" name="bedroom_number">
                                </div>
                                <div class="col-md-2">
                                    <label for="age"> حداکثر سن بنا :</label>
                                    <input type="number" class="form-control" name="age">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label for="">آخرین مهلت مشتری :</label>
                                    <input type="text" class="form-control" id="datepickeruser212" name="timer" required/>
                                </div>
                                <div class="col-md-8">
                                    <label for="desc">یادداشت شخصی :</label>
                                    <input type="text" class="form-control" name="desc">
                                </div>
                            </div>

                            

                            <div class="row mt-4">
                                <div class="col-md-2 col-6">
                                    <div class="custom-control custom-switch pt-2">
                                        <input type="checkbox" class="custom-control-input" id="switch1" name="elevator">
                                        <label class="custom-control-label" for="switch1">آسانسور</label>
                                    </div>
                                </div>

                                <div class="col-md-2 col-6">
                                    <div class="custom-control custom-switch pt-2">
                                        <input type="checkbox" class="custom-control-input" id="switch2" name="depot">
                                        <label class="custom-control-label" for="switch2">انباری</label>
                                    </div>
                                </div>

                                <div class="col-md-2 col-6">
                                    <div class="custom-control custom-switch pt-2">
                                        <input type="checkbox" class="custom-control-input" id="switch3" name="parking">
                                        <label class="custom-control-label" for="switch3">پارکینگ</label>
                                    </div>
                                </div>

                                <div class="col-md-2 col-6">
                                    <div class="custom-control custom-switch pt-2">
                                        <input type="checkbox" class="custom-control-input" id="switch4" name="balcony">
                                        <label class="custom-control-label" for="switch4">بالکن</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-12" style="text-align: center;">
                                <button class="btn btn-warning pl-5 pr-5">ذخیره اطلاعات اولیه مشتری</button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="collapse multi-collapse" id="collaps2">
                        <div class="card card-body" style="background:#f4f6f9;box-shadow:0 0 51px 0 rgba(0,0,0,.08),0 6px 18px 0 rgba(0,0,0,.05)!important">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="work">شغل :</label>
                                    <input type="text" name="work" class="form-control" list="cars"/>
                                        <datalist id="cars">
                                            <option value=""></option>
                                            <option value="آزاد">آزاد </option>
                                            <option value="کارمند">کارمند </option>
                                            <option value="پاره وقت">پاره وقت </option>
                                            <option value="شب کار">شب کار </option>
                                            <option value="موسیقی">موسیقی </option>
                                        </datalist>
                                </div>

                                <div class="col-md-4">
                                    <label for="sporty">فوتبالی :</label>
                                    <select class="multiselectfiles" name="sporty[]" id="" multiple="multiple" style="width:100%">
                                        <option value="استقلالی"> استقلالی</option>
                                        <option value="پرسپولیسی"> پرسپولیسی</option>
                                        <option value="دو آتیشه"> دو آتیشه</option>
                                        <option value="متعصب"> متعصب</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="sporty">مذهبی :</label>
                                    <select class="multiselectfiles" name="religen[]" id="" multiple="multiple" style="width:100%">
                                        <option value="متعصب"> متعصب</option>
                                        <option value="حزب اللهی"> حزب اللهی</option>
                                        <option value="مسیحی">مسیحی </option>
                                        <option value="زرتشتی">زرتشتی </option>
                                    </select>
                                </div>
                                

                                
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label for="likes"> حیوان خانگی :</label>
                                    <select class="multiselectfiles" name="likes[]" id="" multiple="multiple" style="width:100%">
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

                </div>
            </div>
            </div>
        </div>
    </form>

    </div>
</div>



@endsection