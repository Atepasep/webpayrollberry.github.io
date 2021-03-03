<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card border-left-coklat shadow h-100 py-0 flat">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div>
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-3" style="float: left;">
                                    Payroll Management <?= APPPATH ?><?= namabulan($this->session->flashdata('bulanperiode')),' '.$this->session->flashdata('tahunperiode') ?>
                                </div>
                                <div style="float: right;">
                                    <div class="form-inline">
                                        <select class="form-control small flat kecil mr-1 font-kecil hitam" id="kodepayroll" name="kodepayroll">
                                            <?= $k = $this->session->flashdata('kodepayroll'); ?>
                                            <option <?php if($k=='SALARY'){ echo "selected";} ?>>SALARY</option>
                                            <option <?php if($k=='THR'){ echo "selected";} ?>>THR</option>
                                            <option <?php if($k=='BONUS'){ echo "selected";} ?>>Bonus</option>
                                        </select>
                                        <select class="form-control small flat kecil mr-1 font-kecil hitam" id="bulanperiode" name="bulanperiode">
                                            <?= $l = $this->session->flashdata('bulanperiode'); ?>
                                            <option <?php if($l==1){ echo "selected";} ?>>Januari</option>
                                            <option <?php if($l==2){ echo "selected";} ?>>Februari</option>
                                            <option <?php if($l==3){ echo "selected";} ?>>Maret</option>
                                            <option <?php if($l==4){ echo "selected";} ?>>April</option>
                                            <option <?php if($l==5){ echo "selected";} ?>>Mei</option>
                                            <option <?php if($l==6){ echo "selected";} ?>>Juni</option>
                                            <option <?php if($l==7){ echo "selected";} ?>>Juli</option>
                                            <option <?php if($l==8){ echo "selected";} ?>>Agustus</option>
                                            <option <?php if($l==9){ echo "selected";} ?>>September</option>
                                            <option <?php if($l==10){ echo "selected";} ?>>Oktoberr</option>
                                            <option <?php if($l==10){ echo "selected";} ?>>Nopember</option>
                                            <option <?php if($l==10){ echo "selected";} ?>>Desember</option>
                                        </select>
                                        <input type="text" class="form-control small flat kecil font-kecil mr-2" style="width: 60px;" name="tahunperiode" id="tahunperiode" value="<?= $this->session->flashdata('tahunperiode') ?>">
                                        <a href="<?= base_url().'payroll/prosespayroll' ?>" class="btn btn-success btn-icon-split btn-sm flat font-kecil" id="xprosespayroll">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                            <span class="text">Proses</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <hr class="small mb-1" style="clear: both;">
                            <div class="row" style="clear: both;">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered dt-responsive datatable table-hover" id="tabelku" width="100%" cellspacing="0">
                                            <thead class="bg-secondary text-light">
                                                <tr>
                                                    <th>NIK</th>
                                                    <th>Nama</th>
                                                    <th>Bagian</th>
                                                    <th>Jabatan</th>
                                                    <th>Gaji Pokok</th>
                                                    <th>Tunj Jabatan</th>
                                                    <th>Tunj Skill</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>NIK</th>
                                                    <th>Nama</th>
                                                    <th>Bagian</th>
                                                    <th>Jabatan</th>
                                                    <th>Gaji Pokok</th>
                                                    <th>Tunj Jabatan</th>
                                                    <th>Tunj Skill</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </tfoot>
                                            <tbody id="data-tabelku">
                                                <?php foreach($datapayroll as $data){ ?>
                                                    <tr>
                                                        <td><?= $data['noinduk'] ?></td>
                                                        <td><?= $data['nama'] ?></td>
                                                        <td><?= $data['bagian'] ?></td>
                                                        <td><?= $data['jabatan'] ?></td>
                                                        <td class="kanan"><?= rupiah($data['gaji'],0,',','.') ?></td>
                                                        <td class="kanan"><?= rupiah($data['tunjab'],0,',','.') ?></td>
                                                        <td class="kanan"><?= rupiah($data['tunskill'],0,',','.') ?></td>
                                                        <td style="text-align: center;">
                                                            <a href="<?= base_url().'mastergaji/addgaji/'.$data['id_karyawan'] ?>" title="edit gaji <?= $data['nama'] ?>"><img src="<?= base_url().'assets/images/edit.png' ?>"></a>
                                                            <a href="<?= base_url().'mastergaji/getview/'.$data['id_karyawan'] ?>" title="view gaji <?= $data['nama'] ?>" data-remote="false" data-toggle="modal" data-title="View History Gaji" data-target="#modalBox" ><img src="<?= base_url().'assets/images/view.png' ?>"></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
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