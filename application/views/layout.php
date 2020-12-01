<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $_title ?> - <?= APP_NAME ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('') ?>/assets/images/logobms.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('') ?>/assets/vendor/presento/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('') ?>/assets/vendor/presento/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?= base_url('') ?>/assets/vendor/presento/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url('') ?>/assets/vendor/presento/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= base_url('') ?>/assets/vendor/presento/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url('') ?>/assets/vendor/presento/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?= base_url('') ?>/assets/vendor/presento/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('') ?>/assets/vendor/presento/css/style.css" rel="stylesheet">
  <link href="<?= base_url('') ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/') ?>select2/css/select2.min.css">
  <?php if (isset($_datatable)) : ?>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/') ?>datatables/jquery.dataTables.min.css">
  <?php endif; ?>
  <!-- Data Tables -->

  <!-- =======================================================
  * Template Name: Presento - v1.0.0
  * Template URL: https://bootstrapmade.com/presento-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container-fluid">
      <div class="row justify-content-between">
        <div class="col-xl-12 d-flex align-items-center text-center">
          <h1 class="logo mr-auto"><a href="<?= base_url('') ?>"><?= APP_NAME ?></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a>-->

          <nav class="nav-menu d-none d-lg-block">
            <ul>
              <li class="<?= ($_view == 'welcome') ? "active" : "" ?>"><a href="<?= base_url('') ?>">Beranda</a></li>
              <li class="<?= ($_view == 'orang_terlantar/cari') ? "active" : "" ?>"><a href="<?= base_url('orangterlantar/cari') ?>">Cari Data</a></li>
              <li class="<?= ($_view == 'tutorial') ? "active" : "" ?>"><a href="<?= base_url('tutorial') ?>">Tutorial</a></li>
              <?php if (isset($this->session->isLogin)) : ?>
                <li class="<?= ($_view == 'user/orang_terlantar/add') ? "active" : "" ?>"><a href="<?= base_url('user/orangterlantar/add') ?>">Daftar OT</a></li>
                <li class="<?= ($_view == 'user/orang_terlantar/list') ? "active" : "" ?>"><a href="<?= base_url('user/orangterlantar/list') ?>">List OT Terdaftar</a></li>
                <li class="<?= ($_view == 'user/dashboard') ? "active" : "" ?>"><a href="<?= base_url('user/dashboard') ?>">Riwayat Pendaftaran</a></li>
                <li class="<?= ($_view == 'user/changepass') ? "active" : "" ?>"><a href="<?= base_url('user/dashboard/changepass') ?>">Ganti Password</a></li>
              <?php else : ?>
                <li class="<?= ($_view == 'auth/register') ? "active" : "" ?>"><a href="<?= base_url('auth/register') ?>">Daftar Akun</a></li>
                <li class="<?= ($_view == 'auth/forgotpass') ? "active" : "" ?>"><a href="<?= base_url('auth/forgotpass') ?>">Lupa Password</a></li>
              <?php endif ?>

            </ul>
          </nav><!-- .nav-menu -->
          <?php if (isset($this->session->isLogin)) : ?>
            <a onclick="logout()" href="#" class="get-started-btn">Logout (<?= $this->session->user_nama ?? $this->session->admin_nama ?? "" ?>)</a>
          <?php else : ?>
            <a href="<?= base_url('auth') ?>" class="get-started-btn">Login</a>
          <?php endif ?>
        </div>
      </div>

    </div>
  </header><!-- End Header -->

  <?php $this->load->view($_view) ?>

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row justify-content-around">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Orang Terlantar</h3>
            <p>
              Jl. Pemuda No. 24 Purwokerto 53132 <br>
              <strong>Phone:</strong> 0281-6316198<br>
              <strong>Fax:</strong> 633047<br>
              <strong>Email:</strong> dinsospermades@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Menu</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('') ?>">Dashboard</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('orangterlantar/cari') ?>">Cari Data</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('tutorial') ?>">Tutorial</a></li>
              <?php if (isset($this->session->isLogin)) : ?>
                <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('user/orangterlantar/add') ?>">Daftar OT</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('user/orangterlantar/list') ?>">List OT Terdaftar</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('user/dashboard') ?>">Riwayat Pendaftaran</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('user/dashboard/changepass') ?>">Ganti Password</a></li>
                <li><i class="bx bx-chevron-right"></i><a onclick="logout()" href="#">Logout (<?= $this->session->user_nama ?? $this->session->admin_nama ?? "" ?>)</a></li>
              <?php else : ?>
                <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('auth/register') ?>">Daftar Akun</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('auth/forgotpass') ?>">Lupa Password</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('auth') ?>">Login</a></li>
              <?php endif ?>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>Orang Terlantar</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/presento-bootstrap-corporate-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('') ?>/assets/vendor/presento/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('') ?>/assets/vendor/presento/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('') ?>/assets/vendor/presento/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?= base_url('') ?>/assets/vendor/presento/vendor/php-email-form/validate.js"></script>
  <script src="<?= base_url('') ?>/assets/vendor/presento/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?= base_url('') ?>/assets/vendor/presento/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="<?= base_url('') ?>/assets/vendor/presento/vendor/counterup/counterup.min.js"></script>
  <script src="<?= base_url('') ?>/assets/vendor/presento/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url('') ?>/assets/vendor/presento/vendor/venobox/venobox.min.js"></script>
  <script src="<?= base_url('') ?>/assets/vendor/presento/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('') ?>/assets/vendor/presento/js/main.js"></script>
  <script src="<?= base_url('assets/vendor/moment/moment-with-locales.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/inputmask/jquery.inputmask.min.js') ?>"></script>

  <!-- Select2 -->
  <script src="<?= base_url('assets/vendor/') ?>select2/js/select2.full.min.js"></script>
  <?php if (strpos($_view, 'orang_terlantar/add') !== FALSE || strpos($_view, 'orang_terlantar/edit') !== FALSE || strpos($_view, 'orang_terlantar/list') !== FALSE  || strpos($_view, 'auth') !== FALSE || strpos($_view, 'user/changepass') !== FALSE) {
    $this->load->view($_view . "_script");
  }
  ?>
  <?php if (isset($_datatable)) : ?>
    <script type="text/javascript" src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
    <?php $this->load->view($_datatable_view, compact('_datatable_view')) ?>
  <?php endif; ?>

  <script>
    function logout() {
      var cek = confirm('Yakin ingin mengakhiri sesi?');
      if (cek) {
        window.location = "<?= base_url('auth/logout') ?>"
      }
    }

    function formatRupiah(angka, prefix) {
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }

      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    function toLocaleDate(date) {
      moment.locale('id')
      return moment(date).format('LL')
    }
    $(function() {
      $(":input").inputmask();
      $('.torupiah').text(function(index, currentcontent) {
        return formatRupiah(currentcontent, 'Rp.')
      })
      $(".select2").select2();
      $('.alert-div').hide();
      <?php if ($this->session->flashdata('success')) : ?>
        $('.alert-div').addClass('alert-success')
        $('.alert-div').html('<?= $this->session->flashdata('success'); ?>').show();
      <?php endif; ?>
      <?php if ($this->session->flashdata('error')) : ?>
        $('.alert-div').addClass('alert-danger')
        $('.alert-div').html('<?= $this->session->flashdata('error'); ?>').show();
      <?php endif; ?>
    });
  </script>
</body>

</html>