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

	<link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel = "stylesheet" href = "<?php echo base_url('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css')?>">
	<script type = "text/javascript" src = "<?php echo base_url('https://code.jquery.com/jquery-2.1.1.min.js')?>"></script>           
	<script src = "<?php echo base_url('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js')?>">
	</script> 
	
	<title>SiPiRang</title>
</head>

<body >


	<br>
	<br>
	<br>
	<br>
	<br>
	<div class="container">
		<div class="row">
			<div class="col s12">
				<div class="card horizontal card-login">
					<div class="card-image">
						<img src="<?php echo base_url('assets/img/login_3.png')?>">
					</div>
					<div class="card-stacked">
						<div class="card-content">
							<br>
							<br>
							<br>		
							<span class="card-title"><b>Log In</b></span>

							<?php if($this->session->flashdata('message_login_error')): ?>
								<div class="invalid-feedback">
									<?= $this->session->flashdata('message_login_error') ?>
								</div>
							<?php endif ?>

							<br>
							<?php echo form_open('Login/do_login');?>
							<form 
							method="post" action="<?php echo base_url('Login/do_login');?>">
							<div class="input-field">
								<input id="username" type="text" name="username" required="" value="<?php echo set_value('usermane');?>" placeholder="Silahkan isi dengan nama pengguna">
								<label for="
								nama_pic" class="active"><b>Nama Pengguna</b></label>
								<?php echo form_error('username'); ?>
							</div>        
							<div class="input-field">
								<input id="password" type="password" name="password" required="" value="<?php echo set_value('password');?>" placeholder="Silahkan isi dengan kata sandi">
								<label for="
								no_pic" class="active"><b>Kata Sandi</b></label>
								<?php echo form_error('password'); ?>
							</div>   

							<!-- <input type="hidden" name="id_ruangan" value="<?php echo $row->id; ?>" /> -->
							<button class="btn blue darken-4" type="submit" name="action" value="Login">Masuk
							</button>
							<?php echo $this->session->flashdata('login_error'); ?>

						</form>
						<?php form_close();?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/materialize.min.js')?>"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url('parallax/js/materialize.js')?>"></script>
<script src="<?php echo base_url('parallax/js/init.js')?>"></script>

<script type="text/javascript">
	var close = document.getElementsByClassName("closebtn");
	var i;

// Loop through all close buttons
for (i = 0; i < close.length; i++) {
  // When someone clicks on a close button
  close[i].onclick = function(){

    // Get the parent of <span class="closebtn"> (<div class="alert">)
    var div = this.parentElement;

    // Set the opacity of div to 0 (transparent)
    div.style.opacity = "0";

    // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>
</body>

