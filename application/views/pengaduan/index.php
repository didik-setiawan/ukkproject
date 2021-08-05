<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <h1 class="h3 mb-0 text-gray-800">Management Pengaduan</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mt-2">
                <div class="card-body">
                    <?php if ($this->session->userdata('level') == 1) : ?>
                        <a href="<?= base_url('master/pdf_pengaduan'); ?>" class="btn btn-danger mb-2" target="_blank"><i class="fa fa-download"></i> Generate ke PDF</a>
                    <?php endif; ?>
                    <table class="table table-bordered" id="AdminTable">
                        <thead class="table-success">
                            <tr>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>NIK</th>
                                <th>Isi Pengaduan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            date_default_timezone_set('Asia/Jakarta');
                            foreach ($pengaduan as $p) { ?>
                                <b>
                                    <tr>
                                        <td><?= date('d M Y', $p->id_pengaduan); ?></td>
                                        <td><?= date('H:i', $p->id_pengaduan); ?></td>
                                        <td><?= $p->nik; ?></td>
                                        <td><?= $p->isi_pengaduan; ?></td>
                                        <td>
                                            <?php if ($p->status == 0) : ?>
                                                <p class="text-danger"><i class="fa fa-times"></i> Proses</p>
                                            <?php else : ?>
                                                <p class="text-success"><i class="fa fa-check"></i> Selesai</p>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('pengaduan/detail/') . md5($p->id_pengaduan); ?>" class="btn btn-primary btn-sm"><i class="far fa-eye"></i></a>
                                        </td>
                                    </tr>
                                </b>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!---Container Fluid-->
</div>