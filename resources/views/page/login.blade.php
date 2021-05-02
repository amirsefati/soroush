@extends('page.master')

@section('content')

<div class="row">

    <div class="col-md-6 slider_right">
    
    
    </div>


    <div class="col-md-6 login_left">
        <div class="login_box p-3">
            <div class="login_box_head">
                <p class="login_box_head_p">ورود به دستیار مشاور</p>
                <p class="login_box_head_p">املاک عظیمیان</p>
            </div>
        <form action="/login" method="post">
            @csrf
            <div class="login_box_content">
                <label for="phone">موبایل :</label>
                <input name="phone" type="number" class="form-control" >
                <br>
                <label for="pass">گذرواژه :</label>
                <input name="pass" type="password" class="form-control" >
            </div>
                <br>
            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <button  class="btn_login">ورود</button>
                </div>
            </div>
        </form>
            <hr class="login_box_cutter"/>

            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <p class="btn_forget_pass">
                        <span> 🔒 </span>رمز عبور خود را فراموش کرده اید؟
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection