<div class="main-panel">
    <div class="content-wrapper">
        
    	<?= form_open_multipart('course/insert'); ?>
        <div class="form-group row">
            <label class="col-md-2 offset-md-3 col-form-label">Nama Kursus</label>
            <div class="col-md-4">                  
                <input type="text" value="<?= set_value('nama'); ?>" autofocus="on" name="nama" id="nama" class="form-control">
                <?= form_error('nama','<b class="text-danger" style="padding-left: 8px;">','</b>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 offset-md-3 col-form-label">Kategori?</label>
            <div class="col-md-4">
                <select class="custom-select" name="genre">
                    <option selected>Pilih Kategori</option>
                    <?php foreach ($genre as $row) : ?>
                        <option value="<?= $row['id']; ?>"><?= $row['nama_genre']; ?></option>
                    <?php endforeach; ?>
                </select>   
                <?= form_error('genre','<b class="text-danger" style="padding-left: 8px;">','</b>'); ?>
            </div>       
        </div>
        <div class="form-group row">
            <label class="col-md-2 offset-md-3 col-form-label">Gambar</label>
            <div class="col-md-4">                  
                <div class="custom-file">
                    <input required type="file" class="form-control" name="gambar">  
                </div>
                <?= form_error('gambar','<b class="text-danger" style="padding-left: 8px;">','</b>'); ?>
            </div>
        </div>
       
            
            <div class="form-group row">
                <label class="col-md-2 offset-md-3 col-form-label">Preview</label>
                <div class="col-md-4">                  
                    <img src="" id="gambarCreate">
                </div>  
            </div>
            
       
        <div class="form-group row">
            <label class="col-md-2 offset-md-3 col-form-label">Deskripsi</label>
            <div class="col-md-4">                  
                <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
                <?= form_error('deskripsi','<b class="text-danger" style="padding-left: 8px;">','</b>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 offset-md-3 col-form-label">Keuntungan</label>
            <div class="col-md-4">                  
                <textarea class="form-control" name="keuntungan" id="keuntungan"></textarea>
                <?= form_error('keuntungan','<b class="text-danger" style="padding-left: 8px;">','</b>'); ?>
            </div>
        </div>  
        <div class="form-group row">
            <div class="col-md-4 offset-md-5">                  
                <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
            </div>
        </div>      

        <?= form_close(); ?>
    	
    	