$('document').ready(function(){
    window.formatPersian  = false;

    var url = window.location.href;
    var filename = url.substr(url.lastIndexOf("/"))
    $('li a').each(function(){
        var href = $(this).attr('href').substr($(this).attr('href').lastIndexOf("/"));
        if(href == filename)
        $(this).addClass('mm-active')
    })


    const type_sell_maskoni = ['آپارتمان','ویلا','زمین مسکونی','کلنگی','مستغلات مسکونی','برج','پنت هاوس','برج باغ'];
    const type_rent_maskoni = ['آپارتمان','ویلا','مستغلات مسکونی','پنت هاوس','برج','برج باغ'];
    const onsell = ['آپارتمان'];

    var type_select = 1;
    
    //load default type
    type_sell_maskoni.map((item)=>{
        $("#type_maskoni").append(
            `<option value="${item}">${item}</option>`
        )
    })
    $("#sell").css('font-size','110%')
    $("#rent").css('font-size','100%')
    $("#sell").css('opacity','1')
    $("#rent").css('opacity','.5')
    $("#colrent").hide()
    $("#colrentmonth").hide()
    $("#kind_type_select").val('sell')

    $("#seller").css('font-size','110%')
    $("#renter").css('font-size','100%')
    $("#seller").css('opacity','1')
    $("#renter").css('opacity','.5')
    $("#colrenterannual").hide()
    $("#colrentermonth").hide()
    $("#kind_type").val('sell')

    $("#type_maskoni").change(function() {
        $("#floorcol").show()  
        $("#agecol").show()
        $("#bedroom_number").show()

        if($('#type_maskoni').val() === 'زمین مسکونی'){
            $("#agecol").hide()
            $("#floorcol").hide()
            $("#bedroom_number").hide()  

        }else if($('#type_maskoni').val() === 'کلنگی'){
            $("#agecol").hide()
            $("#floorcol").hide()
            $("#bedroom_number").hide()

        }
        if($('#type_maskoni').val() === 'ویلا'){
            $("#floorcol").hide()   
        }
    })

    function sellsection(){
        if(type_select === 1){
            return true;
        }
        type_select = 1
        $("#type_maskoni").find('option').remove()
        type_sell_maskoni.map((item)=>{
            $("#type_maskoni").append(
                `<option value="${item}">${item}</option>`
            )
        })
        $("#sell").css('font-size','110%')
        $("#rent").css('font-size','100%')
        $("#onsell").css('font-size','100%')

        $("#sell").css('opacity','1')
        $("#rent").css('opacity','.5')
        $("#onsell").css('opacity','.5')

        $("#colprice").show()
        $("#colrent").hide()
        $("#colrentmonth").hide()
        $("#kind_type_select").val('sell')

    }

    function onsellsection(){
        if(type_select === 3){
            return true;
        }
        type_select = 3
        $("#type_maskoni").find('option').remove()
        onsell.map((item)=>{
            $("#type_maskoni").append(
                `<option value="${item}">${item}</option>`
            )
        })
        $("#sell").css('font-size','100%')
        $("#rent").css('font-size','100%')
        $("#onsell").css('font-size','110%')

        $("#sell").css('opacity','.5')
        $("#rent").css('opacity','.5')
        $("#onsell").css('opacity','1')

        $("#colprice").show()
        $("#colrent").hide()
        $("#colrentmonth").hide()
        $("#kind_type_select").val('sell')

    }
    function rentsection(){
        if(type_select === 0){
            return true;
        }
        type_select = 0
        $("#type_maskoni").find('option').remove()
        type_rent_maskoni.map((item)=>{
            $("#type_maskoni").append(
                `<option value="${item}">${item}</option>`
            )
        })
        $("#sell").css('font-size','100%')
        $("#rent").css('font-size','110%')
        $("#onsell").css('font-size','100%')
        $("#onsell").css('opacity','.5')
        $("#sell").css('opacity','.5')
        $("#rent").css('opacity','1')
        $("#colprice").hide()
        $("#colrent").show()
        $("#colrentmonth").show()
        $("#kind_type_select").val('rent')

    }
    //when click on sell button 
    $("#sell").click(function(){
        sellsection()
    })
  
   
    //when click on rent button 
    $("#rent").click(()=>{
        rentsection() 
    })

    //when click on onsell button 
    $("#onsell").click(function(){
        onsellsection()
    })

    function sellersection(){
        if(type_select === 1){
            return true;
        }
        type_select = 1
        
        $("#seller").css('font-size','110%')
        $("#renter").css('font-size','100%')
        $("#seller").css('opacity','1')
        $("#renter").css('opacity','.5')
        $("#colrenterannual").hide()
        $("#colrentermonth").hide()
        $("#colseller").show()
        $("#kind_type").val('sell')
        
    }

    function rentersection(){
        if(type_select === 0){
            return true;
        }
        type_select = 0
        
        $("#seller").css('font-size','100%')
        $("#renter").css('font-size','110%')
        $("#seller").css('opacity','.5')
        $("#renter").css('opacity','1')
        $("#colrenterannual").show()
        $("#colrentermonth").show()
        $("#colrentermonth").show()
        $("#colseller").hide()
        $("#kind_type").val('rent')

    }
    $("#seller").click(function(){
        if(type_select === 1){
            return true;
        }
        type_select = 1
        
        $("#seller").css('font-size','110%')
        $("#renter").css('font-size','100%')
        $("#seller").css('opacity','1')
        $("#renter").css('opacity','.5')
        $("#colrenterannual").hide()
        $("#colrentermonth").hide()
        $("#colseller").show()
        $("#kind_type").val('sell')


    })
  
   
    //when click on rent button 
    $("#renter").click(()=>{
        if(type_select === 0){
            return true;
        }
        type_select = 0
        
        $("#seller").css('font-size','100%')
        $("#renter").css('font-size','110%')
        $("#seller").css('opacity','.5')
        $("#renter").css('opacity','1')
        $("#colrenterannual").show()
        $("#colrentermonth").show()
        $("#colrentermonth").show()
        $("#colseller").hide()
        $("#kind_type").val('rent')
        
    })
      
    $(function () {


        $("#area").keydown(function () {
          // Save old value.
          if (!$(this).val() || (parseInt($(this).val()) <= 5000000 && parseInt($(this).val()) >= 0))
          $(this).data("old", $(this).val());
        });
        $("#area").keyup(function () {
          // Check correct, else revert back to old value.
          if (!$(this).val() || (parseInt($(this).val()) <= 5000000 && parseInt($(this).val()) >= 0))
            ;
          else
            $(this).val($(this).data("old"));
        });

        $("#region").keydown(function () {
            // Save old value.
            if (!$(this).val() || (parseInt($(this).val()) <= 26 && parseInt($(this).val()) >= 0))
            $(this).data("old", $(this).val());
          });
          $("#region").keyup(function () {
            // Check correct, else revert back to old value.
            if (!$(this).val() || (parseInt($(this).val()) <= 26 && parseInt($(this).val()) >= 0))
              ;
            else
              $(this).val($(this).data("old"));
          });

          $("#percent_taavon").keydown(function () {
            // Save old value.
            if (!$(this).val() || (parseInt($(this).val()) <= 100 && parseInt($(this).val()) >= 0))
            $(this).data("old", $(this).val());
          });
          $("#percent_taavon").keyup(function () {
            // Check correct, else revert back to old value.
            if (!$(this).val() || (parseInt($(this).val()) <= 100 && parseInt($(this).val()) >= 0))
              ;
            else
              $(this).val($(this).data("old"));
          });
      });
   
      
      $(".all_customers").select2({
        dir: "rtl",
        language:'fa'
      });

      $(".multiselectfiles").select2({
        dir: "rtl",
        language:'fa',
        minimumResultsForSearch: Infinity
      });
      $(".multiselectfileswithsearch").select2({
        dir: "rtl",
        language:'fa',
      });


      $("#timepickeruser").pDatepicker({
        format:"HH:mm",
        onlyTimePicker: true
    });

    
        $("#datepickeruser").pDatepicker({
            format:"L",
        });

        $("#datepickeruser212").pDatepicker({
            format:"L",
        });

        $("#datepickeruser2").pDatepicker({
            format:"L",
        });

        $("#timepickeruser2").pDatepicker({
            format:"HH:mm",
            onlyTimePicker: true
        });
        
        $("#datepickeruser3").pDatepicker({
            format:"L",
            
        });

        $("#timepickeruser3").pDatepicker({
            format:"HH:mm",
            onlyTimePicker: true
        });
        
        $("#datepickeruser4").pDatepicker({
            format:"L",
            
        });

       

        $("#timepickeruser4").pDatepicker({
            format:"HH:mm",
            onlyTimePicker: true
        });
        
        $("#datepickeruser5").pDatepicker({
            format:"L",
            
        });

        $("#timepickeruser5").pDatepicker({
            format:"HH:mm",
            onlyTimePicker: true
        });

        $("#datepickeruser11").pDatepicker({
            format:"L",
        });

        $("#datepickeruser12").pDatepicker({
            format:"HH:mm",
            onlyTimePicker: true,

        });

    if($("#what_kind_type").length){
        if($("#what_kind_type").val() == 'sell'){
            sellersection()
        }else{
            rentersection()
        }
        what_type = $("#what_type").val()
            $("#type_maskoni").append(
                `<option value="${what_type}" selected>${what_type}</option>`
        )
        what_wc = $("#what_wc").val()
        what_wc_arr = JSON.parse(what_wc)
        what_wc_arr && what_wc_arr.map((item)=>{
            $("#what_wc_selected").append(
                `<option value="${item}" selected>${item}</option>`
            )
        })

        what_floor_type = $("#what_floor_type").val()
        what_floor_type_arr = JSON.parse(what_floor_type)
        what_floor_type_arr && what_floor_type_arr.map((item)=>{
            $("#floor_type").append(
                `<option value="${item}" selected>${item}</option>`
            )
        })
        what_outdoor_face = $("#what_outdoor_face").val()
        what_outdoor_face_arr = JSON.parse(what_outdoor_face)
        what_outdoor_face_arr && what_outdoor_face_arr.map((item)=>{
            $("#outdoor_face").append(
                `<option value="${item}" selected>${item}</option>`
            )
        })

        what_indoor_face = $("#what_indoor_face").val()
            what_indoor_face_arr = JSON.parse(what_indoor_face)
            what_indoor_face_arr && what_indoor_face_arr.map((item)=>{
                $("#indoor_face").append(
                    `<option value="${item}" selected>${item}</option>`
                )
            })        
        
        
        what_cabinet = $("#what_cabinet").val()
        what_cabinet_arr = JSON.parse(what_cabinet)
        what_cabinet_arr && what_cabinet_arr.map((item)=>{
            $("#cabinet").append(
                `<option value="${item}" selected>${item}</option>`
            )
        })

        what_cooling = $("#what_cooling").val()
        what_cooling_arr = JSON.parse(what_cooling)
        what_cooling_arr && what_cooling_arr.map((item)=>{
            $("#cooling").append(
                `<option value="${item}" selected>${item}</option>`
            )
        })
    }
    
    if($("#pageedituser").length){

        if($("#what_elevator").val() === '1'){
            $("#elevator").prop('checked', true)
        }
        if($("#what_depot").val() === '1'){
            $("#depot").prop('checked', true)
        }
        if($("#what_parking").val() === '1'){
            $("#parking").prop('checked', true)
        }
        if($("#what_balcony").val() === '1'){
            $("#balcony").prop('checked', true)
        }

        what_sporty = $("#what_sporty").val()
        what_sporty_arr = JSON.parse(what_sporty)
        what_sporty_arr && what_sporty_arr.map((item)=>{
            $("#sporty").append(
                `<option value="${item}" selected>${item}</option>`
            )
        })

        what_religen = $("#what_religen").val()
        what_religen_arr = JSON.parse(what_religen)
        what_religen_arr && what_religen_arr.map((item)=>{
            $("#religen").append(
                `<option value="${item}" selected>${item}</option>`
            )
        })

        what_likes = $("#what_likes").val()
        what_likes_arr = JSON.parse(what_likes)
        what_likes_arr && what_likes_arr.map((item)=>{
            $("#likes").append(
                `<option value="${item}" selected>${item}</option>`
            )
        })
    }

    $("#collapsbtn1").click(function(){
        $("#collaps2").removeClass("show")
        $("#collaps3").removeClass("show")

    })

    $("#collapsbtn2").click(function(){
        $("#collaps1").removeClass("show")
        $("#collaps3").removeClass("show")
    })

    $("#collapsbtn3").click(function(){
        $("#collaps2").removeClass("show")
        $("#collaps1").removeClass("show")
    })

    $("#step1").click(function(){
        $("#collaps2").removeClass("show")
        $("#collaps3").removeClass("show")

    })

    $("#step2").click(function(){
        $("#collaps1").removeClass("show")
        $("#collaps3").removeClass("show")
    })

    $("#step3").click(function(){
        $("#collaps2").removeClass("show")
        $("#collaps1").removeClass("show")
    })

    $("#step1").click(function(){
        $("#step2_span").addClass("stepgreen")
        $("#step2_span_span").addClass("stepgreenp")

        if($("#step2_span").hasClass("stepgreen")){
            $("#step2_span").removeClass("stepgreen")
            $("#step2_span_span").removeClass("stepgreenp")
            $("#step2img").removeClass("greensvg")

        }

        if($("#step3_span").hasClass("stepgreen")){
            $("#step3_span").removeClass("stepgreen")
            $("#step3_span_span").removeClass("stepgreenp")
            $("#step3img").removeClass("greensvg")

        }
    })

    $("#step2").click(function(){
        $("#step2_span").addClass("stepgreen")
        $("#step2_span_span").addClass("stepgreenp")
        $("#step2img").addClass("greensvg")

        if($("#step3_span").hasClass("stepgreen")){

            $("#step3_span").removeClass("stepgreen")
            $("#step3_span_span").removeClass("stepgreenp")
            $("#step3img").removeClass("greensvg")

        }
    })

    $("#step3").click(function(){
        $("#step3_span").addClass("stepgreen")
        $("#step3_span_span").addClass("stepgreenp")
        $("#step3img").addClass("greensvg")

        if(!$("#step2_span").hasClass("stepgreen")){
            $("#step2img").addClass("greensvg")
            $("#step2_span").addClass("stepgreen")
            $("#step2_span_span").addClass("stepgreenp")
        }
    })

    $("#imagesblob").onchange = evt => {
        const [file] = $("#images").files
        if (file) {
          $("#show_images").src = URL.createObjectURL(file)
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
})




