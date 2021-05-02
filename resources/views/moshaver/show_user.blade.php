@extends('moshaver.master')
@section('content')


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
                        
                            @if($user->kind_type == 'sell')
                                خریدار
                            @else
                                مستاجر
                            @endif

                        {{$user->area ? $user->area : " - "}} متر مربع

                    </div>

                    <div class="col-md-7" style="text-align: left;">
                        <a href="/moshaver/edituser/{{$user->id}}">
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
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu1">شانس قرارداد</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu2">تعاون</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu3">روند اقدامات</a>
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
                                            @if($user->kind_type == 'sell')
                                                قیمت :
                                                <strong>{{$user->price}} میلیون تومان</strong>
                                            @else
                                                رهن : 
                                                <strong>{{$user->rent_annual}}میلیون تومان</strong>
                                                <br/>
                                                اجاره :
                                                <strong>{{$user->rent_month}}میلیون تومان</strong>

                                                
                                            @endif
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-2" style="text-align: center;">
                                            <img style="padding:5px" src="/img/beds.svg" alt=""><br>
                                            <strong style="font-size: 19px;">{{$user->bedroom_number}}</strong><br>
                                            <span>تعداد خواب</span>
                                        </div>

                                        <div class="col-md-2" style="text-align: center;">
                                            <img style="padding:5px" src="/img/beds.svg" alt=""><br>
                                            <strong style="font-size: 19px;">{{$user->age}}</strong><br>
                                            <span>سن بنا</span>
                                        </div>

                                        <div class="col-md-2" style="text-align: center;">
                                            <img style="padding:5px" src="/img/beds.svg" alt=""><br>
                                            <strong style="font-size: 19px;">{{$user->area   }}</strong><br>
                                            <span>متراژ</span>
                                        </div>

                                    </div>
                                    <br>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-2"></div>

                                        <div class="col-md-2" style="text-align:center">
                                            انباری <br>
                                            @if($user->depot)
                                                <img src="/img/check.svg" alt="">
                                            @else
                                                <img src="/img/clear.svg" alt="">
                                            @endif
                                        </div>

                                        <div class="col-md-2" style="text-align:center">
                                            آسانسور <br>
                                            @if($user->elevator)
                                                <img src="/img/check.svg" alt="">
                                            @else
                                                <img src="/img/clear.svg" alt="">
                                            @endif
                                        </div>

                                        <div class="col-md-2" style="text-align:center">
                                            پارکینگ <br>
                                            @if($user->parking)
                                                <img src="/img/check.svg" alt="">
                                            @else
                                                <img src="/img/clear.svg" alt="">
                                            @endif
                                        </div>

                                        <div class="col-md-2" style="text-align:center">
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
                                            <div class="col-md-6 list_file_in_user">
                                                <div class="row">
                                                    <div class="col-md-4 ">
                                                        <img src="{{$file->thumbnail}}" width="100%" alt="">
                                                    </div>
                                                    <div class="col-md-8 p-2">
                                                        {{$file->type}} {{$file->area}} متری <br>

                                                                @if($file->kind_type == 'sell')
                                                                    قیمت :
                                                                    <strong>{{$file->price}} میلیون تومان</strong>
                                                                @else
                                                                    رهن : 
                                                                    <strong>{{$file->rent_annual}} میلیون تومان</strong>
                                                                    <br/>
                                                                    اجاره :
                                                                    <strong>{{$file->rent_month}} میلیون تومان</strong>

                                                                    
                                                                @endif
                                                    </div>

                                                    <hr/>
                                                    <div class="row">
                                                        <div class="col-md-12">

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        @endforeach 
                                    </div>
                                  

                                </div>
                                <div id="menu2" class="container tab-pane fade"><br>
                                <h3>در حال به روز رسانی</h3>

                                </div>

                                <div id="menu2" class="container tab-pane fade"><br>
                                <h3>در حال به روز رسانی</h3>

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