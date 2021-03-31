<div class='modal-body' id="test">
	<input type="hidden" name="idkirim" id="idkirim" value="<?= $id ?>">
	Apakah Anda yakin akan memvalidasi data <strong>'<?= $nama ?>'</strong> ?
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
            url : "Validasi/valid",
            data : {id :xid},
            success : function(data){
                if(data.length > 0){
                    $("#tbvalid"+xid).removeClass('bg-warning');
                    $("#tbvalid"+xid).addClass('bg-success');
                    $("#tbvalid"+xid).attr('data-title','Batalkan Validasi');
                    $("#tbvalid"+xid).attr('title','Batalkan Validasi');
                    document.getElementById('tbvalid'+xid).innerHTML = "batal";
                    $("#tbvalid"+xid).attr('href','validasi/unvalid/'+xid);
                    $("#gbvalid"+xid).attr('src','assets/images/sign-check.png');
                    $("#tombolkembali").click();
                }
            }
		})
	})
</script>