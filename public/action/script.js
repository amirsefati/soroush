var url = window.location.href;
var filename = url.substr(url.lastIndexOf("/"))

if(filename === "/action")
{
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar_actoin');

    var actionss = $("#actions").val()

    var eventss = []

    JSON.parse(actionss).map(item=>{
      if(item.kind == 1){
        kk = 'بازدید ملک'
        color = '#29274C'
      }else if(item.kind == 2){
        kk = 'نشست قرارداد'
        color = '#BB0A21'
      }else if(item.kind == 3){
        kk = ' کارشناسی ملک'
        color = '#F5CB5C'
      }else if(item.kind == 4){
        kk = ' یادآوری تماس'
        color = '#D72483'
      }else if(item.kind == 5){
        kk = item.title
      }

      link = "hi"
      var p = {
        title: kk,
        start: item.date, 
        backgroundColor:color,
        file_id : item.file_id,
        client_id : item.client_id,
        text : item.text

      }
      eventss.push(p)
    })

    var calendar = new FullCalendar.Calendar(calendarEl, {
      locale: 'fa',

      eventClick: function(info) {
        action_showdetails(info)
      },


      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,listWeek'
      },
      initialDate: '2021-05-10',
      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectMirror: true,
      
      dayMaxEvents: true, // allow "more" link when too many events
      events: eventss,
      timeFormat: 'H(:mm)'
    });

    calendar.render();
  });

  function myFunction32() {
    document.getElementById("myDropdown").classList.toggle("show");
  }

  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }

}