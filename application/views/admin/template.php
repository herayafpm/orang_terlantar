<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Language" content="en">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title><?= $_title ?> | <?= APP_NAME ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
  <meta name="description" content="This is an example dashboard created using build-in elements and components.">
  <meta name="msapplication-tap-highlight" content="no">
  <link href="<?= base_url() ?>/assets/images/logobms.png" rel="shortcut icon" type="image/vnd.microsoft.icon">
  <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
  <link href="<?= base_url('assets/vendor/architectui/css/main.css') ?>" rel="stylesheet">
  <?php if (isset($_datatable)) : ?>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/daterangepicker/daterangepicker.css') ?>" />
  <?php endif; ?>
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/toastr/toastr.min.css') ?>" />
  <style>
    html,
    body {
      margin: 0;
      overflow-x: hidden
    }

    /* width */
    ::-webkit-scrollbar {
      width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #555;
    }
  </style>
</head>

<body>
  <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    <div class="app-header header-shadow bg-info header-text-dark">
      <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
          <div>
            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>
        </div>
      </div>
      <div class="app-header__mobile-menu">
        <div>
          <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </button>
        </div>
      </div>
      <div class="app-header__menu">
        <span>
          <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
            <span class="btn-icon-wrapper">
              <i class="fa fa-ellipsis-v fa-w-6"></i>
            </span>
          </button>
        </span>
      </div>
      <div class="app-header__content">
        <div class="app-header-right">
          <div class="header-btn-lg pr-0">
            <div class="widget-content p-0">
              <div class="widget-content-wrapper">
                <div class="widget-content-left">
                  <div class="btn-group">
                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                      <img width="42" class="rounded-circle" src="<?= base_url('assets/vendor/architectui/images/avatars/2.jpg') ?>" alt="">
                      <i class="fa fa-angle-down ml-2 opacity-8"></i>
                    </a>
                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                      <button type="button" tabindex="0" onclick="window.location.href = '<?= base_url('admin/profile') ?>'" class="dropdown-item">Profile</button>
                      <button type="button" tabindex="0" onclick="window.location.href = '<?= base_url('admin/log') ?>'" class="dropdown-item">Catatan Login</button>
                      <button type="button" onclick="logout()" tabindex="0" class="dropdown-item">Logout</button>
                    </div>
                  </div>
                </div>
                <div class="widget-content-left  ml-3 header-user-info">
                  <div class="widget-heading">
                    <?= $this->admin['admin_nama'] ?>
                  </div>
                  <div class="widget-subheading">
                    <?= ($this->admin['role_id'] == 1) ? "Superadmin" : "Admin" ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="app-main">
      <div class="app-sidebar sidebar-shadow bg-dark sidebar-text-light">
        <div class="app-header__logo">
          <div class="logo-src"></div>
          <div class="header__pane ml-auto">
            <div>
              <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                <span class="hamburger-box">
                  <span class="hamburger-inner"></span>
                </span>
              </button>
            </div>
          </div>
        </div>
        <div class="app-header__mobile-menu">
          <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>
        </div>
        <div class="app-header__menu">
          <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
              <span class="btn-icon-wrapper">
                <i class="fa fa-ellipsis-v fa-w-6"></i>
              </span>
            </button>
          </span>
        </div>
        <div class="scrollbar-sidebar">
          <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
              <li class="app-sidebar__heading"></li>
              <li>
                <a href="<?= base_url("admin/dashboard") ?>" class="<?= ($_view == 'admin/dashboard') ? 'mm-active' : '' ?>">
                  <i class="metismenu-icon pe-7s-rocket"></i>
                  Dashboard
                </a>
              </li>
              <?php if ($this->admin['role_id'] == 1) : ?>
                <li class="app-sidebar__heading">Data</li>
                <li class=" <?= (strpos($_view, 'master') !== false) ? 'mm-active' : '' ?>">
                  <a href="#">
                    <i class="metismenu-icon pe-7s-server"></i>
                    Data Master
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                  </a>
                  <ul>
                    <?php
                    $master_view = ['agama', 'bansos', 'tempat_tinggal', 'kategori_ot', 'fasilitas_kesehatan', 'kondisi_ot', 'kebutuhan_diperlukan', 'orang_terlantar', 'sumber_dana', 'kondisi_tempat_tinggal'];
                    sort($master_view);
                    ?>
                    <?php foreach ($master_view as $view) : ?>
                      <?php
                      $urld = explode('/', $_view);
                      $active = false;
                      if ($urld[1] == 'master') {
                        if ($urld[2] == $view) {
                          $active = true;
                        }
                      }
                      ?>
                      <li>
                        <a href="<?= base_url('admin/master/' . str_replace("_", "", $view)) ?>" class="nav-link text-capitalize <?= ($active) ? 'mm-active' : '' ?>">
                          <i class=" metismenu-icon"></i>
                          <?php
                          switch ($view) {
                            case 'bansos':
                              echo "Bantuan Sosial";
                              break;
                            case 'kategori_ot':
                              echo "kategori orang terlantar";
                              break;
                            case 'kondisi_ot':
                              echo "kondisi orang terlantar";
                              break;
                            case 'kondisi_ot':
                              echo "kondisi orang terlantar";
                              break;
                            case 'kebutuhan_diperlukan':
                              echo "Kebutuhan Yang Diperlukan";
                              break;
                            default:
                              echo str_replace('_', " ", $view);
                              break;
                          }
                          ?>
                        </a>
                      </li>
                    <?php endforeach ?>
                  </ul>
                </li>
                <li>
                  <a href="<?= base_url('admin/admin') ?>" class="<?= (strpos($_view, 'admin/admin') !== false) ? 'mm-active' : '' ?>">
                    <i class=" metismenu-icon pe-7s-users"></i>
                    Admin
                  </a>
                </li>
              <?php endif ?>
              <li class="app-sidebar__heading">User</li>
              <li>
                <a href="<?= base_url('admin/user/data/0') ?>" class="<?= ($uri == 'admin/user/data/0') ? 'mm-active' : '' ?>">
                  <i class="metismenu-icon pe-7s-users"></i>
                  User Belum Diverifikasi
                  <?php if ($_total_user_belum_verif > 0) : ?>
                    <div class="badge badge-success mr-1 ml-0">
                      <?= $_total_user_belum_verif ?>
                    </div>
                  <?php endif ?>
                </a>
              </li>
              <li>
                <a href="<?= base_url('admin/user/data/1') ?>" class="<?= ($uri == 'admin/user/data/1') ? 'mm-active' : '' ?>">
                  <i class="metismenu-icon pe-7s-users"></i>
                  User Sudah Diverifikasi
                </a>
              </li>
              <?php
              $statusOrangTerlantar = [
                ['status' => 'belum', 'title' => 'OT Belum Diproses'],
                ['status' => 'sudah', 'title' => 'OT Sudah Diproses'],
                ['status' => 'verif', 'title' => 'OT Diverifikasi'],
                ['status' => 'tolak', 'title' => 'OT Ditolak'],
              ];
              ?>
              <?php
              $no = 0;
              foreach ($_orang_terlantars as $orang_terlantar) : ?>
                <li class="app-sidebar__heading">Orang Terlantar (OT) <?= $orang_terlantar['orang_terlantar_nama'] ?></li>
                <?php foreach ($statusOrangTerlantar as $statusOT) : ?>
                  <li>
                    <a href="<?= base_url('admin/orangterlantar/data/' . $orang_terlantar['orang_terlantar_id'] . "/" . $statusOT['status']) ?>" class="<?= ($uri == 'admin/orangterlantar/data/' . $orang_terlantar['orang_terlantar_id'] . "/" . $statusOT['status']) ? 'mm-active' : '' ?>">
                      <i class="metismenu-icon pe-7s-display2"></i>
                      <?= $statusOT['title'] ?>
                      <?php if ($statusOT['status'] == 'belum' || $statusOT['status'] == 'sudah') : ?>
                        <?php if ($_total_terlantars[$no][$statusOT['status']] > 0) : ?>
                          <div class="badge badge-success mr-1 ml-0">
                            <?= $_total_terlantars[$no][$statusOT['status']] ?>
                          </div>
                        <?php endif ?>
                      <?php endif ?>
                    </a>
                  </li>
                <?php endforeach ?>
              <?php
                $no++;
              endforeach ?>
              <?php
              $statusOrangTerlantar = [
                ['status' => 'verif', 'title' => 'OT Diverifikasi'],
                ['status' => 'tolak', 'title' => 'OT Ditolak'],
              ];
              $no = 0;
              foreach ($_orang_terlantars as $orang_terlantar) : ?>
                <li class="app-sidebar__heading">Lap. Orang Terlantar (OT) <?= $orang_terlantar['orang_terlantar_nama'] ?></li>
                <?php foreach ($statusOrangTerlantar as $statusOT) : ?>
                  <li>
                    <a href="<?= base_url('admin/laporanorangterlantar/view/' . $orang_terlantar['orang_terlantar_id'] . "/" . $statusOT['status']) ?>" class="<?= ($uri == 'admin/laporanorangterlantar/view/' . $orang_terlantar['orang_terlantar_id'] . "/" . $statusOT['status']) ? 'mm-active' : '' ?>">
                      <i class="metismenu-icon pe-7s-display2"></i>
                      Laporan <?= $statusOT['title'] ?>
                    </a>
                  </li>
                <?php endforeach ?>
              <?php
                $no++;
              endforeach ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="app-main__outer">
        <div class="app-main__inner">
          <div class="app-page-title mb-n2">
            <div class="page-title-wrapper">
              <div class="page-title-heading">
                <div class="page-title-icon">
                  <i class="pe-7s-info icon-gradient bg-mean-fruit">
                  </i>
                </div>
                <div><?= $_title ?>
                </div>
              </div>
            </div>
          </div>
          <?php
          $this->load->view($_view);
          ?>
          <div class="scroll-area-lg">
            <div class="scrollbar-container">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- jQuery -->
  <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/toastr/toastr.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/moment/moment-with-locales.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/inputmask/jquery.inputmask.min.js') ?>"></script>
  <?php if (isset($_datatable)) : ?>
    <script type="text/javascript" src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/vendor/daterangepicker/daterangepicker.js') ?>"></script>
    <?php $this->load->view($_datatable_view, compact('_datatable_view')) ?>
  <?php endif; ?>
  <?php if (strpos($_view, 'terlantar/show')) {
    $this->load->view($_view . "_script");
  }
  ?>
  <script type="text/javascript" src="<?= base_url('assets/vendor/architectui/scripts/main.js') ?>"></script>

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

    function toLocaleDate(date, format = 'll') {
      moment.locale('id')
      return moment(date).format(format)
    }
    // assumes you're using jQuery
    $(document).ready(function(e) {

      $(":input").inputmask();
      $('.torupiah').text(function(index, currentcontent) {
        return formatRupiah(currentcontent, 'Rp.')
      })
      $('.alert-div').hide();
      $('.alert-div').removeClass('alert-danger')
      $('.alert-div').removeClass('alert-success')
      <?php if ($this->session->flashdata('success')) : ?>
        toastr["success"]("<?= $this->session->flashdata('success'); ?>")
      <?php endif; ?>
      <?php if ($this->session->flashdata('error')) : ?>
        toastr["error"]("<?= $this->session->flashdata('error'); ?>")
      <?php endif; ?>
    });
  </script>
</body>

</html>