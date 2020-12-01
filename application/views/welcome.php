<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

	<div class="container-fluid" data-aos="zoom-out" data-aos-delay="100">
		<div class="row justify-content-center">
			<div class="col-xl-10">
				<div class="row">
					<div class="col-xl-6">
						<h1>Orang Terlantar</h1>
						<h2>Aplikasi yang digunakan sebagai inovasi pelayanan publik untuk menangani permasalahan yang dihadapi para orang terlantar di wilayah kabupaten banyumas</h2>
						<?php if (!isset($this->session->isLogin)) : ?>
							<a href="<?= base_url('') ?>" class="btn-get-started">Login</a>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>

</section><!-- End Hero -->

<main id="main">

	<!-- ======= Counts Section ======= -->
	<section id="counts" class="counts">
		<div class="container" data-aos="fade-up">

			<div class="row justify-content-center">

				<div class="col-lg-3 col-md-6">
					<div class="count-box">
						<i class="icofont-people"></i>
						<span data-toggle="counter-up"><?= $_terdaftar ?></span>
						<p>Orang Terlantar Terdaftar</p>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
					<div class="count-box">
						<i class="icofont-verification-check"></i>
						<span data-toggle="counter-up"><?= $_terverifikasi ?></span>
						<p>Orang Terlantar Terverifikasi</p>
					</div>
				</div>

			</div>

		</div>
	</section><!-- End Counts Section -->

	<!-- ======= About Section ======= -->
	<section id="about" class="about section-bg">
		<div class="container" data-aos="fade-up">

			<div class="row no-gutters">
				<div class="content col-xl-5 d-flex align-items-stretch">
					<div class="content">
						<h3>Langkah - Langkah Pendaftaran Orang Terlantar</h3>
					</div>
				</div>
				<div class="col-xl-7 d-flex align-items-stretch">
					<div class="icon-boxes d-flex flex-column justify-content-center">
						<div class="row">
							<div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
								<i class="bx bx-user"></i>
								<h4>1. Daftar Akun</h4>
								<p>Silakan Daftar akun terlebih dahulu untuk dapat mendaftarkan orang terlantar</p>
							</div>
							<div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
								<i class="bx bx-log-in"></i>
								<h4>2. Login Aplikasi</h4>
								<p>Setelah mendaftar dan diverifikasi oleh Admin Dinsospermades silakan LOGIN</p>
							</div>
							<div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
								<i class="bx bx-data"></i>
								<h4>3. Input Data Orang Terlantar</h4>
								<p>Input data Orang Terlantar dengan data yang sebenarnya sesuai dengan KTP dan data dukung lainya</p>
							</div>
							<div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
								<i class="bx bx-badge-check"></i>
								<h4>4. Tunggu Diverifikasi</h4>
								<p>Tunggu hasil verifikasi dari Dinsospermades data usulan orang terlantar yang anda usulkan</p>
							</div>
						</div>
					</div><!-- End .content-->
				</div>
			</div>

		</div>
	</section><!-- End About Section -->


</main><!-- End #main -->