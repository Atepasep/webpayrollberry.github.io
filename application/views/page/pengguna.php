<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card border-left-coklat shadow h-100 py-0 flat">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-3">
                                Data Pengguna Aplikasi
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="h5 mb-0">
                                        <table class="table table-bordered" id="tabelku">
                                            <thead class="bg-secondary text-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th scope="col">Nama</th>
                                                    <th>Jabatan</th>
                                                </tr>
                                            </thead>
                                            <tbody id="data-tabelku">
<!--                                                 <tr>
                                                    <td>SD</td>
                                                    <td>Sekolah Dasar</td>
                                                </tr> -->
                                                <?php $no=0; foreach ($datapengguna as $data) { $no++;
                                                    if($this->session->flashdata('kodeid')){
                                                        $aktif = $data['id']==$this->session->flashdata('kodeid') ? "aktif" : ""; 
                                                    }else{
                                                        $aktif = $no==1 ? "aktif" : ""; 
                                                    } ?>
                                                    <tr rel="<?= $data['id'] ?>" class="<?= $aktif ?>">
                                                        <td><?= $no ?></td>
                                                        <td><?= $data['nama'] ?></td>
                                                        <td><?= $data['jabatan'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-8" class="warnahitam" style="color: black">
                                    Master Data Pengguna <?= $this->session->flashdata('kodeid') ?>
                                    <hr class="small">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <input type="text" name="urlsimpan" id="urlsimpan" value="<?= $urlsimpan ?>" class="hilang">
                                            <input type="text" name="urledit" id="urledit" value="<?= $urledit ?>" class="hilang">
                                            <form method="post" name="formpengguna" id="formpengguna" action="" enctype="multipart/form-data">
                                                <input type="text" class="form-control form-control-sm flat warnahitam hilang" name="id" id="id">
                                                <div class="form-group row" style="margin-bottom: 0px;">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label-sm">Nama</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm flat warnahitam" name="nama" id="nama" placeholder="Nama">
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin-bottom: 0px;">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label-sm">Jabatan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm flat warnahitam" name="jabatan" id="jabatan" placeholder="Jabatan"> 
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin-bottom: 0px;">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label-sm">Aktif</label>
                                                    <div class="col-sm-9">
                                                        <input type="checkbox" name="aktiv" id="aktiv">
                                                        <span class="small text-gray-600">Klik untuk aktifkan</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin-bottom: 0px;">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label-sm">Username</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm flat warnahitam" name="username" id="username" placeholder="Username">
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin-bottom: 0px;">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label-sm">Password</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control form-control-sm flat warnahitam" name="pass" id="pass" placeholder="Password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4" style="text-align: center;">
                                                <img src="<?= base_url().'assets/images/nophoto.png' ?>" class="foto-profil" id="foto-profil">
                                                <div style="font-size: 9px;">double klik Foto <br>apabila ingin mengganti Foto</div>
                                                <div class="input-group input-group-flat">
                                                    <input type="text" name="lokfile" class="hilang" id="lokfile" value="" rel="<?= LOK_FOTO_USER ?>">
                                                    <input type="text" class="form-control flat hilang" name="file_path" id="file_path" autocomplete="off">
                                                    <input type="file" name="logo" id="file" class="hilang">
                                                    <input type="text" name="old_logo" id="old_logo" value="" class="hilang">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mb-4 flat font-kecil">
                                            <div class="card-header flat bg-success kartuku">
                                                Modul Aplikasi
                                            </div>
                                            <div class="card-body font-standar">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="checkbox">
                                                            <input type="checkbox" name="modul1" id="modul1"> Pendidikan
                                                        </div>
                                                        <div class="checkbox">
                                                            <input type="checkbox" name="modul2" id="modul2"> Bagian
                                                        </div>
                                                        <div class="checkbox">
                                                            <input type="checkbox" name="modul3" id="modul3"> Jabatan
                                                        </div>
                                                        <div class="checkbox">
                                                            <input type="checkbox" name="modul4" id="modul4"> User Aplikasi
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="checkbox">
                                                            <input type="checkbox" name="modul5" id="modul5"> Personil/Karyawan
                                                        </div>
                                                        <div class="checkbox">
                                                            <input type="checkbox" name="modul6" id="modul6"> Master Gaji
                                                        </div>
                                                        <div class="checkbox">
                                                            <input type="checkbox" name="modul7" id="modul7"> Payroll
                                                        </div>
                                                        <div class="checkbox">
                                                            <input type="checkbox" name="modul8" id="modul8"> Validasi
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="checkbox">
                                                            <input type="checkbox" name="modul9" id="modul9"> In Progress
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer kartuku">
                                                <div class="form-group row font-kecil" style="margin-bottom: 0px;">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label-sm">Validasi Payroll</label>
                                                    <div class="col-sm-4">
                                                        <select class="form-control form-control flat warnahitam" id="validasi" name="validasi" style="padding: : 0px;">
                                                            <option value='0'>-- No Validasi --</option>
                                                            <option value='1'>V-1</option>
                                                            <option value='2'>V-2</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div style="text-align: center;">
                                        <a href="#" class="btn btn-success btn-icon-split btn-sm flat font-kecil hilang" id="savepengguna">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-save"></i>
                                            </span>
                                            <span class="text">Simpan</span>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-icon-split btn-sm flat font-kecil hilang" id="batalpengguna">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-times"></i>
                                            </span>
                                            <span class="text">Batal</span>
                                        </a>
                                        <a href="#" class="btn btn-success btn-icon-split btn-sm flat font-kecil" id="addpengguna">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                            <span class="text">Tambah</span>
                                        </a>
                                        <a href="#" class="btn btn-primary btn-icon-split btn-sm flat font-kecil" id="editpengguna">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Ubah</span>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-icon-split btn-sm flat font-kecil" id="hapuspengguna" data-toggle="modal" data-target="#confirm-delete" data-news="Yakin akan menghapus data ini ?" data-href="<?= base_url().'pengguna/hapus/x' ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash-alt"></i>
                                            </span>
                                            <span class="text">Hapus</span>
                                        </a>
                                        <a href="#" class="btn btn-info btn-icon-split btn-sm flat font-kecil" id="cetakpengguna">
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