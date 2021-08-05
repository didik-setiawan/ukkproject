<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <h1 class="h3 mb-0 text-gray-800">Pengaturan Akun</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mt-2">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2">Username</label>
                        <div class="col-sm-8">
                            <input type="text" name="username" id="username" class="form-control" value="<?= $pengguna->username; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama" id="nama" class="form-control" value="<?= $pengguna->nama; ?>" readonly>
                        </div>
                        <div class="col-sm-2">
                            <a href="<?= base_url('admin/setting_name'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2">No Telp</label>
                        <div class="col-sm-8">
                            <input type="text" name="telp" id="telp" class="form-control" value="<?= $pengguna->telp; ?>" readonly>
                        </div>
                        <div class="col-sm-2">
                            <a href="<?= base_url('admin/setting_phone'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                        </div>
                    </div>
                    <a href="<?= base_url('admin/setting_password'); ?>" class="btn btn-warning"><i class="fa fa-key"></i> Edit Password</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!---Container Fluid-->
</div>