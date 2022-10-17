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
	<link rel = "stylesheet" href = "<?php echo base_url('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css')?>">
	<script type = "text/javascript" src = "<?php echo base_url('https://code.jquery.com/jquery-2.1.1.min.js')?>"></script>         
	<script src = "<?php echo base_url('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js')?>">
	</script> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/materialize.js')?>"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap.min.css">

	<title>SiPiRang</title>
</head>
<body>
	<div class="navbar-fixed">
		<nav class="light-blue darken-4">
			<div class="container">
				<div class="nav-warapper">
					<img src="<?php echo base_url('assets/img/perpurnas_logo.png')?>" href="" width="60">
					<a href="<?php echo base_url('admin/dashboard')?>" class="brand-logo">Sistem Peminjaman Ruangan</a>

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

	<div class="container">
		<br>
		<h4>Permohonan Peminjaman </h4>
		<div class="col s6 offset-s6"> <a class="btn-small" href="<?php echo base_url('Admin/export_pengajuan')?>">UNDUH PEMINJAMAN</a></div>
		<br>
		<div class="col s12">
			<div class="col s12">
				<table id="example" class="table table-striped" style="width:100%">
					<thead>
						<tr>
							<th>No</th>
							<th>ID Peminjaman</th>
							<th>Nama PIC</th>
							<th>No PIC</th>
							<th>Ruangan</th>
							<th>Tanggal Mulai</th>
							<th>Tanggal Selesai</th>
							<th>Jam Mulai</th>
							<th>Jam Selesai</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>

					<tbody>

						<?php $no=1;
						foreach ($peminjaman_ruangan as $row) : ?>
							<tr>
								<td><?php echo $no++?></td>
								<td><?php echo $row['id']?></td>
								<td><?php echo $row['nama_pic'];?></td>
								<td><?php echo $row['no_pic'];?></td>
								<td><?php echo $row['nama_ruangan'];?></td>
								<td><?php echo $row['tanggal_mulai']?></td>
								<td><?php echo $row['tanggal_selesai']?></td>
								<td><?php echo $row['jam_mulai']?></td>
								<td><?php echo $row['jam_selesai']?></td>
								<td>
									<?php if($row['status'] == '1') { ?>
										Belum Disetujui
									<?php } else if ($row['status'] == '2') { ?>
										Disetujui
									<?php } else { ?>
										Ditolak
									<?php } ?>
								</td>
								<td>
									<a href="<?php echo base_url('admin/detail_request/'.$row['id'])?>" class="btn-small blue darken-4">Lihat Detail</a>
								</td>
							</tr>
						<?php endforeach?>
					</tbody>
				</table>
			</div>
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


		$(document).ready(function () {
			$('#example').DataTable();
		});

		// $(document).ready(function() {
		// 	M.updateTextFields();
		// 	$('.tabs').tabs();
		// });


	</script>
	<?php $this->load->view('v_footer');?>
</body>
</html>



