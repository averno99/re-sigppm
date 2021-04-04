    <main id="main">
        <!-- ======= Values Section ======= -->
        <section id="blog" class="blog mt-5">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2><?= $judul ?></h2>
                    <p>Menampilkan Informasi Penyakit Malaria dalam Bentuk Grafik di Kabupaten Kayong Utara Tahun <?= $rasioM['tahun'] ?></p>
                </header>

                <div class="row mb-3">
                    <div class="offset-1 col-sm-3 mt-2">
                        <button type="button" class="btn btn-primary dropdown-toggle" id="dropTahun" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-file-excel"></i> Cetak
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropTahun">
                            <?php foreach ($tahun as $thn) : ?>
                                <a class=" dropdown-item" href="<?= site_url(''); ?>beranda/excel_malaria/<?= $thn['tahun'] ?>"><?= $thn['tahun'] ?></a>
                            <?php endforeach; ?>

                        </div>
                    </div>
                    <div class="col-sm-8 mx-auto">
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

                <?php if (empty($rasioM && $apiM)) : ?>
                    <div class="alert alert-danger col-sm-12" role="alert">
                        Data tidak ditemukan.
                    </div>
                <?php else : ?>

                    <div class="row">
                        <div class="col-lg-12 entries">

                            <article class="entry">
                                <h2 class="entry-title text-center">GRAFIK ANNUAL MALARIA INCIDENCE (AMI) & ANNUAL PARACITE INCIDENCE (API) DI KABUPATEN KAYONG UTARA TAHUN <?= $rasioM['tahun'] ?></h2>
                                <div class="dropdown-divider mb-3"></div>
                                <canvas id="api" height="100"></canvas>
                            </article><!-- End blog entry -->

                            <article class="entry">
                                <h2 class="entry-title text-center">GRAFIK KONFIRMASI LAB MENURUT KECAMATAN DI KABUPATEN KAYONG UTARA TAHUN <?= $rasioM['tahun'] ?></h2>
                                <div class="dropdown-divider mb-3"></div>
                                <canvas id="sd" height="100"></canvas>
                            </article><!-- End blog entry -->

                            <article class="entry">
                                <h2 class="entry-title text-center">GRAFIK SEDIAAN DARAH POSITIF MENURUT KECAMATAN DI KABUPATEN KAYONG UTARA TAHUN <?= $rasioM['tahun'] ?></h2>
                                <div class="dropdown-divider mb-3"></div>
                                <canvas id="parasit" height="100"></canvas>
                            </article><!-- End blog entry -->

                            <article class="entry">
                                <h2 class="entry-title text-center">GRAFIK KASUS SEDIAAN DARAH POSITIF BERDASARKAN UMUR DI KABUPATEN KAYONG UTARA TAHUN <?= $rasioM['tahun'] ?></h2>
                                <div class="dropdown-divider mb-3"></div>
                                <canvas id="usiaM" height="100"></canvas>
                            </article><!-- End blog entry -->

                            <article class="entry">
                                <h2 class="entry-title text-center">GRAFIK KASUS MALARIA YANG HIDUP DAN MENINGGAL MENURUT KECAMATAN DI KABUPATEN KAYONG UTARA TAHUN <?= $rasioM['tahun'] ?></h2>
                                <div class="dropdown-divider mb-3"></div>
                                <canvas id="meninggal" height="100"></canvas>
                            </article><!-- End blog entry -->

                            <article class="entry">
                                <h2 class="entry-title text-center">GRAFIK PERSENTASE KASUS MALARIA BERDASARKAN JENIS KELAMIN DI KABUPATEN KAYONG UTARA TAHUN <?= $rasioM['tahun'] ?></h2>
                                <div class="dropdown-divider mb-3"></div>
                                <canvas id="rasioMalaria" height="100"></canvas>
                            </article><!-- End blog entry -->

                        </div><!-- End blog entries list -->
                    </div>

                <?php endif; ?>

            </div>

        </section><!-- End Values Section -->

    </main><!-- End #main -->