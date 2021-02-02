<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card border-left-coklat shadow h-100 py-0 flat">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-3">
                                Tambah data Personil
                            </div>
                            <div class="row">
                                <div class="col-sm-12" class="warnahitam" style="color: black">
                                    <hr class="small">
                                    <div class="row font-standar">
                                        <div class="col-sm-6">
                                            <form method="post" name="formpersonil" id="formpersonil" action="<?= $urlnya ?>" enctype="multipart/form-data">
                                                <input type="text" class="form-control form-control-sm flat warnahitam hilang" name="id" id="id">
                                                <div class="form-group row" style="margin-bottom: 0px;">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label-sm">NIK</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm flat warnahitam" name="noinduk" id="noinduk" placeholder="NIK">
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin-bottom: 0px;">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label-sm">Nama</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm flat warnahitam" name="nama" id="nama" placeholder="Nama"> 
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin-bottom: 0px;">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label-sm">Jenis Kelamin</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-sm flat warnahitam" id="jenkel" name="jenkel">
                                                            <option value="L">Laki-Laki</option>
                                                            <option value="P">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin-bottom: 0px;">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label-sm">TTL</label>
                                                    <div class="col-sm-9">
                                                        <div class="row">
                                                            <div class="col-sm-7">
                                                                <input type="text" class="form-control form-control-sm flat warnahitam" name="tempatlahir" id="tempatlahir" placeholder="Tempat Lahir">
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <input type="text" class="form-control form-control-sm flat warnahitam" name="tgllahir" id="tgllahir" placeholder="Tgl lahir">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin-bottom: 0px;">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label-sm">Identitas</label>
                                                    <div class="col-sm-9">
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <select class="form-control form-control-sm flat warnahitam" name="identitas" id="identitas">
                                                                    <option value="1">KTP</option>
                                                                    <option value="2">SIM</option>
                                                                    <option value="3">PASSPORT</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control form-control-sm flat warnahitam" name="noidentitas" id="noidentitas" placeholder="No Identitas">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin-bottom: 0px;">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label-sm">Alamat</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control form-control-sm flat warnahitam" id="alamat" name="alamat" placeholder="Alamat"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group row" style="margin-bottom: 0px;">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label-sm">Pendidikan</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-sm flat warnahitam" name="pendidikan" id="pendidikan">
                                                            <option>-- Pilih Pendidikan --</option>
                                                            <?php foreach ($didik as $datadidik) { ?>
                                                                <option value="<?= $datadidik['id'] ?>"><?= $datadidik['kode'].' - '.$datadidik['pendidikan'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin-bottom: 0px;">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label-sm">Email</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm flat warnahitam" name="email" id="email" placeholder="Email"> 
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin-bottom: 0px;">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label-sm">No telp</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm flat warnahitam" name="notelp" id="notelp" placeholder="No telp"> 
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin-bottom: 0px;">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label-sm">Tgl Masuk</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm flat warnahitam" name="tglmasuk" id="tglmasuk" placeholder="Tgl Masuk"> 
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin-bottom: 0px;">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label-sm">Bagian</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-sm flat warnahitam" id="bagian" name="bagian">
                                                            <option>-- Pilih Bagian --</option>
                                                            <?php foreach ($bagian as $databagian) { ?>
                                                                <option value="<?= $databagian['id'] ?>"><?= $databagian['bagian'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin-bottom: 0px;">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label-sm">Jabatan</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-sm flat warnahitam" name="jabatan" id="jabatan">
                                                            <option>-- Daftar Jabatan --</option>
                                                            <?php foreach ($jabatan as $datajabatan) { ?>
                                                                <option value="<?= $datajabatan['id'] ?>"><?= $datajabatan['jabatan'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label-sm">Foto</label>
                                                    <div class="col-sm-9" style="text-align: center;">
                                                        <img src="<?= base_url().'assets/images/nophoto.png' ?>" class="foto-profil" id="foto-profil">
                                                        <div style="font-size: 9px;">double klik Foto <br>apabila ingin mengganti Foto</div>
                                                        <div class="input-group input-group-flat">
                                                            <input type="text" name="lokfile" class="hilang" id="lokfile" value="" rel="<?= LOK_FOTO_USER ?>">
                                                            <input type="text" class="form-control flat hilang" name="file_path" id="file_path" autocomplete="off">
                                                            <input type="file" name="logo" id="file" class="hidden hilang">
                                                            <input type="text" name="old_logo" id="old_logo" value="" class="hilang">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <hr class="small">
                                    <div style="text-align: center;">
                                        <a href="#" class="btn btn-success btn-icon-split btn-sm flat font-kecil" id="savepersonil">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-save"></i>
                                            </span>
                                            <span class="text">Simpan</span>
                                        </a>
                                        <a href="<?= base_url().'personil' ?>" class="btn btn-danger btn-icon-split btn-sm flat font-kecil" id="kembalikepersonil">
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