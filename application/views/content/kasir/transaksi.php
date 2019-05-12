<div class="container">
    <h1 class="display-4 text-center"><hr>History Transaksi<hr></h1>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>Produk</th>
                <th>Kuantitas</th>
                <th>Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if ($this->db->get('resi')->num_rows() == 0) {
                ?>
                <tr>
                    <td colspan="6">Tidak ada data</td>
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
</div>