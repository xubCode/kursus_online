<div class="container mt-3">
	<div class="row">
		<?php foreach ($course as $row) : ?>
                <div class="col-md-3">
                  <div class="card" style="width: 18rem;">
                    <img src="<?= base_url('assets/img/course/') . $row['gambar'];?>" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title"><?= $row['nama_krs'] ?></h5>
                      <a href="<?= base_url('course/detail/') . $row['id_kursus']; ?>" class="btn btn-sm btn-info">Detail</a>
                      <span class=" badge badge-pill badge-primary"><?= $row['nama_genre']; ?></span>
                    </div>
                  </div>
                </div>
        <?php endforeach; ?>  		
	</div>
</div>
