<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DASHBOARDS</h6>
        <h2>Control Panel</h2>
      </div>
    </div>
    <div class="col">
      <div class="float-right">
        <div class="input-group mb-3" style="padding-top: 20px;">
          <span id="date_time"></span>
          <script type="text/javascript">window.onload = date_time('date_time');</script>
        </div>
      </div>
    </div>
  </div>
</div>
<hr>
<div class="">
  <div class="row" id="boxbox">
    <div class="col rounded-lg" style="background-color:#00c0ef !important;">
      <div class="inner">
        <h3><?php echo $barang->num_rows();?></h3>
        <p>Barang</p>
      </div>
      <div class="icon">
        <i class="fas fa-box"></i>
      </div>
    </div>
    <div class="col rounded-lg" style="background-color:#00a65a !important;">
      <div class="inner">
        <h3><?php echo $pembeli->num_rows();?></h3>
        <p>Pembeli</p>
      </div>
      <div class="icon">
        <i class="far fa-user"></i>
      </div>
    </div>
    <div class="col rounded-lg" style="background-color:#dd4b39 !important;">
      <div class="inner">
        <h3><?php echo $trx->num_rows();?></h3>
        <p>Transaksi</p>
      </div>
      <div class="icon">
        <i class="far fa-handshake"></i>
      </div>
    </div>
  </div>
</div>
