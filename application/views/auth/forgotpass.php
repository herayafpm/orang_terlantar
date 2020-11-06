<p class="login-box-msg">Lupa Kata Sandi</p>
<form action="<?=base_url('auth/forgotpass')?>" method="post">
  <div class="input-group mb-3">
    <input type="text" class="form-control <?=(form_error('username') != null)?'is-invalid':''?>" placeholder="Masukkan username atau NIK" name="username" value="<?= ($this->input->post('username')) ? $this->input->post('username') :''?>">
    <div class="invalid-feedback">
      <?= form_error('username');?>
    </div>
  </div>
  <div class="input-group mb-3">
    <input type="password" class="form-control <?=(form_error('password') != null)?'is-invalid':''?>" placeholder="Masukkan password" name="password" value="<?= ($this->input->post('password')) ? $this->input->post('password') :''?>">
    <div class="invalid-feedback">
      <?= form_error('password');?>
    </div>
  </div>
  <div class="input-group mb-3">
    <input type="password" class="form-control <?=(form_error('password2') != null)?'is-invalid':''?>" placeholder="Masukkan Konfirmasi Password" name="password2" value="<?= ($this->input->post('password2')) ? $this->input->post('password2') :''?>">
    <div class="invalid-feedback">
      <?= form_error('password2');?>
    </div>
  </div>
  <div class="row">
    <!-- /.col -->
    <div class="col-12">
      <button type="submit" class="btn btn-primary btn-block" name="kirim">Kirim Data</button>
    </div>
    <!-- /.col -->
  </div>
</form>

<p class="mb-1 mt-2">
  <a href="<?=base_url('auth')?>">Login</a>
</p>