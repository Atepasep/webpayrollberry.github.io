<div class="container-fluid" style="margin-top: 10px;">
    <input type="hidden" name="id" id="id" value="<?= $id ?>">
	<div class="row font-kecil">
	    <div class="col-sm-12">
	    	<div class="form-group row mb-0">
	            <label for="inputEmail3" class="col-sm-2 col-form-label-sm">Kode Group</label>
	            <div class="col-sm-10">
	                <input type="text" class="form-control form-control-sm flat warnahitam" name="kode_grp" id="kode_grp">
	            </div>
	        </div>
	        <div class="form-group row mb-0">
	            <label for="inputEmail3" class="col-sm-2 col-form-label-sm">Nama Group</label>
	            <div class="col-sm-10">
	                <input type="text" class="form-control form-control-sm flat warnahitam" name="grp" id="grp">
	            </div>
	        </div>
	    </div>
	</div>
	<hr class="small">
	<div style="text-align: right;margin-bottom: 10px;">
        <a href="#" class="btn btn-success btn-icon-split btn-sm flat font-kecil" id="simpangroup">
            <span class="icon text-white-50">
                <i class="fas fa-check"></i>
            </span>
            <span class="text">Simpan</span>
        </a>
        <a href="#" data-dismiss="modal" class="btn btn-danger btn-icon-split btn-sm flat font-kecil" id="kembaliform">
            <span class="icon text-white-50">
                <i class="fas fa-arrow-circle-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
    </div>
</div>
<script type="text/javascript">
    $("#simpangroup").on('click',function(){
        var idx = $("#id").val();
        var kodex = $("#kode_grp").val();
        var namax = $("#grp").val();
        $.ajax({
            dataType : 'json',
            type : "POST",
            url : "bagian/simpangroup",
            data : {id : idx,kode : kodex, nama : namax},
            success : function(data){
                pesan('info','Data berhasil disimpan');
                $("#data-tabelku tr.aktif").click();
                $("#kembaliform").click();
            }
        })
    })
</script>
