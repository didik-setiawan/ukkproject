<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <h1 class="h3 mb-0 text-gray-800">Tambah Data Petugas</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mt-2">
                <div class="card-body">
                    <form action="<?= base_url('master/add_petugas'); ?>" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control <?php if (form_error('nama')) : ?>is-invalid<?php endif; ?>" name="nama" value="<?= set_value('nama'); ?>">
                                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control <?php if (form_error('username')) : ?>is-invalid<?php endif; ?>" name="username" value="<?= set_value('username'); ?>">
                                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>No Telp</label>
                                    <input type="text" class="form-control <?php if (form_error('telp')) : ?>is-invalid<?php endif; ?>" name="telp" value="<?= set_value('telp'); ?>">
                                    <?= form_error('telp', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="kategori" class="form-control">
                                        <option value="">--pilih salah satu--</option>
                                        <?php foreach ($kategori as $k) { ?>
                                            <option value="<?= $k->id_kategori; ?>"><?= $k->nama_kategori; ?></option>
                                        <?php } ?>
                                    </select>
                                    <small style="font-size: 11px;">Note : Jika level petugas yang akan di tambahkan adalah admin, maka tidak perlu memilih kategori</small>
                                    <?= form_error('kategori', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Level</label>
                                    <select name="level" class="form-control">
                                        <option value="1">Admin</option>
                                        <option value="2">Petugas</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control <?php if (form_error('password')) : ?>is-invalid<?php endif; ?>" name="password">
                                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Ulangi Password</label>
                                    <input type="password" class="form-control <?php if (form_error('repassword')) : ?>is-invalid<?php endif; ?>" name="repassword">
                                    <?= form_error('repassword', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <a href="<?= base_url('master/petugas'); ?>" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data Petugas</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!---Container Fluid-->
</div>