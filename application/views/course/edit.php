<div class="main-panel">
    <div class="content-wrapper">
        <h2><?=$judul; ?></h2>
    	<?= form_open_multipart('course/update'); ?>
        <div class="form-group row">
            <label class="col-md-2 offset-md-3 col-form-label">Nama Kursus</label>
            <div class="col-md-4"> 
            <input type="hidden" name="oldImg" value="<?= $course['0']['gambar']; ?>">
            <input type="hidden" name="id_kursus" value="<?= $course['0']['id_kursus']; ?>">                 
                <input type="text" autofocus="on" value="<?= $course['0']['nama_krs']; ?>" name="nama" id="nama" class="form-control">
                <?= form_error('nama','<b class="text-danger" style="padding-left: 8px;">','</b>'); ?>
            </div>
        </div>  
        
        <div class="form-group row">
            <label class="col-md-2 offset-md-3 col-form-label">Gambar</label>
            <div class="col-md-4">                  
                <div class="custom-file">
                    <input type="file" class="form-control" id="gambar" name="gambar">  
                </div>
                <?= form_error('gambar','<b class="text-danger" style="padding-left: 8px;">','</b>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 offset-md-3 col-form-label">Deskripsi</label>
            <div class="col-md-4">                  
                <textarea class="form-control" name="deskripsi" id="deskripsi"> <?= $course['0']['deskripsi']; ?> </textarea>
                <?= form_error('deskripsi','<b class="text-danger" style="padding-left: 8px;">','</b>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 offset-md-3 col-form-label">Deskripsi</label>
            <div class="col-md-4">    
                <select name="namanya">
                    <?php if($data_dari_database == $data_dari_option) : ?>
                        <option value="valuenya" selected></option>
                    <?php else : ?>
                        <option value="valuenya"></option>
                    <?php endif; ?>
                </select>                  
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2 offset-md-3 col-form-label">Keuntungan</label>
            <div class="col-md-4">                  
                <textarea class="form-control" name="keuntungan" id="keuntungan"> <?= $course['0']['keuntungan']; ?> </textarea>
                <?= form_error('keuntungan','<b class="text-danger" style="padding-left: 8px;">','</b>'); ?>
            </div>
        </div>  
        <div class="form-group row">
            <div class="col-md-4 offset-md-5">                  
                <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
            </div>
        </div>      

        <?= form_close(); ?>
    	
    	