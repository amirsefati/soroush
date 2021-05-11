var url = window.location.href;
var filename = url.substr(url.lastIndexOf("/"))

if(filename === "/action")
{
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar_actoin');

    var actionss = $("#actions").val()
    
    var calendar = new FullCalendar.Calendar(calendarEl, {
      locale: 'fa',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,listWeek'
      },
      initialDate: '2020-09-12',
      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectMirror: true,
      select: function(arg) {
        var title = prompt('Event Title:');
        if (title) {
          calendar.addEvent({
            title: title,
            start: arg.start,
            end: arg.end,
            allDay: arg.allDay
          })
        }
        calendar.unselect()
      },
      eventClick: function(arg) {
        if (confirm('Are you sure you want to delete this event?')) {
          arg.event.remove()
        }
      },
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
        {
          title: 'بازدید از محل',
          start: '2020-09-12',
          end: '2020-09-14',
          url: 'http://google.com/',
        },
      ]
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