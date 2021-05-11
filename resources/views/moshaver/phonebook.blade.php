@extends('moshaver.master')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <button class="btn btn-success mt-1" type="button"  data-toggle="modal" data-target="#phonebook"> افزودن کاربر </button>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="جست جو کاربر">

        <table id="myTable">
        <tr class="header">
            <th style="width:40%;">نام</th>
            <th style="width:40%;">شماره تلفن</th>
            <th style="width:20%;">نوع تقاضا</th>

        </tr>
        
        </table>
    
    </div>
</div>
@endsection