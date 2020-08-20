<h2>Daftar Produk</h2>
<?php
	foreach ($course as $row) {
?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="kotak">
              <form method="post" action="<?php echo base_url();?>siswa/tambah" method="post" accept-charset="utf-8">
                <a href="#"><img class="img-thumbnail" src="<?php echo base_url() . 'assets/img/course/'.$row['gambar']; ?>"/></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#"><?php echo $row['nama_krs'];?></a>
                  </h4>
                  <h5>Rp. <?php echo number_format($row['harga'],0,",",".");?></h5>
                  <p class="card-text"><?php echo $row['deskripsi'];?></p>
                </div>
                <div class="card-footer">
                  <a href="<?php echo base_url();?>siswa/detail_k/<?php echo $row['id_kursus']; ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-search"></i> Detail</a>

                  <input type="hidden" name="id" value="<?php echo $row['id_kursus']; ?>" />
                  <input type="hidden" name="nama" value="<?php echo $row['nama_krs']; ?>" />
                  <input type="hidden" name="harga" value="<?php echo $row['harga']; ?>" />
                  <input type="hidden" name="gambar" value="<?php echo $row['gambar']; ?>" />
                  <button type="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-shopping-cart"></i> Beli</button>
                </div>
                </form>
              </div>
            </div>
<?php
	}
?>
