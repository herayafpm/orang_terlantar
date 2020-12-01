<div class="card">
  <div class="card-body">
    <form action="" method="post">
      <div class="row">
        <div class="col-md-12">
          <div class="row form-group">
            <div class="col-md-4">
              <select class="form-control" name="status">
                <option value="" selected>-- Pilih Status --</option>
                <option value="1">Belum Diverifikasi</option>
                <option value="2">Sudah Diverifikasi</option>
                <option value="3">Diterima</option>
                <option value="4">Ditolak</option>
              </select>
            </div>
            <div class="col-md-4">
              <select name="tempat_tinggal" id="tempat_tinggal" class="form-control select2 <?= (form_error('tempat_tinggal') != null) ? 'is-invalid' : '' ?>">
                <option value="0" <?= ($this->input->post('tempat_tinggal') == "0") ? "selected" : "" ?>>-- Tempat Tinggal --</option>
                <?php foreach ($_tempat_tinggals as $_tempat_tinggal) : ?>
                  <option value="<?= $_tempat_tinggal['id'] ?>"><?= $_tempat_tinggal['nama'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-4">
              <select name="kondisi_tempat_tinggal" id="kondisi_tempat_tinggal" class="form-control select2 <?= (form_error('kondisi_tempat_tinggal') != null) ? 'is-invalid' : '' ?>">
                <option value="0" <?= ($this->input->post('kondisi_tempat_tinggal') == "0") ? "selected" : "" ?>>-- Kondisi Tempat Tinggal --</option>
                <?php foreach ($_kondisi_tempat_tinggals as $_kondisi_tempat_tinggal) : ?>
                  <option value="<?= $_kondisi_tempat_tinggal['id'] ?>"><?= $_kondisi_tempat_tinggal['nama'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-4">
              <select name="kategori_ot" id="kategori_ot" class="form-control select2 <?= (form_error('kategori_ot') != null) ? 'is-invalid' : '' ?>">
                <option value="0" <?= ($this->input->post('kategori_ot') == "0") ? "selected" : "" ?>>-- Kategori Orang Terlantar --</option>
                <?php foreach ($_kategori_ots as $_kategori_ot) : ?>
                  <option value="<?= $_kategori_ot['id'] ?>"><?= $_kategori_ot['nama'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-4">
              <select name="fasilitas_kesehatan" id="fasilitas_kesehatan" class="form-control select2 <?= (form_error('fasilitas_kesehatan') != null) ? 'is-invalid' : '' ?>">
                <option value="0" <?= ($this->input->post('fasilitas_kesehatan') == "0") ? "selected" : "" ?>>-- Fasilitas Kesehatan --</option>
                <?php foreach ($_fasilitas_kesehatans as $_fasilitas_kesehatan) : ?>
                  <option value="<?= $_fasilitas_kesehatan['id'] ?>"><?= $_fasilitas_kesehatan['nama'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-4">
              <select name="kondisi_ot" id="kondisi_ot" class="form-control select2 <?= (form_error('kondisi_ot') != null) ? 'is-invalid' : '' ?>">
                <option value="0" <?= ($this->input->post('kondisi_ot') == "0") ? "selected" : "" ?>>-- Kondisi Orang Terlantar --</option>
                <?php foreach ($_kondisi_ots as $_kondisi_ot) : ?>
                  <option value="<?= $_kondisi_ot['id'] ?>"><?= $_kondisi_ot['nama'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-4">
              <select name="kebutuhan_diperlukan" id="kebutuhan_diperlukan" class="form-control select2 <?= (form_error('kebutuhan_diperlukan') != null) ? 'is-invalid' : '' ?>">
                <option value="0" <?= ($this->input->post('kebutuhan_diperlukan') == "0") ? "selected" : "" ?>>-- Kebutuhan Yang Diperlukan --</option>
                <?php foreach ($_kebutuhan_diperlukans as $_kebutuhan_diperlukan) : ?>
                  <option value="<?= $_kebutuhan_diperlukan['id'] ?>"><?= $_kebutuhan_diperlukan['nama'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-4">
              <select name="kecamatan" id="kecamatan" class="form-control select2 <?= (form_error('kecamatan') != null) ? 'is-invalid' : '' ?>">
                <option value="0" <?= ($this->input->post('kecamatan') == "0") ? "selected" : "" ?>>-- Kecamatan --</option>
                <?php foreach ($_kecamatans as $_kecamatan) : ?>
                  <option value="<?= $_kecamatan['nama'] ?>"><?= $_kecamatan['nama'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <button class="btn btn-primary" type="submit" name="export">Export ke Excel</button>
        </div>
      </div>
    </form>
  </div>
</div>