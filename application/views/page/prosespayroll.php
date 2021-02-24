<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card border-left-coklat shadow h-100 py-0 flat">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div>
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-3">
                                    Proses Payroll Management <?= namabulan($this->session->flashdata('bulanperiode')),' '.$this->session->flashdata('tahunperiode') ?>
                                </div>
                            </div>
                            <hr class="small mb-1" style="clear: both;">
                            <div class="row" style="clear: both;">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                    <div class="form-group row" style="margin-bottom: 0px;">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label-sm">Kode</label>
                                        <div class="col-sm-9">
                                            <input type="hidden" name="code" id="code" value="<?= $kodepayroll ?>">
                                            <input type="text" class="form-control form-control-sm flat warnahitam" name="xcode" id="xcode" placeholder="codepayroll" value="<?= getkodepayroll($kodepayroll) ?>">
                                            <div class="invalid-feedback">
                                                Kode Payroll Harap Di Isi
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom: 0px;">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label-sm">Periode Bulan</label>
                                        <div class="col-sm-9">
                                            <input type="hidden" name="bulanperiode" id="bulanperiode" value="<?= $bulanperiode ?>">
                                            <input type="text" class="form-control form-control-sm flat warnahitam" name="xbulanperiode" id="xbulanperiode" placeholder="bulanpayroll" value="<?= namabulan($bulanperiode) ?>">
                                            <div class="invalid-feedback">
                                                Kode Payroll Harap Di Isi
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom: 0px;">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label-sm">Periode Tahun</label>
                                        <div class="col-sm-9">
                                            <input type="hidden" name="tahunperiode" id="tahunperiode" value="<?= $tahunperiode ?>">
                                            <input type="text" class="form-control form-control-sm flat warnahitam" name="tahunperiode" id="tahunperiode" placeholder="bulanpayroll" value="<?= $tahunperiode ?>">
                                            <div class="invalid-feedback">
                                                Kode Payroll Harap Di Isi
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="small">
                                    <div class="input-group">
                                        <input type="file" name="filetransport" id="filetransport" accept=".DBF" class="hilang">
                                        <input type="text" class="form-control form-control-sm bg-light flat warnahitam" id="filepathtransport" placeholder="File transport (DBF)"
                                            aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary btn-sm flat" id="carifiletransport" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="input-group mt-2">
                                        <input type="file" name="filekoperasi" id="filekoperasi" accept=".DBF" class="hilang">
                                        <input type="text" class="form-control form-control-sm bg-light flat warnahitam" id="filepathkoperasi" placeholder="File koperasi (DBF)"
                                            aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary btn-sm flat" id="carifilekoperasi" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <hr class="small mt-3">
                                    <div style="text-align: center;">
                                        <a href="#" class="btn btn-success btn-icon-split btn-sm flat font-kecil" id="prosespayroll">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-angle-double-down"></i>
                                            </span>
                                            <span class="text">Proses</span>
                                        </a>
                                        <a href="<?= base_url().'payroll' ?>" class="btn btn-danger btn-icon-split btn-sm flat font-kecil" id="prosespayroll">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-circle-left"></i>
                                            </span>
                                            <span class="text">Batal</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-3">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid