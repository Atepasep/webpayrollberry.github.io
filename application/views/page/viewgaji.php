<div class="container-fluid" style="margin-top: 10px;">
	<div class="row font-kecil">
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
	                <input type="text" class="form-control form-control-sm flat warnahitam" name="noinduk" id="noinduk" value="<?= $xbagian ?>">
	            </div>
	        </div>
	        <div class="form-group row mb-0">
	            <label for="inputEmail3" class="col-sm-2 col-form-label-sm">Jabatan</label>
	            <div class="col-sm-10">
	                <input type="text" class="form-control form-control-sm flat warnahitam" name="noinduk" id="noinduk" value="<?= $xjabatan ?>">
	            </div>
	        </div>
	        <div class="table-responsive">
                <table class="table table-bordered" id="tabelku">
                    <thead class="bg-secondary text-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Gaji</th>
                            <th scope="col">Tunj Jabatan</th>
                            <th scope="col">Tunj Skill</th>
                            <th scope="col">Dari</th>
                            <th scope="col">Sampai</th>
                        </tr>
                    </thead>
                    <tbody id="data-tabelku">
                        <?php $no=0; foreach($listgaji as $list){ $no++; $sampai = is_null($list['sampai']) ? "Sekarang" : tglmysql($list['sampai']); ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td class="kanan"><?= rupiah($list['gaji'],0); ?></td>
                                <td class="kanan"><?= rupiah($list['tunjab'],0); ?></td>
                                <td class="kanan"><?= rupiah($list['tunskill'],0); ?></td>
                                <td><?= tglmysql($list['dari']); ?></td>
                                <td><?= $sampai ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
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