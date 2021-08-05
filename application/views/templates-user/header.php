<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('asset/bootstrap/bootstrap.min.css'); ?>">
    <link href="<?= base_url('asset/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url('asset/swall/dist/sweetalert2.min.css'); ?>">
    <link rel="icon" href="<?= base_url('asset/img/logo.png'); ?>">

    <title><?= $title; ?></title>
    <style>
        nav {
            background: #1200b3;
        }

        .nav-link:hover {
            border-bottom: 1px solid #d9e31e;
        }

        .jumbotron {
            background: #1d4dde;
            color: #ffffff;
            padding: 2rem 1rem;
        }

        .active {
            border-bottom: 1px solid #d9e31e;
        }

        @media screen and (max-width : 991px) {
            #panel {
                display: none;
            }
        }

        @media screen and (max-width: 576px) {
            #img-comment {
                display: none;
            }
        }

        @media screen and (min-width: 577px) {
            #icon-comment {
                display: none;
            }
        }
    </style>
</head>

<?php $jml_notifikasi = $this->db->get_where('tbl_notifikasi', ['kepada' => $pengguna->id_masyarakat, 'status' => 0])->num_rows(); ?>



<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark shadow fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('user'); ?>">
                <img src="<?= base_url('asset/img/logo.png'); ?>" width="30px" class="d-inline-block align-text-top">
                Pengaduan Masyarakat
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="<?= base_url('user'); ?>"><i class="fa fa-home"></i> Home</a>
                    <a class="nav-link" href="<?= base_url('user/profile'); ?>"><i class="fa fa-user"></i> <?= $pengguna->nama; ?></a>
                    <a class="nav-link" href="<?= base_url('user/notification'); ?>"><i class="far fa-bell">
                            <?php if ($jml_notifikasi) : ?>
                                <span class="badge bg-danger"><?= $jml_notifikasi; ?></span>
                            <?php endif; ?>
                        </i></a>
                    <a class="nav-link" href="<?= base_url('auth/logout'); ?>"><i class="fa fa-sign-out-alt"></i> Logout</a>

                </div>
            </div>
        </div>
    </nav>