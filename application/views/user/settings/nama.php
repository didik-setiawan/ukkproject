<div class="container" style="margin-top: 70px; margin-bottom: 90px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <h5>Edit Nama</h5>
                    <hr>
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <form action="<?= base_url('user/setting_name'); ?>" method="post">
                                <div class="form-group mb-3">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" id="nama" class="form-control <?php if (form_error('nama')) : ?>is-invalid<?php endif; ?>" value="<?= $pengguna->nama; ?>">
                                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
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