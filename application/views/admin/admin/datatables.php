<script>
  var tabel = null;

  function deleteData(id) {
    var cek = confirm('Yakin ingin menghapus data ini?');
    if (cek) {
      $('.deleteData').attr('action', "<?= base_url('admin/admin/delete/') ?>" + id)
      $('.deleteData').submit();
    }
  }

  function editData(id) {
    window.location = "<?= base_url('admin/admin/edit/') ?>" + id
  }

  function showData(id) {
    window.location = "<?= base_url('admin/admin/log/') ?>" + id
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
          "data": "admin_id"
        },
        {
          "data": "admin_nama"
        }, // Tampilkan nama
        {
          "data": "admin_username"
        }, // Tampilkan nama
        {
          "render": function(data, type, row) { // Tampilkan kolom aksi
            var html = '<button type="button" class="btn btn-link text-warning" onClick="showData(' + row.admin_id + ')"><i class="fa fa-fw fa-clock" aria-hidden="true" title="Catatan Login"></i></button>'
            html += '<button type="button" class="btn btn-link text-info" onClick="editData(' + row.admin_id + ')"><i class="fa fa-fw fa-edit" aria-hidden="true" title="Edit Data"></i></button>'
            html += '<form method="POST" class="d-inline deleteData"><button type="button" class="btn btn-link text-danger" onClick="deleteData(' + row.admin_id + ')"><i class="fa fa-fw fa-trash" aria-hidden="true" title="Hapus Data"></i></button></form>'
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