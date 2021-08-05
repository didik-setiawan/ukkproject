<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <h1 class="h3 mb-0 text-gray-800">Profil Anda</h1>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mt-2">
                <div class="card-body">
                    <center>
                        <img src="<?= base_url('asset/img/user.png'); ?>" class="rounded-circle img-thumbnail" width="100px;">
                        <div class="col-lg-9">
                            <table class="table table-bordered mt-3">
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
                                    <td><?= $pengguna->telp; ?></td>
                                </tr>
                            </table>
                        </div>
                    </center>

                    <a href="<?= base_url('admin/settings'); ?>" class="btn btn-success mt-3"><i class="fas fa-cogs"></i> Pengaturan Akun</a>

                </div>
            </div>
        </div>
    </div>


</div>
<!---Container Fluid-->
</div>