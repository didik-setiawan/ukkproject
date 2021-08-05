<?php $tanggapan = $this->db->get_where('tb_tanggapan', ['id_pengaduan' => $pengaduan->id_pengaduan])->num_rows(); ?>
<div class="container" style="margin-top: 70px; margin-bottom: 90px;">
	<div class="row">
		<div class="co-lg-12">
			<div class="card shadow m-0">
				<div class="row">
					<div class="col-lg-6">
						<div class="card-body">

							<i class="fa fa-user"></i> <strong><?= $pengaduan->nama; ?></strong><br>
							<small class="text-muted" style="font-size: 10px;"><?php date_default_timezone_set('Asia/Jakarta');
																				echo date('d M Y', $pengaduan->id_pengaduan); ?> |
								Kepada : <?= $pengaduan->nama_kategori; ?>
							</small>
							<hr>
						</div>
						<div class="container" style="margin-top: -20px;">
							<p><?= $pengaduan->isi_pengaduan; ?></p>
						</div>
						<img src="<?= base_url('asset/upload/') . $pengaduan->foto; ?>" class="img-thumbnail">
						<div class="card-body">
							<div style="background: #eeeeee; text-align: center; padding: 5px;"><i class="far fa-comment"></i> <?= $tanggapan; ?></div>
						</div>
					</div>

					<div class="col-lg-6">
						<div class="card-body">
							<?php if (empty($comment)) : ?>
								<p class="text-center">Belum ada Tanggapan</p>
							<?php else : ?>
								<?php foreach ($comment as $t) {  ?>
									<div class="row mt-2">
										<div class="col-sm-1">
											<img src="<?= base_url('asset/img/user.png'); ?>" width="30px" class="rounded-circle" id="img-comment">
										</div>
										<div class="col-sm-11">
											<div class="card p-2">

												<strong><i class="fa fa-user" id="icon-comment"></i> <?= $t->nama; ?></strong>
												<p><?= $t->isi_tanggapan; ?></p>
												<small class="text-muted" style="font-size: 10px; margin-top: -7px;"><?= date('d M Y', $t->id_tanggapan); ?></small>
											</div>
										</div>
									</div>
								<?php } ?>
							<?php endif; ?>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>
</div>