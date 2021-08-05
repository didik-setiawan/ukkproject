<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <h1 class="h3 mb-0 text-gray-800">Edit Data Kategori</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mt-2">
                <div class="card-body">
                    <form action="<?= base_url('master/edit_kategori/' . md5($kategori->id_kategori)); ?>" method="post">
                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="hidden" name="id_kategori" value="<?= md5($kategori->id_kategori); ?>">
                            <input type="text" name="kategori" id="kategori" class="form-control" value="<?= $kategori->nama_kategori; ?>">
                            <?= form_error('kategori', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <a href="<?= base_url('master/kategori'); ?>" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Edit Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!---Container Fluid-->
</div>