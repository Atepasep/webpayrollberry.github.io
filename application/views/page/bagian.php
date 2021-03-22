<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card border-left-coklat shadow h-100 py-0 flat">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-3">
                                Data Bagian
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="h5 mb-0">
                                        <table class="table table-bordered" id="tabelku">
                                            <thead class="bg-secondary text-light">
                                                <tr>
                                                    <th scope="col">Kode</th>
                                                    <th scope="col">Nama Bagian</th>
                                                </tr>
                                            </thead>
                                            <tbody id="data-tabelku">
<!--                                                 <tr>
                                                    <td>SD</td>
                                                    <td>Sekolah Dasar</td>
                                                </tr> -->
                                                <?php $no=0; foreach ($databagian as $data) { $no++;
                                                    if($this->session->flashdata('kodeid')){
                                                        $aktif = $data['id']==$this->session->flashdata('kodeid') ? "aktif" : ""; 
                                                    }else{
                                                        $aktif = $no==1 ? "aktif" : ""; 
                                                    } ?>
                                                    <tr rel="<?= $data['id'] ?>" class="<?= $aktif ?>">
                                                        <td><?= $data['kode'] ?></td>
                                                        <td><?= $data['bagian'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-8" class="warnahitam" style="color: black">
                                    Master Data Bagian
                                    <hr class="small">
                                    <input type="text" name="urlsimpan" id="urlsimpan" value="<?= $urlsimpan ?>" class="hilang">
                                    <input type="text" name="urledit" id="urledit" value="<?= $urledit ?>" class="hilang">
                                    <form method="post" name="formbagian" id="formbagian" action="">
                                        <input type="text" class="form-control form-control-sm flat warnahitam hilang" name="id" id="id">
                                        <div class="form-group row mb-0">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label-sm">Kode</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control form-control-sm flat warnahitam" name="kode" id="kode" placeholder="kode">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-top: 0px;">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label-sm">Bagian</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control form-control-sm flat warnahitam" name="bagian" id="bagian" placeholder="Nama Bagian">
                                            </div>
                                        </div>
                                    </form>
                                    <div style="text-align: center;">
                                        <a href="#" class="btn btn-success btn-icon-split btn-sm flat font-kecil hilang" id="savebagian">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-save"></i>
                                            </span>
                                            <span class="text">Simpan</span>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-icon-split btn-sm flat font-kecil hilang" id="batalbagian">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-times"></i>
                                            </span>
                                            <span class="text">Batal</span>
                                        </a>
                                        <a href="#" class="btn btn-success btn-icon-split btn-sm flat font-kecil" id="addbagian">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                            <span class="text">Tambah</span>
                                        </a>
                                        <a href="#" class="btn btn-primary btn-icon-split btn-sm flat font-kecil" id="editbagian">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Ubah</span>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-icon-split btn-sm flat font-kecil" id="hapusbagian" data-toggle="modal" data-target="#confirm-delete" data-href="<?= base_url().'bagian/hapus/x' ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash-alt"></i>
                                            </span>
                                            <span class="text">Hapus</span>
                                        </a>
                                        <a href="#" class="btn btn-info btn-icon-split btn-sm flat font-kecil" id="cetakbagian">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-print"></i>
                                            </span>
                                            <span class="text">Cetak</span>
                                        </a>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-6">
                                            <div class="text-xs font-weight-bold text-info text-uppercase">
                                                Data Group
                                            </div>
                                            <table class="table table-bordered" id="tabelku2">
                                                <thead class="bg-secondary text-light">
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Group</th>
                                                        <th scope="col">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="data-tabelku2">
                                                    <tr>
                                                        <td colspan="3" style="text-align: center;">No Record Found</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" style="text-align: center;">
                                                            <a href="#" class="btn btn-success btn-icon-split btn-sm flat font-kecil" rel="CEK" id="addgroup">
                                                                <span class="icon text-white-50">
                                                                    <i class="fas fa-plus"></i>
                                                                </span>
                                                                <span class="text">Tambah Group</span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-sm-3"></div>
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