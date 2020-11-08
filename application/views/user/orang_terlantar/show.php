<!-- Default box -->
<h3><?=$_title?></h3>
<div class="card">
  <div class="card-body">
    <div class="row w-25 mx-auto">
      <div class="col">
        <img class="img-fluid" src="<?=base_url('uploads')."/".$_terlantar['foto']?>" alt="foto terlantar">
      </div>
    </div>
    <div class="row">
      <div class="col-3">
        Jenis Orang Terlantar
      </div>
      <div class="col">
        : <?=$_terlantar['orang_terlantar_nama']?>
      </div>
    </div>
    <div class="row">
      <div class="col-3">
        Nama Lengkap
      </div>
      <div class="col">
        : <?=$_terlantar['terlantar_nama']?>
      </div>
    </div>
    <div class="row">
      <div class="col-3">
        Alamat
      </div>
      <div class="col">
        : <?=$_terlantar['terlantar_alamat']?>
      </div>
    </div>
    <?php if((bool) $_terlantar['identitas_kependudukan']):?>
      <div class="row">
        <div class="col-3">
          NIK
        </div>
        <div class="col">
          : <?=$_terlantar['terlantar_nik']?>
        </div>
      </div>
      <div class="row">
        <div class="col-3">
          NO KK
        </div>
        <div class="col">
          : <?=$_terlantar['terlantar_no_kk']?>
        </div>
      </div>
      <div class="row">
        <div class="col-3">
          NO DTKS / BDT
        </div>
        <div class="col">
          : <?=$_terlantar['terlantar_no_dtks']?>
        </div>
      </div>
      <div class="row">
        <div class="col-3">
          Tempat Tanggal Lahir
        </div>
        <div class="col">
          : <?=$_terlantar['terlantar_tempat_lahir']?>, <?=$_terlantar['terlantar_tanggal_lahir']?>
        </div>
      </div>
      <div class="row">
        <div class="col-3">
          Jenis Kelamin
        </div>
        <div class="col">
          : <?=$_terlantar['terlantar_jenis_kelamin']?>
        </div>
      </div>
      <?php if($_terlantar['agama_id'] != null):?>
      <div class="row">
        <div class="col-3">
          Agama
        </div>
        <div class="col">
          : <?=$_terlantar['agama_nama']?>
        </div>
      </div>
      <?php endif?>
      <div class="row">
        <div class="col-3">
          RT / RW
        </div>
        <div class="col">
          : <?=$_terlantar['terlantar_rt']?> / <?=$_terlantar['terlantar_rw']?>
        </div>
      </div>
      <div class="row">
        <div class="col-3">
          Kecamatan
        </div>
        <div class="col">
          : <?=$_terlantar['terlantar_kecamatan']?>
        </div>
      </div>
      <div class="row">
        <div class="col-3">
          Kabupaten
        </div>
        <div class="col">
          : <?=$_terlantar['terlantar_kabupaten']?>
        </div>
      </div>
      <div class="row">
        <div class="col-3">
          No Telepon (WA)
        </div>
        <div class="col">
          : <?=$_terlantar['terlantar_telp']?>
        </div>
      </div>
    <?php endif;?>
    <div class="row">
      <div class="col-3">
        Tempat Tinggal
      </div>
      <div class="col">
        : <?=$_terlantar['tempat_tinggal_nama']?>
      </div>
    </div>
    <div class="row">
      <div class="col-3">
        Kondisi Tempat Tinggal
      </div>
      <div class="col">
        : <?=$_terlantar['kondisi_tempat_tinggal_nama']?>
      </div>
    </div>
    <div class="row">
      <div class="col-3">
        Kategori Orang Terlantar
      </div>
      <div class="col">
        : <?=$_terlantar['kategori_ot_nama']?>
      </div>
    </div>
    <div class="row">
      <div class="col-3">
        Fasilitas Kesehatan
      </div>
      <div class="col">
        : <?=$_terlantar['fasilitas_kesehatan_nama']?>
      </div>
    </div>
    <div class="row">
      <div class="col-3">
        Kondisi Orang Terlantar
      </div>
      <div class="col">
        : <?=$_terlantar['kondisi_ot_nama']?>
      </div>
    </div>
    <div class="row">
      <div class="col-3">
        Alasan Terlantar
      </div>
      <div class="col">
        : <?=$_terlantar['alasan_terlantar']?>
      </div>
    </div>
    <?php if($_terlantar['orang_terlantar_id'] == 2):?>
      <div class="row">
        <div class="col-3">
          Tujuan Alamat
        </div>
        <div class="col">
          : <?=$_terlantar['tujuan_alamat']?>
        </div>
      </div>
      <div class="row">
        <div class="col-3">
          Tujuan RT
        </div>
        <div class="col">
          : <?=$_terlantar['tujuan_rt']?>
        </div>
      </div>
      <div class="row">
        <div class="col-3">
          Tujuan RW
        </div>
        <div class="col">
          : <?=$_terlantar['tujuan_rw']?>
        </div>
      </div>
      <div class="row">
        <div class="col-3">
          Tujuan Desa
        </div>
        <div class="col">
          : <?=$_terlantar['tujuan_desa']?>
        </div>
      </div>
      <div class="row">
        <div class="col-3">
          Tujuan Kecamatan
        </div>
        <div class="col">
          : <?=$_terlantar['tujuan_kecamatan']?>
        </div>
      </div>
      <div class="row">
        <div class="col-3">
          Tujuan Kabupaten
        </div>
        <div class="col">
          : <?=$_terlantar['tujuan_kabupaten']?>
        </div>
      </div>
      <div class="row">
        <div class="col-3">
          Tujuan Provinsi
        </div>
        <div class="col">
          : <?=$_terlantar['tujuan_provinsi']?>
        </div>
      </div>
    <?php endif?>
    <?php if($_terlantar['bansos_id'] != null):?>
      <div class="row">
        <div class="col-3">
          Bantuan Sosial yang didapatkan
        </div>
        <div class="col">
          : <?=$_terlantar['bansos_nama']?> <?=$_terlantar['keterangan_bansos']?>
        </div>
      </div>
    <?php endif;?>
    <div class="row">
      <div class="col-3">
        Diajukan pada
      </div>
      <div class="col">
        : <?=$_terlantar['created_at']?>
      </div>
    </div>
  </div>
</div>
<!-- /.card -->