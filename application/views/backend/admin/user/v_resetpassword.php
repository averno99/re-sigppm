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

                        <?php if (empty($users)) : ?>
                            <?php redirect('user') ?>
                        <?php else : ?>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?= $users['id']; ?>">
                                <div class="card-body">

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

                                </div>
                                <div class="ml-4">
                                    <a href="<?= site_url('user'); ?>" type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-reply"></i> Kembali</a>
                                    <button type="submit" name="ubah" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-content-save"></i> Simpan</button>
                                </div>
                                <!-- /.card-body -->

                            </form>
                        <?php endif; ?>


                    </div>
                </div>
            </div>
        </div>
        <!--end row-->

    </div><!-- container -->

</div> <!-- Page content Wrapper -->

</div> <!-- content -->