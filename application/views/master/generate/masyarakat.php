<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('asset/bootstrap/bootstrap.min.css'); ?>">
    <title>Generate Laporan Masyarakat</title>

    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        img {
            width: 50px;
            position: absolute;
        }

        table thead tr {
            background: #0dcaf0;
            border: 1px solid #424242;
        }


        table thead tr th {
            padding: 5px;
            border-right: 1px solid #424242;
            color: #424242;
        }

        table tbody tr {
            border: 1px solid #424242;
        }

        table tbody tr td {
            padding: 5px;
            border-right: 1px solid #424242;
        }

        .text-center {
            text-align: center;
            margin-top: -65px;
        }
    </style>

</head>

<body>
    <section>
        <img src="<?= base_url('asset/img/logo.png'); ?>">
        <div class="text-center">
            <h3>PEMERINTAH KABUPATEN JEMBER</h3>
            <h4 style="margin: 0;">KECAMATAN UMBULSARI</h4>
            <p>Jl. Ahmad Yani No.51 Umbulsari, Jember 68166</p>
            <hr>
            <h4>Aplikasi Pengaduan Masyarakat</h4>
            <p>Laporan Masyarakat</p>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>No Telp</th>
                    <th>Tgl Bergabung</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($masyarakat as $m) { ?>
                    <tr>
                        <td><?= $m->nik; ?></td>
                        <td><?= $m->nama; ?></td>
                        <td><?= $m->username; ?></td>
                        <td><?= $m->telp; ?></td>
                        <td><?php date_default_timezone_set('Asia/Jakarta');
                            echo date('d M Y', $m->tgl_bergabung); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</body>

</html>