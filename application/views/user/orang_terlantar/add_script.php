<script src="<?= base_url('assets/vendor/inputmask/jquery.inputmask.min.js') ?>"></script>
<script>
  $(document).ready(function() {
    $('.android :input').css('font-size', 15)
    $('.select2').css('width', '100%')
    $(":input").inputmask();
    // if ($('#orang_terlantar').val() == 2) {
    //   $('.outsider').toggleClass('d-none');
    // }
    // $('#orang_terlantar').change(function(e) {
    //   var val = $(this).val();
    //   if (val == 2) {
    //     $('.outsider').toggleClass('d-none');
    //   } else {
    //     $('.outsider').addClass('d-none');
    //   }
    // })
    if ($('#tempat_tinggal').val() != 0 && $('#tempat_tinggal').val() != 3 || $('#tempat_tinggal-desktop').val() != 0 && $('#tempat_tinggal-desktop').val() != 3) {
      $('.kondisi_tempat_tinggal').removeClass('d-none');
    }
    $('#tempat_tinggal').change(function(e) {
      var val = $(this).val();
      if (val != 0 && val != 3) {
        $('.kondisi_tempat_tinggal').removeClass('d-none');
      } else {
        $('.kondisi_tempat_tinggal').toggleClass('d-none');
      }
    })
    $('#tempat_tinggal-desktop').change(function(e) {
      var val = $(this).val();
      if (val != 0 && val != 3) {
        $('.kondisi_tempat_tinggal').removeClass('d-none');
      } else {
        $('.kondisi_tempat_tinggal').toggleClass('d-none');
      }
    })
    if ($('#kebutuhan_diperlukan').val() == "0" && $('#kebutuhan_diperlukan').val() != "" || $('#kebutuhan_diperlukan-desktop').val() == "0" && $('#kebutuhan_diperlukan-desktop').val() != "") {
      $('.kebutuhan_diperlukan').toggleClass('d-none');
    }
    $('#kebutuhan_diperlukan').change(function(e) {
      var val = $(this).val();
      if (val == 0) {
        $('.kebutuhan_diperlukan').toggleClass('d-none');
      } else {
        $('.kebutuhan_diperlukan').addClass('d-none');
      }
    })
    $('#kebutuhan_diperlukan-desktop').change(function(e) {
      var val = $(this).val();
      if (val == 0) {
        $('.kebutuhan_diperlukan').toggleClass('d-none');
      } else {
        $('.kebutuhan_diperlukan').addClass('d-none');
      }
    })
  })
</script>