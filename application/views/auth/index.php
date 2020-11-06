<p class="login-box-msg">Masuk untuk memulai</p>
<div class="alert alert-div" role="alert"></div>
<form action="<?=base_url('auth')?>" method="post">
  <div class="input-group mb-3">
    <input type="text" class="form-control" value="<?= ($this->input->post('username')) ? $this->input->post('username') :''?>" name="username" placeholder="Masukkan username">
    <div class="input-group-append">
      <div class="input-group-text">
        <span class="fas fa-envelope"></span>
      </div>
    </div>
  </div>
  <div class="input-group mb-3">
    <input type="password" class="form-control" value="<?= ($this->input->post('password')) ? $this->input->post('password') :''?>" name="password" placeholder="Masukkan password">
    <div class="input-group-append">
      <div class="input-group-text">
        <span class="fas fa-lock"></span>
      </div>
    </div>
  </div>
  <div class="row">
    <!-- /.col -->
    <div class="col-12">
      <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
    </div>
    <!-- /.col -->
  </div>
</form>

<p class="mb-1 mt-2">
  <a href="<?=base_url('auth/forgotpass')?>">Lupa Kata Sandi?</a>
</p>
<p class="mb-0">
  <a href="<?=base_url('auth/register')?>" class="text-center">Daftar</a>
</p>