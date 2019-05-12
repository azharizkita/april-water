<div class="container">
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
</div>