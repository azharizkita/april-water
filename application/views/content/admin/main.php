<button type="button" style="position: fixed; right: 15px; bottom: 15px; z-index: 5" class="floating btn btn-primary" data-toggle="modal" data-target="#newCloth">
    New Product Entry
</button>

<div class="container">
<h1 class="display-4 text-center"><hr>User<hr></h1>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Nama</th>
            <th>Privilege</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if ($this->db->get('user')->num_rows() == 0) {
            ?>
            <tr>
                <td colspan="4">Tidak ada data</td>
            </tr>
            <?php
        }
        foreach ($this->db->get('user')->result() as $user) {
            ?>
            <tr>
                <td><?php echo $user->username?></td>
                <td><?php echo $user->email?></td>
                <td><?php echo $user->nama?></td>
                <td><?php echo $user->privilege?></td>
            </tr>
        <?php }?>
    </tbody>
</table>
<hr>
<br>

<h1 class="display-4 text-center"><hr>produk<hr></h1>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Nama produk</th>
            <th>Spesifikasi</th>
            <th>Kuantitas</th>
            <th>Harga Satuan</th>
            <th>Modal</th>
            <th>Author</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if ($this->db->get('produk')->num_rows() == 0) {
            ?>
            <tr>
                <td colspan="8" class="text-center"><strong>Tidak ada data</strong></td>
            </tr>
            <?php
        }
        foreach ($this->db->get('produk')->result() as $produk) {
            ?>
            <tr>
                <td><?php echo $produk->nama?></td>
                <td><?php echo $produk->spesifikasi?></td>
                <td><?php echo $produk->kuantitas?></td>
                <td><?php echo $produk->harga?></td>
                <td><?php echo $produk->modal?></td>
                <td><?php echo $produk->author?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<hr>
<br>

<h1 class="display-4 text-center"><hr>Transaksi<hr></h1>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Tanggal Resi Dibentuk</th>
            <th>Pelanggan</th>
            <th>produk</th>
            <th>Total Item</th>
            <th>Harga</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if ($this->db->get('resi')->num_rows() == 0) {
            ?>
            <tr>
                <td colspan="9" class="text-center"><strong>Tidak ada data</strong></td>
            </tr>
            <?php
        }
        foreach ($this->db->get('resi')->result() as $resi) {

            if ($resi->produk == null) {
                $namaproduk = "-";
            } else {
                foreach ($this->db->get_where('produk', array('id' => $resi->produk))->result() as $produk) {
                    $namaproduk = $produk->nama;
                }
            }
            foreach ($this->db->get_where('user', array('id' => $resi->pelanggan))->result() as $pelanggan) {
                $namaPelanggan = $pelanggan->nama;
            }
            ?>
            <tr>
                <td><?php echo $resi->tanggal?></td>
                <td><?php echo $namaPelanggan?></td>
                <td><?php echo $namaproduk?></td>
                <td><?php echo $resi->total?></td>
                <td><?php echo $resi->harga?></td>
                <td><?php echo $resi->status?></td>
            </tr>
        <?php }?>
    </tbody>
</table>
<hr>
<br>

<h1 class="display-4 text-center"><hr>Pengiriman<hr></h1>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Tanggal Pengiriman</th>
            <th>Pemesan</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Pemesanan</th>
            <th>Kurir</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if ($this->db->get('pengiriman')->num_rows() == 0) {
            ?>
            <tr>
                <td colspan="9" class="text-center"><strong>Tidak ada data</strong></td>
            </tr>
            <?php
        }
        foreach ($this->db->get('pengiriman')->result() as $data) {

            ?>
            <tr>
                <td><?php echo $data->pengiriman?></td>
                <td><?php echo $data->pemesan?></td>
                <td><?php echo $data->alamat?></td>
                <td><?php echo $data->telepon?></td>
                <td><?php echo $data->pemesanan?></td>
                <td><?php echo $data->kurir?></td>
                <td><?php echo $data->status?></td>
            </tr>
        <?php }?>
    </tbody>
</table>
<hr>
<br>


<div class="modal fade" id="newCloth" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="form-group">
            <?php echo form_open_multipart('admin/createproduk'); ?>
            <label for="nama">Nama produk</label>
            <input type="text" class="form-control" required id="nama" name="nama">
            </div>

            <div class="form-group">
            <label for="spesifikasi">Spesifikasi</label>
            <input type="text" class="form-control" required id="spesifikasi" name="spesifikasi">
            </div>
            
            <div class="form-group">
            <label for="nama">Jumlah</label>
            <input type="number" value="1" min="1" class="form-control" required id="kuantitas" name="kuantitas">
            </div>
            <div class="form-group">
            <label for="nama">Harga</label>
            <input type="number" value="1" min="1" class="form-control" required id="harga" name="harga">
            </div>
            <div class="form-group">
            <label for="nama">Modal</label>
            <input type="number" value="1" min="1" class="form-control" required id="harga" name="modal">
            </div>
            <br>
            <div class="input-group">
            <div class="custom-file">
            <input type="file" class="custom-file-input" required name="image" id="fileInput" aria-describedby="inputGroupFileAddon04">
            <label class="custom-file-label" for="fileInput">Choose file</label>
            </div>
            </div>
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>
  </div>
</div>

</div>