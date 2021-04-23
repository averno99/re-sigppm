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

                                    <?php if (empty($kecamatan)) : ?>
                                        <?php redirect('kecamatan') ?>
                                    <?php else : ?>
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">Form <?= $judul ?></h4>
                                            <div class="dropdown-divider mb-3"></div>

                                            <?= form_open_multipart(''); ?>
                                            <input type="hidden" name="id" value="<?= $kecamatan['id']; ?>">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $kecamatan['nama']; ?>">
                                                    <?= form_error('nama', ' <small class="text-danger">', '</small>'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="keterangan">Keterangan</label>
                                                    <textarea class="form-control" name="keterangan" id="keterangan"><?= $kecamatan['keterangan']; ?></textarea>
                                                    <?= form_error('keterangan', ' <small class="text-danger">', '</small>'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="geojson">GeoJSON</label>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <a href="<?= site_url('assets/geojson/') . $kecamatan['geojson']; ?>" target="_BLANK"><?= $kecamatan['geojson']; ?></a>
                                                        </div>
                                                        <div class="col-sm-5 align-self-end">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="geojson" name="geojson">
                                                                <label class="custom-file-label" for="geojson">Pilih GeoJSON</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- /.card-body -->

                                            <div class="ml-4">
                                                <a href="<?= site_url('kecamatan'); ?>" type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-reply"></i> Kembali</a>
                                                <button type="submit" name="ubah" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-content-save"></i> Simpan</button>
                                            </div>
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