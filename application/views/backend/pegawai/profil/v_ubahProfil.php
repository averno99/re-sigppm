                <div class="page-content-wrapper ">

                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <div class="btn-group float-right">
                                        <ol class="breadcrumb hide-phone p-0 m-0">
                                            <li class="breadcrumb-item">Beranda</li>
                                            <li class="breadcrumb-item"><a href="<?= site_url('profil') ?>">Profil</a></li>
                                            <li class="breadcrumb-item active">Ubah Profil</li>
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
                                            <?= form_open_multipart('profil/ubah'); ?>
                                            <div class="form-group row">
                                                <label for="username" class="col-sm-3 col-form-label">Username</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                                                    <?= form_error('nama', ' <small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" name="alamat" id="alamat"><?= $user['alamat']; ?></textarea>
                                                    <?= form_error('alamat', ' <small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="gambar" class="col-sm-3">Gambar</label>
                                                <div class="col-sm-9">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <img src="<?= base_url('assets/gambar/user/') . $user['gambar']; ?>" class="img-thumbnail">
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                                                <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row justify-content-end">
                                                <div class="col-sm-9">
                                                    <a href="<?= site_url('profil'); ?>" type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-reply"></i> Kembali</a>
                                                    <button type="submit" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-content-save"></i> Simpan</button>
                                                </div>
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