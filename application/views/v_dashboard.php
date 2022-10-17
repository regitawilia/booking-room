<?php $this->load->view('v_header')?>

<?php echo $this->session->flashdata('msg');?>
<!-- slider -->
<div id="index-banner" class="parallax-container">
	<div class="section no-pad-bot">
		<div class="container">
			<br><br>

		</div>
	</div>
	<div class="parallax">
		<img src="<?php echo base_url('/assets/img/perpus_salemba.png')?>" alt="Unsplashed background img 1" >
	</div>
</div>

<!-- content jadwal -->

<section id="jadwal" class="scrollspy">
	<div class="container">
		<br>
		<h3 class="center"> Agenda Peminjaman </h3>
		<br>
		<?php $this->load->view('v_agenda_2');?>
	</div>
</div>

</section>

<!-- ruangan -->

<section class="scrollspy light-blue lighten-5" id="ruangan">
	<div class="container">
		<div class="row">
			<br>
			<h3 class="center"> Ruangan </h3>

			<div class="row">
				<?php  
				foreach($ruangan as $row): ?>
					<div class="col s6 m4">
						<div class="card large">
							<div class="card-image waves-effect waves-block waves-light">
								<img class="activator" src="<?php echo $row->foto;?>">
							</div>
							<div class="card-content">
								<span class="card-title"><b><?php echo strtoupper($row->nama_ruangan);?></b></span>
								<p align="left"><?php echo $row->deskripsi_ruangan;?></p>
								<!-- <p align="left"><b>Kapasitas Ruangan</b> : <?php echo $row->kapasitas;?></p> -->
							</div>
							<div class="card-action light-blue darken-4">
								<a class="white-text" href="<?php echo base_url('home/detail_ruangan/'.$row->id)?>">Pinjam Ruangan</a>
							</div>
						</div>
					</div>
				<?php endforeach?>
			</div>
		</div>
	</div>
</section>


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