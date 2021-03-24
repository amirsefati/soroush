$('document').ready(function(){

    var url = window.location.href;
    var filename = url.substr(url.lastIndexOf("/"))
    $('li a').each(function(){
        var href = $(this).attr('href').substr($(this).attr('href').lastIndexOf("/"));
        if(href == filename)
        $(this).addClass('mm-active')
    })


    const type_sell_maskoni = ['آپارتمان','ویلا','زمین مسکونی','کلنگی','مستغالت مسکونی','برج','پنت هاوس','برج باغ'];
    const type_rent_maskoni = ['آپارتمان','ویلا','زمین مسکونی','مستغالت مسکونی','پنت هاوس','برج','برج باغ'];
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

    
      
    $( "#type_maskoni" ).change(function() {
        if($('#type_maskoni').val() === 'زمین مسکونی'){
            $("#age").hide( )
            $("#floor").hide()
            $("#bedroom_number").hide()  
        }else{
            $("#age").prop( "disabled", false )
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

    

    //when click on sell button 
    $("#sell").click(function(){
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

    })
  
   
    //when click on rent button 
    $("#rent").click(()=>{
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
      });
   
      $(".all_customers").select2({
        dir: "rtl",
        language:'fa'
      });

      

})
