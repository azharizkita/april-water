<div class="container">
    <h1 class="display-4 text-center"><hr>Kritik & Saran<hr></h1>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if ($this->db->get('comment')->num_rows() == 0) {
                ?>
                <tr>
                    <td colspan="4">Tidak ada data</td>
                </tr>
                <?php
            }
            foreach ($this->db->get('comment')->result() as $comment) {
                ?>
                <tr>
                    <td><?php echo $comment->tanggal?></td>
                    <td><?php echo $comment->nama?></td>
                    <td><?php echo $comment->email?></td>
                    <td><?php echo $comment->pesan?></td>
                </tr>
            <?php }?>
        </tbody>
    </table>
    <hr>
    <br>
</div>