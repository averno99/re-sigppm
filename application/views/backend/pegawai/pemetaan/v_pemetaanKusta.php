                <div class="page-content-wrapper ">

                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <div class="btn-group float-right">
                                        <ol class="breadcrumb hide-phone p-0 m-0">
                                            <li class="breadcrumb-item">Beranda</li>
                                            <li class="breadcrumb-item active">Pemetaan</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?= $judul ?></h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title end breadcrumb -->
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">Pemetaan</h4>
                                        <div class="dropdown-divider mb-3"></div>
                                        <div class="mx-auto mb-3">
                                            <form action="" method="GET">
                                                <div class="col-md-4">
                                                    <div class="input-group mt-2">
                                                        <select class="custom-select" name="cari" id="cari">
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

                                        <?php if (empty($pemetaan)) : ?>
                                            <div class="alert alert-warning col-sm-12" role="alert">
                                                Peta tidak tersedia.
                                            </div>
                                        <?php else : ?>
                                            <div id="mapKusta"></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- container -->

                </div> <!-- Page content Wrapper -->

                </div> <!-- content -->