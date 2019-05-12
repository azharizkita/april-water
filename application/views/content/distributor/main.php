<div class="container">
    <div class="row">
        <?php
        if ($this->db->get('pengiriman')->num_rows() == 0) {
            ?>
            <p class="text-center display-4">Saat ini belum ada pengiriman tercetak :(</p>
            <?php
        }
        foreach ($this->db->get('pengiriman')->result() as $post) {

            ?>
            <div class="col" style="padding-top: 25px">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        <h5 class="card-title"><?php echo $post->pemesan; ?></h5>
                    </div>
                    <?php echo form_open_multipart('distributor/updateStatusPengiriman'); ?>
                    <ul class="list-group list-group-flush">
                        <?php
                        if ($post->status == "Terkirim") {
                            echo '<li class="list-group-item"><strong>Tanggal: </strong>',$post->pengiriman,'</li>';
                            echo '<li class="list-group-item"><strong>Pemesan: </strong>',$post->pemesan,'</li>';
                            echo '<li class="list-group-item"><strong>Produk: </strong>',$post->pemesanan,'</li>';
                            echo '<li class="list-group-item"><strong>Penerima: </strong>',$post->penerima,'</li>';
                            echo '<li class="list-group-item"><strong>Alamat: </strong>',$post->alamat,'</li>';
                            echo '<li class="list-group-item"><strong>Telepon: </strong>',$post->telepon,'</li>';
                            echo '<li class="list-group-item"><strong>Kurir: </strong>',$post->kurir,'</li>';
                            echo '<li class="list-group-item"><strong>Status: </strong>',$post->status,'</li>';
                        } else {
                            echo '<li class="list-group-item"><strong>Tanggal: </strong>',$post->pengiriman,'</li>';
                            echo '<li class="list-group-item"><strong>Pemesan: </strong>',$post->pemesan,'</li>';
                            echo '<li class="list-group-item"><strong>Produk: </strong>',$post->pemesanan,'</li>';
                            echo '<li class="list-group-item"><strong>Penerima: </strong><br><input type="text" name="penerima" required></li>';
                            echo '<li class="list-group-item"><strong>Alamat: </strong><br><input type="text" name="alamat" required></li>';
                            echo '<li class="list-group-item"><strong>Telepon: </strong><br><input type="number" name="telepon" required></li>';
                            echo '<li class="list-group-item"><strong>Kurir: </strong><br><input type="text" name="kurir" required></li>';
                            echo '<li class="list-group-item"><strong>Status: </strong>',$post->status,'</li>';
                        }?>
                        <?php if ($post->status == "Belum dikirim") {
                            ?>
                            <input type="text" name="status" value="Terkirim" hidden>
                            <input type="text" name="id" value="<?php echo $post->id ?>" hidden>
                            <li class="list-group-item">
                                <button class="btn" type="submit" style="width: 100%">Kirim</button>
                            </li>
                            </form>
                            <?php
                        } ?>


                    </ul>
                </div>
            </div>

        <?php } ?>
    </div>
</div>