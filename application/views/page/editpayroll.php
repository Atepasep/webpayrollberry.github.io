<div class="container-fluid" style="margin-top: 10px;">
	<div class="row">
	    <div class="col-sm-12">
	    	<div class="form-group row mb-0">
	            <label for="inputEmail3" class="col-sm-2 col-form-label-sm">Noinduk</label>
	            <div class="col-sm-10">
	                <input type="text" class="form-control form-control-sm flat warnahitam" name="noinduk" id="noinduk" value="<?= $noinduk ?>">
	            </div>
	        </div>
	        <div class="form-group row mb-0">
	            <label for="inputEmail3" class="col-sm-2 col-form-label-sm">Nama</label>
	            <div class="col-sm-10">
	                <input type="text" class="form-control form-control-sm flat warnahitam" name="noinduk" id="noinduk" value="<?= $nama ?>">
	            </div>
	        </div>
	        <div class="form-group row mb-0">
	            <label for="inputEmail3" class="col-sm-2 col-form-label-sm">Bagian</label>
	            <div class="col-sm-10">
	                <input type="text" class="form-control form-control-sm flat warnahitam" name="noinduk" id="noinduk" value="<?= $bagian ?>">
	            </div>
	        </div>
	        <div class="form-group row mb-0">
	            <label for="inputEmail3" class="col-sm-2 col-form-label-sm">Jabatan</label>
	            <div class="col-sm-10">
	                <input type="text" class="form-control form-control-sm flat warnahitam" name="noinduk" id="noinduk" value="<?= $jabatan ?>">
	            </div>
	        </div>
            <hr class="small">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-4 col-form-label-sm">Basic Salary</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm flat warnahitam" style="text-align: right;" name="gaji" id="gaji" value="<?= rupiah($gaji,0,',','.') ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-4 col-form-label-sm">Pos Allowance</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm flat warnahitam" style="text-align: right;" name="tunjab" id="tunjab" value="<?= rupiah($tunjab,0,',','.') ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-4 col-form-label-sm">Skill Allowance</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm flat warnahitam" style="text-align: right;" name="tunskill" id="tunskill" value="<?= rupiah($tunskill,0,',','.') ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-4 col-form-label-sm">Gross</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm flat warnahitam" style="text-align: right;" name="gross" id="gross" value="<?= rupiah($gaji+$tunjab+$tunskill,0,',','.') ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="small">
            <div class="row">
                <div class="col-sm-6">X</div>
                <div class="col-sm-6">Y</div>
            </div>
	    </div>
	</div>
	<hr class="small">
	<div style="text-align: right;margin-bottom: 10px;">
        <a href="#" data-dismiss="modal" class="btn btn-danger btn-icon-split btn-sm flat font-kecil">
            <span class="icon text-white-50">
                <i class="fas fa-arrow-circle-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
    </div>
</div>