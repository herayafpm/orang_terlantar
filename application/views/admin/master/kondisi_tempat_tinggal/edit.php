<!-- Default box -->
<div class="card">
  <div class="card-body">
    <?= form_open(str_replace("_", "", $_view) . "/" . $_kondisi_tempat_tinggal['kondisi_tempat_tinggal_id']); ?>
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label for="kondisi_tempat_tinggal_nama">Nama Kondisi Tempat Tinggal</label>
          <input type="text" class="form-control <?= (form_error('kondisi_tempat_tinggal_nama') != null) ? 'is-invalid' : '' ?>" id="kondisi_tempat_tinggal_nama" name="kondisi_tempat_tinggal_nama" placeholder="Masukkan Nama Kondisi Tempat Tinggal" value="<?= ($this->input->post('kondisi_tempat_tinggal_nama') ? $this->input->post('kondisi_tempat_tinggal_nama') : $_kondisi_tempat_tinggal['kondisi_tempat_tinggal_nama']); ?>">
          <div class="invalid-feedback">
            <?= form_error('kondisi_tempat_tinggal_nama'); ?>
          </div>
        </div>
        <button type="submit" class="btn btn-primary" name='simpan'>Simpan</button>
      </div>
    </div>
    <?= form_close(); ?>
  </div>
</div>
<!-- /.card -->