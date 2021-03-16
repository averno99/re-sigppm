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
                                                    <label>Suspek</label>
                                                    <input type="text" class="form-control" name="malaria_klinis" id="malaria_klinis" placeholder="Suspek" value="<?= $kasus['malaria_klinis'] ?>">
                                                </div>

                                                <label>Konfirmasi Laboratorium</label>
                                                <div class="form-row mb-3">
                                                    <div class="form-group col">
                                                        <input type="text" class="form-control" name="rdt" id="rdt" placeholder="RDT" value="<?= $kasus['rdt'] ?>">
                                                    </div>
                                                    <div class="form-group col">
                                                        <input type="text" class="form-control" name="mik" id="mik" placeholder="Mikroskop" value="<?= $kasus['mik'] ?>">
                                                    </div>
                                                </div>

                                                <label>Usia 0 - 11 bulan</label>
                                                <div class="form-row">
                                                    <div class="form-group col">
                                                        <input type="text" class="form-control" name="mal011L" id="mal011L" placeholder="Laki - Laki" value="<?= $kasus['mal011L'] ?>">
                                                    </div>
                                                    <div class="form-group col">
                                                        <input type="text" class="form-control" name="mal011P" id="mal011P" placeholder="Perempuan" value="<?= $kasus['mal011P'] ?>">
                                                    </div>
                                                </div>
                                                <label>Usia 1 - 4 tahun</label>
                                                <div class="form-row">
                                                    <div class="form-group col">
                                                        <input type="text" class="form-control" name="mal14L" id="mal14L" placeholder="Laki - Laki" value="<?= $kasus['mal14L'] ?>">
                                                    </div>
                                                    <div class="form-group col">
                                                        <input type="text" class="form-control" name="mal14P" id="mal14P" placeholder="Perempuan" value="<?= $kasus['mal14P'] ?>">
                                                    </div>
                                                </div>
                                                <label>Usia 5 - 9 tahun</label>
                                                <div class="form-row">
                                                    <div class="form-group col">
                                                        <input type="text" class="form-control" name="mal59L" id="mal59L" placeholder="Laki - Laki" value="<?= $kasus['mal59L'] ?>">
                                                    </div>
                                                    <div class="form-group col">
                                                        <input type="text" class="form-control" name="mal59P" id="mal59P" placeholder="Perempuan" value="<?= $kasus['mal59P'] ?>">
                                                    </div>
                                                </div>
                                                <label>Usia 10 - 14 tahun</label>
                                                <div class="form-row">
                                                    <div class="form-group col">
                                                        <input type="text" class="form-control" name="mal1014L" id="mal1014L" placeholder="Laki - Laki" value="<?= $kasus['mal1014L'] ?>">
                                                    </div>
                                                    <div class="form-group col">
                                                        <input type="text" class="form-control" name="mal1014P" id="mal1014P" placeholder="Perempuan" value="<?= $kasus['mal1014P'] ?>">
                                                    </div>
                                                </div>
                                                <label>Usia 15 - 64 tahun</label>
                                                <div class="form-row">
                                                    <div class="form-group col">
                                                        <input type="text" class="form-control" name="mal1564L" id="mal1564L" placeholder="Laki - Laki" value="<?= $kasus['mal1564L'] ?>">
                                                    </div>
                                                    <div class="form-group col">
                                                        <input type="text" class="form-control" name="mal1564P" id="mal1564P" placeholder="Perempuan" value="<?= $kasus['mal1564P'] ?>">
                                                    </div>
                                                </div>
                                                <label>Usia >64 tahun</label>
                                                <div class="form-row mb-3">
                                                    <div class="form-group col">
                                                        <input type="text" class="form-control" name="mal65L" id="mal65L" placeholder="Laki - Laki" value="<?= $kasus['mal65L'] ?>">
                                                    </div>
                                                    <div class="form-group col">
                                                        <input type="text" class="form-control" name="mal65P" id="mal65P" placeholder="perempuan" value="<?= $kasus['mal65P'] ?>">
                                                    </div>
                                                </div>

                                                <label>Jenis Parasit</label>
                                                <div class="form-row">
                                                    <div class="form-group col">
                                                        <input type="text" class="form-control" name="pf" id="pf" placeholder="Pf" value="<?= $kasus['pf'] ?>">
                                                    </div>
                                                    <div class="form-group col">
                                                        <input type="text" class="form-control" name="pv" id="pv" placeholder="Pv" value="<?= $kasus['pv'] ?>">
                                                    </div>
                                                    <div class="form-group col">
                                                        <input type="text" class="form-control" name="pm" id="pm" placeholder="Pm" value="<?= $kasus['pm'] ?>">
                                                    </div>
                                                    <div class="form-group col">
                                                        <input type="text" class="form-control" name="po" id="po" placeholder="Po" value="<?= $kasus['po'] ?>">
                                                    </div>
                                                    <div class="form-group col">
                                                        <input type="text" class="form-control" name="mix" id="mix" placeholder="Mix" value="<?= $kasus['mix'] ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="malaria_positif">Positif</label>
                                                    <input type="text" class="form-control" name="malaria_positif" id="malaria_positif" placeholder="Jumlah Kasus Positif Malaria" value="<?= $kasus['malaria_positif'] ?>">
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