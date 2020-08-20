<div class="main-panel">
    <div class="content-wrapper">
     <div class="row">
       <div class="col-md-4">
         <h5>Dibuat pada :: <?=$course['0']['created_at']; ?></h5>
       </div>
     </div>
     <div class="row">
       <div class="col-md-4">
         <div class="card">
           <div class="card-header">Materi Kursus</div>
         <?php if(!$materi) : ?>
           <div class="card-body">
             <strong>Anda belum membuat materi!</strong>
           </div>
         <?php else : ?>
           <ul class="list-group list-group-flush">
             <?php foreach ($materi as $row) : ?>
               <li class="list-group-item">
                 <a href="<?= base_url('siswa/tampil_m/') . $row['id']; ?>" class="card-link">
                   <?= $row['judul']; ?>
                 </a>
               </li>
             <?php endforeach; ?>
           </ul>
         <?php endif; ?>

       </div>
       </div>
       <div class="col-md-4">
         <div class="card">
           <div class="card-header">Deskripsi Kursus</div>
           <div class="card-body">
             <?= $course['0']['deskripsi']; ?>
           </div>
         </div>
       </div>
       <div class="col-md-4">
         <div class="card">
           <div class="card-header">Keuntungan Kursus</div>
           <div class="card-body">
             <?= $course['0']['keuntungan']; ?>
           </div>
         </div>
       </div>
     </div>
