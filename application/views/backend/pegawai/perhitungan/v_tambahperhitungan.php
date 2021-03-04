                <div class="page-content-wrapper ">

                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <div class="btn-group float-right">
                                        <ol class="breadcrumb hide-phone p-0 m-0">
                                            <li class="breadcrumb-item">Beranda</li>
                                            <li class="breadcrumb-item active">Tambah Perhitungan</li>
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
                                                <form action="<?= base_url('perhitungan/tambah') ?>" method="POST">
                                                    <div class="form-row mb-4">
                                                        <div class="col-sm-3">
                                                            <select class="custom-select" name="filterTahun" id="filterTahun">
                                                                <option selected disabled>--Pilih Tahun--</option>
                                                                <?php foreach ($tahun as $thn) : ?>
                                                                    <?php if ($thn['tahun'] == $this->input->post('filterTahun')) : ?>
                                                                        <option value="<?= $thn['tahun']; ?>" selected><?= $thn['tahun']; ?></option>
                                                                    <?php else : ?>
                                                                        <option value="<?= $thn['tahun']; ?>"><?= $thn['tahun']; ?></option>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <select class="custom-select" name="filterPenyakit" id="filterPenyakit">
                                                                <option selected disabled>--Pilih Penyakit--</option>
                                                                <?php foreach ($penyakit as $pny) : ?>
                                                                    <?php if ($pny['penyakit'] == $this->input->post('filterPenyakit')) : ?>
                                                                        <option value="<?= $pny['penyakit']; ?>" selected><?= $pny['penyakit']; ?></option>
                                                                    <?php else : ?>
                                                                        <option value="<?= $pny['penyakit']; ?>"><?= $pny['penyakit']; ?></option>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <button class="btn btn-success" type="submit">Pilih</button>
                                                        </div>
                                                        <div class="input-group ml-2" style="margin-top: -10px;">
                                                            <small class="text-muted">
                                                                <span class="text-danger">*</span> Pilih tahun dan penyakit yang ingin dihitung.
                                                            </small>
                                                        </div>
                                                    </div>
                                                </form>
                                                <?php if ($this->input->post('filterPenyakit') && $this->input->post('filterTahun')) : ?>
                                                    <div class="form-group">
                                                        <label for="penduduk">Jumlah Penduduk</label>
                                                        <select class="form-control" name="penduduk" id="penduduk">
                                                            <option selected disabled>--Pilih Jumlah Penduduk--</option>
                                                            <?php foreach ($penduduk as $pdk) : ?>
                                                                <option value="<?= $pdk['id']; ?>"><?= $pdk['tahun']; ?>, <?= $pdk['nama']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="kasus">Kasus Positif</label>
                                                        <select class="form-control" name="kasus" id="kasus">
                                                            <option selected disabled>--Pilih Kasus Positif--</option>
                                                            <?php foreach ($kasus as $kss) : ?>
                                                                <option value="<?= $kss['id']; ?>"><?= $kss['tahun']; ?>, <?= $kss['penyakit']; ?>, <?= $kss['nama']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="mt-4">
                                                        <a href="<?= site_url('perhitungan'); ?>" type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-reply"></i> Kembali</a>
                                                        <button type="submit" name="tambah" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-content-save"></i> Hitung</button>
                                                    </div>
                                                <?php else : ?>
                                                    <div class="mt-4">
                                                        <a href="<?= site_url('perhitungan'); ?>" type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-reply"></i> Kembali</a>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <!-- /.card-body -->

                                        </form>



                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- container -->

                </div> <!-- Page content Wrapper -->

                </div> <!-- content -->