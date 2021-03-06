@extends('monshi.master')
@section('content')

<div style="display: none;">
{{$f = 0}}
{{{$t = 0}}}
@foreach($result as $r)
@if($r->userid_moshaver == Auth::user()->id)
    {{$f++}}
@else
    {{$t++}}
@endif
@endforeach
</div>

<div class="row">
    <div class="col-md-1"></div>

    <div class="col-md-10 show_user_box">

        <div class="row">
            <div class="col-md-12">
                <div class="row p-3">
                    <div class="col-md-1">
                        <span class="show_user_header_type">
                            @if($user->kind_type == 'sell')
                                خریدار
                            @else
                                مستاجر
                            @endif
                        </span>
                    </div>
                    <div class="col-md-4" style="font-weight: bold;">
                        متقاضی 
                            {{$user->type}}
                            @if($user->kind_type == 'sell')
                                خریدار
                            @else
                                مستاجر
                            @endif

                        {{$user->area ? $user->area : " - "}} متر مربع

                    </div>

                    <div class="col-md-7" style="text-align: left;">
                        <a href="/monshi/edituser/{{$user->id}}">
                        <button class="btn btn-outline-primary">ویرایش</button></a>
                        <button class="btn btn-outline-danger">حذف</button>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home">جزئیات</a>
                        </li>

                    </ul>

                    </div> 
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content">

                                <div id="home" class="container tab-pane active"><br>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <p style="margin:5px">کاربر : <strong>{{$user->name}}</strong></p>
                                            @if($user->kind_type == 'sell')
                                                قیمت :
                                                <strong><span class="price_comma">{{$user->price}}</span>   تومان</strong>
                                            @else
                                                رهن : 
                                                <strong><span class="price_comma">{{$user->rent_annual}}</span>  تومان</strong>
                                                <br/>
                                                اجاره :
                                                <strong><span class="price_comma">{{$user->rent_month}}</span>  تومان</strong>

                                                
                                            @endif
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-2 col-4" style="text-align: center;">
                                            <img style="padding:5px" src="/img/beds.svg" alt=""><br>
                                            <strong style="font-size: 19px;">{{$user->bedroom_number}}</strong><br>
                                            <span>تعداد خواب</span>
                                        </div>

                                        <div class="col-md-2 col-4" style="text-align: center;">
                                            <img style="padding:5px" src="/img/beds.svg" alt=""><br>
                                            <strong style="font-size: 19px;">{{$user->age}}</strong><br>
                                            <span>سال ساخت</span>
                                        </div>

                                        <div class="col-md-2 col-4" style="text-align: center;">
                                            <img style="padding:5px" src="/img/beds.svg" alt=""><br>
                                            <strong style="font-size: 19px;">{{$user->area   }}</strong><br>
                                            <span>متراژ</span>
                                        </div>

                                    </div>
                                    <br>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-2"></div>

                                        <div class="col-md-2 col-3" style="text-align:center">
                                            انباری <br>
                                            @if($user->depot)
                                                <img src="/img/check.svg" alt="">
                                            @else
                                                <img src="/img/clear.svg" alt="">
                                            @endif
                                        </div>

                                        <div class="col-md-2 col-3" style="text-align:center">
                                            آسانسور <br>
                                            @if($user->elevator)
                                                <img src="/img/check.svg" alt="">
                                            @else
                                                <img src="/img/clear.svg" alt="">
                                            @endif
                                        </div>

                                        <div class="col-md-2 col-3" style="text-align:center">
                                            پارکینگ <br>
                                            @if($user->parking)
                                                <img src="/img/check.svg" alt="">
                                            @else
                                                <img src="/img/clear.svg" alt="">
                                            @endif
                                        </div>

                                        <div class="col-md-2 col-3" style="text-align:center">
                                            بالکن <br>
                                            @if($user->balcony)
                                                <img src="/img/check.svg" alt="">
                                            @else
                                                <img src="/img/clear.svg" alt="">
                                            @endif
                                        </div>
                                    </div>
                                    <br>
                                    <hr>

                                    <p style="color:#0D324D">آخرین مهلت مشتری : </p>
                                    <p style="color:#0D324D">توضیحات : </p>
                                </div>
    
    
                                <div id="menu1" class="container tab-pane fade"><br>
                                    <div class="row">
                                        @foreach($result as $file)
                                            @if($file->userid_moshaver == Auth::user()->id)
                                            <div class="col-md-6 pt-1 pr-3 pl-3">
                                                <div class="row list_file_in_user">
                                                    <div class="col-md-12">
                                                        <div class="row">

                                                            <div class="col-md-3 p-0">
                                                                <div class="chance_ok">
                                                                    @if($file->kind_type == 'sell')
                                                                        <p class="chance_ok_percent">%{{floor((($file->price*$file->area) / $user->price < 1 ? ($file->price*$file->area) / $user->price : $user->price / ($file->price*$file->area))*100)}}</p>
                                                                    @else
                                                                        <p class="chance_ok_percent">%{{floor(($file->rent_month / $user->rent_month < 1 ? $file->rent_month / $user->rent_month : $user->rent_month / $file->rent_month)*100)}}</p>
                                                                    @endif
                                                                    <p class="chance_ok_text">شانس</p>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-8 p-2">
                                                                {{$file->type}} {{$file->area}} متری <br>

                                                                        @if($file->kind_type == 'sell')
                                                                            قیمت :
                                                                            <strong>{{$file->price}}   تومان</strong>
                                                                        @else
                                                                            رهن : 
                                                                            <strong>{{$file->rent_annual}}   تومان</strong>
                                                                            <br/>
                                                                            اجاره :
                                                                            <strong>{{$file->rent_month}}   تومان</strong>  
                                                                        @endif
                                                            </div>

                                                        </div>
                                                        <hr>    
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a href="/moshaver/client_to_file_get/{{Auth::user()->id}}/{{$user->id}}/{{$file->id}}">
                                                            <span class="verify_file"> شروع روند </span></a>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            @endif
                                        @endforeach 
                                    </div>
                                  

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