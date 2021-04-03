@extends('page.master')

@section('content')

<div class="row">
    <div class="col-md-12 head_login">

    </div>

</div>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-3">
        <div class="row box_login">
            <div class="box_login_a1"></div>
            <span class="box_login_a2">ورود به بخش کاربری</span>
                <div class="col-md-12" style="margin-top:110px;">
                <form action="/login" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-10">
                            <label for="phone" style="color:white;padding-right:8px">شماره تلفن :</label>
                            <input type="number" name="phone" class="form-control" required autofocus>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-10">
                            <label for="pass" style="color:white;padding-right:8px"> گذرواژه :</label>
                            <input type="text" name="pass" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-5 col-4"></div>
                        <div class="col-md-6 col-8">
                            <div class="row">
                                <button type="submit" class="col-md-6 col-6 btn btn-success pr-4 pl-4">ورود</button><span style="padding: 1px;"></span>
                                <button type="button" class="col-md-5 col-5 btn btn-warning pr-1 pl-1">ثبت نام</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
        </div>
    </div>
    <div class="col-md-5 col_content_login">
        <div class="row content_login">
        </div>
    </div>

</div>
@endsection