@extends('moshaver.master')
@section('content')

<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Modal body..
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<div class="row">
    <div class="col-md-4">
        <p style="font-size: 22px;padding:20px;">اقدامات پیش روی</p>
    </div>

    <div class="col-md-8" style="text-align: left;">  
        <span class="new_action_btn" data-toggle="modal" data-target="#action">
            یادآوری جدید
            <img style="filter:invert(80%) sepia(91%) saturate(0) hue-rotate(276deg) brightness(145%) contrast(117%)" src="/img/add-round.svg" alt="">
        </span>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div id="calendar_actoin"></div>
    </div>
</div>


@endsection