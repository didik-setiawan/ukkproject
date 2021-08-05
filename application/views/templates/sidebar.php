<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark bg-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>" style="background : #1f9100;">
            <div class="sidebar-brand-icon">
                <img src="<?= base_url('asset/img/logo.png'); ?>">
            </div>
            <div class="sidebar-brand-text mx-3">Pengaduan Masyarakat</div>
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            <?php if ($this->session->userdata('kategori') == 0) : ?>
                Admin
            <?php else : ?>
                <?= $this->db->get_where('tbl_kategori', ['id_kategori' => $this->session->userdata('kategori')])->row()->nama_kategori; ?>
            <?php endif; ?>
        </div>
        <?php if ($this->session->userdata('level')) : ?>
            <?php if ($this->session->userdata('level') == 1) : ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
                        <i class="far fa-fw fa-window-maximize"></i>
                        <span>Management Data</span>
                    </a>
                    <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url('master/petugas'); ?>">Data Petugas</a>
                            <a class="collapse-item" href="<?= base_url('master/masyarakat'); ?>">Data Masyarakat</a>
                            <a class="collapse-item" href="<?= base_url('master/kategori'); ?>">Data Kategori</a>
                        </div>
                    </div>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('pengaduan'); ?>">
                    <i class="fas fa-fw fa-bullhorn"></i>
                    <span>Pengaduan</span>
                </a>
            </li>
        <?php endif; ?>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                <i class="fa fa-fw fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </li>
        <hr class="sidebar-divider">
    </ul>