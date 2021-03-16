<div class='modal-body' id="test">
	<input type="hidden" name="idkirim" id="idkirim" value="<?= $id ?>">
	Apakah Anda yakin akan mengirim email ke <strong><?= $nama ?></strong> (<?= $email ?>) ?
</div>
<div class='modal-footer'>
    <div class="text-danger hilang" id="spinnya">
        <i class="fas fa-circle-notch fa-spin"></i> Loading, Silahkan tunggu
    </div>
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
        var rel = $("#idkirim").val();
        $("#spinnya").removeClass('hilang');
        $.ajax({
            dataType : 'json',
            type : "POST",
            url : "payroll/buatpdf",
            data : {id : rel},
            success : function(data){
                if(data==1){
                    $("#spinnya").addClass('hilang');
                    $("#tb5gambar"+rel).removeClass('hilang');
                    $("#tb4gambar"+rel).addClass('hilang');
                    pesan('info','kirim email berhasil');
                    $("#tombolkembali").click();
                }else{
                    pesan('danger',data);
                }
            }
        })
	})
</script>