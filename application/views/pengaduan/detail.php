<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <h1 class="h3 mb-0 text-gray-800">Detail Pengaduan</h1>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow mt-2">
                <div class="card-header bg-white">

                    <h6 class="m-0 font-weight-bold text-dark"><i class="fa fa-user"></i> <?= $pengaduan->nama; ?> <br>
                        <small class="text-muted" style="font-size: 12px;">Tanggal Upload : <?php date_default_timezone_set('Asia/Jakarta');
                                                                                            echo date('d M Y', $pengaduan->id_pengaduan); ?> | Kepada : <?= $pengaduan->nama_kategori; ?></small>
                    </h6>
                    <div class="dropdown float-right" style="top: -35px;">
                        <a id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                            <a class="dropdown-item btn-delete" href="<?= base_url('pengaduan/delete/') . md5($pengaduan->id_pengaduan); ?>">Hapus</a>
                            <?php if ($this->session->userdata('kategori') != 0) : ?>
                                <?php if ($pengaduan->status == 0) : ?>
                                    <a class="dropdown-item" href="<?= base_url('pengaduan/edit_status/') . md5($pengaduan->id_pengaduan); ?>">Terima Pengaduan</a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <p><?= $pengaduan->isi_pengaduan; ?></p>
                </div>
                <img src="<?= base_url('asset/upload/') . $pengaduan->foto; ?>">
                <hr>
                <div class="card-body">
                    <?php if (empty($tanggapan)) : ?>
                        <p class="text-center">Belum ada Tanggapan</p>
                    <?php else : ?>
                        <?php foreach ($tanggapan as $p) { ?>
                            <div class="row mt-2">
                                <div class="col-sm-1">
                                    <img src="<?= base_url('asset/img/user.png'); ?>" width="30px" class="rounded-circle">
                                </div>
                                <div class="col-sm-11">
                                    <div class="card" style="padding: 10px;">
                                        <b><?= $p->nama; ?></b>
                                        <?php if ($p->id_admin == $pengguna->id_admin) : ?>
                                            <div class="dropdown" style="margin-top: -25px;">
                                                <a class="float-right" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="<?= base_url('pengaduan/del_tanggapan/') . md5($p->id_tanggapan) . '/' . $this->uri->segment(3); ?>">Hapus</a>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <p class="text-muted"><?= $p->isi_tanggapan; ?></p>
                                        <small class="text-muted" style="font-size : 10px"><?= date('d M Y', $p->id_tanggapan); ?></small>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php endif; ?>
                    <hr>
                    <form action="<?= base_url('pengaduan/detail/') . md5($pengaduan->id_pengaduan); ?>" method="post">
                        <div class="form-group row">
                            <label class="col-sm-2" style="font-size: 14px;">Berikan Tanggapan</label>
                            <div class="col-sm-9">
                                <input type="text" name="tanggapan" id="tanggapan" class="form-control <?php if (form_error('tanggapan')) : ?>is-invalid<?php endif; ?>">
                                <?= form_error('tanggapan', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="col-sm-1">
                                <button type="submit" class="btn btn-sm" style="background : #2ea397; color : #ffffff;"><i class="far fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</div>
<!---Container Fluid-->
</div>