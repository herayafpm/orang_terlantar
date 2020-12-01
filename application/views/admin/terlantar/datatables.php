<script>
  var tabel = null;

  function deleteData(id) {
    var cek = confirm('Yakin ingin menghapus data ini?');
    if (cek) {
      $('.deleteData').attr('action', "<?= base_url('admin/terlantar/delete/') ?>" + id)
      $('.deleteData').submit();
    }
  }

  function showData(id) {
    window.location = "<?= base_url('admin/terlantar/show/') ?>" + id
  }
  $(document).ready(function() {
    var tabel = $('#datatable').DataTable({
      "processing": true,
      "serverSide": true,
      "ordering": true, // Set true agar bisa di sorting
      "order": [
        [0, 'asc']
      ], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
      'columnDefs': [{
        "targets": [2],
        "orderable": false
      }],
      "ajax": {
        "url": "<?= base_url(str_replace("_", "", $_datatable_view)) ?>", // URL file untuk proses select datanya
        "type": "POST"
      },
      "deferRender": true,
      "aLengthMenu": [
        [10, 50],
        [10, 50]
      ], // Combobox Limit
      "columns": [{
          "data": "terlantar_id"
        },
        {
          "data": "terlantar_nama"
        }, // Tampilkan nama
        {
          "data": "terlantar_alamat"
        }, // Tampilkan nama
        {
          "render": function(data, type, row) { // Tampilkan kolom aksi
            var html = "Belum diverifikasi";
            if (row.verif == 1) {
              html = "Sudah Diverifikasi";
            }
            if (row.terima == 1) {
              html = "Diterima"
            }
            if (row.tolak == 1) {
              html = "Ditolak"
            }
            return html
          }
        },
        {
          "render": function(data, type, row) { // Tampilkan kolom aksi
            var html = "Belum Ada";
            if (row.terima == 1) {
              if (row.sumber_dana_id != null) {
                html = row.sumber_dana_nama + " " + row.bansos_nama + " " + formatRupiah(row.bansos_total, true)
              } else {
                html = row.sumber_dana_lainnya + " " + row.bansos_lainnya
              }
            }
            if (row.tolak == 1) {
              html = "Tidak Ada"
            }
            return html
          }
        },
        {
          "render": function(data, type, row) { // Tampilkan kolom aksi
            var html = '<button type="button" class="btn btn-link" onClick="showData(' + row.terlantar_id + ')">DETAIL</button>'
            if (row.verif == 0 || row.terima == 0) {
              html += '<form method="POST" class="d-inline deleteData"><button type="button" class="btn btn-link" onClick="deleteData(' + row.terlantar_id + ')">DELETE</button></form>'
            }
            return html
          }
        },
      ],
    });
    // $('.deleteData').click(function(e) {
    //   e.preventDefault()
    // })
  });
</script>