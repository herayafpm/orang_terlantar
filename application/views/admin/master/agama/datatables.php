<script>
var tabel = null;
function editData(id) {
  window.location = "<?=base_url('admin/master/agama/edit/')?>"+id;
}
function deleteData(id) {
  var cek = confirm('Yakin ingin menghapus data ini?');
  if(cek){
    $('.deleteData').attr('action',"<?=base_url('admin/master/agama/delete/')?>"+id)
    $('.deleteData').submit();
  }
}
$(document).ready(function() {
    var tabel = $('#datatable').DataTable({
        "processing": true,
        "serverSide": true,
        "ordering": true, // Set true agar bisa di sorting
        "order": [[ 0, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
        'columnDefs': [{
            "targets": [2],
            "orderable": false
        }],
        "ajax":
        {
            "url": "<?= base_url(str_replace("_","",$_datatable_view)) ?>", // URL file untuk proses select datanya
            "type": "POST"
        },
        "deferRender": true,
        "aLengthMenu": [[5, 10, 50],[ 5, 10, 50]], // Combobox Limit
        "columns": [
            { "data": "agama_id" },
            { "data": "agama_nama" },  // Tampilkan nama
            { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                    var html  = '<button type="button" class="btn btn-link" onclick="editData('+row.agama_id+')">EDIT</button>|'
                    html += '<form method="POST" class="d-inline deleteData"><button type="button" class="btn btn-link" onClick="deleteData('+row.agama_id+')">DELETE</button></form>'
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