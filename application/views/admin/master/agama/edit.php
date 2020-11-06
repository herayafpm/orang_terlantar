<!-- Default box -->
<div class="card">
  <div class="card-body">
    <?= form_open($_view."/".$_agama['agama_id']); ?>
      <div class="row">
        <div class="col-lg-4">
          <div class="form-group">
            <label for="agama_nama">Nama Agama</label>
            <input type="text" class="form-control <?=(form_error('agama_nama') != null)?'is-invalid':''?>" id="agama_nama" name="agama_nama" placeholder="Masukkan Nama Agama" value="<?= ($this->input->post('agama_nama') ? $this->input->post('agama_nama') : $_agama['agama_nama']); ?>">
            <div class="invalid-feedback">
              <?= form_error('agama_nama');?>
            </div>
          </div>
          <button type="submit" class="btn btn-primary" name='simpan'>Simpan</button>
        </div>
      </div>
    <?= form_close(); ?>
  </div>
</div>
<!-- /.card -->