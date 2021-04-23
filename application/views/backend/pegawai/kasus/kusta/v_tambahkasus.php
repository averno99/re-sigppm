<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item active">Kelola Data Kasus</li>
                            <li class="breadcrumb-item"><a href="<?= site_url('kasus_kusta') ?>">Kelola Data Kasus Kusta</a></li>
                            <li class="breadcrumb-item"><?= $judul ?></li>
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
                                <form action="<?= base_url('kasus_kusta/tambah') ?>" method="POST">
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
                                            <strong>Data Jumlah Penduduk</strong> tidak ditemukan pada tahun ini! Silahkan menginputkan <strong>Data Jumlah Penduduk</strong> terlebih dahulu.
                                        </div>
                                    <?php else : ?>
                                        <div class="form-group">
                                            <label for="penyakit">Penyakit</label>
                                            <input type="text" class="form-control" name="penyakit" id="penyakit" placeholder="Kusta" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="penduduk">Kecamatan</label>
                                            <select class="form-control" name="penduduk" id="penduduk">
                                                <option selected disabled>--Pilih Kecamatan--</option>
                                                <?php foreach ($penduduk as $pdk) : ?>
                                                    <option value="<?= $pdk['id']; ?>" <?= set_value('penduduk') == $pdk['id'] ? "selected" : NULL ?>><?= $pdk['nama']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('penduduk'); ?>
                                        </div>


                                        <label>Kasus Baru</label>
                                        <div class="form-group row pl-3">
                                            <label for="example-text-input" class="col-form-label">PB</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="kusta_baruPB" id="kusta_baruPB" placeholder="Kasus Baru PB" value="<?= set_value('kusta_baruPB'); ?>">
                                                <?= form_error('kusta_baruPB', ' <small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <label for="example-text-input" class="offset-sm-1 col-form-label">MB</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="kusta_baruMB" id="kusta_baruMB" placeholder="Kasus Baru MB" value="<?= set_value('kusta_baruMB'); ?>">
                                                <?= form_error('kusta_baruMB', ' <small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>

                                        <label>Penderita Kusta yang Sembuh</label>
                                        <div class="form-group row pl-3">
                                            <label for="example-text-input" class="col-form-label">PB</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="sembuhPB" id="sembuhPB" placeholder="Penderita yang Sembuh Tipe PB" value="<?= set_value('sembuhPB'); ?>">
                                                <?= form_error('sembuhPB', ' <small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <label for="example-text-input" class="offset-sm-1 col-form-label">MB</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="sembuhMB" id="sembuhMB" placeholder="Penderita yang Sembuh Tipe MB" value="<?= set_value('sembuhMB'); ?>">
                                                <?= form_error('sembuhMB', ' <small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>

                                        <label>Penderita Kusta yang Cacat</label>
                                        <div class="form-group row pl-3">
                                            <label for="example-text-input" class="col-form-label">PB</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="cacatPB" id="cacatPB" placeholder="Penderita yang Cacat Tipe PB" value="<?= set_value('cacatPB'); ?>">
                                                <?= form_error('cacatPB', ' <small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <label for="example-text-input" class="offset-sm-1 col-form-label">MB</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="cacatMB" id="cacatMB" placeholder="Penderita yang Cacat Tipe MB" value="<?= set_value('cacatMB'); ?>">
                                                <?= form_error('cacatMB', ' <small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>

                                        <h4 class="mt-5 header-title">Penderita Terdaftar Kusta Tipe PB</h4>
                                        <div class="dropdown-divider mb-3"></div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="card-body">
                                                    <label>Usia 0 - 15 tahun</label>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-form-label">L</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="kus15LPB" id="kus15LPB" placeholder="Laki - Laki" value="<?= set_value('kus15LPB'); ?>">
                                                            <?= form_error('kus15LPB', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                        <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="kus15PPB" id="kus15PPB" placeholder="Perempuan" value="<?= set_value('kus15PPB'); ?>">
                                                            <?= form_error('kus15PPB', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <label>Usia 16 - 25 tahun</label>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-form-label">L</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="kus1625LPB" id="kus1625LPB" placeholder="Laki - Laki" value="<?= set_value('kus1625LPB'); ?>">
                                                            <?= form_error('kus1625LPB', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                        <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="kus1625PPB" id="kus1625PPB" placeholder="Perempuan" value="<?= set_value('kus1625PPB'); ?>">
                                                            <?= form_error('kus1625PPB', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <label>Usia 26 - 35 tahun</label>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-form-label">L</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="kus2635LPB" id="kus2635LPB" placeholder="Laki - Laki" value="<?= set_value('kus2635LPB'); ?>">
                                                            <?= form_error('kus2635LPB', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                        <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="kus2635PPB" id="kus2635PPB" placeholder="Perempuan" value="<?= set_value('kus2635PPB'); ?>">
                                                            <?= form_error('kus2635PPB', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="card-body">
                                                    <label>Usia 36 - 45 tahun</label>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-form-label">L</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="kus3645LPB" id="kus3645LPB" placeholder="Laki - Laki" value="<?= set_value('kus3645LPB'); ?>">
                                                            <?= form_error('kus3645LPB', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                        <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="kus3645PPB" id="kus3645PPB" placeholder="Perempuan" value="<?= set_value('kus3645PPB'); ?>">
                                                            <?= form_error('kus3645PPB', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <label>Usia 46 - 55 tahun</label>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-form-label">L</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="kus4655LPB" id="kus4655LPB" placeholder="Laki - Laki" value="<?= set_value('kus4655LPB'); ?>">
                                                            <?= form_error('kus4655LPB', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                        <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="kus4655PPB" id="kus4655PPB" placeholder="Perempuan" value="<?= set_value('kus4655PPB'); ?>">
                                                            <?= form_error('kus4655PPB', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <label>Usia > 55 tahun</label>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-form-label">L</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="kus56LPB" id="kus56LPB" placeholder="Laki - Laki" value="<?= set_value('kus56LPB'); ?>">
                                                            <?= form_error('kus56LPB', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                        <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="kus56PPB" id="kus56PPB" placeholder="Perempuan" value="<?= set_value('kus56PPB'); ?>">
                                                            <?= form_error('kus56PPB', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h4 class="mt-5 header-title">Penderita Terdaftar Kusta Tipe MB</h4>
                                        <div class="dropdown-divider mb-3"></div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="card-body">
                                                    <label>Usia 0 - 15 tahun</label>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-form-label">L</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="kus15LMB" id="kus15LMB" placeholder="Laki - Laki" value="<?= set_value('kus15LMB'); ?>">
                                                            <?= form_error('kus15LMB', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                        <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="kus15PMB" id="kus15PMB" placeholder="Perempuan" value="<?= set_value('kus15PMB'); ?>">
                                                            <?= form_error('kus15PMB', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <label>Usia 16 - 25 tahun</label>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-form-label">L</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="kus1625LMB" id="kus1625LMB" placeholder="Laki - Laki" value="<?= set_value('kus1625LMB'); ?>">
                                                            <?= form_error('kus1625LMB', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                        <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="kus1625PMB" id="kus1625PMB" placeholder="Perempuan" value="<?= set_value('kus1625PMB'); ?>">
                                                            <?= form_error('kus1625PMB', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <label>Usia 26 - 35 tahun</label>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-form-label">L</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="kus2635LMB" id="kus2635LMB" placeholder="Laki - Laki" value="<?= set_value('kus2635LMB'); ?>">
                                                            <?= form_error('kus2635LMB', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                        <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="kus2635PMB" id="kus2635PMB" placeholder="Perempuan" value="<?= set_value('kus2635PMB'); ?>">
                                                            <?= form_error('kus2635PMB', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="card-body">
                                                    <label>Usia 36 - 45 tahun</label>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-form-label">L</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="kus3645LMB" id="kus3645LMB" placeholder="Laki - Laki" value="<?= set_value('kus3645LMB'); ?>">
                                                            <?= form_error('kus3645LMB', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                        <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="kus3645PMB" id="kus3645PMB" placeholder="Perempuan" value="<?= set_value('kus3645PMB'); ?>">
                                                            <?= form_error('kus3645PMB', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <label>Usia 46 - 55 tahun</label>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-form-label">L</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="kus4655LMB" id="kus4655LMB" placeholder="Laki - Laki" value="<?= set_value('kus4655LMB'); ?>">
                                                            <?= form_error('kus4655LMB', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                        <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="kus4655PMB" id="kus4655PMB" placeholder="Perempuan" value="<?= set_value('kus4655PMB'); ?>">
                                                            <?= form_error('kus4655PMB', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <label>Usia > 55 tahun</label>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-form-label">L</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="kus56LMB" id="kus56LMB" placeholder="Laki - Laki" value="<?= set_value('kus56LMB'); ?>">
                                                            <?= form_error('kus56LMB', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                        <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="kus56PMB" id="kus56PMB" placeholder="Perempuan" value="<?= set_value('kus56PMB'); ?>">
                                                            <?= form_error('kus56PMB', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ml-4">
                                            <a href="<?= site_url('kasus_kusta'); ?>" type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-reply"></i> Kembali</a>
                                            <button type="submit" name="tambah" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-content-save"></i> Simpan</button>
                                        </div>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <div class="mt-4">
                                        <a href="<?= site_url('kasus_kusta'); ?>" type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-reply"></i> Kembali</a>
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