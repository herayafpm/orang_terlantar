<!-- Default box -->
<div class="card">
  <div class="card-body">
    <?= form_open(str_replace("_", "", $_view) . "/" . $_sumber_dana['sumber_dana_id']); ?>
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label for="sumber_dana_nama">Nama Bantuan Sosial</label>
          <input type="text" class="form-control <?= (form_error('sumber_dana_nama') != null) ? 'is-invalid' : '' ?>" id="sumber_dana_nama" name="sumber_dana_nama" placeholder="Masukkan Nama Bantuan Sosial" value="<?= ($this->input->post('sumber_dana_nama') ? $this->input->post('sumber_dana_nama') : $_sumber_dana['sumber_dana_nama']); ?>">
          <div class="invalid-feedback">
            <?= form_error('sumber_dana_nama'); ?>
          </div>
        </div>
        <button type="submit" class="btn btn-primary" name='simpan'>Simpan</button>
      </div>
    </div>
    <?= form_close(); ?>
  </div>
</div>
<!-- /.card -->