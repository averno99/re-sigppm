<footer class="footer">
    © 2018 Annex by Mannatthemes.
</footer>

</div>
<!-- End Right content here -->

</div>
<!-- END wrapper -->


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

<!-- Required datatable js -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Responsive examples -->
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
<!-- Leaflet -->
<script src="<?= base_url() ?>assets/plugins/leaflet/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<script src="<?= base_url() ?>assets/plugins/leaflet/leaflet.ajax.js"></script>
<!-- Sweet-Alert  -->
<script src="<?= base_url() ?>assets/plugins/sweet-alert2/sweetalert2.all.min.js"></script>
<!-- Chart JS  -->
<script src="<?= base_url() ?>assets/plugins/chartjs/Chart.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/chartjs/chartjs-plugin-datalabels.min.js"></script>

<!-- App js -->
<script src="<?= base_url() ?>assets/js/app.js"></script>

<!-- Leaflet -->
<?php if ($this->uri->segment(2) == 'malaria') : ?>
    <?php include 'mapMalaria.php'; ?>
<?php elseif ($this->uri->segment(2) == 'dbd') : ?>
    <?php include 'mapDBD.php'; ?>
<?php elseif ($this->uri->segment(2) == 'kusta') : ?>
    <?php include 'mapKusta.php'; ?>
<?php endif; ?>
<!-- End Leaflet -->

<!-- Grafik -->
<?php include 'grafik.php'; ?>
<!-- End Grafik -->

<!-- File Input -->
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
<!-- End File Input -->

<!-- Datatables -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": false,
            "autoWidth": false,
            "language": {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ data",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
                "sInfoFiltered": "(disaring dari _MAX_ data keseluruhan)",
                "sInfoPostFix": "",
                "sSearchPlaceholder": "Cari...",
                "sSearch": "Cari:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                }
            }
        });
    });
</script>
<!-- End Datables -->

<!-- Sweetalert -->
<script>
    const flashData = $('.flash-data').data('flashdata');
    if (flashData) {
        Swal.fire({
            title: 'Data',
            text: 'Berhasil ' + flashData,
            icon: 'success'
        });
    }

    $('.tombol-hapus').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data akan dihapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus Data!'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    })
</script>
<!-- End Sweetalert -->

</body>

</html>