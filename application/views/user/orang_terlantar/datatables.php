<script>
var tabel = null;
function deleteData(id) {
  var cek = confirm('Yakin ingin menghapus data ini?');
  if(cek){
    $('.deleteData').attr('action',"<?=base_url('user/orangterlantar/delete/')?>"+id)
    $('.deleteData').submit();
  }
}
function showData(id) {
  window.location = "<?=base_url('user/orangterlantar/show/')?>"+id
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
            { "data": "terlantar_id" },
            { "data": "terlantar_nama" },  // Tampilkan nama
            { "data": "terlantar_alamat" },  // Tampilkan nama
            { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                    var html = '<button type="button" class="btn btn-link" onClick="showData('+row.terlantar_id+')">DETAIL</button>'
                    if(row.verif == 0){
                        html += '<button type="button" class="btn btn-link" onClick="editData('+row.terlantar_id+')">EDIT</button>'
                        html += '<form method="POST" class="d-inline deleteData"><button type="button" class="btn btn-link" onClick="deleteData('+row.terlantar_id+')">DELETE</button></form>'
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