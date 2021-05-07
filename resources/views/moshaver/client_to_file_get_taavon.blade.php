@extends('moshaver.master')
@section('content')

<div class="row">
    <div class="col-md-12">
    <p>حالت تعاون شده</p>
    <div class="row p-2">
            <div class="col-md-12 client_to_file_box">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <strong>اطلاعات مالک فایل</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        نام مشاور : {{$taavon_moshaver->name}}
                    </div>

                    <div class="col-md-3">
                        شماره تلفن  : {{$taavon_moshaver->phone}}
                    </div>

                    <div class="col-md-3">
                        نوع دسترسی : {{$taavon_moshaver->level == 2 ? 'مشاور' : 'منشی'}}
                    </div>

                    <div class="col-md-3">
                        رنک مشاور : {{$taavon_moshaver->rank}}
                    </div>
                </div>
                
            </div>
        </div>


        <div class="row p-2">
            <div class="col-md-12 client_to_file_box">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <strong>اطلاعات ثبت کننده</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        نام مشاور : {{$moshaver->name}}
                    </div>

                    <div class="col-md-3">
                        شماره تلفن  : {{$moshaver->phone}}
                    </div>

                    <div class="col-md-3">
                        نوع دسترسی : {{$moshaver->level == 2 ? 'مشاور' : 'منشی'}}
                    </div>

                    <div class="col-md-3">
                        رنک مشاور : {{$moshaver->rank}}
                    </div>
                </div>
                
            </div>
        </div>

        <div class="row p-2">
            <div class="col-md-12 client_to_file_box">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <strong>اطلاعات فایل</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        نوع فایل : {{$file->kind_type == 'sell' ? 'فروش' : 'اجاره'}} {{$file->type}}
                    </div>
                    <div class="col-md-3">
                        متراژ : {{$file->area}}
                    </div>
                    <div class="col-md-3">
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
                    <div class="col-md-3">
                        منطقه : {{$file->region}}
                    </div>
                </div>
 
            </div>
        </div>

        <div class="row p-2">
            <div class="col-md-12 client_to_file_box">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <strong>اطلاعات مشتری</strong>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-3">
                        نوع فایل : {{$client->kind_type == 'sell' ? 'فروش' : 'اجاره'}} {{$client->type}}
                    </div>
                    <div class="col-md-3">
                        متراژ : {{$client->area}}
                    </div>
                    <div class="col-md-3">
                        @if($client->kind_type == 'sell')
                            قیمت :
                                <strong>{{$client->price}} میلیون تومان</strong>
                        @else
                            رهن : 
                                <strong>{{$client->rent_annual}} میلیون تومان</strong>
                                <br/>
                            اجاره :
                                <strong>{{$client->rent_month}} میلیون تومان</strong>  
                        @endif
                    </div>
                    <div class="col-md-3">
                        منطقه : {{$client->region}}
                    </div>
                </div>
            </div>
        </div>

        <div class="row p-2">
            <div class="col-md-12"  style="text-align: center;">
                <a href="/moshaver/client_to_file_start/{{$moshaver->id}}/{{$client->id}}/{{$file->id}}">
                <button class="btn btn-success">تایید و شروع</button></a>
            </div>
        </div>

    </div>
</div>

@endsection