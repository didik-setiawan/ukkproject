<div class="container" style="margin-top : 70px; margin-bottom : 90px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <h5>Edit Profil</h5>
                    <hr>
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <table class="table table-bordered">
                                <tr>
                                    <td>NIK</td>
                                    <td><?= $pengguna->nik; ?></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td>
                                        <?= $pengguna->username; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td><?= $pengguna->nama; ?> <a href="<?= base_url('user/setting_name'); ?>" class="float-end"><i class="fa fa-pen"></i></a></td>
                                </tr>
                                <tr>
                                    <td>No Telp</td>
                                    <td><?= $pengguna->kode_negara; ?><?= $pengguna->telp; ?><a href="<?= base_url('user/setting_phone'); ?>" class="float-end"><i class="fa fa-pen"></i></a></td>
                                </tr>
                            </table>
                            <a href="<?= base_url('user/setting_password'); ?>" class="btn btn-success"><i class="fa fa-key"></i> Edit Password</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>