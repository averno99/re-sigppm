    <main id="main">
        <!-- ======= Values Section ======= -->
        <section id="blog" class="blog mt-5">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2><?= $judul ?></h2>
                    <p>Menampilkan Informasi Penyakit DBD dalam Bentuk Grafik di Kabupaten Kayong Utara Tahun <?= $rasioD['tahun'] ?></p>
                </header>

                <div class="row mb-3">
                    <div class="offset-1 col-sm-3 mt-2">
                        <button type="button" class="btn btn-primary dropdown-toggle" id="dropTahun" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-file-excel"></i> Cetak
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropTahun">
                            <?php foreach ($tahun as $thn) : ?>
                                <a class=" dropdown-item" href="<?= site_url(''); ?>beranda/excel_dbd/<?= $thn['tahun'] ?>"><?= $thn['tahun'] ?></a>
                            <?php endforeach; ?>

                        </div>
                    </div>
                    <div class="mx-auto col-sm-8">
                        <form action="" method="GET">
                            <div class="col-sm-4 ml-auto">
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

                <?php if (empty($irDbd && $rasioD && $waktuDbd)) : ?>
                    <div class="alert alert-danger col-sm-12" role="alert">
                        Data tidak ditemukan.
                    </div>
                <?php else : ?>

                    <div class="row">
                        <div class="col-lg-12 entries">

                            <article class="entry">
                                <h2 class="entry-title text-center">GRAFIK INCIDENCE RATE DI KABUPATEN KAYONG UTARA TAHUN <?= $rasioD['tahun'] ?></h2>
                                <div class="dropdown-divider mb-3"></div>
                                <canvas id="ir" height="100"></canvas>
                            </article><!-- End blog entry -->

                            <article class="entry">
                                <h2 class="entry-title text-center">GRAFIK JUMLAH KASUS DBD BERDASARKAN BULAN DI KABUPATEN KAYONG UTARA TAHUN <?= $rasioD['tahun'] ?></h2>
                                <div class="dropdown-divider mb-3"></div>
                                <canvas id="waktu" height="100"></canvas>
                            </article><!-- End blog entry -->

                            <article class="entry">
                                <h2 class="entry-title text-center">GRAFIK KASUS DBD YANG HIDUP DAN MENINGGAL MENURUT KECAMATAN DI KABUPATEN KAYONG UTARA TAHUN <?= $rasioD['tahun'] ?></h2>
                                <div class="dropdown-divider mb-3"></div>
                                <canvas id="meninggal" height="100"></canvas>
                            </article><!-- End blog entry -->

                            <article class="entry">
                                <h2 class="entry-title text-center">GRAFIK KASUS DBD BERDASARKAN UMUR DI KABUPATEN KAYONG UTARA TAHUN <?= $rasioD['tahun'] ?></h2>
                                <div class="dropdown-divider mb-3"></div>
                                <canvas id="usiaD" height="100"></canvas>
                            </article><!-- End blog entry -->

                            <article class="entry">
                                <h2 class="entry-title text-center">GRAFIK PERSENTASE KASUS DBD BERDASARKAN JENIS KELAMIN DI KABUPATEN KAYONG UTARA TAHUN <?= $rasioD['tahun'] ?></h2>
                                <div class="dropdown-divider mb-3"></div>
                                <canvas id="rasioDbd" height="100"></canvas>
                            </article><!-- End blog entry -->

                        </div><!-- End blog entries list -->
                    </div>

                <?php endif; ?>

            </div>

        </section><!-- End Values Section -->

    </main><!-- End #main -->