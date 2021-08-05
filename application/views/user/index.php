<div class="jumbotron text-center" style="margin-top: 50px;">
    <img src="<?= base_url('asset/img/user.png'); ?>" width="17%" class="img-thumbnail rounded-circle">
    <h2 class="display-6"><?= $pengguna->nama; ?></h2>
    <p class="lead">NIK : <?= $pengguna->nik; ?></p>
</div>
<div class="container" style="margin-bottom: 90px;">
    <div class="row my-3">
        <div class="col-lg-3" id="panel">
            <div class="card shadow">
                <ul class="list-group list-group-flush">
                    <a href="<?= base_url('user/profile'); ?>" class="list-group-item text-dark">Profil Anda</a>
                    <a href="<?= base_url('user/settings'); ?>" class="list-group-item text-dark">Pengaturan Akun</a>
                    <li class="list-group-item">Pengaduan Terkirim <span class="badge bg-danger"><?= $this->db->get_where('tb_pengaduan', ['id_masyarakat' => $pengguna->id_masyarakat])->num_rows(); ?></span></li>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h5>Selamat Datang <?= $pengguna->nama; ?></h5>
                    <hr>
                    <p>Untuk membuat pengaduan, silahkan klik tombol di bawah ini</p>
                    <a href="<?= base_url('user/add_pengaduan'); ?>" class="btn btn-success"><i class="fas fa-pencil-alt"></i> Buat Pengaduan</a>
                </div>
            </div>


            <?php foreach ($pengaduan as $p) { ?>

                <div class="card shadow mt-3">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header bg-white d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-dark"><i class="fa fa-user"></i> <?= $p->nama; ?> <br>
                            <small class="text-muted" style="font-size: 10px;">Tanggal Upload : <?php date_default_timezone_set('Asia/Jakarta');
                                                                                                echo date('d M Y', $p->id_pengaduan); ?><br>Kepada : <?= $p->nama_kategori; ?></small>
                        </h6>


                        <?php $tanggapan = $this->db->get_where('tb_tanggapan', ['id_pengaduan' => $p->id_pengaduan])->num_rows(); ?>

                        <div class="dropdown">
                            <a type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <li><a class="dropdown-item" href="<?= base_url('user/detail_pengaduan/') . md5($p->id_pengaduan); ?>">Lihat Detail</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="container" style="margin-bottom: -10px;">

                        <p><?= $p->isi_pengaduan; ?></p>
                    </div>
                    <img src="<?= base_url('asset/upload/') . $p->foto; ?>">
                    <div class="card-body text-dark" style="text-align: center;">

                        <div class="row justify-content-center">
                            <div style="background: #eeeeee; padding: 5px; width: 80%;"><i class="far fa-comment"></i><?= $tanggapan; ?></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>