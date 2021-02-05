<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card border-left-coklat shadow h-100 py-0 flat">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-3">
                                Data Master Gaji Karyawan / Personil
                            </div>
                            <hr class="small mb-1">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="table-responsive">
                                        <table class="table table-bordered dt-responsive datatable table-hover" id="tabelku" width="100%" cellspacing="0">
                                            <thead class="bg-secondary text-light">
                                                <tr>
                                                    <th>NIK</th>
                                                    <th>Nama</th>
                                                    <th>Bagian</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>NIK</th>
                                                    <th>Nama</th>
                                                    <th>Bagian</th>
                                                </tr>
                                            </tfoot>
                                            <tbody id="data-tabelku">
                                                <?php foreach($datapersonil as $data){ ?>
                                                    <tr>
                                                        <td><?= $data['noinduk'] ?></td>
                                                        <td><?= $data['nama'] ?></td>
                                                        <td><?= $data['xbagian'] ?></td>
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