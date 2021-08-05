<div class="container" style="margin-top: 70px; margin-bottom : 90px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <h5>Profil Anda</h5>
                    <hr>
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <div style="text-align: center;">
                                <img src="<?= base_url('asset/img/user.png'); ?>" width="80px" class="rounded-circle img-thumbnail">
                            </div>
                            <table class="table table-bordered mt-3">
                                <tr>
                                    <td>NIK</td>
                                    <td><?= $pengguna->nik; ?></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td><?= $pengguna->nama; ?></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td><?= $pengguna->username; ?></td>
                                </tr>
                                <tr>
                                    <td>No Telp</td>
                                    <td><?= $pengguna->kode_negara; ?><?= $pengguna->telp; ?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        <?php if ($pengguna->aktif == 1) : ?>
                                            Aktif
                                        <?php else : ?>
                                            Nonaktif
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bergabung Sejak</td>
                                    <td>
                                        <?= date('d M Y', $pengguna->tgl_bergabung); ?>
                                    </td>
                                </tr>
                            </table>
                            <a href="<?= base_url('user/settings'); ?>" class="btn btn-success"><i class="fas fa-cogs"></i> Pengaturan Akun</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>