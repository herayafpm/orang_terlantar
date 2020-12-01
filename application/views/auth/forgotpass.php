<div class="container auth-section" data-aos="fade-up">
  <div class="section-title">
    <h2>Lupa Password</h2>
    <p><?= APP_NAME ?></p>
  </div>
  <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
    <div class="col-lg-6">
      <div class="alert alert-div" role="alert"></div>
      <form action="<?= base_url('auth/forgotpass') ?>" method="post" role="form" class="php-email-form">
        <div class="form-group">
          <input type="text" data-inputmask-alias="9" data-inputmask-repeat="16" name="nik" class="form-control" id="nik" placeholder="NIK" data-rule="required" data-msg="Harap isi" />
          <div class="text-danger validate"></div>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password" data-rule="minlen:6" data-msg="Harap isi password min. 6 karakter" />
          <div class="text-danger validate"></div>
        </div>
        <div class="form-group">
          <input type="password" name="password2" class="form-control" data-rule="minlen:6" data-msg="Harap isi Konfirmasi Password min. 6 karakter" placeholder="Konfirmasi Password">
          <div class="text-danger validate"></div>
        </div>
        <p style="margin-top: 20px;">
          Sudah Ingat ? Silahkan
          <a href="<?= base_url('auth') ?>" style=" text-decoration: underline; font-style: italic;">
            Login
          </a>
        </p>
        <div class="text-center"><button class="btn btn-disabled py-3 px-5 loading-submit d-none" type="button"><i class="fas fa-circle-notch fa-spin"></i></button></div>
        <div class="text-center"><button class="btn btn-primary py-3 px-5 button-submit" type="submit">Kirim Data</button></div>
      </form>
    </div>

  </div>

</div>