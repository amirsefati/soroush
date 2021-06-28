@extends('moshaver.master')

@section('content')

<div class="row">
    <div class="col-md-12">
                <div class="row" style="width:100%">
                    <div class="col-md-4 pt-2 pr-4">  </div>
                    <div class="col-md-4">
                        <span style="padding: 10px;" onclick="manage_file_filter('فروش')">فروش</span>
                        <span style="padding: 10px;" onclick="manage_file_filter('اجاره')">اجاره</span>
                        <span style="padding: 10px;" onclick="manage_file_filter('پیش فروش')">پیش فروش</span>
                        <span style="padding: 10px;" onclick="manage_file_filter('همه')">همه</span>
                        <span style="padding: 10px;" onclick="manage_file_filter_pin()">نشان دار</span>
                        <hr>
                        <div>
                            <input type="number" id="bednumber_filterinput" placeholder="تعداد اتاق خواب">
                            <input type="number" id="minarea_filterinput" placeholder=" حداقل متراژ">
                            <input type="number" id="maxarea_filterinput" placeholder=" حداکثر متراژ">

                            <span onclick="filter_input_files()">اعمال تغییرات</span>
                        </div>
                    </div>
                </div>

                <div class="row p-2">
                    @foreach($files_archived as $file)
                        <div class="col-md-6 pr-4 pl-4 pt-3 filter_col">
                            <div class="row manage_file_box">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 p-2">
                                            <a href="/moshaver/fileinfo/{{$file->id}}">
                                                <img src="{{$file->thumbnail ? $file->thumbnail : '/img/noimg.png'}}" class="manage_file_box_img" alt="">
                                            </a>
                                        </div>
                                        <div class="col-md-9 pr-1">
                                            <div class="pt-3">
                                                <p class="manage_file_box_p">{{$file->type}} <span class="area_filter">{{$file->area ? $file->area : ''}}</span> متری
                                                @if($file->pin)
                                                    <img src="/img/pin.png" class="file_pined" width="15px" style="margin-top: -2px;" alt="">
                                                @else
                                                    <div class="nopined"></div>
                                                @endif
                                                </p>
                                                <p class="manage_file_box_p">مالک : {{App\Models\User::find($file->userid_file)->name}}</p>
                                                <p class="manage_file_box_p">
                                                @if($file->kind_type == 'sell')
                                                        قیمت : <span class="price_comma">{{$file->price * $file->area}}</span>  تومان
                                                    @else
                                                        رهن <span class="price_comma">{{$file->rent_annual}}</span>  تومان
                                                        -اجاره <span class="price_comma">{{$file->rent_month}}</span>  تومان
                                                @endif
                                                </p>
                                            </div>

                                            @if($file->publish == 0)
                                                <div class="manage_files_notpublish">
                                                    <span class="manage_files_notpublish_span">پیش نویس</span>
                                                </div>
                                            @else
                                                @if($file->verify == 0)
                                                    <div class="manage_files_notpublish">
                                                        <span class="manage_files_notpublish_span"> در انتظار تایید</span>
                                                    </div>
                                                @elseif($file->verify == -1)
                                                    <div class="manage_files_notpublish">
                                                        <span class="manage_files_notpublish_span"> رد شده </span>
                                                    </div>
                                                @else
                                                    <div class="manage_files_notpublish">
                                                        <span class="manage_files_notpublish_span"> تایید شده </span>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    <hr style="padding:2px;margin:2px"/>
                                    <div class="row p-2">
                                        <div class="col-md-8">
                                            @if($file->area)
                                                <img src="/img/area.svg" style="margin-top:-3px" alt="">
                                                <span style="font-size: 12px;">{{$file->area}}</span>
                                            @endif
                                            @if($file->bedroom_number)

                                                <img src="/img/beds.svg" style="margin-top:-3px;margin-right:5px" alt="">
                                                <span style="font-size: 12px;">{{$file->bedroom_number}}</span>
                                            @endif
                                                <span class="bednumber_filter" style="display: none;">{{$file->bedroom_number}}</span>
                                            @if($file->floor)
                                                
                                                <img src="/img/floor.svg" style="margin-top:-8px;margin-right:5px" alt="">
                                                <span style="font-size: 12px;">{{$file->floor}}</span>
                                            @endif  
                                            @if($file->floor)
                                                
                                                <img src="/img/age.svg" style="margin-top:-8px;margin-right:5px" alt="">
                                                <span style="font-size: 12px;">{{$file->age}}</span>
                                            @endif  
                                        </div>  

                                        <div class="col-md-4" style="text-align: center;">
                                            @if($file->kind_type == 'rent')
                                                <span class="badge_kind_file" style="background: #fcdc4d;">اجاره</span>
                                            @else
                                                @if($file->kind_type == 'presell')
                                                    <span class="badge_kind_file " style="background: #cb793a;">پیش فروش</span> <span>({{$file->presell_date}})</span>
                                                @else
                                                    <span class="badge_kind_file" style="background: #5f0f40;">فروش</span>
                                                @endif
                                            @endif
                                        </div>            
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        
                    @endforeach
                </div>
        </div>
</div>

@endsection