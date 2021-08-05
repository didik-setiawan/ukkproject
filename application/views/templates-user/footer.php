<div class="pesan-benar" data-pesan="<?= $this->session->flashdata('benar'); ?>"></div>
<div class="pesan-salah" data-pesan="<?= $this->session->flashdata('salah'); ?>"></div>
<footer class="sticky-footer text-center bg-white p-2 shadow fixed-bottom">
    <p class="mt-2">Copyright &copy; 2021 Didik Setiawan</p>
</footer>

<script src="<?= base_url('asset/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('asset/bootstrap/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('asset/swall/dist/sweetalert2.all.min.js'); ?>"></script>
<script src="<?= base_url('asset/user.js'); ?>"></script>
</body>

</html>