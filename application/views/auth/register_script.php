<script>
  $(document).ready(function() {
    $('.select2').css('width', '100%')
    $('#nik').on('keyup change clear', function() {
      var value = $(this).val();
      var min_karakter = 16;
      if (value.length >= min_karakter) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('api/user') ?>",
            data: {
              nik: value
            }
          })
          .done(function(json) {
            if (json) {
              $('#nama').val(json.user_nama)
              $('#tempat_lahir').val(json.user_tempat_lahir)
              $('#tanggal_lahir').val(json.user_tanggal_lahir)
              $('#jenis_kelamin').val(json.user_jk).trigger('change')
              $('#desa').val(json.desa)
              $('#rt').val(json.rt)
              $('#rw').val(json.rw)
              $('#kecamatan').val(json.kecamatan)
              $('#kabupaten').val(json.kabupaten)
              $('#provinsi').val(json.provinsi)
              $('#no_telp').val(json.user_telepon)
            }
          })
      }
    })
  })

  function php_email_form_submit(this_form, action, data) {

    $.ajax({
      type: "POST",
      url: action,
      data: data,
      timeout: 40000,
      beforeSend: function(xhr) {
        $('.button-submit').toggleClass('d-none');
        $('.loading-submit').toggleClass('d-none');
        $('.alerw-div').removeClass('alert-danger')
        $('.alerw-div').removeClass('alert-danger')
        $('.alert-div').removeClass('alert-success')
        $('.alert-div').hide()
        $('.alert-div').html('')
      },
    }).done(function(data) {
      $('.back-to-top').click()
      $('.button-submit').toggleClass('d-none');
      $('.loading-submit').toggleClass('d-none');
      $('.alert-div').html(data.message)
      if (data.status == 1) {
        $('.alert-div').addClass('alert-success')
        setTimeout(() => {
          window.location.href = data.data.to
        }, 2000);
      } else {
        $('.alert-div').addClass('alert-danger')
      }
      $('.alert-div').show()
    }).fail(function(data) {
      $('.button-submit').toggleClass('d-none');
      $('.loading-submit').toggleClass('d-none');
      $('.alert-div').show()
      $('.alert-div').addClass('alert-danger')
      $('.alert-div').html(data.responseJSON.message)
      $('.back-to-top').click()
    });
  }
</script>