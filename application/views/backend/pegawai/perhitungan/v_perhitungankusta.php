                <div class="page-content-wrapper ">

                    <div class="container-fluid">

                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                        <?php if ($this->session->flashdata('flash')) : ?>
                        <?php endif; ?>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <div class="btn-group float-right">
                                        <ol class="breadcrumb hide-phone p-0 m-0">
                                            <li class="breadcrumb-item">Beranda</li>
                                            <li class="breadcrumb-item active">Data Kasus Positif</li>
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
                                    <div class="card-body table-responsive">
                                        <h4 class="mt-0 header-title">Data Kasus Positif Kusta</h4>
                                        <div class="dropdown-divider mb-3"></div>
                                        <div class="row mb-4">

                                            <div class="col-sm-12 mx-auto">
                                                <form action="<?= base_url('perhitungan/cari_kusta') ?>" method="POST">
                                                    <div class="col-sm-3 ml-auto">
                                                        <div class="input-group mt-2">
                                                            <select class="custom-select" name="cari" id="cari">
                                                                <option selected disabled>--Pilih Tahun--</option>
                                                                <?php for ($y = date('Y'); $y >= 1990; $y--) : ?>
                                                                    <?php if ($y == $this->input->post('cari')) : ?>
                                                                        <option value="<?= $y; ?>" selected><?= $y; ?></option>
                                                                    <?php else : ?>
                                                                        <option value="<?= $y; ?>"><?= $y; ?></option>
                                                                    <?php endif; ?>
                                                                <?php endfor; ?>
                                                            </select>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-success" type="submit">Pilih</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <table id="example1" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tahun</th>
                                                    <th>Penyakit</th>
                                                    <th>Kecamatan</th>
                                                    <th>PB</th>
                                                    <th>MB</th>
                                                    <th>Kasus Baru</th>
                                                    <th>Jumlah Penduduk</th>
                                                    <th>CDR</th>
                                                    <th>PR</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($kasus as $kps) : ?>
                                                    <?php
                                                    $jumlahPenduduk = $kps['jumlahPenduduk'];
                                                    $total = $kps['pb'] + $kps['mb'];
                                                    $kasus_baru = $kps['kasus_baru'];

                                                    $pr = ($total / $jumlahPenduduk) * 10000;
                                                    $cdr = ($kasus_baru / $jumlahPenduduk) * 100000;
                                                    ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $kps['tahun']; ?></td>
                                                        <td><?= $kps['penyakit']; ?></td>
                                                        <td><?= $kps['nama']; ?></td>
                                                        <td><?= $kps['pb']; ?></td>
                                                        <td><?= $kps['mb']; ?></td>
                                                        <td><?= $kps['kasus_baru']; ?></td>
                                                        <td><?= number_format($kps['jumlahPenduduk'], 0, '', ','); ?></td>
                                                        <td><?= number_format($cdr, 2); ?></td>
                                                        <td><?= number_format($pr, 2); ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->

                    </div><!-- container -->

                </div> <!-- Page content Wrapper -->

                </div> <!-- content -->