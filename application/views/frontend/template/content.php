<main id="main">
    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h2>JUMLAH KASUS</h2>
                <p>Menampilkan Data Jumlah Kasus yang Terdaftar pada Tahun <?= $rasioM['tahun'] ?></p>
            </header>

            <div class="row">
                <div class="col-md-12 mx-auto mb-3">
                    <form action="" method="GET">
                        <div class="col-md-3 ml-auto">
                            <div class="input-group mt-2">
                                <select class="form-select" name="cari" id="cari">
                                    <option selected disabled>--Pilih Tahun--</option>
                                    <?php for ($y = date('Y'); $y >= 2000; $y--) : ?>
                                        <?php if ($y == $this->input->get('cari')) : ?>
                                            <option value="<?= $y; ?>" selected><?= $y; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $y; ?>"><?= $y; ?></option>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">Pilih</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row gy-4">


                <div class="col-lg-4 col-md-6">
                    <div class="count-box">
                        <i class="fas fa-virus" style="color: #15be56; font-size: 70px; padding-right: 30px;"></i>
                        <div>
                            <?php if (empty($rasioD['jumlah_kasus'])) : ?>
                                <?php $rasioD['jumlah_kasus'] = 0; ?>
                            <?php endif; ?>
                            <span data-purecounter-start="0" data-purecounter-end="<?= $rasioD['jumlah_kasus'] ?>" data-purecounter-duration="1" class="purecounter"></span>
                            <p>DBD</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="count-box">
                        <i class="fas fa-disease" style="color: #ee6c20; font-size: 70px; padding-right: 30px;"></i>
                        <div>
                            <?php if (empty($rasioM['mal_positif'])) : ?>
                                <?php $rasioM['mal_positif'] = 0; ?>
                            <?php endif; ?>
                            <span data-purecounter-start="0" data-purecounter-end="<?= $rasioM['mal_positif'] ?>" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Malaria</p>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="count-box">
                        <i class="fas fa-bacterium" style="color: #bb0852; font-size: 70px; padding-right: 30px;"></i>
                        <div>
                            <?php
                            $total = $rasioK['totalPB'] + $rasioK['totalMB'];
                            ?>
                            <span data-purecounter-start="0" data-purecounter-end="<?= $total ?>" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Kusta</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h2>Penyakit Menular</h2>
                <p>Memberikan Informasi Singkat Mengenai Beberapa Penyakit Menular </p>
            </header>

            <div class="row gy-4">

                <?php foreach ($penyakit as $pyk) : ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue">
                            <i class="ri-discuss-line icon"></i>
                            <h3><?= $pyk['penyakit'] ?></h3>
                            <p><?= $pyk['keterangan'] ?></p>
                            <a href="<?= site_url() ?>beranda/penyakit" class="read-more"><span>Lebih Lanjut</span> <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>

    </section><!-- End Services Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h2>Kontak Kami</h2>
                <p>Informasi Tentang Alamat, Telepon, Email, dan Jam Pelayanan Kami</p>
            </header>

            <div class="row gy-4">

                <div class="col-lg-6">
                    <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.9057119465324!2d109.96018641475389!3d-1.2254950991061304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e04989bbb4daaf3%3A0xaab0ecdcbf4941e9!2sDinas%20Kesehatan%20Kabupaten%20Kayong%20Utara!5e0!3m2!1sen!2sid!4v1615791579810!5m2!1sen!2sid" frameborder="0" style="border:0; width: 100%; height: 424px;" allowfullscreen></iframe>
                </div>

                <div class="col-lg-6">

                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Alamat</h3>
                                <p>Jl. Bhayangkara, Sutera, Sukadana, Kabupaten Kayong Utara, Kalimantan Barat 78852</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-telephone"></i>
                                <h3>Telepon Kami</h3>
                                <p>(0561) 7706678<br><br><br></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-envelope"></i>
                                <h3>Email Kami</h3>
                                <p>dinkes_kku@example.com<br><br></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-clock"></i>
                                <h3>Jam Pelayanan</h3>
                                <p>Senin - Jum'at<br>09:00 - 17:00 WIB</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </section><!-- End Contact Section -->


</main><!-- End #main -->