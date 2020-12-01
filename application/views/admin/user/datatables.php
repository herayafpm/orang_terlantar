<div class="d-none">
    <button type="button" class="detailModal" data-toggle="modal" data-target="#detailModal"></button>
</div>
<!-- Detail Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        NIK
                    </div>
                    <div class="col">
                        : <span class="user_nik"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Tempat, Tanggal Lahir
                    </div>
                    <div class="col">
                        : <span class="user_tempat_lahir"></span>, <span class="user_tanggal_lahir"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Jenis Kelamin
                    </div>
                    <div class="col">
                        : <span class="user_jk"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Desa
                    </div>
                    <div class="col">
                        : <span class="desa"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        RT / RW
                    </div>
                    <div class="col">
                        : <span class="rt"></span>/<span class="rw"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Kecamatan
                    </div>
                    <div class="col">
                        : <span class="kecamatan"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Kabupaten
                    </div>
                    <div class="col">
                        : <span class="kabupaten"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Provinsi
                    </div>
                    <div class="col">
                        : <span class="provinsi"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        No Telp. (WA)
                    </div>
                    <div class="col">
                        : <span class="user_telepon"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Diajukan Pada
                    </div>
                    <div class="col">
                        : <span class="created_at"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Terakhir Login
                    </div>
                    <div class="col">
                        : <span class="last_login"></span>
                    </div>
                </div>
                <div class="row verif">
                    <div class="col-4">
                        Diverifikasi
                    </div>
                    <div class="col">
                        : <span class="verif-text"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    var id = null;
    var datas = [];
    var tabel = null;
    var nama = "";
    var nik = "";
    var desa = "";
    var kecamatan = "";
    var kabupaten = "";
    var start = null;
    var end = null;
    var date = null;



    function deleteData(id) {
        var cek = confirm('Yakin ingin menghapus data ini?');
        if (cek) {
            $('.deleteData').attr('action', "<?= base_url('admin/user/delete/') ?>" + id)
            $('.deleteData').submit();
        }
    }

    function batalVerifData(id) {
        var cek = confirm('Yakin ingin membatalkan verivikasi data ini?');
        if (cek) {
            $('.verifData').attr('action', "<?= base_url('admin/user/verif/') ?>" + id)
            $('.verifData').submit();
        }
    }

    function verifData(id) {
        var cek = confirm('Yakin ingin memverivikasi data ini?');
        if (cek) {
            $('.verifData').attr('action', "<?= base_url('admin/user/verif/') ?>" + id)
            $('.verifData').submit();
        }
    }

    function logData(id) {
        window.location.href = "<?= base_url('admin/user/log/') ?>" + id;
    }

    function showData(index) {
        $('.verif').addClass('d-none');
        $('.detailModal').click()
        var data = datas[index]
        var status = '<span class="badge badge-info"><i class="fa fa-fw fa-clock"></i> DiProses</span>'
        if (data.user_status == 1) {
            $('.verif').removeClass('d-none');
            status = '<span class="badge badge-success"><i class="fa fa-fw fa-check"></i> Diverifikasi</span>'
            $('.verif-text').html('Diverifikasi Oleh ' + data.admin_nama + ' Pada ' + toLocaleDate(data.verif_at, "LLLL"))
        }
        $('#detailModalLabel').html('Detail User ' + data.user_nama + " " + status)
        $('.user_nik').html(data.user_nik)
        $('.user_tempat_lahir').html(data.user_tempat_lahir)
        $('.user_tanggal_lahir').html(toLocaleDate(data.user_tanggal_lahir, 'LL'))
        $('.last_login').html(toLocaleDate(data.last_login, 'LLLL'))
        $('.user_jk').html(data.user_jk)
        $('.desa').html(data.desa)
        $('.rt').html(data.rt)
        $('.rw').html(data.rw)
        $('.kecamatan').html(data.kecamatan)
        $('.kabupaten').html(data.kabupaten)
        $('.provinsi').html(data.provinsi)
        $('.user_telepon').html(data.user_telepon)
        $('.created_at').html(toLocaleDate(data.created_at, 'LLLL'))
    }
    $(document).ready(function() {
        // start = moment();
        // end = moment();
        // date = start.format('YYYY-MM-D') + '/' + end.format('YYYY-MM-D');
        tabel = $('#datatable').DataTable({
            "processing": true,
            "serverSide": true,
            "scrollX": true,
            "scrollY": "<?= $_datatable_scroll_y ?>",
            "scrollCollapse": true,
            "ordering": true, // Set true agar bisa di sorting
            "order": [
                [6, 'desc']
            ], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
            "ajax": {
                "url": "<?= base_url(str_replace("_", "", $_datatable_view)) . "/" . $_status ?>", // URL file untuk proses select datanya
                "type": "POST",
                "data": function(d) {
                    d.nama = nama;
                    d.nik = nik;
                    d.desa = desa;
                    d.kecamatan = kecamatan;
                    d.kabupaten = kabupaten;
                    d.date = date;
                }
            },
            "searching": false,
            'columnDefs': [{
                "targets": [0, 7],
                "orderable": false
            }],
            "deferRender": true,
            "aLengthMenu": [
                [10, 50],
                [10, 50]
            ], // Combobox Limit
            "initComplete": function(settings, json) {
                datas = json.data
            },
            "columns": [{
                    'data': 'user_id'
                },
                {
                    "data": "user_nama"
                }, // Tampilkan nama
                {
                    "data": "user_nik"
                },
                {
                    "data": "desa"
                },
                {
                    "data": "kecamatan"
                },
                {
                    "data": "kabupaten"
                },
                {
                    "render": function(data, type, row) {
                        return toLocaleDate(row.created_at)
                    }
                },
                {
                    "render": function(data, type, row, meta) { // Tampilkan kolom aksi
                        var html = '<button type="button" class="btn btn-sm float-left" onClick="showData(' + meta.row + ')"><div class="mb-2 mr-2 badge badge-info"><i class="fa fa-fw fa-eye"></i> Detail</div></button>'
                        var textVerif = '<i class="fa fa-fw fa-check"></i> Verif'
                        var classBadge = "badge-success";
                        if (row.user_status == 1) {
                            classBadge = "badge-danger";
                            textVerif = '<i class="fa fa-fw fa-times"></i> Batal Verif'
                            html += '<form method="POST" class="verifData float-left"><input type="hidden" name="batal"><button type="button" class="btn btn-sm" onClick="batalVerifData(' + row.user_id + ')"><div class="mb-2 mr-2 badge ' + classBadge + '">' + textVerif + '</div></button></form>'
                            classBadge = "badge-info";
                            textLog = '<i class="fa fa-fw fa-clock"></i> Catatan Login'
                            html += '<button type="button" class="btn btn-sm" onClick="logData(' + row.user_id + ')"><div class="mb-2 mr-2 badge ' + classBadge + '">' + textLog + '</div></button>'
                        } else {
                            classBadge = "badge-success";
                            textVerif = '<i class="fa fa-fw fa-check"></i> Verif'
                            html += '<form method="POST" class="verifData float-left"><button type="button" class="btn btn-sm" onClick="verifData(' + row.user_id + ')"><div class="mb-2 mr-2 badge ' + classBadge + '">' + textVerif + '</div></button></form>'
                        }
                        html += '<form method="POST" class="deleteData float-left"><button type="button" class="btn btn-sm" onClick="deleteData(' + row.user_id + ')"><div class="mb-2 mr-2 badge badge-danger"><i class="fa fa-fw fa-trash"></i> Hapus</div></form>'
                        return html
                    }
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
        $('.filtered').each(function(i) {
            var title = $(this).text();
            if (i >= 1 && i <= 2) {
                var input = $('<input class="form-control form-control-sm" type="text" placeholder="' + title + '"/>').appendTo($(this).empty());
                if (i == 2) {
                    var input = $('<input class="form-control form-control-sm" type="text" data-inputmask-alias="9" data-inputmask-repeat="16" placeholder="' + title + '"/>').appendTo($(this).empty());
                }
                input.on('keyup change clear', function() {
                    var term = $(this).val();
                    if (i == 1) {
                        nama = term;
                    }
                    if (i == 2) {
                        nik = term;
                    }
                    tabel.ajax.reload(null, false)
                });
            } else if (i >= 3 && i <= 5) {
                var select = $('<select><option class="form-control form-control-sm" value="">-- Pilih ' + title + ' --</option></select>').appendTo($(this).empty()).on('change', function() {
                    var term = $(this).val();
                    if (i == 3) {
                        desa = term
                    }
                    if (i == 4) {
                        kecamatan = term
                    }
                    if (i == 5) {
                        kabupaten = term
                    }
                    tabel.ajax.reload(null, false)
                });
                var options = []
                if (i == 3) {
                    options = <?= $_desas ?>;
                }
                if (i == 4) {
                    options = <?= $_kecamatans ?>;
                }
                if (i == 5) {
                    options = <?= $_kabupatens ?>;
                }
                options.map((d) => {
                    select.append('<option value="' + d.nama + '">' + d.nama + '</option>')
                })
            } else if (i == 6) {
                var daterange = '<div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%"><i class="fa fa-calendar"></i>&nbsp;<span></span> <i class="fa fa-caret-down"></i></div>';
                $(this).empty().append(daterange);
            } else {
                $(this).empty();
            }
        });

        function cb(start, end) {
            date = start.format('YYYY-MM-D') + '/' + end.format('YYYY-MM-D');
            $('.date-text').html("Data Dari tanggal " + start.format('D MMMM, YYYY') + ' - ' + end.format('D MMMM, YYYY'))
            tabel.ajax.reload(null, false)
        }

        $('#reportrange').daterangepicker({
            showDropdowns: true,
            autoApply: false,
            locale: {
                customRangeLabel: 'Tentukan Sendiri',
                cancelLabel: 'Batal',
                applyLabel: 'Pilih',
            },
            ranges: {
                'Hari ini': [moment(), moment()],
                'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                '7 Hari terakhir': [moment().subtract(6, 'days'), moment()],
                '30 Hari terakhir': [moment().subtract(29, 'days'), moment()],
                'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
                'Bulan sebelumnya': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        });
        $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
            cb(picker.startDate, picker.endDate)
        })
        $('.refreshData').on('click', function() {
            date = null;
            $('.date-text').html("Semua Data");
            tabel.ajax.reload(null, false)
        })
    });
</script>