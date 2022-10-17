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


	<?php foreach ($user as $row) :?>
		<div class="container">
			<div class="row">
				<div class="col s6 m7">
					<div class="card">
						<div class="card-content">
							<span class="card-title"><b>Detail Peminjaman Ruangan</b></span>
							<br>
							<?php echo form_open_multipart('Admin/edit_user/'.$row['id']);?>
							<form class="col s6" method="post">
								<div class="input-field">
									<input id="name" type="text" name="nama" required="" value="<?php echo $row['nama']?>" >
									<label for="
									name" ><b>Nama</b></label>
								</div>    
								<div class="input-field">
									<input id="username" type="text" name="username" required="" value="<?php echo $row['username']?>" >
									<label for="
									username" ><b>Nama Pengguna</b></label>
								</div>  
								<div class="input-field">
									<input id="password" type="password" name="password" required="" value="<?php echo $row['password']?>" >
									<label for="
									password" ><b>Kata Sandi</b></label>
								</div>  
								<div class="input-field">
									<select name="role">
										<?php if($row['role'] == 'admin') { ?>
											<option value="<?php echo $row['role']?>"><?php echo $row['role']?></option>
											<option value="approval">Approval</option>
										<?php } else {?> 
											<option value="<?php echo $row['role']?>"><?php echo $row['role']?></option>
											<option value="admin">Admin</option>
											
										<?php }?>
									</select>
									<label><b>Role</b></label>
								</div>

								<button class="btn blue darken-4" type="submit" name="update" value="update">Update
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach ?>

	<?php $this->load->view('v_footer')?>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/materialize.min.js')?>"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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