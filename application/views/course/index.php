<div class="main-panel">
          <div class="content-wrapper"> 
          	<div class="row">            
          		<div class="col-md-6 offset-md-3">
                <?= $this->session->flashdata('message'); ?>
          			<?php if ($course == null) :?>
          				<div class="alert alert-warning">
          					Anda Belum membuat kursus apapun! Silahkan buat.
          				</div>
          			<?php endif; ?>          		
          		</div>
          		<div class="col-md-4">
                <h2>Data Kursus</h2>
          			<a href="<?= base_url('course/create'); ?>" class="btn btn-success btn-sm mb-3">Buat Sekarang?</a>         		
          		</div>
          	</div>
          	<div class="row">
          		<?php foreach ($course as $row) : ?>
                <div class="col-md-4">
                  <div class="card" style="width: 18rem;">
                    <img src="<?= base_url('assets/img/course/') . $row['gambar'];?>" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title"><?= $row['nama_krs'] ?></h5>
                      <span class="badge badge-pill badge-primary text-white mb-2"><?= $row['nama_genre']; ?></span><br>
                      
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="<?= base_url('course/detail/') . $row['id_kursus'];?>" class="btn btn-sm btn-outline-info">Detail</a>
                        <a href="<?= base_url('course/editKursus/') . $row['id_kursus'];?>" class="btn btn-sm btn-outline-success">Edit</a>
                        <a href="<?= base_url('course/delete/') . $row['id_kursus'];?>" class="btn btn-sm btn-outline-danger">Hapus</a>
                        <!-- <a href="#" class="btn btn-sm btn-danger">Harga</a> -->
                      </div>                     
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>        
          	</div>
