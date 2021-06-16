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
        <div class="row mt-4">
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
                        <li class="btn-group nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon fa fa-edit"></i>
                                مدیریت
                            </a>
                        </li>
                        <li class="dropdown nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon fa fa-cog"></i>
                                تنظیمات
                            </a>
                        </li>

                        
                        
                    </ul>        </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8 ">
                                            </i>
                                            تنظیمات پنل کاربری

                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <button type="button" tabindex="0" class="dropdown-item">اکانت1</button>
                                            <button type="button" tabindex="0" class="dropdown-item">اکانت2</button>
                                            <h6 tabindex="-1" class="dropdown-header">وسطی</h6>
                                            <button type="button" tabindex="0" class="dropdown-item">اکانت3</button>
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <button type="button" tabindex="0" class="dropdown-item">اکانت4 </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        {{Auth::user()->name}}
                                    </div>
                                    <div class="widget-subheading">
                                        رتبه {{Auth::user()->rank}}
                                    </div>
                                </div>
                                <!-- <div class="widget-content-right header-user-info ml-3">
                                    <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                        <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                                    </button>
                                </div> -->
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
                                    <a href="/moshaver/manage_files">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                          فایل ها
                                    </a>
                                </li>

                                <li>
                                    <a href="/moshaver/listusers" class="">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                         مشتری ها
                                    </a>
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

    $(".price_comma").each((i)=>{
        console.log(i)
    })
    
    function numberWithCommas() {
        return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    }

    $("img").click(function(){
        var selectecimg = []
        $(this).toggleClass("hoverimg_selected");
            $(".hoverimg_selected").each(function(){
            selectecimg.push($(this).attr('src'))
        })
        $("#images_tablighat").val(JSON.stringify(selectecimg))
    })

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
    

    var mymap = L.map('mapid').setView([35.75, 51.4], 12);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'نقشه استاتیک <a href="">با همکاری ممد</a> کمپانی صفت <a href="">سروش</a>',
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
$("#send_digest").click(function(){
    var name_digest = $("#name_digest").val()
    var phone_digest = $("#phone_digest").val()
    $.post('/moshaver/adduser_digest',{
        '_token': $('meta[name=csrf-token]').attr('content'),
        name : name_digest,
        phone : phone_digest
    })
    .then((res)=>{
        if(res.status === 200){
            $("#digest_user_all").append(
                `<option value="${res.data.id}" selected>${res.data.name} - ${res.data.phone}</option>`
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

</script>
</body>

</html>
