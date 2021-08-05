<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <h1 class="h3 mb-0 text-gray-800">Management Data Masyarakat</h1>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mt-2">
                <div class="card-body">
                    <a href="<?= base_url('master/pdf_masyarakat'); ?>" class="btn btn-danger mb-2" target="_blank"><i class="fa fa-download"></i> Generate ke PDF</a>
                    <table class="table table-bordered" id="AdminTable">
                        <thead class="table-success">
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Tgl Bergabung</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            date_default_timezone_set('Asia/Jakarta');
                            foreach ($masyarakat as $m) { ?>
                                <tr>
                                    <td><?= $m->nik; ?></td>
                                    <td><?= $m->nama; ?></td>
                                    <td><?= date('d M Y', $m->tgl_bergabung); ?></td>
                                    <td>
                                        <?php if ($m->aktif == 1) : ?>
                                            <p class="text-success"><i class="fa fa-check"></i> Aktif</p>
                                        <?php else : ?>
                                            <p class="text-danger"><i class="fa fa-times"></i> Nonaktif</p>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('master/del_masyarakat/') . md5($m->id_masyarakat); ?>" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>
                                        <?php if ($m->aktif == 1) : ?>
                                            <a href="<?= base_url('master/nonaktif_masyarakat/') . md5($m->id_masyarakat); ?>" class="btn btn-warning btn-sm"><i class="fa fa-power-off"></i></a>
                                        <?php else : ?>
                                            <a href="<?= base_url('master/aktif_masyarakat/') . md5($m->id_masyarakat); ?>" class="btn btn-success btn-sm"><i class="fa fa-power-off"></i></a>
                                        <?php endif; ?>
                                        <button class="btn btn-primary btn-sm det-mas" data-toggle="modal" data-target="#exampleModal" data-id="<?= md5($m->id_masyarakat); ?>"><i class="far fa-eye"></i></button>
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
<!---Container Fluid-->
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Akun Masyarakat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <td>NIK</td>
                        <td id="nik"></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td id="nama"></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td id="username"></td>
                    </tr>
                    <tr>
                        <td>No Telp</td>
                        <td id="telp"></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>