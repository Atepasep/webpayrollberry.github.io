<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card border-left-coklat shadow h-100 py-0 flat">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div>
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-3" style="float: left;">
                                    Validasi Payroll Management <?= namabulan($this->session->flashdata('bulanperiode')),' '.$this->session->flashdata('tahunperiode') ?>
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
                                        <input type="text" class="form-control small flat kecil font-kecil" style="width: 60px;" name="tahunperiode" id="tahunperiode" value="<?= $this->session->flashdata('tahunperiode') ?>"> | <span class="font-kecil ml-2">Valid : </span> 
                                        <select class="form-control small flat kecil mr-1 font-kecil hitam bg-warning" id="validby" name="validby" <?php if($this->session->userdata('valid')!=0){echo 'disabled';} ?>>
                                            <?= $m = $this->session->flashdata('kodevalid'); ?>
                                            <option <?php if($m=='hg'){ echo "selected";} ?> value="hg">V-1</option>
                                            <option <?php if($m=='mh'){ echo "selected";} ?> value="mh">V-2</option>
                                        </select>
                                        <a class="btn btn-success btn-icon-split btn-sm flat font-kecil ml-1" data-toggle="modal" data-target="#confirm-task" data-href="<?= base_url().'validasi/validall' ?>" title="Validasi semua data" data-news="Apakah Anda yakin akan validasi semua data periode ini ?" style="cursor: pointer;">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="text kode">Validasi All</span>
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
                                                    <th data-priority="1">NIK</th>
                                                    <th data-priority="2">Nama</th>
                                                    <th data-priority="9">Loc</th>
                                                    <th data-priority="6">Position</th>
                                                    <th>Basic Salary</th>
                                                    <th>Pos Allowance</th>
                                                    <th>Skill Allowance</th>
                                                    <th data-priority="5">Gross Salary</th>
                                                    <th data-priority="5">thp</th>
                                                    <th data-priority="8">Real Thp</th>
                                                    <th data-priority="7">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>NIK</th>
                                                    <th>Nama</th>
                                                    <th>Loc</th>
                                                    <th>Position</th>
                                                    <th>Basic Salary</th>
                                                    <th>Pos Allowance</th>
                                                    <th>Skill Allowance</th>
                                                    <th>Gross Salary</th>
                                                    <th>thp</th>
                                                    <th>Real Thp</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </tfoot>
                                            <tbody id="data-tabelku">
                                                <?php foreach($datavalidasi as $data){
                                                    $kde = $this->session->flashdata('kodevalid'); 
                                                    $by = $data[$kde]==1 ? 'bg-success' : 'bg-warning';
                                                    $urrl= $data[$kde]==0 ? base_url().'validasi/validoke/'.$data['id'] : base_url().'validasi/unvalid/'.$data['id'];
                                                 ?>
                                                    <tr>
                                                        <td class="font-kecil"><?= $data['noinduk'] ?></td>
                                                        <td class="font-kecil"><?= $data['nama'] ?></td>
                                                        <td class="font-kecil"><?= $data['bagian'] ?></td>
                                                        <td class="font-kecil"><?= $data['jabatan'] ?></td>
                                                        <td class="kanan font-kecil"><?= rupiah($data['gaji'],0,',','.') ?></td>
                                                        <td class="kanan font-kecil"><?= rupiah($data['tunjab'],0,',','.') ?></td>
                                                        <td class="kanan font-kecil"><?= rupiah($data['tunskill'],0,',','.') ?></td>
                                                        <td class="kanan font-kecil"><?= rupiah($data['gaji']+$data['tunjab']+$data['tunskill'],0,',','.') ?></td>
                                                        <td class="kanan font-tebal text-danger font-kecil" id="kolomthp<?= $data['id'] ?>"><?= rupiah($data['thp'],0,',','.') ?></td>
                                                        <td class="kanan font-tebal font-kecil" id="kolomrealthp<?= $data['id'] ?>"><?= rupiah($data['realthp'],0,',','.') ?></td>
                                                        <td style="text-align: center;">
                                                            <a id="tbvalid<?= $data['id'] ?>" data-toggle="modal" data-target="#modalBox-task" href="<?= $urrl ?>" title="Tarik data" id="unsenddata" data-news="Apakah Anda yakin akan menarik data <strong>'<?= $data['nama'] ?>'</strong> ?" style="cursor: pointer; text-decoration: none;" class="<?= $by ?> warnahitam">validasi</a>
                                                            <a href="<?= base_url().'payroll/getview/'.$data['id'] ?>" title="View Detail" data-remote="false" data-toggle="modal" data-title="View Detail" data-target="#modalBox-lg" ><img src="<?= base_url().'assets/images/file-pdf-icon.png' ?>"></a>
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