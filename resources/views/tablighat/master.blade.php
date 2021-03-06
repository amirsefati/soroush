<!doctype html>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>داشبورد مسئول تبلیغات</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="داشبورد مسئول تبلیغات">
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


<div class="modal pt-5" id="change_phone_number_modal">
    <div class="modal-dialog">
      <div class="modal-content">
         
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
  
          <h5 class="modal-title">تغییر شماره تماس</h5>
        </div>

        <form action="/tablighat/change_phone_number" method="POST">
            @csrf
            <!-- Modal body -->
            <div class="modal-body" style="direction:rtl;font-family:sefati;text-align:right">

                <input type="text" name="change_phone_number_tablighat_id" id="change_phone_number_tablighat_id" value={{Auth::user()->id}} hidden>

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

        <form action="/tablighat/change_password" method="POST">
            @csrf
            <!-- Modal body -->
            <div class="modal-body" style="direction:rtl;font-family:sefati;text-align:right">

                <input type="text" name="change_password_tablighat_id" id="change_password_tablighat_id" value={{Auth::user()->id}} hidden>

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


<div class="modal pt-5" id="sms_result_modal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
  
          <h5 class="modal-title">نتیجه تبلیغ در پنل پیامکی</h5>
        </div>
        <!-- Modal body -->
        <div class="modal-body" style="direction: rtl;">

            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="/tablighat/sms_panel_result">
                        @csrf
                        <input id="sms_tablighat_id" name="sms_tablighat_id" style="display: none" type="text">
                        
                        <label for="name" style="text-align: right">متن نهایی پیامک شده: </label>
                        <input id="result_sms_text" name="final_sms_text" type="textarea" class="form-control" required>

                    
                </div>
            </div>

          <div class="row mt-4">
              <div class="col-md-12" style="text-align:center">
                  <button type="submit" id="send_digest" class="btn btn-success pr-5 pl-5"> ارسال</button>
              </div>
          </div>
            </form>
          
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
        </div>
      </div>
    </div>
</div>

<div class="modal pt-5" id="sms_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h5 class="modal-title">اطلاعات کامل تبلیغات پنل پیامکی</h5>
      </div>
      <!-- Modal body -->
      <div class="modal-body" style="direction: rtl;">

        <div class="row">
            <div class="col-12">
                <label for="name">متن پیامک: </label>
                <p> <span id='sms_modal_text'></span> </p>
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

<div class="modal pt-5" id="instagram_modal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
  
          <h5 class="modal-title">اطلاعات کامل تبلیغات اینستاگرام</h5>
        </div>
        <!-- Modal body -->
        <div class="modal-body" style="direction: rtl;">
          <div class="row">
  
              <div class="col-12">
                <label for="name">عکس‌های منتخب: </label>

                <div class="row" id="instagram_pics"></div>

                  
              </div>
          </div>

          <hr>
  
          <div class="row">
              <div class="col-12">
                  <label for="name">متن آگهی: </label>
                  <p> <span id='instagram_modal_ad_text'></span> </p>
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

<div class="modal pt-5" id="instagram_result_modal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
  
          <h5 class="modal-title">نتیجه تبلیغ در اینستاگرام</h5>
        </div>
        <!-- Modal body -->
        <div class="modal-body" style="direction: rtl;">

            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="/tablighat/instagram_result">
                        @csrf
                        <input id="instagram_tablighat_id" name="instagram_tablighat_id" style="display: none" type="text">
                        
                        <label for="name" style="text-align: right">لینک اینستاگرام: </label>
                        <input id="result_instagram_link" name="result_instagram_link" type="text" class="form-control" required>

                    
                </div>
            </div>

          <div class="row mt-4">
              <div class="col-md-12" style="text-align:center">
                  <button type="submit" id="send_digest" class="btn btn-success pr-5 pl-5"> ارسال</button>
              </div>
          </div>
            </form>
          
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
        </div>
      </div>
    </div>
</div>

<div class="modal pt-5" id="ds_modal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
  
          <h5 class="modal-title">اطلاعات کامل تبلیغات دیوار / شیپور</h5>
        </div>
        <!-- Modal body -->
        <div class="modal-body" style="direction: rtl;">
          <div class="row">
  
              <div class="col-12">
                <label for="name">عکس‌های منتخب: </label>

                <div class="row" id="ds_pics"></div>

                  
              </div>
          </div>

          <hr>
  
          <div class="row">
              <div class="col-12">
                  <label for="name">متن آگهی: </label>
                  <p> <span id='ds_ad_text'></span> </p>
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

<div class="modal pt-5" id="ds_result_modal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
  
          <h5 class="modal-title">نتیجه تبلیغ در استوری اینستاگرام</h5>
        </div>
        <!-- Modal body -->
        <div class="modal-body" style="direction: rtl;">

            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="/tablighat/ds_result">
                        @csrf
                        <input id="ds_tablighat_id" name="ds_tablighat_id" style="display: none" type="text">
                        
                        <label for="name" style="text-align: right">لینک استوری اینستاگرام: </label>
                        <input id="result_instagram_story_link" name="result_instagram_story_link" type="text" class="form-control" required>

                    
                </div>
            </div>

          <div class="row mt-4">
              <div class="col-md-12" style="text-align:center">
                  <button type="submit" id="send_digest" class="btn btn-success pr-5 pl-5"> ارسال</button>
              </div>
          </div>
            </form>
          
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
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
                                    <a href="/tablighat" class="">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        داشبورد
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-diamond"></i>
                                        تبلیغات
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="/tablighat/instagram">
                                                <i class="metismenu-icon"></i>
                                                اینستاگرام
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/tablighat/sms_panel">
                                                <i class="metismenu-icon">
                                                </i>
                                                پنل پیامکی
                                            </a>
                                        </li>

                                        <li>
                                            <a href="/tablighat/divar_sheypoor">
                                                <i class="metismenu-icon">
                                                </i>
                                                دیوار / شیپور
                                            </a>
                                        </li>
                                        
                                    </ul>
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
<script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.18.3/dist/locale/bootstrap-table-fa-IR.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>

    function instagram_ad_done(){
        $('#instagram_table').bootstrapTable('filterBy', {
            status: 'انجام شده'
        })
    }
    function instagram_ad_not_done(){
        $('#instagram_table').bootstrapTable('filterBy', {
            status: 'انجام نشده'
        })
    }
    function instagram_ad_both(){
        $('#instagram_table').bootstrapTable('filterBy', {
            status: ['انجام شده', 'انجام نشده']
        })
    }

    function sms_ad_done(){
        $('#sms_table').bootstrapTable('filterBy', {
            status: 'انجام شده'
        })
    }
    function sms_ad_not_done(){
        $('#sms_table').bootstrapTable('filterBy', {
            status: 'انجام نشده'
        })
    }
    function sms_ad_both(){
        $('#sms_table').bootstrapTable('filterBy', {
            status: ['انجام شده', 'انجام نشده']
        })
    }

    function ds_ad_done(){
        $('#ds_table').bootstrapTable('filterBy', {
            status: 'انجام شده'
        })
    }
    function ds_ad_not_done(){
        $('#ds_table').bootstrapTable('filterBy', {
            status: 'انجام نشده'
        })
    }
    function ds_ad_both(){
        $('#ds_table').bootstrapTable('filterBy', {
            status: ['انجام شده', 'انجام نشده']
        })
    }

    function instagram_modal(report){

        var images = report.tablighat.images
        images = JSON.parse(images)
        var ad_text = report.tablighat.ad_text
        
        $('#instagram_pics').empty();

        var i;
        for (i = 0; i < images.length; i++) {

            $('#instagram_pics').append(`
                <div class='col-md-4'>
                    <img src='${images[i]}' style='width:100%'/> 
                </div>
            `)
        }

        document.getElementById('instagram_modal_ad_text').innerHTML = ad_text

    }
 
    function instagram_result_modal(report){

        $('#instagram_tablighat_id').val(report.tablighat.id)

    }

    function ds_modal(report){

        var images = report.tablighat.images
        images = JSON.parse(images)
        var ad_text = report.tablighat.ad_text

        $('#ds_pics').empty();

        var i;
        for (i = 0; i < images.length; i++) {

            $('#ds_pics').append(`
                <div class='col-md-4'>
                    <img src='${images[i]}' style='width:100%'/> 
                </div>
            `)
        }

        document.getElementById('ds_ad_text').innerHTML = ad_text

    }

    function ds_result_modal(report){

        $('#ds_tablighat_id').val(report.tablighat.id)

    }


    function sms_modal(report){

        var sms_text = report.tablighat.ad_text

        document.getElementById('sms_modal_text').innerHTML = sms_text

    }

    function sms_result_modal(report){

        $('#sms_tablighat_id').val(report.tablighat.id)

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
    series: [ {
      name: 'آگهی ها',
      data: []
    }]
  }

var chart_dates = []
var files = []
var users = []
var calls = []
var detatils = []

$.get('tablighat/statics/'+6).then((res)=>{
        options.xAxis.categories = []
        res.map((item)=>{
            chart_dates.push(item.time)
            files.push(item.files.length)
            users.push(item.users.length)
            calls.push(item.calls.length)
            detatils.push(item)
        })
        options.xAxis.categories = chart_dates
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