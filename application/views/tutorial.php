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

  .boxshw {
    box-shadow:
      0 2.8px 2.2px rgba(0, 0, 0, 0.034),
      0 6.7px 5.3px rgba(0, 0, 0, 0.048),
      0 12.5px 10px rgba(0, 0, 0, 0.06),
      0 22.3px 17.9px rgba(0, 0, 0, 0.072),
      0 41.8px 33.4px rgba(0, 0, 0, 0.086),
      0 100px 80px rgba(0, 0, 0, 0.12);
  }

  .nav-link.active {
    color: red !important;
  }

  .nav-tabs .nav-item.show .nav-link,
  .nav-tabs .nav-link.active {
    color: #495057;
    background-color: #fff;
    border-color: #dee2e6 #dee2e6 #fff;
  }

  .nav-tabs .nav-link {
    border: 1px solid transparent;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    min-width: 192px;
    height: 48px;
    background-color: #F6F6F6;
  }

  .nav-tabs .nav-link:focus,
  .nav-tabs .nav-link:hover {
    border-color: #e9ecef #e9ecef #dee2e6;
  }
</style>


<div class="container auth-section" data-aos="fade-up">
  <div class="section-title">
    <h2>Tutorial Penggunaan Aplikasi</h2>
    <p><?= APP_NAME ?></p>
  </div>
  <div class="row">
    <section class="section pt-0 position-relative desktop" data-aos="fade-up" data-aos-delay="100">
      <div class="container-fluid pl-lg-5 pr-lg-5 pl-md-3 pr-md-3 pl-sm-2 pr-sm-2">
        <div class="rounded-15 boxshw" style="background-color: #2f89fc; border-radius: 10px;">
          <div class="row justify-content-center">
            <div class="col-lg-7 col-md-12 mb-12 text-center p-5">
              <!-- <h3 class="font-hotline font-weight-bold p-3 text-white">TUTORIAL</h3> -->
            </div>
          </div>
          <div class="row justify-content-center mr-lg-5 mr-sm-5 ml-lg-5 ml-sm-5">
            <div class="col-lg-12 col-md-12 col-sm-12 mb-5 mr-3 ml-3">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link text-center text-detail active" id="pills-penanganan-tab" data-toggle="pill" href="#pills-penanganan" role="tab" aria-controls="pills-penanganan" aria-selected="true">Video</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-center text-detail" id="pills-pencegahan-tab" data-toggle="pill" href="#pills-pencegahan" role="tab" aria-controls="pills-profile" aria-selected="false">Manual Book</a>
                </li>
              </ul>
              <div class="tab-content bg-white shadow" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-penanganan" role="tabpanel" aria-labelledby="pills-penanganan-tab">
                  <h3 class="text-center text-title pt-5 mb-4">Video Tutorial Pendaftaraan dan Penggunaan Aplikasi Orang Terlantar</h3>
                  <center><video width="800" controls style="padding: 20px;">
                      <source src="<?= base_url('assets/file/manual_video_orang_terlantar.m4v') ?>" type="video/mp4">
                    </video></center>

                </div>
                <div class="tab-pane fade text-center" id="pills-pencegahan" role="tabpanel" aria-labelledby="pills-pencegahan-tab">
                  <h3 class="text-center text-title pt-5 mb-4">Manual Book Tutorial Pendaftaraan dan Penggunaan Aplikasi Orang Terlantar</h3>
                  <iframe src="<?= base_url('assets/file/manual_book_orang_terlantar.pdf') ?>" width="595" height="485" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="border:1px solid #CCC; border-width:1px; margin-bottom:5px; max-width: 100%; padding: 30px;" allowfullscreen> </iframe>

                  <h5>Apabila tidak muncul harap non aktifkan <a style="color: red;">Internet Download Manager</a> anda !</a></h5>
                  <h5>Untuk download pdf klik <a href="<?= base_url('assets/file/manual_book_orang_terlantar.pdf') ?>" download>disini</a></h5>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-services ftco-no-pb android" data-aos="fade-up" data-aos-delay="100" style="margin-top: 0 !important; padding-top: 30px; padding-bottom: 50px;">
      <div class="container">
        <div class="row no-gutters">

          <div class="col-md-3 d-flex services align-self-stretch p-4 ftco-animate">
            <div class="media block-6 d-block text-center" style="margin-left: auto; margin-right: auto;">
              <div class="icon d-flex justify-content-center align-items-center">
                <span class="fa fa-video-camera"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">VIDEO</h3>
                <p><a href="<?= base_url('assets/file/manual_video_orang_terlantar.m4v') ?>" target="_blank" style="color: #e63946;"><b>- LIHAT -</b></a></p>
                <p><a href="<?= base_url('assets/file/manual_video_orang_terlantar.m4v') ?>" target="_blank" download style="color: #e63946;"><b>- DOWNLOAD -</b></a></p>
              </div>
            </div>
          </div>

          <div class="col-md-3 d-flex services align-self-stretch p-4 ftco-animate">
            <div class="media block-6 d-block text-center" style="margin-left: auto; margin-right: auto;">
              <div class="icon d-flex justify-content-center align-items-center">
                <span class="fa fa-book"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">MANUAL BOOK</h3>
                <p><a href="<?= base_url('assets/file/manual_book_orang_terlantar.pdf') ?>" target="_blank" style="color: #e63946;"><b>- LIHAT -</b></a></p>
                <p><a href="<?= base_url('assets/file/manual_book_orang_terlantar.pdf') ?>" target="_blank" download style="color: #e63946;"><b>- DOWNLOAD -</b></a></p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
  </div>
</div>