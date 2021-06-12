@extends('modir.master')
@section('content')

<form action="/modir/add_monshi_post" method="POST">

    @csrf

    <div class="card">
        <img class="card-img-top" src="holder.js/100x180/" alt="">
        <div class="card-body">
    
            <h5 style="text-align: right">مشخصات اولیه:</h5>
    
            <div class="row">
                <br>
                <div class="col-md-4">
                    <input type="text" placeholder="نام" class="form-control" name="name">
                </div>
                <div class="col-md-4">
                    <input type="text" placeholder="شماره تلفن" class="form-control" name="phone">
                </div>
                <div class="col-md-4">
                    <input type="text" placeholder="گذرواژه" class="form-control" name="password">
                </div>
                
            </div>
    
            <br>
            <hr>
            <br>
    
            <h5 style="text-align: right">مشخص کردن رنج منشی:</h5>
            
            <br>
    
            <div class="row">
                <div class="col-md-2">
                    <label for="seller">
                        <input type="checkbox" id="seller" name="seller">
                        فروش کار
                    </label>
                </div>
    
                <div class="col-md-2">
                    <label for="renter">
                        <input type="checkbox" id="renter" name="renter">
                        اجاره کار
                    </label>
                </div>
    
                <div class="col-md-2">
                    <label for="kolangi">
                        <input type="checkbox" id="kolangi" name="kolangi">
                        کلنگی کار
                    </label>
                </div>
    
                <div class="col-md-2">
                    <label for="tejari">
                        <input type="checkbox" id="tejari" name="tejari">
                        تجاری کار
                    </label>
                </div>
    
                <div class="col-md-2">
                    <label for="mostaghelat">
                        <input type="checkbox" id="mostaghelat" name="mostaghelat">
                        ویلا و مستغلات
                    </label>
                </div>
    
                <br>
                <br>
                <br>
    
            </div>
                
                <div class="row">
                    <div class="col-md-4">
                        <label for="space">متراژ کاری: </label>
                        <select class="multiselectfiles" name="space[]" multiple="multiple" style="width:100%">
                            <option value="1">زیر 200 متر</option>
                            <option value="2">بین 200 تا 350 متر</option>
                            <option value="3">بیش از 350 متر</option>
                        </select>
                    </div>
                </div>
    
                <div class="row" style="text-align: left">
                    <div class="col-md-12">
                        <button class="btn btn-success">افزودن مشاور</button>
                    </div>
                </div>
    
    
        </div>
    </div>
</form>

@endsection