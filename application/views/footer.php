           </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Payroll Management IFN <?= date('Y') ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content flat" style="border-radius: 0px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda akan Keluar ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih Logout untuk keluar dari sesi ini..</div>
                <div class="modal-footer">
                    <a href="" data-dismiss="modal" class="btn btn-danger btn-icon-split btn-sm flat font-kecil mb-1">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-circle-left"></i>
                        </span>
                        <span class="text">Batal</span>
                    </a>
                    <a href="<?= base_url().'login/logout' ?>" class="btn btn-success btn-icon-split btn-sm flat font-kecil mb-1">
                        <span class="icon text-white-50">
                            <i class="fas fa-fw fa-door-open"></i>
                        </span>
                        <span class="text">Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url().'assets/plugins/jquery/jquery-3.3.1.js' ?>"></script>
    <script src="<?= base_url().'assets/plugins/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url().'assets/plugins/jquery-easing/jquery.easing.min.js' ?>"></script>
    <script src="<?= base_url().'assets/plugins/toast/jquery.toast.min.js' ?>"></script>  

    <!-- Page level plugins -->
    <script src="<?= base_url().'assets/plugins/datatables/dataTables.min.js' ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url().'assets/js/sb-admin-2.min.js' ?>"></script>

    <script src="<?= base_url().'assets/plugins/datepicker/dist/js/bootstrap-datepicker.js' ?>"></script>

    <!-- Custom scripts me-->
    <script src="<?= base_url().'assets/js/myscript.js' ?>"></script>

    <?php if($this->session->flashdata('msg')=='akseserror'){ ?>
            <script type="text/javascript">
                pesan('info','Anda tidak bisa akses Menu, Hubungi administrator data');
            </script>
    <?php } ?>
    <?php if($this->session->flashdata('msgupload')){ ?>
            <script type="text/javascript">
                pesan('warning','Gambar tidak bisa diupload, pastikan ukuran max 1MB dan tipe File PNG,JPG atau JPEG');
            </script>
    <?php } ?>
    <!-- Custom JS untuk tiap page -->
    <?php switch ($modul) {
        case 'didik': ?>
            <script src="<?= base_url().'assets/js/jsdidik.js' ?>"></script>
    <?php
            break;
        case 'bagian' : ?>
            <script src="<?= base_url().'assets/js/jsbagian.js' ?>"></script>
    <?php
            break;
        case 'jabatan' : ?>
            <script src="<?= base_url().'assets/js/jsjabatan.js' ?>"></script>
    <?php 
            break;
        case 'pengguna' : ?>
            <script src="<?= base_url().'assets/js/jspengguna.js' ?>"></script>
    <?php 
            break;
        case 'personil' : ?>
            <script src="<?= base_url().'assets/js/jspersonil.js' ?>"></script>
    <?php 
            break;
        case 'mastergaji' : ?>
            <script src="<?= base_url().'assets/js/jsmastergaji.js' ?>"></script>
    <?php
            break;
        case 'payroll' : ?>
            <script src="<?= base_url().'assets/js/jspayroll.js' ?>"></script>
    <?php
            break;
        default:
            # code...
            break;
    } ?>

</body>

</html>