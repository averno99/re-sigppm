    <!-- jQuery  -->
    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/modernizr.min.js"></script>
    <script src="<?= base_url() ?>assets/js/detect.js"></script>
    <script src="<?= base_url() ?>assets/js/fastclick.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.slimscroll.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.blockUI.js"></script>
    <script src="<?= base_url() ?>assets/js/waves.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.nicescroll.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.scrollTo.min.js"></script>

    <!-- Toastr JS -->
    <script src="<?= base_url() ?>assets/plugins/toastr/toastr.min.js"></script>
    <!-- App js -->
    <script src="<?= base_url() ?>assets/js/app.js"></script>

    <script>
        const flashData = $('.flash-data').data('flashdata');
        if (flashData) {
            toastr.error(flashData, 'Maaf Gagal Login');
        }
    </script>

    </body>

    </html>