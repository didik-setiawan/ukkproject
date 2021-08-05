        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
            <h1 class="h3 mb-0 text-gray-800">Management Data Kategori</h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow mt-2">
                        <div class="card-body">
                            <a href="<?= base_url('master/add_kategori'); ?>" class="btn btn-warning mb-3"><i class="fa fa-plus"></i> Tambah Data Kategori</a>
                            <table class="table table-bordered" id="AdminTable">
                                <thead class="table-success">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($kategori as $k) {
                                    ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $k->nama_kategori; ?></td>
                                            <td>
                                                <a href="<?= base_url('master/del_kategori/') . md5($k->id_kategori); ?>" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>
                                                <a href="<?= base_url('master/edit_kategori/') . md5($k->id_kategori); ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
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