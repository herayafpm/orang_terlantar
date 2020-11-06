<p class="login-box-msg">Daftar Akun</p>
<div class="alert alert-div" role="alert"></div>
<form action="<?=base_url('auth/register')?>" method="post">
  <div class="input-group mb-3">
    <input type="text" data-inputmask-alias="9" data-inputmask-repeat="16" data-inputmask-greedy="false"  class="form-control <?=(form_error('nik') != null)?'is-invalid':''?>" value="<?= ($this->input->post('nik')) ? $this->input->post('nik') :''?>" name="nik" placeholder="Masukkan NIK">
    <div class="invalid-feedback">
      <?= form_error('nik');?>
    </div>
  </div>
  
  <div class="input-group mb-3">
    <input type="text" class="form-control <?=(form_error('nik') != null)?'is-invalid':''?>" value="<?= ($this->input->post('nama')) ? $this->input->post('nama') :''?>" name="nama" placeholder="Masukkan Nama">
    <div class="invalid-feedback">
      <?= form_error('nama');?>
    </div>
  </div>
  <div class="input-group mb-3">
    <input type="text" class="form-control <?=(form_error('nama') != null)?'is-invalid':''?>" value="<?= ($this->input->post('tempat_lahir')) ? $this->input->post('tempat_lahir') :''?>" name="tempat_lahir" placeholder="Masukkan Tempat Lahir">
    <div class="invalid-feedback">
      <?= form_error('tempat_lahir');?>
    </div>
  </div>
  <div class="input-group mb-3">
    <input type="text" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" class="form-control <?=(form_error('tanggal_lahir') != null)?'is-invalid':''?>" value="<?= ($this->input->post('tanggal_lahir')) ? $this->input->post('tanggal_lahir') :''?>" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir">
    <div class="invalid-feedback">
      <?= form_error('tanggal_lahir');?>
    </div>
  </div>
  <div class="form-group">
    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control <?=(form_error('jenis_kelamin') != null)?'is-invalid':''?>">
      <option value="0" <?=($this->input->post('jenis_kelamin') == "0")?"selected":""?>>-- Pilih Jenis Kelamin --</option>
      <option value="PRIA" <?=($this->input->post('jenis_kelamin') == "PRIA")?"selected":""?>>Pria</option>
      <option value="WANITA"  <?=($this->input->post('jenis_kelamin') == "WANITA")?"selected":""?>>Wanita</option>
    </select>
    <div class="invalid-feedback">
      <?= form_error('jenis_kelamin');?>
    </div>
  </div>
  <div class="input-group mb-3">
    <input type="text" class="form-control <?=(form_error('desa') != null)?'is-invalid':''?>" value="<?= ($this->input->post('desa')) ? $this->input->post('desa') :''?>" name="desa" placeholder="Masukkan Desa">
    <div class="invalid-feedback">
      <?= form_error('desa');?>
    </div>
  </div>
  <div class="input-group mb-3">
    <input type="number" class="form-control <?=(form_error('rt') != null)?'is-invalid':''?>" value="<?= ($this->input->post('rt')) ? $this->input->post('rt') :''?>" name="rt" placeholder="Masukkan RT">
    <div class="invalid-feedback">
      <?= form_error('rt');?>
    </div>
    <input type="number" class="form-control <?=(form_error('rw') != null)?'is-invalid':''?>" value="<?= ($this->input->post('rw')) ? $this->input->post('rw') :''?>" name="rw" placeholder="Masukkan RW">
    <div class="invalid-feedback">
      <?= form_error('rw');?>
    </div>
  </div>
  <div class="input-group mb-3">
    <input type="text" class="form-control <?=(form_error('kecamatan') != null)?'is-invalid':''?>" value="<?= ($this->input->post('kecamatan')) ? $this->input->post('kecamatan') :''?>" name="kecamatan" placeholder="Masukkan Kecamatan">
    <div class="invalid-feedback">
      <?= form_error('kecamatan');?>
    </div>
  </div>
  <div class="input-group mb-3">
    <input type="text" class="form-control <?=(form_error('kabupaten') != null)?'is-invalid':''?>" value="<?= ($this->input->post('kabupaten')) ? $this->input->post('kabupaten') :''?>" name="kabupaten" placeholder="Masukkan Kabupaten">
    <div class="invalid-feedback">
      <?= form_error('kabupaten');?>
    </div>
  </div>
  <div class="input-group mb-3">
    <input type="text" class="form-control <?=(form_error('provinsi') != null)?'is-invalid':''?>" value="<?= ($this->input->post('provinsi')) ? $this->input->post('provinsi') :''?>" name="provinsi" placeholder="Masukkan Provinsi">
    <div class="invalid-feedback">
      <?= form_error('provinsi');?>
    </div>
  </div>
  <div class="input-group mb-3">
    <input type="text" data-inputmask-alias="9" data-inputmask-repeat="14" class="form-control <?=(form_error('no_telp') != null)?'is-invalid':''?>" value="<?= ($this->input->post('no_telp')) ? $this->input->post('no_telp') :''?>" name="no_telp" placeholder="Masukkan No Telepon (WA)">
    <div class="invalid-feedback">
      <?= form_error('no_telp');?>
    </div>
  </div>
  <div class="input-group mb-3">
    <input type="password" class="form-control <?=(form_error('password') != null)?'is-invalid':''?>" value="<?= ($this->input->post('password')) ? $this->input->post('password') :''?>" name="password" placeholder="Masukkan password">
    <div class="invalid-feedback">
      <?= form_error('password');?>
    </div>
  </div>
  
  <div class="row">
    <!-- /.col -->
    <div class="col-12">
      <button type="submit" name="daftar" class="btn btn-primary btn-block">Kirim Data</button>
    </div>
    <!-- /.col -->
  </div>
</form>
<p class="mb-0">
  <a href="<?=base_url('auth')?>" class="text-center">Login</a>
</p>