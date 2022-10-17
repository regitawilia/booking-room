<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/materialize.min.css')?>">
	<style type="text/css">
		section, footer{
			padding:  5px 0;
		}

	</style>

	
	<link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
	<script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
	<script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
	</script> 
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">


	<link rel="stylesheet" href="<?php echo base_url('calendar-20/fonts/icomoon/style.css')?>">

	<link href="<?php echo base_url('calendar-20/fullcalendar/packages/core/main.css')?>" rel='stylesheet' />
	<link href="<?php echo base_url('calendar-20/fullcalendar/packages/daygrid/main.css')?>" rel='stylesheet' />

<!-- 
 Bootstrap CSS
 <link rel="stylesheet" href="<?php echo base_url('s/css/bootstrap.min.css')?>"> -->

	<!-- Style 
		<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>"> -->

		

		
		<title>SiPiRang</title>
	</head>
	<body>
		<div class="navbar-fixed">
			<nav class="light-blue darken-4">
				<div class="container">
					<div class="nav-warapper">
						<img src="<?php echo base_url('assets/img/perpurnas_logo.png')?>" href="" width="60">
						<a href="<?php echo base_url('admin/dashboard')?>" class="brand-logo" >Sistem Peminjaman Ruangan</a>

						<ul class="right hide-on-med-and-down">
							<li><a class="list" href="<?php echo base_url('admin/dashboard')?>">Agenda Peminjaman</a></li>
							<li><a class="list" href="<?php echo base_url('admin/list_peminjaman')?>">Pengajuan</a></li>
							<li><a class="list" href="<?php echo base_url('admin/list_user')?>">Pengguna</a></li>
							<li><a class="list" href="<?php echo base_url('admin/log_list')?>">Aktiviitas Log </a></li>
							<li><a class="list" href="<?php echo base_url('login/logout')?>">Keluar</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>

		<!-- slider -->

		<!-- content jadwal -->

		<div class="container">
			<div class="row">
				<br>
				<h3 class="center"> Agenda Peminjaman </h3>
				<br>
				<?php $this->load->view('v_agenda_2');?>
			</div>
		</div>

		<!-- ruangan -->



		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="<?php echo base_url('parallax/js/materialize.js')?>"></script>
		<script src="<?php echo base_url('parallax/js/init.js')?>"></script>

		<script type="text/javascript">
			const scroll = document.querySelectorAll('.scrollspy');
			M.ScrollSpy.init(scroll,{
				scrollOffset: 50
			})
		</script>
		<?php $this->load->view('v_footer');?>
	</body>
	</html>