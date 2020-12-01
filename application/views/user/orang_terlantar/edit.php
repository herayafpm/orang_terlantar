<div class="container auth-section" data-aos="fade-up">
  <div class="section-title">
    <h2>Edit Data Orang Terlantar</h2>
    <p><?= APP_NAME ?></p>
  </div>
  <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
    <div class="col-lg-12">
      <div class="alert alert-div" role="alert"></div>
      <?= form_open_multipart(str_replace("_", "", $_view) . "/" . $_terlantar['terlantar_id']); ?>
      <div class="col-md-12" style="margin-bottom: 50px;">
        <div class="form-group">
          <select name="orang_terlantar" id="orang_terlantar" class="form-control select2 <?= (form_error('orang_terlantar') != null) ? 'is-invalid' : '' ?>">
            <option value="0" <?= ($this->input->post('orang_terlantar') == "0") ? "selected" : "" ?>>-- Tipe Orang Terlantar --</option>
            <?php foreach ($_orang_terlantars as $_orang_terlantar) : ?>
              <option value="<?= $_orang_terlantar['id'] ?>" <?= ($this->input->post('orang_terlantar') == $_orang_terlantar['id']) ? "selected" : ($_terlantar['orang_terlantar_id'] == $_orang_terlantar['id']) ? "selected" : ""  ?>><?= $_orang_terlantar['nama'] ?></option>
            <?php endforeach; ?>
          </select>
          <div class="invalid-feedback">
            <?= form_error('orang_terlantar'); ?>
          </div>
        </div>
        <div class="form-group">
          <select name="have_identitas" id="have_identitas" class="form-control select2 <?= (form_error('have_identitas') != null) ? 'is-invalid' : '' ?>">
            <option <?= ($this->input->post('have_identitas') == null) ? "selected" : "" ?>>-- Identitas Kependudukan --</option>
            <?php foreach ($_have_identitass as $_have_identitas) : ?>
              <option value="<?= $_have_identitas['id'] ?>" <?= ($this->input->post('have_identitas') == $_have_identitas['id']) ? "selected" : ($_terlantar['identitas_kependudukan'] == $_have_identitas['id']) ? "selected" : ""  ?>><?= $_have_identitas['nama'] ?></option>
            <?php endforeach; ?>
          </select>
          <div class="invalid-feedback">
            <?= form_error('have_identitas'); ?>
          </div>
        </div>
        <div class="form-group">
          <label for="foto">Foto Orang Terlantar</label>
          <p class="text-info mt-n2">* File harus jpg,png,jpeg</p>
          <p class="text-info mt-n3">* File harus kurang dari 2MB</p>
          <input type="file" class="form-control-file" id="foto" name="foto">
        </div>
        <div class="form-group">
          <input type="text" class="form-control <?= (form_error('nama') != null) ? 'is-invalid' : '' ?>" id="nama" name="nama" placeholder="Masukkan Nama Orang Terlantar" value="<?= ($this->input->post('nama') ? $this->input->post('nama') : $_terlantar['terlantar_nama']); ?>">
          <div class="invalid-feedback">
            <?= form_error('nama'); ?>
          </div>
        </div>
        <div class="form-group">
          <input type="text" data-inputmask-alias="9" data-inputmask-repeat="16" class="form-control <?= (form_error('nik') != null) ? 'is-invalid' : '' ?>" id="nik" name="nik" placeholder="Masukkan NIK Orang Terlantar" value="<?= ($this->input->post('nik') ? $this->input->post('nik') : $_terlantar['terlantar_nik']) ?>">
          <div class="invalid-feedback">
            <?= form_error('nik'); ?>
          </div>
        </div>
        <div class="form-group">
          <input type="text" data-inputmask-alias="9" data-inputmask-repeat="16" class="form-control <?= (form_error('no_kk') != null) ? 'is-invalid' : '' ?>" id="no_kk" name="no_kk" placeholder="Masukkan NO KK Orang Terlantar" value="<?= ($this->input->post('no_kk') ? $this->input->post('no_kk') : $_terlantar['terlantar_no_kk']); ?>">
          <div class="invalid-feedback">
            <?= form_error('no_kk'); ?>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-6">
            <input type="text" class="form-control <?= (form_error('tempat_lahir') != null) ? 'is-invalid' : '' ?>" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir Orang Terlantar" value="<?= ($this->input->post('tempat_lahir') ? $this->input->post('tempat_lahir') : $_terlantar['terlantar_tempat_lahir']); ?>">
            <div class="invalid-feedback">
              <?= form_error('tempat_lahir'); ?>
            </div>
          </div>
          <div class="col-md-6">
            <input type="date" class="form-control <?= (form_error('tanggal_lahir') != null) ? 'is-invalid' : '' ?>" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir Orang Terlantar" value="<?= ($this->input->post('tanggal_lahir') ? $this->input->post('tanggal_lahir') : $_terlantar['terlantar_tanggal_lahir']); ?>">
            <div class="invalid-feedback">
              <?= form_error('tanggal_lahir'); ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <select name="jenis_kelamin" id="jenis_kelamin" class="form-control select2 <?= (form_error('jenis_kelamin') != null) ? 'is-invalid' : '' ?>">
            <option value="0" <?= ($this->input->post('jenis_kelamin') == "0") ? "selected" : "" ?>>-- Jenis Kelamin --</option>
            <?php foreach ($_jenis_kelamins as $_jenis_kelamin) : ?>
              <option value="<?= $_jenis_kelamin['nama'] ?>" <?= ($this->input->post('jenis_kelamin') == $_jenis_kelamin['nama']) ? "selected" : ($_terlantar['terlantar_jenis_kelamin'] == $_jenis_kelamin['nama']) ? "selected" : "" ?>><?= $_jenis_kelamin['nama'] ?></option>
            <?php endforeach; ?>
          </select>
          <div class="invalid-feedback">
            <?= form_error('jenis_kelamin'); ?>
          </div>
        </div>
        <div class="form-group">
          <select name="agama" id="agama" class="form-control select2 <?= (form_error('agama') != null) ? 'is-invalid' : '' ?>">
            <option value="0" <?= ($this->input->post('agama') == "0") ? "selected" : "" ?>>-- Agama --</option>
            <?php foreach ($_agamas as $_agama) : ?>
              <option value="<?= $_agama['id'] ?>" <?= ($this->input->post('agama') == $_agama['id']) ? "selected" : ($_terlantar['agama_id'] == $_agama['id']) ? "selected" : "" ?>><?= $_agama['nama'] ?></option>
            <?php endforeach; ?>
          </select>
          <div class="invalid-feedback">
            <?= form_error('agama'); ?>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-8">
            <input type="text" class="form-control <?= (form_error('alamat') != null) ? 'is-invalid' : '' ?>" id="alamat" name="alamat" placeholder="Alamat (Jalan/Perumahan) Orang Terlantar" value="<?= ($this->input->post('alamat') ? $this->input->post('alamat') : $_terlantar['terlantar_alamat']); ?>">
            <div class="invalid-feedback">
              <?= form_error('alamat'); ?>
            </div>
          </div>
          <div class="col-md-2">
            <input type="number" class="form-control <?= (form_error('rt') != null) ? 'is-invalid' : '' ?>" id="rt" name="rt" placeholder="RT" value="<?= ($this->input->post('rt') ? $this->input->post('rt') : $_terlantar['terlantar_rt']); ?>">
            <div class="invalid-feedback">
              <?= form_error('rt'); ?>
            </div>
          </div>
          <div class="col-md-2">
            <input type="number" class="form-control <?= (form_error('rw') != null) ? 'is-invalid' : '' ?>" id="rw" name="rw" placeholder="RW" value="<?= ($this->input->post('rw') ? $this->input->post('rw') : $_terlantar['terlantar_rw']); ?>">
            <div class="invalid-feedback">
              <?= form_error('rw'); ?>
            </div>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-4">
            <input type="text" class="form-control <?= (form_error('desa') != null) ? 'is-invalid' : '' ?>" id="desa" name="desa" placeholder="Desa" value="<?= ($this->input->post('desa') ? $this->input->post('desa') : $_terlantar['terlantar_desa']); ?>">
            <div class="invalid-feedback">
              <?= form_error('desa'); ?>
            </div>
          </div>
          <div class="col-md-4">
            <input type="text" class="form-control <?= (form_error('kecamatan') != null) ? 'is-invalid' : '' ?>" id="kecamatan" name="kecamatan" placeholder="Kecamatan" value="<?= ($this->input->post('kecamatan') ? $this->input->post('kecamatan') : $_terlantar['terlantar_kecamatan']); ?>">
            <div class="invalid-feedback">
              <?= form_error('kecamatan'); ?>
            </div>
          </div>
          <div class="col-md-4">
            <input type="text" class="form-control <?= (form_error('kabupaten') != null) ? 'is-invalid' : '' ?>" id="kabupaten" name="kabupaten" placeholder="Kabupaten" value="<?= ($this->input->post('kabupaten') ? $this->input->post('kabupaten') : $_terlantar['terlantar_kabupaten']); ?>">
            <div class="invalid-feedback">
              <?= form_error('kabupaten'); ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <input type="text" class="form-control <?= (form_error('no_telp') != null) ? 'is-invalid' : '' ?>" id="no_telp" name="no_telp" placeholder="No Telepon (WA)" value="<?= ($this->input->post('no_telp') ? $this->input->post('no_telp') : $_terlantar['terlantar_telp']); ?>">
          <div class="invalid-feedback">
            <?= form_error('no_telp'); ?>
          </div>
        </div>
        <div class="form-group">
          <input type="number" class="form-control <?= (form_error('no_dtks') != null) ? 'is-invalid' : '' ?>" id="no_dtks" name="no_dtks" placeholder="Masukkan NO DTKS / BDT Orang Terlantar" value="<?= ($this->input->post('no_dtks')) ? $this->input->post('no_dtks') : $_terlantar['terlantar_no_dtks']; ?>">
          <div class="invalid-feedback">
            <?= form_error('no_dtks'); ?>
          </div>
          <p>
            <i>Jika tidak mempunyai No. DTKS silahkan lewati</i>
          </p>
        </div>
        <div class="form-group">
          <select name="tempat_tinggal" id="tempat_tinggal" class="form-control select2 <?= (form_error('tempat_tinggal') != null) ? 'is-invalid' : '' ?>">
            <option value="0" <?= ($this->input->post('tempat_tinggal') == "0") ? "selected" : "" ?>>-- Tempat Tinggal --</option>
            <?php foreach ($_tempat_tinggals as $_tempat_tinggal) : ?>
              <option value="<?= $_tempat_tinggal['id'] ?>" <?= ($this->input->post('tempat_tinggal') == $_tempat_tinggal['id']) ? "selected" : ($_terlantar['tempat_tinggal_id'] == $_tempat_tinggal['id']) ? "selected" : "" ?>><?= $_tempat_tinggal['nama'] ?></option>
            <?php endforeach; ?>
          </select>
          <div class="invalid-feedback">
            <?= form_error('tempat_tinggal'); ?>
          </div>
        </div>
        <div class="form-group">
          <select name="kondisi_tempat_tinggal" id="kondisi_tempat_tinggal" class="form-control select2 <?= (form_error('kondisi_tempat_tinggal') != null) ? 'is-invalid' : '' ?>">
            <option value="0" <?= ($this->input->post('kondisi_tempat_tinggal') == "0") ? "selected" : "" ?>>-- Kondisi Tempat Tinggal --</option>
            <?php foreach ($_kondisi_tempat_tinggals as $_kondisi_tempat_tinggal) : ?>
              <option value="<?= $_kondisi_tempat_tinggal['id'] ?>" <?= ($this->input->post('kondisi_tempat_tinggal') == $_kondisi_tempat_tinggal['id']) ? "selected" : ($_terlantar['kondisi_tempat_tinggal_id'] == $_kondisi_tempat_tinggal['id']) ? "selected" : "" ?>><?= $_kondisi_tempat_tinggal['nama'] ?></option>
            <?php endforeach; ?>
          </select>
          <div class="invalid-feedback">
            <?= form_error('kondisi_tempat_tinggal'); ?>
          </div>
        </div>
        <div class="form-group">
          * Info Kategori Orang Terlantar <br>
          * BALITA (Usia diantara 0 - kurang dari 5 tahun) <br>
          * Anak - Anak (Usia diantara 5 - kurang dari 18 tahun) <br>
          * LANSIA (Usia diatas 60 tahun)
        </div>
        <div class="form-group">
          <select name="kategori_ot" id="kategori_ot" class="form-control select2 <?= (form_error('kategori_ot') != null) ? 'is-invalid' : '' ?>">
            <option value="0" <?= ($this->input->post('kategori_ot') == "0") ? "selected" : "" ?>>-- Kategori Orang Terlantar --</option>
            <?php foreach ($_kategori_ots as $_kategori_ot) : ?>
              <option value="<?= $_kategori_ot['id'] ?>" <?= ($this->input->post('kategori_ot') == $_kategori_ot['id']) ? "selected" : ($_terlantar['kategori_ot_id'] == $_kategori_ot['id']) ? "selected" : "" ?>><?= $_kategori_ot['nama'] ?></option>
            <?php endforeach; ?>
          </select>
          <div class="invalid-feedback">
            <?= form_error('kategori_ot'); ?>
          </div>
        </div>
        <div class="form-group">
          <select name="fasilitas_kesehatan" id="fasilitas_kesehatan" class="form-control select2 <?= (form_error('fasilitas_kesehatan') != null) ? 'is-invalid' : '' ?>">
            <option value="0" <?= ($this->input->post('fasilitas_kesehatan') == "0") ? "selected" : "" ?>>-- Fasilitas Kesehatan --</option>
            <?php foreach ($_fasilitas_kesehatans as $_fasilitas_kesehatan) : ?>
              <option value="<?= $_fasilitas_kesehatan['id'] ?>" <?= ($this->input->post('fasilitas_kesehatan') == $_fasilitas_kesehatan['id']) ? "selected" : ($_terlantar['fasilitas_kesehatan_id'] == $_fasilitas_kesehatan['id']) ? "selected" : "" ?>><?= $_fasilitas_kesehatan['nama'] ?></option>
            <?php endforeach; ?>
          </select>
          <div class="invalid-feedback">
            <?= form_error('fasilitas_kesehatan'); ?>
          </div>
        </div>
        <div class="form-group">
          <select name="kondisi_ot" id="kondisi_ot" class="form-control select2 <?= (form_error('kondisi_ot') != null) ? 'is-invalid' : '' ?>">
            <option value="0" <?= ($this->input->post('kondisi_ot') == "0") ? "selected" : "" ?>>-- Kondisi Orang Terlantar --</option>
            <?php foreach ($_kondisi_ots as $_kondisi_ot) : ?>
              <option value="<?= $_kondisi_ot['id'] ?>" <?= ($this->input->post('kondisi_ot') == $_kondisi_ot['id']) ? "selected" : ($_terlantar['kondisi_ot_id'] == $_kondisi_ot['id']) ? "selected" : ""  ?>><?= $_kondisi_ot['nama'] ?></option>
            <?php endforeach; ?>
          </select>
          <div class="invalid-feedback">
            <?= form_error('kondisi_ot'); ?>
          </div>
        </div>
        <div class="form-group">
          <select name="kebutuhan_diperlukan" id="kebutuhan_diperlukan" class="form-control select2 <?= (form_error('kebutuhan_diperlukan') != null) ? 'is-invalid' : '' ?>">
            <option value="" <?= ($this->input->post('kebutuhan_diperlukan') == "") ? "selected" : "" ?>>-- Kebutuhan Yang Diperlukan --</option>
            <?php foreach ($_kebutuhan_diperlukans as $_kebutuhan_diperlukan) : ?>
              <option value="<?= $_kebutuhan_diperlukan['id'] ?>" <?= ($this->input->post('kebutuhan_diperlukan') == $_kebutuhan_diperlukan['id']) ? "selected" : ($_terlantar['kebutuhan_diperlukan_id'] == $_kebutuhan_diperlukan['id']) ? "selected" : ""  ?>><?= $_kebutuhan_diperlukan['nama'] ?></option>
            <?php endforeach; ?>
          </select>
          <div class="invalid-feedback">
            <?= form_error('kebutuhan_diperlukan'); ?>
          </div>
        </div>
        <div class="form-group kebutuhan_diperlukan d-none">
          <input type="text" class="form-control <?= (form_error('kebutuhan_diperlukan_lainnya') != null) ? 'is-invalid' : '' ?>" id="kebutuhan_diperlukan_lainnya" name="kebutuhan_diperlukan_lainnya" placeholder="Masukkan Kebutuhan Diperlukan Lainnya" value="<?= ($this->input->post('kebutuhan_diperlukan_lainnya') ? $this->input->post('kebutuhan_diperlukan_lainnya') : $_terlantar['kebutuhan_diperlukan_lainnya']); ?>">
          <div class="invalid-feedback">
            <?= form_error('kebutuhan_diperlukan_lainnya'); ?>
          </div>
        </div>
        <div class="form-group">
          <textarea class="form-control <?= (form_error('alasan_terlantar') != null) ? 'is-invalid' : '' ?>" id="alasan_terlantar" name="alasan_terlantar" rows="4" placeholder="Permasalahan yang dihadapi"><?= ($this->input->post('alasan_terlantar') ? $this->input->post('alasan_terlantar') :  $_terlantar['alasan_terlantar']); ?></textarea>
          <div class="invalid-feedback">
            <?= form_error('alasan_terlantar'); ?>
          </div>
        </div>
        <h4>
          <center>Tujuan Pemulangan OT Luar Daerah</center>
        </h4>
        <div class="row form-group outsider">
          <div class="col-md-8">
            <input type="text" class="form-control <?= (form_error('tujuan_alamat') != null) ? 'is-invalid' : '' ?>" id="tujuan_alamat" name="tujuan_alamat" placeholder="Alamat (Jalan/Perumahan) Tujuan Luar Daerah" value="<?= ($this->input->post('tujuan_alamat') ? $this->input->post('tujuan_alamat') : $_terlantar['tujuan_alamat']); ?>">
            <div class="invalid-feedback">
              <?= form_error('tujuan_alamat'); ?>
            </div>
          </div>
          <div class="col-md-2">
            <input type="number" class="form-control <?= (form_error('tujuan_rt') != null) ? 'is-invalid' : '' ?>" id="tujuan_rt" name="tujuan_rt" placeholder="RT Tujuan Luar Daerah" value="<?= ($this->input->post('tujuan_rt') ? $this->input->post('tujuan_rt') : $_terlantar['tujuan_rt']); ?>">
            <div class="invalid-feedback">
              <?= form_error('tujuan_rt'); ?>
            </div>
          </div>
          <div class="col-md-2">
            <input type="number" class="form-control <?= (form_error('tujuan_rw') != null) ? 'is-invalid' : '' ?>" id="tujuan_rw" name="tujuan_rw" placeholder="RW Tujuan Luar Daerah" value="<?= ($this->input->post('tujuan_rw') ? $this->input->post('tujuan_rw') : $_terlantar['tujuan_rw']); ?>">
            <div class="invalid-feedback">
              <?= form_error('tujuan_rw'); ?>
            </div>
          </div>
        </div>
        <div class="row form-group outsider">
          <div class="col-md-4">
            <input type="text" class="form-control <?= (form_error('tujuan_desa') != null) ? 'is-invalid' : '' ?>" id="tujuan_desa" name="tujuan_desa" placeholder="Desa Tujuan Luar Daerah" value="<?= ($this->input->post('tujuan_desa') ? $this->input->post('tujuan_desa') : $_terlantar['tujuan_desa']); ?>">
            <div class="invalid-feedback">
              <?= form_error('tujuan_desa'); ?>
            </div>
          </div>
          <div class="col-md-4">
            <input type="text" class="form-control <?= (form_error('tujuan_kecamatan') != null) ? 'is-invalid' : '' ?>" id="tujuan_kecamatan" name="tujuan_kecamatan" placeholder="Kecamatan Tujuan Luar Daerah" value="<?= ($this->input->post('tujuan_kecamatan') ? $this->input->post('tujuan_kecamatan') : $_terlantar['tujuan_kecamatan']); ?>">
            <div class="invalid-feedback">
              <?= form_error('tujuan_kecamatan'); ?>
            </div>
          </div>
          <div class="col-md-4">
            <input type="text" class="form-control <?= (form_error('tujuan_kabupaten') != null) ? 'is-invalid' : '' ?>" id="tujuan_kabupaten" name="tujuan_kabupaten" placeholder="Kabupaten Tujuan Luar Daerah" value="<?= ($this->input->post('tujuan_kabupaten') ? $this->input->post('tujuan_kabupaten') : $_terlantar['tujuan_kabupaten']); ?>">
            <div class="invalid-feedback">
              <?= form_error('tujuan_kabupaten'); ?>
            </div>
          </div>
          <div class="col-md-4">
            <input type="text" class="form-control <?= (form_error('tujuan_provinsi') != null) ? 'is-invalid' : '' ?>" id="tujuan_provinsi" name="tujuan_provinsi" placeholder="Provinsi Tujuan Luar Daerah" value="<?= ($this->input->post('tujuan_provinsi') ? $this->input->post('tujuan_provinsi') : $_terlantar['tujuan_provinsi']); ?>">
            <div class="invalid-feedback">
              <?= form_error('tujuan_provinsi'); ?>
            </div>
          </div>
        </div>
        <div class="form-group" style="margin-top: 40px;">
          <input type="submit" name="kirim" value="Kirim Data" class="btn btn-primary py-3 px-5">
        </div>
      </div>

      <?= form_close(); ?>
    </div>

  </div>

</div>