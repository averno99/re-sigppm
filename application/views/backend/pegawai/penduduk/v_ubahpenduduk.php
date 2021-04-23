<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="<?= site_url('penduduk') ?>">Kelola Data Jumlah Penduduk</a></li>
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
                    <?php if (empty($penduduk)) : ?>
                        <?php redirect('penduduk') ?>
                    <?php else : ?>
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Form <?= $judul ?></h4>
                            <div class="dropdown-divider mb-3"></div>

                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?= $penduduk['id']; ?>">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="tahun">Tahun</label>
                                        <input type="text" class="form-control" name="tahun" id="tahun" value="<?= $penduduk['tahun'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="kecamatan">Kecamatan</label>
                                        <input type="text" class="form-control" name="kecamatan" id="kecamatan" value="<?= $penduduk['nama'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah">Jumlah Penduduk</label>
                                        <input type="text" class="form-control" name="jumlah" id="jumlah" value="<?= $penduduk['jumlah'] ?>">
                                        <?= form_error('jumlah', ' <small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <a href="<?= site_url('penduduk'); ?>" type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-reply"></i> Kembali</a>
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