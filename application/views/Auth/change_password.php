<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('asset/bootstrap/bootstrap.min.css'); ?>">
    <link rel="icon" href="<?= base_url('asset/img/logo.png'); ?>">
    <title>Reset Password</title>
    <style>
        .card {
            padding: 50px 0 50px;
            margin-top: 7%;
            margin-bottom: 7%;
        }

        .form-control {
            width: 100%;
            height: 45px;
            background: #eeeeee;
            border: none;
            border-radius: 25px;
        }

        .form-control:focus {
            background: #eeeeee;
        }

        #btn-auth {
            width: 80%;
            height: 45px;
            border-radius: 25px;
            margin-top: 20px;
        }

        #btn-auth:hover {
            background: #ffffff;
            color: blue;
        }
    </style>
</head>

<body class="bg-primary">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow">
                    <div class="card-body">
                        <div style="text-align: center;">
                            <img src="<?= base_url('asset/img/logo.png'); ?>" alt="logo" width="70px">
                        </div>
                        <h4 class="text-center">Aplikasi Pengaduan Masyarakat</h4>
                        <h6 class="text-center">Kecamatan Umbulsari</h6>
                        <p class="text-center">Reset Password</p>
                        <p class="text-center">Username : <?= $this->session->userdata('reset_password'); ?></p>
                        <?php if ($this->session->flashdata('berhasil')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('berhasil'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php elseif ($this->session->flashdata('gagal')) : ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('gagal'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <form action="<?= base_url('auth/change_password'); ?>" method="post">
                            <div class="form-group">
                                <input type="password" name="new_password" id="new_password" class="form-control <?php if (form_error('new_password')) : ?>is-invalid<?php endif; ?>" placeholder="Password baru" value="<?= set_value('new_password'); ?>">
                                <?= form_error('new_password', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group mt-3">
                                <input type="password" name="repassword" id="repassword" value="<?= set_value('repassword'); ?>" placeholder="Ulangi Password" class="form-control <?php if (form_error('repassword')) : ?>is-invalid<?php endif; ?>">
                                <?= form_error('repassword', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-primary" id="btn-auth">Reset</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="<?= base_url('asset/bootstrap/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>