
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
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?=base_url()?>"><b><?=APP_NAME?></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      
      <?php $this->load->view($_view) ?>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<!-- jQuery -->
<script src="<?=base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/vendor/adminlte/js/adminlte.min.js')?>"></script>

<?php if(strpos($_view,"register")):?>
<script src="<?=base_url('assets/vendor/inputmask/jquery.inputmask.min.js')?>"></script>
<?php endif;?>
<script>
  // assumes you're using jQuery
$(document).ready(function() {
  $('.alert-div').hide();
  <?php if($this->session->flashdata('success')): ?>
    $('.alert-div').addClass('alert-success')
    $('.alert-div').html('<?= $this->session->flashdata('success'); ?>').show();
  <?php endif; ?>
  <?php if($this->session->flashdata('error')): ?>
    $('.alert-div').addClass('alert-danger')
    $('.alert-div').html('<?= $this->session->flashdata('error'); ?>').show();
  <?php endif; ?>
  <?php if(strpos($_view,"register")):?>
  $(":input").inputmask();
  <?php endif;?>
});
</script>
</body>
</html>
