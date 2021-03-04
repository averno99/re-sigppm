                <div class="page-content-wrapper ">

                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <div class="btn-group float-right">
                                        <ol class="breadcrumb hide-phone p-0 m-0">
                                            <li class="breadcrumb-item">Beranda</li>
                                            <li class="breadcrumb-item active">Profil</li>
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
                                        <?php if ($this->session->flashdata('login')) : ?>
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <?= $this->session->flashdata('login'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <h4 class="mt-0 header-title">Profil</h4>
                                        <div class="dropdown-divider mb-3"></div>
                                        <div class="row">
                                            <div class="col-sm-12 mx-auto">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="row">
                                                            <div class="col-sm-12 mx-auto">
                                                                <div class="text-center">
                                                                    <img class="img-responsive" src="<?= base_url('assets/gambar/user/') . $user['gambar']; ?>" width="200px">
                                                                    <h5><?= $user['nama']; ?></h5>
                                                                    <h6><?= $user['levelUser']; ?></h6>


                                                                    <div class="col-sm-6 mx-auto">
                                                                        <a href="<?= site_url('profil/ubah') ?>" type="button" class="btn btn-block btn-primary">Ubah Profil</a>
                                                                    </div>



                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-sm-6 border-left">
                                                        <?= $this->session->flashdata('pesan'); ?>
                                                        <div class="row">
                                                            <div class="col-sm-10 offset-sm-1">


                                                                <form action="<?= base_url('profil/ubah_password'); ?>" method="POST">
                                                                    <div class="form-group">
                                                                        <label for="passwordSekarang">Password Saat Ini</label>
                                                                        <input type="password" class="form-control" id="passwordSekarang" name="passwordSekarang" placeholder="Password Saat Ini">
                                                                        <?= form_error('passwordSekarang', ' <small class="text-danger">', '</small>'); ?>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="passwordBaru1">Password Baru</label>
                                                                        <div>
                                                                            <input type="password" class="form-control" id="passwordBaru1" name="passwordBaru1" placeholder="Password Baru">
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
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- container -->

                </div> <!-- Page content Wrapper -->

                </div> <!-- content -->