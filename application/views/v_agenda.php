<div class="row">
  <div id='calendar'></div>
</div>



<script src="calendar-20/js/jquery-3.3.1.min.js"></script>
<script src="calendar-20/js/popper.min.js"></script>
<script src="calendar-20/js/bootstrap.min.js"></script>

<script src='calendar-20/fullcalendar/packages/core/main.js'></script>
<script src='calendar-20/fullcalendar/packages/interaction/main.js'></script>
<script src='calendar-20/fullcalendar/packages/daygrid/main.js'></script>
<script src='calendar-20/fullcalendar/packages/timegrid/main.js'></script>
<script src='calendar-20/fullcalendar/packages/list/main.js'></script>



<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    const currentDate = new Date();
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    currentDate.toLocaleString('id-ID', options);
    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
      height: 'parent',
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,listWeek'
      },
      defaultView: 'dayGridMonth',
      defaultDate: '2022-09-01',
      navLinks: true, // can click day/week names to navigate views
      editable: false,
      eventLimit: true, // allow "more" link when too many events
      events: [
      {
        title: 'All Day Event',
        start: '2022-09-01',
      },
      {
        title: 'All Day Event 2',
        start: '2022-09-01',
      },
      {
        title: 'Long Event',
        start: '2022-09-08',
        end: '2022-09-12',
      }
      ]
    });

    calendar.render();
  });

</script>

<script src="js/main.js"></script>
</body>
</html>