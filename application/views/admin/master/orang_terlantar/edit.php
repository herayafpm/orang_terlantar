<!-- Default box -->
<div class="card">
  <div class="card-body">
    <?= form_open(str_replace("_", "", $_view) . "/" . $_orang_terlantar['orang_terlantar_id']); ?>
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label for="orang_terlantar_nama">Nama Orang Terlantar</label>
          <input type="text" class="form-control <?= (form_error('orang_terlantar_nama') != null) ? 'is-invalid' : '' ?>" id="orang_terlantar_nama" name="orang_terlantar_nama" placeholder="Masukkan Nama Orang Terlantar" value="<?= ($this->input->post('orang_terlantar_nama') ? $this->input->post('orang_terlantar_nama') : $_orang_terlantar['orang_terlantar_nama']); ?>">
          <div class="invalid-feedback">
            <?= form_error('orang_terlantar_nama'); ?>
          </div>
        </div>
        <button type="submit" class="btn btn-primary" name='simpan'>Simpan</button>
      </div>
    </div>
    <?= form_close(); ?>
  </div>
</div>
<!-- /.card -->