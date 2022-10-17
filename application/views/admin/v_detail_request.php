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

	<?php foreach ($peminjaman_ruangan as $row) :?>
		<div class="container">
			<div class="row">
				<div class="col s6 m7">
					<div class="card">
						<div class="card-content">
							<span class="card-title"><b>Detail Peminjaman Ruangan</b></span>
							<br>
							<?php echo form_open_multipart('Admin/approve_data/'.$row['id']);?>
							<form class="col s6" method="post">
								<div class="input-field">
									<input id="kode_booking" type="text" name="kode_booking" required="" placeholder="silahkan isi dengan nama pic" value="<?php echo $row['kode_booking']?>" disabled>
									<label for="
									kode_booking"><b>Kode Booking</b></label>
								</div> 
								<div class="input-field">
									<input id="nama_ruangan" type="text" name="nama_ruangan" required="" placeholder="silahkan isi dengan nama pic" value="<?php echo $row['nama_ruangan']?>" disabled>
									<label for="
									nama_ruangan"><b>Ruangan</b></label>
								</div> 
								<div class="input-field">
									<input id="nama_pic" type="text" name="nama_pic" required="" placeholder="silahkan isi dengan nama pic" value="<?php echo $row['nama_pic']?>">
									<label for="
									nama_pic"><b>Nama PIC</b></label>
								</div>        
								<div class="input-field">
									<input id="no_pic" type="text" name="no_pic" required="" placeholder="silahkan isi dengan nomor yang bisa dihubungi" value="<?php echo $row['no_pic']?>" >
									<label for="
									no_pic" ><b>Nomor Telp. PIC</b></label>
								</div>   
								<div class="input-field">
									<input id="unit_kerja" type="text" name="unit_kerja" required="" placeholder="silahkan isi unit kerja" value="<?php echo $row['unit_kerja']?>" >
									<label for="
									unit_kerja" ><b>Unit Kerja</b></label>
								</div>  
								<div class="input-field">
									<input id="nama_kegiatan" type="text" name="nama_kegiatan" required=""placeholder="silahkan isi dengan nama kegiatan" value="<?php echo $row['nama_kegiatan']?>" >
									<label for="
									nama_kegiatan" ><b>Nama Kegiatan</b></label>
								</div> 
								<!-- <div class="input-field">
									<input id="jumlah_undangan" type="number" name="jumlah_undangan" required="" placeholder="jumlah undangan" value="<?php echo $row['jumlah_undangan']?>" >
									<label for="
									jumlah_undangan" ><b>Jumlah Undangan</b></label>
								</div>    
								<div class="input-field">
									<input id="pimpinan_hadir" type="number" name="pimpinan_hadir" required="" placeholder="berapa jumlah pimpinan yang hadir" value="<?php echo $row['pimpinan_hadir']?>" >
									<label for="
									pimpinan_hadir" ><b>Pimpinan Yang Hadir</b></label>
								</div>  --> 
								<div class="input-field">
									<input id="tanggal_mulai" type="date" name="tanggal_mulai" required="" value="<?php echo $row['tanggal_mulai']?>" >
									<label for="
									tanggal_mulai" ><b>Tanggal Mulai</b></label>
								</div>    
								<div class="input-field">
									<input id="tanggal_selesai" type="date" name="tanggal_selesai" required="" value="<?php echo $row['tanggal_selesai']?>" >
									<label for="
									tanggal_selesai" ><b>Tanggal Selesai</b></label>
								</div>
								<div class="input-field">
									<input id="jam_mulai" type="time" name="jam_mulai" required="" value="<?php echo $row['jam_mulai']?>" >
									<label for="
									jam_mulai" ><b>Jam Mulai</b></label>
								</div>    
								<div class="input-field">
									<input id="jam_selesai" type="time" name="jam_selesai" required="" value="<?php echo $row['jam_selesai']?>" >
									<label for="
									jam_selesai" ><b>Jam Selesai</b></label>
								</div>   

								<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
								<?php if ($row['status'] == 1){?>
									<button class="btn blue darken-4" type="submit" name="approve" value="approve">Terima
									</button>
									<button class="btn red darken-4" type="submit" name="reject" value="reject">Tolak
									</button>
								<?php }?>
							</form>
						</div>
					</div>
				</div>

				<div class="col s6 m5">
					<div class="card">
						<div class="card-content">
							<h7>Surat Permohonan</h7>
							<br>
							<a href="<?php echo base_url().'peminjaman/download_surat/'.$row['id']?>">Unduh Surat</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach?>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/materialize.min.js')?>"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html>