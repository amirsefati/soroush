@extends('moshaver.master')
@section('content')

<input type="text" id="actions" value="{{json_encode($action)}}" style="display: none;">

<div class="row">
    <div class="col-md-4">
        <p style="font-size: 22px;padding:20px;">اقدامات پیش روی</p>
    </div>

    <div class="col-md-8 pl-5" style="text-align: left;">  

        <div class="dropdown">
          <button onclick="myFunction32()" class="new_action_btn dropbtn">یادآوری جدید
          <img style="filter:invert(80%) sepia(91%) saturate(0) hue-rotate(276deg) brightness(145%) contrast(117%)" src="/img/add-round.svg" alt="">

        </button>
          <div id="myDropdown" class="dropdown-content" style="text-align:right;">
            <a data-toggle="modal" data-target="#mm1">بازدید ملک</a>
            <a data-toggle="modal" data-target="#mm2">نشست قرارداد</a>
            <a data-toggle="modal" data-target="#mm3">کارشناسی ملک</a>
            <a data-toggle="modal" data-target="#mm4">یادآوری تماس</a>
            <a data-toggle="modal" data-target="#mm5">سایر یادآوری ها</a>

          </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div id="calendar_actoin"></div>
    </div>
</div>


@endsection