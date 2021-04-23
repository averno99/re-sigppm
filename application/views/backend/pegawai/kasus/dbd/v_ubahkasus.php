<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item active">Kelola Data Kasus</li>
                            <li class="breadcrumb-item"><a href="<?= site_url('kasus_dbd') ?>">Kelola Data Kasus DBD</a></li>
                            <li class="breadcrumb-itema"><?= $judul ?></li>
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
                    <?php if (empty($kasus)) : ?>
                        <?php redirect('kasus_dbd') ?>
                    <?php else : ?>
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Form <?= $judul ?></h4>
                            <div class="dropdown-divider mb-3"></div>

                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?= $kasus['idDbd']; ?>">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="tahun">Tahun</label>
                                        <input type="text" class="form-control" name="tahun" id="tahun" value="<?= $kasus['tahun'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="bulan">Bulan</label>
                                        <input type="text" class="form-control" name="bulan" id="bulan" value="<?= $kasus['bulan'] ?>" disabled>
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
                                        <label for="meninggal">Meninggal</label>
                                        <input type="text" class="form-control" name="meninggal" id="meninggal" placeholder="Penderita DBD yang Meninggal" value="<?= $kasus['dbd_meninggal']; ?>">
                                        <?= form_error('meninggal', ' <small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <h4 class="mt-5 header-title">Penderita Positif</h4>
                                    <div class="dropdown-divider mb-3"></div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card-body">
                                                <label>Usia < 1 tahun</label>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-form-label">L</label>
                                                            <div class="col-sm-5">
                                                                <input type="text" class="form-control" name="dbd1L" id="dbd1L" placeholder="Laki - Laki" value="<?= $kasus['dbd1L']; ?>">
                                                                <?= form_error('dbd1L', ' <small class="text-danger">', '</small>'); ?>
                                                            </div>
                                                            <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                            <div class="col-sm-5">
                                                                <input type="text" class="form-control" name="dbd1P" id="dbd1P" placeholder="Perempuan" value="<?= $kasus['dbd1P']; ?>">
                                                                <?= form_error('dbd1P', ' <small class="text-danger">', '</small>'); ?>
                                                            </div>
                                                        </div>
                                                        <label>Usia 1 - 4 tahun</label>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-form-label">L</label>
                                                            <div class="col-sm-5">
                                                                <input type="text" class="form-control" name="dbd14L" id="dbd14L" placeholder="Laki - Laki" value="<?= $kasus['dbd14L']; ?>">
                                                                <?= form_error('dbd14L', ' <small class="text-danger">', '</small>'); ?>
                                                            </div>
                                                            <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                            <div class="col-sm-5">
                                                                <input type="text" class="form-control" name="dbd14P" id="dbd14P" placeholder="Perempuan" value="<?= $kasus['dbd14P']; ?>">
                                                                <?= form_error('dbd14P', ' <small class="text-danger">', '</small>'); ?>
                                                            </div>
                                                        </div>
                                                        <label>Usia 5 - 9 tahun</label>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-form-label">L</label>
                                                            <div class="col-sm-5">
                                                                <input type="text" class="form-control" name="dbd59L" id="dbd59L" placeholder="Laki - Laki" value="<?= $kasus['dbd59L']; ?>">
                                                                <?= form_error('dbd59L', ' <small class="text-danger">', '</small>'); ?>
                                                            </div>
                                                            <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                            <div class="col-sm-5">
                                                                <input type="text" class="form-control" name="dbd59P" id="dbd59P" placeholder="Perempuan" value="<?= $kasus['dbd59P']; ?>">
                                                                <?= form_error('dbd59P', ' <small class="text-danger">', '</small>'); ?>
                                                            </div>
                                                        </div>
                                                        <label>Usia 10 - 14 tahun</label>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-form-label">L</label>
                                                            <div class="col-sm-5">
                                                                <input type="text" class="form-control" name="dbd1014L" id="dbd1014L" placeholder="Laki - Laki" value="<?= $kasus['dbd1014L']; ?>">
                                                                <?= form_error('dbd1014L', ' <small class="text-danger">', '</small>'); ?>
                                                            </div>
                                                            <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                            <div class="col-sm-5">
                                                                <input type="text" class="form-control" name="dbd1014P" id="dbd1014P" placeholder="Perempuan" value="<?= $kasus['dbd1014P']; ?>">
                                                                <?= form_error('dbd1014P', ' <small class="text-danger">', '</small>'); ?>
                                                            </div>
                                                        </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card-body">
                                                <label>Usia 15 - 19 tahun</label>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-form-label">L</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="dbd1519L" id="dbd1519L" placeholder="Laki - Laki" value="<?= $kasus['dbd1519L']; ?>">
                                                        <?= form_error('dbd1519L', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                    <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="dbd1519P" id="dbd1519P" placeholder="Perempuan" value="<?= $kasus['dbd1519P']; ?>">
                                                        <?= form_error('dbd1519P', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <label>Usia 20 - 44 tahun</label>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-form-label">L</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="dbd2044L" id="dbd2044L" placeholder="Laki - Laki" value="<?= $kasus['dbd2044L']; ?>">
                                                        <?= form_error('dbd2044L', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                    <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="dbd2044P" id="dbd2044P" placeholder="Perempuan" value="<?= $kasus['dbd2044P']; ?>">
                                                        <?= form_error('dbd2044P', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <label>Usia > 45 tahun</label>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-form-label">L</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="dbd45L" id="dbd45L" placeholder="Laki - Laki" value="<?= $kasus['dbd45L']; ?>">
                                                        <?= form_error('dbd45L', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                    <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="dbd45P" id="dbd45P" placeholder="Perempuan" value="<?= $kasus['dbd45P']; ?>">
                                                        <?= form_error('dbd45P', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="ml-4">
                                    <a href="<?= site_url('kasus_dbd'); ?>" type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-reply"></i> Kembali</a>
                                    <button type="submit" name="ubah" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-content-save"></i> Simpan</button>
                                </div>
                                <!-- /.card-body -->

                            </form>



                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!--end row-->

    </div><!-- container -->

</div> <!-- Page content Wrapper -->

</div> <!-- content -->