<div class="container">
    <div class="row">
        <?php
        if ($this->db->get('resi')->num_rows() == 0) {
            ?>
            <p class="text-center display-4">Saat ini belum ada transaksi yang terbentuk :(</p>
            <?php
        }
        $i = 0;
        $ipass = 0;
        foreach ($this->db->get('resi')->result() as $post) {
            $i = $i + 1;
            if ($post->status == "Lunas") {
                $ipass = $ipass + 1;
                continue;
            }

                if ($this->db->get_where('user', array('id' => $post->pelanggan))->num_rows() == 0) {
                    $namaUser = "-";
                } else {
                    foreach ($this->db->get_where('user', array('id' => $post->pelanggan))->result() as $parseUser) {
                        $namaUser = $parseUser->nama;
                    }
                }

                if ($this->db->get_where('produk', array('id' => $post->produk))->num_rows() == 0) {
                    $namaproduk = "-";
                } else {
                    foreach ($this->db->get_where('produk', array('id' => $post->produk))->result() as $parseproduk) {
                        $namaproduk = $parseproduk->nama;
                    }
                }


                ?>
                <div class="col" style="padding-top: 25px">
                    <div class="card" style="width: 18rem;">
                        <div class="card-header">
                            <h5 class="card-title"><?php echo $namaUser; ?></h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Tanggal: </strong><?php echo $post->tanggal ?></li>
                            <li class="list-group-item"><strong>Pemesan: </strong><?php echo $namaUser ?></li>
                            <li class="list-group-item"><strong>produk: </strong><?php echo $namaproduk ?></li>
                            <li class="list-group-item"><strong>Total: </strong><?php echo $post->total ?></li>
                            <li class="list-group-item"><strong>Harga: </strong><?php echo $post->harga ?></li>
                            <?php if ($post->status == "To be accepted") {
                                ?>
                                <?php echo form_open_multipart('kasir/acceptPembayaran'); ?>
                                <input type="text" name="statusUp" value="Belum lunas" hidden>
                                <input type="text" name="id" value="<?php echo $post->id ?>" hidden>
                                <li class="list-group-item">
                                    <button class="btn" type="submit" style="width: 100%">Cetak Resi</button>
                                </li>
                                </form>
                                <?php
                            } else {
                                ?>
                                <li class="list-group-item">

                                    <?php if ($post->status == "Belum lunas") {
                                        ?>
                                        <?php echo form_open_multipart('kasir/updateStatusPembayaran'); ?>
                                        <div class="input-group">
                                            <select onchange="activate<?php echo $post->id; ?>()" class="custom-select"
                                                    id="inputGroupSelect04" name="status"
                                                    aria-label="Example select with button addon">
                                                <option disabled selected><?php echo $post->status ?></option>
                                                <option value="Lunas">Lunas</option>
                                            </select>
                                            <input type="text" name="id" value="<?php echo $post->id ?>" hidden>
                                            <input type="text" hidden name="alamat" value="-">
                                            <input type="text" hidden name="produk" value="<?php echo $namaproduk ?>">
                                            <input type="text" hidden name="pemesan" value="<?php echo $namaUser; ?>">
                                            <input type="text" hidden name="telepon" value="-">
                                            <input type="text" hidden name="kurir" value="-">
                                            <input type="text" hidden name="statusP" value="Belum dikirim">
                                            </form>
                                            <div class="input-group-append">
                                                <script type="text/javascript">
                                                    function activate<?php echo $post->id;?>() {
                                                        $("#commitButton<?php echo $post->id;?>").prop('disabled', false);
                                                    }
                                                </script>
                                                <button class="btn btn-outline-secondary"
                                                        id="commitButton<?php echo $post->id; ?>" disabled type="submit">
                                                    Commit
                                                </button>
                                            </div>
                                        </div>
                                        <?php
                                    } elseif ($post->status == "Lunas") {
                                        ?>
                                        <div class="text-center" style="color:green">Lunas</div>
                                        <?php
                                    }
                                    ?>
                                </li>
                                <?php
                            } ?>


                        </ul>
                    </div>
                </div>

        <?php } 
        if ($i == $ipass && $i != 0) {
            ?>
            <p class="text-center display-4">Saat ini semua transaksi sudah lunas :)</p>
            <?php
        }
        ?>
    </div>
</div>