@extends('moshaver.master')
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                ارسال اطلاعات برای پنل تبلیغات
            </div>
            <form action="/moshaver/tablisht_data" method="post">
            @csrf
                <input type="text" name="file_id" value="{{$file->id}}" hidden>
                <input type="text" name="images" value="" id="images_tablighat" hidden> 
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p>انتخاب عکس </p>
                            <div class="row">
                                @foreach(json_decode($file->images) as $f)
                                    <div class="col-md-2 mt-3">
                                        <img src="{{$f}}" width="100%" alt="">
                                    </div>
                                @endforeach 
                            </div>
                            
                        </div>
                    </div>
                <br>
                <br>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <textarea name="" class="form-control" rows="10">{{$file->ad_text}}</textarea>
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
                برای افزودن عکس از بخش ویرایش فایل اقدام نمایید.
            </div>
        </div>
    </div>
</div>
<br><br>

@endsection