<div class="container" style="margin-top: 70px; margin-bottom: 90px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <h5>Edit Password</h5>
                    <hr>
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <form action="<?= base_url('user/setting_password'); ?>" method="post">
                                <div class="form-group">
                                    <label>Password Lama</label>
                                    <input type="password" name="old_pass" class="form-control">
                                    <?= form_error('old_pass', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <input type="password" name="new_pass" class="form-control">
                                    <?= form_error('new_pass', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Ulangi Password Baru</label>
                                    <input type="password" name="re_pass" class="form-control">
                                    <?= form_error('re_pass', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <a href="<?= base_url('user/settings'); ?>" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>