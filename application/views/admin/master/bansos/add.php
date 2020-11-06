<!-- Default box -->
<div class="card">
  <div class="card-body">
    <?= form_open($_view); ?>
      <div class="row">
        <div class="col-lg-4">
          <div class="form-group">
            <label for="bansos_nama">Nama Bantuan Sosial</label>
            <input type="text" class="form-control <?=(form_error('bansos_nama') != null)?'is-invalid':''?>" id="bansos_nama" name="bansos_nama" placeholder="Masukkan Nama Bantuan Sosial" value="<?= ($this->input->post('bansos_nama') ? $this->input->post('bansos_nama') : ""); ?>">
            <div class="invalid-feedback">
              <?= form_error('bansos_nama');?>
            </div>
          </div>
          <button type="submit" class="btn btn-primary" name='simpan'>Simpan</button>
        </div>
      </div>
    <?= form_close(); ?>
  </div>
</div>
<!-- /.card -->