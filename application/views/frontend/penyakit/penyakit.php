<main id="main">

    <!-- ======= Features Section ======= -->
    <section id="features" class="features mt-5">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h2><?= $judul ?></h2>
                <p>Memberikan Informasi Mengenai Penyakit Menular</p>
            </header>

            <!-- Feature Tabs -->
            <div class="row feture-tabs" data-aos="fade-up">
                <div class="col-lg-12">
                    <!-- Tabs -->
                    <ul class="nav nav-pills mb-3">
                        <li>
                            <a class="nav-link active" data-bs-toggle="pill" href="#dbd">DBD</a>
                        </li>
                        <li>
                            <a class="nav-link" data-bs-toggle="pill" href="#malaria">Malaria</a>
                        </li>
                        <li>
                            <a class="nav-link" data-bs-toggle="pill" href="#kusta">Kusta</a>
                        </li>
                    </ul><!-- End Tabs -->

                    <!-- Tab Content -->
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="dbd">
                            <?php include 'dbd.php'; ?>
                        </div><!-- End Tab 1 Content -->

                        <div class="tab-pane fade show" id="malaria">
                            <?php include 'malaria.php'; ?>
                        </div><!-- End Tab 2 Content -->

                        <div class="tab-pane fade show" id="kusta">
                            <?php include 'kusta.php'; ?>
                        </div><!-- End Tab 3 Content -->

                    </div>

                </div>

                <div class="col-lg-6">
                    <img src="assets/img/features-2.png" class="img-fluid" alt="">
                </div>

            </div><!-- End Feature Tabs -->

            <!-- Feature Tabs -->
            <!-- <div class="row feture-tabs" data-aos="fade-up">
                <div class="col-lg-12">
                    <ul class="nav nav-pills mb-3">
                        <?php foreach ($penyakit as $pyk) : ?>
                            <li>
                                <a class="nav-link" data-bs-toggle="pill" href="#tab<?= $pyk['id'] ?>"><?= $pyk['penyakit'] ?></a>
                            </li>
                        <?php endforeach; ?>

                    </ul>
                    <div class="tab-content">
                        <?php foreach ($penyakit as $pyk) : ?>

                            <div class="tab-pane fade show" id="tab<?= $pyk['id'] ?>">
                                <p><?= $pyk['keterangan'] ?></p>

                            </div>
                        <?php endforeach; ?>

                    </div>

                </div>
            </div> -->
            <!-- End Feature Tabs -->



        </div>

    </section><!-- End Features Section -->


</main><!-- End #main -->