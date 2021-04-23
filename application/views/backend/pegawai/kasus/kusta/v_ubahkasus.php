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
                    <?php if (empty($kasus)) : ?>
                        <?php redirect('kasus_kusta') ?>
                    <?php else : ?>
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Form <?= $judul ?></h4>
                            <div class="dropdown-divider mb-3"></div>

                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?= $kasus['idKusta']; ?>">
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

                                    <label>Kasus Baru</label>
                                    <div class="form-group row pl-3">
                                        <label for="example-text-input" class="col-form-label">PB</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="kusta_baruPB" id="kusta_baruPB" value="<?= $kasus['kusta_baruPB']; ?>">
                                            <?= form_error('kusta_baruPB', ' <small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <label for="example-text-input" class="offset-sm-1 col-form-label">MB</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="kusta_baruMB" id="kusta_baruMB" value="<?= $kasus['kusta_baruMB']; ?>">
                                            <?= form_error('kusta_baruMB', ' <small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <label>Penderita Kusta yang Sembuh</label>
                                    <div class="form-group row pl-3">
                                        <label for="example-text-input" class="col-form-label">PB</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="sembuhPB" id="sembuhPB" value="<?= $kasus['sembuhPB']; ?>">
                                            <?= form_error('sembuhPB', ' <small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <label for="example-text-input" class="offset-sm-1 col-form-label">MB</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="sembuhMB" id="sembuhMB" value="<?= $kasus['sembuhMB']; ?>">
                                            <?= form_error('sembuhMB', ' <small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <label>Penderita Kusta yang Cacat</label>
                                    <div class="form-group row pl-3">
                                        <label for="example-text-input" class="col-form-label">PB</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="cacatPB" id="cacatPB" value="<?= $kasus['cacatPB']; ?>">
                                            <?= form_error('cacatPB', ' <small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <label for="example-text-input" class="offset-sm-1 col-form-label">MB</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="cacatMB" id="cacatMB" value="<?= $kasus['cacatMB']; ?>">
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
                                                        <input type="text" class="form-control" name="kus15LPB" id="kus15LPB" value="<?= $kasus['kus15LPB']; ?>">
                                                        <?= form_error('kus15LPB', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                    <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="kus15PPB" id="kus15PPB" value="<?= $kasus['kus15PPB']; ?>">
                                                        <?= form_error('kus15PPB', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <label>Usia 16 - 25 tahun</label>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-form-label">L</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="kus1625LPB" id="kus1625LPB" value="<?= $kasus['kus1625LPB']; ?>">
                                                        <?= form_error('kus1625LPB', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                    <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="kus1625PPB" id="kus1625PPB" value="<?= $kasus['kus1625PPB']; ?>">
                                                        <?= form_error('kus1625PPB', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <label>Usia 26 - 35 tahun</label>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-form-label">L</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="kus2635LPB" id="kus2635LPB" value="<?= $kasus['kus2635LPB']; ?>">
                                                        <?= form_error('kus2635LPB', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                    <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="kus2635PPB" id="kus2635PPB" value="<?= $kasus['kus2635PPB']; ?>">
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
                                                        <input type="text" class="form-control" name="kus3645LPB" id="kus3645LPB" value="<?= $kasus['kus3645LPB']; ?>">
                                                        <?= form_error('kus3645LPB', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                    <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="kus3645PPB" id="kus3645PPB" value="<?= $kasus['kus3645PPB']; ?>">
                                                        <?= form_error('kus3645PPB', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <label>Usia 46 - 55 tahun</label>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-form-label">L</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="kus4655LPB" id="kus4655LPB" value="<?= $kasus['kus4655LPB']; ?>">
                                                        <?= form_error('kus4655LPB', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                    <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="kus4655PPB" id="kus4655PPB" value="<?= $kasus['kus4655PPB']; ?>">
                                                        <?= form_error('kus4655PPB', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <label>Usia > 55 tahun</label>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-form-label">L</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="kus56LPB" id="kus56LPB" value="<?= $kasus['kus56LPB']; ?>">
                                                        <?= form_error('kus56LPB', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                    <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="kus56PPB" id="kus56PPB" value="<?= $kasus['kus56PPB']; ?>">
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
                                                        <input type="text" class="form-control" name="kus15LMB" id="kus15LMB" value="<?= $kasus['kus15LMB']; ?>">
                                                        <?= form_error('kus15LMB', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                    <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="kus15PMB" id="kus15PMB" value="<?= $kasus['kus15PMB']; ?>">
                                                        <?= form_error('kus15PMB', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <label>Usia 16 - 25 tahun</label>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-form-label">L</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="kus1625LMB" id="kus1625LMB" value="<?= $kasus['kus1625LMB']; ?>">
                                                        <?= form_error('kus1625LMB', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                    <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="kus1625PMB" id="kus1625PMB" value="<?= $kasus['kus1625PMB']; ?>">
                                                        <?= form_error('kus1625PMB', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <label>Usia 26 - 35 tahun</label>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-form-label">L</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="kus2635LMB" id="kus2635LMB" value="<?= $kasus['kus2635LMB']; ?>">
                                                        <?= form_error('kus2635LMB', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                    <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="kus2635PMB" id="kus2635PMB" value="<?= $kasus['kus2635PMB']; ?>">
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
                                                        <input type="text" class="form-control" name="kus3645LMB" id="kus3645LMB" value="<?= $kasus['kus3645LMB']; ?>">
                                                        <?= form_error('kus3645LMB', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                    <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="kus3645PMB" id="kus3645PMB" value="<?= $kasus['kus3645PMB']; ?>">
                                                        <?= form_error('kus3645PMB', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <label>Usia 46 - 55 tahun</label>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-form-label">L</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="kus4655LMB" id="kus4655LMB" value="<?= $kasus['kus4655LMB']; ?>">
                                                        <?= form_error('kus4655LMB', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                    <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="kus4655PMB" id="kus4655PMB" value="<?= $kasus['kus4655PMB']; ?>">
                                                        <?= form_error('kus4655PMB', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <label>Usia > 55 tahun</label>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-form-label">L</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="kus56LMB" id="kus56LMB" value="<?= $kasus['kus56LMB']; ?>">
                                                        <?= form_error('kus56LMB', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                    <label for="example-text-input" class="offset-sm-1 col-form-label">P</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="kus56PMB" id="kus56PMB" value="<?= $kasus['kus56PMB']; ?>">
                                                        <?= form_error('kus56PMB', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="ml-4">
                                    <a href="<?= site_url('kasus_kusta'); ?>" type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-reply"></i> Kembali</a>
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