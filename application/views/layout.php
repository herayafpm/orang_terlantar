<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?=base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>">
    <?php if(isset($_datatable)): ?>
      <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>"/>
    <?php endif; ?>

    <title><?=APP_NAME?> | <?=$_title?></title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="<?=base_url('')?>"><?=APP_NAME?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link" href="<?= isset($this->session->user_id)?base_url('user/dashboard'):base_url('')?>">Home</span></a>
            <a class="nav-item nav-link" href="<?=base_url('orangterlantar/cari')?>">Cari Orang Terlantar</span></a>
            <?php if(isset($this->session->user_id)):?>
              <a class="nav-item nav-link" href="<?=base_url('user/orangterlantar/add')?>">Daftar Orang Terlantar</span></a>
              <a class="nav-item btn btn-danger" href="#" onClick="logout()">Logout</a>
            <?php else:?>
              <a class="nav-item btn btn-primary" href="<?=base_url('auth')?>">Login</a>
            <?php endif;?>
          </div>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="alert alert-div" role="alert"></div>
      <?php $this->load->view($_view)?>
    </div>



    <!-- jQuery -->
    <script src="<?=base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <?php if(strpos($_view,'orang_terlantar/add')){
      $this->load->view($_view."_script");
    }
    ?>
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