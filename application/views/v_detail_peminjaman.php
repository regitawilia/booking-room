<?php $this->load->view('v_header_2')?>


<div class="container">
	<div class="row">
		<?php foreach ($peminjaman_ruangan as $row) :?>
			<div class="col s6 m7">
				<div class="card">
					<div class="card-content">
						<span class="card-title"><b>Detail Peminjaman Ruangan</b></span>
						<br>
						<?php echo form_open_multipart('Approval/approve_data/'.$row['id']);?>
						<form class="col s6" method="post">
							<div class="input-field">
								<input id="kode_booking" type="text" name="kode_booking" required="" placeholder="silahkan isi dengan nama pic" value="<?php echo $row['kode_booking']?>" disabled>
								<label for="
								nama_pic"><b>Kode Peminjaman</b></label>
							</div> 
							<div class="input-field">
								<input id="nama_ruangan" type="text" name="nama_ruangan" required="" placeholder="silahkan isi dengan nama pic" value="<?php echo $row['nama_ruangan']?>" disabled>
								<label for="
								nama_pic"><b>Ruangan</b></label>
							</div> 
							<div class="input-field">
								<input id="nama_pic" type="text" name="nama_pic" required="" placeholder="silahkan isi dengan nama pic" value="<?php echo $row['nama_pic']?>" disabled>
								<label for="
								nama_pic"><b>Nama PIC</b></label>
							</div>        
							<div class="input-field">
								<input id="no_pic" type="text" name="no_pic" required="" placeholder="silahkan isi dengan nomor yang bisa dihubungi" value="<?php echo $row['no_pic']?>" disabled>
								<label for="
								no_pic" ><b>Nomor Telp. PIC</b></label>
							</div>   
							<div class="input-field">
								<input id="unit_kerja" type="text" name="unit_kerja" required="" placeholder="silahkan isi unit kerja" value="<?php echo $row['unit_kerja']?>" disabled>
								<label for="
								unit_kerja" ><b>Unit Kerja</b></label>
							</div>  
							<div class="input-field">
								<input id="nama_kegiatan" type="text" name="nama_kegiatan" required=""placeholder="silahkan isi dengan nama kegiatan" value="<?php echo $row['nama_kegiatan']?>" disabled>
								<label for="
								nama_kegiatan" ><b>Nama Kegiatan</b></label>
							</div> 
							<!-- <div class="input-field">
								<input id="jumlah_undangan" type="number" name="jumlah_undangan" required="" placeholder="jumlah undangan" value="<?php echo $row['jumlah_undangan']?>" disabled>
								<label for="
								jumlah_undangan" ><b>Jumlah Undangan</b></label>
							</div>    
							<div class="input-field">
								<input id="pimpinan_hadir" type="number" name="pimpinan_hadir" required="" placeholder="berapa jumlah pimpinan yang hadir" value="<?php echo $row['pimpinan_hadir']?>" disabled>
								<label for="
								pimpinan_hadir" ><b>Pimpinan Yang Hadir</b></label>
							</div>  --> 
							<div class="input-field">
								<input id="tanggal_mulai" type="date" name="tanggal_mulai" required="" value="<?php echo $row['tanggal_mulai']?>" disabled>
								<label for="
								tanggal_mulai" ><b>Tanggal Mulai</b></label>
							</div>    
							<div class="input-field">
								<input id="tanggal_selesai" type="date" name="tanggal_selesai" required="" value="<?php echo $row['tanggal_selesai']?>" disabled>
								<label for="
								tanggal_selesai" ><b>Tanggal Selesai</b></label>
							</div>
							<div class="input-field">
								<input id="jam_mulai" type="time" name="jam_mulai" required="" value="<?php echo $row['jam_mulai']?>" disabled>
								<label for="
								jam_mulai" ><b>Jam Mulai</b></label>
							</div>    
							<div class="input-field">
								<input id="jam_selesai" type="time" name="jam_selesai" required="" value="<?php echo $row['jam_selesai']?>" disabled>
								<label for="
								jam_selesai" ><b>Jam Selesai</b></label>
							</div>   
						</form>
					</div>
				</div>
			</div>
		<?php endforeach?>
		

		<div class="col s6 m5">
			<div class="card">
				<div class="card-content">
					<h7><b>Proses peminjaman</b></h7>
					<ul class="collection">
						<?php foreach ($approval_log as $log):?>
							<li class="collection-item avatar">
								<?php if($log['status_pengajuan']=='2'){?>
									<img src="<?php echo base_url('assets/img/approve.png')?>" alt="" class="circle">
									<span class="title green">Peminjaman ruangan diterima</span>
									<p><?php echo $log['tanggal_pengajuan']?></p>
								<?php } else if($log['status_pengajuan']=='1'){?>
									<img src="<?php echo base_url('assets/img/send.png')?>" alt="" class="circle">
									<span class="title blue">Mengajukan peminjaman ruangan</span>
									<p><?php echo $log['tanggal_pengajuan']?></p>
								<?php } else { ?>
									<img src="<?php echo base_url('assets/img/false.png')?>" alt="" class="circle">
									<span class="title red">Peminjaman ruangan ditolak</span>
									<p><?php echo $log['tanggal_pengajuan']?></p>
								<?php } ?>
							</li>
						<?php endforeach?>	
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/materialize.min.js')?>"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<?php $this->load->view('v_footer')?>
</body>
</html>