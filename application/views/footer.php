           </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
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
                <div class="modal-body">Pilih Logout untuk keluar dari sesi ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-secondary flat" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-sm btn-primary flat" href="<?= base_url().'login/logout' ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url().'assets/plugins/jquery/jquery.min.js' ?>"></script>
    <script src="<?= base_url().'assets/plugins/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url().'assets/plugins/jquery-easing/jquery.easing.min.js' ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url().'assets/js/sb-admin-2.min.js' ?>"></script>

    <!-- Custom scripts me-->
    <script src="<?= base_url().'assets/js/myscript.js' ?>"></script>

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
        default:
            # code...
            break;
    } ?>

</body>

</html>