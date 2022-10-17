<div class="row">
	<div id="calendar"></div>
</div>

<link href="<?php echo base_url('calendar/lib/main.css')?>" rel='stylesheet' />
<script src="<?php echo base_url('calendar/lib/main.js')?>"></script>
<script src="<?php echo base_url('calendar/lib/locale-all.js')?>"></script>
<script type="text/javascript">
	document.addEventListener('DOMContentLoaded', function() {

		var calendarEl = document.getElementById('calendar');
		var calendar = new FullCalendar.Calendar(calendarEl, {
			headerToolbar: {
				left: 'prev,next today',
				center: 'title',
				right: 'dayGridMonth,timeGridWeek'
			},
			initialView: 'dayGridMonth',
			timeZone: 'Asia/Jakarta',
			locale: 'id',
			events: {
				url: 'http://localhost/booking-room/Home/peminjaman',
				method :'POST',
				failure: function() {
					alert('There was an error while fetching events.');
				}
			},
			// events:'http://localhost/booking-room/Home/peminjaman'
			
		});
		calendar.render();
	});

</script>