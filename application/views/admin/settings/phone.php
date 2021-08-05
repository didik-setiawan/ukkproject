<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <form action="<?= base_url('admin/setting_phone'); ?>" method="post">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>No Telp</label>
                                <input type="text" name="phone" id="phone" class="form-control <?php if (form_error('phone')) : ?>is-invalid<?php endif; ?>" value="<?= $pengguna->telp; ?>">
                                <?= form_error('phone', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <a href="<?= base_url('admin/settings'); ?>" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
                            <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!---Container Fluid-->
</div>