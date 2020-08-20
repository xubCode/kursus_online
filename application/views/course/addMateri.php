<div class="main-panel">
    <div class="content-wrapper">
    	<?= form_open_multipart('materi/add/'); ?>
            <div class="form-group row">
                <label class="col-md-2 offset-md-1 col-form-label">Judul Konten</label>
                <div class="col-md-8">  
                	<input type="hidden" name="idKursus" value="<?= $course['0']['id_kursus']; ?>">                  
                    <input type="text" placeholder="misal 'materi 1'" autofocus="on" name="judul" id="judul" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 offset-md-1 ol-form-label">Konten</label>
                <div class="col-md-8">
                    <textarea name="konten" id="ckeditor"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 offset-md-1 col-form-label">Video Pendukung</label>
                <div class="col-md-8">
                    <input type="text" placeholder="link youtube" name="video_pendukung" id="video_pendukung" class="form-control">
                </div>
            </div> 
            <!-- <div class="form-group row">
                <label class="col-md-2 offset-md-1 col-form-label">Penugasan</label>
                <div class="col-md-8">
                    <textarea rows="5" placeholder="Tugas dari materi" class="form-control" name="penugasan" ></textarea>
                </div>
            </div>  -->
            <div class="form-group row">
                <label class="col-md-2 offset-md-1 col-form-label">File Pendukung</label>
                <div class="col-md-4">
                    <input type="file" name="file_pendukung" id="link" class="form-control">
                </div>
                <div class="col-md-4">
                    <select name="status" class="form-control">
                        <option selected>Status</option>
                        <option value="tidak dikunci">Tidak dikunci</option>
                        <option value="dikunci">Dikunci</option>
                    </select>
                </div>
            </div>  
            <div class="form-group row">                
                <div class="col-md-8 offset-md-3">
                    <button class="btn btn-sm btn-success">Simpan</button>
                </div>
            </div>                    	                             
        </form>