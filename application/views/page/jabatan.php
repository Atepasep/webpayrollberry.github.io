<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card border-left-coklat shadow h-100 py-0 flat">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-3">
                                Data Jabatan
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="h5 mb-0">
                                        <table class="table table-bordered" id="tabelku">
                                            <thead class="bg-secondary text-light">
                                                <tr>
                                                    <th scope="col">Nama Jabatan</th>
                                                </tr>
                                            </thead>
                                            <tbody id="data-tabelku">
<!--                                                 <tr>
                                                    <td>SD</td>
                                                    <td>Sekolah Dasar</td>
                                                </tr> -->
                                                <?php $no=0; foreach ($datajabatan as $data) { $no++;
                                                    if($this->session->flashdata('kodeid')){
                                                        $aktif = $data['id']==$this->session->flashdata('kodeid') ? "aktif" : ""; 
                                                    }else{
                                                        $aktif = $no==1 ? "aktif" : ""; 
                                                    } ?>
                                                    <tr rel="<?= $data['id'] ?>" class="<?= $aktif ?>">
                                                        <td><?= $data['jabatan'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-8" class="warnahitam" style="color: black">
                                    Master Data Jabatan
                                    <hr class="small">
                                    <input type="text" name="urlsimpan" id="urlsimpan" value="<?= $urlsimpan ?>" class="hilang">
                                    <input type="text" name="urledit" id="urledit" value="<?= $urledit ?>" class="hilang">
                                    <form method="post" name="formjabatan" id="formjabatan" action="">
                                        <input type="text" class="form-control form-control-sm flat warnahitam hilang" name="id" id="id">
                                        <div class="form-group row" style="margin-top: 0px;">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label-sm">Jabatan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control form-control-sm flat warnahitam" name="jabatan" id="jabatan" placeholder="Nama Jabatan">
                                            </div>
                                        </div>
                                    </form>
                                    <div style="text-align: center;">
                                        <a href="#" class="btn btn-success btn-icon-split btn-sm flat font-kecil hilang" id="savejabatan">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-save"></i>
                                            </span>
                                            <span class="text">Simpan</span>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-icon-split btn-sm flat font-kecil hilang" id="bataljabatan">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-times"></i>
                                            </span>
                                            <span class="text">Batal</span>
                                        </a>
                                        <a href="#" class="btn btn-success btn-icon-split btn-sm flat font-kecil" id="addjabatan">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                            <span class="text">Tambah</span>
                                        </a>
                                        <a href="#" class="btn btn-primary btn-icon-split btn-sm flat font-kecil" id="editjabatan">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Ubah</span>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-icon-split btn-sm flat font-kecil" id="hapusjabatan" data-toggle="modal" data-target="#confirm-delete" data-href="<?= base_url().'jabatan/hapus/x' ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash-alt"></i>
                                            </span>
                                            <span class="text">Hapus</span>
                                        </a>
                                        <a href="#" class="btn btn-info btn-icon-split btn-sm flat font-kecil" id="cetakjabatan">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-print"></i>
                                            </span>
                                            <span class="text">Cetak</span>
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