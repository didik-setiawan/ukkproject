<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('asset/bootstrap/bootstrap.min.css'); ?>">
    <link rel="icon" href="<?= base_url('asset/img/logo.png'); ?>">
    <title>Sign Up | Aplikasi Pengaduan Masyarakat</title>
    <style>
        .card {
            padding: 40px 0 40px;
            margin-top: 5%;
            margin-bottom: 5%;
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

        #img {
            margin: 27% 0 20%;
        }

        @media screen and (max-width : 991px) {
            #thumbnail {
                display: none;
            }
        }
    </style>
</head>

<body class="bg-primary">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-lg-6" id="form">
                                <div style="text-align: center;">
                                    <img src="<?= base_url('asset/img/logo.png'); ?>" alt="logo" width="70px">
                                </div>
                                <h4 class="text-center">Aplikasi Pengaduan Masyarakat</h4>
                                <h6 class="text-center">Kecamatan Umbulsari</h6>
                                <p class="text-center">Daftar Akun Baru</p>
                                <form action="<?= base_url('auth/register'); ?>" method="post">
                                    <div class="form-group">
                                        <input type="text" name="nik" id="nik" class="form-control <?php if (form_error('nik')) : ?>is-invalid<?php endif; ?>" placeholder="NIK" value="<?= set_value('nik'); ?>">
                                        <?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group mt-3">
                                        <input type="text" name="nama" id="nama" class="form-control <?php if (form_error('nama')) : ?>is-invalid<?php endif; ?>" placeholder="Nama" value="<?= set_value('nama'); ?>">
                                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group mt-3">
                                        <input type="text" name="username" id="username" class="form-control <?php if (form_error('username')) : ?>is-invalid<?php endif; ?>" placeholder="Username" value="<?= set_value('username'); ?>">
                                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-5 mt-3">
                                            <select name="kode-negara" class="form-control <?php if (form_error('kode-negara')) : ?>is-invalid<?php endif; ?>">
                                                <option value="">Kode Negara</option>
                                                <option value="+62">+62 Indonesia</option>
                                                <option value="+65">+65 Singapura</option>
                                                <option value="+60">+60 Malaysia</option>
                                            </select>
                                            <?= form_error('kode-negara', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="col-sm-7 mt-3">
                                            <input type="text" name="telp" id="telp" class="form-control <?php if (form_error('password')) : ?>is-invalid<?php endif; ?>" placeholder="No Telp" value="<?= set_value('telp'); ?>">
                                            <?= form_error('telp', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <input type="password" name="password" id="password" placeholder="Password" class="form-control <?php if (form_error('repassword')) : ?>is-invalid<?php endif; ?>">
                                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group mt-3 mb-3">
                                        <input type="password" name="repassword" id="repassword" placeholder="Ulangi Password" class="form-control <?php if (form_error('repassword')) : ?>is-invalid<?php endif; ?>">
                                        <?= form_error('repassword', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="g-recaptcha" data-sitekey="6LcJ96caAAAAAMnVSV4nS3GJ2hXNaXe1K0mADz7r"></div>
                                        <?= form_error('g-recaptcha-response', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <div class="row justify-content-center">
                                        <button type="submit" class="btn btn-primary" id="btn-auth">Daftar</button>
                                    </div>
                                    <p class="text-center mt-2">Sudah punya akun, <a href="<?= base_url('auth'); ?>">Login</a> di sini</p>
                                </form>
                            </div>

                            <div class="col-lg-6" id="thumbnail">
                                <img src="<?= base_url('asset/img/sign_up.svg'); ?>" width="500px" id="img">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('asset/bootstrap/bootstrap.bundle.min.js'); ?>"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </script>
</body>

</html>