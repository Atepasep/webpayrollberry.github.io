<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card border-left-coklat shadow h-100 py-0 flat">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-3">
                                Data Karyawan / Personil
                            </div>
                            <hr class="small mb-1">
                            <div style="text-align: right;">
                                <a href="<?= base_url().'personil/tambahdata' ?>" class="btn btn-success btn-icon-split btn-sm flat font-kecil mb-1" id="addpersonil">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Tambah data Personil</span>
                                </a>
                            </div>
                            <hr class="small">
                            <div class="table-responsive">
                                <table class="table table-bordered dt-responsive datatable table-hover" id="tabelku" width="100%" cellspacing="0">
                                    <thead class="bg-secondary text-light">
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Bagian</th>
                                            <th>Jabatan</th>
                                            <th>Tgl Masuk</th>
                                            <th>Email/No Telp</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Bagian</th>
                                            <th>Jabatan</th>
                                            <th>Tgl Masuk</th>
                                            <th>Email/No Telp</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="data-tabelku">

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
<!-- /.container-fluid