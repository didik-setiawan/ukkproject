 <div class="pesan-berhasil" data-pesan="<?= $this->session->flashdata('berhasil'); ?>"></div>
 <div class="pesan-gagal" data-pesan="<?= $this->session->flashdata('gagal'); ?>"></div>
 <!-- Footer -->
 <footer class="sticky-footer bg-white">
     <div class="container my-auto">
         <div class="copyright text-center my-auto">
             <span>Copyright &copy; <script>
                     document.write(new Date().getFullYear());
                 </script>
                 <b>Didik Setiawan</b>
             </span>
         </div>
     </div>
 </footer>
 <!-- Footer -->
 </div>
 </div>

 <!-- Scroll to top -->
 <a class="scroll-to-top rounded" href="#page-top">
     <i class="fas fa-angle-up"></i>
 </a>

 <script src="<?= base_url('asset/'); ?>vendor/jquery/jquery.min.js"></script>
 <script src="<?= base_url('asset/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url('asset/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
 <script src="<?= base_url('asset/'); ?>js/ruang-admin.min.js"></script>
 <script src="<?= base_url('asset/datatables/jquery.dataTables.min.js'); ?>"></script>
 <script src="<?= base_url('asset/datatables/dataTables.bootstrap4.min.js'); ?>"></script>
 <script src="<?= base_url('asset/swall/dist/sweetalert2.all.min.js'); ?>"></script>
 <script src="<?= base_url('asset/script.js'); ?>"></script>

 </body>

 </html>