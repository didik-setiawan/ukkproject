<div class="container" style="margin-top: 70px; margin-bottom: 90px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <h5>Edit No Telp</h5>
                    <hr>
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <form action="<?= base_url('user/setting_phone'); ?>" method="post">
                                <div class="form-group mb-3">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Kode Negara</label>
                                            <select name="kode-negara" class="form-control <?php if (form_error('kode-negara')) : ?>is-invalid<?php endif; ?>">
                                                <option value="">Kode Negara</option>
                                                <option value="+62">+62 Indonesia</option>
                                                <option value="+65">+65 Singapura</option>
                                                <option value="+60">+60 Malaysia</option>
                                            </select>
                                            <?= form_error('kode-negara', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-8">

                                            <label for="telp">No Telp</label>
                                            <input type="text" name="telp" id="telp" class="form-control <?php if (form_error('telp')) : ?>is-invalid<?php endif; ?>" value="<?= $pengguna->telp; ?>">
                                            <?= form_error('telp', '<small class="text-danger">', '</small>'); ?>

                                        </div>
                                    </div>
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