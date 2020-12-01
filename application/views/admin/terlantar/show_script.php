<script>
  $(document).ready(function(){
    $(":input").inputmask();
    var val = $('#sumber_dana_id').val();
    if(val != 0 && val != ""){
      $('.bansos_id').toggleClass('d-none');
      $('.sumber_dana_lainnya').addClass('d-none');
      var bansoss = <?= json_encode($_bansoss)?>;
      bansoss = bansoss.filter(function(bansos){
        return bansos.sumber_dana_id == val;
      });
      var html = "<option value=''>Pilih Bantuan Sosial</option>";
      var bansos_id = "<?=$_terlantar['bansos_id']?>";
      bansoss.forEach((item,index) => {
        var selected = "";
        if(item.bansos_id == bansos_id){
          selected = "selected"
        }
        html = html +"<option value='"+item.bansos_id+"' "+selected+">"+item.bansos_nama+" "+formatRupiah(item.bansos_total,"Rp.")+"</option>";
      })
      $('#bansos_id').html(html)
    }
    if(val == 0 && val != ""){
      $('.sumber_dana_lainnya').removeClass('d-none');
    }
    $('#sumber_dana_id').change(function(e){
      var val = $(this).val();
      if(val != 0 && val != ""){
        var bansoss = <?= json_encode($_bansoss)?>;
        $('.bansos_id').removeClass('d-none');
        $('.sumber_dana_lainnya').addClass('d-none');
        bansoss = bansoss.filter(function(bansos){
          return bansos.sumber_dana_id == val;
        });
        var html = "<option value=''>Pilih Bantuan Sosial</option>";
        bansoss.forEach((item,index) => {
          html = html +"<option value='"+item.bansos_id+"'>"+item.bansos_nama+" "+formatRupiah(item.bansos_total,"Rp.")+"</option>";
        })
        $('#bansos_id').html(html)
      }else{
        $('.bansos_id').addClass('d-none');
      }
      if(val == ""){
        $('.sumber_dana_lainnya').addClass('d-none');
      }
      if(val == 0 && val != ""){
        $('.sumber_dana_lainnya').removeClass('d-none');
      }
    })
  })
</script>