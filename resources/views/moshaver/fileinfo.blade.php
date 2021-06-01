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
                        بودجه : {{$file->price * $file->area}} میلیون تومان
                    @else
                        رهن {{$file->rent_annual}} میلیون تومان
                        - اجاره {{$file->rent_month}} میلیون تومان
                    @endif
                </p>
                <p style="margin:5px;font-size:10px">مالک : {{App\Models\User::find($file->userid_file)->name}}</p>
            </div>
        </div>

        <div class="row mt-4 mr-5">
            <div class="col-md-12">
                <span class="fileinfo_btn_edit">
                    <a href="/moshaver/editfile/{{$file->id}}">
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
                    <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab2">شانس قرارداد&nbsp;
                        @if($f)
                            <span class="badge badge-success" style="border-radius:20px;padding:4px"> {{$f}}</span>
                        @endif</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab3">تعاون &nbsp;
                        @if($t)
                            <span class="badge badge-danger" style="border-radius:20px;padding:4px"> {{$t}}</span>
                        @endif</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/moshaver/work_flow_file/{{$file->id}}">اقدامات</a>
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
                    <div id="tab2" class="container tab-pane fade"><br>
                        <div class="row">
                            @foreach($result as $user)
                                @if($user->userid_inter == Auth::user()->id)
                                    <div class="col-md-6 pt-1 pr-3 pl-3">
                                                <div class="row list_file_in_user">
                                                    <div class="col-md-12">
                                                        <div class="row">

                                                            <div class="col-md-3 p-0">
                                                                <div class="chance_ok">
                                                                    @if($user->kind_type == 'sell')
                                                                        <p class="chance_ok_percent">%{{floor((($file->price*$file->area) / $user->price < 1 ? ($file->price*$file->area) / $user->price : $user->price / ($file->price*$file->area))*100)}}</p>
                                                                    @else
                                                                        <p class="chance_ok_percent">%{{floor((($file->rent_month / $user->rent_month < 1 ? $file->rent_month / $user->rent_month : $user->rent_month / $file->rent_month))*100)}}</p>
                                                                    @endif
                                                                    <p class="chance_ok_text">شانس</p>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-8 p-2">
                                                                مشتری : {{$user->name}} <br>
                                                                {{$user->type}} {{$user->area}} متری <br>

                                                                        @if($user->kind_type == 'sell')
                                                                            قیمت :
                                                                            <strong>{{$user->price}}  تومان</strong>
                                                                        @else
                                                                            رهن : 
                                                                            <strong>{{$user->rent_annual}}  تومان</strong>
                                                                            <br/>
                                                                            اجاره :
                                                                            <strong>{{$user->rent_month}}  تومان</strong>  
                                                                        @endif
                                                            </div>

                                                        </div>
                                                        <hr>    
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            @if(!App\Models\Work::where('moshaver_id', Auth::user()->id)->where('client_id' , $user->id,)->where('file_id', $file->id)->first())
                                                            <a href="/moshaver/file_to_client_get/{{Auth::user()->id}}/{{$user->id}}/{{$file->id}}">
                                                                <span class="verify_file"> شروع روند</span>
                                                            </a>
                                                            @else
                                                                <span class="verify_file">  شروع شده</span>
                                                            @endif                                                        
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            @endif
                                        @endforeach 
                        </div>

                    </div>
                    <div id="tab3" class="container tab-pane fade"><br>
                        <div class="row">
                            @foreach($result as $user)
                                @if($user->userid_inter != Auth::user()->id)
                                    <div class="col-md-6 pt-1 pr-3 pl-3">
                                                <div class="row list_file_in_user">
                                                    <div class="col-md-12">
                                                        <div class="row">

                                                            <div class="col-md-3 p-0">
                                                                <div class="chance_ok">
                                                                    @if($user->kind_type == 'sell')
                                                                        <p class="chance_ok_percent">~</p>
                                                                    @else
                                                                        <p class="chance_ok_percent">~</p>
                                                                    @endif
                                                                    <p class="chance_ok_text">شانس</p>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-8 p-2">
                                                                
                                                                        <br>
                                                                        مشاور : {{App\Models\User::find($user->userid_inter)->name}}
                                                            </div>

                                                        </div>
                                                        <hr>    
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                        <div style="display: none;">
                                                                {{$taavon = App\Models\Taavon::
                                                                where('moshaver_id',Auth::user()->id)
                                                                ->where('client_id',$user->id)
                                                                ->where('file_id',$file->id)->first()}}
                                                            </div>

                                                            @if($taavon)

                                                                @if($taavon->verify == 0)
                                                                    <a href="">
                                                                        <span class="verify_file"> درانتظار تایید </span>
                                                                    </a>
                                                                @elseif($taavon->verify == 1)
                                                                    <a href="">
                                                                        <span class="verify_file"> رد شده </span>
                                                                    </a>
                                                                @elseif($taavon->verify == 2)
                                                                    <a>
                                                                        <span class="verify_file"> تایید شده </span>
                                                                    </a>&nbsp;
                                                                    <a href="/moshaver/taavon_moshaver_id/file_to_client_get/{{Auth::user()->id}}/{{$user->userid_inter}}/{{$user->id}}/{{$file->id}}">
                                                                        <span class="verify_file"> شروع روند</span>
                                                                    </a>
                                                                @endif

                                                            @else
                                                                <a href="/moshaver/taavon/file_user/{{Auth::user()->id}}/{{$user->userid_inter}}/{{$user->id}}/{{$file->id}}">
                                                                    <span class="verify_file"> درخواست تعاون</span>
                                                                </a>
                                                            @endif
                                                    </div>
                                                    </div>

                                                </div>

                                            </div>
                                            @endif
                                        @endforeach 
                        </div>
                    </div>
                    <div id="tab4" class="container tab-pane fade"><br>

                    </div>
                    
                </div>
            </div>
    
    </div>
</div>
@endsection