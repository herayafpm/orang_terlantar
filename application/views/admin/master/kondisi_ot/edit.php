<!-- Default box -->
<div class="card">
  <div class="card-body">
    <?= form_open(str_replace("_", "", $_view) . "/" . $_kondisi_ot['kondisi_ot_id']); ?>
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label for="kondisi_ot_nama">Nama Kondisi Orang Terlantar</label>
          <input type="text" class="form-control <?= (form_error('kondisi_ot_nama') != null) ? 'is-invalid' : '' ?>" id="kondisi_ot_nama" name="kondisi_ot_nama" placeholder="Masukkan Nama Kondisi Orang Terlantar" value="<?= ($this->input->post('kondisi_ot_nama') ? $this->input->post('kondisi_ot_nama') : $_kondisi_ot['kondisi_ot_nama']); ?>">
          <div class="invalid-feedback">
            <?= form_error('kondisi_ot_nama'); ?>
          </div>
        </div>
        <button type="submit" class="btn btn-primary" name='simpan'>Simpan</button>
      </div>
    </div>
    <?= form_close(); ?>
  </div>
</div>
<!-- /.card -->