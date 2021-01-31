<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Print Laporan Orang Terlantar Diverifikasi</title>
  <style>
    body {
      position: relative;
    }

    table {
      position: absolute;
      left: 0;
    }

    td {
      text-align: center;
      margin: 2px;
    }
  </style>
</head>

<body>
  <font size="1">
    <table border="1" cellpadding="3" style="width: 100%;">
      <thead>
        <tr>
          <th>NO</th>
          <th>NIK</th>
          <th>NO KK</th>
          <th>NAMA</th>
          <th>TEMPAT LAHIR</th>
          <th>TANGGAL LAHIR</th>
          <th>JENIS KELAMIN</th>
          <th>AGAMA</th>
          <th>JL</th>
          <th>RT</th>
          <th>RW</th>
          <th>DESA</th>
          <th>KEC</th>
          <th>TEMPAT TINGGAL</th>
          <th>KONDISI TMP TINGGAL</th>
          <th>KATEGORI OT</th>
          <th>FASKES</th>
          <th>KONDISI OT</th>
          <th>KEBUTUHAN</th>
          <th>BANSOS YG DITERIMA</th>
          <th>PERMASALAH YG DIHADAPI</th>
          <th>TUJUAN PERJALANAN</th>
          <th>PEMBERI BANTUAN</th>
          <th>KETERANGAN</th>
          <th>DIAJUKAN PADA</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($_terlantars as $terlantar) : ?>
          <tr>
            <td><?= $no ?></td>
            <td><?= $terlantar['terlantar_nik'] ?></td>
            <td><?= $terlantar['terlantar_no_kk'] ?></td>
            <td><?= $terlantar['terlantar_nama'] ?></td>
            <td><?= $terlantar['terlantar_tempat_lahir'] ?></td>
            <td><?= $terlantar['terlantar_tanggal_lahir'] ?></td>
            <td><?= $terlantar['terlantar_jenis_kelamin'] ?></td>
            <td><?= $terlantar['agama_nama'] ?></td>
            <td><?= $terlantar['terlantar_alamat'] ?></td>
            <td><?= $terlantar['terlantar_rt'] ?></td>
            <td><?= $terlantar['terlantar_rw'] ?></td>
            <td><?= $terlantar['terlantar_desa'] ?></td>
            <td><?= $terlantar['terlantar_kecamatan'] ?></td>
            <td><?= $terlantar['tempat_tinggal_nama'] ?></td>
            <td><?= $terlantar['kondisi_tempat_tinggal_nama'] ?></td>
            <td><?= $terlantar['kategori_ot_nama'] ?></td>
            <td><?= $terlantar['fasilitas_kesehatan_nama'] ?></td>
            <td><?= $terlantar['kondisi_ot_nama'] ?></td>
            <td><?= $terlantar['kebutuhan_diperlukan_nama'] ?? $terlantar['kebutuhan_diperlukan_lainnya'] ?></td>
            <td><?= ($terlantar['sumber_dana_id'] != null) ? $terlantar['bansos_nama'] . " Rp." . $terlantar['bansos_total'] : "Tidak Ada" ?></td>
            <td><?= $terlantar['alasan_terlantar'] ?></td>
            <td><?= $terlantar['tujuan_alamat'] ?>, <?= $terlantar['tujuan_desa'] ?> <?= $terlantar['tujuan_rt'] ?>/<?= $terlantar['tujuan_rw'] ?> <?= $terlantar['tujuan_kecamatan'] ?> <?= $terlantar['tujuan_kabupaten'] ?> <?= $terlantar['tujuan_provinsi'] ?></td>
            <td><?= ($terlantar['sumber_dana_id'] != null) ? $terlantar['sumber_dana_nama'] : "Tidak Ada" ?></td>
            <td><?= $terlantar['keterangan'] ?></td>
            <td><?= $terlantar['created_at'] ?></td>
          </tr>
        <?php
          $no++;
        endforeach ?>
      </tbody>
    </table>
  </font>

  <script>
    window.print()
  </script>
</body>

</html>