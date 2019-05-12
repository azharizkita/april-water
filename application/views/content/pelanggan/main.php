<body>
<div class="container">
<div class="row">
<?php 
    if ($produk == NULL) {
        ?>
        <p class="text-center display-4">Saat ini April Water belum menyediakan produk :(</p>
        <?php
    }
    foreach ($produk as $dataproduk) {
        ?>
        <div class="col">
        <div class="card" style="width: 18rem; padding-top: 15px">
            <img class="card-img-top" src="<?php echo base_url('assets/images/uploads/produk/')?><?php echo $dataproduk->gambar?>" alt="Card image cap">
            <div class="card-header">
                <h5 class="card-title"><?php echo $dataproduk->nama?></h5>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Made by: </strong><?php echo $dataproduk->author?></li>
                    <li class="list-group-item"><strong>Spesifikasi: </strong><?php echo $dataproduk->spesifikasi?></li>
                    <li class="list-group-item"><strong>IDR<?php echo $dataproduk->harga?></strong></li>
                    <li class="list-group-item"><strong>Kuantitas: </strong><?php echo $dataproduk->kuantitas?></li>
                    <li class="list-group-item">
                        <?php echo form_open_multipart('home/beli'); ?>
                        <input type="text" value="<?php echo $dataproduk->id?>" name="id" hidden>
                        <input type="text" value="<?php echo $dataproduk->harga?>" name="harga" hidden>
                        <div class="input-group mb-3">
                        <input type="number" class="form-control" min="1" value="1" name="jumlah">
                        <input type="number" name="kuantitas" hidden value="<?php echo $dataproduk->kuantitas?>">
                        </form>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit">Pesan</button>
                        </div>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>
        </div>
        <?php
    }
?>
</div>
</div>