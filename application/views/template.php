<style type="text/css">
    .android {
        display: none;
    }

    .desktop {
        display: block;
    }

    @media only screen and (max-width: 991px) {
        .android {
            display: block;
        }

        .desktop {
            display: none !important;
        }

    }

    /* .navbar-dark .navbar-nav .nav-link {
        color: #fff !important;
    }*/

    .navbar-dark .navbar-nav .nav-link:hover,
    .navbar-dark .navbar-nav .nav-link:focus {
        color: #bababa !important;
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $_title ?? "" ?> | <?= APP_NAME ?></title>

    <link href="<?= base_url() ?>/assets/images/logobms.png" rel="shortcut icon" type="image/vnd.microsoft.icon">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/vendor/') ?>open-iconic/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/') ?>animate/animate.css">

    <link rel="stylesheet" href="<?= base_url('assets/vendor/') ?>owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/') ?>owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/') ?>magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/') ?>aos/aos.css">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/') ?>icofont/icofont.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/') ?>select2/css/select2.min.css">

    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">






    <link rel="stylesheet" href="<?= base_url('assets/vendor/') ?>ionicons/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/') ?>bootstrap/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/') ?>jquery/jquery.timepicker.css">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/') ?>flaticon/flaticon.css">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/') ?>icomoon/icomoon.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/') ?>style.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


</head>

<body>
    <nav class="navbar py-4 navbar-expand-lg ftco_navbar navbar-light bg-light flex-row desktop">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0" style="background-color: #fff">
                <div class="col-lg-2 pr-4 align-items-center">
                    <a class="navbar-brand" href="<?= base_url() ?>">Orang<span>Terlantar</span>
                        <br>

                    </a>
                </div>
            </div>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark desktop" id="ftco-navbar">
        <div class="container d-flex align-items-center">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item" style="padding-right: 5px; padding-left: 5px;"><a href="<?= base_url() ?>" class="nav-link pl-0">Beranda</a></li>
                    <li class="nav-item" style="padding-right: 5px; padding-left: 5px;"><a href="<?= base_url('orangterlantar/cari') ?>" class="nav-link">Cari Data</a></li>
                    <li class="nav-item" style="padding-right: 5px; padding-left: 5px;"><a href="<?= base_url('tutorial') ?>" class="nav-link">Tutorial</a></li>
                    <?php if (isset($this->session->isLogin)) : ?>
                        <li class="nav-item" style="padding-right: 5px; padding-left: 5px;"><a href="<?= base_url('user/orangterlantar/add') ?>" class="nav-link">Daftar Terlantar</a></li>
                        <li class="nav-item" style="padding-right: 5px; padding-left: 5px;"><a href="<?= base_url('user/orangterlantar/list') ?>" class="nav-link">List Terlantar Terdaftar</a></li>
                        <li class="nav-item" style="padding-right: 5px; padding-left: 5px;"><a href="<?= base_url('user/dashboard') ?>" class="nav-link">Riwayat Pendaftaran</a></li>
                        <li class="nav-item" style="padding-right: 5px; padding-left: 5px;"><a href="<?= base_url('user/dashboard/changepass') ?>" class="nav-link">Ganti Password</a></li>
                        <li class="nav-item" style="padding-right: 5px; padding-left: 5px;"><a onclick="logout()" href="#" class="nav-link">Logout (<?= $this->session->user_nama ?? $this->session->admin_nama ?? "" ?>)</a></li>
                    <?php else : ?>
                        <li class="nav-item" style="padding-right: 5px; padding-left: 5px;"><a href="<?= base_url('auth/register') ?>" class="nav-link">Daftar Akun</a></li>
                        <li class="nav-item" style="padding-right: 5px; padding-left: 5px;"><a href="<?= base_url('auth/forgotpass') ?>" class="nav-link">Lupa Password</a></li>
                        <li class="nav-item" style="padding-right: 5px; padding-left: 5px;"><a href="<?= base_url('auth') ?>" class="nav-link">Login</a></li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->
    <style type="text/css">
        .android {
            display: none;
        }

        .desktop {
            display: block;
        }

        @media only screen and (max-width: 780px) {
            .android {
                display: block;
            }

            .desktop {
                display: none;
            }
        }
    </style>


    <?php
    if (strpos($_view, 'auth') === false && strpos($_view, 'tutorial') === false && strpos($_view, 'orang_terlantar') === false && strpos($_view, 'user') === false) : ?>
        <section class="android">
            <div class="container" style="background-color: #69b4cb; background-size: cover; height:620px">
                <div class="row">
                    <div class="col-md-6">
                        <h3 style="color: #fff;padding-top: 50px">
                            <center>Orang<br><span style="color: black;"> Terlantar</span></span></center>
                        </h3>
                        <img src="<?= base_url('assets') ?>/images/ic_gendis.png" width="100%">
                        <br>
                    </div>
                </div>
        </section>
    <?php endif; ?>

    <?php $this->load->view($_view) ?>
    </section>
    <footer class="ftco-footer ftco-bg-dark ftco-section desktop">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-5">
                        <h2 class="ftco-heading-2 logo" style="font-size: 30px;">Orang<span>Terlantar</span></h2>
                        <p>Aplikasi yang digunakan sebagai inovasi pelayanan publik untuk menangani permasalahan yang dihadapi para orang terlantar di wilayah kabupaten banyumas</p>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-5">
                        <h2 class="ftco-heading-2">ALAMAT</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-location"></span><span class="text">Jl. Pemuda No. 24
                                        Purwokerto 53132</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">0281-6316198
                                            Fax. 633047</span></a></li>
                                <li><a href="#"><span class="icon icon-envelop"></span><span class="text">dinsospermades@gmail.com</span></a></li>
                            </ul>
                        </div>

                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                            <li class="ftco-animate"><a href="#"><span class="icon icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- android --->

    <div class="android" style="background-color: #2f318b; padding: auto;   position: fixed; bottom: 0; width: 100%; z-index: 100000;">
        <div class="row">
            <table style="margin-right: auto; margin-left: auto; margin-top: 10px; margin-bottom: 10px;">
                <tr>
                    <?php if (isset($this->session->isLogin)) : ?>
                        <td style="padding: auto;">
                            <div class="col-sm-4">
                                <center><a href="<?= base_url('user/orangterlantar/add') ?>" style="color: white; font-size: 10px;"><i class="fa fa-database" style="color: white; margin-bottom: 5px;"></i><br>Daftar <br> Terlantar </a></center>
                            </div>
                        </td>

                        <td style="padding: auto;">
                            <div class="col-sm-4">
                                <center><a href="<?= base_url('user/dashboard') ?>" style="color: white; font-size: 10px;"><i class="fa fa-file-text-o" style="color: white;  margin-bottom: 5px;"></i><br> Riwayat<br>Pendaftaran</a></center>
                            </div>
                        </td>

                        <td style="padding: auto;">
                            <div class="col-sm-4">
                                <center><a href="<?= base_url('user/dashboard/changepass') ?>" style="color: white; font-size: 10px;"><i class="fa fa-key" style="color: white;  margin-bottom: 5px;"></i><br> Ganti<br>Password</a></center>
                            </div>
                        </td>

                        <td style="padding: auto;">
                            <div class="col-sm-4">
                                <center><a href="#" onclick="logout()" style="color: white; font-size: 10px;"><i class="fa fa-key" style="color: white;  margin-bottom: 5px;"></i><br> Logout</a></center>
                            </div>
                        </td>
                    <?php else : ?>
                        <td style="padding: auto;">
                            <div class="col-sm-4">
                                <center><a href="<?= base_url('auth/register') ?>" style="color: white; font-size: 10px;"><i class="fa fa-database" style="color: white; margin-bottom: 5px;"></i><br>Daftar <br> Akun </a></center>
                            </div>
                        </td>

                        <td style="padding: auto;">
                            <div class="col-sm-4">
                                <center><a href="<?= base_url('orangterlantar/cari') ?>" style="color: white; font-size: 10px;"><i class="fa fa-file-text-o" style="color: white;  margin-bottom: 5px;"></i><br> Cari<br>Data</a></center>
                            </div>
                        </td>

                        <td style="padding: auto;">
                            <div class="col-sm-4">
                                <center><a href="<?= base_url('auth/forgotpass') ?>" style="color: white; font-size: 10px;"><i class="fa fa-key" style="color: white;  margin-bottom: 5px;"></i><br> Lupa<br>Password</a></center>
                            </div>
                        </td>

                        <td style="padding: auto;">
                            <div class="col-sm-4">
                                <center><a href="<?= base_url('auth') ?>" style="color: white; font-size: 10px;"><i class="fa fa-key" style="color: white;  margin-bottom: 5px;"></i><br> Login</a></center>
                            </div>
                        </td>
                    <?php endif ?>

                </tr>
            </table>
        </div>
    </div>

</html>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>


<!-- jQuery -->
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/jquery/jquery-migrate-3.0.1.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="https://use.fontawesome.com/e9181add6c.js"></script>
<script src="<?= base_url('assets/vendor/jquery/jquery.easing.1.3.js') ?>"></script>
<script src="<?= base_url('assets/vendor/jquery/jquery.waypoints.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/jquery/jquery.stellar.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/owl-carousel/owl.carousel.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/jquery/jquery.magnific-popup.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/aos/aos.js') ?>"></script>
<script src="<?= base_url('assets/vendor/jquery/jquery.animateNumber.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap-datepicker.js') ?>"></script>
<script src="<?= base_url('assets/vendor/jquery/jquery.timepicker.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/scrollax/scrollax.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/inputmask/jquery.inputmask.min.js') ?>"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="<?= base_url('assets/vendor/google-map/google-map.js') ?>"></script> -->
<script src="<?= base_url('assets/js/main.js') ?>"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?= base_url('assets/vendor/moment/moment-with-locales.js') ?>"></script>

<!-- Select2 -->
<script src="<?= base_url('assets/vendor/') ?>select2/js/select2.full.min.js"></script>
<?php if (strpos($_view, 'orang_terlantar/add') !== FALSE || strpos($_view, 'orang_terlantar/edit') !== FALSE || strpos($_view, 'orang_terlantar/list') !== FALSE  || strpos($_view, 'auth/register') !== FALSE) {
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