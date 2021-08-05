<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <h1 class="h3 mb-0 text-gray-800">Tambah Data Kategori</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mt-2">
                <div class="card-body">
                    <form action="<?= base_url('master/add_kategori'); ?>" method="post">
                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" name="kategori" id="kategori" class="form-control" value="<?= set_value('kategori'); ?>">
                            <?= form_error('kategori', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <a href="<?= base_url('master/kategori'); ?>" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!---Container Fluid-->
</div>