<div class="app-page-title mb-n2">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="pe-7s-info icon-gradient bg-mean-fruit">
        </i>
      </div>
      <div><?= $_title ?>
      </div>
    </div>
  </div>
</div>
<!-- Default box -->
<div class="card">
  <div class="card-body">
    <?= form_open(str_replace("_", "", $_view)); ?>
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label for="fasilitas_kesehatan_nama">Nama Fasilitas Kesehatan</label>
          <input type="text" class="form-control <?= (form_error('fasilitas_kesehatan_nama') != null) ? 'is-invalid' : '' ?>" id="fasilitas_kesehatan_nama" name="fasilitas_kesehatan_nama" placeholder="Masukkan Nama Fasilitas Kesehatan" value="<?= ($this->input->post('fasilitas_kesehatan_nama') ? $this->input->post('fasilitas_kesehatan_nama') : ""); ?>">
          <div class="invalid-feedback">
            <?= form_error('fasilitas_kesehatan_nama'); ?>
          </div>
        </div>
        <button type="submit" class="btn btn-primary" name='simpan'>Simpan</button>
      </div>
    </div>
    <?= form_close(); ?>
  </div>
</div>
<!-- /.card -->