<!DOCTYPE html>
  <html>
    <head>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/contact/css/materialize.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/contact/css/style.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/contact/css/materialalert.css"  media="screen,projection"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Contact Us</title>
	</head>
	<style>
		.gambar img{
			width:110%;
		}
	
		h5{
			font-family:cursive;
		}
	</style>

    <body>
		<!--Navbar-->
		<!--End Navbar-->
		<!--Main-->
		<?php if ($this->session->flashdata('flash')) : ?>
		<div class="row notifikasi">
			<div class="flexbox">
					<div class="materialert">
						<i class="material-icons">check_circle</i> <span><?=$this->session->flashdata('flash'); ?></span>
				</div>
			</div>
		</div>
	<?php endif; ?>

		<main>
			<div class="container" style="padding-top:20vh">
				<div class="row">
					<div class="col l6 m12 s12 gambar ">
						<img src="<?php echo base_url(); ?>assets/contact/img/pesan.png" alt="">
					</div>
					
					<form action="<?= base_url();?>kritik/createPesan" method ="post" class="col l6 m12 s12 coba">
					<h5>Sampaikan Saran Anda!</h5>
						<div class="row">
							<div class="input-field col s12">
								<textarea id="textarea1" class="materialize-textarea" name="pesan" required></textarea>
								<label for="textarea1">Pesan</label>
							</div>
						</div>
						<p class="right-align">
						<button class="btn waves-effect waves-light" type="submit" name="action">Kirim
							<i class="material-icons right">send</i>
						</button>
						</p>
					</form>
				</div>
			 </div>
		</main>
		<!--End Main-->
		<!--The JS-->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/contact/js/materialize.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/contact/js/script.js"></script>
    </body>
  </html>