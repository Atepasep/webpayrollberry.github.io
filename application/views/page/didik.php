<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card border-left-coklat shadow h-100 py-0 flat">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-3">
                                Data Pendidikan
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="h5 mb-0">
                                        <table class="table table-bordered" id="tabelku">
                                            <thead class="bg-secondary text-light">
                                                <tr>
                                                    <th scope="col">Kode</th>
                                                    <th scope="col">Pendidikan</th>
                                                </tr>
                                            </thead>
                                            <tbody id="data-tabelku">
<!--                                                 <tr>
                                                    <td>SD</td>
                                                    <td>Sekolah Dasar</td>
                                                </tr> -->
                                                <?php $no=0; foreach ($datadidik as $data) { $no++;
                                                    $aktif = $no==1 ? "aktif" : ""; ?>
                                                    <tr rel="<?= $data['id'] ?>" class="<?= $aktif ?>">
                                                        <td><?= $data['kode'] ?></td>
                                                        <td><?= $data['pendidikan'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-8" class="warnahitam" style="color: black">
                                    Master Data
                                    <hr class="small">
                                    <div class="form-group row mb-0">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label-sm">Kode</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control form-control-sm flat warnahitam" id="kode" placeholder="kode">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-top: 0px;">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label-sm">Pendidikan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control form-control-sm flat warnahitam" id="pendidikan" placeholder="pendidikan">
                                        </div>
                                    </div>
                                    <div style="text-align: center;">
                                        <a href="#" class="btn btn-success btn-icon-split btn-sm flat font-standar" id="adddidik">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                            <span class="text">Tambah</span>
                                        </a>
                                        <a href="#" class="btn btn-primary btn-icon-split btn-sm flat font-standar">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Ubah</span>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-icon-split btn-sm flat font-standar">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash-alt"></i>
                                            </span>
                                            <span class="text">Hapus</span>
                                        </a>
                                        <a href="#" class="btn btn-info btn-icon-split btn-sm flat font-standar">
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