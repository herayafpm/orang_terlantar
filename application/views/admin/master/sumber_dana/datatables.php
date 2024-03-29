<script>
  var tabel = null;

  function editData(id) {
    window.location = "<?= base_url('admin/master/sumberdana/edit/') ?>" + id;
  }

  function deleteData(id) {
    var cek = confirm('Yakin ingin menghapus data ini?');
    if (cek) {
      $('.deleteData').attr('action', "<?= base_url('admin/master/sumberdana/delete/') ?>" + id)
      $('.deleteData').submit();
    }
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
          "data": "sumber_dana_id"
        },
        {
          "data": "sumber_dana_nama"
        }, // Tampilkan nama
        {
          "render": function(data, type, row) { // Tampilkan kolom aksi
            var html = '<button type="button" class="btn btn-link" onclick="editData(' + row.sumber_dana_id + ')"><i class="fa fa-fw fa-edit" aria-hidden="true" title="Copy to use edit"></i></button>'
            html += '<form method="POST" class="d-inline deleteData"><button type="button" class="btn btn-link" onClick="deleteData(' + row.sumber_dana_id + ')"><i class="fa fa-fw fa-trash text-danger" aria-hidden="true" title="Copy to use delete"></i></button></form>'
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