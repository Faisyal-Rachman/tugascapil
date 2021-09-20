<div id="notificator" class="alert"></div>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap-confirmation.min.js') ?>"></script>
<script src="<?= base_url('assets/bootstrap-select-1.12.1/js/bootstrap-select.min.js') ?>"></script>
<script src="<?= base_url('assets/js/placeholders.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap-datepicker.min.js') ?>"></script>
<script>
var variable = {
    clearShoppingCartUrl: "<?= base_url('clearShoppingCart') ?>",
    manageShoppingCartUrl: "<?= base_url('manageShoppingCart') ?>",
    discountCodeChecker: "<?= base_url('discountCodeChecker') ?>"
};
</script>
<script src="<?= base_url('assets/js/system.js') ?>"></script>
<script src="<?= base_url('templatejs/mine.js') ?>"></script>
<script>
    
    $("#provinsi").change(function(){

// variabel dari nilai combo box kendaraan
var id = $("#provinsi").val();

// Menggunakan ajax untuk mengirim dan dan menerima data dari server
$.ajax({
    url : "<?php echo base_url();?>listkota",
    method : "POST",
    data : {id:id},
    async : false,
    dataType : 'json',
    success: function(data){
    
        var html = '';
        var i;

        for(i=0; i<data.length; i++){
            html += '<option value='+data[i].id+'>'+data[i].name_kota+'</option>';
        }
      
        $('#merk').html(html);

    }
});
});

  </script>
</body>
</html>