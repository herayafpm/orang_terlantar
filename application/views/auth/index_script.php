<script>
  function php_email_form_submit(this_form, action, data) {

    $.ajax({
      type: "POST",
      url: action,
      data: data,
      timeout: 40000,
      beforeSend: function(xhr) {
        $('.button-submit').toggleClass('d-none');
        $('.loading-submit').toggleClass('d-none');
        $('.alert-div').removeClass('alert-danger')
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
        window.location.href = data.data.to;
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