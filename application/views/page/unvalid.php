<div class='modal-body' id="test">
	<input type="hidden" name="idkirim" id="idkirim" value="<?= $id ?>">
	Apakah Anda yakin akan membatalkan validasi data <strong>'<?= $nama ?>'</strong> ?
</div>
<div class='modal-footer'>
    <a href="#" class="btn-ok btn btn-success btn-icon-split btn-sm flat font-kecil" id="yaxkirim">
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
	$("#yaxkirim").on('click',function(){
		var xid = $("#idkirim").val();
		$.ajax({
            dataType : 'json',
            type : "POST",
            url : "validasi/unvalidoke",
            data : {id :xid},
            success : function(data){
                if(data.length > 0){
                    $("#tbvalid"+xid).removeClass('bg-success');
                    $("#tbvalid"+xid).addClass('bg-warning');
                    $("#tbvalid"+xid).attr('data-title','Validasi data');
                    $("#tbvalid"+xid).attr('title','Validasi data');
                    document.getElementById('tbvalid'+xid).innerHTML = "validasi";
                    $("#tbvalid"+xid).attr('href','validasi/validoke/'+xid);
                    $("#gbvalid"+xid).attr('src','assets/images/sign-error.png');
                    $("#tombolkembali").click();
                }
            }
		})
	})
</script>