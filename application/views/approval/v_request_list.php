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

	<link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons')">
	<link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
	<script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
	<script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
	</script> 
	
	<title>SiPiRang</title>
</head>
<body>
	<div class="navbar-fixed">
		<nav class="light-blue darken-4">
			<div class="container">
				<div class="nav-warapper">
					<img src="<?php echo base_url('assets/img/perpurnas_logo.png')?>" href="" width="60">
					<a href="<?php echo base_url('approval/list_peminjaman')?>" class="brand-logo">Sistem Peminjaman Ruangan</a>
				</div>
			</div>
		</nav>
	</div>

	<div class="container">
		<div class="row">
			<br>
			<h4>Permohonan Peminjaman </h4>
			<ul class="tabs tabs-fixed-width tab-demo z-depth-1">
				<li class="tab"><a href="#test1">Belum Disetujui</a></li>
				<li class="tab"><a class="active" href="#test2">Sudah Disetujui</a></li>
				<li class="tab"><a class="active" href="#test3">Ditolak</a></li>
			</ul>
			<div id="test1" class="col s12">
				<div class="col s12">
					<table class="striped responsive-table">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama PIC</th>
								<th>No PIC</th>
								<th>Ruangan</th>
								<th>Nama Kegiatan</th>
								<th>Tanggal Mulai</th>
								<th>Tanggal Selesai</th>
								<th>Jam Mulai</th>
								<th>Jam Selesai</th>
								<th>Aksi</th>
							</tr>
						</thead>

						<tbody>

							<?php $no=1;
							foreach ($peminjaman_ruangan as $row) : ?>
								<tr>
									<td><?php echo $no++?></td>
									<td><?php echo $row['nama_pic'];?></td>
									<td><?php echo $row['no_pic'];?></td>
									<td><?php echo $row['nama_ruangan'];?></td>
									<td><?php echo $row['nama_kegiatan']?></td>
									<td><?php echo $row['tanggal_mulai']?></td>
									<td><?php echo $row['tanggal_selesai']?></td>
									<td><?php echo $row['jam_mulai']?></td>
									<td><?php echo $row['jam_selesai']?></td>
									<td>
										<a href="<?php echo base_url('approval/detail_approval/'.$row['id'])?>" class="btn-small blue darken-4">Lihat Detail</a>
									</td>


								</tr>
							<?php endforeach?>
						</tbody>

					</table>
				</div>

			</div>
			<div id="test2" class="col s12">

				<div class="col s12">
					<table class="striped responsive-table">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama PIC</th>
								<th>No PIC</th>
								<th>Ruangan</th>
								<th>Nama Kegiatan</th>
								<th>Tanggal Mulai</th>
								<th>Tanggal Selesai</th>
								<th>Jam Mulai</th>
								<th>Jam Selesai</th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody>

							<?php $no=1;
							foreach ($peminjaman_ruangan_approved as $row) : ?>
								<tr>
									<td><?php echo $no++?></td>
									<td><?php echo $row['nama_pic'];?></td>
									<td><?php echo $row['no_pic'];?></td>
									<td><?php echo $row['nama_ruangan'];?></td>
									<td><?php echo $row['nama_kegiatan']?></td>
									<td><?php echo $row['tanggal_mulai']?></td>
									<td><?php echo $row['tanggal_selesai']?></td>
									<td><?php echo $row['jam_mulai']?></td>
									<td><?php echo $row['jam_selesai']?></td>
									<td>
										<a href="<?php echo base_url('approval/detail_approval_2/'.$row['id'])?>" class="btn-small blue darken-4">Lihat Detail</a>
									</td>


								</tr>
							<?php endforeach?>
						</tbody>

					</table>
				</div>

			</div>

			<div id="test3" class="col s12">

				<div class="col s12">
					<table class="striped responsive-table">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama PIC</th>
								<th>No PIC</th>
								<th>Ruangan</th>
								<th>Nama Kegiatan</th>
								<th>Tanggal Mulai</th>
								<th>Tanggal Selesai</th>
								<th>Jam Mulai</th>
								<th>Jam Selesai</th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody>

							<?php $no=1;
							foreach ($peminjaman_ruangan_rejected as $row) : ?>
								<tr>
									<td><?php echo $no++?></td>
									<td><?php echo $row['nama_pic'];?></td>
									<td><?php echo $row['no_pic'];?></td>
									<td><?php echo $row['nama_ruangan'];?></td>
									<td><?php echo $row['nama_kegiatan']?></td>
									<td><?php echo $row['tanggal_mulai']?></td>
									<td><?php echo $row['tanggal_selesai']?></td>
									<td><?php echo $row['jam_mulai']?></td>
									<td><?php echo $row['jam_selesai']?></td>
									<td>
										<a href="<?php echo base_url('approval/detail_approval_2/'.$row['id'])?>" class="btn-small blue darken-4">Lihat Detail</a>
									</td>


								</tr>
							<?php endforeach?>
						</tbody>

					</table>
				</div>

			</div>


		</div>
	</div>

	<!-- modal panduan -->
	<div id="modal1" class="modal">
		<div class="modal-content">
			<img src="<?php echo base_url('assets/img/approval.png')?>">
		</div>
		<div class="modal-footer close">
			<button class="modal-close btn-small blue darken-4">Close</button>
		</div>
	</div>
	
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/materialize.min.js')?>"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


	<script type="text/javascript">
		document.addEventListener('DOMContentLoaded', function() {
			var elems = document.querySelectorAll('.modal');
			var instances = M.Modal.init(elems);
		});

		$(document).ready(function() {
			M.updateTextFields();
			$('.tabs').tabs();
		});
		
		document.addEventListener('DOMContentLoaded', function() {
			var elems = document.querySelectorAll('.sidenav');
			var instances = M.Sidenav.init(elems);
		});

	</script>
	<?php $this->load->view('v_footer');?>
</body>
</html>



