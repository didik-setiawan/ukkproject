<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <h1 class="h3 mb-0 text-gray-800">Selamat Datang <?= $pengguna->nama; ?></h1>
  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow mt-2">
        <div class="card-body">
          <div class="row">

            <div class="col-md-3">
              <div class="card border-primary">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Pengaduan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php if ($this->session->userdata('kategori') == 0) : ?>
                          <?= $this->db->get('tb_pengaduan')->num_rows(); ?>
                        <?php else : ?>
                          <?= $this->db->get_where('tb_pengaduan', ['id_kategori' => $pengguna->id_kategori])->num_rows(); ?>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-bullhorn fa-2x text-muted"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="card border-success">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Masyarakat</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->db->get('tb_masyarakat')->num_rows(); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-muted"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="card border-warning">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Petugas</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php if ($this->session->userdata('kategori') == 0) : ?>
                          <?= $this->db->get_where('tb_admin', ['level' => 2])->num_rows(); ?>
                        <?php else : ?>
                          <?= $this->db->get_where('tb_admin', ['level' => 2, 'id_kategori' => $pengguna->id_kategori])->num_rows(); ?>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-friends fa-2x text-muted"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php if ($this->session->userdata('level') == 1) : ?>
              <div class="col-md-3">
                <div class="card border-danger">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Admin</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->db->get_where('tb_admin', ['level' => 1])->num_rows(); ?></div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-user-tie fa-2x text-muted"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php else : ?>
              <div class="col-md-3">
                <div class="card border-danger">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Hari Ini</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php date_default_timezone_set('Asia/Jakarta');
                                                                            echo date('d M Y'); ?></div>
                      </div>
                      <div class="col-auto">
                        <i class="fa fa-calendar fa-2x text-muted"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          </div>
          <h5 class="mt-2 mb-2">Pengaduan Terakhir</h5>
          <table class="table table-bordered">
            <thead class="table-info">
              <tr>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Isi Pengaduan</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($pengaduan as $p) { ?>
                <tr>
                  <td><?= date('d M Y', $p->id_pengaduan); ?></td>
                  <td><?= date('H:i', $p->id_pengaduan); ?></td>
                  <td><?= $p->isi_pengaduan; ?></td>
                  <td><?php if ($p->status == 0) : ?>
                      <p class="text-danger"><i class="fa fa-times"></i> Proses</p>
                    <?php else : ?>
                      <p class="text-success"><i class="fa fa-check"></i> Selesai</p>
                    <?php endif; ?>
                  </td>
                </tr>
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