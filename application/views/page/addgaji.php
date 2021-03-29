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
                                $idpersonil = $personil['id'];
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
                                    History :
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
                                <div class="col-sm-6">
                                    <form method="POST" action="<?= $urlnya; ?>" name="formgaji" id="formgaji">
                                        <input type="text" name="id_karyawan" id="id_karyawan" class="hidden hilang" value="<?= $idpersonil ?>">
                                        <div class="form-group row mb-0">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label-sm">Gaji Asal</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm flat warnahitam kanan" name="xgaji" id="xgaji" value="<?= rupiah($gapok,0) ?>" readonly>
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 col-form-label-sm">Gaji Sekarang</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm flat warnahitam kanan" name="gaji" id="gaji" value="">
                                                <div class="invalid-feedback">
                                                    gaji tidak boleh kosong
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label-sm">T.Jab Asal</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm flat warnahitam kanan" name="xtunjab" id="xtunjab" value="<?= rupiah($tunjab,0) ?>" readonly>
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 col-form-label-sm">T.Jab Sekarang</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm flat warnahitam kanan" name="tunjab" id="tunjab" value="" onkeypress="format_num(id)">
                                                <div class="invalid-feedback">
                                                    Tunjangan jabatan tidak boleh kosong
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label-sm">T.Skill Asal</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm flat warnahitam kanan" name="xtunskill" id="xtunskill" value="<?= rupiah($tunskill,0) ?>" readonly>
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 col-form-label-sm">T.Skill Sekarang</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm flat warnahitam kanan" name="tunskill" id="tunskill" value="">
                                                <div class="invalid-feedback">
                                                   Tunjangan skill tidak boleh kosong
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <hr class="small">
                                     <div class="form-group row mb-0">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label-sm warnahitam">Total (Gaji Kotor)</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control form-control-sm flat warnahitam kanan" name="gakot" id="gakot" value="" readonly>
                                            </div>
                                    </div>
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