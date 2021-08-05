<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <h1 class="h3 mb-0 text-gray-800">Edit Password</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mt-2">
                <div class="card-body">
                    <form action="<?= base_url('admin/setting_password'); ?>" method="post">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label>Password Lama</label>
                                <input type="password" name="old_pass" id="old_pass" class="form-control <?php if (form_error('old_pass')) : ?>is-invalid<?php endif; ?>">
                                <?= form_error('old_pass', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Password Baru</label>
                                <input type="password" name="new_pass" id="new_pass" class="form-control <?php if (form_error('new_pass')) : ?>is-invalid<?php endif; ?>">
                                <?= form_error('new_pass', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Ulangi Password Baru</label>
                                <input type="password" name="re_pass" id="re_pass" class="form-control <?php if (form_error('re_pass')) : ?>is-invalid<?php endif; ?>">
                                <?= form_error('re_pass', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <a href="<?= base_url('admin/settings'); ?>" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!---Container Fluid-->
</div>