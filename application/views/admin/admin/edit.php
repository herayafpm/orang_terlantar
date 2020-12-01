<!-- Default box -->
<div class="card">
  <div class="card-body">
    <?= form_open($_view . "/" . $_admin['admin_id']); ?>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="admin_nama">Nama Admin</label>
          <input type="text" class="form-control <?= (form_error('admin_nama') != null) ? 'is-invalid' : '' ?>" id="admin_nama" name="admin_nama" placeholder="Masukkan Nama Admin" value="<?= ($this->input->post('admin_nama') ? $this->input->post('admin_nama') : $_admin['admin_nama']); ?>">
          <div class="invalid-feedback">
            <?= form_error('admin_nama'); ?>
          </div>
        </div>
        <div class="form-group">
          <label for="admin_username">Username Admin</label>
          <input type="text" class="form-control <?= (form_error('admin_username') != null) ? 'is-invalid' : '' ?>" id="admin_username" name="admin_username" placeholder="Masukkan Username Admin" value="<?= ($this->input->post('admin_username') ? $this->input->post('admin_username') : $_admin['admin_username']); ?>">
          <div class="invalid-feedback">
            <?= form_error('admin_username'); ?>
          </div>
        </div>
        <div class="form-group">
          <label for="inputPasswordBaru">Password Baru</label>
          <input type="password" class="form-control <?= (form_error('admin_password') != null) ? 'is-invalid' : '' ?>" id="inputPasswordBaru" placeholder="Password Baru (kosongi jika tidak ingin mengubah password)" name="admin_password">
          <div class="invalid-feedback">
            <?= form_error('admin_password'); ?>
          </div>
        </div>
        <button type="submit" class="btn btn-primary" name='simpan'>Simpan</button>
      </div>
    </div>
    <?= form_close(); ?>
  </div>
</div>
<!-- /.card -->