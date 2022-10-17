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
		<div class="row">
			<br>
			<h4>User </h4>
			<button data-target="modaladd" class="btn-small blue darken-4 modal-trigger">Tambah Pengguna</button>
			<div class="col s12">
				<table id="table" class="striped responsive-table">
					<thead>
						<tr>
							<th>No</th>
							<th>Username</th>
							<th>Kata Sandi</th>
							<th>Role</th>
							<th>Aksi</th>
						</tr>
					</thead>

					<tbody>

						<?php $no=1;
						foreach ($user as $row) : ?>
							<tr>
								<td><?php echo $no++?></td>
								<td><?php echo $row['username'];?></td>
								<td><?php echo $row['password'];?></td>
								<td><?php echo $row['role'];?></td>
								<td>
									<a class="btn-small blue darken-4" href="<?php echo base_url('Admin/detail_user/'.$row['id'])?>">Lihat Detail</a>
								</td>
							</tr>
						<?php endforeach?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Modal Add User -->
	<div id="modaladd" class="modal">
		<div class="modal-content">
			<h5>Form Tambah User</h5>
			<br>
			<div class="row">						
				<form class="col s12" method="post" action="<?php echo base_url().'Admin/add_user';?>">
					<div class="input-field">
						<input id="nama" type="text" name="nama" required="" placeholder="silahkan isi dengan nama lengkap">
						<label for="nama" ><b>Nama</b></label>
					</div> 
					<div class="input-field">
						<input id="username" type="text" name="username" required="" placeholder="silahkan isi dengan username">
						<label for="username" ><b>Username</b></label>
					</div>
					<div class="input-field">
						<input id="password" type="password" name="password" required="" placeholder="silahkan isi dengan password">
						<label for="password" ><b>Password</b></label>
					</div>
					<div class="input-field">
						<select name="role">
							<option value="" disabled selected>Choose your option</option>
							<option value="admin">Admin</option>
							<option value="approval">Approval</option>
						</select>
						<label><b>Role</b></label>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn-small blue darken-4">Submit</button>
				</div>
			</form>
		</div>
	</div>

	<!-- Modal edit user  -->
	<div id="modaledit" class="modal">
		<div class="modal-content">
			<h5>Detail User</h5>
			<br>
			<div class="row">						
				<form class="col s12" method="post" action="<?php echo base_url().'Admin/update_user';?>">
					<div class="input-field">
						<input id="nama" type="text" name="nama" required="" value="" placeholder="silahkan isi dengan nama lengkap" value="<?php echo $row['name']?>">
						<label for="nama" ><b>Nama</b></label>
					</div> 
					<div class="input-field">
						<input id="username" type="text" name="username" required="" placeholder="silahkan isi dengan username">
						<label for="username" ><b>Username</b></label>
					</div>
					<div class="input-field">
						<input id="password" type="password" name="password" required="" placeholder="silahkan isi dengan password">
						<label for="password" ><b>Password</b></label>
					</div>
					<div class="input-field">
						<select name="role">
							<option value="" disabled selected>Choose your option</option>
							<option value="admin">Admin</option>
							<option value="approval">Approval</option>
						</select>
						<label><b>Role</b></label>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn-small blue darken-4">Update</button>
				</div>
			</form>
		</div>
	</div>

	<?php $this->load->view('v_footer')?>
	
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

		document.addEventListener('DOMContentLoaded', function() {
			var elems = document.querySelectorAll('select');
			var instances = M.FormSelect.init(elems);
		});

		$(document).ready(function () {
			$('#table').DataTable();
		});
	</script>
</body>
</html>