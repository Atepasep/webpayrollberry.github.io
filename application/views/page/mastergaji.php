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
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered dt-responsive datatable table-hover" id="tabelku" width="100%" cellspacing="0">
                                            <thead class="bg-secondary text-light">
                                                <tr>
                                                    <th>NIK</th>
                                                    <th>Nama</th>
                                                    <th>Bagian</th>
                                                    <th>Jabatan</th>
                                                    <th>Gaji Pokok</th>
                                                    <th>Tunj Jabatan</th>
                                                    <th>Tunj Skill</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>NIK</th>
                                                    <th>Nama</th>
                                                    <th>Bagian</th>
                                                    <th>Jabatan</th>
                                                    <th>Gaji Pokok</th>
                                                    <th>Tunj Jabatan</th>
                                                    <th>Tunj Skill</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </tfoot>
                                            <tbody id="data-tabelku">
                                                <?php foreach($datagaji as $data){ ?>
                                                    <tr>
                                                        <td><?= $data['noinduk'] ?></td>
                                                        <td><?= $data['nama'] ?></td>
                                                        <td><?= $data['bagian'] ?></td>
                                                        <td><?= $data['jabatan'] ?></td>
                                                        <td class="kanan"><?= rupiah($data['gaji'],0,',','.') ?></td>
                                                        <td class="kanan"><?= rupiah($data['tunjab'],0,',','.') ?></td>
                                                        <td class="kanan"><?= rupiah($data['tunskill'],0,',','.') ?></td>
                                                        <td style="text-align: center;">
                                                            <a href="<?= base_url().'mastergaji/addgaji/'.$data['id_personil'] ?>" title="edit gaji <?= $data['nama'] ?>"><img src="<?= base_url().'assets/images/edit.png' ?>"></a>
                                                            <a href="<?= base_url().'mastergaji/getview/'.$data['id_personil'] ?>" title="view gaji <?= $data['nama'] ?>" data-remote="false" data-toggle="modal" data-title="View History Gaji" data-target="#modalBox" ><img src="<?= base_url().'assets/images/view.png' ?>"></a>
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