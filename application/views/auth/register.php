<div class="container auth-section" data-aos="fade-up">
	<div class="section-title">
		<h2>Pendaftaran Akun</h2>
		<p><?= APP_NAME ?></p>
	</div>
	<div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
		<div class="col-lg-6">
			<div class="alert alert-div" role="alert"></div>
			<form action="<?= base_url('auth/register') ?>" method="post" role="form" class="php-email-form">
				<div class="form-group">
					<input type="text" data-inputmask-alias="9" data-inputmask-repeat="16" name="nik" class="form-control" id="nik" placeholder="NIK" data-rule="required" data-msg="Harap isi" />
					<div class="text-danger validate"></div>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" data-rule="required" data-msg="Harap isi" />
					<div class="text-danger validate"></div>
				</div>
				<div class="form-group row">
					<div class="col-12 col-lg-6 mb-3">
						<input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" data-rule="required" data-msg="Harap isi" />
						<div class="text-danger validate"></div>
					</div>
					<div class="col-12 col-lg-6">
						<input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" data-rule="required" data-msg="Harap isi" />
						<div class="text-danger validate"></div>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-12">
						<select class="form-control w-100 jenis_kelamin-control select2" name="jenis_kelamin" id="jenis_kelamin" style="width:100%;font-size: 15px">
							<option value="">- - - Jenis Kelamin - - -</option>
							<option value="LAKI - LAKI" <?= ($this->input->post('jenis_kelamin') == "LAKI - LAKI") ? 'selected' : '' ?>>LAKI - LAKI</option>
							<option value="PEREMPUAN" <?= ($this->input->post('jenis_kelamin') == "PEREMPUAN") ? 'selected' : '' ?>>PEREMPUAN</option>
						</select>
						<div class="text-danger validate"></div>
					</div>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="desa" id="desa" placeholder="Desa" data-rule="required" data-msg="Harap isi" />
					<div class="text-danger validate"></div>
				</div>
				<div class="form-group row">
					<div class="col-12 col-lg-6 mb-3">
						<input type="number" class="form-control" name="rt" id="rt" placeholder="RT" data-rule="required" data-msg="Harap isi" />
						<div class="text-danger validate"></div>
					</div>
					<div class="col-12 col-lg-6">
						<input type="number" class="form-control" name="rw" id="rw" placeholder="RW" data-rule="required" data-msg="Harap isi" />
						<div class="text-danger validate"></div>
					</div>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" data-rule="required" data-msg="Harap isi" />
					<div class="text-danger validate"></div>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="kabupaten" id="kabupaten" placeholder="Kabupaten" data-rule="required" data-msg="Harap isi" />
					<div class="text-danger validate"></div>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi" data-rule="required" data-msg="Harap isi" />
					<div class="text-danger validate"></div>
				</div>
				<div class="form-group">
					<input type="text" data-inputmask-alias="9" data-inputmask-repeat="13" class="form-control" name="no_telp" id="no_telp" placeholder="No Telepon (WA)" />
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" id="password" placeholder="Password" data-rule="minlen:6" data-msg="Harap isi Min. 6 karakter" />
					<div class="text-danger validate"></div>
				</div>
				<p style="margin-top: 20px;">
					Sudah memiliki akun ? Silahkan
					<a href="<?= base_url('auth') ?>" style=" text-decoration: underline; font-style: italic;">
						Login
					</a>
				</p>
				<div class="text-center"><button class="btn btn-disabled py-3 px-5 loading-submit d-none" type="button"><i class="fas fa-circle-notch fa-spin"></i></button></div>
				<div class="text-center"><button class="btn btn-primary py-3 px-5 button-submit" type="submit">Kirim Data</button></div>
			</form>
		</div>

	</div>

</div>