<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item active">Kelola Data Kasus</li>
                            <li class="breadcrumb-item"><a href="<?= site_url('kasus_dbd') ?>">Kelola Data Kasus DBD</a></li>
                            <li class="breadcrumb-item"><?= $judul ?></li>
                        </ol>
                    </div>
                    <h4 class=" page-title"><?= $judul ?></h4>
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
                            <div class="card-body">
                                <form action="<?= base_url('kasus_dbd/tambah') ?>" method="POST">
                                    <div class="form-row mb-4">
                                        <div class="col-sm-3">
                                            <select class="custom-select" name="filterTahun" id="filterTahun">
                                                <option selected disabled>--Pilih Tahun--</option>
                                                <?php for ($y = date('Y'); $y >= 1990; $y--) : ?>
                                                    <?php if ($y == $this->input->post('filterTahun')) : ?>
                                                        <option value="<?= $y; ?>" selected><?= $y; ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $y; ?>"><?= $y; ?></option>
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success" type="submit">Pilih</button>
                                        </div>
                                        <div class="input-group ml-2" style="margin-top: -10px;">
                                            <small class="text-muted">
                                                <span class="text-danger">*</span> Pilih tahun terlebih dahulu.
                                            </small>
                                        </div>
                                    </div>
                                </form>
                                <?php if ($this->input->post('filterTahun')) : ?>
                                    <?php if (empty($penduduk)) : ?>
                                        <div class="alert alert-warning col-sm-12" role="alert">
                                            <strong>Data Jumlah Penduduk</strong> tidak ditemukan pada tahun ini! Silahkan menginputkan <strong>Data Jumlah Penduduk</strong> terlebih dahulu.
                                        </div>
                                    <?php else : ?>
                                        <div class="form-group">
                                            <label for="penyakit">Penyakit</label>
                                            <input type="text" class="form-control" name="penyakit" id="penyakit" placeholder="DBD" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="bulan">Bulan</label>
                                            <select class="form-control" name="bulan" id="bulan">
                                                <option selected disabled>--Pilih Bulan--</option>
                                                <?php foreach ($bulan as $bln) : ?>
                                                    <option value="<?= $bln; ?>" <?= set_value('bulan') == $bln ? "selected" : NULL ?>><?= $bln; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('bulan', ' <small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class=" form-group">
                                            <label for="penduduk">Kecamatan</label>
                                            <select class="form-control" name="penduduk" id="penduduk">
                                                <option selected disabled>--Pilih Kecamatan--</option>
                                                <?php foreach ($penduduk as $pdk) : ?>
                                                    <option value="<?= $pdk['id']; ?>" <?= set_value('penduduk') == $pdk['id'] ? "selected" : NULL ?>><?= $pdk['nama']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('penduduk', ' <small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="meninggal">Meninggal</label>
                                            <input type="text" class="form-control" name="meninggal" id="meninggal" placeholder="Penderita DBD yang Meninggal" value="<?= set_value('meninggal'); ?>">
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
                                                                    <input type="text" class="form-control" name="dbd1L" id="dbd1L" placeholder="Laki - Laki" value="<?= set_value('dbd1L'); ?>">
                                                                    <?= form_error('dbd1L', ' <small class="text-danger">', '</small>'); ?>
                                                                </div>
                                                                <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                                <div class="col-sm-5">
                                                                    <input type="text" class="form-control" name="dbd1P" id="dbd1P" placeholder="Perempuan" value="<?= set_value('dbd1P'); ?>">
                                                                    <?= form_error('dbd1P', ' <small class="text-danger">', '</small>'); ?>
                                                                </div>
                                                            </div>
                                                            <label>Usia 1 - 4 tahun</label>
                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-form-label">L</label>
                                                                <div class="col-sm-5">
                                                                    <input type="text" class="form-control" name="dbd14L" id="dbd14L" placeholder="Laki - Laki" value="<?= set_value('dbd14L'); ?>">
                                                                    <?= form_error('dbd14L', ' <small class="text-danger">', '</small>'); ?>
                                                                </div>
                                                                <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                                <div class="col-sm-5">
                                                                    <input type="text" class="form-control" name="dbd14P" id="dbd14P" placeholder="Perempuan" value="<?= set_value('dbd14P'); ?>">
                                                                    <?= form_error('dbd14P', ' <small class="text-danger">', '</small>'); ?>
                                                                </div>
                                                            </div>
                                                            <label>Usia 5 - 9 tahun</label>
                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-form-label">L</label>
                                                                <div class="col-sm-5">
                                                                    <input type="text" class="form-control" name="dbd59L" id="dbd59L" placeholder="Laki - Laki" value="<?= set_value('dbd59L'); ?>">
                                                                    <?= form_error('dbd59L', ' <small class="text-danger">', '</small>'); ?>
                                                                </div>
                                                                <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                                <div class="col-sm-5">
                                                                    <input type="text" class="form-control" name="dbd59P" id="dbd59P" placeholder="Perempuan" value="<?= set_value('dbd59P'); ?>">
                                                                    <?= form_error('dbd59P', ' <small class="text-danger">', '</small>'); ?>
                                                                </div>
                                                            </div>
                                                            <label>Usia 10 - 14 tahun</label>
                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-form-label">L</label>
                                                                <div class="col-sm-5">
                                                                    <input type="text" class="form-control" name="dbd1014L" id="dbd1014L" placeholder="Laki - Laki" value="<?= set_value('dbd1014L'); ?>">
                                                                    <?= form_error('dbd1014L', ' <small class="text-danger">', '</small>'); ?>
                                                                </div>
                                                                <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                                <div class="col-sm-5">
                                                                    <input type="text" class="form-control" name="dbd1014P" id="dbd1014P" placeholder="Perempuan" value="<?= set_value('dbd1014P'); ?>">
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
                                                            <input type="text" class="form-control" name="dbd1519L" id="dbd1519L" placeholder="Laki - Laki" value="<?= set_value('dbd1519L'); ?>">
                                                            <?= form_error('dbd1519L', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                        <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="dbd1519P" id="dbd1519P" placeholder="Perempuan" value="<?= set_value('dbd1519P'); ?>">
                                                            <?= form_error('dbd1519P', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <label>Usia 20 - 44 tahun</label>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-form-label">L</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="dbd2044L" id="dbd2044L" placeholder="Laki - Laki" value="<?= set_value('dbd2044L'); ?>">
                                                            <?= form_error('dbd2044L', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                        <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="dbd2044P" id="dbd2044P" placeholder="Perempuan" value="<?= set_value('dbd2044P'); ?>">
                                                            <?= form_error('dbd2044P', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <label>Usia > 45 tahun</label>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-form-label">L</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="dbd45L" id="dbd45L" placeholder="Laki - Laki" value="<?= set_value('dbd45L'); ?>">
                                                            <?= form_error('dbd45L', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                        <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="dbd45P" id="dbd45P" placeholder="Perempuan" value="<?= set_value('dbd45P'); ?>">
                                                            <?= form_error('dbd45P', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ml-4">
                                            <a href="<?= site_url('kasus_dbd'); ?>" type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-reply"></i> Kembali</a>
                                            <button type="submit" name="tambah" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-content-save"></i> Simpan</button>
                                        </div>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <div class="mt-4">
                                        <a href="<?= site_url('kasus_dbd'); ?>" type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-reply"></i> Kembali</a>
                                    </div>
                                <?php endif; ?>
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