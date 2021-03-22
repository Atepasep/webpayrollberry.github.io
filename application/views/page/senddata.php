<div class='modal-body' id="test">
	<input type="hidden" name="idkirim" id="idkirim" value="<?= $id ?>">
	Apakah Anda yakin akan mengirim data <strong>'<?= $nama ?>'</strong> untuk di Validasi ?
</div>
<div class='modal-footer'>
    <a href="#" class="btn-ok btn btn-success btn-icon-split btn-sm flat font-kecil" id="yakirim">
        <span class="icon text-white-50">
            <i class="fas fa-check"></i>
        </span>
        <span class="text">Ya</span>
    </a>
    <a href="#" class="btn btn-danger btn-icon-split btn-sm flat font-kecil"data-dismiss="modal" id="tombolkembali">
        <span class="icon text-white-50">
            <i class="fas fa-times"></i>
        </span>
        <span class="text">Tidak</span>
    </a>
</div>
<script type="text/javascript">
	$("#yakirim").on('click',function(){
		var xid = $("#idkirim").val();
		$.ajax({
            dataType : 'json',
            type : "POST",
            url : "payroll/senddataok",
            data : {id :xid},
            success : function(data){
                if(data.length > 0){
                    $("#tb1gambar"+xid).addClass('hilang');
                    $("#tb2gambar"+xid).addClass('hilang');
                    $("#tb3gambar"+xid).removeClass('hilang');
                    $("#tombolkembali").click();
                }
            }
		})
	})
</script>