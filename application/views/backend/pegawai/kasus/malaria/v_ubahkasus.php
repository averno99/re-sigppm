                <div class="page-content-wrapper ">

                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <div class="btn-group float-right">
                                        <ol class="breadcrumb hide-phone p-0 m-0">
                                            <li class="breadcrumb-item">Beranda</li>
                                            <li class="breadcrumb-item"><a href="<?= site_url('kasus') ?>">Data Kasus Positif</a></li>
                                            <li class="breadcrumb-item active"><?= $judul ?></li>
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
                                        <h4 class="mt-0 header-title">Form <?= $judul ?></h4>
                                        <div class="dropdown-divider mb-3"></div>

                                        <form action="" method="post">
                                            <input type="hidden" name="id" value="<?= $kasus['idMalaria']; ?>">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="tahun">Tahun</label>
                                                    <input type="text" class="form-control" name="tahun" id="tahun" value="<?= $kasus['tahun'] ?>" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kecamatan">Kecamatan</label>
                                                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $kasus['nama'] ?>" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="penyakit">Penyakit</label>
                                                    <input type="text" class="form-control" name="penyakit" id="penyakit" value="<?= $kasus['penyakit'] ?>" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Suspek Malaria</label>
                                                    <input type="text" class="form-control" name="malaria_klinis" id="malaria_klinis" value="<?= $kasus['malaria_klinis'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Meninggal</label>
                                                    <input type="text" class="form-control" name="meninggal" id="meninggal" value="<?= $kasus['meninggal'] ?>">
                                                </div>

                                                <h4 class="mt-5 header-title">Penderita Positif</h4>
                                                <div class="dropdown-divider mb-3"></div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="card-body">
                                                            <label>Usia 0 - 11 bulan</label>
                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-form-label">L</label>
                                                                <div class="col-sm-5">
                                                                    <input type="text" class="form-control" name="mal011L" id="mal011L" value="<?= $kasus['mal011L'] ?>">
                                                                </div>
                                                                <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                                <div class="col-sm-5">
                                                                    <input type="text" class="form-control" name="mal011P" id="mal011P" value="<?= $kasus['mal011P'] ?>">
                                                                </div>
                                                            </div>
                                                            <label>Usia 1 - 4 tahun</label>
                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-form-label">L</label>
                                                                <div class="col-sm-5">
                                                                    <input type="text" class="form-control" name="mal14L" id="mal14L" value="<?= $kasus['mal14L'] ?>">
                                                                </div>
                                                                <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                                <div class="col-sm-5">
                                                                    <input type="text" class="form-control" name="mal14P" id="mal14P" value="<?= $kasus['mal14P'] ?>">
                                                                </div>
                                                            </div>
                                                            <label>Usia 5 - 9 tahun</label>
                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-form-label">L</label>
                                                                <div class="col-sm-5">
                                                                    <input type="text" class="form-control" name="mal59L" id="mal59L" value="<?= $kasus['mal59L'] ?>">
                                                                </div>
                                                                <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                                <div class="col-sm-5">
                                                                    <input type="text" class="form-control" name="mal59P" id="mal59P" value="<?= $kasus['mal59P'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="card-body">
                                                            <label>Usia 10 - 14 tahun</label>
                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-form-label">L</label>
                                                                <div class="col-sm-5">
                                                                    <input type="text" class="form-control" name="mal1014L" id="mal1014L" value="<?= $kasus['mal1014L'] ?>">
                                                                </div>
                                                                <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                                <div class="col-sm-5">
                                                                    <input type="text" class="form-control" name="mal1014P" id="mal1014P" value="<?= $kasus['mal1014P'] ?>">
                                                                </div>
                                                            </div>
                                                            <label>Usia 15 - 64 tahun</label>
                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-form-label">L</label>
                                                                <div class="col-sm-5">
                                                                    <input type="text" class="form-control" name="mal1564L" id="mal1564L" value="<?= $kasus['mal1564L'] ?>">
                                                                </div>
                                                                <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                                <div class="col-sm-5">
                                                                    <input type="text" class="form-control" name="mal1564P" id="mal1564P" value="<?= $kasus['mal1564P'] ?>">
                                                                </div>
                                                            </div>
                                                            <label>Usia > 64 tahun</label>
                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-form-label">L</label>
                                                                <div class="col-sm-5">
                                                                    <input type="text" class="form-control" name="mal65L" id="mal65L" value="<?= $kasus['mal65L'] ?>">
                                                                </div>
                                                                <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                                <div class="col-sm-5">
                                                                    <input type="text" class="form-control" name="mal65P" id="mal65P" value="<?= $kasus['mal65P'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <h4 class="mt-5 header-title">Konfirmasi Laboratorium</h4>
                                                <div class="dropdown-divider mb-3"></div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-form-label">RDT</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control" name="rdt" id="rdt" value="<?= $kasus['rdt'] ?>">
                                                                </div>
                                                                <label for="example-text-input" class="offset-sm-1 col-form-label">Mikroskop</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control" name="mik" id="mik" value="<?= $kasus['mik']; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <h4 class="mt-5 header-title">Jenis Parasit</h4>
                                                <div class="dropdown-divider mb-3"></div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-form-label">Pf</label>
                                                                <div class="col-sm-3">
                                                                    <input type="text" class="form-control" name="pf" id="pf" value="<?= $kasus['pf']; ?>">
                                                                </div>
                                                                <label for="example-text-input" class="offset-sm-1 col-form-label">Pv</label>
                                                                <div class="col-sm-3">
                                                                    <input type="text" class="form-control" name="pv" id="pv" value="<?= $kasus['pv']; ?>">
                                                                </div>
                                                                <label for="example-text-input" class="offset-sm-1 col-form-label">Pm</label>
                                                                <div class="col-sm-3">
                                                                    <input type="text" class="form-control" name="pm" id="pm" value="<?= $kasus['pm']; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-form-label">Po</label>
                                                                <div class="col-sm-3">
                                                                    <input type="text" class="form-control" name="po" id="po" value="<?= $kasus['po']; ?>">
                                                                </div>
                                                                <label for="example-text-input" class="offset-sm-1 col-form-label">Mix</label>
                                                                <div class="col-sm-3">
                                                                    <input type="text" class="form-control" name="mix" id="mix" value="<?= $kasus['mix']; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="ml-4">
                                                <a href="<?= site_url('kasus_malaria'); ?>" type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-reply"></i> Kembali</a>
                                                <button type="submit" name="ubah" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-content-save"></i> Simpan</button>
                                            </div>
                                            <!-- /.card-body -->

                                        </form>



                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->

                    </div><!-- container -->

                </div> <!-- Page content Wrapper -->

                </div> <!-- content -->