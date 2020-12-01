<script>
  $(document).ready(function() {
    var tabel = $('#datatable').DataTable({
      "processing": true,
      "serverSide": true,
      "ordering": true, // Set true agar bisa di sorting
      "searching": false, // Set true agar bisa di sorting
      "columnDefs": [{
        "searchable": false,
        "orderable": false,
        "targets": 0
      }],
      "order": [
        [1, 'desc']
      ],
      "ajax": {
        "url": "<?= base_url('admin/log/datatables') ?>", // URL file untuk proses select datanya
        "type": "POST"
      },
      "deferRender": true,
      "aLengthMenu": [
        [10, 50],
        [10, 50]
      ], // Combobox Limit
      "columns": [{
          "render": function(data, type, row) { // Tampilkan kolom aksi
            return ""
          }
        },
        {
          "data": "created_at"
        },
      ],
    });
    tabel.on('order.dt search.dt draw.dt', function() {
      tabel.column(0, {
        search: 'applied',
        order: 'applied'
      }).nodes().each(function(cell, i) {
        cell.innerHTML = i + 1;
      });
    }).draw();
  });
</script>