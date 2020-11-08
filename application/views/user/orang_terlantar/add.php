<!-- Default box -->
<h3><?=$_title?></h3>
<div class="card mt-2 bg-light">
  <div class="card-body">
    <?= form_open_multipart(str_replace("_","",$_view)); ?>
      <div class="row">
        <div class="col-lg-4">
          <div class="form-group">
            <label for="orang_terlantar">Tipe Orang Terlantar</label>
            <select name="orang_terlantar" id="orang_terlantar" class="form-control <?=(form_error('orang_terlantar') != null)?'is-invalid':''?>">
              <option value="0" <?=($this->input->post('orang_terlantar') == "0")?"selected":""?>>-- Pilih Tipe Orang Terlantar --</option>
              <?php foreach($_orang_terlantars as $_orang_terlantar):?>
                <option value="<?=$_orang_terlantar['id']?>" <?=($this->input->post('orang_terlantar') == $_orang_terlantar['id'])?"selected":""?>><?=$_orang_terlantar['nama']?></option>
              <?php endforeach;?>
            </select>
            <div class="invalid-feedback">
              <?= form_error('orang_terlantar');?>
            </div>
          </div>
          <div class="form-group form-check">
            <input type="checkbox" name="have_identitas" class="form-check-input <?=(form_error('have_identitas') != null)?'is-invalid':''?>" id="have_identitas" value="1" <?= ($this->input->post('have_identitas') == 1 ? "checked" : ""); ?> >
            <label class="form-check-label" for="have_identitas">Punya Identitas Kependudukan?</label>
            <div class="invalid-feedback">
              <?= form_error('have_identitas');?>
            </div>
          </div>
          <div class="form-group">
            <label for="foto">Foto Orang Terlantar</label>
            <p class="text-info mt-n2">* File harus jpg,png,jpeg</p>
            <p class="text-info mt-n3">* File harus kurang dari 2MB</p>
            <input type="file" class="form-control-file" id="foto" name="foto">
          </div>
          <div class="form-group">
            <label for="nama">Nama Orang Terlantar</label>
            <input type="text" class="form-control <?=(form_error('nama') != null)?'is-invalid':''?>" id="nama" name="nama" placeholder="Masukkan Nama Orang Terlantar" value="<?= ($this->input->post('nama') ? $this->input->post('nama') : ""); ?>">
            <div class="invalid-feedback">
              <?= form_error('nama');?>
            </div>
          </div>
          <div class="form-group have_identitas d-none">
            <label for="nik">NIK Orang Terlantar</label>
            <input type="text" data-inputmask-alias="9" data-inputmask-repeat="16" class="form-control <?=(form_error('nik') != null)?'is-invalid':''?>" id="nik" name="nik" placeholder="Masukkan NIK Orang Terlantar" value="<?= ($this->input->post('nik') ? $this->input->post('nik') : ""); ?>">
            <div class="invalid-feedback">
              <?= form_error('nik');?>
            </div>
          </div>
          <div class="form-group have_identitas d-none">
            <label for="no_kk">NO KK Orang Terlantar</label>
            <input type="text" data-inputmask-alias="9" data-inputmask-repeat="16" class="form-control <?=(form_error('no_kk') != null)?'is-invalid':''?>" id="no_kk" name="no_kk" placeholder="Masukkan NO KK Orang Terlantar" value="<?= ($this->input->post('no_kk') ? $this->input->post('no_kk') : ""); ?>">
            <div class="invalid-feedback">
              <?= form_error('no_kk');?>
            </div>
          </div>
          <div class="form-group have_identitas d-none">
            <label for="tempat_lahir">Tempat Lahir Orang Terlantar</label>
            <input type="text" class="form-control <?=(form_error('tempat_lahir') != null)?'is-invalid':''?>" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir Orang Terlantar" value="<?= ($this->input->post('tempat_lahir') ? $this->input->post('tempat_lahir') : ""); ?>">
            <div class="invalid-feedback">
              <?= form_error('tempat_lahir');?>
            </div>
          </div>
          <div class="form-group have_identitas d-none">
            <label for="tanggal_lahir">Tanggal Lahir Orang Terlantar</label>
            <input type="text" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" class="form-control <?=(form_error('tanggal_lahir') != null)?'is-invalid':''?>" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir Orang Terlantar" value="<?= ($this->input->post('tanggal_lahir') ? $this->input->post('tanggal_lahir') : ""); ?>">
            <div class="invalid-feedback">
              <?= form_error('tanggal_lahir');?>
            </div>
          </div>
          <div class="form-group have_identitas d-none">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control <?=(form_error('jenis_kelamin') != null)?'is-invalid':''?>">
              <option value="0" <?=($this->input->post('jenis_kelamin') == "0")?"selected":""?>>-- Pilih Jenis Kelamin --</option>
              <?php foreach($_jenis_kelamins as $_jenis_kelamin):?>
                <option value="<?=$_jenis_kelamin['id']?>" <?=($this->input->post('jenis_kelamin') == $_jenis_kelamin['id'])?"selected":""?>><?=$_jenis_kelamin['nama']?></option>
              <?php endforeach;?>
            </select>
            <div class="invalid-feedback">
              <?= form_error('jenis_kelamin');?>
            </div>
          </div>
          <div class="form-group have_identitas d-none">
            <label for="agama">Agama</label>
            <select name="agama" id="agama" class="form-control <?=(form_error('agama') != null)?'is-invalid':''?>">
              <option value="0" <?=($this->input->post('agama') == "0")?"selected":""?>>-- Pilih Agama --</option>
              <?php foreach($_agamas as $_agama):?>
                <option value="<?=$_agama['id']?>" <?=($this->input->post('agama') == $_agama['id'])?"selected":""?>><?=$_agama['nama']?></option>
              <?php endforeach;?>
            </select>
            <div class="invalid-feedback">
              <?= form_error('agama');?>
            </div>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat Jalan / Perumahan Orang Terlantar</label>
            <input type="text" class="form-control <?=(form_error('alamat') != null)?'is-invalid':''?>" id="alamat" name="alamat" placeholder="Masukkan Alamat Jalan / Perumahan Orang Terlantar" value="<?= ($this->input->post('alamat') ? $this->input->post('alamat') : ""); ?>">
            <div class="invalid-feedback">
              <?= form_error('alamat');?>
            </div>
          </div>
          <div class="form-group have_identitas d-none">
            <label for="rt">RT</label>
            <input type="text" class="form-control <?=(form_error('rt') != null)?'is-invalid':''?>" id="rt" name="rt" placeholder="Masukkan RT" value="<?= ($this->input->post('rt') ? $this->input->post('rt') : ""); ?>">
            <div class="invalid-feedback">
              <?= form_error('rt');?>
            </div>
          </div>
          <div class="form-group have_identitas d-none">
            <label for="rw">RW</label>
            <input type="text" class="form-control <?=(form_error('rw') != null)?'is-invalid':''?>" id="rw" name="rw" placeholder="Masukkan RW" value="<?= ($this->input->post('rw') ? $this->input->post('rw') : ""); ?>">
            <div class="invalid-feedback">
              <?= form_error('rw');?>
            </div>
          </div>
          <div class="form-group have_identitas d-none">
            <label for="desa">Desa</label>
            <input type="text" class="form-control <?=(form_error('desa') != null)?'is-invalid':''?>" id="desa" name="desa" placeholder="Masukkan Desa" value="<?= ($this->input->post('desa') ? $this->input->post('desa') : ""); ?>">
            <div class="invalid-feedback">
              <?= form_error('desa');?>
            </div>
          </div>
          <div class="form-group have_identitas d-none">
            <label for="kecamatan">Kecamatan</label>
            <input type="text" class="form-control <?=(form_error('kecamatan') != null)?'is-invalid':''?>" id="kecamatan" name="kecamatan" placeholder="Masukkan Kecamatan" value="<?= ($this->input->post('kecamatan') ? $this->input->post('kecamatan') : ""); ?>">
            <div class="invalid-feedback">
              <?= form_error('kecamatan');?>
            </div>
          </div>
          <div class="form-group have_identitas d-none">
            <label for="kabupaten">Kabupaten</label>
            <input type="text" class="form-control <?=(form_error('kabupaten') != null)?'is-invalid':''?>" id="kabupaten" name="kabupaten" placeholder="Masukkan Kabupaten" value="<?= ($this->input->post('kabupaten') ? $this->input->post('kabupaten') : ""); ?>">
            <div class="invalid-feedback">
              <?= form_error('kabupaten');?>
            </div>
          </div>
          <div class="form-group">
            <label for="tempat_tinggal">Tempat Tinggal</label>
            <select name="tempat_tinggal" id="tempat_tinggal" class="form-control <?=(form_error('tempat_tinggal') != null)?'is-invalid':''?>">
              <option value="0" <?=($this->input->post('tempat_tinggal') == "0")?"selected":""?>>-- Pilih Tempat Tinggal --</option>
              <?php foreach($_tempat_tinggals as $_tempat_tinggal):?>
                <option value="<?=$_tempat_tinggal['id']?>" <?=($this->input->post('tempat_tinggal') == $_tempat_tinggal['id'])?"selected":""?>><?=$_tempat_tinggal['nama']?></option>
              <?php endforeach;?>
            </select>
            <div class="invalid-feedback">
              <?= form_error('tempat_tinggal');?>
            </div>
          </div>
          <div class="form-group">
            <label for="kondisi_tempat_tinggal">Kondisi Tempat Tinggal</label>
            <select name="kondisi_tempat_tinggal" id="kondisi_tempat_tinggal" class="form-control <?=(form_error('kondisi_tempat_tinggal') != null)?'is-invalid':''?>">
              <option value="0" <?=($this->input->post('kondisi_tempat_tinggal') == "0")?"selected":""?>>-- Pilih Kondisi Tempat Tinggal --</option>
              <?php foreach($_kondisi_tempat_tinggals as $_kondisi_tempat_tinggal):?>
                <option value="<?=$_kondisi_tempat_tinggal['id']?>" <?=($this->input->post('kondisi_tempat_tinggal') == $_kondisi_tempat_tinggal['id'])?"selected":""?>><?=$_kondisi_tempat_tinggal['nama']?></option>
              <?php endforeach;?>
            </select>
            <div class="invalid-feedback">
              <?= form_error('kondisi_tempat_tinggal');?>
            </div>
          </div>
          <div class="form-group">
            <label for="kategori_ot">Kategori Orang Terlantar</label>
            <select name="kategori_ot" id="kategori_ot" class="form-control <?=(form_error('kategori_ot') != null)?'is-invalid':''?>">
              <option value="0" <?=($this->input->post('kategori_ot') == "0")?"selected":""?>>-- Pilih Kategori Orang Terlantar --</option>
              <?php foreach($_kategori_ots as $_kategori_ot):?>
                <option value="<?=$_kategori_ot['id']?>" <?=($this->input->post('kategori_ot') == $_kategori_ot['id'])?"selected":""?>><?=$_kategori_ot['nama']?></option>
              <?php endforeach;?>
            </select>
            <div class="invalid-feedback">
              <?= form_error('kategori_ot');?>
            </div>
          </div>
          <div class="form-group">
            <label for="fasilitas_kesehatan">Fasilitas Kesehatan</label>
            <select name="fasilitas_kesehatan" id="fasilitas_kesehatan" class="form-control <?=(form_error('fasilitas_kesehatan') != null)?'is-invalid':''?>">
              <option value="0" <?=($this->input->post('fasilitas_kesehatan') == "0")?"selected":""?>>-- Pilih Fasilitas Kesehatan --</option>
              <?php foreach($_fasilitas_kesehatans as $_fasilitas_kesehatan):?>
                <option value="<?=$_fasilitas_kesehatan['id']?>" <?=($this->input->post('fasilitas_kesehatan') == $_fasilitas_kesehatan['id'])?"selected":""?>><?=$_fasilitas_kesehatan['nama']?></option>
              <?php endforeach;?>
            </select>
            <div class="invalid-feedback">
              <?= form_error('fasilitas_kesehatan');?>
            </div>
          </div>
          <div class="form-group">
            <label for="kondisi_ot">Kondisi Orang Terlantar</label>
            <select name="kondisi_ot" id="kondisi_ot" class="form-control <?=(form_error('kondisi_ot') != null)?'is-invalid':''?>">
              <option value="0" <?=($this->input->post('kondisi_ot') == "0")?"selected":""?>>-- Pilih Kondisi Orang Terlantar --</option>
              <?php foreach($_kondisi_ots as $_kondisi_ot):?>
                <option value="<?=$_kondisi_ot['id']?>" <?=($this->input->post('kondisi_ot') == $_kondisi_ot['id'])?"selected":""?>><?=$_kondisi_ot['nama']?></option>
              <?php endforeach;?>
            </select>
            <div class="invalid-feedback">
              <?= form_error('kondisi_ot');?>
            </div>
          </div>
          <div class="form-group">
            <label for="kebutuhan_diperlukan">Kebutuhan Yang Diperlukan</label>
            <select name="kebutuhan_diperlukan" id="kebutuhan_diperlukan" class="form-control <?=(form_error('kebutuhan_diperlukan') != null)?'is-invalid':''?>">
              <option value="0" <?=($this->input->post('kebutuhan_diperlukan') == "0")?"selected":""?>>-- Pilih Kebutuhan Yang Diperlukan --</option>
              <?php foreach($_kebutuhan_diperlukans as $_kebutuhan_diperlukan):?>
                <option value="<?=$_kebutuhan_diperlukan['id']?>" <?=($this->input->post('kebutuhan_diperlukan') == $_kebutuhan_diperlukan['id'])?"selected":""?>><?=$_kebutuhan_diperlukan['nama']?></option>
              <?php endforeach;?>
            </select>
            <div class="invalid-feedback">
              <?= form_error('kebutuhan_diperlukan');?>
            </div>
          </div>
          <div class="form-group">
            <label for="alasan_terlantar">Alasan Terlantar</label>
            <textarea class="form-control <?=(form_error('alasan_terlantar') != null)?'is-invalid':''?>" id="alasan_terlantar" name="alasan_terlantar" rows="3" placeholder="Isi alasan terlantar"><?= ($this->input->post('alasan_terlantar') ? $this->input->post('alasan_terlantar') : ""); ?></textarea>
            <div class="invalid-feedback">
              <?= form_error('alasan_terlantar');?>
            </div>
          </div>
          <div class="form-group outsider d-none">
            <label for="tujuan_alamat">Alamat Tujuan Luar Daerah</label>
            <input type="text" class="form-control <?=(form_error('tujuan_alamat') != null)?'is-invalid':''?>" id="tujuan_alamat" name="tujuan_alamat" placeholder="Masukkan Alamat Tujuan Luar Daerah" value="<?= ($this->input->post('tujuan_alamat') ? $this->input->post('tujuan_alamat') : ""); ?>">
            <div class="invalid-feedback">
              <?= form_error('tujuan_alamat');?>
            </div>
          </div>
          <div class="form-group outsider d-none">
            <label for="tujuan_rt">RT Tujuan Luar Daerah</label>
            <input type="text" class="form-control <?=(form_error('tujuan_rt') != null)?'is-invalid':''?>" id="tujuan_rt" name="tujuan_rt" placeholder="Masukkan RT Tujuan Luar Daerah" value="<?= ($this->input->post('tujuan_rt') ? $this->input->post('tujuan_rt') : ""); ?>">
            <div class="invalid-feedback">
              <?= form_error('tujuan_rt');?>
            </div>
          </div>
          <div class="form-group outsider d-none">
            <label for="tujuan_rw">RW Tujuan Luar Daerah</label>
            <input type="text" class="form-control <?=(form_error('tujuan_rw') != null)?'is-invalid':''?>" id="tujuan_rw" name="tujuan_rw" placeholder="Masukkan RW Tujuan Luar Daerah" value="<?= ($this->input->post('tujuan_rw') ? $this->input->post('tujuan_rw') : ""); ?>">
            <div class="invalid-feedback">
              <?= form_error('tujuan_rw');?>
            </div>
          </div>
          <div class="form-group outsider d-none">
            <label for="tujuan_desa">Desa Tujuan Luar Daerah</label>
            <input type="text" class="form-control <?=(form_error('tujuan_desa') != null)?'is-invalid':''?>" id="tujuan_desa" name="tujuan_desa" placeholder="Masukkan Desa Tujuan Luar Daerah" value="<?= ($this->input->post('tujuan_desa') ? $this->input->post('tujuan_desa') : ""); ?>">
            <div class="invalid-feedback">
              <?= form_error('tujuan_desa');?>
            </div>
          </div>
          <div class="form-group outsider d-none">
            <label for="tujuan_kecamatan">Kecamatan Tujuan Luar Daerah</label>
            <input type="text" class="form-control <?=(form_error('tujuan_kecamatan') != null)?'is-invalid':''?>" id="tujuan_kecamatan" name="tujuan_kecamatan" placeholder="Masukkan Kecamatan Tujuan Luar Daerah" value="<?= ($this->input->post('tujuan_kecamatan') ? $this->input->post('tujuan_kecamatan') : ""); ?>">
            <div class="invalid-feedback">
              <?= form_error('tujuan_kecamatan');?>
            </div>
          </div>
          <div class="form-group outsider d-none">
            <label for="tujuan_kabupaten">Kabupaten Tujuan Luar Daerah</label>
            <input type="text" class="form-control <?=(form_error('tujuan_kabupaten') != null)?'is-invalid':''?>" id="tujuan_kabupaten" name="tujuan_kabupaten" placeholder="Masukkan Kabupaten Tujuan Luar Daerah" value="<?= ($this->input->post('tujuan_kabupaten') ? $this->input->post('tujuan_kabupaten') : ""); ?>">
            <div class="invalid-feedback">
              <?= form_error('tujuan_kabupaten');?>
            </div>
          </div>
          <div class="form-group outsider d-none">
            <label for="tujuan_provinsi">Provinsi Tujuan Luar Daerah</label>
            <input type="text" class="form-control <?=(form_error('tujuan_provinsi') != null)?'is-invalid':''?>" id="tujuan_provinsi" name="tujuan_provinsi" placeholder="Masukkan Provinsi Tujuan Luar Daerah" value="<?= ($this->input->post('tujuan_provinsi') ? $this->input->post('tujuan_provinsi') : ""); ?>">
            <div class="invalid-feedback">
              <?= form_error('tujuan_provinsi');?>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-4">
          <button type="submit" name="kirim" class="btn btn-primary btn-block">Kirim Data</button>
        </div>
        <!-- /.col -->
      </div>
    <?= form_close(); ?>
  </div>
</div>
<!-- /.card -->