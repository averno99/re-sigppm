                <div class="page-content-wrapper ">

                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <div class="btn-group float-right">
                                        <ol class="breadcrumb hide-phone p-0 m-0">
                                            <li class="breadcrumb-item">Beranda</li>
                                            <li class="breadcrumb-item"><a href="<?= site_url('kasus') ?>">Data Kasus Positif</a></li>
                                            <li class="breadcrumb-item active"><?= $judul ?></li>
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

                                        <form action="" method="post">
                                            <input type="hidden" name="id" value="<?= $kasus['id']; ?>">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="tahun">Tahun</label>
                                                    <select class="form-control" name="tahun" id="tahun">
                                                        <?php foreach ($tahun as $thn) : ?>
                                                            <?php if ($thn['id'] == $kasus['idTahun']) : ?>
                                                                <option value="<?= $thn['id']; ?>" selected><?= $thn['tahun']; ?></option>
                                                            <?php else : ?>
                                                                <option value="<?= $thn['id']; ?>"><?= $thn['tahun']; ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kecamatan">Kecamatan</label>
                                                    <select class="form-control" name="kecamatan" id="kecamatan">
                                                        <?php foreach ($kecamatan as $kcm) : ?>
                                                            <?php if ($kcm['id'] == $kasus['idKecamatan']) : ?>
                                                                <option value="<?= $kcm['id']; ?>" selected><?= $kcm['nama']; ?></option>
                                                            <?php else : ?>
                                                                <option value="<?= $kcm['id']; ?>"><?= $kcm['nama']; ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="penyakit">Penyakit</label>
                                                    <select class="form-control" name="penyakit" id="penyakit">
                                                        <?php foreach ($penyakit as $pyt) : ?>
                                                            <?php if ($pyt['id'] == $kasus['idPenyakit']) : ?>
                                                                <option value="<?= $pyt['id']; ?>" selected><?= $pyt['penyakit']; ?></option>
                                                            <?php else : ?>
                                                                <option value="<?= $pyt['id']; ?>"><?= $pyt['penyakit']; ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jumlah">Jumlah Kasus</label>
                                                    <input type="text" class="form-control" name="jumlah" id="jumlah" value="<?= $kasus['jumlah'] ?>">
                                                    <?= form_error('jumlah', ' <small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <a href="<?= site_url('kasus'); ?>" type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-reply"></i> Kembali</a>
                                                <button type="submit" name="ubah" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-content-save"></i> Simpan</button>
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