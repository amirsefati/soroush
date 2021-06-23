@extends('moshaver.master')
@section('content')

<input type="text" id="infile_tablighat" value="1" hidden>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                ارسال اطلاعات برای تبلیغ در پنل تبلیغات
            </div>
            <form action="/moshaver/tablisht_data" method="post">
            @csrf
                <input type="text" name="file_id" value="{{$file->id}}" hidden>
                <input type="text" name="images" value="" id="images_tablighat" hidden> 
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>انتخاب عکس: </h5>
                            <div class="row">
                                @if(json_decode($file->images))
                                    @foreach(json_decode($file->images) as $f)
                                        <div class="col-md-2 mt-3">
                                            <img src="{{$f}}" width="100%" alt="">
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-md-12" style="text-align: center;">
                                        <p>هیج عکسی وارد این فایل نشده است؛ لطفا از بخش ارسال عکس فایل اقدام نمایید.</p>
                                    </div>
                                @endif 
                            </div>
                            
                        </div>
                    </div>
                <br>
                <hr>
                <br>
                    <div class="row mt-3">
                        <h5 class="mr-3">متن آگهی: </h5>
                        <div class="col-md-12">
                            <textarea class="form-control" name="ad_text" rows="10">{{$file->ad_text}}</textarea>
                        </div>
                    </div>
                <br>
                <br>
                    <div class="row">
                        <div class="col-md-12" style="text-align: center;">
                            <button class="btn btn-success pl-5 pr-5">ارسال تبلیغات</button>
                        </div>
                    </div>
                    
                </div>
            </form>
            <div class="card-footer">
                برای افزودن عکس از بخش "ویرایش فایل" اقدام نمایید.
            </div>
        </div>
    </div>
</div>
<br><br>

@endsection