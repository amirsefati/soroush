<!doctype html>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>داشبورد مشاور</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="داشبورد مشاور برنامه">
   
    <link rel="stylesheet" href="{{asset('dashboard/main.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/rtl.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/moshaver.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/persian-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('action/main.min.css')}}">

</head>
<body>
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
    <form action="/moshaver/adduser_digest" method="POST">
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
        <div class="row mt-4">
            <div class="col-md-12" style="text-align:center">
                <button class="btn btn-success pr-5 pl-5"> ارسال</button>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12" style="text-align:center">
                <a href="/moshaver/adduser" style="font-size:11px">حالت پیشرفته</a>
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

<script>
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
</script>
</body>

</html>
