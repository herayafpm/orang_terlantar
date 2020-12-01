<div class="container auth-section" data-aos="fade-up">
  <div class="section-title">
    <h2>Ganti Password</h2>
    <p><?= APP_NAME ?></p>
  </div>
  <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
    <div class="col-lg-6">
      <div class="alert alert-div" role="alert"></div>
      <form action="<?= base_url('user/dashboard/changepass') ?>" method="post" role="form" class="php-email-form">
        <div class="form-group">
          <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Password Lama" data-rule="minlen:6" data-msg="Harap isi password min. 6 karakter" />
          <div class="text-danger validate"></div>
        </div>
        <div class="form-group">
          <input type="password" name="new_password" class="form-control" data-rule="minlen:6" data-msg="Harap isi Password Baru min. 6 karakter" placeholder="Password Baru">
          <div class="text-danger validate"></div>
        </div>
        <div class="form-group">
          <input type="password" name="new_password2" class="form-control" data-rule="minlen:6" data-msg="Harap isi Konfirmasi Password Baru min. 6 karakter" placeholder="Konfirmasi Password Baru">
          <div class="text-danger validate"></div>
        </div>
        <div class="text-center"><button class="btn btn-disabled py-3 px-5 loading-submit d-none" type="button"><i class="fas fa-circle-notch fa-spin"></i></button></div>
        <div class="text-center"><button class="btn btn-primary py-3 px-5 button-submit" type="submit">Kirim Data</button></div>
      </form>
    </div>

  </div>

</div>