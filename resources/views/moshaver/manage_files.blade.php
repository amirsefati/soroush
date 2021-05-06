@extends('moshaver.master')

@section('content')

<div class="row">
    <div class="col-md-12">
                <div class="row" style="width:100%">
                    <div class="col-md-4 pt-2 pr-4">  </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4" style="text-align: left;">
                        <a href="/moshaver/addfile_get">
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
                                            <a href="/moshaver/fileinfo/{{$file->id}}">
                                                <img src="{{$file->thumbnail}}" class="manage_file_box_img" alt="">
                                            </a>
                                        </div>
                                        <div class="col-md-9 pr-1">
                                            <div class="pt-3">
                                                <p class="manage_file_box_p">{{$file->type}} {{$file->area ? $file->area : '-'}} متری</p>
                                                <p class="manage_file_box_p">مالک : {{App\Models\User::find($file->userid_file)->name}}</p>
                                                <p class="manage_file_box_p">
                                                @if($file->kind_type == 'sell')
                                                        بودجه : {{$file->price}} میلیون تومان
                                                    @else
                                                        رهن {{$file->rent_annual}} میلیون تومان
                                                        -اجاره {{$file->rent_month}} میلیون تومان
                                                @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="padding:2px;margin:2px"/>
                                    <div class="row p-2">
                                        <div class="col-md-4">
                                            <img src="/img/area.svg" style="margin-top:-3px" alt="">
                                            <span style="font-size: 12px;">{{$file->area}}</span>
                                        </div>
                                        <div class="col-md-8" style="text-align: left;">
                                            <span class="send_to_customer">
                                                <img src="/img/share.svg" alt="">
                                                ارسال به مشتری
                                            </span>
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