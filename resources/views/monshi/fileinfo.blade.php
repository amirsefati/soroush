@extends('moshaver.master')
@section('content')

<div style="display: none;">
{{$f = 0}}
{{{$t = 0}}}
@foreach($result as $r)
@if($r->userid_inter == Auth::user()->id)
    {{$f++}}
@else
    {{$t++}}
@endif
@endforeach
</div>


<div class="row">
    <div class="col-md-12 p-3 fileinfo_headbox">
        <div class="row">
            <div class="col-md-12 pr-5">
                <p style="margin:5px;color:coral;font-size:16px">{{$file->type}}</p>
                <p style="margin:5px;font-size:20px;font-weight: bold;"> {{$file->type}} {{$file->area}} متری</p>
                <p style="margin:5px;">
                    @if($file->kind_type == 'sell')
                        بودجه : <span class="price_comma">{{$file->price * $file->area}}</span>    تومان
                    @else
                        رهن <span class="price_comma">{{$file->rent_annual}}</span>    تومان
                        - اجاره <span class="price_comma">{{$file->rent_month}}</span>    تومان
                    @endif
                </p>
                <p style="margin:5px;font-size:10px">مالک : {{App\Models\User::find($file->userid_file)->name}}</p>
            </div>
        </div>

        <div class="row mt-4 mr-5">
            <div class="col-md-12">
                <span class="fileinfo_btn_edit">
                    <a href="/monshi/editfile/{{$file->id}}">
                        ویرایش اطلاعات
                        <img src="/img/edit-solid.svg" alt="">
                    </a>
                </span>

                <span class="fileinfo_btn_edit">
                     حذف فایل
                    <img src="/img/remove.svg" alt="">
                </span>

              
            </div>
        </div>
    </div>
</div>

<div class="row mt-4 mb-5">
    <div class="col-md-12" style="background:white">
        
            <div class="container mb-5">
                <br>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tab1">جزئیات</a>
                    </li>
                  
                    
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="tab1" class="container tab-pane active"><br>
                        <div class="row">
                            <div class="col-md-6" style="text-align: center;">
                                <div class="row">
                                    <div class="col-md-3" style="text-align: center;">
                                        <img src="/img/area.svg" alt="">
                                        <p style="margin:10px;font-weight:bold;font-size:20px">{{$file->area}}</p>
                                        <p style="color:#b5b5b5;font-size:12px">متری</p>
                                    </div>

                                    <div class="col-md-3" style="text-align: center;">
                                        <img src="/img/age.svg" alt="">
                                        <p style="margin:10px;font-weight:bold;font-size:20px">{{$file->age}}</p>
                                        <p style="color:#b5b5b5;font-size:12px">سال ساخت</p>
                                    </div>

                                    <div class="col-md-3" style="text-align: center;">
                                        <img src="/img/beds.svg" alt="">
                                        <p style="margin:10px;font-weight:bold;font-size:20px">{{$file->bedroom_number}}</p>
                                        <p style="color:#b5b5b5;font-size:12px">تعداد خواب</p>
                                    </div>

                                    <div class="col-md-3" style="text-align: center;">
                                        <img src="/img/floor.svg" alt="">
                                        <p style="margin:10px;font-weight:bold;font-size:20px">{{$file->floor}}</p>
                                        <p style="color:#b5b5b5;font-size:12px">طبقه واحد</p>
                                    </div>
                                </div>

                                <hr/>
                                
                                <div class="row">
                                    <div class="col-md-6" style="text-align: center;">
                                        <p style="color:#b5b5b5;font-size:12px;margin:5px;">تعداد طبقات</p>
                                        <p style="font-weight: bold;font-size:20px">{{$file->allfloor}}</p>
                                    </div>

                                    <div class="col-md-6" style="text-align: center;">
                                        <p style="color:#b5b5b5;font-size:12px;margin:5px;">تعداد سرویس بهداشتی</p>
                                        <p style="font-weight: bold;font-size:20px">{{$file->wc_number}}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6" style="text-align: center;">
                                        <p style="color:#b5b5b5;font-size:12px;margin:5px;"> پارکینگ</p>
                                        <p style="font-weight: bold;font-size:18px">{{$file->parking}}</p>
                                    </div>

                                    <div class="col-md-6" style="text-align: center;">
                                        <p style="color:#b5b5b5;font-size:12px;margin:5px;"> تعداد واحد در طبقه</p>
                                        <p style="font-weight: bold;font-size:18px">{{$file->suiteinfloor}}</p>
                                    </div>

                                    <div class="col-md-12   " style="text-align: center;">
                                        <p style="color:#b5b5b5;font-size:12px;margin:5px;"> تعداد کل واحد ها </p>
                                        <p style="font-weight: bold;font-size:18px">{{$file->allsuite}}</p>
                                    </div>
                                </div>
                                <hr/>

                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="feature_title">آسانسور</p>
                                            <p style="text-align:center">{{$file->elevator === 1 ? 'دارد' : ($file->elevator === 0 ? 'ندارد' : 'نمی‌دانم')}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <p class="feature_title">پارکینگ</p>
                                            <p style="text-align:center">{{$file->parking === 1 ? 'دارد' : ($file->parking === 0 ? 'ندارد' : 'نمی‌دانم')}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <p class="feature_title">بالکن</p>
                                            <p style="text-align:center">{{$file->balcony === 1 ? 'دارد' : ($file->balcony === 0 ? 'ندارد' : 'نمی‌دانم')}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <p class="feature_title">انباری</p>
                                            <p style="text-align:center">{{$file->depot === 1 ? 'دارد' : ($file->depot === 0 ? 'ندارد' : 'نمی‌دانم')}}</p>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img style="border-radius: 20px;width:100%;" src="{{$file->thumbnail ? $file->thumbnail : '/img/place_holder.png'}}" alt="">
                                    </div>
                                </div>
                            </div>

                
                        </div>
                    </div>
               
                    
                    
                </div>
            </div>
    
    </div>
</div>
@endsection