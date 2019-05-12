<div class="container">
    <h1 class="display-4 text-center"><hr>Pelamar Kerja<hr></h1>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Nama</th>
                <th>TTL</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Nomer</th>
                <th>Job</th>
                <th>Ijazah</th>
                <th>Cv</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if ($this->db->get('karyawan')->num_rows() == 0) {
                ?>
                <tr>
                    <td colspan="4">Tidak ada data</td>
                </tr>
                <?php
            }
            foreach ($this->db->get('karyawan')->result() as $karyawan) {
                ?>
                <tr>
                    <td><?php echo $karyawan->nama?></td>
                    <td><?php echo $karyawan->tanggal_lahir?></td>
                    <td><?php echo $karyawan->alamat?></td>
                    <td><?php echo $karyawan->email?></td>
                    <td><?php echo $karyawan->nomer?></td>
                    <td><?php echo $karyawan->job?></td>
                    <td><a href="<?php echo base_url('assets/files/uploads/'),$karyawan->ijazah?>"><?php echo $karyawan->ijazah?></a></td>
                    <td><a href="<?php echo base_url('assets/files/uploads/'),$karyawan->cv?>"><?php echo $karyawan->cv?></a></td>
                </tr>
            <?php }?>
        </tbody>
    </table>
    <hr>
    <br>
</div>