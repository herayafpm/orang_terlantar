<!-- Default box -->
<div class="card">
  <div class="card-body">
    <?= form_open($_view); ?>
      <div class="row">
        <div class="col-lg-4">
          <div class="form-group">
            <label for="admin_nama">Nama Admin</label>
            <input type="text" class="form-control <?=(form_error('admin_nama') != null)?'is-invalid':''?>" id="admin_nama" name="admin_nama" placeholder="Masukkan Nama Admin" value="<?= ($this->input->post('admin_nama') ? $this->input->post('admin_nama') : ""); ?>">
            <div class="invalid-feedback">
              <?= form_error('admin_nama');?>
            </div>
          </div>
          <div class="form-group">
            <label for="admin_username">Username Admin</label>
            <input type="text" class="form-control <?=(form_error('admin_username') != null)?'is-invalid':''?>" id="admin_username" name="admin_username" placeholder="Masukkan Username Admin" value="<?= ($this->input->post('admin_username') ? $this->input->post('admin_username') : ""); ?>">
            <div class="invalid-feedback">
              <?= form_error('admin_username');?>
            </div>
          </div>
          <div class="form-group form-check">
            <input type="checkbox" name="role_id" class="form-check-input <?=(form_error('role_id') != null)?'is-invalid':''?>" id="role_id" value="1" <?= ($this->input->post('role_id') == 1 ? "checked" : ""); ?> >
            <label class="form-check-label" for="role_id">Super Admin?</label>
            <div class="invalid-feedback">
              <?= form_error('admin_username');?>
            </div>
          </div>
          <button type="submit" class="btn btn-primary" name='simpan'>Simpan</button>
        </div>
      </div>
    <?= form_close(); ?>
  </div>
</div>
<!-- /.card -->