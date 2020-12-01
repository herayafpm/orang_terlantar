<div class="container auth-section" data-aos="fade-up">
  <div class="section-title">
    <h2>Cari Data Orang Terlantar</h2>
    <p><?= APP_NAME ?></p>
  </div>
  <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
    <div class="col-lg-12">
      <div class="alert alert-div" role="alert"></div>
      <form action="" method="post" role="form">
        <h3 style="text-align: center;padding-bottom: 10px; font-size: 19px">Silakan Masukkan NIK</h3>
        <div class="row justify-content-center form-group">
          <div class="col-lg-6">
            <input type="text" data-inputmask-alias="9" data-inputmask-repeat="16" class="form-control" placeholder="Masukkan NIK" name="search" value="<?= $this->input->post('search') ? $this->input->post('search') : "" ?>">
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-12" style="text-align: center; padding-bottom: 20px; padding-top: 10px">
            <input type="submit" value="Cari" name="kirim" class="btn btn-primary py-3 px-5">
          </div>
        </div>
      </form>
      <?php if (sizeof($_terlantars) > 0) : ?>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Orang Terlantar</th>
                <th>Status</th>
                <th>Bantuan Sosial Yang Diterima</th>
              </tr>
            </thead>
            <tbody>
              <?php if (sizeof($_terlantars) == 0) : ?>
                <tr>
                  <td colspan="5">Silahkan Masukkan NIK atau Nama di kolom pencarian diatas</td>
                </tr>
              <?php else : ?>
                <?php
                $no = 1;
                foreach ($_terlantars as $terlantar) : ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $terlantar['terlantar_nama'] ?></td>
                    <td>
                      <?php
                      if (isset($terlantar['verif_id']) && $terlantar['verif_id'] != null) {
                        echo "Sudah Diverifikasi";
                      } else if (isset($terlantar['tolak_id']) && $terlantar['tolak_id'] != null) {
                        echo "Ditolak";
                      } else {
                        echo "Sedang Diproses";
                      }
                      ?>
                    </td>
                    <td>
                      <?php
                      $html = "Belum Ada";
                      if (isset($terlantar['terima_id']) && $terlantar['terima_id'] != null) {
                        if ($terlantar['sumber_dana_id'] != null) {
                          $html = $terlantar['sumber_dana_nama'] . " " . $terlantar['bansos_nama'] . " " . $terlantar['bansos_total'];
                        } else {
                          $html = $terlantar['sumber_dana_lainnya'] . " " . $terlantar['bansos_lainnya'];
                        }
                      }
                      if ($terlantar['tolak_id'] != null) {
                        $html = "Tidak Ada";
                      }
                      echo $html;
                      ?>
                    </td>
                  </tr>
                <?php
                  $no++;
                endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      <?php endif ?>
    </div>

  </div>

</div>