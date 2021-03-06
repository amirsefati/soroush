@extends('moshaver.master')
@section('content')

<div class="row">
    <div class="col-md-12">
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
                                <strong>{{$client->price}}   تومان</strong>
                        @else
                            رهن : 
                                <strong>{{$client->rent_annual}}   تومان</strong>
                                <br/>
                            اجاره :
                                <strong>{{$client->rent_month}}   تومان</strong>  
                        @endif
                    </div>
                    <div class="col-md-3">
                        منطقه : {{$client->region}}
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
                                <strong><span class="price_comma">{{$file->price}}</span>    تومان</strong>
                        @else
                            رهن : 
                                <strong><span class="price_comma">{{$file->rent_annual}}</span>    تومان</strong>
                                <br/>
                            اجاره :
                                <strong><span class="price_comma">{{$file->rent_month}}</span>    تومان</strong>  
                        @endif
                    </div>
                    <div class="col-md-3">
                        منطقه : {{$file->region}}
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