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
                    <?php if (empty($users)) : ?>
                        <?php redirect('user') ?>
                    <?php else : ?>
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Form <?= $judul ?></h4>
                            <div class="dropdown-divider mb-3"></div>

                            <?= form_open_multipart(''); ?>
                            <input type="hidden" name="id" value="<?= $users['id']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama User</label>
                                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $users['nama']; ?>">
                                    <?= form_error('nama', ' <small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" value="<?= $users['username']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat"><?= $users['alamat']; ?></textarea>
                                    <?= form_error('alamat', ' <small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="levelUser">Level User</label>
                                    <select class="form-control" name="levelUser" id="levelUser">
                                        <?php foreach ($levelUser as $lu) : ?>
                                            <?php if ($lu == $users['levelUser']) : ?>
                                                <option value="<?= $lu; ?>" selected><?= $lu; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $lu; ?>"><?= $lu; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="statuss">Status</label>
                                    <select class="form-control" name="status" id="statuss">
                                        <?php foreach ($status as $sts) : ?>
                                            <?php if ($sts == $users['status']) : ?>
                                                <option value="<?= $sts; ?>" selected><?= $sts; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $sts; ?>"><?= $sts; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="<?= base_url('assets/gambar/user/') . $users['gambar']; ?>" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-5 align-self-end">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                                <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="ml-4">
                                <a href="<?= site_url('user'); ?>" type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-reply"></i> Kembali</a>
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