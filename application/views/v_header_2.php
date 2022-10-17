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

		div, label{
			font-size: 80;
		}
	</style>
	<link rel = "stylesheet" href = "<?php echo base_url('https://fonts.googleapis.com/icon?family=Material+Icons')?>">
	<link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel = "stylesheet" href = "<?php echo base_url('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css')?>">
	<script type = "text/javascript" src = "<?php echo base_url('https://code.jquery.com/jquery-2.1.1.min.js')?>"></script>           
	<script src = "<?php echo base_url('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js')?>">
	</script> 
	
	<title>SiPiRang</title>
</head>
<body>
	<div class="navbar-fixed">
		<nav class="light-blue darken-4">
			<div class="container">
				<div class="nav-warapper">
					<img src="<?php echo base_url('assets/img/perpurnas_logo.png')?>" href="" width="60">
					<a href="<?php echo base_url('home')?>" class="brand-logo">Sistem Peminjaman Ruangan</a>

					<ul class="right hide-on-med-and-down">
						<li><a class="list" href="<?php echo base_url('home')?>">Agenda</a></li>
						<li><a class="list" href="<?php echo base_url('home')?>">Ruangan</a></li>
						<li><a href="#modal2" class="modal-trigger">Panduan</a></li>
						<li>
							<a href="#modal1" class="btn-small light-blue modal-trigger">cek proses peminjaman</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>

	<!-- modal cekstatus -->
	<div id="modal1" class="modal">
		<?php echo form_open('peminjaman/search')?>
		<div class="modal-content">
			<div class="input-field">
				<input id="search" type="search" name="keyword" placeholder="masukkan kode booking" >
				<label class="label-icon" for="search"></label>
				<i class="material-icons">close</i>
			</div>
		</div>
		<div class="modal-footer close">
			<button class="modal-close btn-small blue darken-4">Cari</button>
		</div>
		<?php echo form_close() ?>
	</div>

	<!-- modal panduan -->
	<div id="modal2" class="modal">
		<div class="modal-content">
			<img src="<?php echo base_url('assets/img/alur.png')?>">
		</div>
		<div class="modal-footer close">
			<button class="modal-close btn-small blue darken-4">Close</button>
		</div>
	</div>
	<script type="text/javascript" src="<?php echo base_url('assets/js/materialize.min.js')?>"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> 
	<!-- js materializecss -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<!-- jquery with datatable -->
	<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/datatable.js')?>"></script>

	<script type="text/javascript">
		document.addEventListener('DOMContentLoaded', function() {
			var elems = document.querySelectorAll('.modal');
			var instances = M.Modal.init(elems);
		});
	</script>