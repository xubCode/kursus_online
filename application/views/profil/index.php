<div class="main-panel">
    <div class="content-wrapper">
    	<div class="col-md-10 offset-md-1">
    		<?= $this->session->userdata('message'); ?>
    		<div class="card">
    			<div class="card-header">
    				<div class="card-title mb-0">Profil Saya</div>
    			</div>
    			<div class="card-body">
    				<div class="row">
    					<div class="col-md-4">                            
    						<img class="img-md img-thumbnail" src="<?= base_url('assets/img/profil/') . $userAktif['gambar']; ?>" alt="Profile image">
    					</div>
    					<div class="col-md-8">
    						<div class="row mb-3">
    							<div class="col-sm-3">Nama</div>
    							<div class="col-sm-9" id="nama">: <?= $userAktif['nama']; ?></div>
    						</div>    
    						<div class="row mb-3">
    							<div class="col-sm-3">Alamat</div>
    							<div class="col-sm-9" id="alamat">: <?= $userAktif['alamat']; ?></div>
    						</div>
    						<div class="row mb-3">
    							<div class="col-sm-3">Email</div>
    							<div class="col-sm-9" id="email">: <?= $userAktif['email']; ?></div>
    						</div>    
    						<div class="row mb-3">
    							<button class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#modalEdit">Update?</button>
    						</div>    						
    					</div>	
    				</div>    				
    			</div>	
    		</div>
    	</div>
    	<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="detailUser" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="detailUser">Update Profil</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    	<?= form_open_multipart('user/update') ?>
                    		<div class="form-group row">
                    			<label class="col-md-3 col-form-label">Nama</label>
                    			<div class="col-md-7">
                    				<input type="hidden" name="id" value="<?= $userAktif['id'] ?>">
                    				<input required type="text" autofocus="on" value="<?= $userAktif['nama']; ?>" name="edit_nama" id="edit_nama" class="form-control">
                    			</div>
                    		</div>
                    		<div class="form-group row">
                    			<label class="col-md-3 col-form-label">Alamat</label>
                    			<div class="col-md-7">
                    				<input required class="form-control" type="text" name="edit_alamat" value="<?= $userAktif['alamat']; ?>">
                    			</div>
                    		</div>
                    		<div class="form-group row">
                    			<label class="col-md-3 col-form-label">Foto</label>
                    			<div class="col-md-7">
                    				<input required type="file" name="edit_foto" id="edit_foto" class="form-control">
                    			</div>
                    		</div>                    	
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-primary" type="submit" name="submit">Update</button>                     
                    </div>
                    </form>
                  </div>
                </div>
              </div>  