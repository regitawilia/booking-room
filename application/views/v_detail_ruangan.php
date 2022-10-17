<?php $this->load->view('v_header_2')?>

<?php foreach ($ruangan as $row): ?>
	<div class="container">

		<!-- Deskripsi Ruangan -->
		<div class="row">
			<div class="col s6 m6">
				<div class="card">
					<div class="card-image">
						<img src="<?php echo base_url($row->foto);?>">
					</div>
					<div class="card-content">
						<span class="card-title"><b><?php echo strtoupper($row->nama_ruangan);?></b></span>
						<p align="left"><?php echo $row->deskripsi_ruangan;?></p>
						<br>
						<p align="left">
							<?php if ($row->id == '1') {?>
								<?php $this->load->view('kapasitas_ruangan/v_studio')?>
							<?php } else if ($row->id == '3') { ?>
								<?php $this->load->view('kapasitas_ruangan/v_podcast')?>
							<?php } else if ($row->id == '4' || $row->id=='5') { ?>
								<?php $this->load->view('kapasitas_ruangan/v_r_interaktif')?>
							<?php } else if ($row->id == '6') { ?>
								<?php $this->load->view('kapasitas_ruangan/v_labkom')?>
							<?php } else { ?>
								<?php $this->load->view('kapasitas_ruangan/v_kelas')?>

							<?php } ?>
						</p>
						<br>
						<p align="left"><b>Fasilitas</b> : 
							<?php if ($row->id == '1') {?>
								<?php $this->load->view('ruangan/v_studio')?>
							<?php } else if ($row->id == '3') { ?>
								<?php $this->load->view('ruangan/v_podcast')?>
							<?php } else if ($row->id == '4' || $row->id=='5') { ?>
								<?php $this->load->view('ruangan/v_r_interaktif')?>
							<?php } else if ($row->id == '6') { ?>
								<?php $this->load->view('ruangan/v_labkom')?>
							<?php } else { ?>
								<?php $this->load->view('ruangan/v_kelas')?>
							<?php } ?>
						</p>

						<?php $this->load->view('v_tata_tertib')?>
					</div>
				</div>
			</div>

			<!-- Form Peminjaman Ruangan -->

			<div class="col s6 m6">
				<div class="card">
					<div class="card-content">
						<span class="card-title"><b>Form Peminjaman Ruangan</b></span>
						<p> tanda * = data wajib diisi</p>
						<br>
						<?php echo form_open_multipart('Peminjaman/addPinjam');?>
						<form class="col s6"
						method="post" action="<?php echo base_url().'Peminjaman/addPinjam';?>">

						<div class="input-field">
							<input id="nama_pic" type="text" name="nama_pic" required="" placeholder="silahkan isi dengan nama pic">
							<label for="
							nama_pic"><b>Nama Peminjam*</b></label>
						</div>        
						<div class="input-field">
							<input id="no_pic" type="text" name="no_pic" required="" placeholder="silahkan isi dengan nomor yang bisa dihubungi">
							<label for="
							no_pic" ><b>Nomor Telp. Peminjam*</b></label>
						</div>   
						<div class="input-field">
							<input id="unit_kerja" type="text" name="unit_kerja" required="" placeholder="silahkan isi unit kerja">
							<label for="
							unit_kerja" ><b>Unit Kerja* </b></label>
						</div>  
						<div class="input-field">
							<input id="nama_kegiatan" type="text" name="nama_kegiatan" required=""placeholder="silahkan isi dengan nama kegiatan">
							<label for="
							nama_kegiatan" ><b>Nama Kegiatan*</b></label>
						</div> 
						<!-- <div class="input-field">
							<input id="jumlah_undangan" type="number" name="jumlah_undangan" required="" placeholder="jumlah undangan">
							<label for="
							jumlah_undangan" ><b>Jumlah Undangan*</b></label>
						</div>    
						<div class="input-field">
							<input id="pimpinan_hadir" type="number" name="pimpinan_hadir" required="" placeholder="berapa jumlah pimpinan yang hadir">
							<label for="
							pimpinan_hadir" ><b>Pimpinan Yang Hadir*</b></label>
						</div>   -->
						<div class="input-field">
							<input id="tanggal_mulai" type="date" name="tanggal_mulai" required="">
							<label for="
							tanggal_mulai" ><b>Tanggal Mulai*</b></label>
						</div>    
						<div class="input-field">
							<input id="tanggal_selesai" type="date" name="tanggal_selesai" required="">
							<label for="
							tanggal_selesai" ><b>Tanggal Selesai*</b></label>
						</div>
						<div class="input-field">
							<input id="jam_mulai" type="time" name="jam_mulai" required="">
							<label for="
							jam_mulai" ><b>Jam Mulai*</b></label>
						</div>    
						<div class="input-field">
							<input id="jam_selesai" type="time" name="jam_selesai" required="">
							<label for="
							jam_selesai" ><b>Jam Selesai*</b></label>
						</div>   
						<div class="file-field input-field">

							<div class="btn light-blue lighten-2">
								<span>Browse</span>
								<input type="file" id="surat_udangan" name="userfile">
							</div>
							<?php echo $this->session->flashdata('msg');?>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text" placeholder="Silahkan Upload Surat Permohonan" id="surat_udangan" required>
								<span class="helper-text" data-error="wrong" data-success="right">* format PDF</span>
							</div>
						</div> 

						<input type="hidden" name="id_ruangan" value="<?php echo $row->id; ?>" />
						<!-- <input type="hidden" name="kode_booking" value="PSDK00<?php echo $row->kode_booking?>"/> -->
						<button class="btn blue darken-4" type="submit" name="action">Kirim</button>

						<?php echo $this->session->flashdata('msg');?>

					</form>
					<?php echo form_close();?>

				</div>
			</div>
		</div>
	</div>
</div>
<?php endforeach ?>  

<script type="text/javascript" src="<?php echo base_url('assets/js/materialize.min.js')?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('select').formSelect();
	});	

</script>

<?php $this->load->view('v_footer');?>
</body>
</html>