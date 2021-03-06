@extends('monshi.master')

@section('content')

<div class="row">
    <div class="col-md-12">
                <div class="row" style="width:100%">
                    <div class="col-md-4 pt-2 pr-4">  </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4" style="text-align: left;">
                        <a href="/monshi/addfile_get">
                            <button class="btn pr-5 pl-5" style="background:#1D3461;color:white">افزودن فایل</button>
                        </a>
                    </div>
                </div>

                <div class="row p-2">
                    @foreach($files_yes_publish as $file)
                        <div class="col-md-6 pr-4 pl-4 pt-3">
                            <div class="row manage_file_box">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 p-2">
                                            <a href="/monshi/fileinfo/{{$file->id}}">
                                                <img src="{{$file->thumbnail ? $file->thumbnail : '/img/noimg.png'}}" class="manage_file_box_img" alt="">
                                            </a>
                                        </div>
                                        <div class="col-md-9 pr-1">
                                            <div class="pt-3">
                                                <p class="manage_file_box_p">{{$file->type}} {{$file->area ? $file->area : '-'}} متری</p>
                                                <p class="manage_file_box_p">مالک : {{App\Models\User::find($file->userid_file)->name}}</p>
                                                <p class="manage_file_box_p">
                                                @if($file->kind_type == 'sell')
                                                        قیمت : <span class="price_comma"> {{$file->price * $file->area}} </span> تومان
                                                    @else
                                                        رهن <span class="price_comma"> {{$file->rent_annual}} </span> تومان
                                                        -اجاره <span class="price_comma"> {{$file->rent_month}} </span> تومان
                                                @endif
                                                </p>
                                            </div>

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