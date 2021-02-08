<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card border-left-coklat shadow h-100 py-0 flat">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-3">
                                Tambah/Update Data Gaji Personil
                            </div>
                            <hr class="small mb-1">
                            <?php foreach($datapersonil as $personil){
                                $namapersonil = $personil['nama'];
                                $noindukpersonil = $personil['noinduk'];
                                $bagianpersoni = $personil['xbagian'];
                                $jabatanpersonil = $personil['xjabatan'];
                            } ?>
                            <?php $gapok=0;$tunjab=0;$tunskill=0; foreach($gajisekarang as $gaji){
                                $gapok = $gaji['gaji'];
                                $tunjab = $gaji['tunjab'];
                                $tunskill = $gaji['tunskill'];
                            } ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row mb-0">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label-sm">Noinduk</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control form-control-sm flat warnahitam" name="noinduk" id="noinduk" value="<?= $noindukpersonil ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label-sm">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control form-control-sm flat warnahitam" name="nama" id="nama" value="<?= $namapersonil ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label-sm">Bagian</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control form-control-sm flat warnahitam" name="bagian" id="bagian" value="<?= $bagianpersoni ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label-sm">Jabatan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control form-control-sm flat warnahitam" name="nama" id="nama" value="<?= $jabatanpersonil ?>">
                                        </div>
                                    </div>
                                    <hr class="small">
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
                                                <tr>
                                                    <td>1</td>
                                                    <td style="text-align: right;"><?= rupiah(100000,0) ?></td>
                                                    <td style="text-align: right;"><?= rupiah(100000,0) ?></td>
                                                    <td style="text-align: right;"><?= rupiah(100000,0) ?></td>
                                                    <td>20-12-2020</td>
                                                    <td>Sekarang</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <form method="POST" action="" name="formgaji" id="formgaji">
                                        <div class="form-group row mb-0">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label-sm">Gaji Asal</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm flat warnahitam kanan" name="noinduk" id="noinduk" value="<?= rupiah($gapok,0) ?>" readonly>
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 col-form-label-sm">Gaji Sekarang</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm flat warnahitam kanan" name="noinduk" id="noinduk" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label-sm">T.Jab Asal</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm flat warnahitam kanan" name="noinduk" id="noinduk" value="<?= rupiah($tunjab,0) ?>" readonly>
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 col-form-label-sm">T.Jab Sekarang</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm flat warnahitam kanan" name="noinduk" id="noinduk" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label-sm">T.Skill Asal</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm flat warnahitam kanan" name="noinduk" id="noinduk" value="<?= rupiah($tunskill,0) ?>" readonly>
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 col-form-label-sm">T.Skill Sekarang</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm flat warnahitam kanan" name="noinduk" id="noinduk" value="">
                                            </div>
                                        </div>
                                    </form>
                                    <hr class="small">
                                    <div style="text-align: right;">
                                        <a href="#" class="btn btn-success btn-icon-split btn-sm flat font-kecil" id="savegaji">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-save"></i>
                                            </span>
                                            <span class="text">Simpan</span>
                                        </a>
                                        <a href="<?= base_url().'mastergaji' ?>" class="btn btn-danger btn-icon-split btn-sm flat font-kecil" id="kembalikemastergaji">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-circle-left"></i>
                                            </span>
                                            <span class="text">Kembali</span>
                                        </a>
                                    </div>
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