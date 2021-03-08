<div class="container">
	<div id="detailnya">
		<div class="row">
			<div class="col-sm-2">
				<img src="<?= base_url().'assets/images/gambar.png' ?>" style="width: 100px !important;">
			</div>
			<div class="col-sm-10 font-tebal" >
				<h4 class="mb-0 mt-2">PT. Indoneptune Net Manufacturing</h4>
				<h6>Factory</h6>
			</div>
		</div>
		<hr class="small mt-2">
		<div id="detailnyadetail">
			<div class="form-group row mb-0 warnahitam" style="height: 30px;">
                <label for="inputEmail3" class="col-sm-5 col-form-label-sm font-tebal"><?= namabulan($this->session->flashdata('bulanperiode')).' '.$this->session->flashdata('tahunperiode').' '.$this->session->flashdata('kodepayroll') ?></label>
                <div class="col-sm-7">
                    <span><?= date('d-m-Y') ?></span>
                </div>
            </div>
			<div class="form-group row mb-0 warnahitam" style="height: 20px;">
                <label for="inputEmail3" class="col-sm-5 col-form-label-sm">Nama</label>
                <div class="col-sm-7">
                    <span><?= $nama ?></span>
                </div>
            </div>
            <div class="form-group row mb-0 warnahitam" style="height: 20px;">
                <label for="inputEmail3" class="col-sm-5 col-form-label-sm">Beneficiary Bank</label>
                <div class="col-sm-7">
                    <span><?= $bank.'-'.$bankadr ?></span>
                </div>
            </div>
            <div class="form-group row mb-0 warnahitam" style="height: 20px;">
                <label for="inputEmail3" class="col-sm-5 col-form-label-sm">Nomor Rekening</label>
                <div class="col-sm-7">
                    <span><?= $norek ?></span>
                </div>
            </div>
            <div class="form-group row mb-3 warnahitam" style="height: 20px;">
                <label for="inputEmail3" class="col-sm-5 col-form-label-sm">Atas nama</label>
                <div class="col-sm-7">
                    <span><?= $rekname ?></span>
                </div>
            </div>
			<div class="form-group row mb-0 warnahitam" style="height: 20px;">
                <label for="inputEmail3" class="col-sm-5 col-form-label-sm">Gaji Pokok</label>
                <div class="col-sm-1">Rp.</div>
                <div class="col-sm-4" style="text-align: right;">
                    <span><?= rupiah($gaji,0) ?></span>
                </div>
            </div>
			<div class="form-group row mb-0 warnahitam" style="height: 20px;">
                <label for="inputEmail3" class="col-sm-5 col-form-label-sm">Tunjangan Jabatan</label>
                <div class="col-sm-1">Rp.</div>
                <div class="col-sm-4" style="text-align: right;">
                    <span><?= rupiah($tunjab,0) ?></span>
                </div>
            </div>
			<div class="form-group row mb-0 warnahitam" style="height: 20px;">
                <label for="inputEmail3" class="col-sm-5 col-form-label-sm">Tunjangan Skill</label>
                <div class="col-sm-1">Rp.</div>
                <div class="col-sm-4" style="text-align: right;">
                    <span><?= rupiah($tunskill,0) ?></span>
                </div>
            </div>
			<hr class="small mt-2 mb-0" style="margin-left: 200px;">
			<div class="form-group row mb-3 warnahitam" style="height: 20px;">
                <label for="inputEmail3" class="col-sm-5 col-form-label-sm">Gaji Kotor</label>
                <div class="col-sm-1">Rp.</div>
                <div class="col-sm-4" style="text-align: right;">
                    <span><?= rupiah($gaji+$tunjab+$tunskill,0) ?></span>
                </div>
            </div>
			<div class="form-group row mb-0 warnahitam" style="height: 20px;">
                <label for="inputEmail3" class="col-sm-5 col-form-label-sm">Astek</label>
                <div class="col-sm-1">Rp.</div>
                <div class="col-sm-4" style="text-align: right;">
                    <span><?= rupiah($astek,0) ?></span>
                </div>
            </div>
			<div class="form-group row mb-0 warnahitam" style="height: 20px;">
                <label for="inputEmail3" class="col-sm-5 col-form-label-sm">Jaminan Pensiun</label>
                <div class="col-sm-1">Rp.</div>
                <div class="col-sm-4" style="text-align: right;">
                    <span><?= rupiah($jp,0) ?></span>
                </div>
            </div>
			<div class="form-group row mb-0 warnahitam" style="height: 20px;">
                <label for="inputEmail3" class="col-sm-5 col-form-label-sm">Biaya Jabatan</label>
                <div class="col-sm-1">Rp.</div>
                <div class="col-sm-4" style="text-align: right;">
                    <span><?= rupiah($bijab,0) ?></span>
                </div>
            </div>
			<div class="form-group row mb-0 warnahitam" style="height: 20px;">
                <label for="inputEmail3" class="col-sm-5 col-form-label-sm">Penghasilan tidak kena Pajak (PTKP)</label>
                <div class="col-sm-1">Rp.</div>
                <div class="col-sm-4" style="text-align: right;">
                    <span><?= rupiah($ptkp,0) ?></span>
                </div>
            </div>
			<div class="form-group row mb-0 warnahitam" style="height: 20px;">
                <label for="inputEmail3" class="col-sm-5 col-form-label-sm">Penghasilan Kena Pajak (PKP)</label>
                <div class="col-sm-1">Rp.</div>
                <div class="col-sm-4" style="text-align: right;">
                    <span><?= rupiah($pkp,0) ?></span>
                </div>
            </div>
            <div class="form-group row mb-3 warnahitam" style="height: 20px;">
                <label for="inputEmail3" class="col-sm-5 col-form-label-sm">Pph 21</label>
                <div class="col-sm-1">Rp.</div>
                <div class="col-sm-4" style="text-align: right;">
                    <span><?= rupiah($pphmonth,0) ?></span>
                </div>
            </div>
			<div class="form-group row mb-0 warnahitam" style="height: 20px;">
                <label for="inputEmail3" class="col-sm-5 col-form-label-sm">Gaji Kotor</label>
                <div class="col-sm-1">Rp.</div>
                <div class="col-sm-4" style="text-align: right;">
                    <span>-</span>
                </div>
            </div>
            <div class="form-group row mb-0 warnahitam" style="height: 20px;">
                <label for="inputEmail3" class="col-sm-5 col-form-label-sm">Astek</label>
                <div class="col-sm-1">Rp.</div>
                <div class="col-sm-4" style="text-align: right;">
                    <span><?= rupiah($astek,0) ?></span>
                </div>
            </div>
            <div class="form-group row mb-0 warnahitam" style="height: 20px;">
                <label for="inputEmail3" class="col-sm-5 col-form-label-sm">Jaminan Pensiun</label>
                <div class="col-sm-1">Rp.</div>
                <div class="col-sm-4" style="text-align: right;">
                    <span><?= rupiah($jp,0) ?></span>
                </div>
            </div>
            <div class="form-group row mb-3 warnahitam" style="height: 20px;">
                <label for="inputEmail3" class="col-sm-5 col-form-label-sm">Pph 21</label>
                <div class="col-sm-1">Rp.</div>
                <div class="col-sm-4" style="text-align: right;">
                    <span><?= rupiah($pphmonth,0) ?></span>
                </div>
            </div>
            <div class="form-group row mb-0 warnahitam" style="height: 20px;">
                <label for="inputEmail3" class="col-sm-5 col-form-label-sm">Transport Allowance</label>
                <div class="col-sm-1">Rp.</div>
                <div class="col-sm-4" style="text-align: right;">
                    <span><?= rupiah($transport,0) ?></span>
                </div>
            </div>
            <div class="form-group row mb-0 warnahitam" style="height: 20px;">
                <label for="inputEmail3" class="col-sm-5 col-form-label-sm">Koperasi</label>
                <div class="col-sm-1">Rp.</div>
                <div class="col-sm-4" style="text-align: right;">
                    <span><?= rupiah($koperasi,0) ?></span>
                </div>
            </div>
            <hr class="small mt-2 mb-0" style="margin-left: 200px;">
            <div class="form-group row mb-0 warnahitam font-tebal" style="height: 20px;">
                <label for="inputEmail3" class="col-sm-5 col-form-label-sm">Take Home Pay</label>
                <div class="col-sm-1">Rp.</div>
                <div class="col-sm-4" style="text-align: right;">
                    <span><?= rupiah($realthp,0) ?></span>
                </div>
            </div>
			<hr class="small mt-4">
			<div style="text-align: right;">
				<a href="#" data-dismiss="modal" class="btn btn-danger btn-icon-split btn-sm flat font-kecil">
	                <span class="icon text-white-50">
	                    <i class="fas fa-arrow-left"></i>
	                </span>
	                <span class="text">Kembali</span>
	            </a>
        	</div>
		</div>
	</div>
</div>