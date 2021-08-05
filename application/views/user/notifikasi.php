<?php date_default_timezone_set('Asia/Jakarta'); ?>
<div class="container" style="margin-top: 70px; margin-bottom : 90px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <h5>Notifikasi</h5>
                    <hr>
                    <div class="row">
                        <?php foreach ($notif as $n) { ?>
                            <div class="col-lg-12">
                                <div class="alert alert-secondary" role="alert">
                                    <b><i class="fa fa-user"></i> <?= $n->nama; ?></b>
                                    <p><?= $n->isi_notifikasi; ?></p>
                                    <small class="text-muted"><?= date('d M Y', $n->tanggal); ?></small>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>