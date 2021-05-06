@extends('moshaver.master')
@section('content')

<div class="row">
    <div class="col-md-12 p-3 fileinfo_headbox">
        <div class="row">
            <div class="col-md-12 pr-5">
                <p style="margin:5px;color:coral;font-size:16px">{{$file->type}}</p>
                <p style="margin:5px;font-size:20px;font-weight: bold;"> {{$file->type}} {{$file->area}} متری</p>
                <p style="margin:5px;">
                    @if($file->kind_type == 'sell')
                        بودجه : {{$file->price}} میلیون تومان
                    @else
                        رهن {{$file->rent_annual}} میلیون تومان
                        - اجاره {{$file->rent_month}} میلیون تومان
                    @endif
                </p>
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

                <span class="fileinfo_btn_edit">
                     ارسال به مشتری
                    <img src="/img/share.svg" alt="">
                </span>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12" style="background:white">
        
            <div class="container">
                <br>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tab1">جزئیات</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab2">شانس قرارداد</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab3">تعاون</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab4">اقدامات</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab5">آپدیت</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="tab1" class="container tab-pane active"><br>
                        <div class="row">
                            <div class="col-md-6" style="text-align: center;">
                                <img src="/img/area.svg" alt="">
                                <p style="margin:10px;font-weight:bold;font-size:20px">{{$file->area}}</p>
                                <p>متری</p>

                                <hr/>
                                <br/>
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
                        </div>
                    </div>
                    <div id="tab2" class="container tab-pane fade"><br>
                    <h3>Menu 1</h3>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <div id="tab3" class="container tab-pane fade"><br>
                    <h3>Menu 2</h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                    </div>
                    <div id="tab4" class="container tab-pane fade"><br>
                    <h3>Menu 2</h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                    </div>
                    <div id="tab5" class="container tab-pane fade"><br>
                    <h3>Menu 2</h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                    </div>
                </div>
            </div>
    
    </div>
</div>
@endsection