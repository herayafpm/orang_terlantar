<!-- Default box -->
<div class="card">
  <div class="card-body">
    <?= form_open(str_replace("_", "", $_view) . "/" . $_kebutuhan_diperlukan['kebutuhan_diperlukan_id']); ?>
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label for="kebutuhan_diperlukan_nama">Nama Kebutuhan Yang Diperlukan</label>
          <input type="text" class="form-control <?= (form_error('kebutuhan_diperlukan_nama') != null) ? 'is-invalid' : '' ?>" id="kebutuhan_diperlukan_nama" name="kebutuhan_diperlukan_nama" placeholder="Masukkan Nama Kebutuhan Yang Diperlukan" value="<?= ($this->input->post('kebutuhan_diperlukan_nama') ? $this->input->post('kebutuhan_diperlukan_nama') : $_kebutuhan_diperlukan['kebutuhan_diperlukan_nama']); ?>">
          <div class="invalid-feedback">
            <?= form_error('kebutuhan_diperlukan_nama'); ?>
          </div>
        </div>
        <button type="submit" class="btn btn-primary" name='simpan'>Simpan</button>
      </div>
    </div>
    <?= form_close(); ?>
  </div>
</div>
<!-- /.card -->