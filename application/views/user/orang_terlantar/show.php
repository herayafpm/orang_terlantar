<!-- Default box -->
<div class="container py-2 pb-5">

  <h3><?= $_title ?></h3>
  <div class="card">
    <div class="card-body">
      <div class="row w-25 mx-auto">
        <div class="col">
          <img class="img-fluid" src="<?= base_url('uploads') . "/" . $_terlantar['foto'] ?>" alt="foto terlantar">
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          Jenis Orang Terlantar
        </div>
        <div class="col">
          : <?= $_terlantar['orang_terlantar_nama'] ?>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          Nama Lengkap
        </div>
        <div class="col">
          : <?= $_terlantar['terlantar_nama'] ?>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          Alamat
        </div>
        <div class="col">
          : <?= $_terlantar['terlantar_alamat'] ?>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          NIK
        </div>
        <div class="col">
          : <?= $_terlantar['terlantar_nik'] ?>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          NO KK
        </div>
        <div class="col">
          : <?= $_terlantar['terlantar_no_kk'] ?>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          NO DTKS / BDT
        </div>
        <div class="col">
          : <?= $_terlantar['terlantar_no_dtks'] ?>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          Tempat Tanggal Lahir
        </div>
        <div class="col">
          : <?= $_terlantar['terlantar_tempat_lahir'] ?>, <?= $_terlantar['terlantar_tanggal_lahir'] ?>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          Jenis Kelamin
        </div>
        <div class="col">
          : <?= $_terlantar['terlantar_jenis_kelamin'] ?>
        </div>
      </div>
      <?php if ($_terlantar['agama_id'] != null) : ?>
        <div class="row">
          <div class="col-4">
            Agama
          </div>
          <div class="col">
            : <?= $_terlantar['agama_nama'] ?>
          </div>
        </div>
      <?php endif ?>
      <div class="row">
        <div class="col-4">
          RT / RW
        </div>
        <div class="col">
          : <?= $_terlantar['terlantar_rt'] ?> / <?= $_terlantar['terlantar_rw'] ?>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          Kecamatan
        </div>
        <div class="col">
          : <?= $_terlantar['terlantar_kecamatan'] ?>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          Kabupaten
        </div>
        <div class="col">
          : <?= $_terlantar['terlantar_kabupaten'] ?>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          No Telepon (WA)
        </div>
        <div class="col">
          : <?= $_terlantar['terlantar_telp'] ?>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          Tempat Tinggal
        </div>
        <div class="col">
          : <?= $_terlantar['tempat_tinggal_nama'] ?>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          Kondisi Tempat Tinggal
        </div>
        <div class="col">
          : <?= $_terlantar['kondisi_tempat_tinggal_nama'] ?>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          Kategori Orang Terlantar
        </div>
        <div class="col">
          : <?= $_terlantar['kategori_ot_nama'] ?>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          Fasilitas Kesehatan
        </div>
        <div class="col">
          : <?= $_terlantar['fasilitas_kesehatan_nama'] ?>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          Kondisi Orang Terlantar
        </div>
        <div class="col">
          : <?= $_terlantar['kondisi_ot_nama'] ?>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          Kebutuhan yang diperlukan
        </div>
        <div class="col">
          : <?= $_terlantar['kebutuhan_diperlukan_nama'] ?? "Mengisi Sendiri" ?>
        </div>
      </div>
      <?php if ($_terlantar['kebutuhan_diperlukan_id'] == NULL) : ?>
        <div class="row">
          <div class="col-4">
            Kebutuhan yang diperlukan Lainnya
          </div>
          <div class="col">
            : <?= $_terlantar['kebutuhan_diperlukan_lainnya'] ?>
          </div>
        </div>
      <?php endif; ?>

      <div class="row">
        <div class="col-4">
          Alasan Terlantar
        </div>
        <div class="col">
          : <?= $_terlantar['alasan_terlantar'] ?>
        </div>
      </div>
      <?php if ($_terlantar['orang_terlantar_id'] == 2) : ?>
        <div class="row">
          <div class="col-4">
            Tujuan Alamat
          </div>
          <div class="col">
            : <?= $_terlantar['tujuan_alamat'] ?>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            Tujuan RT
          </div>
          <div class="col">
            : <?= $_terlantar['tujuan_rt'] ?>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            Tujuan RW
          </div>
          <div class="col">
            : <?= $_terlantar['tujuan_rw'] ?>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            Tujuan Desa
          </div>
          <div class="col">
            : <?= $_terlantar['tujuan_desa'] ?>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            Tujuan Kecamatan
          </div>
          <div class="col">
            : <?= $_terlantar['tujuan_kecamatan'] ?>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            Tujuan Kabupaten
          </div>
          <div class="col">
            : <?= $_terlantar['tujuan_kabupaten'] ?>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            Tujuan Provinsi
          </div>
          <div class="col">
            : <?= $_terlantar['tujuan_provinsi'] ?>
          </div>
        </div>
      <?php endif ?>
      <?php if (isset($_terlantar['sumber_dana_id'])) : ?>
        <div class="row">
          <div class="col-4">
            Sumber Dana yang diterima
          </div>
          <div class="col">
            : <?php
              if ($_terlantar['sumber_dana_id'] == null) {
                echo $_terlantar['sumber_dana_lainnya'] ?? "Tidak ada";
              } else {
                echo $_terlantar['sumber_dana_nama'] ?? "Tidak ada";
              }
              ?>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            Bantuan Sosial Yang Diterima
          </div>
          <div class="col">
            :
            <?php
            if ($_terlantar['bansos_id'] == null) {
              echo $_terlantar['bansos_lainnya'] ?? "Belum ada";
            } else {
              echo $_terlantar['bansos_nama'] . " <span class='torupiah'>" . $_terlantar['bansos_total'] . "</span>" ?? "Belum ada";
            }
            ?>
          </div>
        </div>
      <?php endif ?>
      <div class="row">
        <div class="col-4">
          Diajukan pada
        </div>
        <div class="col">
          : <?= $_terlantar['created_at'] ?>
        </div>
      </div>
      <?php if (isset($_terlantar['terlantar_verif_id'])) : ?>
        <div class="row">
          <div class="col-4">
            Diverifikasi pada
          </div>
          <div class="col">
            : <?= $_terlantar['verif_at'] ?>
          </div>
        </div>
      <?php endif ?>
      <?php if (isset($_terlantar['terlantar_tolak_id'])) : ?>
        <div class="row">
          <div class="col-4">
            Ditolak Pada
          </div>
          <div class="col">
            : <?= $_terlantar['tolak_at'] ?>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            Ditolak Oleh
          </div>
          <div class="col">
            : <?= $_terlantar['tolak_admin_nama'] ?>
          </div>
        </div>
      <?php endif ?>
      <div class="row">
        <div class="col-4">
          Status Verifikasi
        </div>
        <div class="col">
          : <?= ($_terlantar['verif'] == 1) ? "Sudah" : "Belum" ?> Diverifikasi <?= (isset($_terlantar['verif_by'])) ? "Oleh " . $_terlantar['verif_admin_nama'] : "" ?>
        </div>
      </div>
      <?php if ($_terlantar['verif'] == 1) : ?>
        <div class="row">
          <div class="col-4">
            Status Ditolak / Diterima
          </div>
          <div class="col">
            :
            <?php
            if ($_terlantar['tolak'] == 1) {
              echo "Ditolak Oleh " . $_terlantar['tolak_admin_nama'];
            } else if ($_terlantar['terima'] == 1) {
              echo "Diterima Oleh " . $_terlantar['terima_admin_nama'];
            } else {
              echo "Menunggu";
            }
            ?>
          </div>
        </div>
      <?php endif ?>
      <div class="row">
        <div class="col-4">
          Keterangan
        </div>
        <div class="col">
          : <?= $_terlantar['keterangan'] ?>
        </div>
      </div>
    </div>
  </div>
  <!-- /.card -->

</div>