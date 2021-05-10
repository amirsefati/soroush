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
                                    <p>{{$u->name}}</p>
                                </div>
                            </div>

                            <div class="row">   
                                <div class="col-md-12">
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
                                        <form action="/moshaver/work_flow_file_item" method="POST">
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