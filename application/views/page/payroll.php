<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card border-left-coklat shadow h-100 py-0 flat">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div>
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-3" style="float: left;">
                                    Payroll Management <?= namabulan($this->session->flashdata('bulanperiode')),' '.$this->session->flashdata('tahunperiode') ?>
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
                                            <a class="btn btn-secondary btn-icon-split btn-sm flat font-kecil ml-1" data-toggle="modal" data-target="#confirm-task" data-href="<?= base_url().'payroll/sendall' ?>" title="Send semua data" data-news="Apakah Anda yakin akan kirim semua data periode ini ?" style="cursor: pointer;">
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
                                                    <th data-priority="1">Ind</th>
                                                    <!-- <th data-priority="1">NIK</th> -->
                                                    <th data-priority="2">Nama</th>
                                                    <th data-priority="3" style="width: 10px;">H G</th>
                                                    <th data-priority="4" style="width: 10px;">M H</th>
                                                    <!-- <th data-priority="9">Loc</th> -->
                                                    <th data-priority="6">Position</th>
                                                    <th>Basic Salary</th>
                                                    <th>Pos Allowance</th>
                                                    <th>Skill Allowance</th>
                                                    <th data-priority="5">Gross Salary</th>
                                                    <th>Other</th>
                                                    <th>Astek</th>
                                                    <th>Jp</th>
                                                    <th>Pph Month</th>
                                                    <th>Meal</th>
                                                    <th>Transport</th>
                                                    <th>Koperasi</th>
                                                    <th data-priority="5">Thp</th>
                                                    <th>Loan</th>
                                                    <th>BPJS</th>
                                                    <th data-priority="8">Real Thp</th>
                                                    <th data-priority="7">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Ind</th>
                                                    <!-- <th>NIK</th> -->
                                                    <th>Nama</th>
                                                    <th>H G</th>
                                                    <th>M H</th>
                                                    <!-- <th>Loc</th> -->
                                                    <th>Position</th>
                                                    <th>Basic Salary</th>
                                                    <th>Pos Allowance</th>
                                                    <th>Skill Allowance</th>
                                                    <th>Gross Salary</th>
                                                    <th>Other</th>
                                                    <th>Astek</th>
                                                    <th>Jp</th>
                                                    <th>PPh Month</th>
                                                    <th>Meal</th>
                                                    <th>Transport</th>
                                                    <th>Koperasi</th>
                                                    <th>Thp</th>
                                                    <th>Loan</th>
                                                    <th>BPJS</th>
                                                    <th>Real Thp</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </tfoot>
                                            <tbody id="data-tabelku">
                                                <?php foreach($datapayroll as $data){ ?>
                                                    <tr>
                                                        <td class="font-kecil font-tebal kanan"><?= $data['ind'] ?></td>
                                                        <td class="font-kecil font-tebal"><?= $data['nama'] ?></td>
                                                        <td class="font-kecil" style="text-align: center;"><img src="<?php if($data['hg']==1){ echo base_url().'assets/images/sign-check.png'; }else{ echo base_url().'assets/images/sign-error.png';} ?>"></td>
                                                        <td class="font-kecil" style="text-align: center;"><img src="<?php if($data['mh']==1){ echo base_url().'assets/images/sign-check.png'; }else{ echo base_url().'assets/images/sign-error.png';} ?>"></td>
                                                        <td><?= $data['jabatan'] ?></td>
                                                        <td class="kanan font-kecil"><?= rupiah($data['gaji'],0,',','.') ?></td>
                                                        <td class="kanan font-kecil"><?= rupiah($data['tunjab'],0,',','.') ?></td>
                                                        <td class="kanan font-kecil"><?= rupiah($data['tunskill'],0,',','.') ?></td>
                                                        <td class="kanan font-kecil"><?= rupiah($data['gaji']+$data['tunjab']+$data['tunskill'],0,',','.') ?></td>
                                                        <td class="kanan font-kecil" id="kolomother<?= $data['id'] ?>"><?= rupiah($data['other'],0,',','.') ?></td>
                                                        <td class="kanan font-kecil" id="kolomastek<?= $data['id'] ?>"><?= rupiah($data['astek'],0,',','.') ?></td>
                                                        <td class="kanan font-kecil" id="kolomjp<?= $data['id'] ?>"><?= rupiah($data['jp'],0,',','.') ?></td>
                                                        <td class="kanan font-kecil" id="kolompphmonth<?= $data['id'] ?>"><?= rupiah($data['pphmonth'],0,',','.') ?></td>
                                                        <td class="kanan font-kecil" id="kolommeal<?= $data['id'] ?>"><?= rupiah($data['meal'],0,',','.') ?></td>
                                                        <td class="kanan font-kecil" id="kolomtransport<?= $data['id'] ?>"><?= rupiah($data['transport'],0,',','.') ?></td>
                                                        <td class="kanan font-kecil" id="kolomkoperasi<?= $data['id'] ?>"><?= rupiah($data['koperasi'],0,',','.') ?></td>
                                                        <td class="kanan font-kecil font-tebal text-danger" id="kolomthp<?= $data['id'] ?>"><?= rupiah($data['thp'],0,',','.') ?></td>
                                                        <td class="kanan font-kecil" id="kolomloan<?= $data['id'] ?>"><?= rupiah($data['loan'],0,',','.') ?></td>
                                                        <td class="kanan font-kecil" id="kolombpjs<?= $data['id'] ?>"><?= rupiah($data['bpjs'],0,',','.') ?></td>
                                                        <td class="kanan font-kecil font-tebal" id="kolomrealthp<?= $data['id'] ?>"><?= rupiah($data['realthp'],0,',','.') ?></td>
                                                        <td style="">
                                                            <a class="<?php if($data['send']==1){ echo "hilang"; }  ?>" id="tb1gambar<?= $data['id'] ?>" href="<?= base_url().'payroll/editview/'.$data['id'] ?>" title="Edit payroll <?= $data['nama'] ?>" data-remote="false" data-toggle="modal" data-title="Edit Payroll" data-target="#modalBox" ><img id="gambar<?= $data['id'] ?>" src="<?php if($data['editke']>=1){ echo base_url().'assets/images/pencil-valid.png'; }else{ echo base_url().'assets/images/pencil.png'; } ?>"></a>
                                                            <a class="<?php if($data['send']==1){ echo "hilang"; }  ?>" id="tb2gambar<?= $data['id'] ?>" data-toggle="modal" data-target="#modalBox-task" href="<?= base_url().'payroll/senddata/'.$data['id'] ?>" title="Kirim data" data-title="Kirim data" data-news="Apakah Anda yakin akan mengirim data <strong>'<?= $data['nama'] ?>'</strong> ?" style="cursor: pointer;"><img src="<?= LOK_FOTO.'paper-plane.png' ?>"></a>
                                                            <a href="<?= base_url().'payroll/getview/'.$data['id'] ?>" title="View Detail" data-remote="false" data-toggle="modal" data-title="View Detail" data-target="#modalBox-lg" ><img src="<?= base_url().'assets/images/file-pdf-icon.png' ?>"></a>
                                                            <a class="<?php if($data['send']==0 || ($data['hg']==1 || $data['mh']==1)){ echo "hilang"; }  ?>" id="tb3gambar<?= $data['id'] ?>" data-toggle="modal" data-target="#modalBox-task" data-title="Batalkan Kirim Data" href="<?= base_url().'payroll/unsenddata/'.$data['id'] ?>" title="Batal Kirim Validasi" data-news="Apakah Anda yakin akan menarik data <strong>'<?= $data['nama'] ?>'</strong> ?" style="cursor: pointer;"><img src="<?= LOK_FOTO.'sync.png' ?>"></a>
                                                            <a class="<?php if(($data['hg']==0 || $data['mh']==0) || $data['sendmail']==1){ echo "hilang"; }  ?>" id="tb4gambar<?= $data['id'] ?>" data-toggle="modal" data-target="#modalBox-task" data-title="Kirim email" href="<?= base_url().'payroll/kirimemail/'.$data['id'] ?>" title="Kirim email" data-news="Kirim email ke <strong>'<?= $data['nama'] ?>'</strong> ?" style="cursor: pointer;"><img src="<?= LOK_FOTO.'mail-icon.png' ?>"></a>
                                                            <a class="<?php if($data['sendmail']==0){ echo "hilang"; }  ?>" rel="<?= $data['id'] ?>" id="tb5gambar<?= $data['id'] ?>" href="#" style="cursor: pointer;"><img src="<?= LOK_FOTO.'mail-icon-cek.png' ?>"></a>
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