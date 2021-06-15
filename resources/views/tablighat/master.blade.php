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
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin=""></script>
<script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.18.3/dist/locale/bootstrap-table-fa-IR.js"></script>

<script>

    var row_data_user = []
    var row_user

    $.get('/modir/manage_user_table')
    .then((resp)=>{
        resp.users.map((item)=>{
            name = item.name
            level = item.level
            userid_inter = resp.users.find((user) => {return item.userid_inter == user.id}).name
            kind_type = item.kind_type
            area = item.area
            type = item.type
            price = item.price

            row = {
                'name': name,
                'level' : level === 2 ? 'مشاور' : (level === 3 ? 'منشی' : 'مدیریت'),
                'userid_inter' : userid_inter,
                'kind_type' : kind_type,
                'area' : area,
                'type' : type,
                'price' : price
            }
        row_data_user.push(row)
        })
        
    }).then(()=>{
        $('#manage_user_table').bootstrapTable({

            pagination: true,
            search: true,
            columns: [{
                field: 'moshaver_name',
                title: 'نام مشاور',
            }, {
                field: 'moshaver_phone',
                title: 'شماره تلفن مشاور'
            }, {
                field: 'status',
                title: 'وضعیت',
            }, {
                field: 'full_data',
                title: 'اطلاعات کامل',
            }],
            data: row_data_user
        })
    })
</script>


<script>
    var row_data_file = []
    var row_file

    $.get('/modir/manage_file_table')
    .then((resp)=>{
        resp.files.map((item)=>{
            type = item.type
            userid_file = resp.users.find((user)=> {return user.id === item.userid_file}).name
            userid_moshaver = resp.users.find((user)=> {return user.id === item.userid_moshaver}).name
            region = item.region
            area = item.area
            kind_type = item.kind_type
            price = item.price

            row = {
                'type': type,
                'userid_file' : userid_file,
                'userid_moshaver' : userid_moshaver,
                'region' : region,
                'area' : area,
                'kind_type' : kind_type,
                'price' : price
            }
        row_data_file.push(row) 
        })
        
    }).then(()=>{
        $('#manage_file_table').bootstrapTable({

            pagination: true,
            search: true,
            columns: [{
                field: 'type',
                title: 'نوع ملک',
            }, {
                field: 'userid_file',
                title: 'مالک'
            }, {
                field: 'userid_moshaver',
                title: 'وارد کننده فایل',
            }, {
                field: 'region',
                title: 'منطقه',
            }, {
                field: 'area',
                title: 'متراژ',
                sortable: true,
            }, {
                field: 'kind_type',
                title: 'نوع قرارداد',
                sortable: true,
            }, {
                field: 'price',
                title: 'قیمت',
                sortable: true,
            }],
            data: row_data_file
        })
    })
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
            type: 'انجام شده'
        })
    }

    function only_monshi_table(){
        $('#moshaver_performance_table').bootstrapTable('filterBy', {
            type: 'انجام نشده'
        })
    }
    function both_table(){
        $('#moshaver_performance_table').bootstrapTable('filterBy', {
            type: ['انجام شده', 'انجام نشده']
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


</script>


</body>

</html>