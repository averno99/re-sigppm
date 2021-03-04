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
                                                <div class="form-group">
                                                    <label for="pb">PB Kusta</label>
                                                    <input type="text" class="form-control" name="pb" id="pb" value="<?= $kasus['pb'] ?>">
                                                    <?= form_error('pb', ' <small class="text-danger">', '</small>'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="mb">MB Kusta</label>
                                                    <input type="text" class="form-control" name="mb" id="mb" value="<?= $kasus['mb'] ?>">
                                                    <?= form_error('mb', ' <small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <a href="<?= site_url('kasus_kusta'); ?>" type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-reply"></i> Kembali</a>
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