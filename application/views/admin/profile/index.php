<!-- Default box -->
<div class="card">
  <div class="card-body">
    <form class="form-horizontal" method="post" action="<?=base_url('admin/profile')?>">
      <div class="form-group row">
        <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
          <input type="nama" class="form-control <?=(form_error('admin_nama') != null)?'is-invalid':''?>" id="inputNama" name="admin_nama" placeholder="Nama Lengkap Admin" value="<?= ($this->input->post('admin_nama') ? $this->input->post('admin_nama') : $_admin['admin_nama']); ?>">
          <div class="invalid-feedback">
            <?= form_error('admin_nama');?>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control <?=(form_error('admin_password') != null)?'is-invalid':''?>" id="inputPassword" placeholder="Password Sekarang" name="admin_password">
          <div class="invalid-feedback">
            <?= form_error('admin_password');?>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPasswordBaru" class="col-sm-2 col-form-label">Password Baru</label>
        <div class="col-sm-10">
          <input type="password" class="form-control <?=(form_error('admin_password_baru') != null)?'is-invalid':''?>" id="inputPasswordBaru" placeholder="Password Baru (kosongi jika tidak ingin mengubah password)" name="admin_password_baru" value="<?= ($this->input->post('admin_password_baru') ? $this->input->post('admin_password_baru') : ""); ?>">
          <div class="invalid-feedback">
            <?= form_error('admin_password_baru');?>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
          <button type="submit" class="btn btn-success">Update</button>
        </div>
      </div>
    </form>
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->