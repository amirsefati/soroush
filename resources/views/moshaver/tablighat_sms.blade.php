@extends('moshaver.master')
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                ارسال اطلاعات برای پنل تبلیغات
            </div>
            <form action="/moshaver/tablishtsms_data" method="post">
            @csrf
                <input type="text" name="file_id" value="{{$file->id}}" hidden>
                <input type="text" name="images" value="" id="images_tablighat" hidden> 
                <div class="card-body">
                
                    <div class="row mt-3">
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

            </div>
        </div>
    </div>
</div>
<br><br>

@endsection