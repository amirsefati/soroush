@extends('moshaver.master')
@section('content')

<div class="row">
    <div class="col-md-12">
        <p>روند اقدامات بر روی فایل 
            <a href="/moshaver/fileinfo/{{$file_id}}">
                <strong>{{App\Models\File::find($file_id)->name}}</strong>
            </a>
        </p>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="row">
            @foreach($works as $work)  
                <div style="display: none;">
                    {{$u = App\Models\User::find($work->client_id)}}  
                </div>
                <div class="col-md-6 p-4">
                    <div class="row ">
                        <div class="col-md-12 work_flow_file_box">
                            <div class="row">
                                <div class="col-md-12 p-3">
                                    <p><a href="/moshaver/show_user/{{$u->id}}">{{$u->name}}</a></p>
                                </div>
                            </div>

                            <div class="row">   
                                <div class="col-md-12">

                                    @if($work->etc1 >= 2)
                                        <div id="accordion{{$u->id}}">

                                            <div class="card">
                                                <div class="card-header" style="height:2.5rem" id="headingOne">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" style="font-size: 9px;" data-toggle="collapse" data-target="#collapseOne{{$u->id}}" aria-expanded="false" aria-controls="collapseOne{{$u->id}}">
                                                    خلاصه مرحله نشان دادن فایل
                                                    </button>
                                                </h5>
                                                </div>

                                                <div id="collapseOne{{$u->id}}" class="collapse" aria-labelledby="headingOne"  >
                                                <div class="card-body">
                                                    <p><span>وضعیت : </span>{{json_decode($work->showfile)->like == 1 ? 'پسندید' : 'نپسندید'}}</p>
                                                    <p><span>توضیحات : </span>{{json_decode($work->showfile)->desc}}</p>
                                                    <p><span>تاریخ : </span>{{json_decode($work->showfile)->timer}}</p>
                                                </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($work->etc1 >= 3)
                                            <div class="card">
                                                <div class="card-header" style="height:2.5rem" id="headingTwo">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" style="font-size: 9px;" data-toggle="collapse" data-target="#collapseTwo{{$u->id}}" aria-expanded="false" aria-controls="collapseTwo{{$u->id}}">
                                                    خلاصه مرحله بازدید از ملک
                                                    </button>
                                                </h5>
                                                </div>
                                                <div id="collapseTwo{{$u->id}}" class="collapse" aria-labelledby="headingTwo"  >
                                                <div class="card-body">
                                                    <p><span>وضعیت : </span>{{json_decode($work->gotofile)->like == 1 ? 'پسندید' : 'نپسندید'}}</p>
                                                    <p><span>توضیحات : </span>{{json_decode($work->gotofile)->desc}}</p>
                                                    <p><span>تاریخ : </span>{{json_decode($work->gotofile)->timer}}</p>
                                                </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($work->etc1 >= 4)
                                            <div class="card">
                                                <div class="card-header" style="height:2.5rem" id="headingThree">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" style="font-size: 9px;" data-toggle="collapse" data-target="#collapseThree{{$u->id}}" aria-expanded="false" aria-controls="collapseThree{{$u->id}}">
                                                        خلاصه مرحله برگذاری جلسه
                                                    </button>
                                                </h5>
                                                </div>
                                                <div id="collapseThree{{$u->id}}" class="collapse" aria-labelledby="headingThree"  >
                                                <div class="card-body">
                                                    <p><span>وضعیت : </span> موفقیت آمیز {{json_decode($work->meeting)->like == 1 ? 'بود' : 'نبود'}}</p>
                                                    <p><span>توضیحات : </span>{{json_decode($work->meeting)->desc}}</p>
                                                    <p><span>تاریخ : </span>{{json_decode($work->meeting)->timer}}</p>
                                             
                                                </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($work->etc1 >= 5)
                                            <div class="card">
                                                <div class="card-header" style="height:2.5rem" id="headingThree">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" style="font-size: 9px;" data-toggle="collapse" data-target="#collapsefour{{$u->id}}" aria-expanded="false" aria-controls="collapsefour{{$u->id}}">
                                                        خلاصه مرحله نوشتن قرارداد
                                                    </button>
                                                </h5>
                                                </div>
                                                <div id="collapsefour{{$u->id}}" class="collapse" aria-labelledby="headingThree"  >
                                                <div class="card-body">
                                                    <p><span>وضعیت : </span>قرارداد نوشته {{json_decode($work->contruct)->like == 1 ? 'شد' : 'نشد'}}</p>
                                                    <p><span>توضیحات : </span>{{json_decode($work->contruct)->desc}}</p>
                                                    <p><span>تاریخ : </span>{{json_decode($work->contruct)->timer}}</p>
                                                    <p> 
                                                        @if(json_decode($work->picture))
                                                            <p>عکس های قرارداد</p>
                                                            <ul>
                                                            @foreach(json_decode($work->picture) as $p => $index)
                                                                <li><a href="{{$p}}">فایل {{$p + 1}}</a></li>
                                                            @endforeach
                                                            </ul>
                                                            
                                                        @endif
                                                    </p>
                                                </div>
                                                </div>
                                            </div>
                                        </div>

                                        @endif
                                    <br>

                                    @if($work->etc1 == null)
                                        <form action="/moshaver/work_flow_file_item" method="POST">
                                            <input type="text" name="step" value="1" id="" hidden>
                                            <input type="text" name="workid" value="{{$work->id}}" id="" hidden>

                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    نشان دادن فایل 
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    آیا فایل رو پسندید ؟
                                                    <select name="like" class="form-control" id="" required>
                                                        <option value=""> انتخاب کنید</option>
                                                        <option value="0">نه</option>
                                                        <option value="1">آره</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="desc">توضیحات :</label>
                                                    <input name="desc" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span>زمان نشان دادن فایل :</span>
                                                    <input required type="text" class="form-control pwt-datepicker-input-element" id="datepickeruser" name="timer">
                                                </div>
                                            </div>

                                            <div class="row m-3">
                                                <div class="col-md-12" style="text-align: center;">
                                                    <button type="submit" class="btn btn-success">مشتری مایل به بازدید از ملک است</button>
                                                </div>
                                            </div>
                                        </form>
                                    @endif

                                    @if($work->etc1 == 2)
                                        <form action="/moshaver/work_flow_file_item" method="POST">
                                            <input type="text" name="step" value="2" id="" hidden>
                                            <input type="text" name="workid" value="{{$work->id}}" id="" hidden>
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    بازدید از ملک 
                                                </div>
                                            </div>  
                                            <div class="row">
                                                <div class="col-md-12">
                                                    آیا ملک رو پسندید ؟
                                                    <select name="like" class="form-control" id="" required>
                                                        <option value=""> انتخاب کنید</option>
                                                        <option value="0">نه</option>
                                                        <option value="1">آره</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="desc">توضیحات :</label>
                                                    <input name="desc" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span>زمان بازدید از ملک :</span>
                                                    <input required type="text" class="form-control pwt-datepicker-input-element" id="datepickeruser" name="timer">
                                                </div>
                                            </div>

                                            <div class="row m-3">
                                                <div class="col-md-12" style="text-align: center;">
                                                    <button type="submit" class="btn btn-success">مشتری مایل به برگذاری جلسه است</button>
                                                </div>
                                            </div>
                                        </form>
                                    @endif

                                    @if($work->etc1 == 3)
                                        <form action="/moshaver/work_flow_file_item" method="POST">
                                            <input type="text" name="step" value="3" id="" hidden>
                                            <input type="text" name="workid" value="{{$work->id}}" id="" hidden>

                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    برگذاری جلسه 
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    آیا جلسه موفقیت آمیز بود ؟
                                                    <select name="like" class="form-control" id="" required>
                                                        <option value=""> انتخاب کنید</option>
                                                        <option value="0">نه</option>
                                                        <option value="1">آره</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="desc">توضیحات :</label>
                                                    <input name="desc" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span>زمان برگذاری جلسه :</span>
                                                    <input required type="text" class="form-control pwt-datepicker-input-element" id="datepickeruser" name="timer">
                                                </div>
                                            </div>

                                            <div class="row m-3">
                                                <div class="col-md-12" style="text-align: center;">
                                                    <button type="submit" class="btn btn-success">مشتری مایل به نوشتن قرارداد است</button>
                                                </div>
                                            </div>
                                        </form>
                                    @endif

                                    @if($work->etc1 == 4)
                                        <form action="/moshaver/work_flow_file_item" method="POST" enctype="multipart/form-data">
                                            <input type="text" name="step" value="4" id="" hidden>
                                            <input type="text" name="workid" value="{{$work->id}}" id="" hidden>

                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    برگذاری جلسه قرارداد 
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    آیا قرار داد نوشته شد ؟
                                                    <select name="like" class="form-control" id="" required>
                                                        <option value=""> انتخاب کنید</option>
                                                        <option value="0">نه</option>
                                                        <option value="1">آره</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="desc">توضیحات :</label>
                                                    <input name="desc" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span>زمان نوشته شدن قرارداد  :</span>
                                                    <input required type="text" class="form-control pwt-datepicker-input-element" id="datepickeruser" name="timer">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span>آپلود عکس قرارداد</span>
                                                    <input type="file" name="picture[]" class="form-control" multiple>
                                                </div>
                                            </div>

                                            <div class="row m-3">
                                                <div class="col-md-12" style="text-align: center;">
                                                    <button type="submit" class="btn btn-success">آرشیو کردن فایل</button>
                                                </div>
                                            </div>
                                        </form>
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