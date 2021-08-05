        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
            <h1 class="h3 mb-0 text-gray-800">Management Data Petugas</h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow mt-2">
                        <div class="card-body">
                            <a href="<?= base_url('master/add_petugas'); ?>" class="btn btn-warning mb-3"><i class="fa fa-plus"></i> Tambah Data Petugas</a>
                            <a href="<?= base_url('master/pdf_petugas'); ?>" class="btn btn-danger mb-3" target="_blank"><i class="fa fa-download"></i> Generate ke PDF</a>
                            <table class="table table-bordered" id="AdminTable">
                                <thead class="table-success">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>No Telp</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($petugas as $p) { ?>
                                        <tr>
                                            <td><?= $p->nama; ?></td>
                                            <td><?= $p->username; ?></td>
                                            <td><?= $p->telp; ?></td>
                                            <td><?= $p->nama_kategori; ?></td>
                                            <td>
                                                <a href="<?= base_url('master/del_petugas/') . md5($p->id_admin); ?>" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>
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