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
                <div class="row">
                    <div class="col-md-12">
                        <label for="search">جست جو در فایل ها :</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-2">
                        <label for="age">حداکثر سن بنا :</label>
                        <input type="number" class="form-control">
                    </div>

                    <div class="col-md-2">
                        <label for="age">حداقل متراژ :</label>
                        <input type="number" class="form-control">
                    </div>

                    <div class="col-md-2">
                        <label for="age">منطقه :</label>
                        <input type="number" class="form-control">
                    </div>
                </div>
                <div class="row mt-3" style="text-align: center;">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2 col-6">
                                <div class="custom-control custom-switch pt-2">
                                    <input type="checkbox" class="custom-control-input" id="elevatoe" name="elevator">
                                    <label class="custom-control-label" for="elevatoe">آسانسور</label>
                                </div>
                            </div>

                            <div class="col-md-2 col-6">
                                <div class="custom-control custom-switch pt-2">
                                    <input type="checkbox" class="custom-control-input" id="balcony" name="elevator">
                                    <label class="custom-control-label" for="balcony">بالکن</label>
                                </div>
                            </div>

                            <div class="col-md-2 col-6">
                                <div class="custom-control custom-switch pt-2">
                                    <input type="checkbox" class="custom-control-input" id="parking" name="elevator">
                                    <label class="custom-control-label" for="parking">پارکینگ</label>
                                </div>
                            </div>

                            <div class="col-md-2 col-6">
                                <div class="custom-control custom-switch pt-2">
                                    <input type="checkbox" class="custom-control-input" id="depot" name="elevator">
                                    <label class="custom-control-label" for="depot">انباری</label>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div> 
                <br>
                <hr style="border: 0;height: 1px;background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">
                <div class="row p-2">
                    @foreach($result as $file)
                        @if($file->userid_moshaver == Auth::user()->id)

                        <div class="col-md-12 pr-4 pl-4 pt-3">
                            @if($file->kind_type == 'sell')
                            <div class="row row_box" style="background-color: #0093E9;background-image: linear-gradient(104deg, #0093E9 0%, #80D0C7 100%);">
                            @else
                            <div class="row row_box" style="background-color: #FBAB7E;background-image: linear-gradient(115deg, #FBAB7E 0%, #F7CE68 89%);">
                            @endif
                                <a href="/moshaver/edituser/{{$file->id}}">
                                    <div class="col_right_box">
                                        <img src="{{$file->thumbnail ? $file->thumbnail : '/img/noimg.png'}}"  class="filefinduser_img" alt="">
                                        <span class="addfilelist_sell_rent">{{$file->kind_type == 'sell' ? 'فروشی' : 'اجاره'}}</span>
                                        <span class="addfilelist_type">{{$file->type}}</span>

                                    </div>
                                </a>
                                    <div class="col_left_box" style="float: left;">
                                        <p>{{$file->name ? ($file->name) :  'عنوان فایل'}}</p>
                                        <p class="addfilelist_userid_file"> شماره تلفن : <span style="color:gray;">{{$user->phone}}</span></p>
                                        <p class="addfilelist_price">
                                            @if($file->price)
                                            <span style="color:gray;">{{$file->price}}</span>   
                                            @else
                                                    @if($file->rent_annual)
                                                    <span style="color:gray;">{{$file->rent_annual}}</span> میلیون -
                                                    <span style="color:gray;">{{$file->rent_month}}</span> میلیون تومان

                                                    @else
                                                    <span style="color:gray;">غیرمجاز</span>                                                    
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
                                                    <span style="color:gray;">{{$file->area}} متر مربع</span>
                                        </p>
                                        <div class="addfilelist_colbottom">
                                            <div class="row">
                                            <div class="col-md-2  col-4">
                                                    <span class="bottomcol_span"> منطقه {{$user->region}}</span>
                                                </div>

                                                <div class="col-md-2 pr-0 pl-0 col-4">
                                                    <span class="bottomcol_span"> سن بنا {{$user->age}}</span>
                                                </div>

                                                <div class="col-md-2 pr-0 pl-0 col-4">
                                                    <span class="bottomcol_span"> آسانسور {{$user->elevator == null ? '-' : ($user->elevator == 1 ? 'ثبت' : '-')}}</span>
                                                </div>

                                                <div class="col-md-2 pr-0 pl-0 hideinphone">
                                                    <span class="bottomcol_span"> تعداد خواب {{$user->bedroom_number}}</span>
                                                </div>

                                                <div class="col-md-2 pr-0 pl-0 hideinphone">
                                                    <span class="bottomcol_span"> پارکینگ {{$user->parking == null ? '-' : ($user->elevator == 1 ? 'ثبت' : '-')}}</span>
                                                </div>

                                                <div class="col-md-2 pr-0 pl-0 hideinphone">
                                                    <span class="bottomcol_span"> بالکن {{$user->balcony == null ? '-' : ($user->elevator == 1 ? 'ثبت' : '-')}}</span>
                                                </div>
                                            </div>    
                                        </div>
                                    <a href="/moshaver/taavon/{{$file->id}}/{{$user->id}}/{{$file->userid_moshaver}}/getfile">
                                        <div class="filefinduser_percent_complete">
                                        <img src="/img/select.png" class="filefinduser_percent_complete_img" alt="">
                                        </div>
                                    </a>
                                    </div>
                            </div>
                            @if($file->etc1 == 0)
                            <a href="/moshaver/addpin/{{$file->id}}">
                                <div class="hotfile">
                                    <span class="hotfile_span">پین</span>
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
                        

                        @else

                        <div class="col-md-12 pr-4 pl-4 pt-3">
                            @if($file->kind_type == 'sell')
                            <div class="row row_box" style="background-color: #0093E9;background-image: linear-gradient(104deg, #0093E9 0%, #80D0C7 100%);">
                            @else
                            <div class="row row_box" style="background-color: #FBAB7E;background-image: linear-gradient(115deg, #FBAB7E 0%, #F7CE68 89%);">
                            @endif
                                <a href="/moshaver/edituser/{{$file->id}}">
                                    <div class="col_right_box">
                                        <img src="{{$file->thumbnail ? $file->thumbnail : '/img/noimg.png'}}"  class="filefinduser_img" alt="">
                                        <span class="addfilelist_sell_rent">{{$file->kind_type == 'sell' ? 'فروشی' : 'اجاره'}}</span>
                                        <span class="addfilelist_type">{{$file->type}}</span>

                                    </div>
                                </a>
                                    <div class="col_left_box" style="float: left;">
                                        <p>{{$file->name ? (($file->kind_type == 'sell' ? 'خریدار' : 'مستجر') .' '. $file->name) :  'عنوان فایل'}} 
                                        (   مشاور : {{App\Models\User::find($file->userid_moshaver)->name}} )
                                        </p>
                                        <p class="addfilelist_userid_file"> شماره تلفن : <span style="color:gray;">غیرمجاز</span></p>
                                        <p class="addfilelist_price">
                                            @if($file->price)
                                            <span style="color:gray;">غیرمجاز</span>   
                                            @else
                                                    @if($file->rent_annual)
                                                    <span style="color:gray;">غیرمجاز</span>

                                                    @else
                                                    <span style="color:gray;">غیرمجاز</span>                                                    @endif
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
                                                    <span style="color:gray;">غیرمجاز</span>
                                        </p>
                                        <div class="addfilelist_colbottom">
                                            <div class="row">
                                                <div class="col-md-2 col-4">
                                                    <span class="bottomcol_span"> منطقه <span style="color:gray;">غیرمجاز</span></span>
                                                </div>

                                                <div class="col-md-2 pr-0 pl-0 col-4">
                                                    <span class="bottomcol_span"> سن بنا <span style="color:gray;">غیرمجاز</span></span>
                                                </div>

                                                <div class="col-md-2 pr-0 pl-0 col-4">
                                                    <span class="bottomcol_span"> آسانسور <span style="color:gray;">غیرمجاز</span></span>
                                                </div>

                                                <div class="col-md-2 pr-0 pl-0 hideinphone">
                                                    <span class="bottomcol_span"> تعداد خواب <span style="color:gray;">غیرمجاز</span></span>
                                                </div>

                                                <div class="col-md-2 pr-0 pl-0 hideinphone">
                                                    <span class="bottomcol_span"> پارکینگ <span style="color:gray;">غیرمجاز</span></span>
                                                </div>

                                                <div class="col-md-2 pr-0 pl-0 hideinphone">
                                                    <span class="bottomcol_span"> بالکن <span style="color:gray;">غیرمجاز</span></span>
                                                </div>
                                            </div>    
                                        </div>
                                    <a href="/moshaver/taavon/{{$file->id}}/{{$user->id}}/{{$file->userid_moshaver}}/getfile">
                                        <div class="filefinduser_percent_complete">
                                            <img src="/img/taavon.png" class="taavon_img" alt="">
                                        </div>
                                    </a>
                                    </div>
                            </div>
                            @if($file->etc1 == 0)
                            <a href="/moshaver/addpin/{{$file->id}}">
                                <div class="hotfile">
                                    <span class="hotfile_span">پین</span>
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

                        @endif
                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection