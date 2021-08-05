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
    <?php date_default_timezone_set('Asia/Jakarta'); ?>
    <section>
        <img src="<?= base_url('asset/img/logo.png'); ?>">
        <div class="text-center">
            <h3>PEMERINTAH KABUPATEN JEMBER</h3>
            <h4 style="margin: 0;">KECAMATAN UMBULSARI</h4>
            <p>Jl. Ahmad Yani No.51 Umbulsari, Jember 68166</p>
            <hr>
            <h4>Aplikasi Pengaduan Masyarakat</h4>
            <p>Laporan Pengaduan</p>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Isi Pengaduan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($pengaduan as $p) { ?>
                    <tr>
                        <td><?= date('d M Y', $p->id_pengaduan) ?></td>
                        <td><?= date('H:i', $p->id_pengaduan); ?></td>
                        <td><?= $p->nik; ?></td>
                        <td><?= $p->nama; ?></td>
                        <td><?= $p->isi_pengaduan ?></td>
                        <td>
                            <?php if ($p->status == 0) : ?>
                                Proses
                            <?php else : ?>
                                Selesai
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</body>

</html>