<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item">Beranda</li>
                            <li class="breadcrumb-item"><a href="<?= site_url('kasus') ?>">Data Kasus Positif Malaria</a></li>
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
                            <div class="card-body">
                                <form action="<?= base_url('kasus_malaria/tambah') ?>" method="POST">
                                    <div class="form-row mb-4">
                                        <div class="col-sm-3">
                                            <select class="custom-select" name="filterTahun" id="filterTahun">
                                                <option selected disabled>--Pilih Tahun--</option>
                                                <?php for ($y = date('Y'); $y >= 2000; $y--) : ?>
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
                                            <strong>Data Jumlah Penduduk</strong> tidak ditemukan pada tahun ini!
                                        </div>
                                    <?php else : ?>
                                        <div class="form-group">
                                            <label for="penyakit">Penyakit</label>
                                            <input type="text" class="form-control" name="penyakit" id="penyakit" placeholder="Malaria" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="penduduk">Kecamatan</label>
                                            <select class="form-control" name="penduduk" id="penduduk">
                                                <option selected disabled>--Pilih Kecamatan--</option>
                                                <?php foreach ($penduduk as $pdk) : ?>
                                                    <option value="<?= $pdk['id']; ?>"><?= $pdk['nama']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('penduduk'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Suspek Malaria</label>
                                            <input type="text" class="form-control" name="malaria_klinis" id="malaria_klinis" placeholder="Suspek Malaria" value="<?= set_value('malaria_klinis'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Meninggal</label>
                                            <input type="text" class="form-control" name="meninggal" id="meninggal" placeholder="Penderita Malaria yang Meninggal" value="<?= set_value('meninggal'); ?>">
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
                                                            <input type="text" class="form-control" name="mal011L" id="mal011L" placeholder="Laki - Laki" value="<?= set_value('mal011L'); ?>">
                                                        </div>
                                                        <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="mal011P" id="mal011P" placeholder="Perempuan" value="<?= set_value('mal011P'); ?>">
                                                        </div>
                                                    </div>
                                                    <label>Usia 1 - 4 tahun</label>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-form-label">L</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="mal14L" id="mal14L" placeholder="Laki - Laki" value="<?= set_value('mal14L'); ?>">
                                                        </div>
                                                        <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="mal14P" id="mal14P" placeholder="Perempuan" value="<?= set_value('mal14P'); ?>">
                                                        </div>
                                                    </div>
                                                    <label>Usia 5 - 9 tahun</label>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-form-label">L</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="mal59L" id="mal59L" placeholder="Laki - Laki" value="<?= set_value('mal59L'); ?>">
                                                        </div>
                                                        <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="mal59P" id="mal59P" placeholder="Perempuan" value="<?= set_value('mal59P'); ?>">
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
                                                            <input type="text" class="form-control" name="mal1014L" id="mal1014L" placeholder="Laki - Laki" value="<?= set_value('mal1014L'); ?>">
                                                        </div>
                                                        <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="mal1014P" id="mal1014P" placeholder="Perempuan" value="<?= set_value('mal1014P'); ?>">
                                                        </div>
                                                    </div>
                                                    <label>Usia 15 - 64 tahun</label>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-form-label">L</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="mal1564L" id="mal1564L" placeholder="Laki - Laki" value="<?= set_value('mal1564L'); ?>">
                                                        </div>
                                                        <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="mal1564P" id="mal1564P" placeholder="Perempuan" value="<?= set_value('mal1564P'); ?>">
                                                        </div>
                                                    </div>
                                                    <label>Usia > 64 tahun</label>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-form-label">L</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="mal65L" id="mal65L" placeholder="Laki - Laki" value="<?= set_value('mal65L'); ?>">
                                                        </div>
                                                        <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="mal65P" id="mal65P" placeholder="Perempuan" value="<?= set_value('mal65P'); ?>">
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
                                                            <input type="text" class="form-control" name="rdt" id="rdt" placeholder="RDT" value="<?= set_value('rdt'); ?>">
                                                        </div>
                                                        <label for="example-text-input" class="offset-sm-1 col-form-label">Mikroskop</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" name="mik" id="mik" placeholder="Mikroskop" value="<?= set_value('mik'); ?>">
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
                                                            <input type="text" class="form-control" name="pf" id="pf" placeholder="Pf" value="<?= set_value('pf'); ?>">
                                                        </div>
                                                        <label for="example-text-input" class="offset-sm-1 col-form-label">Pv</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" name="pv" id="pv" placeholder="Pv" value="<?= set_value('pv'); ?>">
                                                        </div>
                                                        <label for="example-text-input" class="offset-sm-1 col-form-label">Pm</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" name="pm" id="pm" placeholder="Pm" value="<?= set_value('pm'); ?>">
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
                                                            <input type="text" class="form-control" name="po" id="po" placeholder="Po" value="<?= set_value('po'); ?>">
                                                        </div>
                                                        <label for="example-text-input" class="offset-sm-1 col-form-label">Mix</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" name="mix" id="mix" placeholder="Mix" value="<?= set_value('mix'); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ml-4">
                                            <a href="<?= site_url('kasus_malaria'); ?>" type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-reply"></i> Kembali</a>
                                            <button type="submit" name="tambah" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-content-save"></i> Simpan</button>
                                        </div>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <div class="mt-4">
                                        <a href="<?= site_url('kasus_malaria'); ?>" type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-reply"></i> Kembali</a>
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