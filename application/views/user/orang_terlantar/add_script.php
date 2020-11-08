<script src="<?=base_url('assets/vendor/inputmask/jquery.inputmask.min.js')?>"></script>
<script>
  $(document).ready(function(){
    $(":input").inputmask();
    if($("#have_identitas").is(':checked')){
      $('.have_identitas').toggleClass('d-none');
    }
    if($('#orang_terlantar').val() == 2){
      $('.outsider').toggleClass('d-none');
    }
    $('#have_identitas').click(function(e){
      console.log($(this).val());
      $('.have_identitas').toggleClass('d-none');
    })
    $('#orang_terlantar').change(function(e){
      var val = $(this).val();
      if(val == 2){
        $('.outsider').toggleClass('d-none');
      }else{
        $('.outsider').addClass('d-none');
      }
    })
  })
</script>