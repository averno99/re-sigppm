                <div class="page-content-wrapper ">

                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <div class="btn-group float-right">
                                        <ol class="breadcrumb hide-phone p-0 m-0">
                                            <li class="breadcrumb-item"><a href="<?= site_url('kecamatan') ?>">Kelola Data Kecamatan</a></li>
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

                                        <?= form_open_multipart('kecamatan/tambah'); ?>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="nama">Nama :</label>
                                                <h6><?= $kecamatan['nama']; ?></h6>

                                            </div>
                                            <div class=" form-group">
                                                <label for="keterangan">Keterangan :</label>
                                                <h6><?= $kecamatan['keterangan']; ?></h6>
                                            </div>
                                            <div class="form-group">
                                                <label for="geojson">GeoJSON :</label>
                                                <h6><a href="<?= site_url('assets/geojson/') . $kecamatan['geojson']; ?>" target="_BLANK"><?= $kecamatan['geojson']; ?></a></h6>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <a href="<?= site_url('kecamatan'); ?>" type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-reply"></i> Kembali</a>

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