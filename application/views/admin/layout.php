
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=APP_NAME?> | <?=$_title?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets/vendor/fontawesome-free/css/all.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url('assets/vendor/adminlte/css/adminlte.min.css')?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <?php if(isset($_datatable)): ?>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>"/>
  <?php endif; ?>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url('admin/dashboard')?>" class="brand-link">
      <img src="<?=base_url('assets/vendor/adminlte/img/AdminLTELogo.png')?>"
           alt="<?=APP_NAME?> Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?= APP_NAME ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url('assets/vendor/adminlte/img/user2-160x160.jpg')?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$this->admin['admin_nama'] ?? "Nama Admin"?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?=base_url('admin/dashboard')?>" class="nav-link <?=($_view == 'admin/dashboard')?'active':''?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <?php if($this->session->isSuperAdmin):?>
          <li class="nav-item has-treeview <?=(strpos($_view, 'master') !== false)?'menu-open':''?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
                $master_view = ['agama','tempat_tinggal','kategori_ot','fasilitas_kesehatan','kondisi_ot','kebutuhan_diperlukan','orang_terlantar','bansos','kondisi_tempat_tinggal'];
                sort($master_view);
              ?>
              <?php foreach($master_view as $view):?>
              <?php
                $urld = explode('/',$_view);
                $active = false;
                if($urld[1] == 'master'){
                  if($urld[2] == $view){
                    $active = true;
                  }
                }
              ?>
              <li class="nav-item">
                <a href="<?=base_url('admin/master/'.str_replace("_","",$view))?>" class="nav-link <?=($active)?'active':''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p class='text-capitalize'>
                    <?php
                    switch ($view) {
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
                        echo str_replace('_'," ",$view);
                        break;
                    }
                    ?>
                  </p>
                </a>
              </li>
              <?php endforeach;?>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('admin/admin')?>" class="nav-link <?=(strpos($_view, 'admin/admin') !== false)?'active':''?>">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Admin
              </p>
            </a>
          </li>
          <?php endif?>
          <li class="nav-item">
            <a href="<?=base_url('admin/profile')?>" class="nav-link <?=(strpos($_view, 'profile') !== false)?'active':''?>">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" onclick="logout()" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1><?=$_title?></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="alert alert-div" role="alert">
      </div>
      <?php
        $this->load->view($_view); 
      ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.3
      </div>
      <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?=base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
  <!-- AdminLTE App -->
  <script src="<?=base_url('assets/vendor/adminlte/js/adminlte.min.js')?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?=base_url('assets/vendor/adminlte/js/demo.js')?>"></script>
  <?php if(isset($_datatable)): ?>
    <script type="text/javascript" src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
    <?php $this->load->view($_datatable_view,compact('_datatable_view'))?>
  <?php endif; ?>
  <script>
  function logout() {
    var cek = confirm('Yakin ingin mengakhiri sesi?');
    if(cek){
      window.location = "<?=base_url('auth/logout')?>"
    }
  }
  // assumes you're using jQuery
  $(document).ready(function() {
    $('.alert-div').hide();
    $('.alert-div').removeClass('alert-danger')
    $('.alert-div').removeClass('alert-success')
    <?php if($this->session->flashdata('success')): ?>
      $('.alert-div').addClass('alert-success')
      $('.alert-div').html('<?= $this->session->flashdata('success'); ?>').show();
    <?php endif; ?>
    <?php if($this->session->flashdata('error')): ?>
      $('.alert-div').removeClass('alert-danger')
      $('.alert-div').addClass('alert-danger')
      $('.alert-div').html('<?= $this->session->flashdata('error'); ?>').show();
    <?php endif; ?>
  });
  </script>
</body>
</html>
