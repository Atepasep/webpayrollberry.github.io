<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card border-left-coklat shadow h-100 py-0 flat">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div>
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-3" style="float: left;">
                                    Payroll Management <?= namabulan($this->session->flashdata('bulanperiode')),' '.$this->session->flashdata('tahunperiode').$this->session->flashdata('kodepayroll').$this->session->flashdata('bulanperiode') ?>
                                </div>
                                <div style="float: right;">
                                    <div class="form-inline">
                                        <select class="form-control small flat kecil mr-1 font-kecil hitam" id="kodepayroll" name="kodepayroll">
                                            <?= $k = $this->session->flashdata('kodepayroll'); ?>
                                            <option <?php if($k=='SALARY'){ echo "selected";} ?>>SALARY</option>
                                            <option <?php if($k=='THR'){ echo "selected";} ?>>THR</option>
                                            <option <?php if($k=='BONUS'){ echo "selected";} ?>>BONUS</option>
                                        </select>
                                        <select class="form-control small flat kecil mr-1 font-kecil hitam <?php if($this->session->flashdata('kodepayroll')!='SALARY'){echo "hilang";} ?>" id="bulanperiode" name="bulanperiode">
                                            <?= $l = $this->session->flashdata('bulanperiode'); ?>
                                            <option <?php if($l==1){ echo "selected";} ?> value="01">Januari</option>
                                            <option <?php if($l==2){ echo "selected";} ?> value="02">Februari</option>
                                            <option <?php if($l==3){ echo "selected";} ?> value="03">Maret</option>
                                            <option <?php if($l==4){ echo "selected";} ?> value="04">April</option>
                                            <option <?php if($l==5){ echo "selected";} ?> value="05">Mei</option>
                                            <option <?php if($l==6){ echo "selected";} ?> value="06">Juni</option>
                                            <option <?php if($l==7){ echo "selected";} ?> value="07">Juli</option>
                                            <option <?php if($l==8){ echo "selected";} ?> value="08">Agustus</option>
                                            <option <?php if($l==9){ echo "selected";} ?> value="09">September</option>
                                            <option <?php if($l==10){ echo "selected";} ?> value="10">Oktober</option>
                                            <option <?php if($l==10){ echo "selected";} ?> value="11">Nopember</option>
                                            <option <?php if($l==10){ echo "selected";} ?> value="12">Desember</option>
                                        </select>
                                        <input type="text" class="form-control small flat kecil font-kecil mr-2" style="width: 60px;" name="tahunperiode" id="tahunperiode" value="<?= $this->session->flashdata('tahunperiode') ?>">
                                        <?php if($count > 0){ ?>
                                            <a href="<?= base_url().'payroll/prosespayroll/1' ?>" class="btn btn-danger btn-icon-split btn-sm flat font-kecil" id="resetpayroll">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-sync-alt"></i>
                                                </span>
                                                <span class="text kode">Reset</span>
                                            </a>
                                            <a href="<?= base_url().'payroll/prosespayroll/2' ?>" class="btn btn-secondary btn-icon-split btn-sm flat font-kecil ml-1" id="resetpayroll">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-paper-plane"></i>
                                                </span>
                                                <span class="text kode">Send</span>
                                            </a> 
                                        <?php }else{ ?>
                                            <a href="<?= base_url().'payroll/prosespayroll' ?>" class="btn btn-success btn-icon-split btn-sm flat font-kecil" id="xprosespayroll">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                                <span class="text kode">Proses</span>
                                            </a>
                                        <?php } ?>
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
                                                    <th data-priority="1">NIK</th>
                                                    <th data-priority="2">Nama</th>
                                                    <th data-priority="3" style="width: 10px;">HG</th>
                                                    <th data-priority="4" style="width: 10px;">MH</th>
                                                    <th data-priority="5">Loc</th>
                                                    <th data-priority="6">Position</th>
                                                    <th>Basic Salary</th>
                                                    <th>Pos Allowance</th>
                                                    <th>Skill Allowance</th>
                                                    <th data-priority="5">Gross Salary</th>
                                                    <th>Other</th>
                                                    <th>Stat</th>
                                                    <th>Astek</th>
                                                    <th>Jp</th>
                                                    <th>Meal</th>
                                                    <th>Transport</th>
                                                    <th>Koperasi</th>
                                                    <th>thp</th>
                                                    <th>Loan</th>
                                                    <th>BPJS</th>
                                                    <th>Real Thp</th>
                                                    <th>Biaya bank</th>
                                                    <th data-priority="7">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>NIK</th>
                                                    <th>Nama</th>
                                                    <th>HG</th>
                                                    <th>MH</th>
                                                    <th>Loc</th>
                                                    <th>Position</th>
                                                    <th>Basic Salary</th>
                                                    <th>Pos Allowance</th>
                                                    <th>Skill Allowance</th>
                                                    <th>Gross Salary</th>
                                                    <th>Other</th>
                                                    <th>Stat</th>
                                                    <th>Astek</th>
                                                    <th>Jp</th>
                                                    <th>Meal</th>
                                                    <th>Transport</th>
                                                    <th>Koperasi</th>
                                                    <th>thp</th>
                                                    <th>Loan</th>
                                                    <th>BPJS</th>
                                                    <th>Real Thp</th>
                                                    <th>Biaya bank</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </tfoot>
                                            <tbody id="data-tabelku">
                                                <?php foreach($datapayroll as $data){ ?>
                                                    <tr>
                                                        <td><?= $data['noinduk'] ?></td>
                                                        <td><?= $data['nama'] ?></td>
                                                        <td style="text-align: center;"><img src="<?php if($data['hg']==1){ echo base_url().'assets/images/sign-check.png'; }else{ echo base_url().'assets/images/sign-error.png';} ?>"></td>
                                                        <td style="text-align: center;"><img src="<?php if($data['mh']==1){ echo base_url().'assets/images/sign-check.png'; }else{ echo base_url().'assets/images/sign-error.png';} ?>"></td>
                                                        <td><?= $data['bagian'] ?></td>
                                                        <td><?= $data['jabatan'] ?></td>
                                                        <td class="kanan"><?= rupiah($data['gaji'],0,',','.') ?></td>
                                                        <td class="kanan"><?= rupiah($data['tunjab'],0,',','.') ?></td>
                                                        <td class="kanan"><?= rupiah($data['tunskill'],0,',','.') ?></td>
                                                        <td class="kanan"><?= rupiah($data['gaji']+$data['tunjab']+$data['tunskill'],0,',','.') ?></td>
                                                        <td class="kanan"><?= rupiah($data['other'],0,',','.') ?></td>
                                                        <td class="kanan"><?= rupiah($data['other'],0,',','.') ?></td>
                                                        <td class="kanan"><?= rupiah($data['astek'],0,',','.') ?></td>
                                                        <td class="kanan"><?= rupiah($data['jp'],0,',','.') ?></td>
                                                        <td class="kanan"><?= rupiah($data['meal'],0,',','.') ?></td>
                                                        <td class="kanan"><?= rupiah($data['transport'],0,',','.') ?></td>
                                                        <td class="kanan"><?= rupiah($data['koperasi'],0,',','.') ?></td>
                                                        <td class="kanan"><?= rupiah($data['thp'],0,',','.') ?></td>
                                                        <td class="kanan"><?= rupiah($data['loan'],0,',','.') ?></td>
                                                        <td class="kanan"><?= rupiah($data['bpjs'],0,',','.') ?></td>
                                                        <td class="kanan"><?= rupiah($data['realthp'],0,',','.') ?></td>
                                                        <td class="kanan"><?= rupiah($data['biayabank'],0,',','.') ?></td>
                                                        <td style="text-align: center;">
                                                            <a href="<?= base_url().'mastergaji/getview/'.$data['id_karyawan'] ?>" title="Edit payroll <?= $data['nama'] ?>" data-remote="false" data-toggle="modal" data-title="Edit Payroll" data-target="#modalBox" ><img src="<?= base_url().'assets/images/pencil.png' ?>"></a>
                                                            <a href="<?= base_url().'mastergaji/getview/'.$data['id_karyawan'] ?>" title="Send for Validation" data-remote="false" data-toggle="modal" data-title="Send for Validation" data-target="#modalBox" ><img src="<?= base_url().'assets/images/paper-plane.png' ?>"></a>
                                                            <a href="<?= base_url().'mastergaji/getview/'.$data['id_karyawan'] ?>" title="View PDF" data-remote="false" data-toggle="modal" data-title="Send for Validation" data-target="#modalBox" ><img src="<?= base_url().'assets/images/file-pdf-icon.png' ?>"></a>
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