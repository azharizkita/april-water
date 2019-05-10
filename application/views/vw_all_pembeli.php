<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="float-left">
        <h6>DASHBOARDS</h6>
        <h2>Pembeli
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
<?php if (isset($_GET['id'])) {
  $asek = $this->main_model->getSatuPembeli($_GET['id']);
  foreach ($asek->result() as $key) {
    ?>
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="myLargeModalLabel">Ubah Data Pembeli</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              </div>
              <div class="modal-body">
                  <form action="<?php echo base_url('index.php/main_controller/update_pembeli') ?>" class="form-horizontal" method="post">
                      <div class="form-body">
                          <div class="row">
                              <input type="hidden" name="id_user" value="<?php echo $key->id_user; ?>">
                              <div class="col-md-6">
                                  <div class="form-group row">
                                      <label class="control-label text-right col-md-3">Nama Pembeli</label>
                                      <div class="col-md-9">
                                          <input type="text" class="form-control" name="nama_user" value="<?php echo $key->nama_user; ?>">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group row">
                                      <label class="control-label text-right col-md-3">Username</label>
                                      <div class="col-md-9">
                                          <input type="text" class="form-control" name="username" value="<?php echo $key->username; ?>">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group row">
                                      <label class="control-label text-right col-md-3">Password</label>
                                      <div class="col-md-9">
                                          <input type="password" class="form-control" name="password" value="<?php echo $key->password; ?>">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group row">
                                      <label class="control-label text-right col-md-3">Email</label>
                                      <div class="col-md-9">
                                          <input type="text" class="form-control"  name="email" value="<?php echo $key->email; ?>">
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
          <h4 class="title-content">Tabel Pembeli

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
              <th>Nama User </th>
              <th>Username</th>
              <th>Email</th>
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
            <td><?php echo $key->nama_user; ?></td>
            <td><?php echo $key->username; ?></td>
            <td><?php echo $key->email; ?></td>
            <td>
              <div class="row">
                <a href="?id=<?php echo $key->id_user; ?>" type="button" class="btn btn-warning"><i class="fa fa-edit"></i></a> &nbsp
                <a href="<?php echo base_url('index.php/main_controller/delete_pembeli/'); echo $key->id_user; ?>" type="button" class="btn btn-danger" alt="default"><i class="fa fa-trash"></i></a>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
          <tr>
            <th>No</th>
            <th>Nama User </th>
            <th>Username</th>
            <th>Email</th>
            <th>Operasi</th>
          </tr>
      </tfoot>
    </table>
  </div>
  <?php
}?>
<div class="modal fade bs-example-modal-lg sukonto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Tambah Data Pembeli</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('index.php/main_controller/create_pembeli') ?>" class="form-horizontal" method="post">
                    <div class="form-body">
                        <!-- <h3 class="box-title">Data Aset Inventaris</h3>
                        <hr class="m-t-0 m-b-40"> -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Nama User</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="nama_user" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Username</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="username" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control"  name="email">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->

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
