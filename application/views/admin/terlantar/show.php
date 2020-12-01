<!-- Default box -->
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
        Diajukan Oleh
      </div>
      <div class="col">
        : <?= $_terlantar['user_nama'] ?> Pada <?= $_terlantar['created_at'] ?>
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
    <form action="<?= base_url('admin/terlantar/show/' . $_terlantar['terlantar_id']) ?>" method="post">
      <?php if ($_terlantar['tolak'] == 0 && $_terlantar['verif'] == 0) : ?>
        <div class="form-group">
          <label for="sumber_dana_id">Sumber Dana</label>
          <select name="sumber_dana_id" id="sumber_dana_id" class="form-control <?= (form_error('sumber_dana_id') != null) ? 'is-invalid' : '' ?>">
            <option value="" selected>-- Pilih Sumber Dana --</option>
            <?php foreach ($_sumber_danas as $_sumber_dana) : ?>
              <option value="<?= $_sumber_dana['sumber_dana_id'] ?>" <?= ($this->input->post('sumber_dana_id') == $_sumber_dana['sumber_dana_id']) ? "selected" : ($_terlantar['sumber_dana_id'] == $_sumber_dana['sumber_dana_id']) ? "selected" : "" ?>><?= $_sumber_dana['sumber_dana_nama'] ?></option>
            <?php endforeach; ?>
            <option value="0" <?= ($this->input->post('sumber_dana_id') == "0") ? "selected" : ($_terlantar['sumber_dana_id'] == "0") ? "selected" : "" ?>>Lain - Lain</option>
          </select>
          <div class="invalid-feedback">
            <?= form_error('sumber_dana_id'); ?>
          </div>
        </div>
        <div class="form-group sumber_dana_lainnya d-none">
          <label for="sumber_dana_lainnya">Sumber Dana Lainnya</label>
          <input type="text" class="form-control <?= (form_error('sumber_dana_lainnya') != null) ? 'is-invalid' : '' ?>" id="sumber_dana_lainnya" name="sumber_dana_lainnya" placeholder="Masukkan Nama Sumber Dana" value="<?= ($this->input->post('sumber_dana_lainnya') ? $this->input->post('sumber_dana_lainnya') : $_terlantar['sumber_dana_lainnya']); ?>">
          <div class="invalid-feedback">
            <?= form_error('sumber_dana_lainnya'); ?>
          </div>
        </div>
        <div class="form-group sumber_dana_lainnya d-none">
          <label for="bansos_lainnya">Bantuan Sosial Lainnya</label>
          <input type="text" class="form-control <?= (form_error('bansos_lainnya') != null) ? 'is-invalid' : '' ?>" id="bansos_lainnya" name="bansos_lainnya" placeholder="Masukkan Nama dan jumlah bantuan sosial" value="<?= ($this->input->post('bansos_lainnya') ? $this->input->post('bansos_lainnya') : $_terlantar['bansos_lainnya']); ?>">
          <div class="invalid-feedback">
            <?= form_error('bansos_lainnya'); ?>
          </div>
        </div>
        <div class="form-group bansos_id d-none">
          <label for="bansos_id">Bantuan Sosial</label>
          <select name="bansos_id" id="bansos_id" class="form-control <?= (form_error('bansos_id') != null) ? 'is-invalid' : '' ?>">

          </select>
          <div class="invalid-feedback">
            <?= form_error('bansos_id'); ?>
          </div>
        </div>
        <div class="form-group">
          <label for="keterangan">Keterangan</label>
          <textarea class="form-control <?= (form_error('keterangan') != null) ? 'is-invalid' : '' ?>" id="keterangan" name="keterangan" rows="3" placeholder="Isi Keterangan"><?= ($this->input->post('keterangan')) ? $this->input->post('keterangan') : $_terlantar['keterangan']; ?></textarea>
          <div class="invalid-feedback">
            <?= form_error('keterangan'); ?>
          </div>
        </div>
      <?php endif ?>
      <div class="row mt-2 justify-content-center">
        <div class="col-4">
          <?php if ($_terlantar['verif'] == 0) : ?>
            <button class="btn btn-primary btn-block" type="submit" name="verifikasi">Verifikasi</button>
          <?php else : ?>
            <button class="btn btn-danger btn-block" type="submit" name="batal_verifikasi">Batalkan Verifikasi</button>
          <?php endif ?>
        </div>
      </div>
      <?php if ($_terlantar['verif'] == 1) : ?>
        <?php if ($_terlantar['terima'] == 0) : ?>
          <div class="row mt-2 justify-content-center">
            <div class="col-4">
              <button class="btn btn-primary btn-block" type="submit" name="terima">Terima</button>
            </div>
          </div>
        <?php endif ?>
        <div class="row mt-2 justify-content-center">
          <div class="col-4">
            <button class="btn btn-danger btn-block" type="submit" name="tolak">Tolak</button>
          </div>
        </div>
      <?php endif ?>
    </form>

  </div>
</div>
<!-- /.card -->