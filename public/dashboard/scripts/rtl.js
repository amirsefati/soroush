$('document').ready(function(){

    var url = window.location.href;
    var filename = url.substr(url.lastIndexOf("/"))
    $('li a').each(function(){
        var href = $(this).attr('href').substr($(this).attr('href').lastIndexOf("/"));
        if(href == filename)
        $(this).addClass('mm-active')
    })


    const type_sell_maskoni = ['آپارتمان','ویلا','زمین مسکونی','کلنگی','مستغلات مسکونی','برج','پنت هاوس','برج باغ'];
    const type_rent_maskoni = ['آپارتمان','ویلا','مستغلات مسکونی','پنت هاوس','برج','برج باغ'];
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

    $("#price").keyup(function(){
        $("#pricetopersion").text(($("#price").val()*1000000).num2persian() + ' تومان ')
    })
    $("#rentrpice").keyup(function(){
        $("#renttopersion").text(($("#rentrpice").val()*1000000).num2persian() + ' تومان ')
    })
    $("#rent_month").keyup(function(){
        $("#rent_monthtopersion").text(($("#rent_month").val()*1000000).num2persian() + ' تومان ')
    })

    $("#adduser_price").keyup(function(){
        $("#adduser_price_small").text(($("#adduser_price").val()*1000000).num2persian() + ' تومان ')
    })

    $("#adduser_rent_annual").keyup(function(){
        $("#adduser_rent_annual_small").text(($("#adduser_rent_annual").val()*1000000).num2persian() + ' تومان ')
    })

    $("#adduser_rent_month").keyup(function(){
        $("#adduser_rent_month_small").text(($("#adduser_rent_month").val()*1000000).num2persian() + ' تومان ')
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
        $("#sell").css('opacity','1')
        $("#rent").css('opacity','.5')
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
      

        $("#datepickeruser").pDatepicker({
            format:"L"
        });



    if($("#what_kind_type").length){
        if($("#what_kind_type").val() == 'sell'){
            sellsection()
        }else{
            rentsection()
        }
        what_type = $("#what_type").val()
            $("#type_maskoni").append(
                `<option value="${what_type}" selected>${what_type}</option>`
        )
        what_wc = $("#what_wc").val()
        what_wc_arr = JSON.parse(what_wc)
        what_wc_arr.map((item)=>{
            $("#what_wc_selected").append(
                `<option value="${item}" selected>${item}</option>`
            )
        })
    }
    })
