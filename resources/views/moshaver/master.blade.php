<!doctype html>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>داشبورد مشاور</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="داشبورد مشاور برنامه">
    <meta name="csrf-token" content="{{ Session::token() }}"> 

    <link rel="stylesheet" href="{{asset('dashboard/main.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/rtl.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/moshaver.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/persian-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('action/main.min.css')}}">
    <link href="https://releases.transloadit.com/uppy/v1.28.1/uppy.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('map/mapp.min.css')}}">
    <link rel="stylesheet" href="{{asset('map/fa/style.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
</head>
<body id="bbody">
<div style="display: none;">
{{
    $fs = App\Models\File::where('userid_moshaver',Auth::user()->id)->get()
}}
{{
    $us = App\Models\User::where('userid_inter',Auth::user()->id)->get()
}}
</div>

<div class="modal pt-5" id="change_phone_number_modal">
    <div class="modal-dialog">
      <div class="modal-content">
         
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
  
          <h5 class="modal-title">تغییر شماره تماس</h5>
        </div>

        <form action="/moshaver/change_phone_number" method="POST">
            @csrf
            <!-- Modal body -->
            <div class="modal-body" style="direction:rtl;font-family:sefati;text-align:right">

                <input type="text" name="change_phone_number_moshaver_id" id="change_phone_number_moshaver_id" value={{Auth::user()->id}} hidden>

                <div class="col-md-12">
                    <label for="change_phone_number_existing_number">شماره تماس کنونی:</label>
                    <input type="text" id="change_phone_number_existing_number" class="form-control" name="change_phone_number_existing_number" value={{Auth::user()->phone}} disabled>
                </div>
                <br>

                <div class="col-md-12">
                    <label for="change_phone_number_new_number">شماره تماس جدید:</label>
                    <input type="text" id="change_phone_number_new_number" class="form-control" name="change_phone_number_new_number">
                </div>
                <hr>

                <div class="row mt-4">
                    <div class="col-md-12" style="text-align:center">
                        <button class="btn btn-success pr-5 pl-5"> ارسال</button>
                    </div>
                </div>         
            </div>
        </form>
        <!-- Modal footer -->
        <div class="modal-footer">
  
        </div>
      </div>
    </div>
</div>

<div class="modal pt-5" id="change_password_modal">
    <div class="modal-dialog">
      <div class="modal-content">
         
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
  
          <h5 class="modal-title">تغییر گذرواژه</h5>
        </div>

        <form action="/moshaver/change_password" method="POST">
            @csrf
            <!-- Modal body -->
            <div class="modal-body" style="direction:rtl;font-family:sefati;text-align:right">

                <input type="text" name="change_password_moshaver_id" id="change_password_moshaver_id" value={{Auth::user()->id}} hidden>

                <div class="col-md-12">
                    <label for="change_password_existing_pass">گذرواژه کنونی:</label>
                    <input type="text" id="change_password_existing_pass" class="form-control" name="change_password_existing_pass" value={{Auth::user()->password}} disabled>
                </div>
                <br>

                <div class="col-md-12">
                    <label for="change_password_new_pass">گذرواژه جدید:</label>
                    <input type="text" id="change_password_new_pass" class="form-control" name="change_password_new_pass">
                </div>
                <hr>

                <div class="row mt-4">
                    <div class="col-md-12" style="text-align:center">
                        <button class="btn btn-success pr-5 pl-5"> ارسال</button>
                    </div>
                </div>         
            </div>
        </form>
        <!-- Modal footer -->
        <div class="modal-footer">
  
        </div>
      </div>
    </div>
</div>


<div class="modal pt-5" id="coop_from_file_modal">
    <div class="modal-dialog">
      <div class="modal-content">
         
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
  
          <h5 class="modal-title">ثبت درخواست تعاون</h5>
        </div>

        <form action="/moshaver/calltaavon_from_file" method="POST">
            @csrf
            <!-- Modal body -->
            <div class="modal-body" style="direction:rtl;font-family:sefati;text-align:right">

                <input id="taavon_from_file_my_id" name="taavon_from_file_my_id" hidden>
                <input id="taavon_from_file_clinet_id" name="taavon_from_file_clinet_id" hidden>

                <div class="col-md-12">
                    <input id="taavon_from_file_other_moshaver_id" name="taavon_from_file_other_moshaver_id" hidden>
                    <label for="taavon_from_file_other_moshaver">نام مشاور دیگر:</label>
                    <input type="text" id="taavon_from_file_other_moshaver" class="form-control" name="taavon_from_file_other_moshaver" disabled>
                </div>
                <br>

                <div class="col-md-12">
                    <input id="taavon_from_file_file_id" name="taavon_from_file_file_id" hidden>
                    <label for="taavon_from_file_file_name">نام فایل شما:</label>
                    <input type="text" id="taavon_from_file_file_name" class="form-control" name="taavon_from_file_file_name" disabled>
                </div>
                <hr>

                <div class="col-md-12">
                    <label for="taavon_from_file_taavon_percentage">درصد پیشنهادی برای خودم: </label>
                    <input type="number" id="taavon_from_file_taavon_percentage" class="form-control" name="taavon_from_file_taavon_percentage">
                </div>
                <br>

                <div class="col-md-12">
                    <label for="taavon_from_file_call_taavon_desc">توضیحات: </label>
                    <textarea rows="4" id="taavon_from_file_call_taavon_desc" class="form-control" name="taavon_from_file_call_taavon_desc"></textarea>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12" style="text-align:center">
                        <button class="btn btn-success pr-5 pl-5"> ارسال</button>
                    </div>
                </div>         
            </div>
        </form>
        <!-- Modal footer -->
        <div class="modal-footer">
  
        </div>
      </div>
    </div>
</div>

<div class="modal pt-5" id="coop_from_user_modal">
    <div class="modal-dialog">
      <div class="modal-content">
         
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
  
          <h5 class="modal-title">ثبت درخواست تعاون</h5>
        </div>

        <form action="/moshaver/calltaavon_from_user" method="POST">
            @csrf
            <!-- Modal body -->
            <div class="modal-body" style="direction:rtl;font-family:sefati;text-align:right">

                <input id="taavon_from_user_my_id" name="taavon_from_user_my_id" hidden>
                <input id="taavon_from_user_file_id" name="taavon_from_user_file_id" hidden>

                <div class="col-md-12">
                    <input id="taavon_from_user_other_moshaver_id" name="taavon_from_user_other_moshaver_id" hidden>
                    <label for="taavon_from_user_other_moshaver">نام مشاور دیگر:</label>
                    <input type="text" id="taavon_from_user_other_moshaver" class="form-control" name="other_moshaver" disabled>
                </div>
                <br>

                <div class="col-md-12">
                    <input id="taavon_from_user_client_id" name="taavon_from_user_client_id" hidden>
                    <label for="taavon_from_user_client_name">نام مشتری شما:</label>
                    <input type="text" id="taavon_from_user_client_name" class="form-control" name="taavon_from_user_client_name" disabled>
                </div>
                <hr>

                <div class="col-md-12">
                    <label for="taavon_from_user_taavon_percentage">درصد پیشنهادی برای خودم: </label>
                    <input type="number" id="taavon_from_user_taavon_percentage" class="form-control" name="taavon_from_user_taavon_percentage">
                </div>
                <br>

                <div class="col-md-12">
                    <label for="taavon_from_user_call_taavon_desc">توضیحات: </label>
                    <textarea rows="4" id="taavon_from_user_call_taavon_desc" class="form-control" name="taavon_from_user_call_taavon_desc"></textarea>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12" style="text-align:center">
                        <button class="btn btn-success pr-5 pl-5"> ارسال</button>
                    </div>
                </div>         
            </div>
        </form>
        <!-- Modal footer -->
        <div class="modal-footer">
  
        </div>
      </div>
    </div>
</div>

<div class="modal pt-5" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h5 class="modal-title">ثبت نام کاربر جدید</h5>
      </div>
      <!-- Modal body -->
      <div class="modal-body" style="direction: rtl;">
        <div class="row">

            <div class="col-6">
                <label for="name"> نام کاربر :</label>
                <input id="name_digest" type="text" class="form-control" required>
            </div>

            <div class="col-6">
                <label for="name">  شماره تلفن :</label>
                <input id="phone_digest" type="text" class="form-control" required>
            </div>
            
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <select class="form-control" id="label" id="">
                    <option value="مالک">مالک</option>
                    <option value="نگهبان">نگهبان</option>
                    <option value="سازنده">سازنده</option>
                    <option value="مدیرفروش">مدیرفروش</option>

                </select>
            </div>

        </div>
        <div class="row mt-5">
            <div class="col-md-12" style="text-align:center">
                <button type="button" id="send_digest" class="btn btn-success pr-5 pl-5"> ارسال</button>
            </div>
        </div>
        
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
      </div>
    </div>
  </div>
</div>

<div class="modal pt-5" id="phonebook">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h5 class="modal-title">ثبت نام کاربر جدید</h5>
      </div>
    <form action="/moshaver/phonebook" method="POST">
    @csrf
      <!-- Modal body -->
      <div class="modal-body" style="direction: rtl;">
        <div class="row">

            <div class="col-6">
                <label for="name"> نام کاربر :</label>
                <input name="name" type="text" class="form-control" required>
            </div>

            <div class="col-6">
                <label for="name">  شماره تلفن :</label>
                <input name="phone" type="text" class="form-control" required>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="">نوع تقاضا : </label>
                <select name="kind" class="form-control" id="">
                    <option value="">انتخاب کنید....</option>
                    <option value="1">خریدار</option>
                    <option value="2">فروشنده</option>
                    <option value="3">مستاجر</option>
                    <option value="4">موجر</option>

                </select>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12" style="text-align:center">
                <button class="btn btn-success pr-5 pl-5"> ارسال</button>
            </div>
        </div>
        
      </div>
    </form>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
      </div>
    </div>
  </div>
</div>  


<div class="modal pt-5" id="mm1">
  <div class="modal-dialog">
    <div class="modal-content">
       
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h5 class="modal-title">بازدید ملک</h5>
      </div>
    <form action="/moshaver/reminder_visitfile" method="POST">
    @csrf
      <!-- Modal body -->
      <div class="modal-body" style="direction:rtl;font-family:sefati">
        <div class="row">
            <div class="col-md-12">
                <span>انتخاب فایل :</span>
                <select name="file_id" class="form-control" id="" required>
                    <option value="">انتخاب کنید...</option>
                    @foreach($fs as $f)
                        <option value="{{$f->id}}">{{$f->type}} {{$f->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
                <div class="col-md-12">
                    <span>انتخاب مشتری :</span>
                    <select name="client_id" class="form-control" id="" required>
                        <option value="">انتخاب کنید...</option>
                        @foreach($us as $u)
                            <option value="{{$u->id}}">{{$u->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        <div class="row">
            <div class="col-md-12">
                <span>تاریخ :</span>
                <input type="text" class="form-control" id="datepickeruser" name="timer" required/>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <span>ساعت :</span>
                <input type="text" class="form-control" id="timepickeruser" name="hour" required/>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <span>توضیحات :</span>
                <textarea name="desc" class="form-control" rows="4"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12" style="text-align: center;">
                <button class="btn btn-success">ثبت یادآوری</button>
            </div>
        </div>
      </div>
    </form>
      <!-- Modal footer -->
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

<div class="modal pt-5" id="mm2">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h5 class="modal-title">نشست قرارداد</h5>
      </div>
        <form action="/moshaver/reminder_session" method="POST">
        @csrf
        <!-- Modal body -->
        <div class="modal-body" style="direction:rtl;font-family:sefati">
            <div class="row">
                <div class="col-md-12">
                    <span>انتخاب فایل :</span>
                    <select name="file_id" class="form-control" id="" required>
                        <option value="">انتخاب کنید...</option>
                        @foreach($fs as $f)
                            <option value="{{$f->id}}">{{$f->type}} {{$f->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <span>انتخاب مشتری :</span>
                    <select name="client_id" class="form-control" id="" required>
                        <option value="">انتخاب کنید...</option>
                        @foreach($us as $u)
                            <option value="{{$u->id}}">{{$u->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <span>تاریخ :</span>
                    <input type="text" class="form-control" id="datepickeruser2" name="timer" required/>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <span>ساعت :</span>
                    <input type="text" class="form-control" id="timepickeruser2" name="hour" required/>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <span>توضیحات :</span>
                    <textarea name="desc" class="form-control" rows="4"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <button class="btn btn-success">ثبت یادآوری</button>
                </div>
            </div>
        </div>
        </form>
      <!-- Modal footer -->
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

<div class="modal pt-5" id="mm3">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h5 class="modal-title">کارشناسی ملک</h5>
      </div>
        <form action="/moshaver/reminder_assets" method="POST">
        @csrf
        <!-- Modal body -->
        <div class="modal-body" style="direction:rtl;font-family:sefati">
            <div class="row">
                <div class="col-md-12">
                    <span>انتخاب فایل :</span>
                    <select name="file_id" class="form-control" id="" required>
                        <option value="">انتخاب کنید...</option>
                        @foreach($fs as $f)
                            <option value="{{$f->id}}">{{$f->type}} {{$f->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <span>تاریخ :</span>
                    <input type="text" class="form-control" id="datepickeruser3" name="timer" required/>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <span>ساعت :</span>
                    <input type="text" class="form-control" id="timepickeruser3" name="hour" required/>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <span>توضیحات :</span>
                    <textarea name="desc" class="form-control" rows="4"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <button class="btn btn-success">ثبت یادآوری</button>
                </div>
            </div>
        </div>
        </form>
      <!-- Modal footer -->
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

<div class="modal pt-5" id="mm4">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h5 class="modal-title">یادآوری تماس</h5>
      </div>
        <form action="/moshaver/reminder_call" method="POST">
        @csrf
        <!-- Modal body -->
        <div class="modal-body" style="direction:rtl;font-family:sefati">
            
            <div class="row">
                <div class="col-md-12">
                    <span>انتخاب مشتری :</span>
                    <select name="client_id" class="form-control" id="" required>
                        <option value="">انتخاب کنید...</option>
                        @foreach($us as $u)
                            <option value="{{$u->id}}">{{$u->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <span>تاریخ :</span>
                    <input type="text" class="form-control" id="datepickeruser4" name="timer" required/>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <span>ساعت :</span>
                    <input type="text" class="form-control" id="timepickeruser4" name="hour" required/>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <span>توضیحات :</span>
                    <textarea name="desc" class="form-control" rows="4"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <button class="btn btn-success">ثبت یادآوری</button>
                </div>
            </div>
        </div>
        </form>
      <!-- Modal footer -->
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

<div class="modal pt-5" id="mm5">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h5 class="modal-title">سایر یادآوری ها</h5>
      </div>
        <form action="/moshaver/reminder_etc" method="POST">
        @csrf
        <!-- Modal body -->
        <div class="modal-body" style="direction:rtl;font-family:sefati">
            
            <div class="row">
                <div class="col-md-12">
                    <span> عنوان :</span>
                    <input type="text" class="form-control" name="title">
                </div>
            </div>
            

            <div class="row">
                <div class="col-md-12">
                    <span>انتخاب فایل :</span>
                    <select name="file_id" class="form-control" id="">
                        <option value="">انتخاب کنید...</option>
                        @foreach($fs as $f)
                            <option value="{{$f->id}}">{{$f->type}} {{$f->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <span>انتخاب مشتری :</span>
                    <select name="client_id" class="form-control" id="">
                        <option value="">انتخاب کنید...</option>
                        @foreach($us as $u)
                            <option value="{{$u->id}}">{{$u->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <span>تاریخ :</span>
                    <input type="text" class="form-control" id="datepickeruser5" name="timer" required/>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <span>ساعت :</span>
                    <input type="text" class="form-control" id="timepickeruser5" name="hour" required/>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <span>توضیحات :</span>
                    <textarea name="desc" class="form-control" rows="4"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <button class="btn btn-success">ثبت یادآوری</button>
                </div>
            </div>
        </div>
        </form>
      <!-- Modal footer -->
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

<div id="show_details" class="modal_details">

  <!-- Modal content -->
  <div class="modal_details-content">
    <div class="row">
    <span class="close2" id="close2">&times;</span>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <p>مشتری : <span id="client_action"></span></p>
                    </div>
                </div>
            </div>
    </div>
    <p>کاربر : <span id="file_action"></span></p>
    <p>متن : <span id="text_action"></span></p>
    <p>عنوان : <span id="title_action"></span></p>

  </div>

</div>

<div class="modal pt-5" id="archived_file">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h5 class="modal-title">تأیید آرشیو فایل</h5>
      </div>
        @csrf
        <!-- Modal body -->
        <form action="/moshaver/archived_file_selected" method="POST">
            @csrf
            <input type="text" name="archive_desc_file_id" id="archive_desc_file_id" value="" hidden>
            <div class="modal-body" style="direction:rtl;font-family:sefati;text-align:right">
                .اگر از آرشیو کردن این فایل مطمئن هستید؛ لطفا دلیل آرشیو کردن را ذکر کنید
            
            </div>
            <div class="row p-3">
                <div class="col-md-12">
                    <textarea name="archive_desc" class="form-control" id="" cols="30" rows="10"></textarea>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" data-dismiss="modal" class="btn btn-warning">لغو</button>
                        <button type="submit" class="btn btn-success pr-5 pl-5">آرشیو کردن</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>


<div class="modal pt-5" id="show_map">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
       
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h5 class="modal-title"> تایید موقعیت محل</h5>
      </div>
      <div id="mapid"></div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button class="btn btn-success" data-dismiss="modal">تایید موقعیت</button>
      </div>
    </div>
  </div>
</div>

<div class="modal pt-5" id="details_chart">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
       
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h5 class="modal-title"> جزئیات گزارش</h5>
      </div>

        <div id="details_chart_accordion" style="direction: rtl;">
            
            
            </div>
        <!-- Modal footer -->
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

<div class="modal_details" id="dash_action_details" >

    <!-- Modal content -->
    <div class="modal_details-content">
      <span class="close2" id="close3">&times;</span>
      <p>عنوان : <span id="details_title_action"></span></p>
      <p>مشتری : <span id="details_client_action"></span></p>
      <p>صاحب فایل : <span id="details_file_action"></span></p>
      <p>زمان : <span id="details_date_action"></span></p>
      <p>توضیحات : <span id="details_text_action"></span></p>
      
  
    </div>
  
</div>


<div class="modal pt-5" id="phone_add_file_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h5 class="modal-title"> ثبت شماره </h5>
      </div>
      <!-- Modal body -->

      <div class="modal-body" style="direction: rtl;">
        <div class="row">
            <div class="col-md-12">
                <label for="">انتخاب کاربر</label>
                <select name="" id="select_phone_add_file_modal" class="form-control">
                    @foreach($us as $u)
                        @if($u->label != 'مالک')
                        <option value="{{$u->id}}-{{$u->name}}-({{$u->label}})">{{$u->name}} ({{$u->label}})</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12" style="text-align: left;">
                <button class="btn btn-warning" id="add_phone_add_file_modal">افزودن</button>
            </div>
        </div>
        
      </div>


      <div class="modal-body" style="direction: rtl;">
        <div class="row">

            <div class="col-6">
                <label for="name"> نام کاربر :</label>
                <input id="name_digest" type="text" class="form-control" required>
            </div>

            <div class="col-6">
                <label for="name">  شماره تلفن :</label>
                <input id="phone_digest" type="text" class="form-control" required>
            </div>
            
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <select class="form-control" name="label" name="" id="">
                    <option value="مالک">مالک</option>
                    <option value="نگهبان">نگهبان</option>
                    <option value="سازنده">سازنده</option>
                    <option value="مدیرفروش">مدیرفروش</option>

                </select>
            </div>

        </div>
        <div class="row mt-5">
            <div class="col-md-12" style="text-align:center">
                <button type="button" id="send_digest" class="btn btn-success pr-5 pl-5"> ارسال</button>
            </div>
        </div>
        
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
      </div>
    </div>
  </div>
</div>

<div class="modal pt-5" id="archived_user">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
  
          <h5 class="modal-title">تأیید آرشیو مشتری</h5>
        </div>
          @csrf
          <!-- Modal body -->
          <form action="/moshaver/archived_user_selected" method="POST">
              @csrf
              <input type="text" name="archive_desc_user_id" id="archive_desc_user_id" value="" hidden>
              <div class="modal-body" style="direction:rtl;font-family:sefati;text-align:right">
                  .اگر از آرشیو کردن این کاربر مطمئن هستید؛ لطفا دلیل آرشیو کردن را ذکر کنید
              
              </div>
              <div class="row p-3">
                  <div class="col-md-12">
                      <textarea name="user_archive_desc" class="form-control" id="" cols="30" rows="10"></textarea>
                  </div>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer">
                  <div class="row">
                      <div class="col-md-12">
                          <button type="button" data-dismiss="modal" class="btn btn-warning">لغو</button>
                          <button type="submit" class="btn btn-success pr-5 pl-5">آرشیو کردن</button>
                      </div>
                  </div>
              </div>
          </form>
      </div>
    </div>
</div>



<div class="modal pt-5" id="work_flow_user_step1">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
  
          <h5 class="modal-title">نشان دادن فایل</h5>
        </div>
          
        <div class="modal-body drr">
            <form action="/moshaver/work_flow_file_item" method="POST">
                                            <input type="text" name="step" value="1" hidden>
                                            <input type="text" name="workid" id="workidst1" value="" hidden>

                                            @csrf
                                            
                                            <div class="row mt-1">
                                                <div class="col-md-12">
                                                    آیا فایل رو پسندید ؟
                                                    <select name="like" class="form-control" id="" required>
                                                        <option value=""> انتخاب کنید</option>
                                                        <option value="0">نه</option>
                                                        <option value="1">آره</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-md-12">
                                                    <label for="desc">توضیحات :</label>
                                                    <input name="desc" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span>زمان نشان دادن فایل :</span>
                                                    <input required type="text" class="form-control pwt-datepicker-input-element" id="datepickeruser" name="timer">
                                                </div>
                                            </div>

                                            <div class="row m-3">
                                                <div class="col-md-12" style="text-align: center;">
                                                    <button type="submit" class="btn btn-success">مشتری مایل به بازدید از ملک است</button>
                                                </div>
                                            </div>
                </form>
        </div>
      </div>
    </div>
</div>


<div class="modal pt-5" id="work_flow_user_step2">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
  
          <h5 class="modal-title">بازدید از ملک</h5>
        </div>
          
        <div class="modal-body drr">
        <form action="/moshaver/work_flow_file_item" method="POST">
                                            <input type="text" name="step" value="2" id="" hidden>
                                            <input type="text" name="workid" id="workidst2" id="" hidden>

                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    برگذاری جلسه 
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    آیا جلسه موفقیت آمیز بود ؟
                                                    <select name="like" class="form-control" id="" required>
                                                        <option value=""> انتخاب کنید</option>
                                                        <option value="0">نه</option>
                                                        <option value="1">آره</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="desc">توضیحات :</label>
                                                    <input name="desc" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span>زمان برگذاری جلسه :</span>
                                                    <input required type="text" class="form-control pwt-datepicker-input-element" id="datepickeruser" name="timer">
                                                </div>
                                            </div>

                                            <div class="row m-3">
                                                <div class="col-md-12" style="text-align: center;">
                                                    <button type="submit" class="btn btn-success">مشتری مایل به نوشتن قرارداد است</button>
                                                </div>
                                            </div>
                                        </form>
        </div>
      </div>
    </div>
</div>


<div class="modal pt-5" id="work_flow_user_step3">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
  
          <h5 class="modal-title">برگذاری جلسه</h5>
        </div>
          
        <div class="modal-body drr">
        <form action="/moshaver/work_flow_file_item" method="POST">
                                            <input type="text" name="step" value="3" id="" hidden>
                                            <input type="text" name="workid" id="workidst3" hidden>

                                            @csrf
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    آیا جلسه موفقیت آمیز بود ؟
                                                    <select name="like" class="form-control" id="" required>
                                                        <option value=""> انتخاب کنید</option>
                                                        <option value="0">نه</option>
                                                        <option value="1">آره</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="desc">توضیحات :</label>
                                                    <input name="desc" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span>زمان برگذاری جلسه :</span>
                                                    <input required type="text" class="form-control pwt-datepicker-input-element" id="datepickeruser" name="timer">
                                                </div>
                                            </div>

                                            <div class="row m-3">
                                                <div class="col-md-12" style="text-align: center;">
                                                    <button type="submit" class="btn btn-success">مشتری مایل به نوشتن قرارداد است</button>
                                                </div>
                                            </div>
                                        </form>
        </div>
      </div>
    </div>
</div>


<div class="modal pt-5" id="work_flow_user_step4">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
  
          <h5 class="modal-title">بستن قرارداد</h5>
        </div>
          
        <div class="modal-body drr">
        <form action="/moshaver/work_flow_file_item" method="POST" enctype="multipart/form-data">
                                            <input type="text" name="step" value="4" id="" hidden>
                                            <input type="text" name="workid" id="workidst4" hidden>

                                            @csrf
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    آیا قرار داد نوشته شد ؟
                                                    <select name="like" class="form-control" id="" required>
                                                        <option value=""> انتخاب کنید</option>
                                                        <option value="0">نه</option>
                                                        <option value="1">آره</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="desc">توضیحات :</label>
                                                    <input name="desc" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span>زمان نوشته شدن قرارداد  :</span>
                                                    <input required type="text" class="form-control pwt-datepicker-input-element" id="datepickeruser" name="timer">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span>آپلود عکس قرارداد</span>
                                                    <input type="file" name="picture[]" class="form-control" multiple>
                                                </div>
                                            </div>

                                            <div class="row m-3">
                                                <div class="col-md-12" style="text-align: center;">
                                                    <button type="submit" class="btn btn-success">آرشیو کردن فایل</button>
                                                </div>
                                            </div>
                                        </form>
        </div>
      </div>
    </div>
</div>


    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                        
                    </div>
                    <ul class="header-menu nav">
                        <li class="nav-item">
                            <a href="/logoutpanel" class="nav-link">
                                <i class="nav-link-icon fa fa-database"> </i>
                                 خروج از پنل
                            </a>
                        </li>
                        
                        <li class="dropdown nav-item">

                            <div class="dropdown show">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    تنظیمات
                                </a>
                              
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                  <a class="dropdown-item" data-toggle="modal" data-target="#change_phone_number_modal">تغییر شماره تماس</a>
                                  <a class="dropdown-item" data-toggle="modal" data-target="#change_password_modal">تغییر گذرواژه</a>
                                </div>
                              </div>
                        </li>

                        
                        
                    </ul>        </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        {{Auth::user()->name}}
                                    </div>
                                    <div class="widget-subheading">
                                        رتبه {{Auth::user()->rank}}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>        </div>
            </div>
        </div>        <div class="ui-theme-settings">
          
        </div>        <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading"></li>

                                <li>
                                    <a href="/moshaver" class="">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        داشبورد
                                    </a>
                                </li> 

                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-diamond"></i>
                                        فایل ها
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="/moshaver/manage_files">
                                                <i class="metismenu-icon"></i>
                                                فایل‌های موجود
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/moshaver/archived_files">
                                                <i class="metismenu-icon">
                                                </i>
                                                فایل‌های آرشیو شده
                                            </a>
                                        </li>

                                        <li>
                                            <a href="/moshaver/files_on_map">
                                                <i class="metismenu-icon">
                                                </i>
                                                فایل‌ها بر روی نقشه
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>
                                
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-diamond"></i>
                                        مشتری ها
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="/moshaver/listusers">
                                                <i class="metismenu-icon"></i>
                                                مشتری‌های موجود
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/moshaver/archived_users">
                                                <i class="metismenu-icon">
                                                </i>
                                                مشتری‌های آرشیو شده
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>

                                <li>
                                    <a href="/moshaver/taavon" class="">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        تعاون
                                        @if(App\Models\Taavon::where('taavon_id',Auth::user()->id)->where('verify',0)->count() > 0) 
                                            <span class="badge badge-pill badge-success">{{App\Models\Taavon::where('taavon_id',Auth::user()->id)->where('verify',0)->count()}}</span>
                                        @endif

                                    </a>
                                </li>

                                <li>
                                    <a href="/moshaver/action" class="">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        اقدامات پیش رو
                                    </a>
                                </li>


                                <li>
                                    <a href="" class="">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        اعلامیه
                                    </a>
                                </li>

                                
                                <li>
                                    <a href="/moshaver/phonebook" class="">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        دفترچه تلفن
                                    </a>
                                </li>
                        

                               

                            </ul>
                        </div>
                    </div>
                </div>    <div class="app-main__outer">
                    <div class="app-main__inner">
                                @yield('content')
                       </div>
        </div>            
    </div>

<script>
    function archived_file(){

        $("#archive_desc_file_id").val($("#archied_fileinfo_id").val())
    }

    
    function archived_user(){

        $("#archive_desc_user_id").val($("#archied_userinfo_id").val())
    }

</script>

<script type="text/javascript" src="{{asset('dashboard/scripts/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/scripts/main.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/scripts/rtl.js')}}"></script>
<script src="https://cdn.jsdelivr.net/gh/mahmoud-eskandari/NumToPersian/dist/num2persian-min.js"></script>
<script type="text/javascript" src="{{asset('js/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/i18n/fa.js')}}"></script>
<script type="text/javascript" src="{{asset('js/persian-date.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/persian-datepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('action/main.min.js')}}"></script>
<script type="text/javascript" src="{{asset('action/fa.js')}}"></script>
<script type="text/javascript" src="{{asset('action/script.js')}}"></script>
<script src="{{asset('js/uppy.min.js')}}"></script>
<script src="{{asset('js/fa_IR.min.js')}}"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin=""></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>

    function workflowuserclicked(id){
        $("#workidst1").val(id)
    }

    function workflowuserclicked2(id){
        $("#workidst2").val(id)
    }
    function workflowuserclicked3(id){
        $("#workidst3").val(id)
    }
    function workflowuserclicked4(id){
        $("#workidst4").val(id)
    }

    function coop_from_user_modal(my_id, other_id, client_id, file_id){
        $.get('/moshaver/getdata_fromuser/'+ other_id)
        .then((user)=>{
            $('#taavon_from_user_other_moshaver').val(user.name)
            $('#taavon_from_user_other_moshaver_id').val(user.id)
        })

        $.get('/moshaver/getdata_fromuser/'+client_id)
        .then((user2)=>{
            $('#taavon_from_user_client_name').val(user2.name)
            $('#taavon_from_user_client_id').val(user2.id)
        })

        $("#taavon_from_user_my_id").val(my_id)
        $("#taavon_from_user_file_id").val(file_id)

    }

    function coop_from_file_modal(my_id, other_id, client_id, file_id){
        $.get('/moshaver/getdata_fromuser/'+ other_id)
        .then((user)=>{
            $('#taavon_from_file_other_moshaver').val(user.name)
            $('#taavon_from_file_other_moshaver_id').val(user.id)
        })

        $.get('/moshaver/getdata_fromfile/'+ file_id)
        .then((file)=>{
            $('#taavon_from_file_file_name').val(file.name)
            $('#taavon_from_file_file_id').val(file.id)
        })

        $("#taavon_from_file_my_id").val(my_id)
        $("#taavon_from_file_clinet_id").val(client_id)

    }

    $("#add_phone_add_file_modal").click(function(){
        $("#no_in_phone_add_file_modal").remove()
        $("#phone_add_file").append(`
            <span class="iteminselect_phone">
            ${$("#select_phone_add_file_modal").val()}
            </span>
        `)
        
    })

    $(".price_comma").each(function(){
        $(this).text(numberWithCommas($(this).text()))
    })

    if($("#price").val()){
        $("#price").val(numberWithCommas($("#price").val()))
    }
    
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    }

    function manage_file_filter_pin(){
        $(".nopined").each(function(){
            $(this).parent().parent().parent().parent().parent().parent().hide()
        })
    }

    var keyword_filter = null
    function manage_file_filter(keyword){
        keyword_filter = keyword
        console.log(keyword)
        $(".badge_kind_file").each(function(){
            $(this).parent().parent().parent().parent().parent().show()

            if($(this).text() != keyword && keyword != 'همه'){
                $(this).parent().parent().parent().parent().parent().hide()
            }
           
        })
    }

    
    function filter_input_files(){
        manage_file_filter(keyword_filter)

            
        //search bedroom number
        if($("#bednumber_filterinput").val() > 0){

            $(".bednumber_filter").each(function(){
                if($(this).text() != $("#bednumber_filterinput").val()){
                    $(this).parent().parent().parent().parent().parent().hide()
                }
                if(!$(this).text()){
                    $(this).parent().parent().parent().parent().parent().hide()
                }
            })

        }
        if(!$("#bednumber_filterinput").val()){
            $(".bednumber_filter").each(function(){
                $(this).parent().parent().parent().parent().parent().show()
            })
        }

        
        //search min area
        if($("#minarea_filterinput").val() > 0){

            $(".area_filter").each(function(){

                if($(this).text() < $("#minarea_filterinput").val()){
                    $(this).parent().parent().parent().parent().parent().parent().parent().hide()
                }
                if(!$(this).text()){
                    $(this).parent().parent().parent().parent().parent().parent().parent().hide()
                }
            })

            //search max area
            if($("#maxarea_filterinput").val() > 0){

                $(".area_filter").each(function(){

                    if($(this).text() > $("#maxarea_filterinput").val()){
                        $(this).parent().parent().parent().parent().parent().parent().parent().hide()
                    }
                    if(!$(this).text()){
                        $(this).parent().parent().parent().parent().parent().parent().parent().hide()
                    }
                })

        }
        manage_file_filter(keyword_filter)

    }
    

}
    if($("#infile_tablighat").val()){
        alert('ok')
        $("img").click(function(){
            var selectecimg = []
            $(this).toggleClass("hoverimg_selected");
                $(".hoverimg_selected").each(function(){
                selectecimg.push($(this).attr('src'))
            })
            $("#images_tablighat").val(JSON.stringify(selectecimg))
        })  
    }


</script>


<script>
    function calling_client(userid_client){
        $.get('/moshaver/calling_client/' + userid_client)

    }

    function calling_file(id_file){
        $.get('/moshaver/calling_file/' + id_file)

    }
    String.prototype.reverse = function () {
        return this.split("").reverse().join("");
    }

    function reformatText(input) {        
        var x = input.value;
        x = x.replace(/,/g, ""); // Strip out all commas
        x = x.reverse();
        x = x.replace(/.../g, function (e) {
            return e + ",";
        }); // Insert new commas
        x = x.reverse();
        x = x.replace(/^,/, ""); // Remove leading comma
        input.value = x;
    }
    
    function showlocation(){

    setTimeout(() => {
        
   
        
    var mymap = L.map('mapid').setView([35.75, 51.4], 12);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1Ijoic2VmYXRpMTAwIiwiYSI6ImNrcDl3bTJkZzBtc2wydm1wMmxoNWhwMXUifQ.j_g6aEhiwXRus-bmHOnA2w'
    }).addTo(mymap);


    var popup = L.popup();

    function onMapClick(e) {
        $("#llocation").val(e.latlng.toString())
		popup
			.setLatLng(e.latlng)
			.setContent(e.latlng.toString() + " : موقعیت اینجا هست ")
			.openOn(mymap);
	}

	mymap.on('click', onMapClick);
}, 200);
}

$("#send_digest").click(function(){
    var name_digest = $("#name_digest").val()
    var phone_digest = $("#phone_digest").val()
    var label = $("#label").val()

    $.post('/moshaver/adduser_digest',{
        '_token': $('meta[name=csrf-token]').attr('content'),
        name : name_digest,
        phone : phone_digest,
        label : label
    })
    .then((res)=>{
        if(res.status === 200){
            $("#digest_user_all").append(
                `<option value="${res.data.id}" selected>${res.data.name} - ${res.data.phone} (${res.data.label})</option>`
            )
            $("#myModal").removeClass("show")
            $("#myModal").css("display","none")
            $("#bbody").removeClass("modal-open")
            $(".modal-backdrop").remove(); 
        }
        
    })

})

        if($("#fileid_edit")){
            var fileid_edit = $("#fileid_edit").val()
        }

       

function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}


var modal = document.getElementById("show_details");


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close2")[0];

// When the user clicks the button, open the modal 
function action_showdetails(actioninfo) {

    $("#client_action").text("")
    $("#file_action").text("")

    $("#show_details").addClass("showddd")
    
    $.get('/moshaver/getshowuser_id/'+actioninfo.event._def.extendedProps.client_id)
    .then((res)=>{
        $("#client_action").text(res.name)
    })

    $.get('/moshaver/getshowfile_id/'+actioninfo.event._def.extendedProps.file_id)
    .then((res)=>{
        $("#file_action").text(res.name)
    })

    $("#text_action").text(actioninfo.event._def.extendedProps.text)
    $("#title_action").text(actioninfo.event._def.title)
}

$("#close2").click(function(){
    $("#show_details").removeClass("showddd")
})

window.onclick = function(event) {
    if (event.target == modal) {
        $("#show_details").removeClass("showddd")
    }
}
if($("#infileedit").val()){
    var uppy = Uppy.Core({
            locale: Uppy.locales.fa_IR
        })
        .use(Uppy.Dashboard, {
          inline: true,
          target: '#drag-drop-area',
        })
        .use(Uppy.XHRUpload, {endpoint: '/moshaver/uploadfilesimg/'+fileid_edit})

      uppy.on('complete', (result) => {
        console.log('Upload complete! We’ve uploaded these files:', result.successful)
      })

}

var modal2 = document.getElementById("dash_action_details");

function dash_action_show_details(action){
    $.get('/moshaver/get_detail_action/' + action.id)
    .then((res)=>{

        $("#details_client_action").parent().css("display", "block")
        $("#details_file_action").parent().css("display", "block")

        $("#details_text_action").text(res.action.text)
        
        if (res.client){
            $("#details_client_action").text(res.client.name)
        }else{
            $("#details_client_action").parent().css("display", "none")
        }

        if (res.file){
            $("#details_file_action").text(res.file.name)
        }else{
            $("#details_file_action").parent().css("display", "none")
        }
        

        var title = ""
        if (res.action.kind == 1){
            title = "بازدید ملک"
        }else if(res.action.kind == 2){
            title = "نشست قرارداد"
        }else if(res.action.kind == 3){
            title = "کارشناسی ملک"
        }else if(res.action.kind == 4){
            title = "یادآوری تماس"
        }else if(res.action.kind == 5){
            title = res.action.title
        }

        $("#details_title_action").text(title)
        $("#details_date_action").text(res.action.date.split('T')[1])
        

    })

    $("#dash_action_details").addClass("showddd")
}

$("#close3").click(function(){
    $("#dash_action_details").removeClass("showddd")
})
window.onclick = function(event) {
    if (event.target == modal2) {
        $("#dash_action_details").removeClass("showddd")
    }
}


var options = {
    chart: {
      type: 'column',
      style: {
              fontFamily: 'sefati'
          }
    },
    title: {
      text: 'گزارش هفتگی فعالت'
    },
    subtitle: {
      text: 'با قابلیت انتخاب بازه'
    },
    xAxis: {
      categories: [],
    },
    yAxis: {
      min: 0,
      title: {
        text: 'تعداد'
      }
    },
    tooltip: {
      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
      pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
        '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
      footerFormat: '</table>',
      shared: true,
      useHTML: true
    },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0
      }
    },
    series: [{
      name: 'تماس ها',
      data: []
  
    }, {
      name: 'فایل های',
      data: []
  
    },
    {
      name: 'کاربر های',
      data: []
    },
    {
      name: 'سرویس ها',
      data: []
  
    }, {
      name: 'آگهی ها',
      data: []
  
    }]
  }

var chart_dates = []
var files = []
var users = []
var calls = []
var detatils = []

    $.get('moshaver/statics/'+6).then((res)=>{
        options.xAxis.categories = []
        res.map((item)=>{
            chart_dates.push(item.time)
            files.push(item.files.length)
            users.push(item.users.length)
            calls.push(item.calls.length)
            detatils.push(item)
        })
        options.xAxis.categories = chart_dates
        options.series[1].data = files
        options.series[2].data = users
        options.series[0].data = calls


    }).then((res)=>{
        Highcharts.chart('container', options);


    detatils.map((item)=>{
        $("#details_chart_accordion").append(
    
            `<div class="card">
                <div class="card-header" id="headingOne_${item.time}">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne_${item.time}" aria-expanded="true" aria-controls="collapseOne_${item.time}">
                    جزئیات در تاریخ <strong> ${item.time} </strong>
                    </button>
                </h5>
                </div>
    
                <div id="collapseOne_${item.time}" class="collapse" aria-labelledby="headingOne_${item.time}" data-parent="#details_chart_accordion">
                <div class="card-body">
                    ${item.calls} <br>

                </div>
                </div>
            </div>
        `)
    })
    
    })


</script>

</body>

</html>
