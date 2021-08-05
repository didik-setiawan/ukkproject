<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Laporan Petugas</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        section {
            margin: 10px;
            padding: 5px;
        }

        .head {
            text-align: center;
        }

        hr {
            margin-top: 5px;
            margin-bottom: 5px;
        }

        table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
        }

        table tr th,
        td {
            padding: 3px;
            border: 1px solid #000000;
        }
    </style>
</head>

<body>


    <section>
        <div class="head">
            <h3>Aplikasi Pengaduan Masyarakat</h3>
            <h5>Laporan Petugas</h5>
        </div>
        <hr>
        <small>Tanggal Cetak : <?php date_default_timezone_set('Asia/Jakarta');
                                echo date('d M Y');  ?></small>

        <table>

            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>No Telp</th>
            </tr>

            <?php
            $i = 1;
            foreach ($petugas as $p) { ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $p->nama; ?></td>
                    <td><?= $p->username; ?></td>
                    <td><?= $p->telp; ?></td>
                </tr>
            <?php } ?>

        </table>
    </section>


</body>

</html> -->


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
            <p>Laporan Petugas</p>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>No Telp</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($petugas as $p) { ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $p->nama; ?></td>
                        <td><?= $p->username; ?></td>
                        <td><?= $p->telp; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</body>

</html>