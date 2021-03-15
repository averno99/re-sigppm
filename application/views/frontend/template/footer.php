<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="#" class="logo d-flex align-items-center">
                        <img src="<?= base_url() ?>assets/frontend/img/logoicon.png" alt="">
                        <span>SIGPPM-KKU</span>
                    </a>
                    <p>Sistem Informasi Geografis Pemetaan Penyakit Menular Kabupaten Kayong Utara adalah sebuah sistem untuk melakukan pemetaan penyakit menular berdasarkan pengukuran epidemiologi. Penyakit menular yang dipetakan dalam sistem ini ada 3 jenis yaitu DBD, Malaria, dan Kusta</p>
                    <div class="social-links mt-3">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram bx bxl-instagram"></i></a>
                        <a href="#" class="whatsapp"><i class="bi bi-whatsapp bx bxl-whatsapp"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Link</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Beranda</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Penyakit</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Pemetaan</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Grafik</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Puskesmas</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a style="pointer-events: none; display: inline-block;" href=" #"> Sukadana </a></li>
                        <li><i class="bi bi-chevron-right"></i> <a style="pointer-events: none; display: inline-block;" href="#"> Siduk </a></li>
                        <li><i class="bi bi-chevron-right"></i> <a style="pointer-events: none; display: inline-block;" href="#"> Teluk Melano </a></li>
                        <li><i class="bi bi-chevron-right"></i> <a style="pointer-events: none; display: inline-block;" href="#"> Teluk Batang </a></li>
                        <li><i class="bi bi-chevron-right"></i> <a style="pointer-events: none; display: inline-block;" href="#"> Sungai Paduan </a></li>
                        <li><i class="bi bi-chevron-right"></i> <a style="pointer-events: none; display: inline-block;" href="#"> Telaga Arum </a></li>
                        <li><i class="bi bi-chevron-right"></i> <a style="pointer-events: none; display: inline-block;" href="#"> Pelapis </a></li>
                        <li><i class="bi bi-chevron-right"></i> <a style="pointer-events: none; display: inline-block;" href="#"> Tanjung Satai </a></li>
                        <li><i class="bi bi-chevron-right"></i> <a style="pointer-events: none; display: inline-block;" href="#"> Matan Jaya </a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Kontak Kami</h4>
                    <p>
                        Jl. Bhayangkara, Sutera, <br>
                        Sukadana, Kabupaten Kayong Utara, <br>
                        Kalimantan Barat 78852 <br><br>
                        <strong>Telepon:</strong> (0561) 7706678<br>
                        <strong>Email:</strong> dinkes_kku@example.com<br>
                    </p>

                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            Copyright &copy;2021 <strong><span>Averno</span></strong>
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?= base_url() ?>assets/frontend/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="<?= base_url() ?>assets/frontend/vendor/aos/aos.js"></script>
<script src="<?= base_url() ?>assets/frontend/vendor/php-email-form/validate.js"></script>
<script src="<?= base_url() ?>assets/frontend/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/vendor/purecounter/purecounter.js"></script>
<script src="<?= base_url() ?>assets/frontend/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/vendor/fontawesome/js/all.min.js"></script>
<!-- Leaflet -->
<script src="<?= base_url() ?>assets/frontend/vendor/leaflet/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<script src="<?= base_url() ?>assets/frontend/vendor/leaflet/leaflet.ajax.js"></script>
<!-- Chart JS  -->
<script src="<?= base_url() ?>assets/frontend/vendor/chartjs/Chart.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/vendor/chartjs/chartjs-plugin-datalabels.min.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url() ?>assets/frontend/js/main.js"></script>

<!-- Leaflet -->
<?php if ($this->uri->segment(2) == 'pemetaan_malaria') : ?>
    <?php include 'map/map_malaria.php'; ?>
<?php elseif ($this->uri->segment(2) == 'pemetaan_dbd') : ?>
    <?php include 'map/map_dbd.php'; ?>
<?php elseif ($this->uri->segment(2) == 'pemetaan_kusta') : ?>
    <?php include 'map/map_Kusta.php'; ?>
<?php endif; ?>
<!-- End Leaflet -->

<!-- Grafik -->
<?php if ($this->uri->segment(2) == 'grafik_malaria') : ?>
    <?php include 'grafik/grafikMalaria.php'; ?>
<?php elseif ($this->uri->segment(2) == 'grafik_kusta') : ?>
    <?php include 'grafik/grafikKusta.php'; ?>
<?php elseif ($this->uri->segment(2) == 'grafik_dbd') : ?>
    <?php include 'grafik/grafikDbd.php'; ?>
<?php endif; ?>
<!-- End Grafik -->

</body>

</html>