@extends('moshaver.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row" style="width:100%">
                    <div class="col-md-4 pt-2 pr-4">  آرشیو فایل ها </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4" style="text-align: left;">
                        <a href="/moshaver/addfile_get">
                            <button class="btn btn-danger pr-5 pl-5">افزودن فایل</button>
                        </a>
                        <a href="/moshaver/adduser">
                        <button class="btn btn-warning">افزودن کاربر</button>
                        </a>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <div class="row p-2">
                    @foreach($files_yes_publish as $file)
                        <div class="col-md-6 pr-4 pl-4 pt-3">
                            @if($file->kind_type == 'sell')
                                <div class="row row_box" style="background-color: #0093E9;background-image: linear-gradient(104deg, #0093E9 0%, #80D0C7 100%);">
                            @else
                                <div class="row row_box" style="background-color: #FBAB7E;background-image: linear-gradient(115deg, #FBAB7E 0%, #F7CE68 89%);">
                            @endif
                                    <div class="col-md-3 pr-1 pl-1">
                                        <a href="/moshaver/editfile/{{$file->id}}">
                                            <div class="col_right_box">
                                                <img src="{{$file->thumbnail ? $file->thumbnail : '/img/noimg.png'}}"  class="addfilelist_img" alt="">
                                                <span class="addfilelist_sell_rent">{{$file->kind_type == 'sell' ? 'فروشی' : 'اجاره'}}</span>
                                                <span class="addfilelist_type">{{$file->type}}</span>

                                            </div>
                                        </a>
                                    </div>
                                    
                                    <div class="col-md-9">
                                        <div class="col_left_box">
                                                <p>{{$file->name ? $file->name :  'عنوان فایل'}}</p>
                                                <p class="addfilelist_userid_file"> مالک : <span>{{($user = App\Models\User::find($file->userid_file)) ? $user->name : 'بدون مالک' }}</span></p>
                                                <p class="addfilelist_price">
                                                    @if($file->price)
                                                    قیمت : {{$file->price}} میلون تومان
                                                    @else
                                                        @if($file->rent_annual)
                                                            رهن : {{$file->rent_annual}} میلیون -
                                                            اجاره : {{$file->rent_month}} میلیون تومان

                                                        @else
                                                            قیمت : بدون قیمت
                                                        @endif
                                                    @endif
                                                </p>
                                                <p class="addfilelist_area">
                                                    <svg id="Plans_Icon" data-name="Plans Icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                        <rect id="Rectangle_1924" data-name="Rectangle 1924" width="24" height="24" fill="none"/>
                                                        <g id="plans" transform="translate(20.651 -1.837) rotate(90)">
                                                            <g id="Group_787" data-name="Group 787" transform="translate(7.771 13.598)">
                                                                <g id="Group_786" data-name="Group 786" transform="translate(0)">
                                                                    <path id="Path_1484" data-name="Path 1484" d="M86.52,413.09l-1.1-1.1a.551.551,0,1,0-.78.78l.162.161H74.231l.162-.161a.551.551,0,1,0-.78-.78l-1.1,1.1a.551.551,0,0,0,0,.78l1.1,1.1a.551.551,0,0,0,.78-.78l-.162-.162H84.8l-.162.162a.551.551,0,0,0,.78.78l1.1-1.1a.551.551,0,0,0,0-.78Z" transform="translate(-72.349 -411.826)" fill="#666"/>
                                                                </g>
                                                            </g>
                                                            <g id="Group_789" data-name="Group 789" transform="translate(5.566 0)">
                                                                <g id="Group_788" data-name="Group 788" transform="translate(0)">
                                                                    <path id="Path_1485" data-name="Path 1485" d="M7.932,11.556l-.162.161V1.883l.162.162a.551.551,0,0,0,.78-.78l-1.1-1.1a.551.551,0,0,0-.78,0l-1.1,1.1a.551.551,0,1,0,.78.78l.161-.162v9.834l-.162-.162a.551.551,0,0,0-.78.78l1.1,1.1a.551.551,0,0,0,.78,0l1.1-1.1a.551.551,0,1,0-.779-.78Z" transform="translate(-5.566 -0.001)" fill="#666"/>
                                                                </g>
                                                            </g>
                                                            <g id="Group_791" data-name="Group 791" transform="translate(9.976)">
                                                                <g id="Group_790" data-name="Group 790">
                                                                    <path id="Path_1486" data-name="Path 1486" d="M148.5,4.41h2.756V.551A.551.551,0,0,0,150.707,0h-7.534V4.41h2.756a.551.551,0,1,1,0,1.1h-2.756V7.167a.551.551,0,1,1-1.1,0V0h-2.389a.551.551,0,0,0-.551.551V11.944a.551.551,0,0,0,.551.551h2.389V9.739a.551.551,0,1,1,1.1,0V12.5h7.534a.551.551,0,0,0,.551-.551V5.513H148.5a.551.551,0,1,1,0-1.1Z" transform="translate(-139.13)" fill="#666"/>
                                                                </g>
                                                            </g></g></svg>    
                                                    <span style="font-size: 10px;">{{$file->area ?  $file->area : 0}} مترمربع</span>
                                                </p>
                                                
                                            
                                                
                                            </div>
                                    </div>
                                   
                                  
                                    <div class="col-md-12">

                                        <hr style="margin:10px; border: 0;height: 0;border-top: 1px solid rgba(0, 0, 0, 0.1);border-bottom: 1px solid rgba(255, 255, 255, 0.3);"/>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <span style="font-size:11px">نوع فایل : {{$file->type}}</span>
                                            </div>

                                            <div class="col-md-6" style="text-align: left;">
                                                <a class="send_to_client" href="">
                                                    <img src="/img/share.svg" alt="">
                                                    ارسال به مشتری
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                           
                            </div>
                            @if($file->etc1 == 0)
                            <a href="/moshaver/addpin/{{$file->id}}">
                                <div class="hotfile">
                                    <span class="hotfile_span">:</span>
                                </div>
                            </a>
                            @else
                            <a href="/moshaver/delpin/{{$file->id}}">
                                <div class="hotfiledel">
                                    <span class="hotfile_span">حذف</span>
                                </div>
                            </a>
                            @endif

                            
                        </div>

                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection