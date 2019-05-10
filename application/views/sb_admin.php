<div class="judul" style="">
</div>
<div class="mx-auto" style="width: 128px;">
  <img src="<?php echo base_url().'/source/dp.png'?>" class="img-circle" alt="User Image" style="max-width:130px;margin-top: 5px;">
</div>


<br><b>
Chindy Amalia <br>
Admin
</b>
<hr>
<!-- <div class="input-group mb-3" style="padding-top: 20px;">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
  </div>
  <input type="text" class="form-control" placeholder="Search">
</div> -->

<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <?php
          if ($main_content == 'vw_dashboard_home'){
            ?><a class="active" href="<?php echo base_url()?>index.php/main_controller/dashboard"><?php
          }
          else{
            ?><a class="" href="<?php echo base_url()?>index.php/main_controller/dashboard"><?php
          }
        ?>
          <i class="fas fa-tachometer-alt"></i><span>Panel Kendali</span>
        </a>
      </h4>
    </div>
  </div>
</div>

<hr>
<h6 style="margin-top:30px;">MAIN NAVIGATION</h6>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <?php
          if ($main_content == 'view_all_barang'){
            ?><a class="active" href="<?php echo base_url()?>index.php/main_controller/view_all_barang"><?php
          }
          else{
            ?><a class="" href="<?php echo base_url()?>index.php/main_controller/view_all_barang"><?php
          }
        ?>
          <i class="fas fa-box"></i><span>Barang</span>
        </a>
      </h4>
    </div>
  </div>
</div>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <?php
          if ($main_content == 'vw_all_trx'){
            ?><a class="active" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><?php
          }
          else{
            ?><a class="" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><?php
          }
        ?>
          <i class="far fa-handshake"></i></i><span> Transaksi</span>
        </a>
      </h4>
    </div>
    <?php
      if ($main_content == 'vw_all_trx'){
        ?><div id="collapseTwo" class="panel-collapse collapse in show"><?php
      }
      else{
        ?><div id="collapseTwo" class="panel-collapse collapse in"><?php
      }
    ?>

     <ul class="list-group">
        <a href="<?php echo base_url()?>index.php/main_controller/view_all_trx/1"><li class="list-group-item">Semua Transaksi</a></li>
        <a href="<?php echo base_url()?>index.php/main_controller/view_all_trx/2"><li class="list-group-item">Lunas</a></li>
        <a href="<?php echo base_url()?>index.php/main_controller/view_all_trx/3"><li class="list-group-item">Belum Lunas</a></li>
      </ul>
    </div>
  </div>
</div>
<h6 style="margin-top:30px;">SYSTEM</h6>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <?php
          if ($main_content == 'view_all_pembeli'){
            ?><a class="active" href="<?php echo base_url()?>index.php/main_controller/view_all_pembeli"><?php
          }
          else{
            ?><a class="" href="<?php echo base_url()?>index.php/main_controller/view_all_pembeli"><?php
          }
        ?>
          <i class="far fa-user"></i><span>Pembeli</span>
        </a>
      </h4>
    </div>
  </div>
</div>
