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
                                            <div class="card-body">
                                                <form action="<?= base_url('kasus/tambah') ?>" method="POST">
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
                                                    <div class="form-group">
                                                        <label for="penyakit">Penyakit</label>
                                                        <select class="form-control" name="penyakit" id="penyakit">
                                                            <option selected disabled>--Pilih Penyakit--</option>
                                                            <?php foreach ($penyakit as $pyt) : ?>
                                                                <option value="<?= $pyt['id']; ?>"><?= $pyt['penyakit']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="penduduk">Kecamatan</label>
                                                        <select class="form-control" name="penduduk" id="penduduk">
                                                            <option selected disabled>--Pilih Kecamatan--</option>
                                                            <?php foreach ($penduduk as $pdk) : ?>
                                                                <option value="<?= $pdk['id']; ?>"><?= $pdk['nama']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jumlah">Jumlah Kasus</label>
                                                        <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah Kasus Positif" value="<?= set_value('jumlah'); ?>">
                                                        <?= form_error('jumlah', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                    <div class="ml-4">
                                                        <a href="<?= site_url('kasus'); ?>" type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-reply"></i> Kembali</a>
                                                        <button type="submit" name="tambah" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-content-save"></i> Simpan</button>
                                                    </div>
                                                <?php else : ?>
                                                    <div class="mt-4">
                                                        <a href="<?= site_url('kasus'); ?>" type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-reply"></i> Kembali</a>
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