    <main id="main">
        <!-- ======= Values Section ======= -->
        <section id="blog" class="blog mt-5">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2><?= $judul ?></h2>
                    <p>Menampilkan Informasi Penyakit Malaria dalam Bentuk Grafik Tahun <?= $rasioM['tahun'] ?></p>
                </header>

                <div class="row">
                    <div class="mx-auto mb-3">
                        <form action="" method="GET">
                            <div class="col-md-4 ml-auto">
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

                <?php if (empty($rasioM && $apiM && $usiaM)) : ?>
                    <div class="alert alert-danger col-sm-12" role="alert">
                        Data tidak ditemukan.
                    </div>
                <?php else : ?>

                    <div class="row">
                        <div class="col-lg-12 entries">

                            <article class="entry">
                                <h2 class="entry-title">Grafik Annual Malaria Incidence (AMI) & Annual Paracite Incidence (API)</h2>
                                <div class="dropdown-divider mb-3"></div>
                                <canvas id="api" height="100"></canvas>
                            </article><!-- End blog entry -->

                            <article class="entry">
                                <h2 class="entry-title">Grafik Pemeriksaan Lab</h2>
                                <div class="dropdown-divider mb-3"></div>
                                <canvas id="sd" height="100"></canvas>
                            </article><!-- End blog entry -->

                            <article class="entry">
                                <h2 class="entry-title">Grafik Parasit Kasus Malaria</h2>
                                <div class="dropdown-divider mb-3"></div>
                                <canvas id="parasit" height="100"></canvas>
                            </article><!-- End blog entry -->

                            <article class="entry">
                                <h2 class="entry-title">Grafik Kasus Malaria Positif Berdasarkan Umur</h2>
                                <div class="dropdown-divider mb-3"></div>
                                <canvas id="usiaM" height="100"></canvas>
                            </article><!-- End blog entry -->

                            <article class="entry">
                                <h2 class="entry-title">Grafik Jumlah Kasus Malaria yang Hidup dan Meninggal</h2>
                                <div class="dropdown-divider mb-3"></div>
                                <canvas id="meninggal" height="100"></canvas>
                            </article><!-- End blog entry -->

                            <article class="entry">
                                <h2 class="entry-title">Grafik Perbandingan Kasus Malaria Berdasarkan Jenis Kelamin</h2>
                                <div class="dropdown-divider mb-3"></div>
                                <canvas id="rasioMalaria" height="100"></canvas>
                            </article><!-- End blog entry -->

                        </div><!-- End blog entries list -->
                    </div>

                <?php endif; ?>

            </div>

        </section><!-- End Values Section -->

    </main><!-- End #main -->