<!doctype html>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>داشبورد مدیر</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="داشبورد مدیر">
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css">

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


<div class="modal pt-5" id="ann_info_modal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
  
          <h5 class="modal-title">اطلاعات کامل اعلامیه</h5>
        </div>
        <!-- Modal body -->
        <div class="modal-body" style="direction: rtl;">
          <div class="row" style="text-align: center">
  
              <div class="col-12">
                  <label for="ann_info_img">تصویر</label>
                  <div class="row" id="ann_info_img"></div>
              </div>
  
              <div class="col-12">
                  <label for="ann_info_title">عنوان</label>
                  <p id='ann_info_title' name='ann_info_title'></p>
              </div>

              <div class="col-12">
                <label for="ann_info_text">متن</label>
                <p id='ann_info_text' name='ann_info_text'></p>
              </div>

              <div class="col-12">
                <label for="ann_info_time">زمان انتشار</label>
                <p id='ann_info_time' name='ann_info_time'></p>
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


<div class="modal pt-5" id="add_ann">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
  
          <h5 class="modal-title">افزودن اعلامیه</h5>
        </div>
        <!-- Modal body -->
        <div class="modal-body" style="direction: rtl;">
          <div class="row">
  
              <div class="col-6">
                  <label for="name">عنوان</label>
                  <input id="name_digest" type="text" class="form-control" required>
              </div>
  
              <div class="col-6">
                  <label for="name">تصویر</label>
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

<div class="modal pt-5" id="addfollowup">
  <div class="modal-dialog">
    <div class="modal-content">
       
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h5 class="modal-title">افزودن پیگیری</h5>
      </div>
    <form action="/modir/addfollowup" method="POST">
    @csrf
      <!-- Modal body -->
      <div class="modal-body" style="direction:rtl;font-family:sefati">
        
            <div class="row">
                <div class="col-md-12">
                    <label>انتخاب مشتری :</label>
                    <select name="user_id" class="form-control" id="" required>
                        <option value="">انتخاب کنید...</option>
                        @foreach($us as $u)
                            <option value="{{$u->id}}">{{$u->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
                <div class="row">   
                    <div class="col-md-12">
                        <label for="">هدف و توضیحات : </label>
                        <textarea name="desc" class="form-control"></textarea>
                    </div>
                </div>

                <br>
                <div class="row">   
                    <div class="col-md-12">
                        <label for="">تاریخ شروع روند : </label>
                        <input type="text" class="form-control" id="datepickeruser4" name="date" required/>
                    </div>
                </div>
            <br>
        <div class="row">
            <div class="col-md-12" style="text-align: center;">
                <button class="btn btn-success pr-5 pl-5"> افزودن</button>
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

<div class="modal pt-5" id="followupm">
  <div class="modal-dialog">
    <div class="modal-content">
       
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h5 class="modal-title">پیگیری مشتری</h5>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="direction:rtl;font-family:sefati">
        <div class="row">
            <div class="col-md-12">
                <div id="accordianId" role="tablist" aria-multiselectable="true">
                    <div class="card">
                        <div class="card-header" role="tab" id="section1HeaderId">
                            <h5 class="mb-0">
                                <a style="font-size:10px" data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">
                          تاریخچه پیگیری ها
                        </a>
                            </h5>
                        </div>

                        <div id="section1ContentId" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
                            <div class="card-body">
                                <table style="width: 100%;" class="table table-striped table-inverse table-responsive">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>تاریخ</th>
                                            <th>توضیحات</th>
                                        </tr>
                                        </thead>
                                        <tbody id="trtable_followup">
                                           
                                        </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    <br>
                
        <br>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

<div class="modal pt-5" id="show_file_verify">
  <div class="modal-dialog">
    <div class="modal-content">
       <input id="file_id_selected" hidden>
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h5 class="modal-title">تایید فایل مشاور</h5>
      </div>
      <!-- Modal body -->
      <div class="modal-body" style="direction:rtl;font-family:sefati">
            <div class="row">
                <div class="col-md-6">
                    نام مشاور : <span id="moshaver_name"></span>
                </div>
                <div class="col-md-6">
                    شماره تلفن مشاور  : <span id="moshaver_phone"></span>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-md-6">
                    نام مالک فایل : <span id="client_name"></span>
                </div>
                <div class="col-md-6">
                    شماره تلفن مالک فایل : <span id="client_phone"></span>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-md-3" style="text-align: center;">
                    <img src="/img/area.svg" alt="">
                    <p style="margin:10px;font-weight:bold;font-size:20px" id="file_area"></p>
                    <p style="color:#b5b5b5;font-size:12px">متری</p>
                </div>

                <div class="col-md-3" style="text-align: center;">
                    <img src="/img/age.svg" alt="">
                    <p style="margin:10px;font-weight:bold;font-size:20px" id="file_age"></p>
                    <p style="color:#b5b5b5;font-size:12px">سال ساخت</p>
                </div>

                <div class="col-md-3" style="text-align: center;">
                    <img src="/img/age.svg" alt="">
                    <p style="margin:10px;font-weight:bold;font-size:20px" id="file_bedroom_number"></p>
                    <p style="color:#b5b5b5;font-size:12px">تعداد خواب</p>
                </div>

                <div class="col-md-3" style="text-align: center;">
                    <img src="/img/age.svg" alt="">
                    <p style="margin:10px;font-weight:bold;font-size:20px" id="file_floor"></p>
                    <p style="color:#b5b5b5;font-size:12px">طبقه واحد</p>
                </div>
            </div>

            <hr>
            <div class="row" style="justify-content: center;"> 
                <div class="col-md-6" style="text-align: center;">
                    <p style="color:#b5b5b5;font-size:12px;margin:5px;">تعداد طبقات</p>
                    <p style="font-weight: bold;font-size:20px" id="allfloor"></p>
                </div>

                <div class="col-md-6" style="text-align: center;">
                    <p style="color:#b5b5b5;font-size:12px;margin:5px;"> تعداد سرویس بهداشتی</p>
                    <p style="font-weight: bold;font-size:20px" id="wc_number"></p>
                </div>

                <div class="col-md-6" style="text-align: center;">
                    <p style="color:#b5b5b5;font-size:12px;margin:5px;"> پارکنیگ</p>
                    <p style="font-weight: bold;font-size:20px" id="parking"></p>
                </div>

                <div class="col-md-6" style="text-align: center;">
                    <p style="color:#b5b5b5;font-size:12px;margin:5px;"> تعداد واحد در طبقه</p>
                    <p style="font-weight: bold;font-size:20px" id="suiteinfloor"></p>
                </div>

                <div class="col-md-6" style="text-align: center;">
                    <p style="color:#b5b5b5;font-size:12px;margin:5px;"> تعداد کل واحد ها </p>
                    <p style="font-weight: bold;font-size:20px" id="allsuite"></p>
                </div>

            </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer" style="text-align: center;margin:auto">
        <button onclick="verify_file_failed()" class="btn btn-danger">عدم صحت جزئیات</button>
        <button onclick="verify_file_success()" class="btn btn-success">تایید فایل</button>

      </div>
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
                                    <a href="/modir" class="">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        داشبورد
                                    </a>
                                </li>

                                <li>
                                    <a href="/modir/moshaver_performance" class="">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        عملکرد مشاورین
                                    </a>
                                </li> 

                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-diamond"></i>
                                        پنل مدیریتی
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="/modir/add_moshaver">
                                                <i class="metismenu-icon"></i>
                                                افزودن مشاور
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/modir/add_monshi">
                                                <i class="metismenu-icon">
                                                </i>
                                                افزودن منشی
                                            </a>
                                        </li>

                                        <li>
                                            <a href="/modir/manage_kpi">
                                                <i class="metismenu-icon">
                                                </i>
                                                مدیریت سنجه‌ها
                                            </a>
                                        </li>

                                        <li>
                                            <a href="/modir/announcement">
                                                <i class="metismenu-icon">
                                                </i>
                                                اعلامیه
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>

                                
                                <li>
                                    <a href="/modir/manage_files">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                          فایل ها
                                    </a>
                                </li>

                                <li>
                                    <a href="/modir/listusers" class="">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                         مشتری ها
                                    </a>
                                </li>

                                <li>
                                    <a href="/modir/taavons" class="">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                         تعاون ها
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="/modir/phonebook" class="">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                         دفترچه تلفن
                                    </a>
                                </li>

                                <li>
                                    <a href="/modir/followup" class="">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                            پیگیری
                                    </a>
                                </li>

                                
                                <li>
                                    <a href="/modir/verify_moshaver_file" class="">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                         تایید فایل مشاورین
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
<script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.18.3/dist/locale/bootstrap-table-fa-IR.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>

    
    $(".price_comma").each(function(){
        $(this).text(numberWithCommas($(this).text()))
    })
    
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    }

</script>

<script>


    var row_data = []
    var row
    
    $.get('/modir/report_all')
    .then((response)=>{
        response.map(item =>{
            user1 = item.user.name + ' - ' + item.user.phone
            type1 = item.user.level
            files1 = item.files.length
            clients1 = item.clients.length
            calls1 = item.calls.length
            services1 = item.services.length
            contracts1 = item.contracts.length

            row = {
                'user': user1,
                'type': type1 == 2 ? 'مشاور' : 'منشی', 
                'files': files1,
                'clients': clients1,
                'calls': calls1,
                'services': services1,
                'contracts': contracts1
            }

            row_data.push(row)
        }) 
    }).then(()=>{
        
        $('#moshaver_performance_table').bootstrapTable({

            pagination: true,
            search: true,
            columns: [{
                field: 'user',
                title: 'مشخصات',
            }, {
                field: 'type',
                title: 'نوع کاربر'
            }, {
                field: 'files',
                title: 'تعداد فایل‌ها',
                sortable: true,
            }, {
                field: 'clients',
                title: 'تعداد مشتریان',
                sortable: true,
            }, {
                field: 'calls',
                title: 'تعداد تماس‌ها',
                sortable: true,
            }, {
                field: 'services',
                title: 'تعداد سرویس‌ها',
                sortable: true,
            }, {
                field: 'contracts',
                title: 'تعداد قرارداد',
                sortable: true,
            }],
            data: row_data
        })

    })

    function only_moshaver_table(){
        $('#moshaver_performance_table').bootstrapTable('filterBy', {
            type: 'مشاور'
        })
    }

    function only_monshi_table(){
        $('#moshaver_performance_table').bootstrapTable('filterBy', {
            type: 'منشی'
        })
    }
    function both_table(){
        $('#moshaver_performance_table').bootstrapTable('filterBy', {
            type: ['مشاور', 'منشی']
        })
    }

    function verify_file_success(){
        $.get('/modir/file_id_selected/'+ $("#file_id_selected").val()).then(()=>{

        })
        location.reload();     
    }

    function verify_file_failed(){
        $.get('/modir/file_id_selected_failed/'+ $("#file_id_selected").val()).then(()=>{

        })
        location.reload();    
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

    

    function show_verify_file_details(file_id,user_id,moshaver_id){
        $("#file_id_selected").val(file_id)

        $.get('getshowfile_id/'+file_id)
        .then((res)=>{
            $("#file_area").text(res.area)
            $("#file_age").text(res.age)
            $("#file_bedroom_number").text(res.bedroom_number)
            $("#file_floor").text(res.floor)

            $("#allfloor").text(res.allfloor)
            $("#wc_number").text(res.wc_number)
            $("#parking").text(res.parking)
            $("#suiteinfloor").text(res.suiteinfloor)
            $("#allsuite").text(res.allsuite)

        })
        $.get('getshowuser_id/'+user_id)
        .then((res)=>{
            $("#moshaver_name").text(res.name)
            $("#moshaver_phone").text(res.phone)

        })
        $.get('getshowuser_id/'+moshaver_id)
        .then((res)=>{
            $("#client_name").text(res.name)
            $("#client_phone").text(res.phone)        
        })
    }
    function followupmodal(id){
        $("#trtable_followup").empty()

        $("#followupmodal_userid").val("")
        $("#followupmodal_userid").val(id)
        $.get('/modir/followuphistoryinreport/'+id)
            .then((res)=>{
                res.map((item) => {
                    $("#trtable_followup").append(`<tr><td>${item.date}</td><td>${item.desc}</td></tr>`)
                })
            })
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
    
$("#send_digest").click(function(){
    var name_digest = $("#name_digest").val()
    var phone_digest = $("#phone_digest").val()
    $.post('/modir/adduser_digest',{
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


function ann_info_modal(ann){

    var images = ann.img
    // images = JSON.parse(images)

    $('#ann_info_img').empty();

    // var i;
    // for (i = 0; i < images.length; i++) {

    $('#ann_info_img').append(`
        <div class='col-md-4'>
            <img src='${images}' style='width:100%'/> 
        </div>
    `)
    // }

    $('#ann_info_title').text(ann.title)
    $('#ann_info_text').text(ann.text)
    $('#ann_info_time').text(ann.created_at)

}
    //taavon table filters
    function modir_taavon_file(){
            $('#instagram_table').bootstrapTable('filterBy', {
                kind: 'درخواست فایل'
            })
    }

    function modir_taavon_user(){
            $('#instagram_table').bootstrapTable('filterBy', {
                kind: 'درخواست مشتری'
            })
    }

    function modir_taavon_both(){
            $('#instagram_table').bootstrapTable('filterBy', {
                kind: ['درخواست فایل', 'درخواست مشتری']
            })
    }

    //phonebook table filters
    function buyer_phonebook(){
            $('#phonebook_table').bootstrapTable('filterBy', {
                kind: 'خریدار'
            })
    }

    function seller_phonebook(){
            $('#phonebook_table').bootstrapTable('filterBy', {
                kind: 'فروشنده'
            })
    }

    function renter_phonebook(){
            $('#phonebook_table').bootstrapTable('filterBy', {
                kind: 'مستأجر'
            })
    }

    function landlord_phonebook(){
            $('#phonebook_table').bootstrapTable('filterBy', {
                kind: 'موجر'
            })
    }
    
    function all_users_phonebook(){
            $('#phonebook_table').bootstrapTable('filterBy', {
                kind: ['خریدار', 'فروشنده', 'مستأجر', 'موجر']
            })
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
    
    $.get('/modir/getshowuser_id/'+actioninfo.event._def.extendedProps.client_id)
    .then((res)=>{
        $("#client_action").text(res.name)
    })

    $.get('/modir/getshowfile_id/'+actioninfo.event._def.extendedProps.file_id)
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
        .use(Uppy.XHRUpload, {endpoint: '/modir/uploadfilesimg/'+fileid_edit})

      uppy.on('complete', (result) => {
        console.log('Upload complete! We’ve uploaded these files:', result.successful)
      })

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

    $.get('monshi/statics/'+6).then((res)=>{
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
        Highcharts.chart('container-modir', options);


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
<script>
var to, from;
to = $(".range-to-example").persianDatepicker({
    inline: true,
    altField: '#range_to_modir',
    altFormat: 'll',
    initialValue: false,
    onSelect: function (unix) {
        to.touched = true;
        if (from && from.options && from.options.maxDate != unix) {
            var cachedValue = from.getState().selected.unixDate;
            from.options = {maxDate: unix};
            if (from.touched) {
                from.setDate(cachedValue);
            }
        }
    }
});
from = $(".range-from-example").persianDatepicker({
    inline: true,
    altField: '#range_from_modir',
    altFormat: 'll',
    initialValue: false,
    onSelect: function (unix) {
        from.touched = true;
        if (to && to.options && to.options.minDate != unix) {
            var cachedValue = to.getState().selected.unixDate;
            to.options = {minDate: unix};
            if (to.touched) {
                to.setDate(cachedValue);
            }
        }
    }
});
</script>

</body>

</html>
