
        <?= $this->session->flashdata('message'); ?>
        <?php  if ($rb == null) : ?>

          <div class="alert alert-warning">
            Anda Belum Mengikuti Kursus Apapun! Silahkan Klik <a href="<?= base_url('siswa/publish') ?>">Di Sini</a>.
          </div>
        <?php  endif;  ?>
        <?php
          foreach ($rb as $row) {
        ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                      <div class="kotak">

                        <a href="<?php echo base_url();?>siswa/detail_k/<?php echo $row['id_kursus']; ?>"><img class="img-thumbnail" src="<?php echo base_url() . 'assets/img/'.$row['gambar']; ?>"/></a>
                        <div class="card-body">
                          <h4 class="card-title">
                            <a href="<?php echo base_url();?>siswa/detail_k/<?php echo $row['id_kursus']; ?>"><?php echo $row['nama_krs'];?></a>
                          </h4>
                          <h5>Rp. <?php echo number_format($row['harga'],0,",",".");?></h5>
                          <p class="card-text"><?php echo $row['deskripsi'];?></p>
                        </div>

                      </div>
                    </div>
        <?php
          }
        ?>
      </div>
