    <main id="main">
        <!-- ======= Values Section ======= -->
        <section id="values" class="values mt-5">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Pemetaan DBD</h2>
                    <p>Incidence Rate (IR)</p>
                </header>

                <div class="row">

                    <div class="mx-auto mb-3">
                        <form action="" method="GET">
                            <div class="col-md-4">
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
                                    <button class="btn btn-success" type="submit">Pilih</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php if (empty($pemetaan)) : ?>
                        <div class="alert alert-warning col-sm-12" role="alert">
                            Peta tidak tersedia.
                        </div>
                    <?php else : ?>
                        <div id="mapDBD"></div>
                    <?php endif; ?>

                </div>

            </div>

        </section><!-- End Values Section -->

    </main><!-- End #main -->