<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DASHBOARDS</h6>
        <h2>Transaksi
        </h2>
      </div>
    </div>
    <div class="col">
      <div class="float-right">
        <div class="input-group mb-3" style="padding-top: 20px;">
          <div class="input-group-prepend">
          </div>
          <span id="date_time"></span>
        <script type="text/javascript">window.onload = date_time('date_time');</script>
        </div>
      </div>
    </div>
  </div>
</div>
<hr>
<?php
  if (isset($_GET['id'])) {
    $asek = $this->main_model->getSatuTrx($_GET['id']);
    foreach ($asek->result() as $key) {
    ?>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Ubah Data Transaksi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('index.php/main_controller/update_trx') ?>" class="form-horizontal" method="post">
                        <div class="form-body">
                            <div class="row">
                              <input type="hidden" name="id_trx" value="<?php echo $key->id_trx; ?>">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Status</label>
                                        <div class="col-md-9">
                                          <select name="status" class="form-control" name="status">
                                            <option><?php if ($key->status == 2) {
                                              echo "Sudah Bayar";
                                            } else{
                                              echo "Belum Bayar";
                                            }?></option>
                                            <option value="2">Sudah Bayar</option>
                                            <option value="3">Belum Bayar</option>
                                          </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-info">Submit</button>
                      </div>
                </form>
            </div>
        </div>
    <?php
    }
  }else{
    ?>
    <div class="col" style="">
      <div class="container">
        <div class="row">
          <div class="col">
            <h4 class="title-content">Tabel Transaksi | Status :
              <?php
                if ($stat == 1) {
                  echo "Semua Transaksi";
                }elseif ($stat == 2) {
                  echo "Lunas";
                }else {
                  echo "Belum Lunas";
                }
               ?>

             </h4>
          </div>
          <div class="col">
            <button type="button" class="btn btn-success float-right" alt="default" data-toggle="modal" data-target=".sukonto"><i class="fa fa-plus"></i></button>
          </div>
        </div>
      </div>
      <?php if ($this->session->flashdata('success')) : ?>
        <div class="col" style="border-top: 0px solid #3C8DBC !important;max-width: 100%; margin-left: 0px;">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('success'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
      <?php endif; ?>
      <?php if ($this->session->flashdata('danger')) : ?>
        <div class="col" style="border-top: 0px solid #3C8DBC !important;max-width: 100%; margin-left: 0px;">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('danger'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
      <?php endif; ?>
      <table id="tabelkeren" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Transaksi</th>
                <th>Nama Pembeli</th>
                <th>Nama Barang</th>
                <th>Total Barang </th>
                <th>Total Harga </th>
                <th>Status</th>
                <th>Operasi</th>
            </tr>
        </thead>
        <tbody>
          <?php
            $i = 0;
            foreach ($content->result() as $key):
            $i++;
          ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $key->tanggal_transaksi; ?></td>
              <td><?php echo $key->nama_user; ?></td>
              <td><?php echo $key->nama_barang; ?></td>
              <td><?php echo $key->total_barang; ?></td>
              <td><?php echo $key->total_harga; ?></td>
              <td>
                <?php
                  if ($key->status == 2) {
                    echo "Lunas";
                  }else{
                    echo "Belum Lunas";
                  }
                ?>
              </td>
              <td>
                <div class="row">
                  <a href="?id=<?php echo $key->id_trx; ?>" type="button" class="btn btn-warning"><i class="fa fa-edit"></i></a> &nbsp
                  <a href="<?php echo base_url('index.php/main_controller/delete_transaksi/'); echo $key->id_trx; ?>" type="button" class="btn btn-danger" alt="default"><i class="fa fa-trash"></i></a>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
              <th>No</th>
              <th>Tanggal Transaksi</th>
              <th>Nama Pembeli</th>
              <th>Nama Barang</th>
              <th>Total Barang </th>
              <th>Total Harga </th>
              <th>Status</th>
              <th>Operasi</th>
            </tr>
        </tfoot>
      </table>
    </div>
    <?php
  }
?>

<div class="modal fade bs-example-modal-lg sukonto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Tambah Data Transaksi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('index.php/main_controller/create_transaksi') ?>" class="form-horizontal" method="post">
                    <div class="form-body">
                        <!-- <h3 class="box-title">Data Aset Inventaris</h3>
                        <hr class="m-t-0 m-b-40"> -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Nama Pembeli</label>
                                    <div class="col-md-9">
                                      <select name="id_user" class="form-control">
                                        <option value=""> -- Daftar Pembeli -- </option>
                                        <?php foreach ($pembeli->result() as $key) {
                                          ?>
                                            <option value="<?php echo $key->id_user; ?>"><?php echo $key->nama_user?></option>
                                          <?php
                                        } ?>
                                      </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Tanggal Transaksi</label>
                                    <div class="col-md-9">
                                        <input type="date" class="form-control" name="tanggal_transaksi">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Nama Barang</label>
                                    <div class="col-md-9">
                                      <select name="id_barang" class="form-control">
                                        <option value=""> -- Daftar Barang -- </option>
                                        <?php foreach ($barang->result() as $key) {
                                          ?>
                                            <option value="<?php echo $key->id_barang; ?>"><?php echo $key->nama_barang?></option>
                                          <?php
                                        } ?>
                                      </select>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Total Barang</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="total_barang">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Total Harga</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="total_harga">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Status</label>
                                    <div class="col-md-9">
                                      <select name="status" class="form-control" name="status">
                                        <option value="2">Sudah Bayar</option>
                                        <option value="3">Belum Bayar</option>
                                      </select>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->


                    </div>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-info">Submit</button>
                  </div>
            </form>
        </div>
    </div>
</div>
