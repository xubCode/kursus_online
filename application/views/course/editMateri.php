<div class="main-panel">
    <div class="content-wrapper">
    	<?= form_open_multipart('materi/update/'); ?>
            <div class="form-group row">
                <label class="col-md-2 offset-md-1 col-form-label">Judul Konten</label>
                <div class="col-md-8">  
                	<input type="hidden" name="id_materi" value="<?= $materi['id']; ?>">                  
                    <input type="text" value="<?= $materi['judul']; ?>" autofocus="on" name="judul" id="judul" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 offset-md-1 ol-form-label">Konten</label>
                <div class="col-md-8">
                    <textarea name="konten" id="ckeditor"><?= $materi['konten']; ?></textarea>
                </div>
            </div>
              
            <div class="form-group row">                
                <div class="col-md-8 offset-md-3">
                    <button class="btn btn-sm btn-success">Simpan</button>
                </div>
            </div>                    	                             
        </form>