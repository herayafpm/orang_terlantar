<!-- Default box -->
<div class="card">
  <div class="card-body">
    <?= form_open($_view . "/" . $_bansos['bansos_id']); ?>
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label for="bansos_nama">Nama Bantuan Sosial</label>
          <input type="text" class="form-control <?= (form_error('bansos_nama') != null) ? 'is-invalid' : '' ?>" id="bansos_nama" name="bansos_nama" placeholder="Masukkan Nama Bantuan Sosial" value="<?= ($this->input->post('bansos_nama') ? $this->input->post('bansos_nama') :  $_bansos['bansos_nama']); ?>">
          <div class="invalid-feedback">
            <?= form_error('bansos_nama'); ?>
          </div>
        </div>
        <div class="form-group">
          <label for="bansos_total">Total Bantuan Sosial</label>
          <input type="text" data-inputmask="'alias': 'currency'" class="form-control <?= (form_error('bansos_total') != null) ? 'is-invalid' : '' ?>" id="bansos_total" name="bansos_total" placeholder="Masukkan Total Bantuan Sosial" value="<?= ($this->input->post('bansos_total') ? $this->input->post('bansos_total') :  $_bansos['bansos_total']); ?>">
          <div class="invalid-feedback">
            <?= form_error('bansos_total'); ?>
          </div>
        </div>
        <div class="form-group">
          <label for="sumber_dana_id">Sumber Dana</label>
          <select name="sumber_dana_id" id="sumber_dana_id" class="form-control <?= (form_error('sumber_dana_id') != null) ? 'is-invalid' : '' ?>">
            <option value="" <?= ($this->input->post('sumber_dana_id') == "") ? "selected" : "" ?>>-- Pilih Sumber Dana --</option>
            <?php foreach ($_sumber_danas as $_sumber_dana) : ?>
              <option value="<?= $_sumber_dana['sumber_dana_id'] ?>" <?= ($this->input->post('sumber_dana_id') == $_sumber_dana['sumber_dana_id']) ? "selected" : ($_sumber_dana['sumber_dana_id'] == $_bansos['sumber_dana_id']) ? "selected" : "" ?>><?= $_sumber_dana['sumber_dana_nama'] ?></option>
            <?php endforeach; ?>
          </select>
          <div class="invalid-feedback">
            <?= form_error('sumber_dana_id'); ?>
          </div>
        </div>
        <button type="submit" class="btn btn-primary" name='simpan'>Simpan</button>
      </div>
    </div>
    <?= form_close(); ?>
  </div>
</div>
<!-- /.card -->