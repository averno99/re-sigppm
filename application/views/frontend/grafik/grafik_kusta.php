    <main id="main">
        <!-- ======= Values Section ======= -->
        <section id="blog" class="blog mt-5">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2><?= $judul ?></h2>
                    <p>Menampilkan Informasi Penyakit Kusta dalam Bentuk Grafik</p>
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

                <?php if (empty($rasioK && $usiaK && $kusta)) : ?>
                    <div class="alert alert-danger col-sm-12" role="alert">
                        Data tidak ditemukan.
                    </div>
                <?php else : ?>

                    <div class="row">
                        <div class="col-lg-12 entries">

                            <article class="entry">
                                <h2 class="entry-title">Grafik PR Kasus Kusta</h2>
                                <div class="dropdown-divider mb-3"></div>
                                <canvas id="pr" height="100"></canvas>
                            </article><!-- End blog entry -->

                            <article class="entry">
                                <h2 class="entry-title">Grafik CDR Kasus Kusta</h2>
                                <div class="dropdown-divider mb-3"></div>
                                <canvas id="cdr" height="100"></canvas>
                            </article><!-- End blog entry -->

                            <article class="entry">
                                <h2 class="entry-title">Grafik Kasus Kusta Berdasarkan Tipe Kusta</h2>
                                <div class="dropdown-divider mb-3"></div>
                                <canvas id="tipeKusta" height="100"></canvas>
                            </article><!-- End blog entry -->

                            <article class="entry">
                                <h2 class="entry-title">Grafik Kasus Kusta Terdaftar Berdasarkan Umur</h2>
                                <div class="dropdown-divider mb-3"></div>
                                <canvas id="usiaK" height="100"></canvas>
                            </article><!-- End blog entry -->

                            <article class="entry">
                                <h2 class="entry-title">Grafik Jumlah Kesembuhan Penderita Kusta</h2>
                                <div class="dropdown-divider mb-3"></div>
                                <canvas id="sembuh" height="100"></canvas>
                            </article><!-- End blog entry -->

                            <article class="entry">
                                <h2 class="entry-title">Grafik Perbandingan Kasus Kusta Berdasarkan Jenis Kelamin</h2>
                                <div class="dropdown-divider mb-3"></div>
                                <canvas id="rasioKusta" height="100"></canvas>
                            </article><!-- End blog entry -->

                        </div><!-- End blog entries list -->
                    </div>

                <?php endif; ?>

            </div>

        </section><!-- End Values Section -->

    </main><!-- End #main -->