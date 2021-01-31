<!-- Default box -->
<div class="container ml-n3" style="width:95%">
  <div class="main-card card">
    <div class="card-header">
      <div class="date-text">Semua Data</div>
      <div class="btn-actions-pane-right actions-icon-btn">
        <button class="btn-icon btn-icon-only btn btn-link refreshData"><i class="pe-7s-refresh-2 btn-icon-wrapper"></i></button>
      </div>
      <div class="card-tools">
        <form target="_blank" class="optionData" method="POST">
          <input type="hidden" name="date" id="date_hidden">
          <input type="hidden" name="nama" id="nama_hidden">
          <input type="hidden" name="nik" id="nik_hidden">
          <input type="hidden" name="no_kk" id="no_kk_hidden">
          <input type="hidden" name="desa" id="desa_hidden">
          <input type="hidden" name="kecamatan" id="kecamatan_hidden">
          <input type="hidden" name="kabupaten" id="kabupaten_hidden">
          <input type="hidden" name="tempat_tinggal_id" id="tempat_tinggal_id_hidden">
          <input type="hidden" name="kondisi_tempat_tinggal_id" id="kondisi_tempat_tinggal_id_hidden">
          <input type="hidden" name="kategori_ot_id" id="kategori_ot_id_hidden">
          <input type="hidden" name="fasilitas_kesehatan_id" id="fasilitas_kesehatan_id_hidden">
          <input type="hidden" name="kondisi_ot_id" id="kondisi_ot_id_hidden">
          <input type="hidden" name="kebutuhan_diperlukan_id" id="kebutuhan_diperlukan_id_hidden">
          <button type="button" class="btn btn-primary" onclick="printData()">Print <i class="fas fa-fw fa-print"></i></button>
          <button type="button" class="btn btn-success" onclick="exportexcel()">Export Excel <i class="fas fa-fw fa-file-excel"></i></button>
        </form>
      </div>
    </div>
    <div class="card-body">
      <h4>Filter</h4>
      <div class="row">
        <div class="col-md-3 mb-1 filtered">#</div>
        <div class="col-md-3 mb-1 filtered">Nama</div>
        <div class="col-md-3 mb-1 filtered">NIK</div>
        <div class="col-md-3 mb-1 filtered">NO KK</div>
        <div class="col-md-3 mb-1 filtered">Desa</div>
        <div class="col-md-3 mb-1 filtered">Kecamatan</div>
        <div class="col-md-3 mb-1 filtered">Kabupaten</div>
        <div class="col-md-3 mb-1 filtered">Pendaftar</div>
        <div class="col-md-3 mb-1 filtered">Tempat Tinggal</div>
        <div class="col-md-3 mb-1 filtered">Kondisi Tempat Tinggal</div>
        <div class="col-md-3 mb-1 filtered">Kategori OT</div>
        <div class="col-md-3 mb-1 filtered">Fasilitas Kesehatan OT</div>
        <div class="col-md-3 mb-1 filtered">Kondisi OT</div>
        <div class="col-md-3 mb-1 filtered">Kebutuhan</div>
        <div class="col-md-3 mb-1 filtered">Diverif Oleh</div>
        <div class="col-md-3 mb-1 filtered">Diverif</div>
        <div class="col-md-3 mb-1 filtered">Diajukan</div>
        <div class="col-md-3 mb-1 filtered">Aksi</div>
      </div>
      <div class="table-responsive">
        <table class="table table-sm table-hover table-stripped display no-wrap" id="datatable">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>NIK</th>
              <th>NO KK</th>
              <th>Desa</th>
              <th>Kecamatan</th>
              <th>Kabupaten</th>
              <th>Pendaftar</th>
              <th>Tempat Tinggal</th>
              <th>Kondisi Tempat Tinggal</th>
              <th>Kategori OT</th>
              <th>FasKes OT</th>
              <th>Kondisi OT</th>
              <th>Kebutuhan</th>
              <th>Diverif Oleh</th>
              <th>Diverif</th>
              <th>Diajukan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.card -->