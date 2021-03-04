                <div class="page-content-wrapper ">

                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <div class="btn-group float-right">
                                        <ol class="breadcrumb hide-phone p-0 m-0">
                                            <li class="breadcrumb-item">Beranda</li>
                                            <li class="breadcrumb-item"><a href="<?= site_url('profil') ?>">Profil</a></li>
                                            <li class="breadcrumb-item active">Ubah Password</li>
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

                                        <div class="col-md-6">
                                            <?= $this->session->flashdata('pesan'); ?>
                                            <form action="<?= base_url('profil/ubah_password'); ?>" method="POST">
                                                <div class="form-group">
                                                    <label for="passwordSekarang">Password Saat Ini</label>
                                                    <input type="password" class="form-control" id="passwordSekarang" name="passwordSekarang" placeholder="Password Saat Ini">
                                                    <?= form_error('passwordSekarang', ' <small class="text-danger">', '</small>'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="passwordBaru1">Password Baru</label>
                                                    <div>
                                                        <input type="password" class="form-control" id="passwordBaru1" name="passwordBaru1" placeholder="Passowrd Baru">
                                                        <?= form_error('passwordBaru1', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                    <div class="m-t-10">
                                                        <input type="password" class="form-control" id="passwordBaru2" name="passwordBaru2" placeholder="Ulangi Password Baru">
                                                        <?= form_error('passwordBaru2', ' <small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-content-save"></i> Simpan</button>
                                                </div>
                                            </form>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- container -->

                </div> <!-- Page content Wrapper -->

                </div> <!-- content -->