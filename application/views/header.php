<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>April Water</title>
		<script src="<?php echo base_url('assets/js/')?>jquery.js"></script>
		<script src="<?php echo base_url('assets/js/')?>popper.js"></script>
		<script src="<?php echo base_url('assets/js/')?>bootstrap.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
		  integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/')?>bootstrap.min.css">
  </head>
  <style>
        .floating:hover,
        .floating:focus {
            box-shadow: 0 0.5em 0.5em -0.4em var(--hover);
            transform: translateY(-0.25em);
            transition: 0.25s;
        }
        html {
	position: relative;
	min-height: 100%;
}

body {
	/* Margin bottom by footer height */
	margin-bottom: 0px;
}

.footer {
	position: absolute;
	bottom: 0;
	width: 100%;
	height: 0px;
	background-color: #f5f5f5;
}
    </style>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <a class="navbar-brand" href="">April Water</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()?>">Home</a>
      </li>
      <?php if ($this->session->userdata('user_priv')=="Pelanggan") {
        ?>
        <li class="nav-item">
          <a class="nav-link" href="kritik">Kritik & Saran</a>
        </li>
        <?php
      } elseif ($this->session->userdata('user_priv')=="Kasir") {
        ?>
        <li class="nav-item">
          <a class="nav-link" href="transaksi">History Transaksi</a>
        </li>
        <?php
      } elseif ($this->session->userdata('user_priv')=="Distri") {
        ?>
        <li class="nav-item">
          <a class="nav-link" href="pengiriman">History Pengiriman</a>
        </li>
        <?php
      } elseif ($this->session->userdata('user_priv')=="Admin") {
        ?>
        <li class="nav-item">
          <a class="nav-link" href="profit">Rekap Keuntungan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="review">Komentar Netizen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="karyawan">Registrasi Karyawan</a>
        </li>
        <?php
      } ?>

    </ul>
    <form class="form-inline my-2 my-lg-0">
    <div class="input-group">
    <span class="input-group-text"><?php echo $this->session->userdata("user_nama") ?></span>
    <div class="input-group-append">
    <a class="nav-link btn btn-outline-danger" href="<?php echo $actual_link?>/logout">Logout<span class="sr-only">(current)</span></a>
    </div>
    </form>
    </div>
  </div>
</nav>