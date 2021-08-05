<div class="container" style="margin-bottom: 70px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-3" style="margin-top: 70px;">
                <div class="card-body">
                    <h5>Tambah Pengaduan</h5>
                    <hr>
                    <?= form_open_multipart('user/add_pengaduan'); ?>
                    <div class="form-group">
                        <label class="form-label">Isi Pengaduan</label>
                        <textarea name="isi" id="isi" class="form-control <?php if (form_error('isi')) : ?>is-invalid<?php endif; ?>" rows="10"><?= set_value('isi'); ?></textarea>
                        <?= form_error('isi', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group mt-2">
                        <label>Kepada</label>
                        <select name="kategori" class="form-control <?php if (form_error('kategori')) : ?>is-invalid<?php endif; ?>">
                            <option value="">--Pilih salah satu--</option>
                            <?php foreach ($kategori as $k) { ?>
                                <option value="<?= $k->id_kategori; ?>"><?= $k->nama_kategori; ?></option>
                            <?php } ?>
                        </select>
                        <?= form_error('kategori', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label">Tambahkan Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control <?php if (form_error('foto')) : ?>is-invalid<?php endif; ?>" required>
                        <?= form_error('foto', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <a href="<?= base_url('user'); ?>" class="btn btn-dark mt-2"><i class="fa fa-arrow-left"></i> Kembali ke Dashboard</a>
                    <button type="submit" class="btn btn-success mt-2"><i class="far fa-paper-plane"></i> Kirim Pengaduan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>