<script>
    function updateData($id,$nama) {
        var $id2 = $id
        console.log($id2);
        $('#id').val($id);
        $('#nama').val($nama);
        $('.btn-outline-danger').attr('href',"http://localhost/BeLon/genre/delete/"+$id2);
    }
</script>
<div class="main-panel">
    <div class="content-wrapper">
    	<div class="row">
    		<div class="col-md-6 offset-md-3">

    			<?= $this->session->flashdata('message'); ?>
    			<div class="card">
    				<div class="card-header">
    					Genre Kursus
    				</div>
    				<div class="card-body">
                        <?php if($genre == null) : ?>
                            <strong>Anda Belum membuat Genre!.</strong>
                        <?php endif; ?>    
    					<?php foreach ($genre as $row) : ?>
    						<a href="#" class="badge badge-pill badge-primary text-light m-1" id="genre" data-toggle="modal" data-target="#modalEdit" onclick="updateData('<?= $row['id']; ?>','<?= $row['nama_genre']; ?>')"><?=$row['nama_genre']; ?></a>	
    					<?php endforeach; ?>    
                        
    				</div>
    				<div class="card-footer">
    					<a href="#" data-toggle="modal" data-target="#modalGenre" class="btn btn-sm btn-success">Buat Genre?</a>
    				</div>
    			</div>    			
    		</div>
    	</div>
    	<div class="modal fade" id="modalGenre" tabindex="-1" role="dialog" aria-labelledby="modalGenre" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalGenre">Tambah Genre</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    	<?= form_open('genre/insert') ?>
                    		<div class="form-group row">
                    			<label class="col-md-3 col-form-label">Nama</label>
                    			<div class="col-md-7">
                    				<input required type="text" autofocus="on" autocomplete="off" name="nama_genre" id="nama_genre" class="form-control">

                    			</div>
                    		</div>                    	
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-primary" type="submit" name="submit">Tambah</button>                     
                    </div>
                    </form>
                  </div>
                </div>
              </div>
 <!--              modal edit -->
              <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalEdit">Edit Genre</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <?= form_open('genre/update') ?>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Nama</label>
                                <div class="col-md-7">
                                    <input type="hidden" id="id" name="id">
                                    <input required type="text" id="nama" autofocus="on" name="nama" autocomplete="off" class="form-control">
                                    
                                </div>
                            </div>                      
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-sm btn-outline-success" type="submit" name="submit">Update</button> 
                      <a class="btn btn-sm btn-outline-danger" href="#">Hapus?</a>                    
                    </div>
                    </form>
                  </div>
                </div>
              </div>  