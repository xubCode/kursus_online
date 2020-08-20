<div class="main-panel">
    <div class="content-wrapper">
        <?= $this->session->flashdata('message'); ?>
    	<div class="row">
            
    		<div class="col">
    			<h4 class="card-title"><?= $materi['judul']; ?></h4>
    			<div class="card">
    				<div class="card-body">    					   			
    					<?= $materi['konten']; ?>
    					<hr>
    					<a class="btn btn-sm btn-warning" href="<?= base_url('materi/edit/') . $materi['id'];?>">Edit</a>
    				</div> 
    				 				    					    			
    			</div>
    		</div>
    	</div>
        <div class="card-columns">
            
                <div class="card mt-4">
                    <div class="card-header">Video Pendukung Kursus</div>
                    <div class="card-body">
                        <?php if($materi['link'] == '') : ?>
                            
                                <strong>Tidak ada video pendukung!</strong>                            
                        <?php else : ?>
                            <?= youtube_embed($materi['link'],452,400,false,false,true,false); ?>
                        <?php endif; ?>
                        
                    </div>
                </div>
            
                <div class="card mt-4">
                    <div class="card-header">File Pendukung Kursus</div>
                    <?php if($materi['file_pendukung'] == '') : ?>
                    <div class="card-body">
                        <strong>Tidak ada file pendukung!</strong>
                    </div>
                  <?php else : ?>
                    <ul class="list-group list-group-flush">                                           
                            <li class="list-group-item">
                                <a href="<?= base_url('materi/downloadFile/') . $materi['file_pendukung']; ?>" class="card-link">
                                    <?= $materi['file_pendukung']; ?>
                                </a>
                            </li>
                        
                    </ul>
                  <?php endif; ?>
                  
                </div>
                <div class="card mt-4">
                    <div class="card-header">Penugasan</div>
                    <?php if(!$tugas) : ?>
                        <div class="card-body">
                            <strong>Belum ada penugasan!</strong>
                        </div>
                    <?php else : ?>
                        <div class="card-body">
                            <?= $tugas['0']['penugasan']; ?>
                        </div>
                    <?php endif; ?>
                    <div class="card-footer">
                        <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#modalTugas">Buat Penugasan Baru?</a>
                    </div>
                </div>
            
        </div>
        <div class="modal fade" id="modalTugas" tabindex="-1" role="dialog" aria-labelledby="modalTugas" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalTugas">Penugasan Baru</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <?= form_open('materi/penugasan') ?>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Penugasan</label>
                                <div class="col-md-8">
                                    <input type="hidden" name="id_materi" value="<?= $materi['id']; ?>">
                                    <textarea name="penugasan" class="form-control" required rows="3"></textarea>

                                </div>
                            </div>                      
                                                 
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-sm btn-primary" type="submit" name="submit">Tambah</button>                     
                    </div>
                    </form>
                  </div>
                </div>
              </div>