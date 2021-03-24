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

                                        <?= form_open_multipart('user/tambah'); ?>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="nama">Nama User</label>
                                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama User" value="<?= set_value('nama'); ?>">
                                                <?= form_error('nama', ' <small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class=" form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?= set_value('username'); ?>">
                                                <?= form_error('username', ' <small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="password1">Password</label>
                                                <div>
                                                    <input type="password" class="form-control" name="password1" id="password1" placeholder="Password">
                                                    <?= form_error('password1', ' <small class="text-danger">', '</small>'); ?>
                                                </div>
                                                <div class="m-t-10">
                                                    <input type="password" class="form-control" name="password2" id="password2" placeholder="Ulangi Password">
                                                    <?= form_error('password2', ' <small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat"><?= set_value('alamat'); ?></textarea>
                                                <?= form_error('alamat', ' <small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="levelUser">Level User</label>
                                                <select class="form-control" name="levelUser" id="levelUser">
                                                    <?php foreach ($levelUser as $lu) : ?>
                                                        <option value="<?= $lu; ?>"><?= $lu; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="gambar">Gambar</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                                    <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <a href="<?= site_url('user'); ?>" type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-reply"></i> Kembali</a>
                                            <button type="submit" name="tambah" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-content-save"></i> Simpan</button>
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