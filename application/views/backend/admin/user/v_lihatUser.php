                <div class="page-content-wrapper ">

                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <div class="btn-group float-right">
                                        <ol class="breadcrumb hide-phone p-0 m-0">
                                            <li class="breadcrumb-item"><a href="<?= site_url('user') ?>">Kelola Data User</a></li>
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


                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="nama">Nama User</label>
                                                <h6><?= $users['nama']; ?></h6>
                                            </div>
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <h6><?= $users['username']; ?></h6>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <h6><?= $users['alamat']; ?></h6>
                                            </div>
                                            <div class="form-group">
                                                <label for="levelUser">Level User</label>
                                                <h6><?= $users['levelUser']; ?></h6>
                                            </div>
                                            <div class="form-group">
                                                <label for="gambar">Gambar</label>
                                                <img src="<?= base_url('assets/gambar/user/') . $users['gambar']; ?>" class="img-thumbnail">
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <a href="<?= site_url('user'); ?>" type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-reply"></i> Kembali</a>
                                            <button type="submit" name="tambah" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-content-save"></i> Simpan</button>
                                        </div>
                                        <!-- /.card-body -->





                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->

                    </div><!-- container -->

                </div> <!-- Page content Wrapper -->

                </div> <!-- content -->