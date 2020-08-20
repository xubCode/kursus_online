<div class="main-panel">
    <div class="content-wrapper">
    	<div class="row">
    		<div class="col-md-12">
    			<table class="mb-3">
    				<tr>
    					<td><strong>Nama kursus</strong></td>
    					<td>&nbsp;&nbsp;&nbsp;::&nbsp;&nbsp;&nbsp;</td>
    					<td><strong><?=$course['0']['nama_krs']; ?></strong></td>
    				</tr>
    				<tr>
    					<td><strong>Dibuat pada</strong></td>
    					<td>&nbsp;&nbsp;&nbsp;::&nbsp;&nbsp;&nbsp;</td>
    					<td><strong><?=$course['0']['created_at']; ?></strong></td>
    				</tr>
    			</table>
    			<?= $this->session->flashdata('message'); ?>
    		</div>
    	</div>
    	<div class="card-columns">
    		
    			<div class="card">
    			  <div class="card-header">Artikel Kursus</div>	
				  <?php if(!$materi) : ?>
				  	<div class="card-body">
				  		<strong>Anda belum membuat materi!</strong>
				  	</div>
				  <?php else : ?>
				  	<ul class="list-group list-group-flush">				    
    					<?php foreach ($materi as $row) : ?>                            
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a href="<?= base_url('materi/detail/') . $row['id']; ?>" class="card-link">
                                            <?= $row['judul']; ?>                         
                                        </a>
                                        <!-- <span class="badge badge-pill badge-info"></span> -->
                                    </li>
                                </ul>                            
    					<?php endforeach; ?>				  						
				  	</ul>
				  <?php endif; ?>
				  <div class="card-footer">
				  	<a href="<?= base_url('materi/add/') . $course['0']['id_kursus']; ?>" class="btn btn-sm btn-success">Buat Materi Baru?</a>
				  </div>
				</div>
    		
    			<div class="card">
    				<div class="card-header">Deskripsi Kursus</div>
    				<div class="card-body">
    					<?= $course['0']['deskripsi']; ?>
    				</div>
    			</div>
    		
    			<div class="card">
    				<div class="card-header">Keuntungan Kursus</div>
    				<div class="card-body">
    					<?= $course['0']['keuntungan']; ?>
    				</div>
    			</div>
    			
         </div>   
               
        


    	