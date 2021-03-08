<div class="container">
	<div id="detailnya">
		<div class="form-inline">
			<img src="<?= base_url().'assets/images/gambar.png' ?>" style="width: 100px auto;">
			<div class="ml-sm-5">
				<h4>PT. Indoneptune Net Manufacturing</h4>
				<h5>Factory</h5>
			</div>
		</div>
		<hr class="small">
		<div id="detailnyadetail">
			<div class="form-inline">
				<label class="justify-content-start mr-sm-2" style="font-weight: bold;">Periode : <?= namabulan($this->session->flashdata('bulanperiode')).' '.$this->session->flashdata('tahunperiode') ?></label>
			</div>
			<div class="form-inline">
				<label class="justify-content-start mr-sm-2">Name</label>
				:
				<div class="ml-sm-4">
					<?= $nama ?>
				</div>
			</div>
			<br>
			<hr class="small">
			<div class="form-inline">
				<label class="justify-content-start mr-sm-2">Gaji Pokok</label>
				Rp.
				<div style="text-align: right; width: 150px !important;">
					<?= rupiah($gaji,0) ?>
				</div>
			</div>
			<div class="form-inline">
				<label class="justify-content-start mr-sm-2">Tunjangan Jabatan</label>
				Rp.
				<div style="text-align: right; width: 150px !important;">
					<?= rupiah($tunjab,0) ?>
				</div>
			</div>
			<div class="form-inline">
				<label class="justify-content-start mr-sm-2">Tunjangan Skill</label>
				Rp.
				<div style="text-align: right; width: 150px !important;">
					<?= rupiah($tunskill,0) ?>
				</div>
			</div>
			<hr class="small" style="margin-left: 200px; border:1px solid red;">
			<div class="form-inline">
				<label class="justify-content-start mr-sm-2">Gaji Kotor</label>
				Rp.
				<div style="text-align: right; width: 225px !important;">
					<?= rupiah($gaji+$tunjab+$tunskill,0) ?>
				</div>
			</div>
			<hr class="small">
			<div class="form-inline">
				<label class="justify-content-start mr-sm-2">Jaminan Pensiun</label>
				Rp.
				<div style="text-align: right; width: 150px !important;">
					<?= rupiah($jp,0) ?>
				</div>
			</div>
			<div class="form-inline">
				<label class="justify-content-start mr-sm-2">Biaya Jabatan</label>
				Rp.
				<div style="text-align: right; width: 150px !important;">
					<?= rupiah($bijab,0) ?>
				</div>
			</div>
			<div class="form-inline">
				<label class="justify-content-start mr-sm-2">PTKP</label>
				Rp.
				<div style="text-align: right; width: 150px !important;">
					<?= rupiah($ptkp,0) ?>
				</div>
			</div>
			<div class="form-inline">
				<label class="justify-content-start mr-sm-2">PKP</label>
				Rp.
				<div style="text-align: right; width: 150px !important;">
					<?= rupiah($pkp,0) ?>
				</div>
			</div>
			<div class="form-inline">
				<label class="justify-content-start mr-sm-2">PPh 21</label>
				Rp.
				<div style="text-align: right; width: 150px !important;">
					<?= rupiah($pphmonth,0) ?>
				</div>
			</div>
			<div class="form-inline">
				<label class="justify-content-start mr-sm-2">Gaji Kotor</label>
				Rp.
				<div style="text-align: right; width: 150px !important;">
					<?= rupiah($thp,0) ?>
				</div>
			</div>
			<hr class="small">
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
</div>