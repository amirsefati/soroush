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
            <br>
    
            <div class="row" style="text-align: left">
                <div class="col-md-12">
                    <button class="btn btn-success">افزودن منشی</button>
                </div>
            </div>
    
    
        </div>
    </div>
</form>

@endsection